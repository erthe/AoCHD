<?php
require_once ('tools/tools.php');

class BaseModel {
    /**
     * テーブルのデータを更新する(1行)
     * 主キーは必ず1番目に設定すること
     *
     * @param string $module テーブル名
     * @param array $data 更新するデータ
     * @return number
     */
    function update($module, $data) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        $primary = key(array_slice($data, 0, 1, true));
        $primaryKey = $data[$primary];
        $result = $db->update ( $module, $data, "$primary = '$primaryKey'" );

        return $result;
    }

    /**
     *
     * テーブルにデータを挿入する(1行)
     *
     * @param string $module テーブル名
     * @param array $data 挿入するデータ
     * @return number
     */
    function insert($module, $data) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        $result = $db->insert ( $module, $data );

        return $result;
    }

    /**
     *
     * テーブルからデータを削除する(1行)
     *
     * @param string $module テーブル名
     * @param array $data 削除するデータ
     * @return number
     */
    function delete($module, $data) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        $primary = $data[0];
        $primaryKey =  $data[1];
        $result = $db->delete ( $module, "$primary = $primaryKey" );

        return $result;
    }

    /**
     *
     * テーブルの内容を取得する(複数行)
     *
     * @param string $module テーブル名
     * @param array $select 表示するカラム名
     * @param string $sort カラム名, ASC/DESC
     * @return Ambigous <multitype:, multitype:mixed Ambigous <string, boolean, mixed> >
     */
    function getList($module, $select, $sort) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ();
        $sql->from ( $module, $select );
        if(! is_null( $sort ) ){
            $sql->order ( $sort );
        }
        $rows = $db->fetchAll ( $sql );
        return $rows;
    }

    /**
     *
     * テーブルの情報を限定して取得する(複数行)
     *
     * @param string $module テーブル名
     * @param string $where 検索内容
     * @param array $select 表示するカラム名
     * @param string $sort カラム名, ASC/DESC
     * @return Ambigous <multitype:, multitype:mixed Ambigous <string, boolean, mixed> >
     */
    function searchList($module, $where, $select, $sort) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ();
        $sql->from ( $module, $select );
        if(!is_null($sort)){
            $sql->order ( $sort );
        }
        $sql->where($where);
        $rows = $db->fetchAll ( $sql );

        return $rows;
    }

    /**
     *
     * テーブルの情報を限定もしくは制限して取得する(複数行)
     *
     * @param string $module テーブル名
     * @param string $where 検索内容
     * @param int $limit 取得したい行数
     * @param array $select 表示するカラム名
     * @param string $sort カラム名, ASC/DESC
     * @return Ambigous <multitype:, multitype:mixed Ambigous <string, boolean, mixed> >
     */
    function searchLimitList($module, $where, $limit, $select, $sort) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ();
        $sql->from ( $module, $select );
        if(!is_null($sort)){
            $sql->order ( $sort );
        }
        if (!is_null($where)) {
            $sql->where($where);
        }

        if (!is_null($limit)) {
            $sql->limit($limit);
        }

        $rows = $db->fetchAll ( $sql );

        return $rows;
    }

    /**
     *
     * テーブルから1件情報を取得する
     *
     * @param string $module テーブル名
     * @param array $select 表示するカラム名
     * @param array $id 主キー{'カラム名', '主キー値'}
     * @param string $command あれば
     * @return mixed
     */
    function getInfo($module, $select, $id, $command) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ();
        if (!is_null($command)) {
            array_push($select, $command);
        }
        $sql->from ( $module, $select );
        $sql->where ( "$id[0] = ?", $id[1] );
        $row = $db->fetchRow ( $sql );

        return $row;
    }

    /**
     *
     * テーブルから複数取得できる条件の最新 / 最古の情報を1件取得する
     *
     * @param string $module テーブル名
     * @param array $select 表示するカラム名
     * @param array $id 主キー{'カラム名', '主キー値'}
     * @oaram string $order ソートキー
     * @param string $command あれば
     * @return mixed
     */
    function getFirst($module, $select, $where, $order, $command = NULL) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ();
        if (!is_null($command)) {
            array_push($select, $command);
        }
        $sql->from ( $module, $select );
        $sql->where ( "$where[0] = ?", $where[1] );
        $sql->order ( $order );
        $row = $db->fetchRow ( $sql );

        return $row;
    }

    /**
     *
     * テーブルをレフトジョインする(複数テーブル対応、複数行)
     *
     * @param array $module {'テーブル名', 'ジョインするカラム名'}
     * @param array $join_table {'ジョインするテーブル名', 'カラム名'}
     * @param array $select 表示するカラム名
     * @param string $sort カラム名, ASC/DESC
     * @param string $command あれば
     * @return Ambigous <multitype:, multitype:mixed Ambigous <string, boolean, mixed> >
     */
    function JoinList($module, $join_table, $select, $sort, $command) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        $sql = new Zend_Db_Select ( $db );
        $db->select ();
        if (!is_null($command)) {
            array_push($select, $command);
        }
        $sql->from ( $module, $select );
        for($i = 0; $i < count ( $join_table ); $i ++) {
            $sql->joinLeft ( $join_table[$i][0], $join_table[$i][0].'.'.$join_table[$i][1].' = '.$module[0].'.'.$module[1] );
        }
        if(!is_null($sort)){
            $sql->order ( $sort );
        }
        $rows = $db->fetchAll ( $sql );

        return $rows;
    }

    /**
     *
     * テーブルをレフトジョインする(複数テーブル対応、1行)
     *
     * @param array $module {'テーブル名', 'ジョインするカラム名'}
     * @param array $join_table {'ジョインするテーブル名', 'ジョインに使用するカラム名', '表示するカラム名'}
     * @param array $select 表示するカラム名
     * @param array $id 主キー{'カラム名', '主キー値'}
     * @return mixed
     */
    function JoinInfo($module, $join_table, $select, $id) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ();
        $sql->from ( $module, $select );
        for($i = 0; $i < count ( $join_table ); $i ++) {
            $sql->join ( $join_table[$i][0], $join_table[$i][0].".".$join_table[$i][1].' = '.$module[0].'.'.$module[1]);
        }
        $sql->where ( "$id[0] = ?", $id[1]);
        $rows = $db->fetchRow ( $sql );

        return $rows;
    }

    /**
     *
     * テーブルをインナージョインして限定して表示する
     *
     * @param array $module {'テーブル名', 'ジョインするカラム名'}
     * @param array $join_table {'ジョインするテーブル名', 'ジョインに使用するカラム名', '表示するカラム名'}
     * @param array $select 表示するカラム名
     * @param string $where 検索内容
     * @param string $sort カラム名, ASC/DESC
     * @param string $command あれば
     * @return Ambigous <multitype:, multitype:mixed Ambigous <string, boolean, mixed> >
     */
    function getSearchSortJoin($module, $join_table, $select, $where, $sort, $command) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ();
        $sql->distinct();
        if (!is_null($command)) {
            array_push($select, $command);
        }
        $sql->from ( $module[0][0], $select );
        if (! is_null ( $where ) ) {
            $sql->where ( $where );
        }
        for($i = 0; $i < count ( $join_table ); $i ++) {
            $sql->joinLeft ( $join_table[$i][0], $join_table[$i][0].".".$join_table[$i][1].' = '.$module[$i][0].'.'.$module[$i][1], $join_table[$i][2] );
        }
        if (! is_null ( $sort )) {
            $sql->order ( $sort );
        } else {
            $sql->order ( $module[0][1] . ' ASC' );
        }
        $rows = $db->fetchAll ( $sql );
        return $rows;
    }

    function load($module, $loadData) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );

        $db->getConnection()->exec ( "truncate $module" );
        $statement = $db->getConnection()->exec ( $loadData );

        return $statement;
    }

    /**
     *
     * テーブルのデータを全件取得する
     *
     * @param テーブル名 $module
     * @return Ambigous <multitype:, multitype:mixed Ambigous <string, boolean, mixed> >
     */
    function getAllList($module) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ();
        $sql->from ( $module, '*' );
        $rows = $db->fetchAll ( $sql );

        return $rows;
    }

    /**
     *
     * テーブルの件数をカウントする
     *
     * @param string $search テーブル名
     * @param string $primal 主キー名
     * @return mixed
     */
    function getMaxID($search, $primal) {
        $adapter = dbadapter ();
        $params = dbconnect ();

        $db = Zend_Db::factory ( $adapter, $params );
        new Zend_Db_Select ( $db );
        $sql = $db->select ()->from ( $search, 'MAX(' . $primal.')' );

        $result = $result = $db->fetchRow ( $sql );
        $id = $result ['MAX('.$primal.')'];

        return $id;
    }
}