<?php
    class TestController extends Zend_Controller_Action  {
        public function indexAction(){
        }
        function helloAction(){
            $this->view->name = 'ニンジャスレイヤー';
        }
    }