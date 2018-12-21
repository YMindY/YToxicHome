<?php
namespace yxmingy\ToxicHome\generator;
use pocketmine\Server;
use pocketmine\level\generator\GeneratorManager as GManager;
class GeneratorManager
{
  private static $generators = 
  [
    "YTHome0"=>PrimaryHomeGenerator::class,
  ];
  public static function registerGenerators():void
  {
    foreach(self::$generators as $name=>$generator)
    {
      GManager::addGenerator($generator, $name);
    }
  }
  public static function getGenerator(string $name): ?string
  {
    return self::$generators[$name] ?? null;
  }
  public static function generateLevel(string $name,string $gen):bool
  {
    return Server::getInstance()->generateLevel("ythome_".$name,null,self::getGenerator("YTHome".$gen));
  }
}