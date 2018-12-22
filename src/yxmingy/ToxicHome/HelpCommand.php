<?php
namespace yxmingy\ToxicHome;
use yxmingy\ToxicHome\starter\CommandExecutor;
use pocketmine\command\CommandSender;
class HelpCommand implements CommandExecutor
{
  public function handleCommand(array $args,CommandSender $sender):bool
  {
    $sender->sendMessage(
    "--- YToxicHome 家园系统 ---\n".
    "  /hs help -- 查看帮助\n".
    "  /hs buy  -- 购买家园\n".
    "  /hs up   -- 升级家园\n"
    );
    return true;
  }
}