<?php
namespace Admin\Controller;
use Think\Controller;
class TypeController extends CommonController {
    public function index(){
		$db=M('Type');
		$rows=$db->select();
		$this->assign('data',$rows);
		$this->display();
    }
	public function check(){
		$id=I('get.id');
		$Type=D('Type'); // 实例化User对象
		$data=$Type->create();
		if (!$data){
			 // 如果创建失败 表示验证没有通过 输出错误提示信息
			 $this->error($Type->getError());
		}else{
			 if($id==''){
			 // 验证通过 可以进行其他数据操作
			 $data['time']=time();
			 $Type->add($data);
			 $this->success('文章类别添加成功');
			}else{
				$data['time']=time();
				$Type->where(array('id'=>$id))->save();
				$this->success('文章类别修改成功');
			}
		}
	}
	public function editType(){
		$id=I('get.id');
		$Type=M('Type');
		$row=$Type->where(array('id'=>$id))->find();
		$this->assign('type',$row);
		$this->display();
	}
	
	public function delecte($id){
		$db=M('Type');
		$res=$db->where(array('id'=>$id))->delete();
		if($res){
			$this->success('删除成功');
		}
	}
}
