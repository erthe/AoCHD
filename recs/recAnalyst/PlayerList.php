﻿<?php
/**
 * Defines PlayerList class.
 *
 * @package recAnalyst
 * @version $Id: PlayerList.php 52 2012-06-01 10:05:24Z biegleux $
 * @author biegleux <biegleux[at]gmail[dot]com>
 * @copyright copyright (c) 2008-2012 biegleux
 * @license http://www.opensource.org/licenses/gpl-3.0.html GNU General Public License version 3 (GPLv3)
 * @link http://recanalyst.sourceforge.net/
 * @filesource
 */

/**
 * Class PlayerList.
 *
 * PlayerList implements list of players in a game.
 * @package recAnalyst
 */
class PlayerList extends TList {

	/**
	 * Adds a player to the list.
	 *
	 * @param Player $player The player we wish to add
	 * @return void
	 */
	public function addPlayer(Player $player) {

		parent::addItem($player);
	}

	/**
	 * Returns a player at the specified offset.
	 *
	 * @param int An index of the player
	 * @return Player|bool The player at the index or false if the index is out of the range
	 */
	public function getPlayer($index) {

		return parent::getItem($index);
	}

	/**
	 * Returns a player with the index property equal to the one defined.
	 *
	 * @param int $index Player's index
	 * @return Player|bool False if no player has been found
	 */
	public function getPlayerByIndex($index) {

		for ($i = 0; $i < $this->_count; $i++) {
			if ($this->_list[$i]->index == $index) {
				return $this->_list[$i];
			}
		}

		return false;
	}
}
?>