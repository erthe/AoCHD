<?php
class RecAnalystView {

    protected $recAnalyst;
    protected $recArchive;
    protected $template;
    public $fileName;
    public $maxGames = 0; // 0 = every game in archive will be analyzed
    private static $initialized = false;

    /**
     * Class constructor.
     * @return void
     */
    public function __construct() {

        if (!self::$initialized) {

            $dir = dirname(__FILE__) . '/';
            // initialize autoloader
            require_once($dir . 'recAnalyst/RecAnalystAutoloader.php');
            RecAnalystAutoloader::getInstance()->register();
            // here you can set some configuration constants (see RecAnalystConfig.php for details)
            $raConfig = RecAnalystConfig::getInstance();
            $raConfig->mapsDir = $dir . 'maps' . '/'; // don't forget to set write permission for this directory
            $raConfig->resourcesDir = $dir . 'resources/';
            // $raConfig->...
            $raConfig->researchBackgroundImage = $dir . 'resources/researches/background.jpg';
            $raConfig->researchesDir = $dir . 'researches/';

            require_once('template.php');

            // see http://www.php.net/manual/en/function.imagerotate.php#95749
            if (!function_exists('imagerotate')) {
                require_once('ImageRotator.php');
                function imagerotate($srcImg, $angle, $bgcolor = 0, $ignore_transparent = 0) {
                    return ImageRotator::imagerotate($srcImg, $angle, $bgcolor, $ignore_transparent);
                }
            }

            self::$initialized = true;
        }

        $this->recAnalyst = new RecAnalyst();
        $this->recArchive = new RecArchive();
        $this->template = new template();
        $this->fileName = '';
        $this->template->set_custom_template('templates', 'default');
    }

