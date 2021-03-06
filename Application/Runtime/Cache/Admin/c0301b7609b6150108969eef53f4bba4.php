<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin gallery Examples</title>
  <meta name="description" content="这是一个 gallery 页面">
  <meta name="keywords" content="gallery">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="Public/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/Public/assets/css/admin.css">
</head>
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
        <div class="am-fl am-cf">
          <strong class="am-text-primary am-text-lg">相册</strong> / <small>Gallery</small>
        </div>
      </div>

      <hr>

      <ul class="am-avg-sm-2 am-avg-md-4 am-avg-lg-6 am-margin gallery-list">
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-1.jpg" alt=""/>
            <div class="gallery-title">远方 有一个地方 那里种有我们的梦想</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt=""/>
            <div class="gallery-title">君可见漫天落霞</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-3.jpg" alt=""/>
            <div class="gallery-title">此刻鲜花满天幸福在身边</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt=""/>
            <div class="gallery-title">你当我是浮夸吧</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-4.jpg" alt=""/>
            <div class="gallery-title">远方 有一个地方 那里种有我们的梦想</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-1.jpg" alt=""/>
            <div class="gallery-title">斜阳染幽草 几度飞红</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-1.jpg" alt=""/>
            <div class="gallery-title">远方 有一个地方 那里种有我们的梦想</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-3.jpg" alt=""/>
            <div class="gallery-title">你当我是浮夸吧</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-3.jpg" alt=""/>
            <div class="gallery-title">远方 有一个地方 那里种有我们的梦想</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt=""/>
            <div class="gallery-title">君可见漫天落霞</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-3.jpg" alt=""/>
            <div class="gallery-title">你当我是浮夸吧</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt=""/>
            <div class="gallery-title">君可见漫天落霞</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
        <li>
          <a href="#">
            <img class="am-img-thumbnail am-img-bdrs" src="http://s.amazeui.org/media/i/demos/bing-1.jpg" alt=""/>
            <div class="gallery-title">斜阳染幽草 几度飞红</div>
            <div class="gallery-desc">2375-09-26</div>
          </a>
        </li>
      </ul>

      <div class="am-margin am-cf">
        <hr/>
        <p class="am-fl">共 15 条记录</p>
        <ol class="am-pagination am-fr">
          <li class="am-disabled"><a href="#">&laquo;</a></li>
          <li class="am-active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">&raquo;</a></li>
        </ol>
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
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>