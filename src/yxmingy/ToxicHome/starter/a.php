<?php
namespace yxmingy\ToxicHome\starter;
class a implements CommandExecutor{
public function handleCommand(array $args,\pocketmine\command\CommandSender $player):bool{
  $sender->sendMessage("a");
  return true;
}
}