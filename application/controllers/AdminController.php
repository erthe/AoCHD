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
        
        $join_column = array(array('user_name'));
        $join_array = array('user_data');
        
        // search check
        $params = $this->getRequest()->getParams();
        
        if(!array_key_exists('search_user_id', $params) &&
           !array_key_exists('search_user_name', $params) &&
           !array_key_exists('search_email', $params) &&
           !array_key_exists('search_login', $params) &&
           !array_key_exists('search_status', $params)){
            
            $items = $this->model->JoinList('user', $join_column, $join_array, 'delete_flag', 0);
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
            
            	$where = $where . "user_name LIKE '%$params[search_email]%'";
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
                $items = $this->model->JoinList('user', $join_column, $join_array, 'delete_flag', 0);
            } else {
                $items = $this->model->JoinSearch('user', $join_column, $join_array, 'delete_flag', 0, $where);
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
        
        $ndc = $this->model->NameDuplicateCheck('user', 'email', $params['email']);
        
        if ($ndc){
	        $data = array(
	                      'user_id' => $params['user_id'],
	                      'email' => $params['email'],
	                      'password' => $params['password'],
	                      'status' => $params['status'],
	                      'memo' => $params['memo'],
	                      'last_editer' => get_object_vars($loginid)['admin_name'],
	                      'updated_on' => NULL
	                      );
	        $result = $this->model->update('user', $data);
	        
	    } else {
	        	return $this->_forward('error');
	    }
        
        $this->view->result = $result;
    }
    
    public function usercreateAction(){
        
    }
    
    public function userinsertAction(){
        $params = $this->getRequest()->getParams();
        $loginid = Zend_Auth::getInstance()->getIdentity();
        
        $ndc = $this->model->NameDuplicateCheck('user', 'email', $params['email']);
        
        if ($ndc){
        	$user_data_id = $this->model->getMaxID('user') + 1;
        	
        	$data = array(
        			  'user_data_id' => $user_data_id,
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
    
    	$admininfo = $this->model->getInfo('admin', $id);
    
    	$this->view->item = $admininfo;
    }
    
    public function adminupdateAction(){
    	$params = $this->getRequest()->getParams();
    
    	$loginid = Zend_Auth::getInstance()->getIdentity();

    	if ($params['admin_name'] != $params['original_name']){
    		$ndc = $this->model->NameDuplicateCheck('admin', 'admin_name', $params['admin_name']);
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
    
    	$ndc = $this->model->NameDuplicateCheck('admin', 'admin_name', $params['admin_name']);
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
    	$classchange = $this->model->getetcInfo('class', 'changed_flag', 1);
    
    	$this->view->item = $classinfo;
    	$this->view->class = $classchange;
    }
    
    public function classupdateAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	if ($params['class_name'] != $params['original_name']){
    		$ndc1 = $this->model->NameDuplicateCheck('class', 'class_rank', $params['class_rank']);
    		$ndc2 = $this->model->NameDuplicateCheck('class', 'class_name', $params['class_name']);
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
    			'armor_flag' => $params['armor_flag'],
    			'knight_flag' => $params['knight_flag'],
    			'flying_flag' => $params['flying_flag'],
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
    
    	$ndc1 = $this->model->NameDuplicateCheck('class', 'class_rank', $params['class_rank']);
    	$ndc2 = $this->model->NameDuplicateCheck('class', 'class_name', $params['class_name']);
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
    				'armor_flag' => $params['armor_flag'],
    				'knight_flag' => $params['knight_flag'],
    				'flying_flag' => $params['flying_flag'],
    				'playable' => $params['playable'],
    				'classchange_id' => $params['classchange_id'],
    				'last_editer' => get_object_vars($loginid)['admin_name'],
    				'created_on' => NULL,
    				'updated_on' => NULL
    		);
    		$result = $this->model->insert('class', $data);
    		$this->model->insertColumn('equip_class', 'class');
    
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
    	$this->view->title = 'クラスアップロード';
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
    				`mdf_grow`,`bod_grow`,`own_skl_id`,`armor_flag`,`knight_flag`, `flying_flag`,
    				`classchange_id`,`playable`)";
    	
    	$result = $this->model->load('class', $loadData);
    	
    	$fixed_head = "`equip_class_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    					`item_id` int(10) NOT NULL,";
    	$fixed_foot = "`last_editer` varchar(255) NULL, `created_on` timestamp NOT NULL, 
    					`updated_on` timestamp NOT NULL";
    	$this->model->insertColumns('equip_class', 'class', $fixed_head, $fixed_foot);
    	
    	$this->view->row = $result;
    	$this->view->title = 'アップロード成功';
    	
    }
    
    public function classdownloadAction(){
    	$recordset = $this->model->getAllList('class');
    	CsvCreate('class', $recordset);
    	
    }
    
//------------ skill module ------------
    public function skilllistAction(){
    	$this->logincheck('admin');
    
    	$items = $this->model->getList('skill', 0);
    	$paginator = Zend_Paginator::factory($items);
    	
    	//set maximum items to be displayed in a page
    	$paginator->setItemCountPerPage(20);
    	$paginator->setCurrentPageNumber($this->_getParam('page'));
    	$pages = $paginator->getPages();
    	$pageArray = get_object_vars($pages);
    	 
    	$this->view->pages = $pageArray;
    	$this->view->items = $paginator->getIterator();
    
    	$this->view->title = 'スキル一覧';
    
    }
    
    public function skilleditAction(){
    	$id = $this->getRequest()->id;
    
    	$skillinfo = $this->model->getInfo('skill', $id);
    
    	$this->view->item = $skillinfo;
    }
    
    public function skillupdateAction(){
    	$params = $this->getRequest()->getParams();
    
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	if ($params['skill_name'] != $params['original_name']){
    		$ndc = $this->model->NameDuplicateCheck('skill', 'skill_name', $params['skill_name']);
    		if (!$ndc){
    			return $this->_forward('error');
    		}
    	}
    	 
    	$data = array(
    			'skill_id' => $params['skill_id'],
    			'skill_name' => $params['skill_name'],
    			'description' => $params['description'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'updated_on' => NULL
    	);
    	$result = $this->model->update('skill', $data);
    
    	$this->view->result = $result;
    }
    
    public function skillcreateAction(){
    
    }
    
    public function skillinsertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$ndc = $this->model->NameDuplicateCheck('skill', 'skill_name', $params['skill_name']);
    	if ($ndc){
    		$data = array(
    				'skill_name' => $params['skill_name'],
    				'description' => $params['description'],
    				'last_editer' => get_object_vars($loginid)['admin_name'],
    				'created_on' => NULL,
    				'updated_on' => NULL
    		);
    		$result = $this->model->insert('skill', $data);
    
    		$this->view->result = $result;
    	} else {
    		return $this->_forward('error');
    	}
    }
    
    public function skilldeleteAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'skill_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 1,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->update('skill', $data);
    	$this->view->result = $result;
    }
    
    public function skilldeletedAction(){
    	$this->logincheck('admin');
    	$items = $this->model->getList('skill', 1);
    
    	$this->view->items = $items;
    	$this->view->title = '削除済みスキルリスト';
    }
    

    
    public function skillrevertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'skill_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 0,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->update('skill', $data);
    	$this->view->result = $result;
    }

    public function skilluploadAction(){
    	$this->logincheck('admin');
    	$this->view->title = 'スキルアップロード';
    }
    
    public function skillprocessAction(){
    	$uploadPath = str_replace("application", "data", dirname(dirname(__FILE__))) . '/csv/';;
    
    	$adapter = new Zend_File_Transfer_Adapter_Http();
    	$adapter->setDestination($uploadPath);
    
    	if (!$adapter->receive()) {
    		$messages = $adapter->getMessages();
    		echo implode("\n", $messages);
    	};
    	 
    	$file = $adapter->getFileName();
    	 
    	$loadData = "LOAD DATA local INFILE '$file' ";
    	$loadData.= "INTO TABLE skill FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
    	 
    	$loadData.= "(`skill_name`,`description`)";
    	 
    	$result = $this->model->load('skill', $loadData);
    	 
    	$this->view->row = $result;
    	$this->view->title = 'アップロード成功';
    	 
    }
    
    public function skilldownloadAction(){
    	$recordset = $this->model->getAllList('skill');
    	CsvCreate('skill', $recordset);
    	 
    } 
    
