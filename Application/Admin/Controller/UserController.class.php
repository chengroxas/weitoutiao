<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
	public function _initialize(){
		parent::_initialize();
	}
    public function index(){
       $this->display();
    }
}