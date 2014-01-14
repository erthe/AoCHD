-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成日時: 2014 年 1 月 10 日 17:03
-- サーバのバージョン: 5.0.90-log
-- PHP のバージョン: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `erthejhg`
--
CREATE DATABASE `erthejhg` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `erthejhg`;

-- --------------------------------------------------------

--
-- テーブルの構造 `gamelog`
--

CREATE TABLE IF NOT EXISTS `gamelog` (
  `gamelog_id` int(11) NOT NULL auto_increment,
  `created_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `game_end` datetime default '0000-00-00 00:00:00',
  `game_status` tinyint(4) default NULL,
  `win_team` tinyint(4) default NULL,
  `lose_team` tinyint(4) default NULL,
  `team1_rate` smallint(6) NOT NULL,
  `team2_rate` smallint(6) NOT NULL,
  `player1_team` tinyint(4) default NULL,
  `player2_team` tinyint(4) NOT NULL default '2',
  `player3_team` tinyint(4) default NULL,
  `player4_team` tinyint(4) default NULL,
  `player5_team` tinyint(4) default NULL,
  `player6_team` tinyint(4) default NULL,
  `player7_team` tinyint(4) NOT NULL,
  `player8_team` tinyint(4) default NULL,
  `player1_id` int(11) NOT NULL,
  `player2_id` int(11) NOT NULL,
  `player3_id` int(11) default NULL,
  `player4_id` int(11) default NULL,
  `player5_id` int(11) default NULL,
  `player6_id` int(11) default NULL,
  `player7_id` int(11) default NULL,
  `player8_id` int(11) default NULL,
  `player1_name` varchar(45) NOT NULL,
  `player2_name` varchar(45) default NULL,
  `player3_name` varchar(45) default NULL,
  `player4_name` varchar(45) default NULL,
  `player5_name` varchar(45) default NULL,
  `player6_name` varchar(45) default NULL,
  `player7_name` varchar(45) default NULL,
  `player8_name` varchar(45) default NULL,
  `player1_rate` smallint(6) NOT NULL,
  `player2_rate` smallint(6) NOT NULL,
  `player3_rate` smallint(6) default NULL,
  `player4_rate` smallint(6) default NULL,
  `player5_rate` smallint(6) default NULL,
  `player6_rate` smallint(6) default NULL,
  `player7_rate` smallint(6) default NULL,
  `player8_rate` smallint(6) default NULL,
  `player1_win` int(11) default NULL,
  `player1_lose` int(11) default NULL,
  `player1_streak` int(11) default NULL,
  `player1_win_streak` int(11) default NULL,
  `player1_lose_streak` int(11) default NULL,
  `player2_win` int(11) default NULL,
  `player2_lose` int(11) default NULL,
  `player2_streak` int(11) default NULL,
  `player2_win_streak` int(11) default NULL,
  `player2_lose_streak` int(11) default NULL,
  `player3_win` int(11) default NULL,
  `player3_lose` int(11) default NULL,
  `player3_streak` int(11) default NULL,
  `player3_win_streak` int(11) default NULL,
  `player3_lose_streak` int(11) default NULL,
  `player4_win` int(11) default NULL,
  `player4_lose` int(11) default NULL,
  `player4_streak` int(11) default NULL,
  `player4_win_streak` int(11) default NULL,
  `player4_lose_streak` int(11) default NULL,
  `player5_win` int(11) default NULL,
  `player5_lose` int(11) default NULL,
  `player5_streak` int(11) default NULL,
  `player5_win_streak` int(11) default NULL,
  `player5_lose_streak` int(11) default NULL,
  `player6_win` int(11) default NULL,
  `player6_lose` int(11) default NULL,
  `player6_streak` int(11) default NULL,
  `player6_win_streak` int(11) default NULL,
  `player6_lose_streak` int(11) default NULL,
  `player7_win` int(11) default NULL,
  `player7_lose` int(11) default NULL,
  `player7_streak` int(11) default NULL,
  `player7_win_streak` int(11) default NULL,
  `player7_lose_streak` int(11) default NULL,
  `player8_lose` int(11) default NULL,
  `player8_win` int(11) default NULL,
  `player8_streak` int(11) default NULL,
  `player8_win_streak` int(11) default NULL,
  `player8_lose_streak` int(11) default NULL,
  `player1_maxrate` smallint(6) default NULL,
  `player2_maxrate` smallint(6) default NULL,
  `player3_maxrate` smallint(6) default NULL,
  `player4_maxrate` smallint(6) default NULL,
  `player5_maxrate` smallint(6) default NULL,
  `player6_maxrate` smallint(6) default NULL,
  `player7_maxrate` smallint(6) default NULL,
  `player8_maxrate` smallint(6) default NULL,
  PRIMARY KEY  (`gamelog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- テーブルのデータのダンプ `gamelog`
--

INSERT INTO `gamelog` (`gamelog_id`, `created_on`, `game_end`, `game_status`, `win_team`, `lose_team`, `team1_rate`, `team2_rate`, `player1_team`, `player2_team`, `player3_team`, `player4_team`, `player5_team`, `player6_team`, `player7_team`, `player8_team`, `player1_id`, `player2_id`, `player3_id`, `player4_id`, `player5_id`, `player6_id`, `player7_id`, `player8_id`, `player1_name`, `player2_name`, `player3_name`, `player4_name`, `player5_name`, `player6_name`, `player7_name`, `player8_name`, `player1_rate`, `player2_rate`, `player3_rate`, `player4_rate`, `player5_rate`, `player6_rate`, `player7_rate`, `player8_rate`, `player1_win`, `player1_lose`, `player1_streak`, `player1_win_streak`, `player1_lose_streak`, `player2_win`, `player2_lose`, `player2_streak`, `player2_win_streak`, `player2_lose_streak`, `player3_win`, `player3_lose`, `player3_streak`, `player3_win_streak`, `player3_lose_streak`, `player4_win`, `player4_lose`, `player4_streak`, `player4_win_streak`, `player4_lose_streak`, `player5_win`, `player5_lose`, `player5_streak`, `player5_win_streak`, `player5_lose_streak`, `player6_win`, `player6_lose`, `player6_streak`, `player6_win_streak`, `player6_lose_streak`, `player7_win`, `player7_lose`, `player7_streak`, `player7_win_streak`, `player7_lose_streak`, `player8_lose`, `player8_win`, `player8_streak`, `player8_win_streak`, `player8_lose_streak`, `player1_maxrate`, `player2_maxrate`, `player3_maxrate`, `player4_maxrate`, `player5_maxrate`, `player6_maxrate`, `player7_maxrate`, `player8_maxrate`) VALUES
(6, '2013-12-27 02:07:10', '2013-12-27 11:07:17', 0, 1, 2, 6963, 6884, 1, 2, 1, 2, 1, 2, 1, 2, 51, 61, 59, 43, 34, 3, 20, 35, 'oyacchan', 'Mutti[JP]', 'Alicia_san', 'trash[JP]', 'erlkonig', 'iPhone', 'konitan12', 'toki-u', 2113, 1600, 1500, 1800, 1600, 1884, 1750, 1600, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2013-12-27 01:05:08', '2013-12-27 10:05:10', 0, 1, 2, 1900, 1900, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'koujan', 'iPhone', NULL, NULL, NULL, NULL, NULL, NULL, 1900, 1900, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2013-12-27 02:09:39', '2013-12-27 11:09:42', 0, 2, 1, 7200, 7154, 1, 2, 1, 2, 1, 2, 1, 2, 21, 61, 1, 14, 24, 3, 31, 17, 'Weltseele', 'Mutti[JP]', 'dystopia', 'okixile', 'messagebox.jp', 'iPhone', 'TEATEA', 'haskaop', 1900, 1585, 1900, 1900, 1700, 1869, 1700, 1800, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2013-12-27 02:13:23', '2013-12-27 11:13:33', 0, 1, 2, 1601, 1885, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'Mutti[JP]', 'iPhone', NULL, NULL, NULL, NULL, NULL, NULL, 1601, 1885, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2013-12-27 02:15:20', '2013-12-27 11:15:24', 0, 2, 1, 6743, 6343, 1, 2, 1, 2, 1, 2, 1, 2, 51, 61, 66, 58, 44, 34, 59, 55, 'oyacchan', 'Mutti[JP]', 'areios_zero', 'ab_trimmer', 'saikoro', 'erlkonig', 'Alicia_san', 'akito_TTI', 2128, 1628, 1500, 1500, 1600, 1615, 1515, 1600, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2013-12-27 02:15:52', '2013-12-27 11:15:56', 0, 1, 2, 3433, 3384, 1, 2, 1, 2, NULL, NULL, 0, NULL, 61, 24, 43, 42, NULL, NULL, NULL, NULL, 'Mutti[JP]', 'messagebox.jp', 'trash[JP]', 'JPZealot[JP]', NULL, NULL, NULL, NULL, 1648, 1684, 1785, 1700, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2013-12-27 02:17:36', '2013-12-27 11:17:39', 0, 2, 1, 6801, 6763, 1, 2, 1, 2, 1, 2, 1, 2, 49, 61, 35, 13, 26, 36, 14, 73, 'unkobox360', 'Mutti[JP]', 'toki-u', 'Horatio', 'pokeke', 'dsk', 'okixile', 'ungatoDYG', 1600, 1663, 1585, 1900, 1700, 1700, 1916, 1500, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2013-12-27 02:18:43', '2013-12-27 11:18:48', 0, 1, 2, 6679, 6600, 1, 2, 1, 2, 1, 2, 1, 2, 61, 40, 33, 32, 11, 63, 60, 25, 'Mutti[JP]', 'Nishi', 'mjkxw129', 'M94', 'komogkomog', 'jukuchou', 'kazz.ito', 'hmtarou', 1679, 1600, 1600, 1700, 1900, 1600, 1500, 1700, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2013-12-27 02:19:55', '2013-12-27 11:20:02', 0, 2, 1, 6758, 6652, 1, 2, 1, 2, 1, 2, 1, 2, 78, 61, 45, 56, 38, 3, 51, 68, 'hisukai', 'Mutti[JP]', 'P_yatta', 'hakusan', 'shohe shohe', 'iPhone', 'oyacchan', 'yoshiDYG', 1400, 1694, 1600, 1600, 1650, 1858, 2108, 1500, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2013-12-27 02:23:24', '2013-12-27 11:23:26', 0, 1, 2, 1711, 3015, 1, 2, NULL, 2, NULL, NULL, 0, NULL, 61, 58, NULL, 59, NULL, NULL, NULL, NULL, 'Mutti[JP]', 'ab_trimmer', NULL, 'Alicia_san', NULL, NULL, NULL, NULL, 1711, 1520, NULL, 1495, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2013-12-27 02:24:10', '2013-12-27 11:24:21', 0, 2, 1, 5675, 5577, 1, 2, 1, 2, 1, 2, 0, NULL, 3, 61, 21, 14, 2, 11, NULL, NULL, 'iPhone', 'Mutti[JP]', 'Weltseele', 'okixile', 'koujan', 'komogkomog', NULL, NULL, 1875, 1762, 1884, 1900, 1916, 1915, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2013-12-27 02:24:36', '2013-12-27 11:24:38', 0, 1, 2, 1779, 1800, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 61, 43, NULL, NULL, NULL, NULL, NULL, NULL, 'Mutti[JP]', 'trash[JP]', NULL, NULL, NULL, NULL, NULL, NULL, 1779, 1800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2013-12-27 02:28:43', '2013-12-27 11:28:46', 0, 1, 2, 1884, 1796, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 1, 61, NULL, NULL, NULL, NULL, NULL, NULL, 'dystopia', 'Mutti[JP]', NULL, NULL, NULL, NULL, NULL, NULL, 1884, 1796, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2013-12-27 02:29:02', '2013-12-27 11:29:04', 0, 1, 2, 1784, 1783, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 61, 43, NULL, NULL, NULL, NULL, NULL, NULL, 'Mutti[JP]', 'trash[JP]', NULL, NULL, NULL, NULL, NULL, NULL, 1784, 1783, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2013-12-27 02:29:30', '0000-00-00 00:00:00', 2, NULL, NULL, 3158, 3280, 1, 2, 1, 2, NULL, NULL, 0, NULL, 89, 61, 3, 66, NULL, NULL, NULL, NULL, 'muko', 'Mutti[JP]', 'iPhone', 'areios_zero', NULL, NULL, NULL, NULL, 1300, 1800, 1858, 1480, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2013-12-27 02:29:34', '0000-00-00 00:00:00', 2, NULL, NULL, 3232, 3280, 1, 2, 1, 2, NULL, NULL, 0, NULL, 89, 61, 11, 66, NULL, NULL, NULL, NULL, 'muko', 'Mutti[JP]', 'komogkomog', 'areios_zero', NULL, NULL, NULL, NULL, 1300, 1800, 1932, 1480, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2013-12-27 02:29:36', '0000-00-00 00:00:00', 2, NULL, NULL, 3232, 3280, 1, 2, 1, 2, NULL, NULL, 0, NULL, 89, 61, 11, 66, NULL, NULL, NULL, NULL, 'muko', 'Mutti[JP]', 'komogkomog', 'areios_zero', NULL, NULL, NULL, NULL, 1300, 1800, 1932, 1480, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2013-12-27 02:29:42', '2013-12-27 11:29:48', 0, 2, 1, 3232, 3280, 1, 2, 1, 2, NULL, NULL, 0, NULL, 89, 61, 11, 66, NULL, NULL, NULL, NULL, 'muko', 'Mutti[JP]', 'komogkomog', 'areios_zero', NULL, NULL, NULL, NULL, 1300, 1800, 1932, 1480, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2013-12-27 13:38:43', '0000-00-00 00:00:00', 2, NULL, NULL, 1896, 1669, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 1, 24, NULL, NULL, NULL, NULL, NULL, NULL, 'dystopia', 'messagebox.jp', NULL, NULL, NULL, NULL, NULL, NULL, 1896, 1669, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2013-12-27 13:39:19', '0000-00-00 00:00:00', 2, NULL, NULL, 1896, 1669, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 1, 24, NULL, NULL, NULL, NULL, NULL, NULL, 'dystopia', 'messagebox.jp', NULL, NULL, NULL, NULL, NULL, NULL, 1896, 1669, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2013-12-28 00:07:47', '2013-12-28 09:07:59', 0, 2, 1, 1600, 1800, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1600, 1800, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2013-12-28 07:21:11', '2013-12-28 17:25:58', 0, 1, 2, 6467, 6502, 1, 2, 1, 2, 1, 2, 1, 2, 43, 93, 39, 58, 107, 104, 108, 38, 'trash[JP]', 'noname', 'amaguriya', 'ab_trimmer', 'Anago', 'Sokk', 'yosimi', 'shohe shohe', 1767, 1700, 1600, 1469, 1400, 1700, 1700, 1633, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2013-12-28 17:46:34', '2013-12-29 02:46:13', 0, 2, 1, 6300, 6349, 1, 2, 1, 2, 1, 2, 1, 2, 37, 110, 109, 20, 43, 70, 56, 104, 'pttn', 'tamapopopo', 'mako', 'konitan12', 'trash[JP]', 'HustlerOne', 'hakusan', 'Sokk', 1600, 1400, 1300, 1765, 1783, 1500, 1617, 1684, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2013-12-28 17:59:41', '2013-12-29 03:33:51', 0, 2, 1, 6551, 6683, 1, 2, 1, 2, 1, 2, 1, 2, 43, 72, 111, 17, 51, 21, 109, 102, 'trash[JP]', 'mattew', 'ELunkoman', 'haskaop', 'oyacchan', 'Weltseele', 'mako', 'curokuro', 1767, 1500, 1900, 1816, 1600, 1867, 1284, 1500, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2013-12-28 19:22:05', '2013-12-29 04:21:52', 0, 1, 2, 6710, 6748, 1, 2, 1, 2, 1, 2, 1, 2, 21, 51, 93, 17, 112, 44, 59, 43, 'Weltseele', 'oyacchan', 'noname', 'haskaop', 'kgwryk28', 'saikoro', 'Alicia_san', 'trash[JP]', 1882, 1585, 1684, 1831, 1700, 1580, 1444, 1752, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2013-12-29 07:43:47', '0000-00-00 00:00:00', 2, NULL, NULL, 1600, 1808, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1600, 1808, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2013-12-29 07:44:55', '2013-12-29 17:59:23', 0, 1, 2, 1600, 1808, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1600, 1808, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2013-12-29 08:08:02', '2013-12-29 17:08:54', 0, 2, 1, 1736, 1917, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 43, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'trash[JP]', 'komogkomog', NULL, NULL, NULL, NULL, NULL, NULL, 1736, 1917, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2013-12-29 11:12:06', '0000-00-00 00:00:00', 2, NULL, NULL, 1727, 1600, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 43, 61, NULL, NULL, NULL, NULL, NULL, NULL, 'trash[JP]', 'Mutti[JP]', NULL, NULL, NULL, NULL, NULL, NULL, 1727, 1600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2013-12-29 11:39:07', '0000-00-00 00:00:00', 2, NULL, NULL, 1624, 1784, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1624, 1784, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2013-12-29 13:52:32', '2013-12-29 22:53:17', 0, 1, 2, 6575, 6527, 1, 2, 1, 2, 1, 2, 1, 2, 58, 43, 104, 93, 3, 117, 44, 118, 'ab_trimmer', 'trash[JP]', 'Sokk', 'NoName', 'iPhone', 'balliant', 'saikoro', 'ero-bakufu', 1453, 1727, 1700, 1700, 1858, 1600, 1564, 1500, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2013-12-29 14:38:55', '2013-12-29 23:59:29', 0, 1, 2, 6151, 6085, 1, 2, 1, 2, 1, 2, 1, 2, 70, 60, 71, 37, 58, 68, 34, 119, 'HustlerOne', 'kazz.ito', 'alicehase', 'pttn', 'A-Naka', 'yoshiDYG', 'erlkonig', 'ab_trimmer', 1516, 1515, 1500, 1584, 1500, 1517, 1635, 1469, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2013-12-29 15:20:35', '2013-12-30 00:48:14', 0, 2, 1, 5949, 6009, 1, 2, 1, 2, 1, 2, 1, 2, 71, 59, 118, 73, 120, 68, 58, 70, 'alicehase', 'Alicia_san', 'ero-bakufu', 'ungatoDYG', 'kotaro1944', 'yoshiDYG', 'ab_trimmer', 'HustlerOne', 1515, 1460, 1300, 1516, 1650, 1502, 1484, 1531, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2013-12-29 16:22:55', '2013-12-30 01:23:00', 0, 2, 1, 6217, 6047, 1, 2, 1, 2, 1, 2, 1, 2, 60, 33, 110, 114, 61, 39, 38, 75, 'kazz.ito', 'mjkxw129', 'Hide and Seek', 'tamapopopo', 'Mutti[JP]', 'amaguriya', 'shohe.shohe', 'osaka_htps', 1500, 1615, 1500, 1416, 1600, 1616, 1617, 1400, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2013-12-29 17:34:19', '2013-12-30 02:34:35', 0, 2, 1, 6004, 6107, 1, 2, 1, 2, 1, 2, 1, 2, 118, 59, 58, 61, 38, 34, 93, 77, 'ero-bakufu', 'Alicia_san', 'ab_trimmer', 'Mutti[JP]', 'shohe.shohe', 'erlkonig', 'NoName', 'imoimo', 1285, 1475, 1469, 1582, 1700, 1650, 1550, 1400, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2013-12-29 21:40:43', '0000-00-00 00:00:00', 2, NULL, NULL, 1624, 1784, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1624, 1784, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2013-12-29 21:57:46', '0000-00-00 00:00:00', 2, NULL, NULL, 1624, 1784, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1624, 1784, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2013-12-29 22:06:15', '0000-00-00 00:00:00', 2, NULL, NULL, 1624, 1784, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1624, 1784, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2013-12-29 22:26:13', '0000-00-00 00:00:00', 2, NULL, NULL, 1624, 1784, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1624, 1784, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2013-12-29 22:26:56', '0000-00-00 00:00:00', 2, NULL, NULL, 1624, 1784, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1624, 1784, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2013-12-29 22:29:44', '0000-00-00 00:00:00', 2, NULL, NULL, 1624, 1784, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1624, 1784, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '2013-12-29 23:48:03', '2013-12-30 08:58:04', 0, 2, 1, 1624, 1784, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1624, 1784, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '2013-12-30 02:35:26', '2013-12-30 11:35:43', 0, 2, 1, 1800, 3408, 1, 2, NULL, 2, NULL, NULL, 0, NULL, 123, 97, NULL, 98, NULL, NULL, NULL, NULL, 'function_test_user3', 'function_test_user1', NULL, 'function_test_user2', NULL, NULL, NULL, NULL, 1800, 1614, NULL, 1794, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '2013-12-30 14:28:27', '2013-12-30 23:35:36', 0, 1, 2, 6077, 5980, 1, 2, 1, 2, 1, 2, 1, 2, 59, 60, 129, 131, 132, 33, 58, 110, 'Alicia_san', 'kazz.ito', 'Tetsu-kw', 'CateNexus', 'mjkxw129', 'gozila', 'ab_trimmer', 'tamapopopo', 1490, 1482, 1500, 1450, 1633, 1650, 1454, 1398, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '2013-12-30 15:57:19', '2013-12-31 01:30:52', 0, 2, 1, 6299, 6297, 1, 2, 1, 2, 1, 2, 1, 2, 58, 60, 44, 77, 93, 132, 134, 105, 'ab_trimmer', 'kazz.ito', 'saikoro', 'imoimo', 'NoName', 'gozila', 'n-yossy', 'wesker', 1469, 1467, 1580, 1415, 1800, 1715, 1450, 1700, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '2013-12-30 17:27:48', '2013-12-31 02:28:07', 0, 2, 1, 6379, 6148, 1, 2, 1, 2, 1, 2, 1, 2, 93, 60, 44, 132, 70, 135, 134, 38, 'NoName', 'kazz.ito', 'saikoro', 'n-yossy', 'watanabe_games', 'HustlerOne', 'gozila', 'shohe.shohe', 1784, 1483, 1564, 1434, 1300, 1546, 1731, 1685, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '2013-12-30 18:51:46', '0000-00-00 00:00:00', 2, NULL, NULL, 4714, 4695, 1, 2, 1, 2, 1, 2, 0, NULL, 97, 98, 123, 124, 126, 130, NULL, NULL, 'function_test_user1', 'function_test_user2', 'function_test_user3', 'function_test_user4', 'function_test_user5', 'fuck_in mutti', NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '2014-01-01 10:54:21', '2014-01-01 20:25:03', 0, 2, 1, 6737, 6678, 1, 2, 1, 2, 1, 2, 1, 2, 43, 44, 142, 135, 143, 13, 11, 21, 'trash[JP]', 'saikoro', 'tukuyomi', 'watanabe_games', 'Hellsinker', 'Horatio', 'komogkomog', 'Weltseele', 1711, 1546, 1600, 1318, 1500, 1916, 1926, 1898, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '2014-01-01 11:52:44', '2014-01-01 21:24:52', 0, 2, 1, 6827, 6863, 1, 2, 1, 2, 1, 2, 1, 2, 144, 21, 43, 32, 13, 142, 145, 44, 'daidai', 'Weltseele', 'trash[JP]', 'M94', 'Horatio', 'tukuyomi', 'potocool3001', 'saikoro', 1600, 1915, 1694, 1685, 1933, 1700, 1600, 1563, NULL, NULL, 0, 0, 0, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '2014-01-03 04:14:24', '0000-00-00 00:00:00', 2, NULL, NULL, 1615, 1795, 1, 2, NULL, NULL, NULL, NULL, 0, NULL, 97, 98, NULL, NULL, NULL, NULL, NULL, NULL, 'function_test_user1', 'function_test_user2', NULL, NULL, NULL, NULL, NULL, NULL, 1615, 1795, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, 1, 2, 3, 1, 2, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1615, 1795, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '2014-01-03 12:51:47', '0000-00-00 00:00:00', 0, 2, 1, 6431, 6445, 1, 2, 1, 2, 1, 2, 1, 2, 150, 43, 21, 108, 143, 135, 151, 142, 'mozibake', 'trash[JP]', 'Weltseele', 'yosimi', 'Hellsinker', 'watanabe_games', 'yakitoriZ', 'tukuyomi', 1200, 1678, 1931, 1716, 1600, 1335, 1700, 1716, 0, 0, 0, 0, 0, 2, 10, -7, 1, 10, 4, 2, 4, 4, 2, 1, 0, 1, 1, 0, 0, 1, -1, 0, 1, 2, 0, 2, 2, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1600, 1678, 1931, 1716, 1483, 1335, 1600, 1716),
(56, '2014-01-03 13:25:07', '0000-00-00 00:00:00', 0, 2, 1, 5833, 5795, 1, 2, 1, 2, 1, 2, 1, 2, 34, 140, 110, 66, 152, 71, 153, 75, 'erlkonig', 'fainaltom', 'tamapopopo', 'areios_zero', 'UB34', 'alicehase', 'ga-1', 'osaka_htps', 1700, 1300, 1383, 1495, 1300, 1550, 1450, 1450, 4, 0, 4, 4, 0, 0, 0, 0, 0, 0, 1, 2, -2, 1, 2, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, -1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1665, 1300, 1383, 1495, 1600, 1650, 1600, 1450),
(57, '2014-01-04 11:51:36', '2014-01-04 21:33:45', 0, 1, 2, 7127, 7131, 1, 2, 1, 2, 1, 2, 1, 2, 43, 33, 14, 36, 104, 21, 106, 3, 'trash[JP]', 'mjkxw129', 'okixile', 'dsk', 'Sokk', 'Weltseele', 'EGMgst', 'iPhone', 1694, 1700, 1917, 1716, 1716, 1915, 1800, 1800, 3, 10, 1, 1, 10, 2, 1, -1, 2, 1, 2, 1, 1, 1, 1, 1, 0, 1, 1, 0, 2, 1, 2, 2, 1, 4, 3, -1, 4, 2, 0, 0, 0, 0, 0, 4, 3, 1, 1, 4, 1694, 1618, 1917, 1716, 1716, 1931, 1800, 1874),
(58, '2014-01-04 12:39:23', '2014-01-04 22:16:30', 0, 1, 2, 6541, 6519, 1, 2, 1, 2, 1, 2, 1, 2, 93, 36, 33, 35, 61, 151, 43, 119, 'NoName', 'dsk', 'mjkxw129', 'toki-u', 'Mutti[JP]', 'yakitoriZ', 'trash[JP]', 'A-Naka', 1550, 1700, 1684, 1650, 1597, 1684, 1710, 1485, 0, 2, -2, 0, 2, 1, 1, -1, 1, 0, 2, 2, -2, 2, 1, 0, 2, -2, 0, 2, 13, 3, 1, 10, 3, 0, 1, -1, 0, 0, 4, 10, 2, 2, 10, 1, 0, -1, 0, 1, 1766, 1716, 1618, 1569, 1597, 1600, 1710, 1485),
(59, '2014-01-04 13:35:46', '2014-01-04 23:20:59', 0, 1, 2, 6734, 6423, 1, 2, 1, 2, 1, 2, 1, 2, 35, 61, 73, 152, 60, 43, 115, 24, 'toki-u', 'Mutti[JP]', 'ungatoDYG', 'UB34', 'kazz.ito', 'trash[JP]', 'Cronus', 'messagebox.jp', 1634, 1613, 1600, 1284, 1600, 1726, 1900, 1800, 0, 3, -3, 0, 2, 14, 3, 2, 10, 3, 2, 0, 2, 2, 0, 0, 1, -1, 0, 0, 3, 3, 2, 2, 3, 5, 10, 3, 3, 10, 0, 0, 0, 0, 0, 2, 0, -2, 0, 2, 1569, 1613, 1600, 1600, 1600, 1726, 1900, 1669),
(60, '2014-01-04 15:09:32', '0000-00-00 00:00:00', 0, 2, 1, 6581, 6519, 1, 2, 1, 2, 1, 2, 1, 2, 60, 71, 114, 38, 6, 157, 58, 113, 'kazz.ito', 'alicehase', 'Hide and Seek', 'shohe.shohe', 'roki', 'kasupon1981', 'ab_trimmer', 'hattottonn', 1613, 1566, 1518, 1703, 1900, 1450, 1550, 1800, 4, 3, 3, 3, 3, 2, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 4, 1, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, -1, 2, 5, 0, 0, 0, 0, 0, 1613, 1650, 1518, 1703, 1900, 1600, 1550, 1800),
(61, '2014-01-04 15:52:15', '0000-00-00 00:00:00', 0, 1, 2, 6057, 6016, 1, 2, 1, 2, 1, 2, 1, 2, 60, 158, 66, 89, 71, 77, 159, 58, 'kazz.ito', 'jas', 'areios_zero', 'muko', 'alicehase', 'imoimo', 'hikikomoyutori', 'ab_trimmer', 1596, 1500, 1511, 1450, 1583, 1450, 1450, 1533, 4, 4, -1, 3, 3, 0, 0, 0, 0, 0, 2, 1, 2, 2, 1, 0, 1, -1, 0, 1, 3, 1, 2, 2, 1, 2, 0, 2, 2, 0, 0, 0, 0, 0, 0, 6, 4, -2, 2, 5, 1613, 1600, 1511, 1450, 1650, 1431, 1600, 1550),
(62, '2014-01-04 16:52:22', '2014-01-05 01:52:46', 0, 1, 2, 6057, 6065, 1, 2, 1, 2, 1, 2, 1, 2, 60, 71, 66, 68, 158, 159, 160, 89, 'kazz.ito', 'alicehase', 'areios_zero', 'yoshiDYG', 'jas', 'hikikomoyutori', 'nanaka', 'muko', 1612, 1599, 1527, 1600, 1484, 1466, 1400, 1434, 5, 4, 1, 3, 3, 4, 1, 3, 3, 1, 3, 1, 3, 3, 1, 2, 1, 1, 1, 1, 0, 1, -1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 2, 0, -2, 0, 1, 1613, 1650, 1527, 1600, 1600, 1600, 1600, 1450),
(63, '2014-01-04 17:56:01', '0000-00-00 00:00:00', 0, 1, 2, 5979, 5934, 1, 2, 1, 2, 1, 2, 1, 2, 60, 59, 58, 161, 77, 102, 162, 68, 'kazz.ito', 'Alicia_san', 'ab_trimmer', 'Ebihurai', 'imoimo', 'curokuro', 'KyabetuTarou', 'yoshiDYG', 1628, 1600, 1517, 1400, 1434, 1350, 1400, 1584, 6, 4, 2, 3, 3, 5, 2, 4, 4, 2, 4, 7, -3, 2, 5, 0, 0, 0, 0, 0, 2, 1, -1, 2, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 2, 2, -1, 1, 1, 1628, 1600, 1550, 1600, 1431, 1515, 1600, 1600),
(64, '2014-01-05 06:39:00', '0000-00-00 00:00:00', 1, NULL, NULL, 4714, 6414, 1, 2, 1, 2, 1, 2, 0, NULL, 97, 98, 123, 124, 126, 130, NULL, NULL, 'function_test_user1', 'function_test_user2', 'function_test_user3', 'function_test_user4', 'function_test_user5', 'fuck_in mutti', NULL, NULL, 1615, 3, 1799, 1200, 1300, 1700, NULL, NULL, 2, 2, 1, 1, 2, 3, 1, 2, 2, 1, 0, 1, -1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL),
(65, '2014-01-05 06:54:09', '0000-00-00 00:00:00', 1, NULL, NULL, 4714, 6414, 1, 2, 1, 2, 1, 2, 0, NULL, 97, 98, 123, 124, 126, 130, NULL, NULL, 'function_test_user1', 'function_test_user2', 'function_test_user3', 'function_test_user4', 'function_test_user5', 'fuck_in mutti', NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL, 2, 2, 1, 1, 2, 3, 1, 2, 2, 1, 0, 1, -1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL),
(66, '2014-01-05 07:00:03', '0000-00-00 00:00:00', 1, NULL, NULL, 0, 0, 1, 2, 1, 2, 1, 2, 0, NULL, 97, 98, 123, 124, 126, 130, NULL, NULL, 'function_test_user1', 'function_test_user2', 'function_test_user3', 'function_test_user4', 'function_test_user5', 'fuck_in mutti', NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL, 2, 2, 1, 1, 2, 3, 1, 2, 2, 1, 0, 1, -1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL),
(67, '2014-01-05 07:01:43', '0000-00-00 00:00:00', 1, NULL, NULL, 4714, 6414, 1, 2, 1, 2, 1, 2, 0, NULL, 97, 98, 123, 124, 126, 130, NULL, NULL, 'function_test_user1', 'function_test_user2', 'function_test_user3', 'function_test_user4', 'function_test_user5', 'fuck_in mutti', NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL, 2, 2, 1, 1, 2, 3, 1, 2, 2, 1, 0, 1, -1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL),
(68, '2014-01-05 07:05:26', '0000-00-00 00:00:00', 1, NULL, NULL, 4714, 4695, 1, 2, 1, 2, 1, 2, 0, NULL, 97, 98, 123, 124, 126, 130, NULL, NULL, 'function_test_user1', 'function_test_user2', 'function_test_user3', 'function_test_user4', 'function_test_user5', 'fuck_in mutti', NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL, 2, 2, 1, 1, 2, 3, 1, 2, 2, 1, 0, 1, -1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1615, 1795, 1799, 1200, 1300, 1700, NULL, NULL),
(69, '2014-01-05 09:22:29', '2014-01-05 19:11:35', 0, 1, 2, 6810, 6747, 1, 2, 1, 2, 1, 2, 1, 2, 45, 43, 60, 36, 33, 20, 106, 51, 'P_yatta', 'trash[JP]', 'kazz.ito', 'dsk', 'mjk', 'konitan12', 'EGMgst', 'oyacchan', 1650, 1713, 1644, 1684, 1700, 1781, 1816, 1569, 0, 1, -1, 0, 1, 5, 11, -1, 3, 10, 7, 4, 3, 3, 3, 1, 2, -2, 1, 0, 3, 2, 1, 2, 1, 2, 0, 2, 2, 0, 1, 0, 1, 1, 0, 4, 1, -4, 1, 4, 1583, 1726, 1644, 1716, 1700, 1781, 1816, 1569),
(70, '2014-01-05 14:55:08', '2014-01-05 23:55:38', 0, 1, 2, 6478, 6596, 1, 2, 1, 2, 1, 2, 1, 2, 45, 60, 163, 59, 164, 34, 73, 36, 'P_yatta', 'kazz.ito', 'toppers', 'Alicia_san', 'd715iba', 'erlkonig', 'ungatoDYG', 'dsk', 1665, 1659, 1800, 1584, 1400, 1684, 1613, 1669, 1, 1, 1, 1, 1, 8, 4, 4, 4, 3, 0, 0, 0, 0, 0, 5, 3, -1, 4, 2, 0, 0, 0, 0, 0, 4, 1, -1, 4, 0, 3, 0, 3, 3, 0, 3, 1, -3, 1, 0, 1665, 1659, 1600, 1600, 1600, 1665, 1613, 1716),
(71, '2014-01-05 15:52:52', '2014-01-06 00:53:11', 0, 2, 1, 6403, 6350, 1, 2, 1, 2, 1, 2, 1, 2, 60, 44, 119, 59, 66, 34, 132, 160, 'kazz.ito', 'saikoro', 'A-Naka', 'Alicia_san', 'areios_zero', 'erlkonig', 'gozila', 'nanaka', 1642, 1700, 1469, 1567, 1543, 1667, 1749, 1416, 8, 5, -1, 4, 3, 3, 4, 2, 2, 4, 0, 2, -2, 0, 1, 5, 4, -2, 4, 2, 4, 1, 4, 4, 1, 4, 2, -2, 4, 0, 3, 0, 3, 3, 0, 0, 1, 1, 1, 0, 1659, 1579, 1485, 1600, 1543, 1665, 1749, 1600),
(72, '2014-01-06 12:26:35', '2014-01-06 22:05:19', 0, 2, 1, 6349, 6364, 1, 2, 1, 2, 1, 2, 1, 2, 93, 66, 58, 51, 77, 92, 157, 34, 'NoName', 'areios_zero', 'ab_trimmer', 'oyacchan', 'imoimo', 'kommensie2002', 'kasupon1981', 'erlkonig', 1566, 1526, 1533, 1554, 1450, 1600, 1800, 1684, 1, 2, 1, 1, 2, 4, 2, -1, 4, 1, 5, 7, 1, 2, 5, 1, 5, -5, 1, 4, 3, 1, 1, 2, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 2, 5, 1, 4, 0, 1766, 1543, 1550, 1569, 1450, 1600, 1600, 1684),
(73, '2014-01-06 14:54:30', '2014-01-06 23:55:19', 0, 2, 1, 6150, 6206, 1, 2, 1, 2, 1, 2, 1, 2, 89, 60, 41, 35, 165, 102, 45, 70, 'muko', 'kazz.ito', 'himitu', 'toki-u', 'piyoyofunyu', 'curokuro', 'P_yatta', 'HustlerOne', 1418, 1625, 1600, 1647, 1450, 1334, 1682, 1600, 0, 3, -3, 0, 1, 8, 6, -2, 4, 3, 0, 0, 0, 0, 0, 1, 3, 1, 1, 2, 0, 0, 0, 0, 0, 1, 1, -1, 1, 0, 2, 1, 2, 2, 1, 1, 3, -1, 3, 1, 1450, 1659, 1600, 1647, 1600, 1515, 1682, 1550),
(74, '2014-01-06 16:27:13', '2014-01-07 01:27:34', 0, 1, 2, 6175, 6060, 1, 2, 1, 2, 1, 2, 1, 2, 165, 60, 51, 118, 38, 34, 166, 162, 'piyoyofunyu', 'kazz.ito', 'oyacchan', 'ero-bakufu', 'shohe.shohe', 'erlkonig', 'apsalussan', 'KyabetuTarou', 1435, 1640, 1570, 1270, 1720, 1700, 1450, 1450, 0, 1, -1, 0, 0, 9, 6, 1, 4, 3, 2, 5, 1, 1, 4, 0, 3, -3, 0, 3, 2, 4, 2, 2, 4, 6, 2, 2, 4, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1600, 1659, 1570, 1270, 1720, 1700, 1600, 1600),
(75, '2014-01-07 15:11:13', '2014-01-08 00:11:40', 0, 2, 1, 6127, 6127, 1, 2, 1, 2, 1, 2, 1, 2, 38, 60, 66, 89, 75, 132, 168, 110, 'shohe.shohe', 'kazz.ito', 'areios_zero', 'muko', 'osaka_htps', 'gozila', 'wat', 'tamapopopo', 1735, 1625, 1542, 1403, 1550, 1732, 1300, 1367, 3, 4, 3, 3, 4, 9, 7, -1, 4, 3, 5, 2, 1, 4, 1, 0, 4, -4, 0, 1, 2, 0, 2, 2, 0, 3, 1, -1, 3, 0, 0, 0, 0, 0, 0, 3, 1, -3, 1, 2, 1735, 1659, 1543, 1450, 1466, 1749, 1600, 1383),
(76, '2014-01-07 15:48:34', '2014-01-08 00:48:54', 0, 2, 1, 6357, 6145, 1, 2, 1, 2, 1, 2, 1, 2, 75, 58, 77, 110, 132, 66, 60, 38, 'osaka_htps', 'ab_trimmer', 'imoimo', 'tamapopopo', 'gozila', 'areios_zero', 'kazz.ito', 'shohe.shohe', 1534, 1517, 1434, 1383, 1748, 1526, 1641, 1719, 2, 1, -1, 2, 0, 5, 8, -1, 2, 5, 3, 2, -1, 2, 0, 2, 3, 1, 1, 2, 4, 1, 1, 3, 0, 5, 3, -1, 4, 1, 10, 7, 1, 4, 3, 5, 3, -1, 3, 4, 1466, 1550, 1450, 1383, 1749, 1543, 1659, 1735),
(77, '2014-01-07 16:40:55', '2014-01-08 01:51:09', 0, 2, 1, 6294, 6366, 1, 2, 1, 2, 1, 2, 1, 2, 60, 58, 51, 77, 38, 132, 168, 34, 'kazz.ito', 'ab_trimmer', 'oyacchan', 'imoimo', 'shohe.shohe', 'gozila', 'wat', 'erlkonig', 1623, 1535, 1650, 1416, 1737, 1730, 1284, 1685, 10, 8, -1, 4, 3, 6, 8, 1, 2, 5, 3, 5, 2, 2, 4, 3, 3, -2, 2, 0, 4, 5, 1, 3, 4, 4, 2, -1, 3, 0, 0, 1, -1, 0, 0, 3, 6, -1, 4, 0, 1659, 1550, 1585, 1450, 1737, 1749, 1600, 1700),
(78, '2014-01-09 20:06:22', '0000-00-00 00:00:00', 2, NULL, NULL, 4299, 3410, 1, 2, 1, 2, 1, NULL, 0, NULL, 123, 97, 124, 98, 126, NULL, NULL, NULL, 'function_test_user3', 'function_test_user1', 'function_test_user4', 'function_test_user2', 'function_test_user5', NULL, NULL, NULL, 1799, 1615, 1200, 1795, 1300, NULL, NULL, NULL, 0, 1, -1, 0, 1, 2, 2, 1, 1, 2, 0, 0, 0, 0, 0, 3, 1, 2, 2, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1799, 1615, 1200, 1795, 1300, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `player_id` int(11) NOT NULL auto_increment,
  `rate_id` int(11) NOT NULL,
  `player_name` varchar(45) character set latin1 NOT NULL,
  `memo` text,
  `delete_flag` tinyint(4) NOT NULL default '0',
  `last_editor` varchar(45) NOT NULL,
  `created_on` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`player_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=172 ;

--
-- テーブルのデータのダンプ `player`
--

INSERT INTO `player` (`player_id`, `rate_id`, `player_name`, `memo`, `delete_flag`, `last_editor`, `created_on`, `updated_on`) VALUES
(1, 1, 'dystopia', '', 0, '', '0000-00-00 00:00:00', '2013-12-11 20:34:26'),
(2, 2, 'koujan', '', 0, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-03 08:28:17'),
(3, 3, 'iPhone', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(4, 4, 'GARU', '', 0, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-03 08:27:52'),
(5, 5, 'masa4', '', 0, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-03 08:26:28'),
(6, 6, 'roki', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(7, 7, 'asuky', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(8, 8, 'leonak', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(9, 9, 'tomyam', '', 0, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-03 08:26:07'),
(10, 10, 'IS05', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(11, 11, 'komogkomog', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(12, 12, 'Ichiji', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(13, 13, 'Horatio', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-26 22:42:13'),
(14, 14, 'okixile', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-26 22:55:13'),
(15, 15, 'teppei0905', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(16, 16, 'qutto', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(17, 17, 'haskaop', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-26 22:40:41'),
(18, 18, 'Gooood', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(19, 19, 'OhaYoDA', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(20, 20, 'konitan12', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-26 22:41:07'),
(21, 21, 'Weltseele', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-26 22:32:56'),
(22, 22, 'Masao', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(23, 23, 'RedEye(11)', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(24, 24, 'messagebox.jp', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(25, 25, 'hmtarou', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(26, 26, 'pokeke', '', 0, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-03 07:25:30'),
(27, 27, 'shnkgw', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(28, 28, 'koucha', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(29, 29, 'orunnyo', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(30, 30, 'SARASAREdammy', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(31, 31, 'TEATEA', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(32, 32, 'M94', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(33, 33, 'mjk', '元の名前：mjkxw129', 0, 'trash', '0000-00-00 00:00:00', '2014-01-04 15:43:19'),
(34, 34, 'erlkonig', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(35, 35, 'toki-u', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(36, 36, 'dsk', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-26 22:43:42'),
(37, 37, 'pttn', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(38, 38, 'shohe.shohe', '', 0, 'alicia_san', '0000-00-00 00:00:00', '2013-12-29 16:52:24'),
(39, 39, 'amaguriya', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(40, 40, 'Nishi', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(41, 41, 'himitu', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(42, 42, 'JPZealot[JP]', '', 0, 'trash', '0000-00-00 00:00:00', '2013-12-28 07:11:14'),
(43, 43, 'trash[JP]', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(44, 44, 'saikoro', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(45, 45, 'P_yatta', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(46, 46, 'Reona', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(47, 47, 'kec', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(48, 48, 'urasaso', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(49, 49, 'unkobox360', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(50, 50, 'Litochin[^-^]', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-26 22:36:43'),
(51, 51, 'oyacchan', '', 0, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-06 16:34:30'),
(52, 52, 'sia', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(53, 53, 'phantom', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(54, 54, 'Rainy_season', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(55, 55, 'akito_TTI', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(56, 56, 'hakusan', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(57, 57, 'Brunestud', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(58, 58, 'ab_trimmer', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(59, 59, 'Alicia_san', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(60, 60, 'kazz.ito', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(61, 61, 'Mutti[JP]', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-27 09:35:06'),
(62, 62, 'kain', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(63, 63, 'jukuchou', '', 0, 'mutti', '0000-00-00 00:00:00', '2013-12-26 22:43:07'),
(64, 64, 'kojhiro_sasaki', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(65, 65, 'tohkon.inoki', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(66, 66, 'areios_zero', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(67, 67, 'ken0229', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(68, 68, 'yoshiDYG', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(69, 69, 'painomi', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(70, 70, 'HustlerOne', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(71, 71, 'alicehase', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(72, 72, 'mattew', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(73, 73, 'ungatoDYG', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(74, 74, 'mirri999', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(75, 75, 'osaka_htps', '', 0, 'abtrimmer', '0000-00-00 00:00:00', '2014-01-04 09:19:38'),
(76, 76, 'gj1124', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(77, 77, 'imoimo', '', 0, 'abtrimmer', '0000-00-00 00:00:00', '2014-01-04 09:20:05'),
(78, 78, 'hisukai', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(79, 79, 'TOEIC', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(80, 80, 'minato', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(81, 81, 'kim_shougun', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(82, 82, 'thaomin', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(83, 83, 'ym0111', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(84, 84, 'DQN', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(85, 85, 'OKU!', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(86, 86, 'Yhokho', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(87, 87, 'Kishina', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(88, 88, 'sumyapp', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(89, 89, 'muko', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:29:17'),
(90, 90, 'baal.shlomo72', NULL, 0, '', '0000-00-00 00:00:00', '2013-12-14 05:32:00'),
(91, 91, 'Y1', '', 0, 'mutti', '2013-12-26 22:58:23', '2013-12-26 22:58:23'),
(92, 92, 'kommensie2002', '', 0, 'trash', '2013-12-27 10:09:00', '2013-12-27 10:09:00'),
(93, 93, 'NoName', '', 0, 'mutti', '2013-12-27 10:09:16', '2013-12-29 16:53:01'),
(94, 94, 'CARDHU', '', 0, 'trash', '2013-12-27 10:09:32', '2013-12-27 10:09:32'),
(95, 95, 'tsu1226', '', 0, 'trash', '2013-12-27 10:09:42', '2013-12-27 10:09:42'),
(96, 96, 'ke10w0', '', 0, 'trash', '2013-12-27 10:10:34', '2013-12-27 10:10:34'),
(97, 97, 'function_test_user1', '', 0, 'Erlkonig', '2013-12-28 00:06:12', '2013-12-29 06:05:10'),
(98, 98, 'function_test_user2', '', 0, 'Erlkonig', '2013-12-28 00:06:26', '2013-12-28 00:06:26'),
(99, 99, 'seki-rei', '', 0, 'trash', '2013-12-28 06:07:06', '2013-12-28 06:07:06'),
(100, 100, 'nahoro', '', 0, 'trash', '2013-12-28 06:07:17', '2013-12-28 06:07:17'),
(101, 101, 'misterioso', '', 0, 'trash', '2013-12-28 06:07:35', '2013-12-28 06:07:35'),
(102, 102, 'curokuro', '', 0, 'trash', '2013-12-28 06:07:59', '2013-12-28 06:07:59'),
(103, 103, 'hgsteven', '', 0, 'trash', '2013-12-28 06:08:08', '2013-12-28 06:08:08'),
(104, 104, 'Sokk', '', 0, 'trash', '2013-12-28 06:08:18', '2013-12-28 06:08:18'),
(105, 105, 'wesker', '', 0, 'trash', '2013-12-28 06:08:43', '2013-12-28 06:08:43'),
(106, 106, 'EGMgst', '', 0, 'trash', '2013-12-28 07:05:35', '2013-12-28 07:05:35'),
(107, 107, 'Anago', '', 0, 'trash', '2013-12-28 07:13:45', '2013-12-28 07:13:45'),
(108, 108, 'yosimi', '', 0, 'trash', '2013-12-28 07:16:12', '2013-12-28 07:16:12'),
(109, 109, 'mako', '', 0, 'trash', '2013-12-28 17:01:59', '2013-12-28 17:01:59'),
(110, 110, 'tamapopopo', '', 0, 'trash', '2013-12-28 17:03:15', '2013-12-28 17:03:15'),
(111, 111, 'ELunkoman', '', 0, 'trash', '2013-12-28 17:49:33', '2013-12-28 17:49:33'),
(112, 112, 'kgwryk28', '', 0, 'trash', '2013-12-28 18:44:41', '2013-12-28 18:44:41'),
(113, 113, 'hattottonn', '', 0, 'trash', '2013-12-29 10:43:29', '2013-12-29 10:43:29'),
(114, 114, 'Hide and Seek', '', 0, 'trash', '2013-12-29 10:43:51', '2013-12-29 10:43:51'),
(115, 115, 'Cronus', '', 0, 'alicia_san', '2013-12-29 12:22:51', '2013-12-29 12:22:51'),
(116, 116, 'kamikoro', '', 0, 'alicia_san', '2013-12-29 12:28:08', '2013-12-29 12:28:08'),
(117, 117, 'balliant', '', 0, 'trash', '2013-12-29 13:20:18', '2013-12-29 14:02:07'),
(118, 118, 'ero-bakufu', '', 0, 'trash', '2013-12-29 13:21:18', '2013-12-29 14:02:36'),
(119, 119, 'A-Naka', '', 0, 'kazz_ito', '2013-12-29 14:35:01', '2013-12-29 14:35:01'),
(120, 120, 'kotaro1944', '', 0, 'alicia_san', '2013-12-29 15:18:43', '2013-12-29 15:18:43'),
(121, 121, 'omokechan', '', 0, 'alicia_san', '2013-12-29 19:20:47', '2013-12-29 19:20:47'),
(122, 122, 'radeon', '', 0, 'alicia_san', '2013-12-29 20:37:35', '2013-12-29 20:37:35'),
(123, 123, 'function_test_user3', '\\''', 0, 'Erlkonig', '2013-12-30 00:37:21', '2014-01-08 06:52:28'),
(124, 124, 'function_test_user4', '', 0, 'Erlkonig', '2013-12-30 12:42:20', '2013-12-30 12:42:20'),
(125, 127, 'Tyata', '', 0, 'alicia_san', '2013-12-30 12:45:01', '2013-12-30 12:45:01'),
(126, 128, 'function_test_user5', '', 0, 'Erlkonig', '2013-12-30 12:45:18', '2013-12-30 12:54:01'),
(127, 129, '\\\\\\''', 'エスケープ文字テスト', 1, 'Erlkonig', '2013-12-30 12:48:35', '2013-12-30 13:40:52'),
(128, 130, 'fuck\\''in mutti', '', 1, 'Erlkonig', '2013-12-30 12:55:39', '2013-12-30 13:40:45'),
(129, 131, 'CateNexus', '', 0, 'alicia_san', '2013-12-30 13:46:48', '2013-12-30 14:31:50'),
(130, 132, 'fuck_in mutti', '', 1, 'Erlkonig', '2013-12-30 13:48:10', '2014-01-06 17:23:14'),
(131, 133, 'Tetsu-kw', '', 0, 'alicia_san', '2013-12-30 14:23:04', '2013-12-30 14:33:24'),
(132, 134, 'gozila', 'piccoroさん。たまひよ民。レート400～500ぐらいだった気がする。', 0, 'Erlkonig', '2013-12-30 14:26:35', '2014-01-06 14:52:44'),
(133, 135, 'inora', '', 0, 'alicia_san', '2013-12-30 15:22:28', '2013-12-30 15:22:28'),
(134, 136, 'n-yossy', '', 0, 'kazz_ito', '2013-12-30 15:48:27', '2013-12-30 15:48:27'),
(135, 137, 'watanabe_games', '', 0, 'kazz_ito', '2013-12-30 17:25:32', '2013-12-30 17:25:32'),
(136, 138, 'emery', '', 0, 'Erlkonig', '2013-12-30 20:03:11', '2014-01-03 08:25:18'),
(137, 139, 'Ikumo', '', 0, 'trash', '2013-12-31 07:06:14', '2013-12-31 07:06:14'),
(138, 140, 'samochang', '', 0, 'trash', '2013-12-31 07:06:24', '2013-12-31 07:06:24'),
(139, 141, 'kyabetsu', '', 0, 'trash', '2013-12-31 07:06:36', '2013-12-31 07:06:36'),
(140, 142, 'fainaltom', '', 0, 'trash', '2013-12-31 07:09:42', '2013-12-31 07:09:42'),
(141, 143, '[iDOL]ichigo', '', 0, 'trash', '2013-12-31 09:25:09', '2013-12-31 09:25:09'),
(142, 144, 'tukuyomi', '', 0, 'trash', '2014-01-01 10:51:41', '2014-01-01 11:51:14'),
(143, 145, 'Hellsinker', '', 0, 'trash', '2014-01-01 10:51:54', '2014-01-01 11:27:42'),
(144, 146, 'daidai', '', 0, 'trash', '2014-01-01 11:49:14', '2014-01-01 12:27:36'),
(145, 147, 'potocool3001', '', 0, 'trash', '2014-01-01 11:49:38', '2014-01-01 12:36:49'),
(146, 148, 'Denim', '', 0, 'trash', '2014-01-01 14:09:54', '2014-01-01 14:09:54'),
(147, 149, '*Aurelia*', '', 0, 'trash', '2014-01-01 14:11:36', '2014-01-01 14:11:36'),
(148, 150, 'Lapis_L', '', 0, 'trash', '2014-01-01 14:11:45', '2014-01-01 14:11:45'),
(149, 151, 'TENMU', '', 0, 'Erlkonig', '2014-01-03 08:24:12', '2014-01-03 08:24:12'),
(150, 152, 'mozibake', '22:35 (trash[jp_) そういえば日本語名前で文字化けしちゃってて、読めない人が居たので仮にmozibakeで登録したのですけれどこれどうすれば良いでしょうか。　日本語だと登録出来ないし、文字化けする事を教えたから多分名前変わると思うのでちょっとミスったかなぁとか思ってるのですけど　「鎌医・纏ｵ雲蛾」', 0, 'trash', '2014-01-03 11:47:42', '2014-01-03 13:41:17'),
(151, 153, 'yakitoriZ', '', 0, 'trash', '2014-01-03 11:48:33', '2014-01-03 11:48:33'),
(152, 154, 'UB34', '', 0, 'Erlkonig', '2014-01-03 12:25:48', '2014-01-03 12:25:48'),
(153, 155, 'ga-1', '', 0, 'abtrimmer', '2014-01-03 12:27:48', '2014-01-04 09:01:26'),
(154, 156, 'abtkts', '', 0, 'abtrimmer', '2014-01-04 08:42:20', '2014-01-04 08:42:20'),
(155, 157, 'i_love_AOC_', 'たにこさん、こっこプレイヤー', 0, 'Erlkonig', '2014-01-04 10:46:50', '2014-01-04 10:46:50'),
(156, 158, 'hagrm160', '', 0, 'Erlkonig', '2014-01-04 10:49:08', '2014-01-04 10:49:08'),
(157, 159, 'kasupon1981', '', 0, 'kazz_ito', '2014-01-04 14:33:26', '2014-01-04 15:14:29'),
(158, 160, 'jas', '', 0, 'kazz_ito', '2014-01-04 15:21:09', '2014-01-04 15:21:09'),
(159, 161, 'hikikomoyutori', '', 0, 'kazz_ito', '2014-01-04 15:23:24', '2014-01-04 15:23:24'),
(160, 162, 'nanaka', '', 0, 'kazz_ito', '2014-01-04 15:55:01', '2014-01-04 15:55:01'),
(161, 163, 'Ebihurai', '', 0, 'kazz_ito', '2014-01-04 17:04:02', '2014-01-04 18:04:11'),
(162, 164, 'KyabetuTarou', '', 0, 'kazz_ito', '2014-01-04 17:08:49', '2014-01-04 18:03:12'),
(163, 165, 'toppers', '', 0, 'kazz_ito', '2014-01-05 13:52:03', '2014-01-05 13:52:03'),
(164, 166, 'd715iba', '', 0, 'kazz_ito', '2014-01-05 14:12:41', '2014-01-05 15:00:09'),
(165, 167, 'piyoyofunyu', '', 0, 'kazz_ito', '2014-01-06 14:15:32', '2014-01-06 14:15:32'),
(166, 168, 'apsalussan', '', 0, 'kazz_ito', '2014-01-06 15:06:19', '2014-01-06 15:06:19'),
(167, 169, 'nao_zzg', '', 0, 'kazz_ito', '2014-01-06 15:06:31', '2014-01-06 15:07:36'),
(168, 170, 'wat', '', 0, 'kazz_ito', '2014-01-07 14:34:40', '2014-01-07 14:34:40'),
(169, 171, 'rairaio', '', 0, 'Erlkonig', '2014-01-08 14:58:25', '2014-01-08 14:58:25'),
(170, 172, 'espassi', '', 0, 'Erlkonig', '2014-01-08 14:58:44', '2014-01-09 20:08:51'),
(171, 173, 'function_test_user6', '', 0, 'Erlkonig', '2014-01-09 20:09:11', '2014-01-09 20:09:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `rate_id` int(11) NOT NULL auto_increment,
  `rate` smallint(6) NOT NULL default '1600',
  `previous_rate` smallint(6) NOT NULL default '1600',
  `win` int(11) NOT NULL default '0',
  `lose` int(11) NOT NULL default '0',
  `streak` int(11) NOT NULL default '0',
  `win_streak` int(11) NOT NULL default '0',
  `lose_streak` int(11) NOT NULL default '0',
  `max_rate` smallint(6) NOT NULL default '1600',
  `last_editor` varchar(45) default NULL,
  `edit_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `created_on` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`rate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=174 ;

--
-- テーブルのデータのダンプ `rate`
--

INSERT INTO `rate` (`rate_id`, `rate`, `previous_rate`, `win`, `lose`, `streak`, `win_streak`, `lose_streak`, `max_rate`, `last_editor`, `edit_date`, `created_on`, `updated_on`) VALUES
(1, 1896, 1900, 1, 1, 1, 1, 1, 1896, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-11 20:34:46'),
(2, 1970, 1899, 1, 1, -1, 1, 1, 1899, 'Erlkonig', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-03 08:28:17'),
(3, 1900, 1900, 3, 5, -1, 1, 4, 1874, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(4, 1850, 1900, 0, 0, 0, 0, 0, 1900, 'Erlkonig', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-03 08:27:52'),
(5, 2000, 1900, 0, 0, 0, 0, 0, 19000, 'Erlkonig', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-03 08:26:28'),
(6, 1883, 1900, 0, 1, -1, 0, 0, 1900, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(7, 1900, 1900, 0, 0, 0, 0, 0, 1900, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(8, 1900, 1900, 0, 0, 0, 0, 0, 1900, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(9, 2000, 1900, 0, 0, 0, 0, 0, 1900, 'Erlkonig', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-03 08:26:07'),
(10, 1900, 1900, 0, 0, 0, 0, 0, 1900, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(11, 1909, 1909, 3, 2, -1, 2, 2, 1909, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(12, 1900, 1900, 0, 0, 0, 0, 0, 1900, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(13, 1917, 1917, 2, 1, -1, 2, 1, 1917, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-26 22:42:13'),
(14, 1933, 1917, 3, 1, 2, 2, 1, 1933, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-26 22:55:13'),
(15, 1700, 1700, 0, 0, 0, 0, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(16, 1750, 1700, 0, 0, 0, 0, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(17, 1850, 1700, 2, 1, -1, 2, 1, 1815, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-26 22:40:41'),
(18, 1750, 1700, 0, 0, 0, 0, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(19, 1700, 1700, 0, 0, 0, 0, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(20, 1766, 1700, 2, 1, -1, 2, 0, 1781, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-26 22:41:07'),
(21, 1899, 1700, 4, 4, -2, 4, 2, 1931, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-26 22:32:56'),
(22, 1700, 1700, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(23, 1700, 1700, 0, 0, 0, 0, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(24, 1787, 1700, 0, 3, -3, 0, 2, 1669, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(25, 1800, 1700, 0, 1, -1, 0, 1, 1685, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(26, 1800, 1684, 0, 1, -1, 0, 1, 1684, 'Erlkonig', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-03 07:25:30'),
(27, 1700, 1700, 0, 0, 0, 0, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(28, 1700, 1700, 0, 0, 0, 0, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(29, 1700, 1700, 0, 0, 0, 0, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(30, 1800, 1700, 0, 0, 0, 0, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(31, 1684, 1700, 0, 1, -1, 0, 1, 1684, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(32, 1750, 1700, 1, 1, 1, 1, 1, 1701, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(33, 1715, 1700, 4, 2, 2, 2, 1, 1715, 'trash', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-04 15:43:19'),
(34, 1700, 1600, 7, 3, 1, 4, 0, 1700, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(35, 1662, 1600, 2, 3, 2, 2, 2, 1662, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(36, 1652, 1600, 1, 4, -4, 1, 0, 1716, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-26 22:43:42'),
(37, 1569, 1600, 0, 2, -2, 0, 2, 1569, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(38, 1722, 1599, 4, 6, -1, 3, 4, 1737, 'alicia_san', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-29 16:52:24'),
(39, 1634, 1600, 2, 0, 2, 2, 0, 1634, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(40, 1585, 1600, 0, 1, -1, 0, 1, 1585, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(41, 1650, 1600, 0, 1, -1, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(42, 1650, 1685, 0, 1, -1, 0, 1, 1685, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-28 07:11:14'),
(43, 1698, 1600, 5, 12, -2, 3, 10, 1726, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(44, 1717, 1600, 4, 4, 3, 3, 4, 1717, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(45, 1667, 1600, 2, 2, -1, 2, 1, 1682, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(46, 1650, 1600, 0, 0, 0, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(47, 1600, 1600, 0, 0, 0, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(48, 1700, 1600, 0, 0, 0, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(49, 1600, 1600, 0, 1, -1, 0, 1, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(50, 1590, 1600, 0, 0, 0, 0, 0, 1600, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-26 22:36:43'),
(51, 1635, 1585, 3, 6, -1, 2, 4, 1585, 'Erlkonig', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-06 16:34:30'),
(52, 1600, 1600, 0, 0, 0, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(53, 1600, 1600, 0, 0, 0, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(54, 1600, 1600, 0, 0, 0, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(55, 1620, 1600, 1, 0, 1, 1, 0, 1620, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(56, 1650, 1600, 1, 1, -1, 1, 1, 1650, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(57, 1600, 1600, 0, 0, 0, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:36:44'),
(58, 1550, 1500, 7, 8, 2, 2, 5, 1550, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(59, 1600, 1500, 6, 4, 1, 4, 2, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(60, 1608, 1500, 10, 9, -2, 4, 3, 1659, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(61, 1600, 1815, 14, 4, -1, 10, 3, 1613, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-27 09:35:06'),
(62, 1450, 1500, 0, 0, 0, 0, 0, 1450, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(63, 1450, 1500, 0, 1, -1, 0, 1, 1585, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-26 22:43:07'),
(64, 1500, 1500, 0, 0, 0, 0, 0, 1500, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(65, 1500, 1500, 0, 0, 0, 0, 0, 1500, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(66, 1544, 1500, 6, 3, 1, 4, 1, 1544, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(67, 1500, 1500, 0, 0, 0, 0, 0, 1500, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(68, 1568, 1500, 2, 3, -2, 1, 1, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(69, 1500, 1500, 0, 0, 0, 0, 0, 1500, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(70, 1615, 1500, 4, 1, 1, 3, 1, 1615, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(71, 1583, 1500, 4, 2, -1, 3, 1, 1650, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(72, 1650, 1500, 1, 0, 1, 1, 0, 1650, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(73, 1630, 1500, 4, 0, 4, 4, 0, 1630, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(74, 1500, 1500, 0, 0, 0, 0, 0, 1500, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(75, 1516, 1466, 2, 2, -2, 2, 0, 1466, 'abtrimmer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-04 09:19:38'),
(76, 1400, 1400, 0, 0, 0, 0, 0, 1400, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(77, 1431, 1431, 4, 3, 1, 2, 0, 1450, 'abtrimmer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-01-04 09:20:05'),
(78, 1383, 1400, 0, 1, -1, 0, 1, 1383, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(79, 1550, 1400, 0, 0, 0, 0, 0, 1550, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(80, 1400, 1400, 0, 0, 0, 0, 0, 1400, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(81, 1400, 1400, 0, 0, 0, 0, 0, 1400, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(82, 1400, 1400, 0, 0, 0, 0, 0, 1400, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(83, 1300, 1300, 0, 0, 0, 0, 0, 1300, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(84, 1300, 1300, 0, 0, 0, 0, 0, 1300, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(85, 1300, 1300, 0, 0, 0, 0, 0, 1300, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(86, 1400, 1300, 0, 0, 0, 0, 0, 1400, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(87, 1300, 1300, 0, 0, 0, 0, 0, 1300, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(88, 1350, 1300, 0, 0, 0, 0, 0, 1350, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(89, 1419, 1300, 1, 4, 1, 1, 1, 1450, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(90, 1600, 1600, 0, 0, 0, 0, 0, 1600, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-14 05:38:52'),
(91, 1750, 1684, 1, 3, -2, 1, 3, 1750, 'mutti', '0000-00-00 00:00:00', '2013-12-27 10:09:16', '2013-12-29 16:53:01'),
(92, 1550, 1600, 1, 0, 1, 1, 0, 1616, '', '0000-00-00 00:00:00', '2013-12-27 10:09:00', '2013-12-27 10:09:00'),
(93, 1550, 1800, 1, 3, -1, 1, 2, 1766, '', '0000-00-00 00:00:00', '2013-12-26 22:58:23', '2013-12-26 22:58:23'),
(94, 1500, 1500, 0, 0, 0, 0, 0, 1500, '', '0000-00-00 00:00:00', '2013-12-27 10:09:32', '2013-12-27 10:09:32'),
(95, 1800, 1800, 0, 0, 0, 0, 0, 1800, '', '0000-00-00 00:00:00', '2013-12-27 10:09:42', '2013-12-27 10:09:42'),
(96, 1300, 1300, 0, 0, 0, 0, 0, 1300, '', '0000-00-00 00:00:00', '2013-12-27 10:10:34', '2013-12-27 10:10:34'),
(97, 1615, 1592, 2, 2, 1, 1, 2, 1615, '', '0000-00-00 00:00:00', '2013-12-28 00:06:12', '2013-12-29 06:05:10'),
(98, 1795, 1800, 3, 1, 2, 2, 1, 1795, '', '0000-00-00 00:00:00', '2013-12-28 00:06:26', '2013-12-28 00:06:26'),
(99, 1400, 1400, 0, 0, 0, 0, 0, 1400, '', '0000-00-00 00:00:00', '2013-12-28 06:07:06', '2013-12-28 06:07:06'),
(100, 1500, 1500, 0, 0, 0, 0, 0, 1500, '', '0000-00-00 00:00:00', '2013-12-28 06:07:17', '2013-12-28 06:07:17'),
(101, 1900, 1700, 0, 0, 0, 0, 0, 1900, '', '0000-00-00 00:00:00', '2013-12-28 06:07:35', '2013-12-28 06:07:35'),
(102, 1349, 1500, 2, 1, 1, 1, 0, 1515, '', '0000-00-00 00:00:00', '2013-12-28 06:07:59', '2013-12-28 06:07:59'),
(103, 1300, 1300, 0, 0, 0, 0, 0, 1300, '', '0000-00-00 00:00:00', '2013-12-28 06:08:08', '2013-12-28 06:08:08'),
(104, 1800, 1700, 3, 1, 3, 3, 1, 1732, '', '0000-00-00 00:00:00', '2013-12-28 06:08:18', '2013-12-28 06:08:18'),
(105, 1900, 1700, 1, 0, 1, 1, 0, 1900, '', '0000-00-00 00:00:00', '2013-12-28 06:08:43', '2013-12-28 06:08:43'),
(106, 1831, 1700, 2, 0, 2, 2, 0, 1831, '', '0000-00-00 00:00:00', '2013-12-28 07:05:35', '2013-12-28 07:05:35'),
(107, 1350, 1400, 1, 0, 1, 1, 0, 1416, '', '0000-00-00 00:00:00', '2013-12-28 07:13:45', '2013-12-28 07:13:45'),
(108, 1732, 1700, 2, 0, 2, 2, 0, 1732, '', '0000-00-00 00:00:00', '2013-12-28 07:16:12', '2013-12-28 07:16:12'),
(109, 1269, 1300, 0, 2, -2, 0, 2, 1269, '', '0000-00-00 00:00:00', '2013-12-28 17:01:59', '2013-12-28 17:01:59'),
(110, 1550, 1400, 3, 3, 2, 2, 2, 1401, '', '0000-00-00 00:00:00', '2013-12-28 17:03:15', '2013-12-28 17:03:15'),
(111, 1885, 1900, 0, 1, -1, 0, 1, 1885, '', '0000-00-00 00:00:00', '2013-12-28 17:49:33', '2013-12-28 17:49:33'),
(112, 1716, 1700, 1, 0, 1, 1, 0, 1716, '', '0000-00-00 00:00:00', '2013-12-28 18:44:41', '2013-12-28 18:44:41'),
(113, 1817, 1800, 1, 0, 1, 1, 0, 1817, '', '0000-00-00 00:00:00', '2013-12-29 10:43:29', '2013-12-29 10:43:29'),
(114, 1501, 1500, 1, 1, -1, 1, 0, 1518, '', '0000-00-00 00:00:00', '2013-12-29 10:43:51', '2013-12-29 10:43:51'),
(115, 1913, 1900, 1, 0, 1, 1, 0, 1913, '', '0000-00-00 00:00:00', '2013-12-29 12:22:51', '2013-12-29 12:22:51'),
(116, 1900, 1900, 0, 0, 0, 0, 0, 1900, '', '0000-00-00 00:00:00', '2013-12-29 12:28:08', '2013-12-29 12:28:08'),
(117, 1400, 1584, 0, 1, -1, 0, 1, 1584, 'trash', '0000-00-00 00:00:00', '2013-12-29 13:20:18', '2013-12-29 14:02:07'),
(118, 1350, 1484, 0, 4, -4, 0, 3, 1270, 'trash', '0000-00-00 00:00:00', '2013-12-29 13:21:18', '2013-12-29 14:02:36'),
(119, 1452, 1500, 0, 3, -3, 0, 1, 1485, '', '0000-00-00 00:00:00', '2013-12-29 14:35:01', '2013-12-29 14:35:01'),
(120, 1635, 1650, 0, 1, -1, 0, 1, 1635, '', '0000-00-00 00:00:00', '2013-12-29 15:18:43', '2013-12-29 15:18:43'),
(121, 1900, 1900, 0, 0, 0, 0, 0, 1900, '', '0000-00-00 00:00:00', '2013-12-29 19:20:47', '2013-12-29 19:20:47'),
(122, 1700, 1700, 0, 0, 0, 0, 0, 1700, '', '0000-00-00 00:00:00', '2013-12-29 20:37:35', '2013-12-29 20:37:35'),
(123, 1799, 1799, 0, 1, -1, 0, 1, 1799, 'Erlkonig', '0000-00-00 00:00:00', '2013-12-30 00:37:21', '2014-01-08 06:52:28'),
(124, 1200, 1200, 0, 0, 0, 0, 0, 1200, 'Erlkonig', '0000-00-00 00:00:00', '2013-12-30 12:42:20', '2013-12-30 12:42:20'),
(127, 1700, 1700, 0, 0, 0, 0, 0, 1700, 'alicia_san', '0000-00-00 00:00:00', '2013-12-30 12:45:01', '2013-12-30 12:45:01'),
(128, 1300, 1300, 0, 0, 0, 0, 0, 1300, 'Erlkonig', '0000-00-00 00:00:00', '2013-12-30 12:45:18', '2013-12-30 12:54:01'),
(129, 1600, 1600, 0, 0, 0, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2013-12-30 12:48:35', '2013-12-30 12:51:20'),
(130, 1600, 1600, 0, 0, 0, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2013-12-30 12:55:39', '2013-12-30 12:55:39'),
(131, 1715, 1450, 1, 0, 1, 1, 0, 1715, 'alicia_san', '0000-00-00 00:00:00', '2013-12-30 13:46:48', '2013-12-30 14:31:50'),
(132, 1700, 1600, 0, 0, 0, 0, 0, 1700, 'Erlkonig', '0000-00-00 00:00:00', '2013-12-30 13:48:10', '2013-12-30 16:46:04'),
(133, 1585, 1500, 0, 1, -1, 0, 1, 1585, 'alicia_san', '0000-00-00 00:00:00', '2013-12-30 14:23:04', '2013-12-30 14:33:24'),
(134, 1745, 1732, 5, 2, 1, 3, 0, 1749, 'Erlkonig', '0000-00-00 00:00:00', '2013-12-30 14:26:35', '2014-01-06 14:52:44'),
(135, 1650, 1650, 0, 0, 0, 0, 0, 1650, 'alicia_san', '0000-00-00 00:00:00', '2013-12-30 15:22:28', '2013-12-30 15:22:28'),
(136, 1416, 1450, 0, 2, -2, 0, 2, 1416, 'kazz_ito', '0000-00-00 00:00:00', '2013-12-30 15:48:27', '2013-12-30 15:48:27'),
(137, 1351, 1300, 3, 0, 3, 3, 0, 1351, 'kazz_ito', '0000-00-00 00:00:00', '2013-12-30 17:25:32', '2013-12-30 17:25:32'),
(138, 2000, 1900, 0, 0, 0, 0, 0, 1900, 'Erlkonig', '0000-00-00 00:00:00', '2013-12-30 20:03:11', '2014-01-03 08:25:18'),
(139, 1650, 1650, 0, 0, 0, 0, 0, 1650, 'trash', '0000-00-00 00:00:00', '2013-12-31 07:06:14', '2013-12-31 07:06:14'),
(140, 1300, 1300, 0, 0, 0, 0, 0, 1300, 'trash', '0000-00-00 00:00:00', '2013-12-31 07:06:24', '2013-12-31 07:06:24'),
(141, 1600, 1600, 0, 0, 0, 0, 0, 1600, 'trash', '0000-00-00 00:00:00', '2013-12-31 07:06:36', '2013-12-31 07:06:36'),
(142, 1316, 1300, 1, 0, 1, 1, 0, 1316, 'trash', '0000-00-00 00:00:00', '2013-12-31 07:09:42', '2013-12-31 07:09:42'),
(143, 1800, 1800, 0, 0, 0, 0, 0, 1800, 'trash', '0000-00-00 00:00:00', '2013-12-31 09:25:09', '2013-12-31 09:25:09'),
(144, 1732, 1650, 2, 1, 2, 2, 1, 1732, 'trash', '0000-00-00 00:00:00', '2014-01-01 10:51:41', '2014-01-01 11:51:14'),
(145, 1500, 1483, 0, 2, -2, 0, 1, 1483, 'trash', '0000-00-00 00:00:00', '2014-01-01 10:51:54', '2014-01-01 11:27:42'),
(146, 1300, 1400, 0, 1, -1, 0, 1, 1584, 'trash', '0000-00-00 00:00:00', '2014-01-01 11:49:14', '2014-01-01 12:27:36'),
(147, 1500, 1400, 0, 1, -1, 0, 1, 1584, 'trash', '0000-00-00 00:00:00', '2014-01-01 11:49:38', '2014-01-01 12:36:49'),
(148, 1600, 1600, 0, 0, 0, 0, 0, 1600, 'trash', '0000-00-00 00:00:00', '2014-01-01 14:09:54', '2014-01-01 14:09:54'),
(149, 1400, 1400, 0, 0, 0, 0, 0, 1400, 'trash', '0000-00-00 00:00:00', '2014-01-01 14:11:36', '2014-01-01 14:11:36'),
(150, 1400, 1400, 0, 0, 0, 0, 0, 1400, 'trash', '0000-00-00 00:00:00', '2014-01-01 14:11:45', '2014-01-01 14:11:45'),
(151, 2000, 2000, 0, 0, 0, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-03 08:24:12', '2014-01-03 08:24:12'),
(152, 1184, 1184, 0, 1, -1, 0, 0, 1600, 'trash', '0000-00-00 00:00:00', '2014-01-03 11:47:42', '2014-01-03 13:41:17'),
(153, 1668, 1700, 0, 2, -2, 0, 0, 1600, 'trash', '0000-00-00 00:00:00', '2014-01-03 11:48:33', '2014-01-03 11:48:33'),
(154, 1271, 1300, 0, 2, -2, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-03 12:25:48', '2014-01-03 12:25:48'),
(155, 1300, 1434, 0, 1, -1, 0, 0, 1600, 'abtrimmer', '0000-00-00 00:00:00', '2014-01-03 12:27:48', '2014-01-04 09:01:26'),
(156, 1300, 1300, 0, 0, 0, 0, 0, 1600, 'abtrimmer', '0000-00-00 00:00:00', '2014-01-04 08:42:20', '2014-01-04 08:42:20'),
(157, 2000, 2000, 0, 0, 0, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-04 10:46:50', '2014-01-04 10:46:50'),
(158, 1800, 1800, 0, 0, 0, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-04 10:49:08', '2014-01-04 10:49:08'),
(159, 1784, 1467, 1, 1, -1, 1, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-04 14:33:26', '2014-01-04 15:14:29'),
(160, 1500, 1500, 1, 1, 1, 1, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-04 15:21:09', '2014-01-04 15:21:09'),
(161, 1450, 1450, 1, 1, -1, 1, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-04 15:23:24', '2014-01-04 15:23:24'),
(162, 1433, 1400, 2, 0, 2, 2, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-04 15:55:01', '2014-01-04 15:55:01'),
(163, 1300, 1350, 0, 1, -1, 0, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-04 17:04:02', '2014-01-04 18:04:11'),
(164, 1350, 1416, 1, 1, -1, 1, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-04 17:08:49', '2014-01-04 18:03:12'),
(165, 1817, 1800, 1, 0, 1, 1, 0, 1817, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-05 13:52:03', '2014-01-05 13:52:03'),
(166, 1350, 1417, 1, 0, 1, 1, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-05 14:12:41', '2014-01-05 15:00:09'),
(167, 1450, 1450, 1, 1, 1, 1, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-06 14:15:32', '2014-01-06 14:15:32'),
(168, 1400, 1450, 1, 0, 1, 1, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-06 15:06:19', '2014-01-06 15:06:19'),
(169, 1400, 1450, 0, 0, 0, 0, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-06 15:06:31', '2014-01-06 15:07:36'),
(170, 1269, 1300, 0, 2, -2, 0, 0, 1600, 'kazz_ito', '0000-00-00 00:00:00', '2014-01-07 14:34:40', '2014-01-07 14:34:40'),
(171, 2000, 2000, 0, 0, 0, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-08 14:58:25', '2014-01-08 14:58:25'),
(172, 1800, 1800, 0, 0, 0, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-08 14:58:44', '2014-01-09 20:08:51'),
(173, 1600, 1600, 0, 0, 0, 0, 0, 1600, 'Erlkonig', '0000-00-00 00:00:00', '2014-01-09 20:09:11', '2014-01-09 20:09:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `rate_editlog`
--

CREATE TABLE IF NOT EXISTS `rate_editlog` (
  `rate_editlog_id` int(11) NOT NULL auto_increment,
  `edited_player_id` int(11) NOT NULL,
  `previous_name` varchar(45) default NULL,
  `previous_rate` smallint(6) NOT NULL,
  `new_rate` smallint(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  `edited_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`rate_editlog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- テーブルのデータのダンプ `rate_editlog`
--

INSERT INTO `rate_editlog` (`rate_editlog_id`, `edited_player_id`, `previous_name`, `previous_rate`, `new_rate`, `user_id`, `status`, `edited_on`) VALUES
(1, 123, NULL, 1600, 1400, 1, 0, '2013-12-30 00:37:21'),
(2, 123, NULL, 1400, 1800, 1, 0, '2013-12-30 00:37:49'),
(3, 124, NULL, 1600, 1200, 1, 0, '2013-12-30 12:42:20'),
(4, 125, NULL, 1600, 1700, 3, 0, '2013-12-30 12:45:01'),
(5, 126, NULL, 1600, 1300, 1, 0, '2013-12-30 12:45:18'),
(6, 127, NULL, 1600, 1600, 1, 0, '2013-12-30 12:48:35'),
(7, 127, NULL, 1600, 1600, 1, 0, '2013-12-30 12:51:20'),
(8, 126, NULL, 1300, 1300, 1, 0, '2013-12-30 12:54:01'),
(9, 128, NULL, 1600, 1600, 1, 0, '2013-12-30 12:55:39'),
(10, 129, NULL, 1600, 1450, 11, 0, '2013-12-30 13:46:48'),
(11, 130, NULL, 1600, 1600, 1, 0, '2013-12-30 13:48:10'),
(12, 131, NULL, 1600, 1500, 11, 0, '2013-12-30 14:23:04'),
(13, 132, NULL, 1600, 1650, 11, 0, '2013-12-30 14:26:35'),
(14, 129, NULL, 1450, 1700, 3, 0, '2013-12-30 14:31:50'),
(15, 132, NULL, 1650, 1700, 3, 0, '2013-12-30 14:33:12'),
(16, 131, NULL, 1500, 1600, 3, 0, '2013-12-30 14:33:24'),
(17, 133, NULL, 1600, 1650, 3, 0, '2013-12-30 15:22:28'),
(18, 134, NULL, 1600, 1450, 11, 0, '2013-12-30 15:48:27'),
(19, 130, NULL, 1600, 1700, 1, 0, '2013-12-30 16:46:04'),
(20, 135, NULL, 1600, 1300, 11, 0, '2013-12-30 17:25:32'),
(21, 136, NULL, 1600, 1900, 3, 0, '2013-12-30 20:03:11'),
(22, 137, NULL, 1600, 1650, 5, 0, '2013-12-31 07:06:14'),
(23, 138, NULL, 1600, 1300, 5, 0, '2013-12-31 07:06:24'),
(24, 139, NULL, 1600, 1600, 5, 0, '2013-12-31 07:06:36'),
(25, 140, NULL, 1600, 1300, 5, 0, '2013-12-31 07:09:42'),
(26, 141, NULL, 1600, 1800, 5, 0, '2013-12-31 09:25:09'),
(27, 142, NULL, 1600, 1600, 5, 0, '2014-01-01 10:51:41'),
(28, 143, NULL, 1600, 1500, 5, 0, '2014-01-01 10:51:54'),
(29, 143, 'Hellsinker', 1483, 1600, 5, 0, '2014-01-01 11:27:42'),
(30, 142, 'tukuyomi', 1583, 1650, 5, 0, '2014-01-01 11:28:27'),
(31, 144, NULL, 1600, 1600, 5, 0, '2014-01-01 11:49:14'),
(32, 145, NULL, 1600, 1600, 5, 0, '2014-01-01 11:49:38'),
(33, 142, 'tukuyomi', 1650, 1700, 5, 0, '2014-01-01 11:51:14'),
(34, 145, 'potocool3001', 1584, 1500, 5, 0, '2014-01-01 12:27:19'),
(35, 144, 'daidai', 1584, 1400, 5, 0, '2014-01-01 12:27:26'),
(36, 144, 'daidai', 1400, 1300, 5, 0, '2014-01-01 12:27:36'),
(37, 145, 'potocool3001', 1500, 1400, 5, 0, '2014-01-01 12:36:40'),
(38, 145, 'potocool3001', 1400, 1500, 5, 0, '2014-01-01 12:36:49'),
(39, 146, NULL, 1600, 1600, 5, 0, '2014-01-01 14:09:54'),
(40, 147, NULL, 1600, 1400, 5, 0, '2014-01-01 14:11:36'),
(41, 148, NULL, 1600, 1400, 5, 0, '2014-01-01 14:11:45'),
(42, 26, 'pokeke', 1684, 1800, 1, 0, '2014-01-03 07:25:30'),
(43, 149, NULL, 1600, 2000, 1, 0, '2014-01-03 08:24:12'),
(44, 136, 'emery', 1900, 2000, 1, 0, '2014-01-03 08:25:18'),
(45, 9, 'tomyam', 1900, 2000, 1, 0, '2014-01-03 08:26:07'),
(46, 5, 'masa4', 1900, 2000, 1, 0, '2014-01-03 08:26:28'),
(47, 4, 'GARU', 1900, 1850, 1, 0, '2014-01-03 08:27:52'),
(48, 2, 'koujan', 1899, 1970, 1, 0, '2014-01-03 08:28:18'),
(49, 150, NULL, 1600, 1200, 5, 0, '2014-01-03 11:47:43'),
(50, 151, NULL, 1600, 1700, 5, 0, '2014-01-03 11:48:33'),
(51, 152, NULL, 1600, 1300, 1, 0, '2014-01-03 12:25:48'),
(52, 153, NULL, 1600, 1450, 1, 0, '2014-01-03 12:27:48'),
(53, 150, 'mozibake', 1184, 1184, 1, 0, '2014-01-03 13:37:29'),
(54, 150, 'mozibake', 1184, 1184, 5, 0, '2014-01-03 13:41:17'),
(55, 154, NULL, 1600, 1300, 8, 0, '2014-01-04 08:42:20'),
(56, 153, 'ga-1', 1434, 1300, 8, 0, '2014-01-04 09:01:26'),
(57, 75, 'osaka_htps', 1466, 1550, 8, 0, '2014-01-04 09:19:38'),
(58, 77, 'imoimo', 1431, 1450, 8, 0, '2014-01-04 09:20:05'),
(59, 155, NULL, 1600, 2000, 1, 0, '2014-01-04 10:46:50'),
(60, 156, NULL, 1600, 1800, 1, 0, '2014-01-04 10:49:08'),
(61, 157, NULL, 1600, 1450, 11, 0, '2014-01-04 14:33:26'),
(62, 157, 'kasupon1981', 1467, 1800, 11, 0, '2014-01-04 15:14:29'),
(63, 158, NULL, 1600, 1500, 11, 0, '2014-01-04 15:21:09'),
(64, 159, NULL, 1600, 1450, 11, 0, '2014-01-04 15:23:24'),
(65, 33, 'mjkxw129', 1700, 1700, 5, 0, '2014-01-04 15:43:19'),
(66, 160, NULL, 1600, 1400, 11, 0, '2014-01-04 15:55:01'),
(67, 161, NULL, 1600, 1400, 11, 0, '2014-01-04 17:04:02'),
(68, 162, NULL, 1600, 1400, 11, 0, '2014-01-04 17:08:49'),
(69, 161, 'Ebihurai', 1384, 1350, 11, 0, '2014-01-04 18:02:42'),
(70, 162, 'KyabetuTarou', 1416, 1450, 11, 0, '2014-01-04 18:03:12'),
(71, 161, 'Ebihurai', 1350, 1300, 11, 0, '2014-01-04 18:04:11'),
(72, 163, NULL, 1600, 1800, 11, 0, '2014-01-05 13:52:03'),
(73, 164, NULL, 1600, 1400, 11, 0, '2014-01-05 14:12:41'),
(74, 164, 'd715iba', 1417, 1350, 11, 0, '2014-01-05 15:00:09'),
(75, 165, NULL, 1600, 1450, 11, 0, '2014-01-06 14:15:32'),
(76, 132, 'gozila', 1732, 1732, 1, 0, '2014-01-06 14:52:44'),
(77, 166, NULL, 1600, 1450, 11, 0, '2014-01-06 15:06:19'),
(78, 167, NULL, 1600, 1450, 11, 0, '2014-01-06 15:06:31'),
(79, 167, 'nao_zzg', 1450, 1400, 11, 0, '2014-01-06 15:07:36'),
(80, 51, 'oyacchan', 1585, 1650, 1, 0, '2014-01-06 16:34:30'),
(81, 168, NULL, 1600, 1300, 11, 0, '2014-01-07 14:34:40'),
(82, 123, 'function_test_user3', 1799, 1799, 1, 0, '2014-01-08 06:52:28'),
(83, 169, NULL, 1600, 2000, 1, 0, '2014-01-08 14:58:25'),
(84, 170, NULL, 1600, 1800, 1, 0, '2014-01-08 14:58:44'),
(85, 170, 'es[assi', 1800, 1800, 1, 0, '2014-01-09 20:08:51'),
(86, 171, NULL, 1600, 1600, 1, 0, '2014-01-09 20:09:11');

-- --------------------------------------------------------

--
-- テーブルの構造 `updatelog`
--

CREATE TABLE IF NOT EXISTS `updatelog` (
  `update_id` int(11) NOT NULL auto_increment,
  `update_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `update_note` text,
  `delete_flag` tinyint(4) NOT NULL,
  PRIMARY KEY  (`update_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `updatelog`
--

INSERT INTO `updatelog` (`update_id`, `update_date`, `update_note`, `delete_flag`) VALUES
(1, '2013-12-11 23:18:36', 'とりあえず作成', 0),
(2, '2013-12-11 23:18:36', '見えないかテスト', 1),
(3, '2013-12-18 14:13:08', 'IRCNETが攻撃をよく受けるので、海外サーバーへの変更をおすすめします。\r\nアドレスは\r\nircnet.eversible.com', 0),
(4, '2013-12-18 15:19:40', 'TeamSpeak導入しています。\r\nServer Addressはts3.stripepan2.com\r\nDeltaのAOCHD、パスワードはaochdでお待ちしております。', 0),
(5, '2013-12-24 15:09:13', 'IRCNET系列でリレーされていた海外サーバーとの接続が切られたそうです。これからはirc.livedoor.ne.jp等の国内サーバーをご利用下さい。', 0),
(6, '2014-01-09 20:09:57', 'レイアウト一新しました。', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(45) NOT NULL,
  `user_password` char(32) NOT NULL,
  `user_control` varchar(45) NOT NULL,
  `last_editor` varchar(45) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_control`, `last_editor`, `delete_flag`, `created_on`, `updated_on`) VALUES
(1, 'Erlkonig', '18a8d55ab547cbd27cf8424249c2efcf', 'administrator', 'Erlkonig', 0, '0000-00-00 00:00:00', '2013-12-24 22:57:46'),
(2, 'mutti', 'efe6398127928f1b2e9ef3207fb82663', 'host', 'Erlkonig', 1, '0000-00-00 00:00:00', '2014-01-03 02:56:50'),
(3, 'alicia_san', '066e3c4dd097ac16d8ec5be8b1f458a6', 'host', '', 0, '0000-00-00 00:00:00', '2013-12-22 14:53:25'),
(4, 'osakahtps', '066e3c4dd097ac16d8ec5be8b1f458a6', 'host', '', 0, '0000-00-00 00:00:00', '2013-12-22 14:53:25'),
(5, 'trash', 'e8abfcc3b8ca797c98df58d8578775db', 'host', 'trash', 0, '0000-00-00 00:00:00', '2013-12-27 02:10:43'),
(6, 'konitan', '066e3c4dd097ac16d8ec5be8b1f458a6', 'host', '', 0, '0000-00-00 00:00:00', '2013-12-22 14:53:25'),
(7, 'i_Phone', 'c5a633b61a0e45a7b8d5ac0bcbd56337', 'host', 'i_Phone', 0, '0000-00-00 00:00:00', '2013-12-23 23:49:11'),
(8, 'abtrimmer', '066e3c4dd097ac16d8ec5be8b1f458a6', 'host', '', 0, '0000-00-00 00:00:00', '2013-12-22 15:01:33'),
(9, 'oyacchan', '066e3c4dd097ac16d8ec5be8b1f458a6', 'host', '', 0, '0000-00-00 00:00:00', '2013-12-26 22:22:20'),
(11, 'kazz_ito', '066e3c4dd097ac16d8ec5be8b1f458a6', 'host', '', 0, '0000-00-00 00:00:00', '2013-12-27 18:58:17'),
(12, 'test', '066e3c4dd097ac16d8ec5be8b1f458a6', 'host', 'Erlkonig', 1, '2014-01-05 02:23:42', '2014-01-05 02:30:24');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_editlog`
--

CREATE TABLE IF NOT EXISTS `user_editlog` (
  `user_edited_id` int(11) NOT NULL auto_increment,
  `edited_user_id` int(11) NOT NULL,
  `previous_name` varchar(45) default NULL,
  `new_name` varchar(45) NOT NULL,
  `previous_control` varchar(45) default NULL,
  `new_control` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_edited_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `user_editlog`
--

INSERT INTO `user_editlog` (`user_edited_id`, `edited_user_id`, `previous_name`, `new_name`, `previous_control`, `new_control`, `user_id`, `created_on`) VALUES
(1, 12, NULL, 'test', NULL, 'host', 1, '2014-01-05 02:23:42');
--
-- データベース: `information_schema`
--
CREATE DATABASE `information_schema` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `information_schema`;

-- --------------------------------------------------------

--
-- テーブルの構造 `CHARACTER_SETS`
--

CREATE TEMPORARY TABLE `CHARACTER_SETS` (
  `CHARACTER_SET_NAME` varchar(64) NOT NULL default '',
  `DEFAULT_COLLATE_NAME` varchar(64) NOT NULL default '',
  `DESCRIPTION` varchar(60) NOT NULL default '',
  `MAXLEN` bigint(3) NOT NULL default '0'
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `CHARACTER_SETS`
--

INSERT INTO `CHARACTER_SETS` (`CHARACTER_SET_NAME`, `DEFAULT_COLLATE_NAME`, `DESCRIPTION`, `MAXLEN`) VALUES
('big5', 'big5_chinese_ci', 'Big5 Traditional Chinese', 2),
('dec8', 'dec8_swedish_ci', 'DEC West European', 1),
('cp850', 'cp850_general_ci', 'DOS West European', 1),
('hp8', 'hp8_english_ci', 'HP West European', 1),
('koi8r', 'koi8r_general_ci', 'KOI8-R Relcom Russian', 1),
('latin1', 'latin1_swedish_ci', 'cp1252 West European', 1),
('latin2', 'latin2_general_ci', 'ISO 8859-2 Central European', 1),
('swe7', 'swe7_swedish_ci', '7bit Swedish', 1),
('ascii', 'ascii_general_ci', 'US ASCII', 1),
('ujis', 'ujis_japanese_ci', 'EUC-JP Japanese', 3),
('sjis', 'sjis_japanese_ci', 'Shift-JIS Japanese', 2),
('hebrew', 'hebrew_general_ci', 'ISO 8859-8 Hebrew', 1),
('tis620', 'tis620_thai_ci', 'TIS620 Thai', 1),
('euckr', 'euckr_korean_ci', 'EUC-KR Korean', 2),
('koi8u', 'koi8u_general_ci', 'KOI8-U Ukrainian', 1),
('gb2312', 'gb2312_chinese_ci', 'GB2312 Simplified Chinese', 2),
('greek', 'greek_general_ci', 'ISO 8859-7 Greek', 1),
('cp1250', 'cp1250_general_ci', 'Windows Central European', 1),
('gbk', 'gbk_chinese_ci', 'GBK Simplified Chinese', 2),
('latin5', 'latin5_turkish_ci', 'ISO 8859-9 Turkish', 1),
('armscii8', 'armscii8_general_ci', 'ARMSCII-8 Armenian', 1),
('utf8', 'utf8_general_ci', 'UTF-8 Unicode', 3),
('ucs2', 'ucs2_general_ci', 'UCS-2 Unicode', 2),
('cp866', 'cp866_general_ci', 'DOS Russian', 1),
('keybcs2', 'keybcs2_general_ci', 'DOS Kamenicky Czech-Slovak', 1),
('macce', 'macce_general_ci', 'Mac Central European', 1),
('macroman', 'macroman_general_ci', 'Mac West European', 1),
('cp852', 'cp852_general_ci', 'DOS Central European', 1),
('latin7', 'latin7_general_ci', 'ISO 8859-13 Baltic', 1),
('cp1251', 'cp1251_general_ci', 'Windows Cyrillic', 1),
('cp1256', 'cp1256_general_ci', 'Windows Arabic', 1),
('cp1257', 'cp1257_general_ci', 'Windows Baltic', 1),
('binary', 'binary', 'Binary pseudo charset', 1),
('geostd8', 'geostd8_general_ci', 'GEOSTD8 Georgian', 1),
('cp932', 'cp932_japanese_ci', 'SJIS for Windows Japanese', 2),
('eucjpms', 'eucjpms_japanese_ci', 'UJIS for Windows Japanese', 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `COLLATIONS`
--

CREATE TEMPORARY TABLE `COLLATIONS` (
  `COLLATION_NAME` varchar(64) NOT NULL default '',
  `CHARACTER_SET_NAME` varchar(64) NOT NULL default '',
  `ID` bigint(11) NOT NULL default '0',
  `IS_DEFAULT` varchar(3) NOT NULL default '',
  `IS_COMPILED` varchar(3) NOT NULL default '',
  `SORTLEN` bigint(3) NOT NULL default '0'
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `COLLATIONS`
--

INSERT INTO `COLLATIONS` (`COLLATION_NAME`, `CHARACTER_SET_NAME`, `ID`, `IS_DEFAULT`, `IS_COMPILED`, `SORTLEN`) VALUES
('big5_chinese_ci', 'big5', 1, 'Yes', 'Yes', 1),
('big5_bin', 'big5', 84, '', 'Yes', 1),
('dec8_swedish_ci', 'dec8', 3, 'Yes', 'Yes', 1),
('dec8_bin', 'dec8', 69, '', 'Yes', 1),
('cp850_general_ci', 'cp850', 4, 'Yes', 'Yes', 1),
('cp850_bin', 'cp850', 80, '', 'Yes', 1),
('hp8_english_ci', 'hp8', 6, 'Yes', 'Yes', 1),
('hp8_bin', 'hp8', 72, '', 'Yes', 1),
('koi8r_general_ci', 'koi8r', 7, 'Yes', 'Yes', 1),
('koi8r_bin', 'koi8r', 74, '', 'Yes', 1),
('latin1_german1_ci', 'latin1', 5, '', 'Yes', 1),
('latin1_swedish_ci', 'latin1', 8, 'Yes', 'Yes', 1),
('latin1_danish_ci', 'latin1', 15, '', 'Yes', 1),
('latin1_german2_ci', 'latin1', 31, '', 'Yes', 2),
('latin1_bin', 'latin1', 47, '', 'Yes', 1),
('latin1_general_ci', 'latin1', 48, '', 'Yes', 1),
('latin1_general_cs', 'latin1', 49, '', 'Yes', 1),
('latin1_spanish_ci', 'latin1', 94, '', 'Yes', 1),
('latin2_czech_cs', 'latin2', 2, '', 'Yes', 4),
('latin2_general_ci', 'latin2', 9, 'Yes', 'Yes', 1),
('latin2_hungarian_ci', 'latin2', 21, '', 'Yes', 1),
('latin2_croatian_ci', 'latin2', 27, '', 'Yes', 1),
('latin2_bin', 'latin2', 77, '', 'Yes', 1),
('swe7_swedish_ci', 'swe7', 10, 'Yes', 'Yes', 1),
('swe7_bin', 'swe7', 82, '', 'Yes', 1),
('ascii_general_ci', 'ascii', 11, 'Yes', 'Yes', 1),
('ascii_bin', 'ascii', 65, '', 'Yes', 1),
('ujis_japanese_ci', 'ujis', 12, 'Yes', 'Yes', 1),
('ujis_bin', 'ujis', 91, '', 'Yes', 1),
('sjis_japanese_ci', 'sjis', 13, 'Yes', 'Yes', 1),
('sjis_bin', 'sjis', 88, '', 'Yes', 1),
('hebrew_general_ci', 'hebrew', 16, 'Yes', 'Yes', 1),
('hebrew_bin', 'hebrew', 71, '', 'Yes', 1),
('tis620_thai_ci', 'tis620', 18, 'Yes', 'Yes', 4),
('tis620_bin', 'tis620', 89, '', 'Yes', 1),
('euckr_korean_ci', 'euckr', 19, 'Yes', 'Yes', 1),
('euckr_bin', 'euckr', 85, '', 'Yes', 1),
('koi8u_general_ci', 'koi8u', 22, 'Yes', 'Yes', 1),
('koi8u_bin', 'koi8u', 75, '', 'Yes', 1),
('gb2312_chinese_ci', 'gb2312', 24, 'Yes', 'Yes', 1),
('gb2312_bin', 'gb2312', 86, '', 'Yes', 1),
('greek_general_ci', 'greek', 25, 'Yes', 'Yes', 1),
('greek_bin', 'greek', 70, '', 'Yes', 1),
('cp1250_general_ci', 'cp1250', 26, 'Yes', 'Yes', 1),
('cp1250_czech_cs', 'cp1250', 34, '', 'Yes', 2),
('cp1250_croatian_ci', 'cp1250', 44, '', 'Yes', 1),
('cp1250_bin', 'cp1250', 66, '', 'Yes', 1),
('gbk_chinese_ci', 'gbk', 28, 'Yes', 'Yes', 1),
('gbk_bin', 'gbk', 87, '', 'Yes', 1),
('latin5_turkish_ci', 'latin5', 30, 'Yes', 'Yes', 1),
('latin5_bin', 'latin5', 78, '', 'Yes', 1),
('armscii8_general_ci', 'armscii8', 32, 'Yes', 'Yes', 1),
('armscii8_bin', 'armscii8', 64, '', 'Yes', 1),
('utf8_general_ci', 'utf8', 33, 'Yes', 'Yes', 1),
('utf8_bin', 'utf8', 83, '', 'Yes', 1),
('utf8_unicode_ci', 'utf8', 192, '', 'Yes', 8),
('utf8_icelandic_ci', 'utf8', 193, '', 'Yes', 8),
('utf8_latvian_ci', 'utf8', 194, '', 'Yes', 8),
('utf8_romanian_ci', 'utf8', 195, '', 'Yes', 8),
('utf8_slovenian_ci', 'utf8', 196, '', 'Yes', 8),
('utf8_polish_ci', 'utf8', 197, '', 'Yes', 8),
('utf8_estonian_ci', 'utf8', 198, '', 'Yes', 8),
('utf8_spanish_ci', 'utf8', 199, '', 'Yes', 8),
('utf8_swedish_ci', 'utf8', 200, '', 'Yes', 8),
('utf8_turkish_ci', 'utf8', 201, '', 'Yes', 8),
('utf8_czech_ci', 'utf8', 202, '', 'Yes', 8),
('utf8_danish_ci', 'utf8', 203, '', 'Yes', 8),
('utf8_lithuanian_ci', 'utf8', 204, '', 'Yes', 8),
('utf8_slovak_ci', 'utf8', 205, '', 'Yes', 8),
('utf8_spanish2_ci', 'utf8', 206, '', 'Yes', 8),
('utf8_roman_ci', 'utf8', 207, '', 'Yes', 8),
('utf8_persian_ci', 'utf8', 208, '', 'Yes', 8),
('utf8_esperanto_ci', 'utf8', 209, '', 'Yes', 8),
('utf8_hungarian_ci', 'utf8', 210, '', 'Yes', 8),
('ucs2_general_ci', 'ucs2', 35, 'Yes', 'Yes', 1),
('ucs2_bin', 'ucs2', 90, '', 'Yes', 1),
('ucs2_unicode_ci', 'ucs2', 128, '', 'Yes', 8),
('ucs2_icelandic_ci', 'ucs2', 129, '', 'Yes', 8),
('ucs2_latvian_ci', 'ucs2', 130, '', 'Yes', 8),
('ucs2_romanian_ci', 'ucs2', 131, '', 'Yes', 8),
('ucs2_slovenian_ci', 'ucs2', 132, '', 'Yes', 8),
('ucs2_polish_ci', 'ucs2', 133, '', 'Yes', 8),
('ucs2_estonian_ci', 'ucs2', 134, '', 'Yes', 8),
('ucs2_spanish_ci', 'ucs2', 135, '', 'Yes', 8),
('ucs2_swedish_ci', 'ucs2', 136, '', 'Yes', 8),
('ucs2_turkish_ci', 'ucs2', 137, '', 'Yes', 8),
('ucs2_czech_ci', 'ucs2', 138, '', 'Yes', 8),
('ucs2_danish_ci', 'ucs2', 139, '', 'Yes', 8),
('ucs2_lithuanian_ci', 'ucs2', 140, '', 'Yes', 8),
('ucs2_slovak_ci', 'ucs2', 141, '', 'Yes', 8),
('ucs2_spanish2_ci', 'ucs2', 142, '', 'Yes', 8),
('ucs2_roman_ci', 'ucs2', 143, '', 'Yes', 8),
('ucs2_persian_ci', 'ucs2', 144, '', 'Yes', 8),
('ucs2_esperanto_ci', 'ucs2', 145, '', 'Yes', 8),
('ucs2_hungarian_ci', 'ucs2', 146, '', 'Yes', 8),
('cp866_general_ci', 'cp866', 36, 'Yes', 'Yes', 1),
('cp866_bin', 'cp866', 68, '', 'Yes', 1),
('keybcs2_general_ci', 'keybcs2', 37, 'Yes', 'Yes', 1),
('keybcs2_bin', 'keybcs2', 73, '', 'Yes', 1),
('macce_general_ci', 'macce', 38, 'Yes', 'Yes', 1),
('macce_bin', 'macce', 43, '', 'Yes', 1),
('macroman_general_ci', 'macroman', 39, 'Yes', 'Yes', 1),
('macroman_bin', 'macroman', 53, '', 'Yes', 1),
('cp852_general_ci', 'cp852', 40, 'Yes', 'Yes', 1),
('cp852_bin', 'cp852', 81, '', 'Yes', 1),
('latin7_estonian_cs', 'latin7', 20, '', 'Yes', 1),
('latin7_general_ci', 'latin7', 41, 'Yes', 'Yes', 1),
('latin7_general_cs', 'latin7', 42, '', 'Yes', 1),
('latin7_bin', 'latin7', 79, '', 'Yes', 1),
('cp1251_bulgarian_ci', 'cp1251', 14, '', 'Yes', 1),
('cp1251_ukrainian_ci', 'cp1251', 23, '', 'Yes', 1),
('cp1251_bin', 'cp1251', 50, '', 'Yes', 1),
('cp1251_general_ci', 'cp1251', 51, 'Yes', 'Yes', 1),
('cp1251_general_cs', 'cp1251', 52, '', 'Yes', 1),
('cp1256_general_ci', 'cp1256', 57, 'Yes', 'Yes', 1),
('cp1256_bin', 'cp1256', 67, '', 'Yes', 1),
('cp1257_lithuanian_ci', 'cp1257', 29, '', 'Yes', 1),
('cp1257_bin', 'cp1257', 58, '', 'Yes', 1),
('cp1257_general_ci', 'cp1257', 59, 'Yes', 'Yes', 1),
('binary', 'binary', 63, 'Yes', 'Yes', 1),
('geostd8_general_ci', 'geostd8', 92, 'Yes', 'Yes', 1),
('geostd8_bin', 'geostd8', 93, '', 'Yes', 1),
('cp932_japanese_ci', 'cp932', 95, 'Yes', 'Yes', 1),
('cp932_bin', 'cp932', 96, '', 'Yes', 1),
('eucjpms_japanese_ci', 'eucjpms', 97, 'Yes', 'Yes', 1),
('eucjpms_bin', 'eucjpms', 98, '', 'Yes', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `COLLATION_CHARACTER_SET_APPLICABILITY`
--

CREATE TEMPORARY TABLE `COLLATION_CHARACTER_SET_APPLICABILITY` (
  `COLLATION_NAME` varchar(64) NOT NULL default '',
  `CHARACTER_SET_NAME` varchar(64) NOT NULL default ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `COLLATION_CHARACTER_SET_APPLICABILITY`
--

INSERT INTO `COLLATION_CHARACTER_SET_APPLICABILITY` (`COLLATION_NAME`, `CHARACTER_SET_NAME`) VALUES
('big5_chinese_ci', 'big5'),
('big5_bin', 'big5'),
('dec8_swedish_ci', 'dec8'),
('dec8_bin', 'dec8'),
('cp850_general_ci', 'cp850'),
('cp850_bin', 'cp850'),
('hp8_english_ci', 'hp8'),
('hp8_bin', 'hp8'),
('koi8r_general_ci', 'koi8r'),
('koi8r_bin', 'koi8r'),
('latin1_german1_ci', 'latin1'),
('latin1_swedish_ci', 'latin1'),
('latin1_danish_ci', 'latin1'),
('latin1_german2_ci', 'latin1'),
('latin1_bin', 'latin1'),
('latin1_general_ci', 'latin1'),
('latin1_general_cs', 'latin1'),
('latin1_spanish_ci', 'latin1'),
('latin2_czech_cs', 'latin2'),
('latin2_general_ci', 'latin2'),
('latin2_hungarian_ci', 'latin2'),
('latin2_croatian_ci', 'latin2'),
('latin2_bin', 'latin2'),
('swe7_swedish_ci', 'swe7'),
('swe7_bin', 'swe7'),
('ascii_general_ci', 'ascii'),
('ascii_bin', 'ascii'),
('ujis_japanese_ci', 'ujis'),
('ujis_bin', 'ujis'),
('sjis_japanese_ci', 'sjis'),
('sjis_bin', 'sjis'),
('hebrew_general_ci', 'hebrew'),
('hebrew_bin', 'hebrew'),
('tis620_thai_ci', 'tis620'),
('tis620_bin', 'tis620'),
('euckr_korean_ci', 'euckr'),
('euckr_bin', 'euckr'),
('koi8u_general_ci', 'koi8u'),
('koi8u_bin', 'koi8u'),
('gb2312_chinese_ci', 'gb2312'),
('gb2312_bin', 'gb2312'),
('greek_general_ci', 'greek'),
('greek_bin', 'greek'),
('cp1250_general_ci', 'cp1250'),
('cp1250_czech_cs', 'cp1250'),
('cp1250_croatian_ci', 'cp1250'),
('cp1250_bin', 'cp1250'),
('gbk_chinese_ci', 'gbk'),
('gbk_bin', 'gbk'),
('latin5_turkish_ci', 'latin5'),
('latin5_bin', 'latin5'),
('armscii8_general_ci', 'armscii8'),
('armscii8_bin', 'armscii8'),
('utf8_general_ci', 'utf8'),
('utf8_bin', 'utf8'),
('utf8_unicode_ci', 'utf8'),
('utf8_icelandic_ci', 'utf8'),
('utf8_latvian_ci', 'utf8'),
('utf8_romanian_ci', 'utf8'),
('utf8_slovenian_ci', 'utf8'),
('utf8_polish_ci', 'utf8'),
('utf8_estonian_ci', 'utf8'),
('utf8_spanish_ci', 'utf8'),
('utf8_swedish_ci', 'utf8'),
('utf8_turkish_ci', 'utf8'),
('utf8_czech_ci', 'utf8'),
('utf8_danish_ci', 'utf8'),
('utf8_lithuanian_ci', 'utf8'),
('utf8_slovak_ci', 'utf8'),
('utf8_spanish2_ci', 'utf8'),
('utf8_roman_ci', 'utf8'),
('utf8_persian_ci', 'utf8'),
('utf8_esperanto_ci', 'utf8'),
('utf8_hungarian_ci', 'utf8'),
('ucs2_general_ci', 'ucs2'),
('ucs2_bin', 'ucs2'),
('ucs2_unicode_ci', 'ucs2'),
('ucs2_icelandic_ci', 'ucs2'),
('ucs2_latvian_ci', 'ucs2'),
('ucs2_romanian_ci', 'ucs2'),
('ucs2_slovenian_ci', 'ucs2'),
('ucs2_polish_ci', 'ucs2'),
('ucs2_estonian_ci', 'ucs2'),
('ucs2_spanish_ci', 'ucs2'),
('ucs2_swedish_ci', 'ucs2'),
('ucs2_turkish_ci', 'ucs2'),
('ucs2_czech_ci', 'ucs2'),
('ucs2_danish_ci', 'ucs2'),
('ucs2_lithuanian_ci', 'ucs2'),
('ucs2_slovak_ci', 'ucs2'),
('ucs2_spanish2_ci', 'ucs2'),
('ucs2_roman_ci', 'ucs2'),
('ucs2_persian_ci', 'ucs2'),
('ucs2_esperanto_ci', 'ucs2'),
('ucs2_hungarian_ci', 'ucs2'),
('cp866_general_ci', 'cp866'),
('cp866_bin', 'cp866'),
('keybcs2_general_ci', 'keybcs2'),
('keybcs2_bin', 'keybcs2'),
('macce_general_ci', 'macce'),
('macce_bin', 'macce'),
('macroman_general_ci', 'macroman'),
('macroman_bin', 'macroman'),
('cp852_general_ci', 'cp852'),
('cp852_bin', 'cp852'),
('latin7_estonian_cs', 'latin7'),
('latin7_general_ci', 'latin7'),
('latin7_general_cs', 'latin7'),
('latin7_bin', 'latin7'),
('cp1251_bulgarian_ci', 'cp1251'),
('cp1251_ukrainian_ci', 'cp1251'),
('cp1251_bin', 'cp1251'),
('cp1251_general_ci', 'cp1251'),
('cp1251_general_cs', 'cp1251'),
('cp1256_general_ci', 'cp1256'),
('cp1256_bin', 'cp1256'),
('cp1257_lithuanian_ci', 'cp1257'),
('cp1257_bin', 'cp1257'),
('cp1257_general_ci', 'cp1257'),
('binary', 'binary'),
('geostd8_general_ci', 'geostd8'),
('geostd8_bin', 'geostd8'),
('cp932_japanese_ci', 'cp932'),
('cp932_bin', 'cp932'),
('eucjpms_japanese_ci', 'eucjpms'),
('eucjpms_bin', 'eucjpms');

-- --------------------------------------------------------

--
-- テーブルの構造 `COLUMNS`
--

CREATE TEMPORARY TABLE `COLUMNS` (
  `TABLE_CATALOG` varchar(512) default NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `TABLE_NAME` varchar(64) NOT NULL default '',
  `COLUMN_NAME` varchar(64) NOT NULL default '',
  `ORDINAL_POSITION` bigint(21) NOT NULL default '0',
  `COLUMN_DEFAULT` longtext,
  `IS_NULLABLE` varchar(3) NOT NULL default '',
  `DATA_TYPE` varchar(64) NOT NULL default '',
  `CHARACTER_MAXIMUM_LENGTH` bigint(21) default NULL,
  `CHARACTER_OCTET_LENGTH` bigint(21) default NULL,
  `NUMERIC_PRECISION` bigint(21) default NULL,
  `NUMERIC_SCALE` bigint(21) default NULL,
  `CHARACTER_SET_NAME` varchar(64) default NULL,
  `COLLATION_NAME` varchar(64) default NULL,
  `COLUMN_TYPE` longtext NOT NULL,
  `COLUMN_KEY` varchar(3) NOT NULL default '',
  `EXTRA` varchar(20) NOT NULL default '',
  `PRIVILEGES` varchar(80) NOT NULL default '',
  `COLUMN_COMMENT` varchar(255) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `COLUMNS`
--

INSERT INTO `COLUMNS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `COLUMN_NAME`, `ORDINAL_POSITION`, `COLUMN_DEFAULT`, `IS_NULLABLE`, `DATA_TYPE`, `CHARACTER_MAXIMUM_LENGTH`, `CHARACTER_OCTET_LENGTH`, `NUMERIC_PRECISION`, `NUMERIC_SCALE`, `CHARACTER_SET_NAME`, `COLLATION_NAME`, `COLUMN_TYPE`, `COLUMN_KEY`, `EXTRA`, `PRIVILEGES`, `COLUMN_COMMENT`) VALUES
(NULL, 'information_schema', 'CHARACTER_SETS', 'CHARACTER_SET_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'CHARACTER_SETS', 'DEFAULT_COLLATE_NAME', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'CHARACTER_SETS', 'DESCRIPTION', 3, '', 'NO', 'varchar', 60, 180, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(60)', '', '', 'select', ''),
(NULL, 'information_schema', 'CHARACTER_SETS', 'MAXLEN', 4, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'COLLATION_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'CHARACTER_SET_NAME', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'ID', 3, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(11)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'IS_DEFAULT', 4, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'IS_COMPILED', 5, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATIONS', 'SORTLEN', 6, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATION_CHARACTER_SET_APPLICABILITY', 'COLLATION_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLLATION_CHARACTER_SET_APPLICABILITY', 'CHARACTER_SET_NAME', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'ORDINAL_POSITION', 5, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_DEFAULT', 6, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'IS_NULLABLE', 7, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'DATA_TYPE', 8, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'CHARACTER_MAXIMUM_LENGTH', 9, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'CHARACTER_OCTET_LENGTH', 10, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'NUMERIC_PRECISION', 11, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'NUMERIC_SCALE', 12, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'CHARACTER_SET_NAME', 13, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLLATION_NAME', 14, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_TYPE', 15, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_KEY', 16, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'EXTRA', 17, '', 'NO', 'varchar', 20, 60, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'PRIVILEGES', 18, '', 'NO', 'varchar', 80, 240, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(80)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMNS', 'COLUMN_COMMENT', 19, '', 'NO', 'varchar', 255, 765, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(255)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'GRANTEE', 1, '', 'NO', 'varchar', 81, 243, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(81)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'TABLE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'TABLE_SCHEMA', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'TABLE_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'COLUMN_NAME', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'PRIVILEGE_TYPE', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'IS_GRANTABLE', 7, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'CONSTRAINT_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'CONSTRAINT_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'CONSTRAINT_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'TABLE_CATALOG', 4, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'TABLE_SCHEMA', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'TABLE_NAME', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'COLUMN_NAME', 7, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'ORDINAL_POSITION', 8, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'POSITION_IN_UNIQUE_CONSTRAINT', 9, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'REFERENCED_TABLE_SCHEMA', 10, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'REFERENCED_TABLE_NAME', 11, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'REFERENCED_COLUMN_NAME', 12, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'QUERY_ID', 1, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SEQ', 2, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'STATE', 3, '', 'NO', 'varchar', 30, 90, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(30)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'DURATION', 4, '0.000000', 'NO', 'decimal', NULL, NULL, 9, 6, NULL, NULL, 'decimal(9,6)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'CPU_USER', 5, NULL, 'YES', 'decimal', NULL, NULL, 9, 6, NULL, NULL, 'decimal(9,6)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'CPU_SYSTEM', 6, NULL, 'YES', 'decimal', NULL, NULL, 9, 6, NULL, NULL, 'decimal(9,6)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'CONTEXT_VOLUNTARY', 7, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'CONTEXT_INVOLUNTARY', 8, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'BLOCK_OPS_IN', 9, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'BLOCK_OPS_OUT', 10, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'MESSAGES_SENT', 11, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'MESSAGES_RECEIVED', 12, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'PAGE_FAULTS_MAJOR', 13, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'PAGE_FAULTS_MINOR', 14, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SWAPS', 15, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SOURCE_FUNCTION', 16, NULL, 'YES', 'varchar', 30, 90, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(30)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SOURCE_FILE', 17, NULL, 'YES', 'varchar', 20, 60, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'PROFILING', 'SOURCE_LINE', 18, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(20)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SPECIFIC_NAME', 1, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_SCHEMA', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_TYPE', 5, '', 'NO', 'varchar', 9, 27, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(9)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'DTD_IDENTIFIER', 6, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_BODY', 7, '', 'NO', 'varchar', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_DEFINITION', 8, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'EXTERNAL_NAME', 9, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'EXTERNAL_LANGUAGE', 10, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'PARAMETER_STYLE', 11, '', 'NO', 'varchar', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'IS_DETERMINISTIC', 12, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SQL_DATA_ACCESS', 13, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SQL_PATH', 14, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SECURITY_TYPE', 15, '', 'NO', 'varchar', 7, 21, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(7)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'CREATED', 16, '0000-00-00 00:00:00', 'NO', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'LAST_ALTERED', 17, '0000-00-00 00:00:00', 'NO', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'SQL_MODE', 18, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'ROUTINE_COMMENT', 19, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'ROUTINES', 'DEFINER', 20, '', 'NO', 'varchar', 77, 231, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(77)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'CATALOG_NAME', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'SCHEMA_NAME', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'DEFAULT_CHARACTER_SET_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'DEFAULT_COLLATION_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMATA', 'SQL_PATH', 5, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'GRANTEE', 1, '', 'NO', 'varchar', 81, 243, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(81)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'TABLE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'TABLE_SCHEMA', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'PRIVILEGE_TYPE', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'IS_GRANTABLE', 5, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'NON_UNIQUE', 4, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(1)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'INDEX_SCHEMA', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'INDEX_NAME', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'SEQ_IN_INDEX', 7, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(2)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'COLUMN_NAME', 8, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'COLLATION', 9, NULL, 'YES', 'varchar', 1, 3, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(1)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'CARDINALITY', 10, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'SUB_PART', 11, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'PACKED', 12, NULL, 'YES', 'varchar', 10, 30, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'NULLABLE', 13, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'INDEX_TYPE', 14, '', 'NO', 'varchar', 16, 48, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(16)', '', '', 'select', ''),
(NULL, 'information_schema', 'STATISTICS', 'COMMENT', 15, NULL, 'YES', 'varchar', 16, 48, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(16)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_TYPE', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'ENGINE', 5, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'VERSION', 6, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'ROW_FORMAT', 7, NULL, 'YES', 'varchar', 10, 30, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(10)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_ROWS', 8, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'AVG_ROW_LENGTH', 9, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'DATA_LENGTH', 10, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'MAX_DATA_LENGTH', 11, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'INDEX_LENGTH', 12, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'DATA_FREE', 13, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'AUTO_INCREMENT', 14, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'CREATE_TIME', 15, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'UPDATE_TIME', 16, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'CHECK_TIME', 17, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_COLLATION', 18, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'CHECKSUM', 19, NULL, 'YES', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(21)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'CREATE_OPTIONS', 20, NULL, 'YES', 'varchar', 255, 765, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(255)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLES', 'TABLE_COMMENT', 21, '', 'NO', 'varchar', 80, 240, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(80)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'CONSTRAINT_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'CONSTRAINT_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'CONSTRAINT_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'TABLE_SCHEMA', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'TABLE_NAME', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'CONSTRAINT_TYPE', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'GRANTEE', 1, '', 'NO', 'varchar', 81, 243, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(81)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'TABLE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'TABLE_SCHEMA', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'TABLE_NAME', 4, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'PRIVILEGE_TYPE', 5, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'IS_GRANTABLE', 6, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'TRIGGER_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'TRIGGER_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'TRIGGER_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'EVENT_MANIPULATION', 4, '', 'NO', 'varchar', 6, 18, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(6)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'EVENT_OBJECT_CATALOG', 5, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'EVENT_OBJECT_SCHEMA', 6, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'EVENT_OBJECT_TABLE', 7, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_ORDER', 8, '0', 'NO', 'bigint', NULL, NULL, 19, 0, NULL, NULL, 'bigint(4)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_CONDITION', 9, NULL, 'YES', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_STATEMENT', 10, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_ORIENTATION', 11, '', 'NO', 'varchar', 9, 27, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(9)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_TIMING', 12, '', 'NO', 'varchar', 6, 18, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(6)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_REFERENCE_OLD_TABLE', 13, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_REFERENCE_NEW_TABLE', 14, NULL, 'YES', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_REFERENCE_OLD_ROW', 15, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'ACTION_REFERENCE_NEW_ROW', 16, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'CREATED', 17, NULL, 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'SQL_MODE', 18, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'TRIGGERS', 'DEFINER', 19, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'GRANTEE', 1, '', 'NO', 'varchar', 81, 243, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(81)', '', '', 'select', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'TABLE_CATALOG', 2, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'PRIVILEGE_TYPE', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'IS_GRANTABLE', 4, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'TABLE_CATALOG', 1, NULL, 'YES', 'varchar', 512, 1536, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(512)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'TABLE_SCHEMA', 2, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'TABLE_NAME', 3, '', 'NO', 'varchar', 64, 192, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(64)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'VIEW_DEFINITION', 4, NULL, 'NO', 'longtext', 4294967295, 4294967295, NULL, NULL, 'utf8', 'utf8_general_ci', 'longtext', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'CHECK_OPTION', 5, '', 'NO', 'varchar', 8, 24, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(8)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'IS_UPDATABLE', 6, '', 'NO', 'varchar', 3, 9, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(3)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'DEFINER', 7, '', 'NO', 'varchar', 77, 231, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(77)', '', '', 'select', ''),
(NULL, 'information_schema', 'VIEWS', 'SECURITY_TYPE', 8, '', 'NO', 'varchar', 7, 21, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(7)', '', '', 'select', ''),
(NULL, 'erthejhg', 'gamelog', 'gamelog_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'created_on', 2, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'game_end', 3, '0000-00-00 00:00:00', 'YES', 'datetime', NULL, NULL, NULL, NULL, NULL, NULL, 'datetime', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'game_status', 4, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'win_team', 5, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'lose_team', 6, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'team1_rate', 7, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'team2_rate', 8, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_team', 9, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_team', 10, '2', 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_team', 11, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_team', 12, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_team', 13, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_team', 14, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_team', 15, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_team', 16, NULL, 'YES', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_id', 17, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_id', 18, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_id', 19, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_id', 20, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_id', 21, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_id', 22, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_id', 23, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_id', 24, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_name', 25, NULL, 'NO', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_name', 26, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_name', 27, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_name', 28, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_name', 29, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_name', 30, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_name', 31, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_name', 32, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_rate', 33, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_rate', 34, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_rate', 35, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_rate', 36, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_rate', 37, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_rate', 38, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_rate', 39, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_rate', 40, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_win', 41, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_lose', 42, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_streak', 43, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_win_streak', 44, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_lose_streak', 45, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_win', 46, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_lose', 47, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_streak', 48, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_win_streak', 49, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_lose_streak', 50, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_win', 51, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_lose', 52, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_streak', 53, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_win_streak', 54, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_lose_streak', 55, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_win', 56, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_lose', 57, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_streak', 58, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_win_streak', 59, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_lose_streak', 60, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_win', 61, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_lose', 62, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_streak', 63, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_win_streak', 64, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_lose_streak', 65, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_win', 66, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_lose', 67, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_streak', 68, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_win_streak', 69, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_lose_streak', 70, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_win', 71, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_lose', 72, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_streak', 73, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_win_streak', 74, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_lose_streak', 75, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_lose', 76, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_win', 77, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_streak', 78, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_win_streak', 79, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_lose_streak', 80, NULL, 'YES', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player1_maxrate', 81, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player2_maxrate', 82, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player3_maxrate', 83, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player4_maxrate', 84, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player5_maxrate', 85, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player6_maxrate', 86, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player7_maxrate', 87, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'gamelog', 'player8_maxrate', 88, NULL, 'YES', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'player', 'player_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'player', 'rate_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'player', 'player_name', 3, NULL, 'NO', 'varchar', 45, 45, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'player', 'memo', 4, NULL, 'YES', 'text', 65535, 65535, NULL, NULL, 'utf8', 'utf8_general_ci', 'text', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'player', 'delete_flag', 5, '0', 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'player', 'last_editor', 6, NULL, 'NO', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'player', 'created_on', 7, '0000-00-00 00:00:00', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'player', 'updated_on', 8, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'rate_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'rate', 2, '1600', 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'previous_rate', 3, '1600', 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'win', 4, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'lose', 5, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'streak', 6, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'win_streak', 7, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'lose_streak', 8, '0', 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'max_rate', 9, '1600', 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'last_editor', 10, NULL, 'YES', 'varchar', 45, 45, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'edit_date', 11, '0000-00-00 00:00:00', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'created_on', 12, '0000-00-00 00:00:00', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate', 'updated_on', 13, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate_editlog', 'rate_editlog_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate_editlog', 'edited_player_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate_editlog', 'previous_name', 3, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate_editlog', 'previous_rate', 4, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate_editlog', 'new_rate', 5, NULL, 'NO', 'smallint', NULL, NULL, 5, 0, NULL, NULL, 'smallint(6)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate_editlog', 'user_id', 6, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate_editlog', 'status', 7, '0', 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'rate_editlog', 'edited_on', 8, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'updatelog', 'update_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'updatelog', 'update_date', 2, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'updatelog', 'update_note', 3, NULL, 'YES', 'text', 65535, 65535, NULL, NULL, 'utf8', 'utf8_general_ci', 'text', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'updatelog', 'delete_flag', 4, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(4)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user', 'user_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', '');
INSERT INTO `COLUMNS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `COLUMN_NAME`, `ORDINAL_POSITION`, `COLUMN_DEFAULT`, `IS_NULLABLE`, `DATA_TYPE`, `CHARACTER_MAXIMUM_LENGTH`, `CHARACTER_OCTET_LENGTH`, `NUMERIC_PRECISION`, `NUMERIC_SCALE`, `CHARACTER_SET_NAME`, `COLLATION_NAME`, `COLUMN_TYPE`, `COLUMN_KEY`, `EXTRA`, `PRIVILEGES`, `COLUMN_COMMENT`) VALUES
(NULL, 'erthejhg', 'user', 'user_name', 2, NULL, 'NO', 'varchar', 45, 45, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user', 'user_password', 3, NULL, 'NO', 'char', 32, 32, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'char(32)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user', 'user_control', 4, NULL, 'NO', 'varchar', 45, 45, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user', 'last_editor', 5, NULL, 'NO', 'varchar', 45, 45, NULL, NULL, 'latin1', 'latin1_swedish_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user', 'delete_flag', 6, NULL, 'NO', 'tinyint', NULL, NULL, 3, 0, NULL, NULL, 'tinyint(1)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user', 'created_on', 7, '0000-00-00 00:00:00', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user', 'updated_on', 8, 'CURRENT_TIMESTAMP', 'NO', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user_editlog', 'user_edited_id', 1, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', 'PRI', 'auto_increment', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user_editlog', 'edited_user_id', 2, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user_editlog', 'previous_name', 3, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user_editlog', 'new_name', 4, NULL, 'NO', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user_editlog', 'previous_control', 5, NULL, 'YES', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user_editlog', 'new_control', 6, NULL, 'NO', 'varchar', 45, 135, NULL, NULL, 'utf8', 'utf8_general_ci', 'varchar(45)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user_editlog', 'user_id', 7, NULL, 'NO', 'int', NULL, NULL, 10, 0, NULL, NULL, 'int(11)', '', '', 'select,insert,update,references', ''),
(NULL, 'erthejhg', 'user_editlog', 'created_on', 8, 'CURRENT_TIMESTAMP', 'YES', 'timestamp', NULL, NULL, NULL, NULL, NULL, NULL, 'timestamp', '', '', 'select,insert,update,references', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `COLUMN_PRIVILEGES`
--

CREATE TEMPORARY TABLE `COLUMN_PRIVILEGES` (
  `GRANTEE` varchar(81) NOT NULL default '',
  `TABLE_CATALOG` varchar(512) default NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `TABLE_NAME` varchar(64) NOT NULL default '',
  `COLUMN_NAME` varchar(64) NOT NULL default '',
  `PRIVILEGE_TYPE` varchar(64) NOT NULL default '',
  `IS_GRANTABLE` varchar(3) NOT NULL default ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `KEY_COLUMN_USAGE`
--

CREATE TEMPORARY TABLE `KEY_COLUMN_USAGE` (
  `CONSTRAINT_CATALOG` varchar(512) default NULL,
  `CONSTRAINT_SCHEMA` varchar(64) NOT NULL default '',
  `CONSTRAINT_NAME` varchar(64) NOT NULL default '',
  `TABLE_CATALOG` varchar(512) default NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `TABLE_NAME` varchar(64) NOT NULL default '',
  `COLUMN_NAME` varchar(64) NOT NULL default '',
  `ORDINAL_POSITION` bigint(10) NOT NULL default '0',
  `POSITION_IN_UNIQUE_CONSTRAINT` bigint(10) default NULL,
  `REFERENCED_TABLE_SCHEMA` varchar(64) default NULL,
  `REFERENCED_TABLE_NAME` varchar(64) default NULL,
  `REFERENCED_COLUMN_NAME` varchar(64) default NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `KEY_COLUMN_USAGE`
--

INSERT INTO `KEY_COLUMN_USAGE` (`CONSTRAINT_CATALOG`, `CONSTRAINT_SCHEMA`, `CONSTRAINT_NAME`, `TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `COLUMN_NAME`, `ORDINAL_POSITION`, `POSITION_IN_UNIQUE_CONSTRAINT`, `REFERENCED_TABLE_SCHEMA`, `REFERENCED_TABLE_NAME`, `REFERENCED_COLUMN_NAME`) VALUES
(NULL, 'erthejhg', 'PRIMARY', NULL, 'erthejhg', 'gamelog', 'gamelog_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'erthejhg', 'PRIMARY', NULL, 'erthejhg', 'player', 'player_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'erthejhg', 'PRIMARY', NULL, 'erthejhg', 'rate', 'rate_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'erthejhg', 'PRIMARY', NULL, 'erthejhg', 'rate_editlog', 'rate_editlog_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'erthejhg', 'PRIMARY', NULL, 'erthejhg', 'updatelog', 'update_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'erthejhg', 'PRIMARY', NULL, 'erthejhg', 'user', 'user_id', 1, NULL, NULL, NULL, NULL),
(NULL, 'erthejhg', 'PRIMARY', NULL, 'erthejhg', 'user_editlog', 'user_edited_id', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `PROFILING`
--

CREATE TEMPORARY TABLE `PROFILING` (
  `QUERY_ID` bigint(20) NOT NULL default '0',
  `SEQ` bigint(20) NOT NULL default '0',
  `STATE` varchar(30) NOT NULL default '',
  `DURATION` decimal(9,6) NOT NULL default '0.000000',
  `CPU_USER` decimal(9,6) default NULL,
  `CPU_SYSTEM` decimal(9,6) default NULL,
  `CONTEXT_VOLUNTARY` bigint(20) default NULL,
  `CONTEXT_INVOLUNTARY` bigint(20) default NULL,
  `BLOCK_OPS_IN` bigint(20) default NULL,
  `BLOCK_OPS_OUT` bigint(20) default NULL,
  `MESSAGES_SENT` bigint(20) default NULL,
  `MESSAGES_RECEIVED` bigint(20) default NULL,
  `PAGE_FAULTS_MAJOR` bigint(20) default NULL,
  `PAGE_FAULTS_MINOR` bigint(20) default NULL,
  `SWAPS` bigint(20) default NULL,
  `SOURCE_FUNCTION` varchar(30) default NULL,
  `SOURCE_FILE` varchar(20) default NULL,
  `SOURCE_LINE` bigint(20) default NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;
-- データ読み込みエラー: (#1289 - The 'SHOW PROFILE' feature is disabled; you need MySQL built with 'enable-profiling' to have it working)

-- --------------------------------------------------------

--
-- テーブルの構造 `ROUTINES`
--

CREATE TEMPORARY TABLE `ROUTINES` (
  `SPECIFIC_NAME` varchar(64) NOT NULL default '',
  `ROUTINE_CATALOG` varchar(512) default NULL,
  `ROUTINE_SCHEMA` varchar(64) NOT NULL default '',
  `ROUTINE_NAME` varchar(64) NOT NULL default '',
  `ROUTINE_TYPE` varchar(9) NOT NULL default '',
  `DTD_IDENTIFIER` varchar(64) default NULL,
  `ROUTINE_BODY` varchar(8) NOT NULL default '',
  `ROUTINE_DEFINITION` longtext,
  `EXTERNAL_NAME` varchar(64) default NULL,
  `EXTERNAL_LANGUAGE` varchar(64) default NULL,
  `PARAMETER_STYLE` varchar(8) NOT NULL default '',
  `IS_DETERMINISTIC` varchar(3) NOT NULL default '',
  `SQL_DATA_ACCESS` varchar(64) NOT NULL default '',
  `SQL_PATH` varchar(64) default NULL,
  `SECURITY_TYPE` varchar(7) NOT NULL default '',
  `CREATED` datetime NOT NULL default '0000-00-00 00:00:00',
  `LAST_ALTERED` datetime NOT NULL default '0000-00-00 00:00:00',
  `SQL_MODE` longtext NOT NULL,
  `ROUTINE_COMMENT` varchar(64) NOT NULL default '',
  `DEFINER` varchar(77) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `SCHEMATA`
--

CREATE TEMPORARY TABLE `SCHEMATA` (
  `CATALOG_NAME` varchar(512) default NULL,
  `SCHEMA_NAME` varchar(64) NOT NULL default '',
  `DEFAULT_CHARACTER_SET_NAME` varchar(64) NOT NULL default '',
  `DEFAULT_COLLATION_NAME` varchar(64) NOT NULL default '',
  `SQL_PATH` varchar(512) default NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `SCHEMATA`
--

INSERT INTO `SCHEMATA` (`CATALOG_NAME`, `SCHEMA_NAME`, `DEFAULT_CHARACTER_SET_NAME`, `DEFAULT_COLLATION_NAME`, `SQL_PATH`) VALUES
(NULL, 'information_schema', 'utf8', 'utf8_general_ci', NULL),
(NULL, 'erthejhg', 'utf8', 'utf8_general_ci', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `SCHEMA_PRIVILEGES`
--

CREATE TEMPORARY TABLE `SCHEMA_PRIVILEGES` (
  `GRANTEE` varchar(81) NOT NULL default '',
  `TABLE_CATALOG` varchar(512) default NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `PRIVILEGE_TYPE` varchar(64) NOT NULL default '',
  `IS_GRANTABLE` varchar(3) NOT NULL default ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `SCHEMA_PRIVILEGES`
--

INSERT INTO `SCHEMA_PRIVILEGES` (`GRANTEE`, `TABLE_CATALOG`, `TABLE_SCHEMA`, `PRIVILEGE_TYPE`, `IS_GRANTABLE`) VALUES
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'SELECT', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'INSERT', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'UPDATE', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'DELETE', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'CREATE', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'DROP', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'REFERENCES', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'INDEX', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'ALTER', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'CREATE TEMPORARY TABLES', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'LOCK TABLES', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'EXECUTE', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'CREATE VIEW', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'SHOW VIEW', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'CREATE ROUTINE', 'NO'),
('''erthejhg''@''localhost''', NULL, 'erthejhg', 'ALTER ROUTINE', 'NO');

-- --------------------------------------------------------

--
-- テーブルの構造 `STATISTICS`
--

CREATE TEMPORARY TABLE `STATISTICS` (
  `TABLE_CATALOG` varchar(512) default NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `TABLE_NAME` varchar(64) NOT NULL default '',
  `NON_UNIQUE` bigint(1) NOT NULL default '0',
  `INDEX_SCHEMA` varchar(64) NOT NULL default '',
  `INDEX_NAME` varchar(64) NOT NULL default '',
  `SEQ_IN_INDEX` bigint(2) NOT NULL default '0',
  `COLUMN_NAME` varchar(64) NOT NULL default '',
  `COLLATION` varchar(1) default NULL,
  `CARDINALITY` bigint(21) default NULL,
  `SUB_PART` bigint(3) default NULL,
  `PACKED` varchar(10) default NULL,
  `NULLABLE` varchar(3) NOT NULL default '',
  `INDEX_TYPE` varchar(16) NOT NULL default '',
  `COMMENT` varchar(16) default NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `STATISTICS`
--

INSERT INTO `STATISTICS` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `NON_UNIQUE`, `INDEX_SCHEMA`, `INDEX_NAME`, `SEQ_IN_INDEX`, `COLUMN_NAME`, `COLLATION`, `CARDINALITY`, `SUB_PART`, `PACKED`, `NULLABLE`, `INDEX_TYPE`, `COMMENT`) VALUES
(NULL, 'erthejhg', 'gamelog', 0, 'erthejhg', 'PRIMARY', 1, 'gamelog_id', 'A', 74, NULL, NULL, '', 'BTREE', ''),
(NULL, 'erthejhg', 'player', 0, 'erthejhg', 'PRIMARY', 1, 'player_id', 'A', 171, NULL, NULL, '', 'BTREE', ''),
(NULL, 'erthejhg', 'rate', 0, 'erthejhg', 'PRIMARY', 1, 'rate_id', 'A', 171, NULL, NULL, '', 'BTREE', ''),
(NULL, 'erthejhg', 'rate_editlog', 0, 'erthejhg', 'PRIMARY', 1, 'rate_editlog_id', 'A', 86, NULL, NULL, '', 'BTREE', ''),
(NULL, 'erthejhg', 'updatelog', 0, 'erthejhg', 'PRIMARY', 1, 'update_id', 'A', 6, NULL, NULL, '', 'BTREE', ''),
(NULL, 'erthejhg', 'user', 0, 'erthejhg', 'PRIMARY', 1, 'user_id', 'A', 11, NULL, NULL, '', 'BTREE', ''),
(NULL, 'erthejhg', 'user_editlog', 0, 'erthejhg', 'PRIMARY', 1, 'user_edited_id', 'A', 1, NULL, NULL, '', 'BTREE', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `TABLES`
--

CREATE TEMPORARY TABLE `TABLES` (
  `TABLE_CATALOG` varchar(512) default NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `TABLE_NAME` varchar(64) NOT NULL default '',
  `TABLE_TYPE` varchar(64) NOT NULL default '',
  `ENGINE` varchar(64) default NULL,
  `VERSION` bigint(21) default NULL,
  `ROW_FORMAT` varchar(10) default NULL,
  `TABLE_ROWS` bigint(21) default NULL,
  `AVG_ROW_LENGTH` bigint(21) default NULL,
  `DATA_LENGTH` bigint(21) default NULL,
  `MAX_DATA_LENGTH` bigint(21) default NULL,
  `INDEX_LENGTH` bigint(21) default NULL,
  `DATA_FREE` bigint(21) default NULL,
  `AUTO_INCREMENT` bigint(21) default NULL,
  `CREATE_TIME` datetime default NULL,
  `UPDATE_TIME` datetime default NULL,
  `CHECK_TIME` datetime default NULL,
  `TABLE_COLLATION` varchar(64) default NULL,
  `CHECKSUM` bigint(21) default NULL,
  `CREATE_OPTIONS` varchar(255) default NULL,
  `TABLE_COMMENT` varchar(80) NOT NULL default ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `TABLES`
--

INSERT INTO `TABLES` (`TABLE_CATALOG`, `TABLE_SCHEMA`, `TABLE_NAME`, `TABLE_TYPE`, `ENGINE`, `VERSION`, `ROW_FORMAT`, `TABLE_ROWS`, `AVG_ROW_LENGTH`, `DATA_LENGTH`, `MAX_DATA_LENGTH`, `INDEX_LENGTH`, `DATA_FREE`, `AUTO_INCREMENT`, `CREATE_TIME`, `UPDATE_TIME`, `CHECK_TIME`, `TABLE_COLLATION`, `CHECKSUM`, `CREATE_OPTIONS`, `TABLE_COMMENT`) VALUES
(NULL, 'information_schema', 'CHARACTER_SETS', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 576, 0, 132378624, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=233016', ''),
(NULL, 'information_schema', 'COLLATIONS', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 423, 0, 133901073, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=317299', ''),
(NULL, 'information_schema', 'COLLATION_CHARACTER_SET_APPLICABILITY', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 387, 0, 132505704, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=346815', ''),
(NULL, 'information_schema', 'COLUMNS', 'SYSTEM VIEW', 'MyISAM', 0, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2014-01-10 08:03:20', '2014-01-10 08:03:20', NULL, 'utf8_general_ci', NULL, 'max_rows=34861', ''),
(NULL, 'information_schema', 'COLUMN_PRIVILEGES', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 2565, 0, 134059725, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=52326', ''),
(NULL, 'information_schema', 'KEY_COLUMN_USAGE', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 4637, 0, 134129862, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=28944', ''),
(NULL, 'information_schema', 'PROFILING', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 356, 0, 132726412, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=377016', ''),
(NULL, 'information_schema', 'ROUTINES', 'SYSTEM VIEW', 'MyISAM', 0, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2014-01-10 08:03:20', '2014-01-10 08:03:20', NULL, 'utf8_general_ci', NULL, 'max_rows=36691', ''),
(NULL, 'information_schema', 'SCHEMATA', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 3656, 0, 133922936, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=36711', ''),
(NULL, 'information_schema', 'SCHEMA_PRIVILEGES', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 2179, 0, 133910445, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=61596', ''),
(NULL, 'information_schema', 'STATISTICS', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 2679, 0, 134166999, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=50099', ''),
(NULL, 'information_schema', 'TABLES', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 3641, 0, 133959672, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=36862', ''),
(NULL, 'information_schema', 'TABLE_CONSTRAINTS', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 2504, 0, 133788720, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=53601', ''),
(NULL, 'information_schema', 'TABLE_PRIVILEGES', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 2372, 0, 133989536, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=56584', ''),
(NULL, 'information_schema', 'TRIGGERS', 'SYSTEM VIEW', 'MyISAM', 0, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2014-01-10 08:03:20', '2014-01-10 08:03:20', NULL, 'utf8_general_ci', NULL, 'max_rows=30608', ''),
(NULL, 'information_schema', 'USER_PRIVILEGES', 'SYSTEM VIEW', 'MEMORY', 0, 'Fixed', NULL, 1986, 0, 133812708, 0, 0, NULL, NULL, NULL, NULL, 'utf8_general_ci', NULL, 'max_rows=67581', ''),
(NULL, 'information_schema', 'VIEWS', 'SYSTEM VIEW', 'MyISAM', 0, 'Dynamic', NULL, 0, 0, 281474976710655, 1024, 0, NULL, '2014-01-10 08:03:20', '2014-01-10 08:03:20', NULL, 'utf8_general_ci', NULL, 'max_rows=60295', ''),
(NULL, 'erthejhg', 'gamelog', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 74, 184, 13652, 281474976710655, 2048, 0, 79, '2014-01-03 00:58:58', '2014-01-09 20:06:25', NULL, 'utf8_general_ci', NULL, '', ''),
(NULL, 'erthejhg', 'player', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 171, 41, 7096, 281474976710655, 4096, 0, 172, '2013-12-30 12:10:22', '2014-01-09 20:09:11', NULL, 'utf8_general_ci', NULL, '', ''),
(NULL, 'erthejhg', 'rate', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 171, 46, 7948, 281474976710655, 4096, 0, 174, '2014-01-03 03:55:28', '2014-01-09 20:21:17', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'erthejhg', 'rate_editlog', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 86, 30, 2636, 281474976710655, 2048, 0, 87, '2013-12-30 23:22:58', '2014-01-09 20:09:11', NULL, 'utf8_general_ci', NULL, '', ''),
(NULL, 'erthejhg', 'updatelog', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 6, 106, 640, 281474976710655, 2048, 0, 7, '2013-12-14 14:54:02', '2014-01-09 20:09:57', NULL, 'utf8_general_ci', NULL, '', ''),
(NULL, 'erthejhg', 'user', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 11, 74, 820, 281474976710655, 2048, 0, 13, '2013-12-14 14:54:02', '2014-01-05 02:30:24', NULL, 'latin1_swedish_ci', NULL, '', ''),
(NULL, 'erthejhg', 'user_editlog', 'BASE TABLE', 'MyISAM', 10, 'Dynamic', 1, 36, 36, 281474976710655, 2048, 0, 2, '2013-12-31 10:45:22', '2014-01-05 02:23:42', NULL, 'utf8_general_ci', NULL, '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `TABLE_CONSTRAINTS`
--

CREATE TEMPORARY TABLE `TABLE_CONSTRAINTS` (
  `CONSTRAINT_CATALOG` varchar(512) default NULL,
  `CONSTRAINT_SCHEMA` varchar(64) NOT NULL default '',
  `CONSTRAINT_NAME` varchar(64) NOT NULL default '',
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `TABLE_NAME` varchar(64) NOT NULL default '',
  `CONSTRAINT_TYPE` varchar(64) NOT NULL default ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `TABLE_CONSTRAINTS`
--

INSERT INTO `TABLE_CONSTRAINTS` (`CONSTRAINT_CATALOG`, `CONSTRAINT_SCHEMA`, `CONSTRAINT_NAME`, `TABLE_SCHEMA`, `TABLE_NAME`, `CONSTRAINT_TYPE`) VALUES
(NULL, 'erthejhg', 'PRIMARY', 'erthejhg', 'gamelog', 'PRIMARY KEY'),
(NULL, 'erthejhg', 'PRIMARY', 'erthejhg', 'player', 'PRIMARY KEY'),
(NULL, 'erthejhg', 'PRIMARY', 'erthejhg', 'rate', 'PRIMARY KEY'),
(NULL, 'erthejhg', 'PRIMARY', 'erthejhg', 'rate_editlog', 'PRIMARY KEY'),
(NULL, 'erthejhg', 'PRIMARY', 'erthejhg', 'updatelog', 'PRIMARY KEY'),
(NULL, 'erthejhg', 'PRIMARY', 'erthejhg', 'user', 'PRIMARY KEY'),
(NULL, 'erthejhg', 'PRIMARY', 'erthejhg', 'user_editlog', 'PRIMARY KEY');

-- --------------------------------------------------------

--
-- テーブルの構造 `TABLE_PRIVILEGES`
--

CREATE TEMPORARY TABLE `TABLE_PRIVILEGES` (
  `GRANTEE` varchar(81) NOT NULL default '',
  `TABLE_CATALOG` varchar(512) default NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `TABLE_NAME` varchar(64) NOT NULL default '',
  `PRIVILEGE_TYPE` varchar(64) NOT NULL default '',
  `IS_GRANTABLE` varchar(3) NOT NULL default ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `TRIGGERS`
--

CREATE TEMPORARY TABLE `TRIGGERS` (
  `TRIGGER_CATALOG` varchar(512) default NULL,
  `TRIGGER_SCHEMA` varchar(64) NOT NULL default '',
  `TRIGGER_NAME` varchar(64) NOT NULL default '',
  `EVENT_MANIPULATION` varchar(6) NOT NULL default '',
  `EVENT_OBJECT_CATALOG` varchar(512) default NULL,
  `EVENT_OBJECT_SCHEMA` varchar(64) NOT NULL default '',
  `EVENT_OBJECT_TABLE` varchar(64) NOT NULL default '',
  `ACTION_ORDER` bigint(4) NOT NULL default '0',
  `ACTION_CONDITION` longtext,
  `ACTION_STATEMENT` longtext NOT NULL,
  `ACTION_ORIENTATION` varchar(9) NOT NULL default '',
  `ACTION_TIMING` varchar(6) NOT NULL default '',
  `ACTION_REFERENCE_OLD_TABLE` varchar(64) default NULL,
  `ACTION_REFERENCE_NEW_TABLE` varchar(64) default NULL,
  `ACTION_REFERENCE_OLD_ROW` varchar(3) NOT NULL default '',
  `ACTION_REFERENCE_NEW_ROW` varchar(3) NOT NULL default '',
  `CREATED` datetime default NULL,
  `SQL_MODE` longtext NOT NULL,
  `DEFINER` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `USER_PRIVILEGES`
--

CREATE TEMPORARY TABLE `USER_PRIVILEGES` (
  `GRANTEE` varchar(81) NOT NULL default '',
  `TABLE_CATALOG` varchar(512) default NULL,
  `PRIVILEGE_TYPE` varchar(64) NOT NULL default '',
  `IS_GRANTABLE` varchar(3) NOT NULL default ''
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `USER_PRIVILEGES`
--

INSERT INTO `USER_PRIVILEGES` (`GRANTEE`, `TABLE_CATALOG`, `PRIVILEGE_TYPE`, `IS_GRANTABLE`) VALUES
('''erthejhg''@''localhost''', NULL, 'USAGE', 'NO');

-- --------------------------------------------------------

--
-- テーブルの構造 `VIEWS`
--

CREATE TEMPORARY TABLE `VIEWS` (
  `TABLE_CATALOG` varchar(512) default NULL,
  `TABLE_SCHEMA` varchar(64) NOT NULL default '',
  `TABLE_NAME` varchar(64) NOT NULL default '',
  `VIEW_DEFINITION` longtext NOT NULL,
  `CHECK_OPTION` varchar(8) NOT NULL default '',
  `IS_UPDATABLE` varchar(3) NOT NULL default '',
  `DEFINER` varchar(77) NOT NULL default '',
  `SECURITY_TYPE` varchar(7) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
