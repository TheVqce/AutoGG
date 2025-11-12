<?php

namespace autogg;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use autogg\listener\GameListener;
use autogg\command\AutoGGCommand;

class Main extends PluginBase {

    private Config $data;

    public function onEnable(): void {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();

        $this->data = new Config($this->getDataFolder() . "data.yml", Config::YAML, []);

        $this->getServer()->getCommandMap()->register("autogg", new AutoGGCommand($this));
        $this->getServer()->getPluginManager()->registerEvents(new GameListener($this), $this);

        $this->getLogger()->info("§aAutoGG Enabled!");
    }

    public function getDataFile(): Config {
        return $this->data;
    }

    public function getMode(string $playerName): string {
        return strtolower($this->data->get(strtolower($playerName), "off"));
    }

    public function setMode(string $playerName, string $mode): void {
        $this->data->set(strtolower($playerName), strtolower($mode));
        $this->data->save();
    }

    public function sendGG(string $playerName): void {
        $message = $this->getConfig()->get("message", "§6GG §7well played!");
        $player = $this->getServer()->getPlayerExact($playerName);
        if ($player !== null) {
            $this->getServer()->broadcastMessage("§8[§6AutoGG§8] §r{$player->getName()}§7: {$message}");
        }
    }
}