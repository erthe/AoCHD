<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class Redstone_MemberModel {
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

	public function getMember($table) {
		$select = array('member_id', 'name', 'class', 'title', 'self_introduction', 'image', 'auth');
		$where = 'delete_flag = 0';
		$stmt = $this->bm->searchList($table, $where, $select, null);

		return $stmt;
	}

	public function searchMember($table, $name) {
		$select = array('member_id', 'name', 'class', 'title', 'self_introduction', 'image', 'auth');
		$where = "name like '%$name%'";
		$stmt = $this->bm->searchList($table, $where, $select, null);

		return $stmt;
	}

	public function getCurrentMember($table, $id) {
		$select = array('member_id', 'name', 'class', 'title', 'self_introduction', 'image', 'auth');
		$where = array('member_id' , $id);
		$stmt = $this->bm->getInfo($table, $select, $where, null);

		return $stmt;
	}

	public function updateMember($table, $params, $editer, $id) {
		$update = array(
			'member_id' => $id,
			'name' => $params['name'],
			'class' => $params['class'],
			'title' => $params['title'],
			'self_introduction' => $params['self_introduction'],
			'editer' => $editer,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function updateAdmin($table, $params, $editer, $id) {
		$update = array(
			'member_id' => $id,
			'name' => $params['name'],
			'class' => $params['class'],
			'title' => $params['title'],
			'self_introduction' => $params['self_introduction'],
			'auth' => $params['auth'],
			'editer' => $editer,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function imageUpload($table, $imageName, $editer, $id) {
		$update = array(
			'member_id' => $id,
			'image' => $imageName,
			'editer' => $editer,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function updatePassword($table, $params, $editer, $id) {
		$update = array(
			'member_id' => $id,
			'password' => md5($params['password']),
			'editer' => $editer,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function deleteImage($table, $params, $editer, $id) {
		$update = array(
			'member_id' => $id,
			'name' => $params['name'],
			'class' => $params['class'],
			'title' => $params['title'],
			'self_introduction' => $params['self_introduction'],
			'image' => null,
			'editer' => $editer,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function deleteMember($table, $id, $editer) {
		$update = array(
			'member_id' => $id,
			'delete_flag' => 1,
			'editer' => $editer,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}

	public function initPassword($table, $pwd, $id, $editer) {
		$update = array(
			'member_id' => $id,
			'password' => md5($pwd),
			'editer' => $editer,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}
}