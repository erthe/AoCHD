<?php
require_once('tools/tools.php');
class AdminController extends Zend_Controller_Action{
    
    public function init(){
        
        $acl = new Zend_Acl();
        
        $acl->addRole(new Zend_Acl_Role('guest'))
        ->addRole(new Zend_Acl_Role('member'))
        ->addRole(new Zend_Acl_Role('admin'));
        
        $parents = array('guest', 'member', 'admin');
        
        $acl->add(new Zend_Acl_Resource('index'))
        ->add(new Zend_Acl_Resource('login'))
        ->add(new Zend_Acl_Resource('logout'))
        ->add(new Zend_Acl_Resource('list'))
        ->add(new Zend_Acl_Resource('auth'));
        
        //まずゲストに対して全体をアクセス禁止にする
        $acl->deny('guest', null, 'view');
        //ログイン画面だけ許可する
        $acl->allow('guest', 'login', 'view');
        $acl->allow('admin', null, 'view');
        
        
        //$auth = Zend_Auth::getInstance()->hasIdentity();
        //echo ($auth);
        //$action = $this->getRequest()->getActionName();
        //echo $acl->isAllowed('guest', 'someResource') ? 'allowed' : 'denied';
        
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
        
    }
    
    public function indexAction(){
        $auth = $this->logincheck('admin');
        //var_dump($foo = Zend_Registry::get('auth'));
        // ログインしている
        echo "＿人人人人人人人人人＿<br/ >
        ＞　ログインしてる　＜<br/ >
        ￣Y^Y^Y^Y^Y^Y^Y^Y￣";
        
    }
    
    public function loginAction(){
        Zend_Registry::set('auth', 'guest');
        var_dump(Zend_Registry::get('auth'));
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
                
                Zend_Registry::set('auth', 'admin');
                var_dump($foo = Zend_Registry::get('auth'));
                $this->view->login = true;
                

            }else{
                // ログインしていない
                echo "login failed";
                Zend_Registry::set('auth', 'guest');
                $this->view->login = false;
            }
            
            
            
        }catch(Exception $e){
            $this->displayError($e);
        }
    }
    
    public function listAction(){
        if(Zend_Registry::get('auth')->isAllowed('admin', 'list', 'view')){
            $items = $this->model->getIndexInfo();
            $this->view->items = $items;
            
            $this->view->name = 'test';
            $this->view->title = 'インデックステスト';
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
            Zend_Registry::set('auth', 'guest');
            $this->_redirect("/$mode/login");
        }
        
        return true;
    }
}
?>
