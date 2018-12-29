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
    self::$conf = new Config(Main::getInstance()->getDataFolder()."/store.yml",Config::YAML,array("0级世界售价"=>2000,"1级世界售价"=>5000,"2级世界售价"=>10000,"3级世界售价"=>20000));
  }
  public static function getConfig():array
  {
    return isset(self::$conf) ? self::$conf->getAll() : array();
  }
}