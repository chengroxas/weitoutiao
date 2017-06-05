<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
   public function _initialize(){
	    $this->nav();
	    $this->hot();
	    $appid="361124507";
		$secret="ba2d28b26bf1951a5ff2133267ca05a4";
		$preview=$_SERVER['PATH_INFO'];
		$redirt_url="http://wx.faquwen.com/?backurl=http://www.weitoutiao.org/home/user/login?preview={$preview}".urlencode("&");
		$auth_url="https://api.weibo.com/oauth2/authorize?client_id={$appid}&response_type=code&redirect_uri=".urlencode($redirt_url);
		$this->assign('url',$auth_url);
	   
	}
	
	public function nav(){
		$type=M('Type');
	    $rows=$type->order('artnum')->select();
	    $this->assign('list',$rows);
	}
	
	public function hot(){
		$Article=M('Article');
		$hot=$Article->order('viewtime desc')->limit(0,6)->select();
		$this->assign('hot',$hot);
	}
}
