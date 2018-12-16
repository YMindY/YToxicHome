<?php
namespace yxmingy\ToxicHome\starter;
class a implements CommandExecutor{
public function handleCommand(array $args,\pocketmine\command\CommandSender $sender):bool{
  $sender->sendMessage("a");
  var_dump($args);
  return true;
}
}