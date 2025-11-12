<?php

namespace autogg\listener;

use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\event\player\PlayerDeathEvent;
use autogg\Main;

class GameListener implements Listener {

    private Main $plugin;

    public function __construct(Main $plugin) {
        $this->plugin = $plugin;
    }

    public function onDeath(PlayerDeathEvent $event): void {
        $victim = $event->getPlayer();
        $killer = $victim->getLastDamageCause()?->getAttacker();

        if ($killer instanceof Player) {
            // Winner logic
            $mode = $this->plugin->getMode($killer->getName());
            if ($mode === "win" || $mode === "all") {
                $this->plugin->sendGG($killer->getName());
            }
        }

        // Loser logic (if mode == all)
        $modeVictim = $this->plugin->getMode($victim->getName());
        if ($modeVictim === "all") {
            $this->plugin->sendGG($victim->getName());
        }
    }
}