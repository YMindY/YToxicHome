<?php
namespace yxmingy\ToxicHome\store;
use yxmingy\ToxicHome\Main;
use yxmingy\ToxicHome\starter\CommandExecutor;
use yxmingy\ToxicHome\generator\GeneratorManager;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\command\CommandSender;
class HomeStore implements CommandExecutor
{
  private $conf;
  public function __construct()
  {
    $this->conf = new Config(Main::getInstance()->getDataFolder()."/store.yml",Config::YAML,array("初级世界售价"=>2000,"一级世界售价"=>5000,"二级世界售价"=>10000,"三级世界售价"=>20000));
  }
  public function handleCommand(array $args,CommandSender $sender):bool
  {
    if(!isset($args[0])) return false;
    switch($args[0])
    {
      case "buy":
        if(!isset($args[1])) return $this->return("buy",$sender);
        if(!in_array($args[1],array("0","1","2","3"),true)) return $this->return("buy",$sender);
        if(Server::getInstance()->isLevelGenerated("ythome_".$sender->getName())){
          $sender->sendMessage("你都有家了还凑什么热闹");
        }
        if(GeneratorManager::generateLevel($sender->getName(),$args[1])){
          $sender->sendMessage("购买成功!");
        }
      break;
    }
    return true;
  }
  private function return(string $type,CommandSender $sender):bool
  {
    switch($type){
      case "buy":
        $sender->sendMessage("用法: /hs shop buy [等级(0/1/2/3)]");
      break;
    }
    return true;
  }
}