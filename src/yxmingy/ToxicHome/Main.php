<?php
/*
  Date: 2018.12.11
  Author: xMing
  Editor: Quoda
  Poem:
    手持两把锟斤拷，口中疾呼烫烫烫。
    脚踏千朵屯屯屯，笑看万物锘锘锘。
  Mantra: 高内聚，低耦合。
*/
namespace yxmingy\ToxicHome;
class Main extends starter\Starter
{
  public function onLoad()
  {
    self::assignInstance();
    self::dispenseExecutors();
    self::info("[YToxicHome] is Loading...");
  }
  public function onEnable()
  {
    self::registerListeners();
    self::notice("[YToxicHome] is Enabled by xMing!");
  }
  public function onDisable()
  {
    self::warning("[YToxicHome] is Turned Off.");
  }
}