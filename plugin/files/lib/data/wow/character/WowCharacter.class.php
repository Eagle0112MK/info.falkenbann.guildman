<?php
namespace wcf\data\wow\character;
use wcf\data\JSONExtendedDatabaseObject;

/**
 * Represents a WoW Charackter
 * @author	Veneanar Falkenbann
 * @copyright	2017  2017 Sylvanas Garde - sylvanasgarde.com - distributed by falkenbann.info
 * @license	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
 * @package	info.falkenbann.guildman
 *

 * @property string		            $charID		                    Name des Charackters-Realm
 * @property integer		        $userID                         WCF UserID
 * @property integer		        $isMain			                ist Hauptchar
 * @property integer		        $inGuild		                ist in der Gilde
 * @property integer		        $realmID			            ID des realms (wow/data)
 * @property string		            $bnetdata			            Daten d. Characters JSON (api.battle.net no field)
 * @property integer		        $primaryGroup		            Primär ID der Gruppe (guid/groups)
 * @property string		            $groups			                weitere Gruppen
 * @property integer		        $bnetUpdate			            Letztes Update (intern)
 * @property integer		        $firstSeen			            Eintragedatum
 *
 * @property-read	integer			$lastModified					Aktualesierungszeitpunkt des Charakters
 * @property-read	string			$name							Name des Charakters
 * @property-read	string			$realm							Server auf dem der Character beheimatet ist
 * @property-read	string			$battlegroup					Servergruppe in dem der Character sich befindet
 * @property-read	integer			$class							Klasse des Charakters
 * @property-read	integer			$race							Rasse des Charakters
 * @property-read	integer			$gender							Geschlecht des Charakters
 * @property-read	integer			$level							Level des Charakters
 * @property-read	integer			$achievementPoints				Erfolgspunkte des Charakters
 * @property-read	string			$thumbnail						Charakterbild
 * @property-read	string			$calcClass						???
 * @property-read	integer			$faction						Fraktion des Charakters
 * @property-read	integer			$totalHonorableKills			Ehrenpunkte des Charakters
 *
 */

class WowCharacter extends JSONExtendedDatabaseObject {
	/**
	 * {@inheritDoc}
	 */
	protected static $databaseTableName = 'gman_wow_character';
	/**
	 * {@inheritDoc}
	 */
	protected static $databaseTableIndexName = 'charID';
	/**
     * {@inheritDoc}
     */
    protected static $JSONfield = 'bnetData';

    /**
     * saves the chars's avatar.
     *
     * @var	\wcf\data\user\avatar\IUserAvatar
     */
    private $avatar = null;

    /**
     * saves the chars's inset.
     *
     * @var	\wcf\data\user\avatar\IUserAvatar
     */
    private $inset = null;


    /**
     * Returns the user's avatar.
     *
     * @return	\wcf\data\user\avatar\IUserAvatar
     */
	public function getAvatar() {
        if ($this->avatar === null) {
            if ($this->thumbnail) {
                $this->avatar = new CharacterAvatar($this, "avatar");
            } else {
                $this->avatar = new DefaultCharacterAvatar("avatar");
            }
            if (!file_exists($this->avatar->getLocation()) ) {
                $this->avatar = new DefaultCharacterAvatar("avatar");
            }
        }
        return $this->avatar;
    }

    /**
     * Returns the user's inset.
     *
     * @return	\wcf\data\user\avatar\IUserAvatar
     */
	public function getInset() {
        if ($this->avatar === null) {
            if ($this->thumbnail) {
                $this->inset = new CharacterAvatar($this, "inset");
            } else {
                $this->inset = new DefaultCharacterAvatar("inset");
            }
            if (!file_exists($this->avatar->getLocation()) ) {
                $this->inset = new DefaultCharacterAvatar("inset");
            }
        }
        return $this->inset;
    }
}