<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function _initialize(){
		parent::_initialize();
	}
    public function index(){
		if(empty($_SESSION['user'])){
			$this->error('请先登录');
		}
        $this->display();
    }
    public function login(){
		$code=I('get.code');
		$appid="361124507";
		$secret="ba2d28b26bf1951a5ff2133267ca05a4";
		$redirt_url="http://wx.faquwen.com/?backurl=http://www.weitoutiao.org/home/user/login?".urlencode("&");
		$url="https://api.weibo.com/oauth2/access_token?client_id={$appid}&client_secret={$secret}&grant_type=authorization_code&redirect_uri=".urlencode($redirt_url)."YOUR_REGISTERED_REDIRECT_URI&code={$code}";
		$token = post($url,array());
		$token =json_decode($token,true);
		
		$access_token=$token['access_token'];
		$uid=$token['uid'];//用户Uid
		
		$info_url="https://api.weibo.com/2/users/show.json?access_token={$access_token}&uid={$uid}";
		$info=get($info_url);
		if($info==false){
			die('用户信息获取失败');//获取用户信息失败
		}	
		$info=json_decode($info,true);
		$User=M('Wbuser');
		$user=$User->where(array('uid'=>$uid))->find();
		if($user['status']==1){
			$this->error('用户已经登录',U('Home/index'));
		}
		if($user==false){//为空,注册一个新账号
			$username=$info['screen_name'];
			$logo=$info['profile_image_url'];
			$data=array('uid'=>$uid,'user'=>$username,'logo'=>$logo,'status'=>1);
			$User->add($data);
		}else{//设置登录状态为1
			$data=array('status'=>1);
			$User->where(array('uid'=>$uid))->save($data);
		}
		$_SESSION['user']=$info['screen_name'];//存到session中
		$_SESSION['logo']=$info['profile_image_url'];
		$this->success('登录成功',U($preview));
	}
    public function safeOut(){//注销
		$User=M('Wbuser');
		$data=array('status'=>0);
		$res=$User->where(array('user'=>$_SESSION['user']))->save($data);
		if($res){
			$_SESSION['logo']=null;
			$_SESSION['user']=null;
			$this->success('注销成功',U('Index/index'));
		}else{
			$this->error('注销失败');
		}
	}
	public function publish(){
		$this->display();
	}
	
	public function addblog(){
		print_r($_POST);
		
	}
	public function dopublish(){
		$img_src=I('post.img_src');
		$imgname=time();
		if ( preg_match('/^(data:\s*image\/(\w+);base64,)/', $img_src, $preg_ret) )
        {
            $type = $preg_ret[2]; 
            $root = realpath(__ROOT__);
            $localFile  = "{$root}/Public/uploads/{$imgname}.{$type}"; 
            $ret = file_put_contents( $localFile, base64_decode(str_replace($preg_ret[1], '', $img_src)) );
			$imgSrc="/Public/uploads/{$imgname}.{$type}";
			echo $imgSrc;
        }else{
			echo "0";
		}
	}
	
	public function myblog(){
		$user=$_SESSION['user'];
		$Article=M('Article');
		$article=$Article->where(array('author'=>$user))->select();
		$Type=M('Type');
		$data=array();
		foreach($article as $val){
			$type=$Type->where(array('id'=>$val['type']))->find();
			$val['typename']=$type['arttype'];
			$data[]=$val;
		}
		$this->assign('article',$data);
		$this->display();
	}
	public function mycomment(){
		$user=$_SESSION['user'];
		$User=M('Wbuser');
		$userinfo=$User->where(array('user'=>$user))->find();
		$Comment=M('Comment');
		$comment=$Comment->where(array('userid'=>$userinfo['id']))->select();
		$data=array();
		foreach($comment as $val){
			$Article=M('Article');
			$article=$Article->where(array('id'=>$val['articleid']))->select();
			foreach($article as $row){
				$Type=M('type');
				$type=$Type->where(array('id'=>$row['type']))->find();
				$val['articletype']=$type['arttype'];
			}
			$val['article']=$article;
			$data[]=$val;
		}
		$this->assign('data',$data);
		$this->display();
	}
	public function mycollect(){
		$user=$_SESSION['user'];
		$User=M('Wbuser');
		$userinfo=$User->where(array('user'=>$user))->find();
		$Collect=M('Collect');
		$collect=$Collect->where(array('userid'=>$userinfo['id']))->select();
		$data=array();
		foreach($collect as $val){
			$Article=M('Article');
			$article=$Article->where(array('id'=>$val['articleid']))->select();
			foreach($article as $row){
				$Type=M('type');
				$type=$Type->where(array('id'=>$row['type']))->find();
				$val['articletype']=$type['arttype'];
			}
			$val['article']=$article;
			$data[]=$val;
		}
		$this->assign('data',$data);
		$this->display();
	}
	public function deleteComment(){
		$commentid=I('get.id');
		$Comment=M('Comment');
		$ret=$Comment->where(array('id'=>$commentid))->delete();
		if($ret){
			$this->success('评论删除成功');
		}
	}
	public function deleteCollect(){
		$collectid=I('get.id');
		$Collect=M('Collect');
		$ret=$Collect->where(array('id'=>$collectid))->delete();
		if($ret){
			$this->success('成功删除收藏');
		}
	}
	public function delectBlog(){
		
	}
}
