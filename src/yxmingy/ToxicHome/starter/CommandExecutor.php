<?php
namespace yxmingy\ToxicHome\starter;
use pocketmine\Player;
interface CommandExecutor
{
  public function onCommand(array $args,Player $player):bool;
}