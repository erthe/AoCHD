<?php
require_once ('tools/tools.php');
class IndexModel {
	
	public function update($module, $data) {
		$adapter = dbadapter ();
		$params = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $params );
		
		$id = $data [$module . '_id'];
		$result = $db->update ( $module, $data, $module . "_id = $id" );
		
		return $result;
	}
	
	public function insert($module, $data) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$result = $db->insert ( $module, $data );
	
		return $result;
	}
	
	// テーブルの情報を取得する(複数行)
	public function getList($module, $flag, $status, $sort) {
		$adapter = dbadapter ();
		$params = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( $module, '*' );
		if(!is_null($status)){
			$select->where ( "$status = ?", $flag );
		}
		
		if(!is_null($sort)){
			$select->order ( $sort );
		}
		
		$rows = $db->fetchAll ( $select );
		
		return $rows;
	}
	
	// テーブルの情報を取得する(複数行)
	public function searchList($module, $where, $flag, $status, $sort) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( $module, '*' );
		if(!is_null($status)){
			$select->where ( "$status = ?", $flag );
		}
		
		if(!is_null($sort)){
			$select->order ( $sort );
		}
		
		$select->where($where);
		$rows = $db->fetchAll ( $select );
	
		return $rows;
	}
	
	public function getInfo($module, $id, $command) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		if (!is_null($command)) {
			$select->from (array($module => $module),array('*', $command));
		} else {
			$select->from ( $module, '*' );
		}
		$select->where ( $module . '_id = ?', $id );
		$row = $db->fetchRow ( $select );
	
		return $row;
	}
	
	public function JoinList($module, $join_table, $flag_name, $flag) {
		$adapter = dbadapter ();
		$params = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( $module, '*' );
		
		for($i = 0; $i < count ( $join_table ); $i ++) {
			$select->joinLeft ( $join_table[$i], $join_table[$i] . "." . $join_table[$i] . '_id = ' . $module . '.' . $join_table[$i] . '_id');
		}
		$select->where ( $flag_name . ' = ?', $flag );
		$rows = $db->fetchAll ( $select );
		
		return $rows;
	}
	
	public function JoinInfo($module, $join_table, $id, $flag_name, $flag) {
		$adapter = dbadapter ();
		$params = dbconnect ();
		
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( $module, '*' );
	
		for($i = 0; $i < count ( $join_table ); $i ++) {
			$select->joinLeft ( $join_table[$i], $join_table[$i] . "." . $join_table[$i] . '_id = ' . $module . '.' . $join_table[$i] . '_id');
		}
		$select->where ( $flag_name . ' = ?', $flag );
		$select->where ( $module . '_id = ?', $id);
		
		$rows = $db->fetchRow ( $select );
	
		return $rows;
	}
	
	public function JoinInfos($module, $join_table, $where, $flag_name, $flag, $sort) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( $module, '*' );
	
		for($i = 0; $i < count ( $join_table ); $i ++) {
			$select->joinLeft ( $join_table[$i], $join_table[$i] . "." . $join_table[$i] . '_id = ' . $module . '.' . $join_table[$i] . '_id');
		}
		$select->where ( $flag_name . ' = ?', $flag );
		$select->where ($where);
		
		if(!is_null($sort)){
			$select->order ( $sort );
		}
		
		$rows = $db->fetchAll ( $select );
	
		return $rows;
	}
	
	public function getSearchSortJoin($module, $join_table, $where, $flag, $flag_value, $sortkey, $command) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from (array($module => $module),array('*', $command));
		
		if (! is_null ( $where )) {
			$select->where ( $where );
		}
		
		for($i = 0; $i < count ( $join_table ); $i ++) {
			$select->joinLeft ( $join_table[$i], $join_table[$i] . "." . $join_table[$i] . '_id = ' . $module . '.' . $join_table[$i] . '_id');
		}
		
		$select->where ("$flag = ?", $flag_value );
		
		// sort logic
		if (! is_null ( $sortkey )) {
			$select->order ( $sortkey );

		} else {
			$select->order ( $module . '_id ASC' );
		}
		
		$rows = $db->fetchAll ( $select );
		return $rows;
	}
	
	public function getCustomJoin($module, $join_table, $join_coloumns, $module_columns, $where, $flag, $flag_value, $sortkey, $command) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from (array($module => $module),array('*', $command));
	
		if (! is_null ( $where )) {
			$select->where ( $where );
		}
	
		for($i = 0; $i < count ( $join_table ); $i ++) {
			$select->joinLeft ( $join_table[$i], $join_table[$i] . "." . $join_coloumns[$i] . '_id = ' . $module . '.' . $module_columns[$i] . '_id');
		}
		
		if (!is_null($flag)) {
			$select->where ("$flag = ?", $flag_value );
		}
	
		// sort logic
		if (! is_null ( $sortkey )) {
			$select->order ( $sortkey );
	
		} else {
			$select->order ( $module . '_id ASC' );
		}
		$rows = $db->fetchAll ( $select );
		return $rows;
	}
	
	public function load($module, $loadData) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );

		$db->getConnection()->exec ( "truncate $module" );
		$statement = $db->getConnection()->exec ( $loadData );
	
		return $statement;
	}
	
	public function getAllList($module) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( $module, '*' );
		$rows = $db->fetchAll ( $select );
	
		return $rows;
	}
	
	// admin権限でログインする
	public function LoginAuthentication($username, $password) {
		// adminテーブルに接続する。
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$authAdapter = new Zend_Auth_Adapter_DbTable ( $db );
	
		$authAdapter->setTableName ( 'user' )->setIdentityColumn ( 'user_name' )->setCredentialColumn ( 'user_password' )->setCredentialTreatment ( 'MD5(?) AND delete_flag = 0' );
	
		$authAdapter->setIdentity ( $username );
		$authAdapter->setCredential ( $password );
	
		// ログイン認証結果をコントローラーに返す。
		$result = $authAdapter->authenticate ( $authAdapter );
		if ($result->isValid ()) {
			
			// 認証OK →認証済み情報をストレージ（セッション）に格納
			$storage = Zend_Auth::getInstance ()->getStorage ();
			$resultRow = $authAdapter->getResultRowObject ( array (
					'user_id',
					'user_name',
					'user_control'
			) );
			$storage->write ( $resultRow );
				
			// セッションID再生成
			$ret = session_regenerate_id ( true );
				
			$response = true;
		} else {
			$this->Logout ( NULL );
			$response = false;
		}
	
		return $response;
	}
	
	public function Logout() {
		$auth = Zend_Auth::getInstance ()->clearIdentity ();
	}
	
	public function getMaxID($search) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ()->from ( $search, 'MAX(' . $search . '_id)' );
	
		$result = $result = $db->fetchRow ( $select );
		$id = $result ['MAX(' . $search . '_id)'];
	
		return $id;
	}
	
	public function NameDuplicateCheck($table, $name, $value) {
		$adapter = dbadapter ();
		$params = dbconnect ();
	
		$db = Zend_Db::factory ( $adapter, $params );
		$select = new Zend_Db_Select ( $db );
		$select = $db->select ();
		$select->from ( $table, '*' )->where ( $name . ' = ' . $value);
		$row = $db->fetchAll ( $select );
		empty ( $row ) == true ? $ret = true : $ret = false;
		return $ret;
	}
}
?>
