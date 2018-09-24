<?php
/**
 * Defines Victory class.
 *
 * @package recAnalyst
 * @version $Id: Victory.php 13 2013-11-30 09:12:37Z mittermeyer $
 * @author biegleux <biegleux[at]gmail[dot]com>
 * @copyright copyright (c) 2009-2012 biegleux
 * @license http://www.opensource.org/licenses/gpl-3.0.html GNU General Public License version 3 (GPLv3)
 * @link http://recanalyst.sourceforge.net/
 * @filesource
 */

/**
 * Class Victory.
 *
 * Victory implements game's victory settings.
 * @package recAnalyst
 */
class Victory {

    /**
     * Time limit.
     * @var int
     */
    public $_timeLimit;

    /**
     * Score limit.
     * @var int
     */
    public $_scoreLimit;

    /**
     * Victory condition.
     * @see VictoryCondition
     * @var int
     */
    public $_victoryCondition;

    /**
     * Class constructor.
     * @return void
     */
    public function __construct() {

        $this->_timeLimit = $this->_scoreLimit = 0;
        $this->_victoryCondition = VictoryCondition::STANDARD;
    }

    /**
     * Returns victory string.
     * @return string
     */
    public function getVictoryString() {

        if (!isset(RecAnalystConst::$VICTORY_CONDITIONS[$this->_victoryCondition])) {
            return '';
        }

        $result = RecAnalystConst::$VICTORY_CONDITIONS[$this->_victoryCondition];

        switch ($this->_victoryCondition) {

            case VictoryCondition::TIMELIMIT:
                if ($this->_timeLimit) {
                    return sprintf('%s (%d 年)', $result, $this->_timeLimit);
                }
                break;
            case VictoryCondition::SCORELIMIT:
                if ($this->_scoreLimit) {
                    return sprintf('%s (%d)', $result, $this->_scoreLimit);
                }
                break;
        }

        return $result;
    }
}