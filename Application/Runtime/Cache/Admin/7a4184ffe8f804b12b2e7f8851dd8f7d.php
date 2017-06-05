<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>添加文章</title>
  <meta name="description" content="这是一个 user 页面">
  <meta name="keywords" content="user">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/Public/assets/css/admin.css">
  <script src="/Public/ueditor/ueditor.config.js"></script>
  <script src="/Public/ueditor/ueditor.all.min.js"></script>
  <script src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<script>
	option={

		initialFrameHeight:500,
		autoFloatEnabled:false,
		autoHeightEnabled:false
	};
	var ue=new baidu.editor.ui.Editor(option);
	ue.render("editor");
</script>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
  <div class="am-topbar-brand">
    <strong>Amaze UI</strong> <small>后台管理模板</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> <?php echo ($manager); ?>管理员<span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
          <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
          <li><a href="<?php echo U('Login/logOff');?>"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo U('Index/index');?>"><span class="am-icon-home"></span> 首页</a></li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 页面模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="<?php echo U('User/index');?>" class="am-cf"><span class="am-icon-check"></span> 个人资料<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
			<li><a href="<?php echo U('Manage/index');?>" class="am-cf"><span class="am-icon-check"></span> 添加管理员<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
			<li><a href="<?php echo U('Manage/editManager');?>" class="am-cf"><span class="am-icon-check"></span> 编辑管理员<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
			<li><a href="<?php echo U('Article/editArticle');?>" class="am-cf"><span class="am-icon-check"></span> 博文管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
			<li><a href="<?php echo U('Article/loopArticle');?>" class="am-cf"><span class="am-icon-check"></span>轮播管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
			<li><a href="<?php echo U('Type/index');?>" class="am-cf"><span class="am-icon-check"></span>文章类别管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
            <li><a href="<?php echo U('Help/index');?>"><span class="am-icon-puzzle-piece"></span> 帮助页</a></li>
            <li><a href="<?php echo U('Gallery/index');?>"><span class="am-icon-th"></span> 相册页面<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
            <li><a href="<?php echo U('Log/index');?>"><span class="am-icon-calendar"></span> 系统日志</a></li>
            <li><a href="admin-404.html"><span class="am-icon-bug"></span> 404</a></li>
          </ul>
        </li>
        <li><a href="<?php echo U('Table/index');?>"><span class="am-icon-table"></span> 表格</a></li>
        <li><a href="<?php echo U('Form/index');?>"><span class="am-icon-pencil-square-o"></span> 表单</a></li>
        <li><a href="<?php echo U('Login/logOff');?>"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
        </div>
      </div>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-tag"></span> wiki</p>
          <p>Welcome to the Amaze UI wiki!</p>
        </div>
      </div>
    </div>
  </div>

  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="admin-content-body">
      <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加文章</strong> / <small>Personal information</small></div>
      </div>

      <hr/>

      <div class="am-g">
       

        <div class="am-u-sm-12 am-u-md-11 ">
          <form action="<?php echo U('Article/add',array('id'=>$article['id']));?>" method="post"  enctype="multipart/form-data" class="am-form am-form-horizontal">
			<div class="am-form-group">
              <label for="title" class="am-u-sm-3 am-form-label">博文标题</label>
              <div class="am-u-sm-9">
                <input type="text" id="title" name="title" placeholder="博文标题" value="<?php echo ($article['title']); ?>">
                <small>博文标题</small>
              </div>
            </div>
            <div class="am-form-group am-form-file">
				<label for="introduce"  class="am-u-sm-3 am-form-label">封面</label>
				<div class="am-u-sm-9">
					<button   type="button" class="am-btn am-btn-default am-btn-sm">
					<i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
					<input  id="doc-form-file" type="file" name="upfile" multiple="multiple">
				</div>
			</div>
            <div class="am-form-group">
              <label for="article-type" class="am-u-sm-3 am-form-label">文章类别</label>
              <div class="am-u-sm-9">
                <select  name="type" id="doc-select-1">
					<?php if(is_array($data)): foreach($data as $key=>$type): ?><option  value="<?php echo ($type['id']); ?>"><?php echo ($type['arttype']); ?></option><?php endforeach; endif; ?>
				</select>
              </div>
            </div>

            <div class="am-form-group">
              <label for="author"  class="am-u-sm-3 am-form-label">作者</label>
              <div class="am-u-sm-9">
                <input type="text" name="author" id="author"  value="<?php echo ($article['author']); ?>" placeholder="作者">
              </div>
            </div>
            
			 <div class="am-form-group">
				<label for="introduce"  class="am-u-sm-3 am-form-label">博文简介</label>
				<div class="am-u-sm-9">
					<textarea name="introduce" class="" rows="5"  id="doc-ta-1" ><?php echo ($article['introduce']); ?></textarea>
				</div>
			</div>
			
			<div class="am-form-group">
				<div class="">
					<label for="introduce"  class="am-u-sm-12 am-text-center am-form-label">博文内容</label>
				</div>
				
			</div>
			
			<div class="am-form-group">
				<div class="am-u-sm-12">
					<textarea name="content" id="editor" class="" rows="5" id="doc-ta-1"><?php echo ($article['content']); ?></textarea>
				</div>
			</div>
			
			<div class="am-form-group">
				<div class="am-u-sm-12">
					<input class="am-btn am-btn-primary am-center" type="submit" name="btn" value="添加博文"/>
				</div>
				<div id="file-list"></div>
			</div>
			
            </div>
			
            <div class="am-form-group">
              <div class="am-u-sm-9 am-u-sm-push-3">
				
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer class="admin-content-footer">
      <hr>
      <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

  </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/assets/js/amazeui.min.js"></script>
<script src="/Public/assets/js/app.js"></script>
</body>
</html>