<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
	public function _initialize(){
		parent::_initialize();
	}
    public function index($id){
		$type=I('get.type');
		$Article=M('Article');
		$article=$Article->where(array('id'=>$id))->find();//先找到文章的内容
		$viewtime=array('viewtime'=>intval($article['viewtime'])+1);
		$Article->where(array('id'=>$id))->save($viewtime);//给文章浏览次数加1
		$Comment=M('Comment');
		$comment=$Comment->where(array('articleid'=>$id,'pid'=>0))->select();//根据文章id找到评论
		$data=array();
		$replydata=array();
		$i=0;
		foreach($comment as $val){
			$User=M('Wbuser');
			$user=$User->where(array('id'=>$val['userid']))->find();
			$Thump=M('Thumbs_up');
			$thump=$Thump->where(array('commentid'=>$val['id'],'status'=>1))->count();
			$val['user']=$user['user'];
			$val['logo']=$user['logo'];
			$val['liketime']=$thump;
			$data[$i]=$val;//评论的内容与评论的用户信息绑定在一起
			$reply=$Comment->where(array('pid'=>$val['id']))->select();//评论要与回复信息绑定在一起
			foreach($reply as $val){
				$user=$User->where(array('id'=>$val['userid']))->find();//回复与用户信息绑定在一起
				$val['user']=$user['user'];
				$val['logo']=$user['logo'];
				foreach($data as $row){
					if($row['id']==$val['pid']){
						$replydata[]=$val;
						$data[$i]['reply']=$replydata;
					}
				}
			}
			unset($replydata);
			$i++;
		}
		$nextarticle=$Article->order('id asc')->where("id> {$id}")->limit(0,1)->find();
		if(empty($nextarticle)){//下一篇  从第一篇开始死循环
			$nextarticle=$Article->limit(0,1)->find();
		}
		$this->assign('nextarticle',$nextarticle);
		$this->assign('comment',$data);
		$this->assign('article',$article);
		$this->assign('type',$type);
        $this->display();
    }
	public function vercode(){
		$config=array(
				'length' => 4,
				'useImgBg' =>true,
				'useCurve' =>false,
				'fontSize' =>25,
				'useNoise'=>false
				);
			$img=new \Think\Verify($config);
			$img->entry();
	}
	public function comment($id){//评论处理
		if(!IS_POST){
			$this->error('非法操作');
		}
		if(empty($_POST['content'])){
			$this->error('评论内容不能为空');
		}
		$User=M('Wbuser');
		$user=$User->where(array('user'=>$_SESSION['user']))->field('id')->find();
		$data['articleid']=$id;
		$data['time']=time();
		$data['userid']=$user['id'];
		$data['content']=$_POST['content'];
		$Comment=M('Comment');
		$res=$Comment->add($data);
		if($res){
			$this->success('评论成功');
		}else{
			$this->error('评论失败');
		}
	}
	public function reply($id){
		if(!IS_POST){
			$this->error('非法操作');
		}
		$User=M('Wbuser');
		$user=$User->where(array('user'=>$_SESSION['user']))->field('id')->find();
		$data['articleid']=$id;
		$data['pid']=$_POST['replyid'];
		$data['content']=$_POST['replycontent'];
		$data['userid']=$user['id'];
		$data['time']=time();
		$Reply=M('Comment');
		$res=$Reply->add($data);
		if($res){
			$this->success('回复成功');
		}else{
			$this->error('回复失败');
		}
	}
	public function zan(){
		$commentid=I('post.commentid');
		$User=M('Wbuser');
		$user=$User->where(array('user'=>$_SESSION['user']))->find();
		$userid=$user['id'];
		$Thump=M('Thumbs_up');
		$thump=$Thump->where(array('userid'=>$userid,'commentid'=>$commentid))->find();
		if(empty($thump)){//没有存在过创建
			$data['commentid']=$commentid;
			$data['userid']=$userid;
			$data['status']=1;
			$data['time']=time();
			$Thump->add($data);
			echo "add";
		}else{
			if($thump['status']==1){//存在并且点赞
				$data['status']=0;
				$data['time']=time();
				$Thump->where(array('userid'=>$userid,'commentid'=>$commentid))->save($data);
				echo "cancel";
			}else{//存在没点赞
				$data['status']=1;
				$data['time']=time();
				$Thump->where(array('userid'=>$userid,'commentid'=>$commentid))->save($data);
				echo "add";		
			}
		}
	}
	//收藏
	public function collect(){		
		$articleid=I('post.articleid');
		$User=M('Wbuser');
		$user=$User->where(array('user'=>$_SESSION['user']))->find();
		$userid=$user['id'];
		$Collect=M('Collect');
		$collect=$Collect->where(array('userid'=>$userid,'articleid'=>$articleid))->find();
		if(empty($collect)){//没有存在过创建
			$data['articleid']=$articleid;
			$data['userid']=$userid;
			$data['status']=1;
			$data['time']=time();
			if($Collect->add($data)){
				echo "add";
			}			
		}else{
			if($collect['status']==1){//存在并且点赞
				$data['status']=0;
				$data['time']=time();
				$Collect->where(array('userid'=>$userid,'articleid'=>$articleid))->save($data);
				echo "cancel";
			}else{//存在没点赞
				$data['status']=1;
				$data['time']=time();
				$Collect->where(array('userid'=>$userid,'articleid'=>$articleid))->save($data);
				echo "add";		
			}
		}
	}
	public function search(){
		/*if(!IS_POST){
			echo "非法操作";
		}
		if(empty($_POST['key'])){
			$this->error('请输入关键词');
		}
		$key=$_POST['key'];
		$key="喵";
		$Article=M('Article');
		$article=$Article->where("position('$key' in title)")->select();
		var_dump($article);*/
	}
}
