<?php
namespace Admin\Controller;
use Think\Controller;
class LogController extends CommonController {
	public function _initialize(){
		parent::_initialize();
	}
    public function index(){
       $this->display();
    }
}
