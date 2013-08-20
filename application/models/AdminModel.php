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
   	
    public function getEquipInfo($module, $item, $id){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($module, '*')
    	->where($module.'.'.$item.'_id = ?', $id);
    	 
    	$row = $db->fetchRow($select);
    	
    	return $row;
    }
    
    public function getdummyInfo($module, $join, $id){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($module, '*')
    	->joinLeft($join, $join.'.'.$join.'_id = '.$module.'.'.$join.'_id')
    	->where($module.'.'.$join.'_id = ?', $id);
    	
    	$row = $db->fetchRow($select);
    	
    	return $row;
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

    public function NameDuplicateCheck($table, $name){
    	$adapter = dbadapter();
    	$params = dbconnect();
    	
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from($table, '*')
    		   ->where($table . '_name = ' . "'" . $name . "'");
    	
    	$row = $db->fetchAll($select);

    	empty($row) == true ? $ret = true : $ret = false;
    	return $ret;
    }
}
?>
