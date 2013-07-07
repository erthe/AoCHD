<?php
require_once('tools/tools.php');

class IndexModel{
    
    // テストファンクション。userテーブルの中身を全取得する。
    public function getIndexInfo(){
        $adapter = dbadapter();
        $params = dbconnect();
        
        $db = Zend_Db::factory($adapter, $params);
        $select = new Zend_Db_Select($db);
        $select = $db->select();
        $select->from('user', '*');
        $rows = $db->fetchAll($select);
        
        return $rows;
    }
}
?>
