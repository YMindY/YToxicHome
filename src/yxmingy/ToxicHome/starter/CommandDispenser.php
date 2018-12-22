<?php
namespace yxmingy\ToxicHome\starter;
use pocketmine\command\
{Command,CommandSender};
use yxmingy\ToxicHome\HelpCommand;
use yxmingy\ToxicHome\store\
{BuyCommand,UpCommand};
abstract class CommandDispenser extends ListenerManager
{
  const MAIN_CMD = "hs";
  protected static $cmdList = //"cmd"=>"class"
  [
  "help"=>HelpCommand::class,
  "buy"=>BuyCommand::class,
  "up"=>UpCommand::class,
  ];
  protected static $executors = [];
  protected static function dispenseExecutors():void
  {
    foreach(self::$cmdList as $cmd=>$cls)
    {
      $exer = new $cls();
      if(!$exer instanceof CommandExecutor)
      {
        throw(new \TypeError("$cls is not a Executor."));
      }else{
        self::$executors[$cmd] = clone $exer;
      }
     unset($exer);
    }
  }
  public function onCommand(CommandSender $sender, Command $command, $label, array $args):bool
  {
    if($command->getName() != self::MAIN_CMD) return false;
    if(!isset($args[0])) return false;
    foreach(self::$executors as $cmd=>$exer)
    {
      if($args[0] == $cmd)
      {
        return ($exer->handleCommand(array_slice($args,1),$sender));
      }
    }
    return false;
  }
}