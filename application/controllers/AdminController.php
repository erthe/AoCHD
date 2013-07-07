<?php
require_once('tools/tools.php');
class AdminController extends Zend_Controller_Action{
    
    public function init(){
        // ページ設定
        require_once dirname(dirname(__FILE__)) . '/models/AdminModel.php';
        $this->model = new AdminModel();
        
        $root_dir = str_replace("application", "themes", dirname(dirname(__FILE__)));
        
        $template_dir = $root_dir . '/layout/';
        $this->view->header = $template_dir.'header.tpl';
        
        $this->view->cssname = $root_dir . '/css/admin.css';
        $this->view->footer = $template_dir.'footer.tpl';
    }
    
    public function indexAction(){
        $auth = $this->logincheck('admin');
        // ログインしている
        echo "＿人人人人人人人人人＿<br/ >
            ＞　ログイン成功　＜<br/ >
            ￣Y^Y^Y^Y^Y^Y^Y^Y￣";
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

            }else{
                // ログインしていない
                echo "logout";
            }
            
        }catch(Exception $e){
            $this->displayError($e);
        }
    }
    
    public function listAction(){
        if(Zend_Registry::get('global_acl')->isAllowed('guest', self::RESOURCE, 'view')){
        //権限がある場合
         }else{
            //権限がない場合
        }
    }
    
    public function logoutAction(){
        $this->model->Logout();
    }
        
    protected function logincheck($mode) {
        $auth = Zend_Auth::getInstance();
        
        if (!$auth->hasIdentity()) {
            $this->_redirect("/$mode/login");
        }
        
        return true;
    }
}
?>
