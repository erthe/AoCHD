<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class Redstone_IndexModel {
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getNews($table) {
        $select = array('news_id', 'title', 'article', 'article', 'created_on');
	$sort = 'news_id desc';
        $stmt = $this->bm->getList($table, $select, $sort);

        return $stmt;
    }

	public function getNewMenber($table) {
		$select = array('member_id', 'name', 'class', 'created_on');
		$date = new  DateTime();
		$endDate = $date->format('Y-m-d H:i:s');
		$startDate  = $date->modify('-1 months')->format('Y-m-d H:i;s');
		$where = "created_on >= '$startDate' and created_on <= '$endDate' and delete_flag = 0";
		$sort = 'created_on desc';
		$stmt = $this->bm->searchList($table, $where, $select, $sort);
	
		return $stmt;
	}

	public function getChanger($table) {
		$select = array('member_id', 'name', 'class', 'created_on');
		$date = new  DateTime();
		$endDate = $date->format('Y-m-d H:i:s');
		$startDate  = $date->modify('-1 months')->format('Y-m-d H:i;s');
		$where = "updated_on >= '$startDate' and created_on <= '$endDate' and created_on != updated_on and delete_flag = 0";
		$sort = 'updated_on desc';
		$stmt = $this->bm->searchList($table, $where, $select, $sort);

		return $stmt;
	}

	public function getMember($table) {
		$select = array('member_id', 'name', 'class', 'title', 'self_introduction', 'image', 'auth');
		$stmt = $this->bm->getList($table, $select, null);

		return $stmt;
	}

	public function getCurrentNews($table, $id) {
		$select = array('title', 'article');
		$where = array('news_id' , $id);
		$stmt = $this->bm->getInfo($table, $select, $where, null);

		return $stmt;
	}

	public function getCurrentMember($table, $id) {
		$select = array('member_id', 'name', 'class', 'title', 'self_introduction', 'image');
		$where = array('member_id' , $id);
		$stmt = $this->bm->getInfo($table, $select, $where, null);

		return $stmt;
	}

	public function insertNews($table, $params) {
		$news = array(
			'title' => $params['title'],
			'article' => $params['article'],
			'delete_flag' => 0,
			'created_on' => null,
			'updated_on' => null
		);

		$this->bm->insert($table, $news);

		return true;
	}

	public function updateNews($table, $params) {
		$update = array(
			'title' => $params['title'],
			'article' => $params['article'],
			'updated_on' => null
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function insertMember($table, $params, $password) {
		$news = array(
			'name' => $params['name'],
			'class' => $params['class'],
			'title' => $params['title'],
			'self_introduction' => $params['self_introduction'],
			'auth' => $params['auth'],
			'password' => md5($password),
			'delete_flag' => 0,
			'created_on' => null,
			'updated_on' => null
		);

		$this->bm->insert($table, $news);

		return true;
	}

	public function updateMember($table, $params) {
		$update = array(
			'title' => $params['title'],
			'article' => $params['article'],
			'updated_on' => null
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function loginAuthentication($table, $name, $password) {
		$adapter = dbadapter();
		$params = dbconnect();

		$db = Zend_Db::factory($adapter, $params);
		$authAdapter = new Zend_Auth_Adapter_DbTable($db);
		$authAdapter->setTableName ($table)->setIdentityColumn ( 'name' )->setCredentialColumn ( 'password' )->setCredentialTreatment ( 'MD5(?) AND delete_flag = 0' );

		$authAdapter->setIdentity($name);
		$authAdapter->setCredential($password);

		$result = $authAdapter->authenticate($authAdapter);
		if ($result->isValid()) {
			$response = true;
		} else {
			$response = false;
		}

		return $response;
	}

	public function getLoginMember($table, $login_id, $login_type) {
		switch($login_type) {
			case 'google':
				$sns_type = 'google_id';
				break;

			case 'facebook':
				$sns_type = 'facebook_id';
				break;

			case 'twitter':
				$sns_type = 'twitter_id';
				break;

			default:
				return null;
		}

		$select = array('member_id', 'name', 'auth');
		$where = array($sns_type, $login_id);
		$stmt = $this->bm->getInfo($table, $select, $where, null);
		if ($stmt) {
			$result = $stmt;
		} else {
			$result = null;
		}

		return $result;
	}

	public function memberUpdate($table, $client_id, $sns, $member_id) {
		$init_data = array();
		$data = $this->setData($client_id, $sns, $init_data, $member_id);
		$result = $this->bm->update($table, $data);

		return $result;
	}

	public function getMemberID($table, $name) {
		$select = array('member_id', 'name', 'auth');
		$where = array('name', $name);
		$result = $this->bm->getInfo($table, $select, $where, null);

		return $result;
	}

	private function setData($client_id, $sns, $data, $member_id) {
		$data += array('member_id' => $member_id);
		switch($client_id) {
			case 'google':
				$data += array('google_id' => $sns);
				break;

			case 'facebook':
				$data += array('facebook_id' => $sns);
				break;

			case 'twitter':
				$data += array('twitter_id' => $sns);
				break;
			default:
				$data = null;
		}

		return $data;
	}
    
}