    /**
     * Analyzes archive.
     * @return void
     */
    public function analyze() {

        $this->recArchive->open($this->fileName);
        try {

            $files = $this->recArchive->getStats();
            if (empty($files)) {
                throw new Exception('No recorded game has been found in archive.');
            }

            if ($this->maxGames > 0) {
                $files = array_slice($files, 0, $this->maxGames);
            }

            $fileId = 0;
            foreach ($files as $file) {

                $this->recAnalyst->load($file['name'], $this->recArchive->getFileHandler($file['name']));
                if (!$this->recAnalyst->analyze()) {
                    continue;
                }

                $fileId++;
                $mapFileName = sprintf('map_%s.png', substr(md5(uniqid(mt_rand(), true)), 0, 8));
/*               
 if (!$this->recAnalyst->generateMap($mapFileName)) {
                    // here you can set the default map image according to the map set in the game.
                    $mapFileName = '';
                }
*/
                $researchesFileName = sprintf('researches_%s.png', substr(md5(microtime()), 0, 8));
                if ($this->recAnalyst->generateResearches($researchesFileName)) {
                    $imageMap = $this->recAnalyst->generateResearchesImageMap();
                } else {
                    $researchesFileName = '';
                    $imageMap = array();
                }
		mb_language('Japanese');
                $this->template->assign_block_vars('game', array(
                    'ID' => $fileId,
                    'FILENAME' => $file['name'],
                    'ANALYZE_TIME' => sprintf('Analyzed in %1.2f seconds.', $this->recAnalyst->getAnalyzeTime() / 1000),

                    'RESEARCHES_FILENAME' => $researchesFileName,

                    'MAP_FILENAME' => $mapFileName,
                    'GAME_TYPE' => $this->recAnalyst->gameSettings->getGameTypeString(),
                    'MAP_STYLE' => $this->recAnalyst->gameSettings->getMapStyleString(),
                    'MAP' => $this->recAnalyst->gameSettings->map,
                    'PLAYERS' => $this->recAnalyst->gameInfo->getPlayersString(),
                    'PLAYTIME' => RecAnalyst::gameTimeToString($this->recAnalyst->gameInfo->playTime),
                    'DIFFICULTY_LEVEL' => $this->recAnalyst->gameSettings->getDifficultyLevelString(),
                    'POP_LIMIT' => $this->recAnalyst->gameSettings->popLimit,
                    'REVEAL_MAP' => $this->recAnalyst->gameSettings->getRevealMapString(),
                    'MAP_SIZE' => $this->recAnalyst->gameSettings->getMapSizeString(),
                    'GAME_SPEED' => $this->recAnalyst->gameSettings->getGameSpeedString(),
                    'LOCK_DIPLOMACY' => $this->recAnalyst->gameSettings->lockDiplomacy ? 'Yes' : 'No',
                    'POV' => $this->recAnalyst->gameInfo->getPOV(),
                    'VICTORY' => $this->recAnalyst->gameSettings->victory->getVictoryString(),
                    'GAME_VERSION' => $this->recAnalyst->gameInfo->getGameVersionString()
                ));

                if (!empty($imageMap)) {
                    foreach ($imageMap as $area) {
                        $this->template->assign_block_vars('game.area', array(
                            'COORDS'    => $area[0],
                            'TITLE'     => $area[1]
                        ));
                    }
                }

                foreach ($this->recAnalyst->pregameChatMessages as $chatMessage) {
                    $this->template->assign_block_vars('game.pregamemessage', array(
                        'COLOR' => isset($chatMessage->player) ? RecAnalystConst::$COLORS[$chatMessage->player->colorId] : '#000', // may be undefined, if a message is from player who left game before it starts
                        'TEXT'  => $chatMessage->msg
                    ));
                }

                foreach ($this->recAnalyst->ingameChatMessages as $chatMessage) {
                    $this->template->assign_block_vars('game.ingamemessage', array(
                        'COLOR' => isset($chatMessage->player) ? RecAnalystConst::$COLORS[$chatMessage->player->colorId] : '#000', // age advances messages have no player information
                        'TIME'  => RecAnalyst::gameTimeToString($chatMessage->time),
                        'TEXT'  => $chatMessage->msg
                    ));
                }

                arsort($this->recAnalyst->units);
                foreach ($this->recAnalyst->units as $unit_type_id => $unit_num) {
                    $this->template->assign_block_vars('game.unit', array(
                        'NAME'  => RecAnalystConst::$UNITS[$unit_type_id][0],
                        'IMAGE' => RecAnalystConst::$UNITS[$unit_type_id][1] . RecAnalystConst::IMG_EXT,
                        'COUNT' => $unit_num
                    ));
                }

                foreach ($this->recAnalyst->buildings as $player_id => $buildings) {
                    $player = $this->recAnalyst->players->getPlayerByIndex($player_id);
                    $this->template->assign_block_vars('game.player', array(
                        'NAME' => $player->name,
                    	'ID' => $player->index
                    ));
                    //var_dump($buildings);
                    foreach ($buildings as $building_type_id => $building_num) {
                    	$this->template->assign_block_vars('game.player.building', array(
                    			'NAME'  => RecAnalystConst::$BUILDINGS[$building_type_id][0],
                    			'IMAGE' => RecAnalystConst::$BUILDINGS[$building_type_id][1] . RecAnalystConst::IMG_EXT,
                    			'COUNT' => $building_num
                    	));
                    }
                }
                /*
                foreach ($this->recAnalyst->players as $player_id => $initialState) {
                	$player = $this->recAnalyst->players->getPlayerByIndex($player_id);
                	var_dump($player);
                	$this->template->assign_block_vars('game.player', array(
                			'NAME' => $player->name
                	));
                	foreach ($initialState as $building_type_id => $building_num) {
                		$this->template->assign_block_vars('game.player.building', array(
                				'WOOD'  => RecAnalystConst::$RESOURCES[$wood],
                				'FOOD' => RecAnalystConst::$RESOURCES[$food],
                				'GOLD'  => RecAnalystConst::$RESOURCES[$gold],
                				'STONE'  => RecAnalystConst::$RESOURCE[$stone]
                		));
                	}
                }*/

                foreach ($this->recAnalyst->teams as $team) {

                    $this->template->assign_block_vars('game.team', array());
                    foreach ($team as $player) {

                        $player_hint = sprintf('領主: %s<br /> 城主: %s <br />帝王: %s',
                            RecAnalyst::gameTimeToString($player->feudalTime),
                            RecAnalyst::gameTimeToString($player->castleTime),
                            RecAnalyst::gameTimeToString($player->imperialTime));
                        if ($player->resignTime)
                            $player_hint .= sprintf('<br />放棄: %s', RecAnalyst::gameTimeToString($player->resignTime));

                        $this->template->assign_block_vars('game.team.player', array(
                            'NAME' => $player->name,
                            'CIV_IMAGE' => sprintf('%d/%s', $player->colorId, RecAnalystConst::$CIVS[$player->civId][1] . RecAnalystConst::IMG_EXT),
                            'CIV' => $player->getCivString(),
                            'FEUDALTIME' => RecAnalyst::gameTimeToString($player->feudalTime),
                            'CASTLETIME' => RecAnalyst::gameTimeToString($player->castleTime),
                            'IMPERIALTIME' => RecAnalyst::gameTimeToString($player->imperialTime),
                            'RESIGNTIME' => ($player->resignTime) ? RecAnalyst::gameTimeToString($player->resignTime) : 0,
                            'COLOR' => RecAnalystConst::$COLORS[$player->colorId],
                            'HINT' => $player_hint
                        ));
                    }
                }
                $this->recAnalyst->reset();
            }
            $this->recArchive->close();
        }
        catch (RecAnalystException $e) {

            $this->recAnalyst->reset();
            throw $e;
        }
        catch (Exception $e) {

            $this->recArchive->close();
            throw $e;
        }
    }

    public function __toString() {

        $this->template->set_filenames(array(
            'body' => 'game_details.html'
        ));

        return $this->template->assign_display('body', '', true);
    }
}
