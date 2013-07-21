<?php
require_once('tools/tools.php');

class UserModel{
    
    // admin権限でログインする
    public function LoginAuthentication($username, $password){
        // adminテーブルに接続する。
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $authAdapter =  new Zend_Auth_Adapter_DbTable($db);
        
        // ログイン情報をDBに引き渡す。
        $authAdapter->setTableName('user')
            ->setIdentityColumn('user_name')
            ->setCredentialColumn('password')
            ->setCredentialTreatment('MD5(?) AND status = 1 AND delete_flag = 0');             // 入力パスワードをハッシュ化する
        
        $authAdapter->setIdentity($username);
        $authAdapter->setCredential($password);
        
        // ログイン認証結果をコントローラーに返す。
        $result = $authAdapter->authenticate($authAdapter);
        if ($result->isValid()) {
            
            // 認証OK →認証済み情報をストレージ（セッション）に格納
            $storage = Zend_Auth::getInstance()->getStorage();
            $resultRow = $authAdapter->getResultRowObject(array('userid', 'user_name'));
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
                           'last_logon' => NULL
                           );
        $result = $db->update('user', $timestamp, "user_name = '$loginid'");
        
        return $result;
    
    }
    
    public function Logout($logoutid){
        if(!is_null($logoutid)){
            
            $adapter = dbadapter();
            $params = dbconnect();
        
            $db = Zend_Db::factory($adapter, $params);
        
            $timestamp = array(
                           'login_status' => 0
                           );
            $result = $db->update('user', $timestamp, "user_name = '$logoutid'");
        }
        
        $auth = Zend_Auth::getInstance()->clearIdentity();
    }
    
}
?>
