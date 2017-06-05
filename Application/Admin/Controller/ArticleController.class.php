<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
		$id=I('get.id');
		$Article=M('Article');
		$db=M('Type');
		$article=$Article->where(array('id'=>$id))->find();
		$rows=$db->select();
		$this->assign('data',$rows);
		$this->assign('article',$article);
       $this->display();
    }
	public function add(){//编辑文章
		$Article=D('Article');
		$data=$Article->create();
		if(!$data){
			$this->error($Article->getError());
		}else{
			if($_FILES['upfile']['name']!=''){
				$upload= new \Think\Upload();
				$upload->maxSize = 2*1024*1024;
				$upload->exts	=array('jpg','png','jpeg');
				$path=realpath(__ROOT__);
				$upload->rootPath=$path.'/Public/images/';
				$upload->savePath='Article';
				$info=$upload->upload();
				if($info){//文件上传成功
					//处理图像
					$img=new \Think\Image();
					$imgsrc="{$path}/Public/images/{$info['upfile']['savepath']}{$info['upfile']['savename']}";
					$img->open($imgsrc);
					$smallimg="{$path}/Public/images/{$info['upfile']['savepath']}small_{$info['upfile']['savename']}";
					$middleimg="{$path}/Public/images/{$info['upfile']['savepath']}middle_{$info['upfile']['savename']}";
					//$bigimg="{$path}/Public/images/{$info['upfile']['savepath']}big_{$info['upfile']['savename']}";
					$img->thumb(200,200,3)->save($middleimg);
					$img->thumb(100,100,3)->save($smallimg);
					//$img->thumb(800,800,3)->save($bigimg);
					$data['imgsrc']="/Public/images/{$info['upfile']['savepath']}size_{$info['upfile']['savename']}";
					$id=I('get.id');
					if($id==''){//id为空则是增加博文
						$data['time']=time();
						$Article->add($data);
						$this->success('博文发表成功');
					}else{//id不为空则是修改博文内容
						$data['time']=time();
						$Article->where(array('id'=>$id))->save($data);
						$this->success('修改博文成功');
					}
				}else{//文件上传失败
					$this->error($info->getError());
				}
			}
			else{$this->error('请选择图片');}
		}
	}
	public function editArticle(){//文章列表
		$Article=M('Article');
		$Type=M('Type');
		$article=$Article->select();
		$count=$Article->count();//分页
		$page=new \Think\Page($count,4);
		$links=$page->show();
		$article=$Article->limit($page->firstRow,$page->listRows)->select();
		$data=array();
		foreach($article as $val){
			$type=$Type->where(array('id'=>$val['type']))->find();
			$val['typename']=$type['arttype'];
			$data[]=$val;
		}
		$this->assign('data',$data);
		$this->assign('link',$links);
		$this->display();
	}
	public function loop(){//加入到轮播中
		header('content-type:text/html;charset=utf8');
		$id=I('get.id');
		$article=M('Article');
		$row=$article->where(array('id'=>$id))->find();
		//$Type=M('Type');
		//$type=$Type->where(array('id'=>$row['type']))->find();
		//$row['typename']=$type['arttype'];
		$articleid=$row['id'];
		$time=time();
		$data=array('articleid'=>$articleid,'time'=>time());
		$Loop=M('Loop');
		if($Loop->add($data)){
			$this->success('成功加入轮播');
		}else{
			$this->error('加入轮播失败');
		}
	}
	public function loopArticle(){//文章轮播列表
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
		$this->assign('data',$val);
		$this->display();
	}
	public function delete($id){//删除文章
		$Article=M('Article');
		$Article->where(array('id'=>$id))->delete();
		$loop=M('Loop');
		$res=$loop->where(array('articleid'=>$id))->find();
		if($res){
			$loop->where(array('articleid'=>$id))->delete();
		}
		$this->success('删除成功');
	}
	public function loopDelete($id){//删除轮播文章
		$loop=M('Loop');
		$loop->where(array('id'=>$id))->delete();
		$this->success('删除成功');
	}
	public function editLoop($id){
		$loop=M('Loop');
		$row=$loop->where(array('id'=>$id))->find();
		$this->assign('data',$row);
		$this->display();
	}
	public function modifyLoop($id){//修改轮播信息
		$Loop=M('Loop');
		$data=$Loop->create();
		$data['time']=time();
		$res=$Loop->where(array('id'=>$id))->save($data);
		if($res){
			$this->success('修改成功',U('Article/loopArticle'));
		}else{
			$this->error('修改失败');
		}
	}
	public function imgSave(){//保存轮播图片
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
}
