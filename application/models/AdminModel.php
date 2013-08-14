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
        
        // ログイン情報をDBに引き渡す。
        $authAdapter->setTableName('admin')
            ->setIdentityColumn('admin_name')
            ->setCredentialColumn('admin_password')
            ->setCredentialTreatment('MD5(?) AND delete_flag = 0');             // 入力パスワードをハッシュ化する
        
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
            
            // ログイン後のデフォルトアクションへ 
            $response = true;

        } else {
            // ログアウトする。
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
    
    public function getUserInfo($id){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from('user', '*')
               ->where('user_id = ?', $id);
        $row = $db->fetchRow($select);
        
        return $row;
    }

    public function getAdminInfo($id){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from('admin', '*')
    	->where('admin_id = ?', $id);
    	$row = $db->fetchRow($select);
    
    	return $row;
    }
    
    public function userupdate($data){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $id = $data['user_id'];
        $result = $db->update('user', $data, "user_id = $id");
        
        return $result;
    }

    public function adminupdate($data){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$id = $data['admin_id'];
    	$result = $db->update('admin', $data, "admin_id = $id");
    
    	return $result;
    }
    
    public function userinsert($data){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $result = $db->insert('user', $data);
        
        return $result;
    }

    public function admininsert($data){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$result = $db->insert('admin', $data);
    
    	return $result;
    }
    
    public function getUserSearch($where){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from('user', '*')
        ->where($where)
               ->where('delete_flag = 0');
        $row = $db->fetchAll($select);
        
        return $row;
    }
    
    public function getUserList(){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from('user', '*')
        ->where('delete_flag = 0');
        $rows = $db->fetchAll($select);
        
        return $rows;
    }

    public function getAdminSearch($where){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from('admin', '*')
    	->where($where)
    	->where('delete_flag = 0');
    	$row = $db->fetchAll($select);
    
    	return $row;
    }
    
    public function getAdminList(){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from('admin', '*')
    	->where('delete_flag = 0');
    	$rows = $db->fetchAll($select);
    
    	return $rows;
    }
    
    
    public function getDeletedUserList(){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from('user', '*')
        ->where('delete_flag = 1');
        $rows = $db->fetchAll($select);
        
        return $rows;
    }
    
    public function getDeletedAdminList(){
    	$adapter = dbadapter();
    	$params = dbconnect();
    
    	$db = Zend_Db::factory($adapter, $params);
    	$select = new Zend_Db_Select($db);
    	$select = $db->select();
    	$select->from('admin', '*')
    	->where('delete_flag = 1');
    	$rows = $db->fetchAll($select);
    
    	return $rows;
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
    
}
?>
