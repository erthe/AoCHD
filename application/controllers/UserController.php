<?php

class UserController extends Zend_Controller_Action{
    public function init(){
        
        require_once dirname(dirname(__FILE__)) . '/models/UserModel.php';
        $this->model = new UserModel();
        
        $root_dir = str_replace("application", "themes", dirname(dirname(__FILE__)));
        
        $template_dir = $root_dir . '/layout/';
        $this->view->header = $template_dir.'header.tpl';
        
        $this->view->cssname = $root_dir . '/css/admin.css';
        $this->view->footer = $template_dir.'footer.tpl';
    }
    
    public function indexAction(){
        
        var_dump(Zend_Registry::get('auth'));
        //$auth = Zend_Auth::getInstance();
        //if ($auth->hasIdentity()){
            // ログインしている
            //echo "<br/ >＿人人人人人人人人人＿<br/ >
                //＞　突然のログイン　＜<br/ >
                //￣Y^Y^Y^Y^Y^Y^Y^Y￣";
            //}else{
                //$this->_redirect("/user/login");
            //}
    }
    
    public function loginAction(){
        $this->view->title = 'ログイン';
    }
    
    public function authAction(){
        try {
            // get login infomartion
            $username = $this->getRequest()->getParam('username');
            $password = $this->getRequest()->getParam('password');
            
            $logininfo = $this->model->LoginAuthentication($username, $password);
            $auth = Zend_Auth::getInstance();
            if ($auth->hasIdentity()){
                // ログインしている
                echo "＿人人人人人人人人人＿<br/ >
＞　突然のログイン　＜<br/ >
￣Y^Y^Y^Y^Y^Y^Y^Y￣";
                Zend_Registry::set('auth', 'member');
                var_dump(Zend_Registry::get('auth'));
            }else{
                // ログインしていない
                echo "login failed";
            }
            
        }catch(Exception $e){
            $this->displayError($e);
        }
    }
    
    public function listAction(){
        if(Zend_Registry::get('auth')->isAllowed('admin', 'list', 'view')){
        //権限がある場合
         }else{
            //権限がない場合
        }
    }
    
    public function logoutAction(){
        Zend_Registry::set('auth', 'guest');
        
        $this->model->Logout();
    }
}
?>
