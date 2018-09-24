<?php
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
	define ( 'APP_DIR', dirname ( dirname ( __FILE__ ) ) . '/aochd/');
	
	$config = new ConfigManager ();
	$database_data = $config->getParams ( 'database' );
	$path_data = $config->getParams ( 'path' );
	$smarty_data = $config->getParams ( 'smarty' );
	
	$smarty_dir = APP_DIR . $smarty_data->smarty->cache;
	$smarty_lib = APP_DIR . $smarty_data->smarty->lib;
	
	set_include_path ( $temp_path . PATH_SEPARATOR . $smarty_dir . PATH_SEPARATOR . get_include_path () );
	include "Zend/Loader.php";
	require_once 'Zend/Loader/Autoloader.php';

	$app_path = APP_DIR . $path_data->path->application;
	
	$autoloader = Zend_Loader_Autoloader::getInstance ();
	$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
			'basePath' => $app_path,
			'namespace' => '',
			'resourceTypes' => array(
					'Custom_Lib' => array(
							'path' => '../library/Custom/',
							'namespace' => 'Custom_'
					),
			),
	));
	
	require_once ($smarty_lib . 'Smarty.class.php');
	require_once ($smarty_lib . 'Zend_View_Smarty.php');
	
	// setup controller
	$application_controller = APP_DIR . $path_data->path->modules;
	$frontController = Zend_Controller_Front::getInstance ();
	$frontController->throwExceptions ( true );
	$frontController->addModuleDirectory ( $application_controller );
	
	// smarty setup
	$view = new Zend_View_Smarty ( APP_DIR . $smarty_data->smarty->views, array (
			'compile_dir' => $smarty_dir . 'templates_c',
			'config_dir' => $smarty_dir . 'configs',
			'cache_dir' => $smarty_dir . 'cache' 
	) );
	
	$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
	$viewRenderer->setView($view)
		->setViewBasePathSpec($view->getEngine()->template_dir)
		->setViewScriptPathSpec(':module/:controller/:action.:suffix')
		->setViewScriptPathNoControllerSpec(':action.:suffix')
		->setViewSuffix('tpl');
	Zend_Controller_Action_HelperBroker::addHelper ( $viewRenderer );
	
	// run!
	$frontController->dispatch ();
} catch ( Exception $e ) {
	require_once (dirname ( dirname ( __FILE__ ) ) . '/aochd/tools/tools.php');
	
	echo "<h1>Error !</h1>";
	Var_Dump ( $e );
	logWrite ( $e, 1 );
}