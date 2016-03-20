<?php
namespace Sandertv\BoatRacePE\Tasks;

use BukkitPE\scheduler\PluginTask;
use BukkitPE\level\Level;
use BukkitPE\Player;
use BukkitPE\tile\Sign;
use BukkitPE\scheduler\Task;
use BukkitPE\scheduler\ServerScheduler;
use BukkitPE\level\Position;
use BukkitPE\math\Vector3;

class GameWaitingTask extends PluginTask
{
    public function __construct(\Sandertv\BoatRacePE\BoatRacePE $plugin)
    {
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    public function onRun($tick)
    {
        foreach ($this->plugin->reds as $r) {
            foreach ($this->plugin->blues as $b) {
                $this->plugin->getServer()->getPlayer($r)->sendPopup("§eWaiting for players..");
                $this->plugin->getServer()->getPlayer($b)->sendPopup("§eWaiting for players..");
            }
        }
    }
}
