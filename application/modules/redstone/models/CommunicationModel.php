<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class Redstone_CommunicationModel
{
	private $bm;

	public function __construct()
	{
		$this->bm = new BaseModel();
	}

	public function getCommunication($parent, $children, $image)
	{
		$select = ['communication_id', 'member_id', 'title', 'message_number'];
		$childrenSelect = ['communication_child_id', 'child_res_from', 'child_member_id', 'message', 'image_number', 'parent_flag', 'delete_flag', 'updated_on'];
		$imageSelect = ['communication_from_id', 'image_name', 'thumbnail_name', 'delete_flag'];
		$memberSelect = ['name', 'image'];
		$base = [[$parent, 'communication_id'], [$children, 'communication_child_id'], [$children, 'child_member_id']];
		$join[] = [$children, 'communication_id', $childrenSelect];
		$join[] = [$image, 'communication_from_id', $imageSelect];
		$join[] = ['member', 'member_id', $memberSelect];
		$sort = 'communication_parent.updated_on DESC';
		$where = 'communication_parent.delete_flag = 0 and communication_children.delete_flag = 0';
		$stmt = $this->bm->getSearchSortJoin($base, $join, $select, $where, $sort, null);

		return $stmt;
	}

	public function createThread($table, $params, $member)
	{
		$insert = [
			'member_id' => $member->member_id,
			'title' => $params['title'],
			'message_number' => 1,
			'created_on' => date('c'),
			'updated_on' => date('c')
		];
		$this->bm->insert($table, $insert);

		return true;
	}

	public function getMaxID($table, $primal)
	{
		$maxid = $this->bm->getMaxID($table, $primal);

		return $maxid;
	}

	public function insertMessage($table, $params, $member, $parent_id, $image_number, $parent_flag)
	{
		$insert = [
			'communication_id' => $parent_id,
			'child_res_from' => $params['reply_from'],
			'child_member_id' => $member->member_id,
			'message' => $params['message'],
			'image_number' => $image_number,
			'parent_flag' => $parent_flag,
			'created_on' => date('c'),
			'updated_on' => date('c')
		];
		$this->bm->insert($table, $insert);
		return true;
	}

	public function addChildNumber($table, $id)
	{
		$select = ['message_number'];
		$where = ['communication_id', $id];
		$maxid = $this->bm->getInfo($table, $select, $where, null);
		$newid = $maxid['message_number'] + 1;

		$update = [
			'communication_id' => $id,
			'message_number' => $newid,
			'updated_on' => date('c')
		];

		$this->bm->update($table, $update);
	}

	public function updateMessage($table, $params, $id) {
		$update = [
			'communication_child_id' => $id,
			'message' => $params['message'],
			'updated_on' => date('c')
		];
		$this->bm->update($table, $update);

		return true;
	}

	public function deleteMessage($table, $params, $id) {
		$update1 = [
			'communication_child_id' => $params['id'],
			'delete_flag' => 1,
			'updated_on' => $id
		];
		$this->bm->update($table, $update1);

		$select1 = ['communication_id'];
		$where1 = ['communication_child_id', $params['id']];
		$result = $this->bm->getInfo($table, $select1, $where1, null);

		$select2 = ['message_number'];
		$where2 = ['communication_id', $result['communication_id']];
		$stmt = $this->bm->getInfo('communication_parent', $select2, $where2, null);

		$update2 =[
			'communication_id' => $result['communication_id'],
			'message_number' => $stmt['message_number'] - 1
		];
		$this->bm->update('communication_parent', $update2);
	}

	public function getMessage($table, $id) {
		$select = ['message'];
		$where = ['communication_child_id', $id];
		$stmt = $this->bm->getInfo($table, $select, $where, null);

		return $stmt;
	}


	public function imageUpload($table, $message_id, $imageName, $id)
	{
		$insert = array(
			'communication_from_id' => $message_id,
			'member_id' => $id,
			'image_name' => $imageName,
			'thumbnail_name' => $imageName,
			'updated_on' => date('c')
		);

		$this->bm->insert($table, $insert);

		return true;
	}

	public function getMaxChild($table)
	{
		return $this->bm->getMaxID($table, 'communication_child_id');
	}

	public function getImageMaxNumber($table)
	{
		return $this->bm->getMaxID($table, 'communication_image_id');
	}

	public function setImage($table, $number, $id)
	{
		$update = [
			'communication_child_id' => $id,
			'image_number' => $number,
			'updated_on' => date('c')
		];

		$this->bm->update($table, $update);
		return true;
	}

	public function deleteImage($table, $params, $id)
	{
		$update = array(
			'member_id' => $id,
			'name' => $params['name'],
			'class' => $params['class'],
			'title' => $params['title'],
			'self_introduction' => $params['self_introduction'],
			'image' => null,
			'updated_on' => date('c')
		);

		$this->bm->update($table, $update);

		return true;
	}
}