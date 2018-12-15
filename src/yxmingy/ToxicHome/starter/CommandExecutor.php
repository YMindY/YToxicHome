<?php
namespace yxmingy\ToxicHome\starter;
use pocketmine\command\CommandSender;
interface CommandExecutor
{
  public function handleCommand(array $args,CommandSender $sender):bool;
}