<?php
$dirname = dirname(dirname(__FILE__));
define('DB_SETTINGS_CONF', "$dirname/dbsettings.conf");
$dsn = null;
$user = null;
$password = null;

class DbConnection {

	function DbConnection(){
		global $dsn, $user, $password;
		$db_settings = $this->db_settings(DB_SETTINGS_CONF);
		$host = $db_settings[0];
		$user = $db_settings[1];
		$password = $db_settings[2];
		$db_name = $db_settings[3];
		$dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";
	}

	function execution($sql, $params){
		$pdo = $this->connection();
		if(is_null($pdo)) {
			return false;
		}
		$stmt = $pdo->prepare($sql);

		if(!is_null($params)){
			foreach($params as $param){
				foreach($param as $key => $value){
					if($key === 'column'){
						$column = $value;
					} elseif($key === 'field'){
						$field = $value;
					} elseif($key === 'type'){
						switch($value){
							case 'int':
								$type = PDO::PARAM_INT;
								break;
							case 'str':
								$type = PDO::PARAM_STR;
								break;
							default :
								$type = PDO::PARAM_NULL;
								break;
						}
					}
				}
				$stmt->bindValue(":".$column, $field, $type);
			}
		}
		try{
			$stmt->execute();
			$ret = $stmt->fetchAll();
		}catch (PDOException $e){
			print('Error:'.$e->getMessage());
			$ret = false;
		}

		$pdo = null;
		return $ret;
	}

	function connection(){
		global $dsn, $user, $password;
		try{
			$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
		}catch (PDOException $e){
			print('Error:'.$e->getMessage());
			$pdo = null;
		}

		return $pdo;
	}

	function db_settings($s){
		$setting_info = explode("\n", file_get_contents($s));
		$db_settings = array();
		for($i=0;$i<4;$i++){
			$db_settings[$i] = $setting_info[$i];
		}
		return $db_settings;
	}
}
