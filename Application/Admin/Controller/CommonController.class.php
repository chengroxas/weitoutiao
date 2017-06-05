<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
		if(empty($_SESSION['manager'])){
			$this->error('请先登录',U('Login/index'));
		}
		
		$this->assign('manager',$_SESSION['manager']);
	}
}
