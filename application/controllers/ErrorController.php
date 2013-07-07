<?php
require_once 'Zend/Controller/Action.php';


class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
        $this->view->errortype =
            $this->_getParam('error_handler')->type;
    }
}
/*
class ErrorController extends ServiceAction{
	public function errorAction()
	{
		$layout = Zend_Layout::getMvcInstance();
		$layout->setLayout("error");
		//		Var_Dump($this->view);
		//		exit;
		$paths = Zend_Controller_Front::getInstance()->getModulePath();
		$this->view->setScriptPath($paths."/views");

		$errors = $this->_getParam('error_handler');

        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
                // 404 error -- controller or action not found
                $this->getResponse()->setRawHeader('HTTP/1.1 404 Not Found');
                $this->output->errorTitle = "Sorry, it looks like that page you're looking for has moved";
				//      $this->view->title = '404 Not Found';
				//                $this->view->message = '該当するページは見つかりませんでした。';
                break;

            default:
                // application error
                $exception = $errors->exception;

                $this->view->title = "Error";
                $this->view->message = $exception->getMessage();
				$this->view->place = $exception->getFile().":".$exception->getLine();
				$this->view->trace = $exception->getTraceAsString();
				logger($exception, "ERROR");
                break;
        }
 
        // Clear previous content
        $this->getResponse()->clearBody();

		$this->output->breadcrumbs = $this->getBreadcrumbs(array("Error" => "current"));
		$this->display();
	}
}
 * 
 */
?>