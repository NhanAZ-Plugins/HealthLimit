<?php

declare(strict_types=1);

namespace NhanAZ\HealthLimit;

use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;

class Main extends PluginBase implements Listener {
	private int $healthLimit;

	protected function onEnable(): void {
		$this->saveDefaultConfig();
		$configuredLimit = $this->getConfig()->get("healthLimit", 2);
		if (!is_int($configuredLimit) || $configuredLimit < 1) {
			$this->getLogger()->warning("healthLimit must be a positive integer. Using 2 without changing config.yml.");
			$configuredLimit = 2;
		}
		$this->healthLimit = $configuredLimit;
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	private function setHealth(Player $player): void {
		$player->setMaxHealth($this->healthLimit);
		$player->setHealth($player->getMaxHealth());
	}

	public function onPlayerJoin(PlayerJoinEvent $event): void {
		$this->setHealth($event->getPlayer());
	}

	public function onPlayerRespawn(PlayerRespawnEvent $event): void {
		$this->setHealth($event->getPlayer());
	}
}
