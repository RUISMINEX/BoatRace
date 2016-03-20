<?php
namespace Sandertv\BoatRacePE\Tasks;

use BukkitPE\scheduler\PluginTask;
use BukkitPE\level\Level;
use BukkitPE\Player;
use BukkitPE\Server;
use BukkitPE\tile\Sign;
use BukkitPE\scheduler\Task;
use BukkitPE\scheduler\ServerScheduler;
use BukkitPE\level\Position;
use BukkitPE\math\Vector3;
class SignUpdaterTask extends PluginTask
{
    public $f = 0;
    public function __construct(\Sandertv\BoatRacePE\BoatRacePE $plugin)
    {
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    public function onRun($tick)
    {
        $this->f++;
        if($this->f > 15){
            $t = $this->plugin->getServer()->getLevelByName($this->plugin->yml["sign_world"])->getTile(new Vector3($this->plugin->yml["sign_join_x"], $this->plugin->yml["sign_join_y"], $this->plugin->yml["sign_join_z"]));
            if ($t instanceof Sign) {
                if ($this->plugin->gameStarted == true) {
                    $t->setText(
                        "§l§bBoat§eRace",
                        "§l§cRed Team : " . count($this->plugin->reds),
                        "§l§bBlue Team : " . count($this->plugin->blues),
                        "§aStarted"
                    );
                } elseif ($this->plugin->gameStarted == false && count($this->plugin->reds) == 5 && count($this->plugin->blues) == 5) {
                    $t->setText(
                        "§l§bBoat§eRace",
                        "§l§cRed Team : " . count($this->plugin->reds),
                        "§l§bBlue Team : " . count($this->plugin->blues),
                        "§aFull"
                    );
                } elseif ($this->plugin->gameStarted == false && !count($this->plugin->reds) < 5 && !count($this->plugin->blues) < 5) {
                    $t->setText(
                        "§l§bBoat§eRace",
                        "§l§cRed Team : " . count($this->plugin->reds),
                        "§l§bBlue Team : " . count($this->plugin->blues),
                        "§aTap To Join!"
                    );
                }
            }
        }
    }
}//Class
