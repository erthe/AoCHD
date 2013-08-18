<?php
require_once('tools/tools.php');
class AdminController extends Zend_Controller_Action{
    
    public function init(){
        
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
        
    }
    
    public function indexAction(){
        $auth = $this->logincheck('admin');
        
        $this->view->title = 'インデックス';
    }
    
//------------ login module ------------
    public function loginAction(){
        $this->view->title = 'ログイン';
        
    }
    
    public function authAction(){
        try {
            $username = $this->getRequest()->getParam('username');
            $password = $this->getRequest()->getParam('password');
            
            $logininfo = $this->model->LoginAuthentication($username, $password);

            $auth = Zend_Auth::getInstance();
            if ($auth->hasIdentity()){
                $result = "login was successful.<br/ >
                    ＿人人人人人人人人人＿<br/ >
                    ＞　突然のログイン　＜<br/ >
                    ￣Y^Y^Y^Y^Y^Y^Y^Y￣";
                $loginid = Zend_Auth::getInstance()->getIdentity();
                
                $this->model->LoginComplete(get_object_vars($loginid)['admin_name']);
                $this->view->login = true;

            }else{
                $result = "login failed";
                $this->view->login = false;
                
            }
            
            $this->view->title = 'ログイン認証';
            $this->view->result = $result;
            
        }catch(Exception $e){
            $this->displayError($e);
        }
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
    
//------------ user module ------------
    public function userlistAction(){
        $this->logincheck('admin');
        
        // init
        $this->view->search_user_id = null;
        $this->view->search_user_name = null;
        $this->view->search_email = null;
        $this->view->search_login = '2';
        $this->view->search_status = '2';
        
        // search check
        $params = $this->getRequest()->getParams();
        
        if(!array_key_exists('search_user_id', $params) &&
           !array_key_exists('search_user_name', $params) &&
           !array_key_exists('search_email', $params) &&
           !array_key_exists('search_login', $params) &&
           !array_key_exists('search_status', $params)){
            
            $items = $this->model->getList('user', 0);
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
                
                $this->view->search_user_id = $params['search_user_id'];
            }
            
            if(!empty($params['search_user_name'])){
                if ($andflag){
                    $where = $where . " AND ";
                }
                
                $where = $where . "user_name LIKE '%$params[search_user_name]%'";
                $andflag = true;
                
                $this->view->search_user_name = $params['search_user_name'];
            }
            
            if(!empty($params['search_email'])){
                if ($andflag){
                    $where = $where . " AND ";
                }
                
                $where = $where . "email LIKE '%$params[search_email]%'";
                $andflag = true;
                
                $this->view->search_email = $params['search_email'];
            }
            
            if($params['search_login'] != '2'){
                if ($andflag){
                    $where = $where . " AND ";
                }
                
                $where = $where . "login_status = $params[search_login]";
                $andflag = true;
                
                $this->view->search_login = $params['search_login'];
            }
            
            if($params['search_status'] != '2'){
                if ($andflag){
                    $where = $where . " and ";
                }
                
                $where = $where . "status = $params[search_status]";
                $andflag = true;
                
                $this->view->search_status = $params['search_status'];
            }
        
            if(empty($where)) {
                $items = $this->model->getList('user');
            } else {
                $items = $this->model->Search('user', $where, 0);
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
        
        $this->view->title = 'ユーザー一覧';
        $this->view->usersearch = dirname(dirname(__FILE__)) . '/views/admin/usersearch.tpl';
        
    }
        
    public function usereditAction(){
        $id = $this->getRequest()->id;
        $userinfo = $this->model->getInfo('user', $id);
        
        $this->view->item = $userinfo;
    }
    
    public function userupdateAction(){
        $params = $this->getRequest()->getParams();
        $loginid = Zend_Auth::getInstance()->getIdentity();
        
        if ($params['user_name'] != $params['original_name']){
        	$ndc = $this->model->NameDuplicateCheck('user', $params['user_name']);
        
        	if (!$ndc){
        		return $this->_forward('error');
        	}
        }
        
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
        $result = $this->model->update('user', $data);
        
        $this->view->result = $result;
    }
    
    public function usercreateAction(){
        
    }
    
    public function userinsertAction(){
        $params = $this->getRequest()->getParams();
        $loginid = Zend_Auth::getInstance()->getIdentity();
        
        $ndc = $this->model->NameDuplicateCheck('user', $params['user_name']);
        if ($ndc){
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
        	$result = $this->model->insert('user', $data);
        
        	$this->view->result = $result;
        	
        } else {
        	return $this->_forward('error');
        }
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
        
        $result = $this->model->update('user', $data);
        $this->view->result = $result;
    }
    
    public function userdeletedAction(){
        $this->logincheck('admin');
        $items = $this->model->getList('user', 1);
        
        $this->view->items = $items;
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
        
        $result = $this->model->update('user', $data);
        $this->view->result = $result;
    }
    
//------------ admin module ------------
    public function adminlistAction(){
    	$this->logincheck('admin');
    	
    	// init
    	$this->view->search_admin_id = null;
    	$this->view->search_admin_name = null;
    	$this->view->search_login = '2';
    	$this->view->search_status = '2';
    	
    	// search check
    	$params = $this->getRequest()->getParams();
    
    	if(!array_key_exists('search_admin_id', $params) &&
    	!array_key_exists('search_admin_name', $params) &&
    	!array_key_exists('search_login', $params) &&
    	!array_key_exists('search_status', $params)){
    
    		$items = $this->model->getList('admin', 0);
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
    			
    			$this->view->search_admin_id = $params['search_admin_id'];
    
    		}
    
    		if(!empty($params['search_admin_name'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    
    			$where = $where . "admin_name LIKE '%$params[search_admin_name]%'";
    			$andflag = true;
    
    			$this->view->search_admin_name = $params['search_admin_name'];
    		}
    
    		if($params['search_login'] != '2'){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    
    			$where = $where . "login_status = $params[search_login]";
    			$andflag = true;
    			
    			$this->view->search_login = $params['search_login'];
    		}
    
    		if($params['search_status'] != '2'){
    			if ($andflag){
    				$where = $where . " and ";
    			}
    
    			$where = $where . "status = $params[search_status]";
    			$andflag = true;
    			
    			$this->view->search_status = $params['search_status'];
    		}
    
    		if(empty($where)) {
    			$items = $this->model->getList('admin', 0);
    		} else {
    			$items = $this->model->Search('admin', $where, 0);
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
    
    	$this->view->title = '管理者一覧';
    	$this->view->adminsearch = dirname(dirname(__FILE__)) . '/views/admin/adminsearch.tpl';
    
    }

    public function admineditAction(){
    	$id = $this->getRequest()->id;
    
    	$userinfo = $this->model->getInfo('admin', $id);
    
    	$this->view->item = $userinfo;
    }
    
    public function adminupdateAction(){
    	$params = $this->getRequest()->getParams();
    
    	$loginid = Zend_Auth::getInstance()->getIdentity();

    	if ($params['admin_name'] != $params['original_name']){
    		$ndc = $this->model->NameDuplicateCheck('admin', $params['admin_name']);
    		if (!$ndc){
    			return $this->_forward('error');
    		}
    	}
    	
    	$data = array(
    			'admin_id' => $params['admin_id'],
    			'admin_name' => $params['admin_name'],
    			'admin_password' => $params['password'],
    			'status' => $params['status'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'updated_on' => NULL
    	);
    	$result = $this->model->update('admin', $data);
    
    	$this->view->result = $result;
    }
    
    public function admincreateAction(){
    
    }
    
    public function admininsertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$ndc = $this->model->NameDuplicateCheck('admin', $params['admin_name']);
    	if ($ndc){
    		$data = array(
    				'admin_name' => $params['admin_name'],
    				'admin_password' => md5($params['password']),
    				'admin_control' => 'admin',
    				'status' => $params['status'],
    				'last_editer' => get_object_vars($loginid)['admin_name'],
    				'created_on' => NULL,
    				'updated_on' => NULL
    				);
    		$result = $this->model->insert('admin', $data);
    
    		$this->view->result = $result;
    	} else {
    		return $this->_forward('error');
    	}
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
    
    	$result = $this->model->update('admin', $data);
    	$this->view->result = $result;
    }
    
    public function admindeletedAction(){
    	$this->logincheck('admin');
    	$items = $this->model->getList('admin', 1);
    
    	$this->view->items = $items;
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
    
    	$result = $this->model->update('admin', $data);
    	$this->view->result = $result;
    }
    
//------------ class module ------------
    public function classlistAction(){
    	$this->logincheck('admin');
    	
    	$params = $this->getRequest()->getParams();
    	
    	// init
    	$this->view->firstkey = null;
    	$this->view->firstkeyorder = null;
    	$this->view->secondkey = null;
    	$this->view->secondkeyorder = null;
    	$this->view->thirdkey = null;
    	$this->view->thirdkeyorder = null;
    	$this->view->fourthkey = null;
    	$this->view->fourthkeyorder = null;
    	$this->view->fifthkey = null;
    	$this->view->fifthkeyorder = null;
    	$this->view->search_class_id = null;
    	$this->view->search_class_rank = null;
    	$this->view->search_class_name = null;
    	$this->view->search_playable = '2';
    	
    	if(!array_key_exists('first_key', $params)) {
    		$sortkey = null;
    	
    	} else {
    		// create order param
    		$first_key = $params['first_key'] . ' ' . $params['first_key_order'];
    		$this->view->firstkey = $params['first_key'];
    		$this->view->firstkeyorder = $params['first_key_order'];
    	
    		if ($params['second_key'] === 'Null') {
    			$second_key = 'Null';
    			 
    		} else {
    			$second_key = $params['second_key'] . ' ' . $params['second_key_order'];
    	
    			$this->view->secondkey = $params['second_key'];
    			$this->view->secondkeyorder = $params['second_key_order'];
    			
    		}
    	
    		if ($params['third_key'] === 'Null') {
    			$third_key = 'Null';
    	
    		} else {
    			$third_key = $params['third_key'] . ' ' . $params['third_key_order'];
    			$this->view->thirdkey = $params['third_key'];
    			$this->view->thirdkeyorder = $params['third_key_order'];
    			 
    		}
    	
    		if ($params['fourth_key'] === 'Null') {
    			$fourth_key = 'Null';
    	
    		} else {
    			$fourth_key = $params['fourth_key'] . ' ' . $params['fourth_key_order'];
    			$this->view->fourthkey = $params['fourth_key'];
    			$this->view->fourthkeyorder = $params['fourth_key_order'];
    			 
    		}
    	
    		if ($params['fifth_key'] === 'Null') {
    			$fifth_key = 'Null';
    	
    		} else {
    			$fifth_key = $params['fifth_key'] . ' ' . $params['fifth_key_order'];
    			$this->view->fifthkey = $params['fifth_key'];
    			$this->view->fifthkeyorder = $params['fifth_key_order'];
    			 
    		}
    	
    		$sortkey = array(
    				$first_key,
    				$second_key,
    				$third_key,
    				$fourth_key,
    				$fifth_key
    		);
    	
    	}
    	
    	if(!array_key_exists('search_class_id', $params) &&
    	!array_key_exists('search_class_rank', $params) &&
    	!array_key_exists('search_class_name', $params) &&
    	!array_key_exists('search_playable', $params)){
    	
    		$items = $this->model->getSearchSortList('class', null, 0, $sortkey);
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
    	
    		if(!empty($params['search_class_id'])){
    			$where = $where . "class_id = $params[search_class_id]";
    			$andflag = true;
    			
    			$this->view->search_class_id = $params['search_class_id'];
    	
    		}
    	
    		if(!empty($params['search_class_rank'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    			 
    			$where = $where . "class_rank = $params[search_class_rank]";
    			$andflag = true;
    			 
    			$this->view->search_class_rank = $params['search_class_rank'];
    		}
    		
    		if(!empty($params['search_class_name'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    	
    			$where = $where . "class_name LIKE '%$params[search_class_name]%'";
    			$andflag = true;
    			
    			$this->view->search_class_name = $params['search_class_name'];
    	
    		}
    	
    		if($params['search_playable'] != '2'){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    	
    			$where = $where . "playable = $params[search_playable]";
    			$andflag = true;
    			
    			$this->view->search_playable = $params['search_playable'];
    	
    		}
    	
    	
    		if(empty($where)) {
    			$items = $this->model->getSearchSortList('class', null, 0, $sortkey);
    		} else {
    			$items = $this->model->getSearchSortList('class', $where, 0, $sortkey);
    		}
    	}
    	
    	$paginator = Zend_Paginator::factory($items);
    	 
    	//set maximum items to be displayed in a page
    	$paginator->setItemCountPerPage(20);
    	$paginator->setCurrentPageNumber($this->_getParam('page'));
    	$pages = $paginator->getPages();
    	$pageArray = get_object_vars($pages);
    	 
    	$this->view->pages = $pageArray;
    	$this->view->items = $paginator->getIterator();
    	$this->view->title = 'クラス一覧';
    	$this->view->classsearchsort = dirname(dirname(__FILE__)) . '/views/admin/classsearchsort.tpl';
    }
    
    public function classeditAction(){
    	$id = $this->getRequest()->id;
    	$classinfo = $this->model->getinfo('class', $id);
    
    	$this->view->item = $classinfo;
    }
    
    public function classupdateAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	if ($params['class_name'] != $params['original_name']){
    		$ndc1 = $this->model->NameDuplicateCheck('class', $params['class_rank']);
    		$ndc2 = $this->model->NameDuplicateCheck('class', $params['class_name']);
    		if (!$ndc1 || !$ndc2){
    			return $this->_forward('classerror');
    		}
    	}
    	
    	// null set check
    	if ($params['own_skl_id'] != 'NULL') {
    		$own_skill_id = $params['own_skl_id'];
    	} else {
    		$own_skill_id = null;
    	}
    	
    	$data = array(
    			'class_id' => $params['class_id'],
    			'class_rank' => $params['class_rank'],
    			'class_name' => $params['class_name'],
    			'hp_val' => $params['hp_val'],
    			'str_val' => $params['str_val'],
    			'mag_val' => $params['mag_val'],
    			'skl_val' => $params['skl_val'],
    			'spd_val' => $params['spd_val'],
    			'luk_val' => $params['luk_val'],
    			'def_val' => $params['def_val'],
    			'mdf_val' => $params['mdf_val'],
    			'bod_val' => $params['bod_val'],
    			'hp_grow' => $params['hp_grow'],
    			'str_grow' => $params['str_grow'],
    			'mag_grow' => $params['mag_grow'],
    			'skl_grow' => $params['skl_grow'],
    			'spd_grow' => $params['spd_grow'],
    			'luk_grow' => $params['luk_grow'],
    			'def_grow' => $params['def_grow'],
    			'mdf_grow' => $params['mdf_grow'],
    			'bod_grow' => $params['bod_grow'],
    			'own_skl_id' => $own_skill_id,
    			'playable' => $params['playable'],
    			'classchange_id' => $params['classchange_id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'updated_on' => NULL
    	);
    	
    	$result = $this->model->update('class', $data);
    
    	$this->view->result = $result;
    }
    
    public function classcreateAction(){
    
    }
    
    public function classinsertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$ndc1 = $this->model->NameDuplicateCheck('class', $params['class_rank']);
    	$ndc2 = $this->model->NameDuplicateCheck('class', $params['class_name']);
    	if ($ndc1 && $ndc2){
    		// null set check
    		if ($params['own_skl_id'] != 'NULL') {
    			$own_skill_id = $params['own_skl_id'];
    		} else {
    			$own_skill_id = null;
    		}
    		
    		$data = array(
    				'class_rank' => $params['class_rank'],
    				'class_name' => $params['class_name'],
    				'hp_val' => $params['hp_val'],
    				'str_val' => $params['str_val'],
    				'mag_val' => $params['mag_val'],
    				'skl_val' => $params['skl_val'],
    				'spd_val' => $params['spd_val'],
    				'luk_val' => $params['luk_val'],
    				'def_val' => $params['def_val'],
    				'mdf_val' => $params['mdf_val'],
    				'bod_val' => $params['bod_val'],
    				'hp_grow' => $params['hp_grow'],
    				'str_grow' => $params['str_grow'],
    				'mag_grow' => $params['mag_grow'],
    				'skl_grow' => $params['skl_grow'],
    				'spd_grow' => $params['spd_grow'],
    				'luk_grow' => $params['luk_grow'],
    				'def_grow' => $params['def_grow'],
    				'mdf_grow' => $params['mdf_grow'],
    				'bod_grow' => $params['bod_grow'],
    				'own_skl_id' => $own_skill_id,
    				'playable' => $params['playable'],
    				'classchange_id' => $params['classchange_id'],
    				'last_editer' => get_object_vars($loginid)['admin_name'],
    				'created_on' => NULL,
    				'updated_on' => NULL
    		);
    		$result = $this->model->insert('class', $data);
    
    		$this->view->result = $result;

    	} else {
    		return $this->_forward('classerror');
    	}
    }
    
    public function classdeleteAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'class_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 1,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->update('class', $data);
    	$this->view->result = $result;
    }
    
    public function classdeletedAction(){
    	$this->logincheck('admin');
    	$items = $this->model->getList('class', 1);
    
    	$this->view->items = $items;
    	$this->view->title = '削除済みクラスリスト';
    }
    
    public function classrevertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'class_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 0,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->update('class', $data);
    	$this->view->result = $result;
    }
    
    public function classuploadAction(){
    	$this->logincheck('admin');
    }
    
    public function classprocessAction(){
    	$uploadPath = str_replace("application", "data", dirname(dirname(__FILE__))) . '/csv/';;
    	 
    	$adapter = new Zend_File_Transfer_Adapter_Http();
    	$adapter->setDestination($uploadPath);
    	 
    	if (!$adapter->receive()) {
    		$messages = $adapter->getMessages();
    		echo implode("\n", $messages);
    	};
    	
    	$file = $adapter->getFileName();
    	
    	$loadData = "LOAD DATA local INFILE '$file' ";
    	$loadData.= "INTO TABLE class FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
    	
    	$loadData.= "(`class_rank`,`class_name`,`hp_val`,`str_val`,`mag_val`,
    				`skl_val`,`spd_val`,`luk_val`,`def_val`,`mdf_val`,`bod_val`,`hp_grow`,
    				`str_grow`,`mag_grow`,`skl_grow`,`spd_grow`,`luk_grow`,`def_grow`,
    				`mdf_grow`,`bod_grow`,`own_skl_id`,`classchange_id`,`playable`)";
    	
    	$result = $this->model->loadclass($loadData);
    	
    	$this->view->row = $result;
    	
    }
    
    public function classdownloadAction(){
    	//$this->logincheck('admin');
    	$date = date('ymd');
    	header("Content-Type: application/octet-stream");
    	header("Content-Disposition: attachment; filename=classlist".$date.".csv");
    	
    	$recordset = $this->model->getAllList('class');
    		
    	foreach($recordset as $rows){
    		$field_number = count($rows);
    		$current_number = 0;
    		
    		foreach($rows as $fields){

    			print($fields);
    				
    			if ($current_number < $field_number -1){
    				print(",");
    				$current_number = $current_number + 1;
    			}
    		
    		}
    		
    		print("\n");
    	}
    	
    }
    
    public function errorAction(){
    	
    }
    
    public function classerrorAction(){
    	 
    }
}
?>
