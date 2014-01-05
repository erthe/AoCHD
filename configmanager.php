<?php
require_once 'Zend/Config/Ini.php';
class ConfigManager {
	/*
	 * 設定ファイルの保存場所格納
	 */
	var $config_path = "config.ini";
	/*
	 * コンフィグ情報を取得します。
	 */
	function getParams($params) {
		$config = new Zend_Config_Ini ( $this->config_path, $params );
		return $config;
	}
}
?>
