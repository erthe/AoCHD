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
        $auth = $this->logincheck('user');
        
        // ログインしている
        $this->view->title = 'インデックス';
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
                $result = "＿人人人人人人人人人＿<br/ >
＞　突然のログイン　＜<br/ >
￣Y^Y^Y^Y^Y^Y^Y^Y￣";
                $loginid = Zend_Auth::getInstance()->getIdentity();
                
                $this->model->LoginComplete(get_object_vars($loginid)['user_name']);
                $this->view->login = true;
                
            }else{
                // ログインしていない
                $result = "login failed";
                $this->view->login = false;
                
            }
            
            $this->view->title = 'ログイン認証';
            $this->view->result = $result;
            
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
        $login = Zend_Auth::getInstance()->getIdentity();
        if(is_null($login)){
            $loginid = NULL;
        } else {
            $loginid = get_object_vars($login)['user_name'];
        }
        
        $this->model->Logout($loginid);
        
    }
    
    protected function logincheck($mode) {
        $authStorage = Zend_Auth::getInstance()->getStorage();
        if ($authStorage->isEmpty()) {
            // 認証済み情報がない →ログインページへ
            return $this->_forward('login', $mode);
        }
        
        return true;
    }
}
?>
