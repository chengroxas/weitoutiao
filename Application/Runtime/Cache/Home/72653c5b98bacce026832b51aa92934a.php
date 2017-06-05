<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Blog | Amaze UI Example</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="alternate icon" type="image/png" href="/Public/assets/i/favicon.png">
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
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
	.am-topbar{min-height:75px;background-color:#fc3;}
	.am-topbar-inverse .am-topbar-nav > li.am-active > a{background-color:#303030;}
	.am-nav-pills > li + li{margin-left:0px;}
	.am-topbar-brand, .am-topbar-nav > li > a{line-height:75px;}
	.am-topbar-inverse .am-topbar-nav > li > a:hover{color:white;background-color:#303030;}
	.am-topbar-inverse .am-topbar-nav > li > a{color:black;}
	body{background:#eee;}
	.am-gallery-bordered > li div{background:white;}
	.am-container{max-width:1010px;}
	.third-log{padding:0px;margin:20px 0 20px 0;}
	.am-panel-bd{padding:0px;}
	.blog-g-fixed{margin-top:100px;}
	.am-gallery-desc{margin-top:20px;}
	.am-gallery-bordered .am-gallery-title{font-size:1.7rem;}
	.am-slider-c2 .am-control-nav li a{border-radius: 50%;}
	header .am-container{padding-left:0px;}
	[class*="am-u-"]{padding-left:0px;}
	.nav-icon{display:inline-block;line-height:43px;margin-bottom:0px;}
	.nav-icon li{display:inline-block;color:black;float:left;margin-left:9px;}
	.nav-icon li a{color:black;}
	.center{text-align:center;}
	.aboutus{background:white;border-bottom:1px solid;}
	.am-gallery-bordered > li{padding:0px 5px 0px 0px;}
	.am-gallery-bordered .am-gallery-item{padding:0px;}
	.nav-icon{padding:0px;}
  </style>
</head>
<body>
<header class="am-topbar am-topbar-inverse am-header-fixed" >
  <div class="am-container">
	<h1 class="am-topbar-brand">
    <img src="/Public/images/logo.png" />
  </h1>
  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav am-margin-horizontal-xl" >
		<?php if(is_array($list)): foreach($list as $key=>$nav): if($key == 0): ?><li class="am-active"><a href="<?php echo U('Index/index',array('type'=>$nav['id']));?>"><?php echo ($nav['arttype']); ?></a></li>
			<?php else: ?>
				<li><a href="<?php echo U('Index/lists',array('type'=>$nav['id']));?>"><?php echo ($nav['arttype']); ?></a></li><?php endif; endforeach; endif; ?>
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
		  <li><a href="#"><i class="am-icon-search am-icon-fw"></i>搜索</a></li>
		  <li><a href="#"><i class="am-icon-tablet am-icon-fw"></i>APP</a></li>
		  <li><a href="#"><i class="am-icon-user am-icon-fw"></i>登录/注册</a></li>
	</ul>

  </div>
</div>
</header>

<div class="am-container">
<div class="am-g am-g-fixed blog-g-fixed">
  <div class="am-u-md-9">
		
<!----图片画廊--->
  <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  am-avg-md-3 am-avg-lg-3 am-gallery-bordered" data-am-gallery="{  }" >
  <?php if(is_array($data)): foreach($data as $key=>$list): ?><li>
        <div class="am-gallery-item">
            <a href="<?php echo U('Article/index',array('id'=>$list['id']));?>" class="">
              <img src="<?php echo ($list['imgsrc']); ?>"  alt="远方 有一个地方 那里种有我们的梦想"/>
                <h3 class="am-gallery-title"><?php echo ($list['title']); ?></h3>
                <div class="am-gallery-desc"><?php echo (date('Y-m-d H:i',$list['time'])); ?></div>
            </a>
        </div>
      </li><?php endforeach; endif; ?>  
  </ul>
	
  </div>

  <div class="am-u-md-3 blog-sidebar">
    <div class="am-panel-group">
     
   <section class="am-panel am-panel-default">
        <div class="am-panel-hd">正在红</div>
         <ul data-am-widget="gallery" class="am-gallery am-avg-sm-1
  am-avg-md-1 am-avg-lg-1 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
      <li>
        <div class="am-gallery-item">
            <a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>
                <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"  alt="某天 也许会相遇 相遇在这个好地方"/>
                <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="http://s.amazeui.org/media/i/demos/bing-3.jpg" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg"  alt="不要太担心 只因为我相信"/>
                <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>
            </a>
        </div>
      </li>
      <li>
        <div class="am-gallery-item">
            <a href="http://s.amazeui.org/media/i/demos/bing-4.jpg" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"  alt="终会走过这条遥远的道路"/>
                <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>
            </a>
        </div>
      </li>
  </ul>
 </section>

    </div>
  </div>

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

</body>
</html>