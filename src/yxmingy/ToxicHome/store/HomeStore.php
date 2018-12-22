<?php
namespace yxmingy\ToxicHome\store;
use yxmingy\ToxicHome\Main;
use pocketmine\Server;
use pocketmine\utils\Config;
class HomeStore
{
  private static $conf;
  public static function init():void
  {
    self::$conf = new Config(Main::getInstance()->getDataFolder()."/store.yml",Config::YAML,array("初级世界售价"=>2000,"一级世界售价"=>5000,"二级世界售价"=>10000,"三级世界售价"=>20000));
  }
  public static function getConfig():?Config
  {
    return self::$conf;
  }
}