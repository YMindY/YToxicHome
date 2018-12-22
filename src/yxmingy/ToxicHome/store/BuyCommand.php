<?php
namespace yxmingy\ToxicHome\store;
use yxmingy\ToxicHome\starter\CommandExecutor;
use yxmingy\ToxicHome\generator\GeneratorManager;
use pocketmine\Server;
use pocketmine\command\CommandSender;
class BuyCommand implements CommandExecutor
{
  public function handleCommand(array $args,CommandSender $sender):bool
  {
    if(!isset($args[0])) return $this->return($sender);
    if(!in_array($args[0],array("0","1","2","3"),true)) return $this->return($sender);
    if(Server::getInstance()->isLevelGenerated("ythome_".$sender->getName())){
      $sender->sendMessage("你都有家了还凑什么热闹");
      return true;
    }
    if(GeneratorManager::generateLevel($sender->getName(),$args[0])){
      $sender->sendMessage("购买成功!");
    }
    return true;
  }
  private function return(CommandSender $sender):bool
  {
    $sender->sendMessage("用法: /hs buy [等级(0/1/2/3)]");
    return true;
  }
}