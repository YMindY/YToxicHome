<?php
namespace yxmingy\ToxicHome\store;
use yxmingy\ToxicHome\starter\CommandExecutor;
use yxmingy\ToxicHome\generator\GeneratorManager;
use pocketmine\Server;
use pocketmine\command\CommandSender;
class UpCommand implements CommandExecutor
{
  public function handleCommand(array $args,CommandSender $sender):bool
  {
    if(!isset($args[0])) return $this->return($sender);
    if(!Server::getInstance()->isLevelGenerated("ythome_".$sender->getName())){
      $sender->sendMessage("没家的孩子，先滚去买家吧");
      return true;
    }
    $sender->sendMessage("升级成功!");
    return true;
  }
  private function return(CommandSender $sender):bool
  {
    $sender->sendMessage("确认升级: /hs up ok");
    return true;
  }
}