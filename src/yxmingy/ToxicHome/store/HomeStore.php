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
    self::$conf = new Config(Main::getInstance()->getDataFolder()."/store.yml",Config::YAML,array("0级世界"=>["售价"=>2000,"大小"=>9],"1级世界"=>["售价"=>5000,"大小"=>63],"2级世界"=>["售价"=>2000,"大小"=>127],"3级世界"=>["售价"=>2000,"大小"=>255]));
  }
  public static function getConfig():array
  {
    return isset(self::$conf) ? self::$conf->getAll() : array();
  }
}