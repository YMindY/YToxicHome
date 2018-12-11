<?php
namespace yxmingy\ToxicHome;
class Main extends starter\Starter
{
  public function onLoad()
  {
    self::assignInstance();
    self::info("[YToxicHome] is Loading...");
  }
  public function onEnable()
  {
    self::notice("[YToxicHome] is Enabled by xMing!");
  }
  public function onDisable()
  {
    self::warning("[YToxicHome] is Turned Off.");
  }
}