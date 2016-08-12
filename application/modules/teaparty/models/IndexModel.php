<?php
require_once ('tools/tools.php');
require_once ('tools/BaseModel.php');

class IndexModel {
    private $table;
    private $bm;

    public function __construct() {
        $this->bm = new BaseModel();
    }

    public function getTwitterID(&$table, &$login_info) {
    	$select = array('twitter_id');
    	$where = array('twitter_id', $login_info['user_id']);
    	$stmt = $this->bm->getInfo($table, $select, $where, null);
    	
    	if ($stmt) {
    		$result = $stmt;
    	} else {
    		$result = null;
    	}
    	
    	return $result;
    }
    
    public function getParticipants(&$table, &$times) {
        $select = array('tea_party_id', 'entry_name', 'twitter_id', 'screen_name', 'show_flag', 'interest', 'self_introduction');
        $where = "tea_party_times = $times";
        $sort = 'tea_party_id ASC';
        $result = $this->bm->searchList($table, $where, $select, $sort);

        return $result;
    }
    
    public function getStatus(&$table, &$times) {
        $select = array('start_datetime', 'place', 'description', 'status');
        $where = array('tea_party_times', $times);
        $result = $this->bm->getInfo($table, $select, $where, null);
        
        return $result;
    }

    public function getInfo(&$table, &$id) {
    	$select = array('tea_party_id', 'entry_name', 'twitter_id', 'screen_name', 'show_flag', 'interest', 'self_introduction');
    	$where = array('tea_party_id', $id);
    	$result = $this->bm->getInfo($table, $select, $where, null);
    	
    	return $result;
    }
    
    public function participantsUpdate(&$table, &$entry_info, $admin){
        $update = array(
        		'tea_party_id' => $entry_info['tea_party_id'],
        		'entry_name' => $entry_info['entry_name'],
        		'screen_name' => $entry_info['screen_name'],
        		'show_flag' => $entry_info['show_flag'],
        		'interest' => $entry_info['interest'],
        		'self_introduction' => $entry_info['self_introduction']
        );
      	
        if ($admin == 1) {
        	$update += array('twitter_id' => $entry_info['twitter_id']);
        }
        $result = $this->bm->update($table, $update);
        
        return $result;
    }
    
    public function participantsInsert(&$table, &$entry_info, $party_times) {
    	$insert = array(
    			'entry_name' => $entry_info['entry_name'],
    			'tea_party_times' => $party_times,
    			'twitter_id' => $entry_info['twitter_id'],
    			'screen_name' => $entry_info['screen_name'],
    			'show_flag' => $entry_info['show_flag'],
    			'interest' => $entry_info['interest'],
    			'self_introduction' => $entry_info['self_introduction']
    	);
    	$result = $this->bm->insert($table, $insert);
    	
    	return $result;
    }
    
    public function adminUpdate(&$table, &$entry_info) {
    	$update = array(
    			'tea_party_id' => $entry_info['tea_party_id'],
    			'entry_name' => $entry_info['entry_name'],
    			'screen_name' => $entry_info['screen_name'],
    			'show_flag' => $entry_info['show_flag'],
    			'interest' => $entry_info['interest'],
    			'self_introduction' => $entry_info['self_introduction']
    	);
    	
    	$result = $this->bm->update($table, $udpate);
    	
    	return $result;
    }
    
    public function openPartyTimes($table, $status) {
        $select = array('tea_party_status_id');
        $where = "status = $status";
        $result = $this->bm->searchList($table, $where, $select, null);
        
        return $result;
    }
    
    public function maxPartyTimes($table, $column) {
        $result = $this->bm->getMaxID($table, $column);
        
        return $result;
    }
    
    public function partyTimesInsert($table, $status, $max_times) {
        $insert = array(
    			'tea_party_times' => $max_times,
    			'status' => $status,
                'created_on' => null,
                'updated_on' => null
    	);
    	$result = $this->bm->insert($table, $insert);
    	
    	return $result;
    }
    
    public function partyTimesUpdate($table, $status, $party_times) {
        $update = array(
    			'tea_party_times' => $party_times,
    			'status' => $status,
                'created_on' => null,
                'updated_on' => null
    	);
    	$result = $this->bm->update($table, $update);
    	
    	return $result;
    }
    
    public function currentPartyTimes($table, $column) {
        $select = array('tea_party_times');
        $where = array('status', $column);
    	$result = $this->bm->getInfo($table, $select, $where, null);
    	
    	return $result;
    }
    
    public function partyInfoUpdate ($table, $params) {
        $update = array(
                'tea_party_times' => $params['tea_party_times'],
                'start_datetime' => $params['start_datetime'],
                'place' => $params['place'],
                'description' => $params['description'],
                'updated_on' => null
        );
        
        $result = $this->bm->update($table, $update);
        
        return $result;
    }
    
}