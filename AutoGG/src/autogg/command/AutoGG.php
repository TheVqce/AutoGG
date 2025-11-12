<?php

namespace autogg\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use autogg\Main;

class AutoGGCommand extends Command {

    private Main $plugin;

    public function __construct(Main $plugin) {
        parent::__construct("autogg", "Toggle AutoGG mode");
        $this->plugin = $plugin;
    }

    public function execute(CommandSender $sender, string $label, array $args): void {
        if (!$sender instanceof Player) {
            $sender->sendMessage("§cRun this in-game!");
            return;
        }

        $mode = $args[0] ?? null;
        $valid = ["off", "win", "all"];

        if ($mode === null || !in_array(strtolower($mode), $valid)) {
            $current = $this->plugin->getMode($sender->getName());
            $sender->sendMessage("§eUsage: /autogg <off|win|all>");
            $sender->sendMessage("§7Current mode: §a{$current}");
            return;
        }

        $this->plugin->setMode($sender->getName(), $mode);
        $sender->sendMessage("§aAutoGG mode set to: §e{$mode}");
    }
}