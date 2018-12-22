<?php
namespace yxmingy\ToxicHome;
use pocketmine\event\Listener;
use pocketmine\event\player\
{PlayerJoinEvent,PlayerQuitEvent};
class HomeManager implements Listener
{
  private static function $conf;
  public function __construct()
  {
    self::$conf = Main::getInstance()->getDataFolder()."/homes/";
  }
  public static function addHome(string $name,int $level):void
  {
    new Config(self::$conf.$name.".yml",Config::YAML,array("家园等级"=>$level,"允许非好友进入"=>false,"传送点"=>array()));
  }
  public static function getHome($name):?Config
  {
    return new Config(self::$conf.$name.".yml",Config::YAML);
  }
  public function onPlayerJoin(PlayerJoinEvent $event):void
  {
    
  }
  public function onPlayerQuit(Player QuitEvent $event):void
  {
    
  }
}