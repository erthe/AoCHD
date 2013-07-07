<?php
// コンポーネントをロードする

class IndexController extends Zend_Controller_Action{
    private $model;
    
    /**
     * コンストラクタ
     */
    
    
    public function init(){
        require_once dirname(dirname(__FILE__)) . '/models/IndexModel.php';
        $this->model = new IndexModel();
        $ADMIN_TEMPLATE = dirname(dirname(__FILE__)) . '/../themes/layout/';
        $this->view->header = $ADMIN_TEMPLATE.'header.tpl';
        $this->view->footer = $ADMIN_TEMPLATE.'footer.tpl';
        
    }

    /**
     * indexアクション
     */

    public function indexAction(){
        
        $items = $this->model->getIndexInfo();
        $this->view->items = $items;

        $this->view->name = 'test';
        $this->view->title = 'インデックステスト';        
    }

}
?>