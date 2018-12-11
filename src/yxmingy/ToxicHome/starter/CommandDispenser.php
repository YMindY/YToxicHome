<?php
namespace yxmingy\ToxicHome\starter;
use pocketmine\command\
{Command,CommandSender};
abstract class CommandDispenser extends ListenerManager
{
  protected static $cmdList = //"cmd"=>"class"
  [
  ]
  protected static $executors = [];
  protected static function dispenseExecutors():void
  {
    foreach(self::$cmdList as $cmd=>$cls)
    {
      self::$executers[$cmd] = new $cls();
    }
  }
  public function onCommand(CommandSender $sender, Command $command, $label, array $args):bool
  {
    
  }
}