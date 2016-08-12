<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class CommunityModel {
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

	public function getLiver($table) {
		$select = array('id', 'name', 'stream_id', 'live_type');
		$where = 'delete_flag = 0';
		$stmt = $this->bm->searchList($table, $where, $select, null);

		return $stmt;
	}

	public function searchLiver($table, $name) {
		$select = array('id', 'name', 'stream_id', 'live_type');
		$where = "name like '%$name%'";
		$stmt = $this->bm->searchList($table, $where, $select, null);

		return $stmt;
	}

	public function getLivers($table, $tool) {
		$select = array('name', 'stream_id', 'live_type');
		$where = "live_type = '$tool' and delete_flag = 0";
		$stmt = $this->bm->searchList($table, $where, $select, null);

		return $stmt;
	}

	public function passwordAuth($table, $params) {
		$select = array('password');
		$where = array('password', md5($params['password']));
		$stmt = $this->bm->getInfo($table, $select, $where, null);
		if (empty($stmt)) {
			return false;
		} else {
			return true;
		}
	}

	public function getStreamInfo($table, $id) {
		$select = array('name', 'stream_id', 'live_type');
		$where = array('id' , $id);
		$stmt = $this->bm->getInfo($table, $select, $where, null);

		return $stmt;
	}

	public function streamInsert($table, $params, $pwd) {
		$update = array(
			'name' => $params['name'],
			'stream_id' => $params['stream_id'],
			'live_type' => $params['live_type'],
			'password' => md5($pwd),
			'created_on' => date('c'),
			'updated_on' => date('c')
		);

		$this->bm->insert($table, $update);

		return true;
	}

	public function streamUpdate($table, $id, $params) {
		$update = array(
			'id' => $id['id'],
			'name' => $params['name'],
			'stream_id' => $params['stream_id'],
			'live_type' => $params['live_type'],
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function streamDelete($table, $id) {
		$update = array(
			'id' => $id['id'],
			'delete_flag' => 1,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function passwordUpdate($table, $id, $params) {
		$update = array(
			'id' => $id['id'],
			'password' => md5($params['change_password2']),
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function initPassword($table, $pwd, $id) {
		$update = array(
			'id' => $id['id'],
			'password' => md5($pwd),
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}
}