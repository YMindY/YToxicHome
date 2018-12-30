<?php
namespace yxmingy\ToxicHome\store;
use yxmingy\ToxicHome\starter\CommandExecutor;
use yxmingy\ToxicHome\generator\GeneratorManager;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use onebone\economyapi\EconomyAPI;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\block\Block;
class BuyCommand implements CommandExecutor
{
  public function handleCommand(array $args,CommandSender $sender):bool
  {
    if(!isset($args[0])) return $this->return($sender);
    if(!in_array($args[0],array("0","1","2","3"),true)) return $this->return($sender);
    $name = $sender->getName();
    if(Server::getInstance()->isLevelGenerated("ythome_".$name)){
      $sender->sendMessage("你都有家了还凑什么热闹");
      return true;
    }
    $eapi = EconomyAPI::getInstance();
    $price = HomeStore::getConfig()[$args[0]."级世界"]["售价"];
    /*
    if($eapi->MyMoney($name) < $price)
    {
      $sender->sendMessage("穷鬼，等攒够".$price."再来吧!");
      return true;
    }
   */ if(GeneratorManager::generateLevel($name,$args[0])){
      $level = Server::getInstance()->getLevelbyName((string)("ythome_".$name));
      //var_dump($level);
      $level->setSpawnLocation(new Vector3(0,1,0));
      $grass = Block::get(Block::GRASS);
      $y = 0;
      $size = HomeStore::getConfig()[$args[0]."级世界"]["大小"];
      $asize = ($size-1)/2;//anglesize
      for($fx=-$asize;$fx<=$asize;$fx++)
      {
        for($fz=-$asize;$fz<=$asize;$fz++)
        {
          if(!$level->isChunkLoaded($fx,$fz))
          {
            $level->loadChunk($fx,$fz);
            if(($chunk=$level->getChunk($fx,$fz,true)) === null)
            {
              $sender->sendMessage("出现无法解决的错误!");
            }
          }
          var_dump($level->isChunkLoaded($fx,$fz));
          //$level->setBlock(new Vector3($fx,0,$fz),clone $grass);
          $chunk->setBlock($fx & 0xf, 0, $fz & 0xf, $grass->getId(), $grass->getDamage());
        }
      }
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