<?php

/* 
 * Copyright (C) 2017 RTG
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace RTG\TaskMCPE;

/* Essentials */
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

use pocketmine\scheduler\PluginTask;

use RTG\TaskMCPE\Loader;

class Task extends PluginTask {
    
    public $plugin;

    public function __construct(Loader $plugin) {
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    
    public function onRun($currentTick) {
        
        $cfg = $this->plugin->config->getAll();
            foreach($cfg['command'] as $cmd) {
                $this->plugin->getServer()->dispatchCommand(new \pocketmine\command\ConsoleCommandSender(), $cmd);
            }
    }
    
}
