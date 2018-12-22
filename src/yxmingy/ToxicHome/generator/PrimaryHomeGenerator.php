<?php
namespace yxmingy\ToxicHome\generator;
use pocketmine\math\Vector3;
//use pocketmine\level\generator\VoidGenerator;
class PrimaryHomeGenerator extends VoidGenerator
{
  public function getSpawn() : Vector3{
    return new Vector3(0, 2, 0);
  }
}