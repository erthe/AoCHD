<?php
require_once ('Zend/Log.php');
require_once ('Zend/Log/Writer/Stream.php');
require_once ('Zend/Acl/Role.php');
require_once 'configmanager.php';

/**
 * dbadapter
 * DBのアダプター情報を取得する。
 */
function AccessControl() {
	// 権限系の設定を行う
	$acl = new Zend_Acl ();
	
	// ロール作成（階級）
	$acl->addRole ( 'guest' ); // "guest"という階級を作成
	$acl->addRole ( 'member', 'guest' ); // 受け継ぐ（guestへの制限でできることを）
	$acl->addRole ( 'admin' ); // どの階級も受け継がない
	                        
	// リソース作成（制限エリア）
	$acl->addResource ( 'publicArea' ); // 誰でも閲覧できるエリア
	$acl->addResource ( 'memberArea' ); // memberのみが閲覧できるエリア
	$acl->addResource ( 'adminArea' ); // 管理人専用のエリア
	                                
	// エリアへのアクセス権限の設定
	$acl->allow ( 'guest', 'publicArea' ); // これでguestを受け継いだmemberもpublicAreaへのアクセスが許可
	$acl->allow ( 'member', 'memberArea' );
	$acl->allow ( 'admin' ); // 全エリアを許可
	                      
	// アクセス制御の確認（ＡＣＬへの問い合わせ）
	if ($acl->isAllowed ( 'guest', 'publicArea' ))
		echo "guest->publicArea: ok<br />\n";
	if ($acl->isAllowed ( 'guest', 'memberArea' ))
		echo "guest->memberArea: ok<br />\n";
	if ($acl->isAllowed ( 'guest', 'adminArea' ))
		echo "guest->adminArea: ok<br />\n";
	if ($acl->isAllowed ( 'member', 'publicArea' ))
		echo "member->publicArea: ok<br />\n";
	if ($acl->isAllowed ( 'member', 'memberArea' ))
		echo "member->memberArea: ok<br />\n";
	if ($acl->isAllowed ( 'member', 'adminArea' ))
		echo "member->adminArea: ok<br />\n";
	if ($acl->isAllowed ( 'admin', 'publicArea' ))
		echo "admin->publicArea: ok<br />\n";
	if ($acl->isAllowed ( 'admin', 'memberArea' ))
		echo "admin->memberArea: ok<br />\n";
	if ($acl->isAllowed ( 'admin', 'adminArea' ))
		echo "admin->adminArea: ok<br />\n";
}

/**
 * dbadapter
 * DBのアダプター情報を取得する。
 */
function dbadapter() {
	$config = new ConfigManager ();
	$database_connect = $config->getParams ( 'database' );
	$adapter = $database_connect->adapter;
	
	return $adapter;
}
/**
 * cbconnect
 * DBの接続情報を取得する。
 */
function dbconnect() {
	$config = new ConfigManager ();
	$database_connect = $config->getParams ( 'database' );
	$dbconnect = array (
			'dbname' => $database_connect->params->dbname,
			'host' => $database_connect->params->host,
			'username' => $database_connect->params->username,
			'password' => $database_connect->params->password,
			'charset' => $database_connect->params->charset 
	);
	
	return $dbconnect;
}
function CsvCreate($module, $recordset) {
	$date = date ( 'ymd' );
	header ( "Content-Type: application/octet-stream" );
	header ( "Content-Disposition: attachment; filename=" . $module . $date . ".csv" );
	
	// set title
	$i = 1;
	
	$arrays = array_values ( $recordset );
	$keys = array_keys ( $arrays [0] );
	
	foreach ( $keys as $key ) {
		print $key;
		if ($i <= count ( $recordset )) {
			print ',';
		}
		$i ++;
	}
	print ("\n") ;
	
	// set rows
	foreach ( $recordset as $rows ) {
		$field_number = count ( $rows );
		$current_number = 0;
		
		foreach ( $rows as $fields ) {
			
			print ($fields) ;
			
			if ($current_number < $field_number - 1) {
				print (",") ;
				$current_number = $current_number + 1;
			}
		}
		
		print ("\n") ;
	}
}

/**
 * log writer
 * 
 * @param String $message
 *        	エラーメッセージ
 * @param String $level
 *        	ログレベル
 * @see Zend/Log.php
 */
function logWrite($message, $level) {
	define ( 'LOG_PATH', dirname ( dirname ( __FILE__ ) ) . '/data/log' ); // ログ出力先
	define ( 'LOG_FILE_NAME', 'weblog.log' ); // ログファイル名
	                                       
	// '#DT#'を日付に差替える。日毎にログを分割（1ヶ月でローテート）する。
	$logFile = LOG_PATH . '/' . LOG_FILE_NAME . date ( 'Ymd' ) . '.log';
	
	$logger = new Zend_Log ( new Zend_Log_Writer_Stream ( $logFile ) );
	$logger->log ( $message, $level );
	
	// エラーでログ出力
	// logWrite("エラーです。", Zend_Log::ERR);
	
	// デバッグでログ出力
	// logWrite("デバッグ情報です。", Zend_Log::DEBUG);
	
	/*
	 * ログレベル EMERG = 0; // 緊急事態 (Emergency): システムが使用不可能です ALERT = 1; // 警報 (Alert): 至急対応が必要です CRIT = 2; // 危機 (Critical): 危機的な状況です ERR = 3; // エラー (Error): エラーが発生しました WARN = 4; // 警告 (Warning): 警告が発生しました NOTICE = 5; // 注意 (Notice): 通常動作ですが、注意すべき状況です INFO = 6; // 情報 (Informational): 情報メッセージ DEBUG = 7; // デバッグ (Debug): デバッグメッセージ
	 */
}
?>
