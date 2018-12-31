<?php
namespace yxmingy\ToxicHome\generator;
use pocketmine\Server;
use pocketmine\level\generator\GeneratorManager as GManager;
use pocketmine\math\Vector3;
class GeneratorManager
{
  private static $generators = 
  [
    "YTHome"=>PrimaryHomeGenerator::class,
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
  public static function generateLevel(string $name):bool
  {
    $server = Server::getInstance();
    $identifier = "ythome_".$name;
    $status = $server->generateLevel($identifier,null,self::getGenerator("YTHome"));
    if($status)
    {
      $server->loadLevel($identifier);
      $level = $server->getLevelByName($identifier);
      $level->setSpawnLocation(new Vector3(0,2,0));
    }
    return $status;
  }
}