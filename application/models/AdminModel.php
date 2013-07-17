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
            ->setCredentialTreatment('MD5(?)');             // 入力パスワードをハッシュ化する
        
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
            $this->Logout();
            $response = false;
        }
        
        return $response;
    }
    
    public function Logout(){
        $auth = Zend_Auth::getInstance()->clearIdentity();
    }
    
    public function getIndexInfo(){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from('user', '*');
        $rows = $db->fetchAll($select);
        
        return $rows;
    }
    
}
?>
