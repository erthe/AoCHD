<?php
require_once('tools/tools.php');
class AdminController extends Zend_Controller_Action{
    
    public function init(){

        
        // ページ設定
        require_once dirname(dirname(__FILE__)) . '/models/AdminModel.php';
        $this->model = new AdminModel();
        
        $root_dir = str_replace("application", "themes", dirname(dirname(__FILE__)));
        
        $template_dir = $root_dir . '/layout/';
        $this->view->header = $template_dir . 'admin-header.tpl';
        
        // set login name to login status
        $loginid = Zend_Auth::getInstance()->getIdentity();
        If (is_Null($loginid)){
            $this->view->admin = 'not admin user';
        } else {
            $this->view->admin = get_object_vars($loginid)['admin_name'];
        }
        $this->view->status = $template_dir . 'admin-status.tpl';
        $this->view->menu = $template_dir . 'admin-menu.tpl';
        
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
                $result = "login was successful.<br/ >
                    ＿人人人人人人人人人＿<br/ >
                    ＞　突然のログイン　＜<br/ >
                    ￣Y^Y^Y^Y^Y^Y^Y^Y￣";
                $loginid = Zend_Auth::getInstance()->getIdentity();
                
                $this->model->LoginComplete(get_object_vars($loginid)['admin_name']);
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
    
    public function userlistAction(){
        $this->logincheck('admin');
        // search check
        $params = $this->getRequest()->getParams();
        
        if(!array_key_exists('search_user_id', $params) &&
           !array_key_exists('search_user_name', $params) &&
           !array_key_exists('email', $params) &&
           !array_key_exists('search_login', $params) &&
           !array_key_exists('search_status', $params)){
            
            $items = $this->model->getUserList();
            $paginator = Zend_Paginator::factory($items);
        
            //set maximum items to be displayed in a page
            $paginator->setItemCountPerPage(20);
            $paginator->setCurrentPageNumber($this->_getParam('page'));
            $pages = $paginator->getPages();
            $pageArray = get_object_vars($pages);
        
            $this->view->pages = $pageArray;
            $this->view->items = $paginator->getIterator();
            
        } else {
         
            $andflag = false;
            $where = '';
            
            if(!empty($params['search_user_id'])){
                $where = $where . "user_id = $params[search_user_id]";
                $andflag = true;
                
            }
            
            if(!empty($params['search_user_name'])){
                if ($andflag){
                    $where = $where . " AND ";
                }
                
                $where = $where . "user_name LIKE '%$params[search_user_name]%'";
                $andflag = true;
                
            }
            
            if(!empty($params['search_email'])){
                if ($andflag){
                    $where = $where . " AND ";
                }
                
                $where = $where . "email LIKE '%$params[search_email]%'";
                $andflag = true;
                
            }
            
            if($params['search_login'] != '2'){
                if ($andflag){
                    $where = $where . " AND ";
                }
                
                $where = $where . "login_status = $params[search_login]";
                $andflag = true;
                
            }
            
            if($params['search_status'] != '2'){
                if ($andflag){
                    $where = $where . " and ";
                }
                
                $where = $where . "status = $params[search_status]";
                $andflag = true;
                
            }
        
            if(empty($where)) {
                $items = $this->model->getUserList();
            } else {
                $items = $this->model->getUserSearch($where);
            }
            
            $paginator = Zend_Paginator::factory($items);
            
            //set maximum items to be displayed in a page
            $paginator->setItemCountPerPage(20);
            $paginator->setCurrentPageNumber($this->_getParam('page'));
            $pages = $paginator->getPages();
            $pageArray = get_object_vars($pages);
            
            $this->view->pages = $pageArray;
            $this->view->items = $paginator->getIterator();
            
        }
        
        $this->view->name = 'test';
        $this->view->title = 'ユーザーリスト';
        $this->view->usersearch = dirname(dirname(__FILE__)) . '/views/admin/usersearch.tpl';
        
    }
    public function adminlistAction(){
    	$this->logincheck('admin');
    	// search check
    	$params = $this->getRequest()->getParams();
    
    	if(!array_key_exists('search_admin_id', $params) &&
    	!array_key_exists('search_admin_name', $params) &&
    	!array_key_exists('search_login', $params) &&
    	!array_key_exists('search_status', $params)){
    
    		$items = $this->model->getAdminList();
    		$paginator = Zend_Paginator::factory($items);
    
    		//set maximum items to be displayed in a page
    		$paginator->setItemCountPerPage(20);
    		$paginator->setCurrentPageNumber($this->_getParam('page'));
    		$pages = $paginator->getPages();
    		$pageArray = get_object_vars($pages);
    
    		$this->view->pages = $pageArray;
    		$this->view->items = $paginator->getIterator();
    
    	} else {
    		 
    		$andflag = false;
    		$where = '';
    
    		if(!empty($params['search_admin_id'])){
    			$where = $where . "admin_id = $params[search_admin_id]";
    			$andflag = true;
    
    		}
    
    		if(!empty($params['search_admin_name'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    
    			$where = $where . "admin_name LIKE '%$params[search_admin_name]%'";
    			$andflag = true;
    
    		}
    
    		if($params['search_login'] != '2'){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    
    			$where = $where . "login_status = $params[search_login]";
    			$andflag = true;
    
    		}
    
    		if($params['search_status'] != '2'){
    			if ($andflag){
    				$where = $where . " and ";
    			}
    
    			$where = $where . "status = $params[search_status]";
    			$andflag = true;
    
    		}
    
    		if(empty($where)) {
    			$items = $this->model->getAdminList();
    		} else {
    			$items = $this->model->getAdminSearch($where);
    		}
    
    		$paginator = Zend_Paginator::factory($items);
    
    		//set maximum items to be displayed in a page
    		$paginator->setItemCountPerPage(20);
    		$paginator->setCurrentPageNumber($this->_getParam('page'));
    		$pages = $paginator->getPages();
    		$pageArray = get_object_vars($pages);
    
    		$this->view->pages = $pageArray;
    		$this->view->items = $paginator->getIterator();
    
    	}
    
    	$this->view->name = 'test';
    	$this->view->title = '管理者リスト';
    	$this->view->adminsearch = dirname(dirname(__FILE__)) . '/views/admin/adminsearch.tpl';
    
    }    
    public function usereditAction(){
        $id = $this->getRequest()->id;
        
        $userinfo = $this->model->getUserInfo($id);
        
        $this->view->item = $userinfo;
    }
    
    public function userupdateAction(){
        $params = $this->getRequest()->getParams();
        
        $loginid = Zend_Auth::getInstance()->getIdentity();
        
        $data = array(
                      'user_id' => $params['user_id'],
                      'user_name' => $params['user_name'],
                      'email' => $params['email'],
                      'password' => $params['password'],
                      'status' => $params['status'],
                      'memo' => $params['memo'],
                      'last_editer' => get_object_vars($loginid)['admin_name'],
                      'updated_on' => NULL
                      );
        $result = $this->model->userupdate($data);
        
        $this->view->result = $result;
    }
    
    public function usercreateAction(){
        
    }
    
    public function userinsertAction(){
        $params = $this->getRequest()->getParams();
        
        $loginid = Zend_Auth::getInstance()->getIdentity();
        
        $data = array(
                      'user_name' => $params['user_name'],
                      'email' => $params['email'],
                      'password' => md5($params['password']), 
        			  'admin_control' => 'user',
                      'status' => $params['status'],
                      'memo' => $params['memo'],
                      'last_editer' => get_object_vars($loginid)['admin_name'],
                      'created_on' => NULL,
                      'updated_on' => NULL
        );
        $result = $this->model->userinsert($data);
        
        $this->view->result = $result;
    }
    
    public function userdeleteAction(){
        $params = $this->getRequest()->getParams();
        $loginid = Zend_Auth::getInstance()->getIdentity();
        
        $data = array(
                      'user_id' => $params['id'],
                      'last_editer' => get_object_vars($loginid)['admin_name'],
                      'delete_flag' => 1,
                      'updated_on' => NULL
                      );
        
        $result = $this->model->userupdate($data);
        $this->view->result = $result;
    }
    
    public function userdeletedAction(){
        $this->logincheck('admin');
        $items = $this->model->getDeletedUserList();
        
        $this->view->items = $items;
        $this->view->name = 'test';
        $this->view->title = '削除済みユーザーリスト';
    }
    
    public function userrevertAction(){
        $params = $this->getRequest()->getParams();
        $loginid = Zend_Auth::getInstance()->getIdentity();
        
        $data = array(
                      'user_id' => $params['id'],
                      'last_editer' => get_object_vars($loginid)['admin_name'],
                      'delete_flag' => 0,
                      'updated_on' => NULL
                      );
        
        $result = $this->model->userupdate($data);
        $this->view->result = $result;
    }

    public function admineditAction(){
    	$id = $this->getRequest()->id;
    
    	$userinfo = $this->model->getAdminInfo($id);
    
    	$this->view->item = $userinfo;
    }
    
    public function adminupdateAction(){
    	$params = $this->getRequest()->getParams();
    
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'admin_id' => $params['admin_id'],
    			'admin_name' => $params['admin_name'],
    			'admin_password' => $params['password'],
    			'status' => $params['status'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'updated_on' => NULL
    	);
    	$result = $this->model->adminupdate($data);
    
    	$this->view->result = $result;
    }
    
    public function admincreateAction(){
    
    }
    
    public function admininsertAction(){
    	$params = $this->getRequest()->getParams();
    
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'admin_name' => $params['admin_name'],
    			'admin_password' => md5($params['password']),
    			'admin_control' => 'admin',
    			'status' => $params['status'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'created_on' => NULL,
    			'updated_on' => NULL
    	);
    	$result = $this->model->admininsert($data);
    
    	$this->view->result = $result;
    }
    
    public function admindeleteAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'admin_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 1,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->adminupdate($data);
    	$this->view->result = $result;
    }
    
    public function admindeletedAction(){
    	$this->logincheck('admin');
    	$items = $this->model->getDeletedAdminList();
    
    	$this->view->items = $items;
    	$this->view->name = 'test';
    	$this->view->title = '削除済み管理者リスト';
    }
    
    public function adminrevertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'admin_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 0,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->adminupdate($data);
    	$this->view->result = $result;
    }
    
    public function logoutAction(){
        $login = Zend_Auth::getInstance()->getIdentity();
        if(is_null($login)){
            $loginid = NULL;
        } else {
            $loginid = get_object_vars($login)['admin_name'];
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