//------------ item module ------------
    public function itemlistAction(){
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
    	$this->view->search_item_id = null;
    	$this->view->search_item_name = null;
    	$this->view->search_weapon_type = '99';
    	
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
    	
    	if(!array_key_exists('search_item_id', $params) &&
    	!array_key_exists('search_item_name', $params) &&
    	!array_key_exists('search_weapon_type', $params)){
    	
    		$items = $this->model->getSearchSortList('item', null, 0, $sortkey);
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
    	
    		if(!empty($params['search_item_id'])){
    			$where = $where . "item_id = $params[search_item_id]";
    			$andflag = true;
    			
    			$this->view->search_item_id = $params['search_item_id'];
    	
    		}
    		
    		if(!empty($params['search_item_name'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    	
    			$where = $where . "item_name LIKE '%$params[search_item_name]%'";
    			$andflag = true;
    			
    			$this->view->search_item_name = $params['search_item_name'];
    	
    		}
    	
    		if($params['search_weapon_type'] != '99'){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    	
    			$where = $where . "weapon_type = $params[search_weapon_type]";
    			$andflag = true;
    			
    			$this->view->search_weapon_type = $params['search_weapon_type'];
    	
    		}
    	
    	
    		if(empty($where)) {
    			$items = $this->model->getSearchSortList('item', null, 0, $sortkey);
    		} else {
    			$items = $this->model->getSearchSortList('item', $where, 0, $sortkey);
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
    	$this->view->title = 'アイテム一覧';
    	$this->view->itemsearchsort = dirname(dirname(__FILE__)) . '/views/admin/itemsearchsort.tpl';
    
    }
    
    public function itemeditAction(){
    	$id = $this->getRequest()->id;
    
    	$iteminfo = $this->model->getInfo('item', $id);
    
    	$this->view->item = $iteminfo;
    }
    
    public function itemupdateAction(){
    	$params = $this->getRequest()->getParams();
    
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	if ($params['item_name'] != $params['original_name'] || 
    		$params[item_id] != $params['priginal_id']){
    		$ndc1 = $this->model->NameDuplicateCheck('item', 'item_id', $params['item_id']);
    		$ndc2 = $this->model->NameDuplicateCheck('item', 'item_name', $params['item_name']);
    		if (!$ndc1 || !$ndc2){
    			return $this->_forward('error');
    		}
    	}
    	 
    	$data = array(
    			'item_id' => $params['item_id'],
    			'item_name' => $params['item_name'],
    			'power' => $params['power'],
    			'hit_chance' => $params['hit_chance'],
    			'special_chance' => $params['special_chance'],
    			'weight' => $params['weight'],
    			'durability' => $params['durability'],
    			'weapon_level' => $params['weapon_level'],
    			'weapon_type' => $params['weapon_type'],
    			'price' => $params['price'],
    			'attack_speed' => $params['attack_speed'],
    			'hp_plus' => $params['hp_plus'],
    			'str_plus' => $params['str_plus'],
    			'mag_plus' => $params['mag_plus'],
    			'skl_plus' => $params['skl_plus'],
    			'spd_plus' => $params['spd_plus'],
    			'luk_plus' => $params['luk_plus'],
    			'def_plus' => $params['def_plus'],
    			'mdf_plus' => $params['mdf_plus'],
    			'bod_plus' => $params['bod_plus'],
    			'magic_attack' => $params['magic_attack'],
    			'double_attack' => $params['double_attack'],
    			'double_exp' => $params['double_exp'],
    			'absorb_attack' => $params['absorb_attack'],
    			'self_damage' => $params['self_damage'],
    			'armor_efficacy' => $params['armor_efficacy'],
    			'knight_efficacy' => $params['knight_efficacy'],
    			'flying_efficacy' => $params['flying_efficacy'],
    			'description' => $params['description'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'updated_on' => NULL
    	);
    	$result = $this->model->update('item', $data);
    
    	$this->view->result = $result;
    }
    
    public function itemcreateAction(){
    
    }
    
    public function iteminsertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$ndc1 = $this->model->NameDuplicateCheck('item', 'item_id', $params['item_id']);
    	$ndc2 = $this->model->NameDuplicateCheck('item', 'item_name', $params['item_name']);
    	
    	if ($ndc1 && $ndc2){
    		$data = array(
    				'item_id' => $params['item_id'],
	    			'item_name' => $params['item_name'],
	    			'power' => $params['power'],
	    			'hit_chance' => $params['hit_chance'],
	    			'special_chance' => $params['special_chance'],
	    			'weight' => $params['weight'],
	    			'durability' => $params['durability'],
	    			'weapon_level' => $params['weapon_level'],
	    			'weapon_type' => $params['weapon_type'],
	    			'price' => $params['price'],
	    			'attack_speed' => $params['attack_speed'],
	    			'hp_plus' => $params['hp_plus'],
	    			'str_plus' => $params['str_plus'],
	    			'mag_plus' => $params['mag_plus'],
	    			'skl_plus' => $params['skl_plus'],
	    			'spd_plus' => $params['spd_plus'],
	    			'luk_plus' => $params['luk_plus'],
	    			'def_plus' => $params['def_plus'],
	    			'mdf_plus' => $params['mdf_plus'],
	    			'bod_plus' => $params['bod_plus'],
	    			'magic_attack' => $params['magic_attack'],
	    			'double_attack' => $params['double_attack'],
	    			'double_exp' => $params['double_exp'],
	    			'absorb_attack' => $params['absorb_attack'],
	    			'self_damage' => $params['self_damage'],
	    			'armor_efficacy' => $params['armor_efficacy'],
	    			'knight_efficacy' => $params['knight_efficacy'],
	    			'flying_efficacy' => $params['flying_efficacy'],
    				'description' => $params['description'],
    				'last_editer' => get_object_vars($loginid)['admin_name'],
    				'created_on' => NULL,
    				'updated_on' => NULL
    		);
    		
    		$result = $this->model->insert('item', $data);
    		
    		$equip_data = array(
    				'item_id' => $params['item_id']
    		);
    		$this->model->insert('equip_class', $equip_data);
    
    		$this->view->result = $result;
    	} else {
    		return $this->_forward('error');
    	}
    }
    
    public function itemdeleteAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'item_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 1,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->update('item', $data);
    	$this->view->result = $result;
    }
    
    public function itemdeletedAction(){
    	$this->logincheck('admin');
    	$items = $this->model->getList('item', 1);
    
    	$this->view->items = $items;
    	$this->view->title = '削除済みアイテムリスト';
    }
    
    public function itemrevertAction(){
      	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'item_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 0,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->update('item', $data);
    	$this->view->result = $result;
    }

    public function itemuploadAction(){
    	$this->logincheck('admin');
    	$this->view->title = 'クラスアップロード';
    }
    
    public function itemprocessAction(){
    	$uploadPath = str_replace("application", "data", dirname(dirname(__FILE__))) . '/csv/';;
    
    	$adapter = new Zend_File_Transfer_Adapter_Http();
    	$adapter->setDestination($uploadPath);
    
    	if (!$adapter->receive()) {
    		$messages = $adapter->getMessages();
    		echo implode("\n", $messages);
    	};
    	 
    	$file = $adapter->getFileName();
    	 
    	$loadData = "LOAD DATA local INFILE '$file' ";
    	$loadData.= "INTO TABLE item FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
    	 
    	$loadData.= "(`item_id`,`item_name`,`power`,`hit_chance`,`special_chance`,`weight`,
    				`durability`,`weapon_level`,`weapon_type`,`price`,`attack_speed`,
    				`hp_plus`,`str_plus`,`mag_plus`,`skl_plus`,`spd_plus`,`luk_plus`,
    				`def_plus`,`mdf_plus`,`bod_plus`,`magic_attack`,`double_attack`,
    				`double_exp`,`absorb_attack`,`self_damage`,`armor_efficacy`,`knight_efficacy`,
    				`flying_efficacy`,`description`)";
    	 
    	$result = $this->model->load('item', $loadData);
    	 
    	$this->view->row = $result;
    	$this->view->title = 'アップロード成功';
    	 
    }
    
    public function itemdownloadAction(){
    	$recordset = $this->model->getAllList('item');
    	CsvCreate('item', $recordset);
    	 
    } 
    
    public function equipuploadAction(){
    	$this->logincheck('admin');
    	$this->view->title = '装備クラスアップロード';
    }
    
    public function equipclassAction(){
    	$id = $this->getRequest()->id;
    	
    	$equipinfo = $this->model->getjoinInfo('equip_class', 'item', $id);
    	if (!$equipinfo){
    		return $this->_forward('equipclasserror');
    	}
    	$equip_class_key = array_keys($equipinfo);
    	$equip_class_num = 0;
    	
    	foreach($equip_class_key as $key){
    		if (preg_match('/classid_\d+/',$key)){
    			$equip_class_num++;
    		} 
    	}
    	
    	$classlist = $this->model->getList('class', 0);
    	
    	if ($equip_class_num != count($classlist)) {
    		return $this->_forward('equipclasserror');
    	}
    	
    	$this->view->item = $equipinfo;
    	$this->view->classes = $classlist;
    }
    
    public function equipupdateAction(){
    	$params = $this->getRequest()->getParams();
    
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    	
    	$data = array(
    			'equip_class_id' => $params['equip_class_id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'updated_on' => NULL
    	);
    	
    	$class_id = 1;
    	
    	foreach($params as $key => $value){
    		
    		if (preg_match('/classid_\d+/',$key)){
    			$classid = array($key => $value);
    			$data += $classid;
    		}
    	}
    	
    	$result = $this->model->update('equip_class', $data);
    
    	$this->view->result = $result;
    	
    }
    
    public function equipprocessAction(){
    	$uploadPath = str_replace("application", "data", dirname(dirname(__FILE__))) . '/csv/';
    
    	$adapter = new Zend_File_Transfer_Adapter_Http();
    	$adapter->setDestination($uploadPath);
    
    	if (!$adapter->receive()) {
    		$messages = $adapter->getMessages();
    		echo implode("\n", $messages);
    	};
    
    	$file = $adapter->getFileName();
    
    	$loadData = "LOAD DATA local INFILE '$file' ";
    	$loadData.= "INTO TABLE equip_class FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
    
    	$loadData.= "(`item_id`";
    	
    	$classlist = $this->model->getList('class', 0);
    	$class_num = count($classlist);
    	
    	for($i=1;$i<=$class_num;$i++){
    		$loadData.=",`classid_$i`";
		}
    				
    	$loadData.= ")";
    	
    	$result = $this->model->load('equip_class', $loadData);
    
    	$this->view->row = $result;
    	$this->view->title = 'アップロード成功';
    
    }
    
    public function equipdownloadAction(){
    	$recordset = $this->model->getAllList('equip_class');
    	CsvCreate('equip_class', $recordset);
    
    }
    
    public function equipclasserrorAction(){
    	
    }
    
//------------ inventory module ------------
    public function inventorylistAction(){
    	$this->logincheck('admin');
    	
    	$this->view->search_item_id = null;
    	$this->view->search_item_name = null;
    	$this->view->search_item_name = null;
    	$this->view->search_user_data_id = null;
    	$this->view->search_user_name = null;
    	$this->view->search_email = null;
    	$this->view->search_weapon_type = '99';
    
    	$params = $this->getRequest()->getParams();
    	$join_column = array(array('item_name', 'power', 'hit_chance', 'special_chance', 
    			'weight', 'durability', 'weapon_level', 'weapon_type', 'price', 
    			'description'), array('user_data_id', 'user_name'));
    	$join_array = array('item', 'user_data');
    	 
    	if(!array_key_exists('search_item_id', $params) &&
    	!array_key_exists('search_item_name', $params) &&
    	!array_key_exists('search_weapon_type', $params) &&
    	!array_key_exists('search_user_data_id', $params) &&
    	!array_key_exists('search_user_name', $params) &&
    	!array_key_exists('search_email', $params)){
    		 
    		$items = $this->model->JoinList('equip', $join_column, $join_array, 'exist_flag', 1);
    		 
    	} else {
    		$andflag = false;
    		$where = '';
    		 
    		if(!empty($params['search_item_id'])){
    			$where = $where . "item_id = $params[search_item_id]";
    			$andflag = true;
    			 
    			$this->view->search_item_id = $params['search_item_id'];
    			 
    		}
    
    		if(!empty($params['search_item_name'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    			 
    			$where = $where . "item_name LIKE '%$params[search_item_name]%'";
    			$andflag = true;
    			 
    			$this->view->search_item_name = $params['search_item_name'];
    			 
    		}
    		 
    		if($params['search_weapon_type'] != '99'){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    			 
    			$where = $where . "weapon_type = $params[search_weapon_type]";
    			$andflag = true;
    			 
    			$this->view->search_weapon_type = $params['search_weapon_type'];
    			 
    		}
    		
    		if(!empty($params['search_user_data_id'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    			
    			$where = $where . "user_data_id = $params[search_user_data_id]";
    			$andflag = true;
    		
    			$this->view->search_user_data_id = $params['search_user_data_id'];
    		
    		}
    		
    		if(!empty($params['search_user_name'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    		
    			$where = $where . "user_name LIKE '%$params[search_user_name]%'";
    			$andflag = true;
    		
    			$this->view->search_item_name = $params['search_item_name'];
    		
    		}
    		 
    		if(!empty($params['search_email'])){
    			if ($andflag){
    				$where = $where . " AND ";
    			}
    		
    			$where = $where . "email LIKE '%$params[search_email]%'";
    			$andflag = true;
    		
    			$this->view->search_email = $params['search_email'];
    		
    		}
    		 
    		if(empty($where)) {
    			$items = $this->model->JoinList('equip', $join_array, 'exist_flag', 1);
    		} else {
    			$items = $this->model->JoinSearch('equip', $join_array, 'exist_flag', 1, $where);
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
    	$this->view->title = 'アイテム一覧';
    	$this->view->inventorysearch = dirname(dirname(__FILE__)) . '/views/admin/inventorysearch.tpl';
    
    }
    
    public function inventoryeditAction(){
    	$id = $this->getRequest()->id;
    
    	$iteminfo = $this->model->getInfo('item', $id);
    
    	$this->view->item = $iteminfo;
    }
    
    public function inventoryupdateAction(){
    	$params = $this->getRequest()->getParams();
    
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	if ($params['item_name'] != $params['original_name'] ||
    	$params[item_id] != $params['priginal_id']){
    		$ndc1 = $this->model->NameDuplicateCheck('item', 'item_id', $params['item_id']);
    		$ndc2 = $this->model->NameDuplicateCheck('item', 'item_name', $params['item_name']);
    		if (!$ndc1 || !$ndc2){
    			return $this->_forward('error');
    		}
    	}
    
    	$data = array(
    			'item_id' => $params['item_id'],
    			'item_name' => $params['item_name'],
    			'power' => $params['power'],
    			'hit_chance' => $params['hit_chance'],
    			'special_chance' => $params['special_chance'],
    			'weight' => $params['weight'],
    			'durability' => $params['durability'],
    			'weapon_level' => $params['weapon_level'],
    			'weapon_type' => $params['weapon_type'],
    			'price' => $params['price'],
    			'attack_speed' => $params['attack_speed'],
    			'hp_plus' => $params['hp_plus'],
    			'str_plus' => $params['str_plus'],
    			'mag_plus' => $params['mag_plus'],
    			'skl_plus' => $params['skl_plus'],
    			'spd_plus' => $params['spd_plus'],
    			'luk_plus' => $params['luk_plus'],
    			'def_plus' => $params['def_plus'],
    			'mdf_plus' => $params['mdf_plus'],
    			'bod_plus' => $params['bod_plus'],
    			'magic_attack' => $params['magic_attack'],
    			'double_attack' => $params['double_attack'],
    			'double_exp' => $params['double_exp'],
    			'absorb_attack' => $params['absorb_attack'],
    			'self_damage' => $params['self_damage'],
    			'armor_efficacy' => $params['armor_efficacy'],
    			'knight_efficacy' => $params['knight_efficacy'],
    			'flying_efficacy' => $params['flying_efficacy'],
    			'description' => $params['description'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'updated_on' => NULL
    	);
    	$result = $this->model->update('item', $data);
    
    	$this->view->result = $result;
    }
    
    public function inventorycreateAction(){
    
    }
    
    public function inventoryinsertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$ndc1 = $this->model->NameDuplicateCheck('item', 'item_id', $params['item_id']);
    	$ndc2 = $this->model->NameDuplicateCheck('item', 'item_name', $params['item_name']);
    	 
    	if ($ndc1 && $ndc2){
    		$data = array(
    				'item_id' => $params['item_id'],
    				'item_name' => $params['item_name'],
    				'power' => $params['power'],
    				'hit_chance' => $params['hit_chance'],
    				'special_chance' => $params['special_chance'],
    				'weight' => $params['weight'],
    				'durability' => $params['durability'],
    				'weapon_level' => $params['weapon_level'],
    				'weapon_type' => $params['weapon_type'],
    				'price' => $params['price'],
    				'attack_speed' => $params['attack_speed'],
    				'hp_plus' => $params['hp_plus'],
    				'str_plus' => $params['str_plus'],
    				'mag_plus' => $params['mag_plus'],
    				'skl_plus' => $params['skl_plus'],
    				'spd_plus' => $params['spd_plus'],
    				'luk_plus' => $params['luk_plus'],
    				'def_plus' => $params['def_plus'],
    				'mdf_plus' => $params['mdf_plus'],
    				'bod_plus' => $params['bod_plus'],
    				'magic_attack' => $params['magic_attack'],
    				'double_attack' => $params['double_attack'],
    				'double_exp' => $params['double_exp'],
    				'absorb_attack' => $params['absorb_attack'],
    				'self_damage' => $params['self_damage'],
    				'armor_efficacy' => $params['armor_efficacy'],
    				'knight_efficacy' => $params['knight_efficacy'],
    				'flying_efficacy' => $params['flying_efficacy'],
    				'description' => $params['description'],
    				'last_editer' => get_object_vars($loginid)['admin_name'],
    				'created_on' => NULL,
    				'updated_on' => NULL
    		);
    
    		$result = $this->model->insert('item', $data);
    
    		$equip_data = array(
    				'item_id' => $params['item_id']
    		);
    		$this->model->insert('equip_class', $equip_data);
    
    		$this->view->result = $result;
    	} else {
    		return $this->_forward('error');
    	}
    }
    
    public function inventorydleteAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'item_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 1,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->update('item', $data);
    	$this->view->result = $result;
    }
    
    public function inventorydeletedAction(){
    	$this->logincheck('admin');
    	$items = $this->model->getList('item', 1);
    
    	$this->view->items = $items;
    	$this->view->title = '削除済みアイテムリスト';
    }
    
    public function inventoryrevertAction(){
    	$params = $this->getRequest()->getParams();
    	$loginid = Zend_Auth::getInstance()->getIdentity();
    
    	$data = array(
    			'item_id' => $params['id'],
    			'last_editer' => get_object_vars($loginid)['admin_name'],
    			'delete_flag' => 0,
    			'updated_on' => NULL
    	);
    
    	$result = $this->model->update('item', $data);
    	$this->view->result = $result;
    }
    
    public function inventoryuploadAction(){
    	$this->logincheck('admin');
    	$this->view->title = 'クラスアップロード';
    }
    
    public function inventoryprocessAction(){
    	$uploadPath = str_replace("application", "data", dirname(dirname(__FILE__))) . '/csv/';;
    
    	$adapter = new Zend_File_Transfer_Adapter_Http();
    	$adapter->setDestination($uploadPath);
    
    	if (!$adapter->receive()) {
    		$messages = $adapter->getMessages();
    		echo implode("\n", $messages);
    	};
    
    	$file = $adapter->getFileName();
    
    	$loadData = "LOAD DATA local INFILE '$file' ";
    	$loadData.= "INTO TABLE item FIELDS TERMINATED BY ',' ENCLOSED BY '\"' IGNORE 1 LINES ";
    
    	$loadData.= "(`item_id`,`item_name`,`power`,`hit_chance`,`special_chance`,`weight`,
    				`durability`,`weapon_level`,`weapon_type`,`price`,`attack_speed`,
    				`hp_plus`,`str_plus`,`mag_plus`,`skl_plus`,`spd_plus`,`luk_plus`,
    				`def_plus`,`mdf_plus`,`bod_plus`,`magic_attack`,`double_attack`,
    				`double_exp`,`absorb_attack`,`self_damage`,`armor_efficacy`,`knight_efficacy`,
    				`flying_efficacy`,`description`)";
    
    	$result = $this->model->load('item', $loadData);
    
    	$this->view->row = $result;
    	$this->view->title = 'アップロード成功';
    
    }
    
    public function inventoryownloadAction(){
    	$recordset = $this->model->getAllList('item');
    	CsvCreate('item', $recordset);
    
    }
    
    public function errorAction(){
    	
    }
    
    public function classerrorAction(){
    	 
    }
}
?>
