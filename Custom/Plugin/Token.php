<?php
class Custom_Plugin_Token extends Zend_Controller_Plugin_Abstract
{
 
    public function routeStartup(Zend_Controller_Request_Abstract $request)
    {
        // Get view
        $layout = Zend_Layout::getMvcInstance();
        $view = $layout->getView();
 
        // Give token handler to views
        $tokenHandler = new Custom_Auth_Token;
        $view->tokenHandler = $tokenHandler;
    }
}