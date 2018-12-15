<?php
namespace yxmingy\ToxicHome\starter;
use pocketmine\command\
{Command,CommandSender};
abstract class CommandDispenser extends ListenerManager
{
  const MAIN_CMD = "home";
  protected static $cmdList = //"cmd"=>"class"
  [
  "a"=>a::class
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
    if($command->getName() != MAIN_CMD) return false;
    $exers = array_keys($executors);
    foreach($executors as $cmd=>$exer)
    {
      if($args[0] == $cmd)
      {
        return ($exer->handleCommand(array_slice($args,1),$sender));
      }
    }
  }
}