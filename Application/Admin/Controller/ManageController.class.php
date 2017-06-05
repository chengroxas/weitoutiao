<?php
namespace Admin\Controller;
use Think\Controller;
class ManageController extends CommonController {
	public function _initialize(){
		parent::_initialize();
	}
    public function index(){
	
       $this->display();
    }
	public function addManager(){
		if(!$_POST['btn']){
			$this->error('非法操作');
		}
		$manager=$_POST['manager'];
		$pwd=$_POST['pwd'];
		$repwd=$_POST['repwd'];
		if(strlen($manager)<1){$this->error('管理员不能为空');}
		if(strlen($pwd)<1){$this->error('密码不能为空');}
		if(strlen($repwd)<1){
			$this->error('确认密码不能为空');
		}else if($repwd!=$pwd){
			$this->error('两次输入密码不同');
		}
		$db=M('Manager');
		$data=array('manager'=>$manager,'pwd'=>$pwd);
		if($db->add($data)){
			$this->success('管理员添加成功');
		}else{
			$this->error('管理员添加失败');
		}
		
	}//addManager
	
	public function editManager(){
		$db=M('Manager');
		$count=$db->count();
		$page=new \Think\Page($count,4);
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$show=$page->show();
		$rows=$db->limit($page->firstRow,$page->listRows)->order('id asc')->select();
		$this->assign('show',$show);
		$this->assign('data',$rows);
		$this->display();
	}
	public function delete($id){
		$db=M('Manager');
		$res=$db->where(array('id'=>$id))->delete();
		if($res){$this->success('删除成功');}else{$this->error('删除失败');}
	}
	
}
