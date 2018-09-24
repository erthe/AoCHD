<?php
ini_set( 'display_errors', 1 );
$params = $_POST;
define('ROOTURI', "http://aochd.jp/broadcast/live/");
define('DB_SETTINGS_CONF', dirname(__FILE__) . '/dbsettings.conf');
$model = new Model($params);

class Model {
    private $prepare;

    function __construct($params) {
        if ($params['type'] === 'register') {
            $is_insert = $this->search($params);
            if (empty($is_insert)) {
                $this->insert($params);
            } else {
                $this->update($params);
            }
        } elseif ($params['type'] === 'delete') {
            $this->delete($params);
        } else {
            $result = json_encode($this->search($params));
            echo $result;
        }
    }

    public function insert($params) {
        $db = new DbConnection();
        $sql = "INSERT INTO broadcasting VALUES ( :name, :title, :description, :account, :url)";
        $this->prepare = $this->write($params);
        return $result = $db->execution($sql, $this->prepare);
    }

    public function update($params) {
        $db = new DbConnection();
        $sql = "UPDATE broadcasting SET name = :name, title = :title, description = :description, url= :url WHERE account = :account";
        $this->prepare = $this->write($params);
        return $result = $db->execution($sql, $this->prepare);
    }

    public function delete($params) {
        $db = new DbConnection();
        $sql = "DELETE FROM broadcasting WHERE account = :account";
        $this->prepare = [['column' => 'account', 'field' => $params['account'], 'type' => 'str']];
        return $result = $db->execution($sql, $this->prepare);
    }

    private function search($params) {
        $db = new DbConnection();
        $sql = "SELECT name, title, description, account, url FROM broadcasting WHERE account = :account";
        $this->prepare = [['column' => 'account', 'field' => $params['account'], 'type' => 'str']];
        return $result = $db->execution($sql, $this->prepare);
    }

    private function write($params) {
        return [['column' => 'name', 'field' => $params['name'], 'type'=> 'str'], ['column' => 'title', 'field' => $params['title'], 'type' => 'str'], ['column' => 'description', 'field' => $params['description'], 'type' => 'str'], ['column' => 'account', 'field' => $params['account'], 'type' => 'str'], ['column' => 'url', 'field' => ROOTURI . $params['url'], 'type' => 'str']];
    }
}

class DbConnection {
    private $dsn;
    private $user;
    private $password;

    function __construct() {
		$db_settings = $this->db_settings(DB_SETTINGS_CONF);
		$host = $db_settings[0];
		$this->user = $db_settings[1];
		$this->password = $db_settings[2];
		$db_name = $db_settings[3];
		$this->dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";
	}

	function execution($sql, $params = null){
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
		try{
			$pdo = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_EMULATE_PREPARES => false));
		}catch (PDOException $e){
			print('Error:'.$e->getMessage());
            $pdo = null;
            echo 'b';
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
