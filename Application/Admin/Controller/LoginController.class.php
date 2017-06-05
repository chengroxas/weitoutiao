<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
       $this->display();
    }
	public function managerLogin(){
		$manager=$_POST['manager'];
		$pwd=$_POST['pwd'];
		if(strlen($manager)<1){$this->error('管理员不能为空');}
		if(strlen($pwd)<1){$this->error('密码不能为空');}
		$db=M('Manager');
		$row=$db->where(array('manager'=>$manager))->find();
		if($row){
			if($row['pwd']==$pwd){
				$this->success('登录成功',U('Index/index'));
				$_SESSION['manager']=$manager;
			}else{
				$this->error('密码错误');
			}
		}else{
			$this->error('不存在该管理员');
		}
	}
	public function logOff(){
		$_SESSION=array();
		setcookie(session_name,'',time()-1,'/');
		session_destroy();
		$this->success('注销成功',U('Login/index'));
	}
}
