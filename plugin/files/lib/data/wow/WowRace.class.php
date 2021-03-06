<?php
namespace wcf\data\wow;
use wcf\data\DatabaseObject;

/**
 * Represents a WoW Rassen
 * @author	Veneanar Falkenbann
 * @copyright	2017  2017 Sylvanas Garde - sylvanasgarde.com - distributed by falkenbann.info
 * @license	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
 * @package	info.falkenbann.guildman
 *
 * @property 		 			 PRIMARY KEY
 * @property integer		 $wraceID
 * @property integer		 $mask
 * @property string		 $side
 * @property integer		 $sideID
 * @property string		 $name
 *
 */

class WowRace extends DatabaseObject {
	/**
     * {@inheritDoc}
	 */
	protected static $databaseTableName = 'gman_wow_races';
	/**
	 * {@inheritDoc}
	 */
	protected static $databaseTableIndexName = '';

}