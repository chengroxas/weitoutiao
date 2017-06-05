<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>我的评论</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="alternate icon" type="image/png" href="/Public/assets/i/favicon.png">
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
   <script src="/Public/ueditor/ueditor.config.js"></script>
  <script src="/Public/ueditor/ueditor.all.min.js"></script>
  <script src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
  <link rel="stylesheet" href="/Public/css/sidebar.css" />
  <style>
    @media only screen and (min-width: 1200px) {
      .blog-g-fixed {
        max-width: 1200px;
      }
    }

    @media only screen and (min-width: 641px) {
      .blog-sidebar {
        font-size: 1.4rem;
      }
    }

    .blog-main {
      padding: 20px 0;
    }

    .blog-title {
      margin: 10px 0 20px 0;
    }

    .blog-meta {
      font-size: 14px;
      margin: 10px 0 20px 0;
      color: #222;
    }

    .blog-meta a {
      color: #27ae60;
    }

    .blog-pagination a {
      font-size: 1.4rem;
    }

    .blog-team li {
      padding: 4px;
    }

    .blog-team img {
      margin-bottom: 0;
    }

    .blog-content img,
    .blog-team img {
      max-width: 100%;
      height: auto;
    }

    .blog-footer {
      padding: 10px 0;
      text-align: center;
    }
	
  </style>
  <script>
	option={

		initialFrameHeight:500,
		autoFloatEnabled:false,
		autoHeightEnabled:false
	};
	var ue=new baidu.editor.ui.Editor(option);
	ue.render("editor");
</script>
</head>
<body>
<header class="am-topbar am-topbar-inverse am-header-fixed" >
  <div class="am-container">
	<h1 class="am-topbar-brand">
    <img src="/Public/images/logo.png" />
  </h1>
  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav am-margin-horizontal-xl" >
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if($i < 7): if($nav["id"] == $type): ?><li class="am-active"><a href="<?php echo U('Index/index',array('type'=>$nav['id']));?>"><?php echo ($nav['arttype']); ?></a></li>
			<?php else: ?>
				<li><a href="<?php echo U('Index/index',array('type'=>$nav['id']));?>"><?php echo ($nav['arttype']); ?></a></li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
      	<li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          全部分类 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <?php if(is_array($list)): foreach($list as $key=>$nav): ?><li><a href="<?php echo U('Index/index',array('type'=>$nav['id']));?>"><?php echo ($nav['arttype']); ?></a></li><?php endforeach; endif; ?>
        </ul>
      </li>
    </ul>
	<ul class="nav-icon">
		  <li><a href="#"><i class="am-icon-edit am-icon-fw"></i>发布</a></li>
		  <li id="search"><a href="#"><i class="am-icon-search am-icon-fw"></i>搜索</a></li>
		  <li><a href="#"><i class="am-icon-tablet am-icon-fw"></i>APP</a></li>
		  <?php if($_SESSION['user']== '' ): ?><li><a href="<?php echo ($url); ?>"><i class="am-icon-user am-icon-fw"></i>登录/注册</a></li>
		  <?php else: ?>
				<li><a href="<?php echo U('Home/User/index');?>"><img class="am-round" src="<?php echo (session('logo')); ?>"/></a></li><?php endif; ?>
	</ul>
  </div>
</div>
	
</header>




<div class="am-container">
<div class="am-g am-g-fixed blog-g-fixed">
	
	<div class="am-u-md-3">
    <div class="am-panel-group">
      <section class="am-panel am-panel-default">
			<div class="user-info">
				<div class="info-wrap">
					<div class="img-wrap"></div>
					<div class="user-logo am-text-center"><img  class="am-round" src="<?php echo (session('logo')); ?>"></div>
					<div class="user-name am-text-center"><?php echo (session('user')); ?></div>
				</div>
				<div class="user-data">
					 <div class="am-panel-bd">
						 <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3 center
						  am-avg-md-3 am-avg-lg-3 am-gallery-default" data-am-gallery="{ pureview: true }" >
							  <li>
								<a class="am-icon-thumbs-o-up am-icon-md"></a><div>0</div>
							  </li>
							  <li>
								<a  class="am-icon-commenting-o am-icon-md"></a><div>0</div>
							  </li>
							  <li>
								<a  class="am-icon-share-square-o am-icon-md"></a><div>0</div>
							  </li>
						  </ul>
					</div>
				</div>
				
			</div>
			
      </section>
   <section class="am-panel am-panel-default">
        <ul class="am-list am-list-static am-list-border am-text-center sider">
			<li><a href="<?php echo U('User/publish');?>" class="am-text-truncate">发布内容</a></li>
			<li><a href="<?php echo U('User/myblog');?>" class="am-text-truncate">我的内容</a></li>			
			<li><a href="#" class="am-text-truncate">我的消息</a></li>			
			<li><a href="<?php echo U('User/mycomment');?>" class="am-text-truncate">我的评论</a></li>
			<li><a href="<?php echo U('User/mycollect');?>" class="am-text-truncate">我的收藏</a></li>			
			<li><a href="#" class="am-text-truncate">我的分享</a></li>
			<li><a href="<?php echo U('Home/User/safeOut');?>" class="am-text-truncate">退出登录</a></li>				
		</ul>
 </section>

    </div>
  </div>

	<!-- 右边--->
	<div class="am-u-md-9">
		  <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main am-table-bordered">
              <thead>
              <tr>
                 <th class="table-author am-hide-sm-only">类型</th>
                 <th class="table-author am-hide-sm-only">封面图</th>
                 <th class="table-author am-hide-sm-only">标题</th>
                 <th class="table-num">作者</th>
                 <th class="table-time">评论时间</th>
                 <th class="table-num">评论内容</th>
                 <th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
			  <?php if(is_array($data)): foreach($data as $key=>$list): ?><tr>
                <td><?php echo ($list['articletype']); ?></td>
                <?php if(is_array($list["article"])): foreach($list["article"] as $key=>$article): ?><td><img class="am-center" src="<?php echo str_replace('size','small',$article['imgsrc']);?>" /></td>
					<td class="am-hide-sm-only"><?php echo ($article['title']); ?></td>
					<td><?php echo ($article['author']); ?></td>
					<td><?php echo (date('Y-m-d H:i',$article['time'])); ?></td><?php endforeach; endif; ?>
				<td><?php echo ($list['content']); ?></td>
			
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="<?php echo U('Home/User/deleteComment',array('id'=>$list['id']));?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                    </div>
                  </div>
                </td>
              </tr><?php endforeach; endif; ?>
             
             
              </tbody>
            </table>
            <div class="am-cf">
				<!--共多少条记录--->
              <div class="am-fr page1">
             
              </div>
            </div>
            <hr />
          </form>
     </div>   
	<!----右边--->
</div>
</div>
<footer class="blog-footer">
  <p>blog template<br/>
    <small>© Copyright XXX. by the AmazeUI Team.</small>
  </p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/assets/js/amazeui.min.js"></script>
<script>
	$('#doc-form-file').change(function(){
		previewImg(this);
	});
	function previewImg(input) {
    if (input.files && input.files[0]) {
        if(input.files[0].size<2097152) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                //加入到预览图
                
				//alert(e.target.result);
				var data = {};
				data.img_src = e.target.result;
				$.post('/home/User/dopublish',data, function(ret){
					if(ret!=0){
						$('#img-view-box').attr('src', e.target.result);
						$('#imgSrc').val(ret);
					}
				});
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            input.value="";
            PromptHide('图片大小不能超出2M');
        }
    }
}
</script>
</body>
</html>