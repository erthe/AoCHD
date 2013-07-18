<?php
require_once('tools/tools.php');
class AdminController extends Zend_Controller_Action{
    
    public function init(){

        
        // ページ設定
        require_once dirname(dirname(__FILE__)) . '/models/AdminModel.php';
        $this->model = new AdminModel();
        
        $root_dir = str_replace("application", "themes", dirname(dirname(__FILE__)));
        
        $template_dir = $root_dir . '/layout/';
        $this->view->header = $template_dir.'admin-header.tpl';
        
        $this->view->cssname = $root_dir . '/css/admin.css';
        $this->view->footer = $template_dir.'admin-footer.tpl';
        
        $this->view->jquery = $root_dir . '/js/Library/jquery-2.0.3.min.js';
        $this->view->jsfile = $root_dir . '/js/admin.js';
        
        // login check
        $this->adminActions[] = "list";
        
    }
    
    public function indexAction(){
        $auth = $this->logincheck('admin');
        
        // ログインしている
        echo "＿人人人人人人人人人＿<br/ >
        ＞　ログインしてる　＜<br/ >
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
                echo "<br/ >＿人人人人人人人人人＿<br/ >
                    ＞　突然のログイン　＜<br/ >
                    ￣Y^Y^Y^Y^Y^Y^Y^Y￣";
                
                $this->view->login = true;
                

            }else{
                // ログインしていない
                echo "login failed";
                
                $this->view->login = false;
            }
            
            
            
        }catch(Exception $e){
            $this->displayError($e);
        }
    }
    
    public function listAction(){
        $authStorage = Zend_Auth::getInstance()->getStorage();
        if ($authStorage->isEmpty()) {
            // 認証済み情報がない →ログインページへ
            return $this->_forward('login', 'admin');
        }

            $items = $this->model->getIndexInfo();
            $this->view->items = $items;
            
            $this->view->name = 'test';
            $this->view->title = 'インデックステスト';
            
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
