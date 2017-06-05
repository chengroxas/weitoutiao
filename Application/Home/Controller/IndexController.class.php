<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function _initialize(){
		parent::_initialize();
	}
    public function index(){
		$type=I('get.type');
		$Article=M('Article');
		if($type==''){
			$article=$Article->where()->select();
		}else{
			$article=$Article->where(array('type'=>$type))->select();
		}
		$this->loopArticle();
		$this->assign('data',$article);
		$this->assign('type',$type);
        $this->display();
    }
    
    public function lists($type){
		$typeid=$type;
		$db=M('Article');
		$rows=$db->where(array('type'=>$typeid))->select();
		$this->assign('data',$rows);
        $this->display();
	}
	
	public function loopArticle(){//轮播的文章
		$Loop=M('Loop');
		$rows=$Loop->select();
		$Article=M('Article');
		$val=array();
		foreach($rows as $data){
			$article=$Article->where(array('id'=>$data['articleid']))->field('title,imgsrc')->find();
			$data['title']=$article['title'];
			$data['imgsrc']=$article['imgsrc'];
			$val[]=$data;
		}
		/*dump($val);
		exit();*/
		$this->assign('loop',$val);
	}
}
