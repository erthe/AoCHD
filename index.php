<?php
require_once 'config.php';
$temp_path = '.' . PATH_SEPARATOR . './library/';
set_include_path ( $temp_path );

require_once 'configmanager.php';

require_once 'Zend/Controller/Router/Route/Regex.php';
require_once 'Zend/Controller/Plugin/ErrorHandler.php';

try {
	error_reporting ( E_ALL | E_STRICT );
	ini_set ( 'display_errors', 1 );
	date_default_timezone_set ( 'Asia/Tokyo' );
	
	// read config file
	define ( 'APP_DIR', dirname ( dirname ( __FILE__ ) ) . '/AOCHD/' );
	
	$config = new ConfigManager ();
	$database_data = $config->getParams ( 'database' );
	$path_data = $config->getParams ( 'path' );
	$smarty_data = $config->getParams ( 'smarty' );
	
	$smarty_dir = APP_DIR . $smarty_data->smarty->cache;
	$smarty_lib = APP_DIR . $smarty_data->smarty->lib;
	
	set_include_path ( $temp_path . PATH_SEPARATOR . $smarty_dir . PATH_SEPARATOR . get_include_path () );
	include "Zend/Loader.php";
	require_once 'Zend/Loader/Autoloader.php';
	$autoloader = Zend_Loader_Autoloader::getInstance ();
	
	require_once ($smarty_lib . 'Smarty.class.php');
	require_once ($smarty_lib . 'Zend_View_Smarty.php');
	
	//  setup controller 
	$application_controller = APP_DIR . $path_data->path->modules;
	$frontController = Zend_Controller_Front::getInstance ();
	$frontController->throwExceptions ( true );
	$frontController->addModuleDirectory ( $application_controller );
	
	//  smarty setup
	$view = new Zend_View_Smarty ( APP_DIR . $smarty_data->smarty->views, array (
			'compile_dir' => $smarty_dir . 'templates_c',
			'config_dir' => $smarty_dir . 'configs',
			'cache_dir' => $smarty_dir . 'cache' 
	) );
	
	$app_path = APP_DIR . $path_data->path->application;
	$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer ( $view );
	//$viewRenderer->setViewBasePathSpec($app_path . 'modules/:module');
	$viewRenderer->setViewScriptPathSpec ($app_path . 'modules/:module/views/:controller/:action.:suffix');
	$viewRenderer->setViewScriptPathNoControllerSpec ( ':action.:suffix' );
	$viewRenderer->setViewSuffix ( 'tpl' );
	Zend_Controller_Action_HelperBroker::addHelper ( $viewRenderer );
	
	//  run!
	$frontController->dispatch ();
} catch ( Exception $e ) {
	
	require_once (dirname ( dirname ( __FILE__ ) ) . '/AOCHD/tools/tools.php');
	
	echo "<h1>Error !</h1>";
	Var_Dump ( $e );
	logWrite ( $e, 1 );
}