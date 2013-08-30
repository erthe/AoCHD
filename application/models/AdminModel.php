<?php
require_once('tools/tools.php');

class AdminModel{
    
    // admin権限でログインする
    public function LoginAuthentication($username, $password){
        // adminテーブルに接続する。
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $authAdapter =  new Zend_Auth_Adapter_DbTable($db);
        
        $authAdapter->setTableName('admin')
            ->setIdentityColumn('admin_name')
            ->setCredentialColumn('admin_password')
            ->setCredentialTreatment('MD5(?) AND delete_flag = 0');
        
        $authAdapter->setIdentity($username);
        $authAdapter->setCredential($password);
        
        // ログイン認証結果をコントローラーに返す。
        $result = $authAdapter->authenticate($authAdapter);
        if ($result->isValid()) {
            
            // 認証OK →認証済み情報をストレージ（セッション）に格納
            $storage = Zend_Auth::getInstance()->getStorage();
            $resultRow = $authAdapter->getResultRowObject(array('loginid', 'admin_name'));
            $storage->write($resultRow);
            
            // セッションID再生成
            $ret = session_regenerate_id(true);
            
            $response = true;

        } else {
            $this->Logout(NULL);
            $response = false;
        }
        
        return $response;
    }
    
    public function LoginComplete($loginid){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        
        $timestamp = array(
                           'login_status' => 1,
                           'last_logon' => NULL);
        $result = $db->update('admin', $timestamp, "admin_name = '$loginid'");
        
        return $result;
        
    }
    
    public function getInfo($module, $id){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from($module, '*')
               ->where($module.'_id = ?', $id);
        $row = $db->fetchRow($select);
        
        return $row;
    }

    public function getetcInfo($module, $param, $flag){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($module, '*')
    	->where($param.' = ?', $flag);
    	$row = $db->fetchRow($select);
    
    	return $row;
    }
    
    public function update($module, $data){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $id = $data[$module.'_id'];
        $result = $db->update($module, $data, $module."_id = $id");
        
        return $result;
    }
    
    public function insert($module, $data){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $result = $db->insert($module, $data);
        
        return $result;
    }
    
    public function Search($module, $where, $flag){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from($module, '*')
        ->where($where)
               ->where('delete_flag = ?', $flag);
        $row = $db->fetchAll($select);
        
        return $row;
    }
    
    public function getList($module, $flag){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from($module, '*')
        ->where('delete_flag = ?', $flag);
        $rows = $db->fetchAll($select);
        
        return $rows;
    }
    
    public function getAllList($module){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($module, '*');
    	$rows = $db->fetchAll($select);
    
    	return $rows;
    }
    
    public function getSearchSortList($module, $where, $flag, $sortkey){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($module, '*');
    	
    	if (!is_null($where)){
    		$select->where($where);
    	}
    	
    	$select->where('delete_flag = ?', $flag);
    	
    	// sort logic
    	if (!is_null($sortkey)){
	    	$select->order($sortkey[0]);
	    	
	    	if ($sortkey[1] != 'Null') {
	    		$select->order($sortkey[1]);
	    	}
	    	
	    	if ($sortkey[2] != 'Null') {
	    		$select->order($sortkey[2]);
	    	}
	    	
	    	if ($sortkey[3] != 'Null') {
	    		$select->order($sortkey[3]);
	    	}
	    	
	    	if ($sortkey[4] != 'Null') {
	    		$select->order($sortkey[4]);
	    	}
    	} else {
    		$select->order($module.'_id ASC');
    	}
    	
    	$rows = $db->fetchAll($select);
    
    	return $rows;
    }
    
    public function load($module, $loadData){
    	$adapter = dbadapter();
    	$params = dbconnect();
    	
    	$db = Zend_Db::factory($adapter, $params);
    	
    	$db->query("truncate $module");
    	$statement = $db->query($loadData);
    	    	
    	return $statement->rowCount();
    }
   	
    public function getJoinInfo($module, $join, $id){
    	$adapter = dbadapter();
    	$params = dbconnect();
    	
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($module . ' as module', '*')
    	->joinLeft($join.' as join', 'join.'.$join.'_id = module.'.$join.'_id')
    	->where('module.'.$join.'_id = ?', $id);
		
    	$row = $db->fetchRow($select);
    	
    	return $row;
    	
    }
    
    public function insertColumn($module, $search){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$id = $this->getMaxID($search) - 1;
    	
    	$prev_id = $search.'id_'.$id;
    	$id = $id + 1;
    	$next_id = $search.'id_'.$id;
    	$statement = $db->query("ALTER TABLE `$module` ADD COLUMN `$next_id` TINYINT(1) DEFAULT 0 NOT NULL AFTER `$prev_id`;");
    	
    	return $statement;
    	
    }
    
    public function insertColumns($module, $search, $fixed_head, $fixed_foot){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$id = $this->getMaxID($search);
    	 
    	$statement = $db->query("DROP TABLE IF EXISTS $module");
    	$sql = "CREATE TABLE $module($fixed_head";
    	for($i=1;$i<$id+1;$i++){
    		$sql = $sql."`classid_$i` tinyint(1) DEFAULT '0',";
    	}
    	$sql = $sql.$fixed_foot;
    	$sql = $sql.', PRIMARY KEY('.$module.'_id))';
    	
    	$statement2 = $db->query($sql);
    	return $statement2;
    	 
    }
    
    public function JoinList($module, $join_column, $join_array, $flag_name, $flag){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($module, '*');
    	
    	for($i=0;$i<count($join_array);$i++){
    		$select->joinLeft($join_array[$i], $join_array[$i].".".$join_array[$i].'_id = '.$module.'.'.$join_array[$i].'_id', 
    				$join_column[$i]);
    	}
    	$select->where($flag_name.' = ?', $flag);
    	
    	$rows = $db->fetchAll($select);
    	
    	return $rows;
    }
    
    public function JoinSearch($module, $join_column, $join_array, $flag_name, $flag, $where){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($module, '*');
    	
    	for($i=0;$i<count($join_array);$i++){
    		$select->joinLeft($join_array[$i], $join_array[$i].".".$join_array[$i].'_id = '.$module.'.'.$join_array[$i].'_id', 
    				$join_column[$i]);
    	}
    	$select->where($flag_name.' = ?', $flag)
    			->where($where);
    	$rows = $db->fetchAll($select);
    	
    	return $rows;
    }
    
    public function getMaxID($search){
    	$adapter = dbadapter();
    	$params = dbconnect();
    	
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select()
    	->from($search, 'MAX('.$search.'_id)');
    	
    	$result = $result = $db->fetchRow($select);
    	$id = $result['MAX('.$search.'_id)'];
    	
    	return $id;
    }
    
    public function Logout($logoutid){
        if(!is_null($logoutid)){
            
            $adapter = dbadapter();
            $params = dbconnect();
            
            $db = Zend_Db::factory($adapter, $params);
            
            $timestamp = array(
                               'login_status' => 0
                               );
            $result = $db->update('admin', $timestamp, "admin_name = '$logoutid'");
        }
        $auth = Zend_Auth::getInstance()->clearIdentity();
    }

    public function NameDuplicateCheck($table, $name, $value){
    	$adapter = dbadapter();
    	$params = dbconnect();
    	
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($table, '*')
    		   ->where($name.' = ' . "'" . $value . "'");
    	
    	$row = $db->fetchAll($select);

    	empty($row) == true ? $ret = true : $ret = false;
    	return $ret;
    }
}
?>
