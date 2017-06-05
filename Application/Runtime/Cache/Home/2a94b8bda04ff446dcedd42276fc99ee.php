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
  <link rel="stylesheet" href="/Public/css/index.css" />
  <link rel="stylesheet" href="/Public/css/hot.css" />
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
	#showtitle li img{opacity:1;}
	#showtitle li div{background-color:rgba(127,127,127,0.9);}
	#showtitle li p{color:#FFFFFF;position:absolute;top:97px;left:88px;}
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
  <div class="am-u-md-9">
		<!---图片轮播---->
<?php if($type < '2' ): ?><div data-am-widget="slider" class="am-slider am-slider-c2" data-am-slider='{&quot;directionNav&quot;:false}' >
  <ul class="am-slides">
	  <?php if(is_array($loop)): foreach($loop as $key=>$picture): ?><li>
			 <?php if($picture["loopimg"] == '0' ): ?><a href="/home/Article/index?id=<?php echo ($picture["articleid"]); ?>"><img src="<?php echo str_replace('size','middle',$picture['imgsrc']);?>" style="height:400px"></a>
			<?php else: ?>
				<a href="/home/Article/index?id=<?php echo ($picture["articleid"]); ?>"><img src="<?php echo ($picture['loopimg']); ?>" style="height:400px;position:center"></a><?php endif; ?>
            <div class="am-slider-desc"><?php echo ($picture['title']); ?></div>
          </li><?php endforeach; endif; ?>
      
     
  </ul>
</div><?php endif; ?>
<!---图片轮播---->
    <hr class="am-article-divider blog-hr">
<!----图片画廊--->
  <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3
  am-avg-md-3 am-avg-lg-3 am-gallery-bordered" data-am-gallery="{  }" >
  <?php if(is_array($data)): foreach($data as $key=>$list): ?><li>
        <div class="am-gallery-item">
            <a href="<?php echo U('Article/index',array('type'=>$list['type'],'id'=>$list['id']));?>" class="">
              <img src="<?php echo str_replace('size','middle',$list['imgsrc']);?>"  alt="远方 有一个地方 那里种有我们的梦想"/>
                <h3 class="am-gallery-title"><?php echo ($list['title']); ?></h3>
                <div class="am-gallery-desc"><?php echo (date('Y-m-d H:i',$list['time'])); ?></div>
            </a>
        </div>
      </li><?php endforeach; endif; ?>  
  </ul>
	<!-------图片画廊------>
  </div>

  <div class="am-u-md-3 blog-sidebar">
    <div class="am-panel-group">
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">关注我们</div>
        <div class="am-panel-bd">
 <ul data-am-widget="gallery" class="am-gallery am-avg-sm-3 center
  am-avg-md-3 am-avg-lg-3 am-gallery-default" data-am-gallery="{ pureview: true }" >
      <li>
        <a href="##" class="am-icon-btn am-primary am-icon-weixin"></a><div>微信</div>
      </li>
      <li>
        <a href="##" class="am-icon-btn am-primary am-icon-qq"></a><div>QQ</div>
      </li>
      <li>
        <a href="##" class="am-icon-btn am-primary am-icon-twitter"></a><div>Twiter</div>
      </li>
    
  </ul>

          <!--- <ul class="third-log">
				<li><div class="weixin"></div><div>微信公众</div></li>
				<li><div class="xinlang"></div><div>新浪微博</div></li>
				<li><div class="qq"></div><div>QQ公众号</div></li>
			</ul>---->
        </div>
		<div style="text-align:center;">
			<img src="/Public/images/erweima.png" style="width:163px;"/>
			<div>微头条APP下载</div>
		</div>
      </section>
		
	<section class="am-panel am-panel-default">
        <div class="am-panel-hd">热门</div>
         <ul  id="showtitle" data-am-widget="gallery" class="am-gallery am-avg-sm-1 am-avg-md-1 am-avg-lg-1 am-gallery-overlay" data-am-gallery="{ pureview: true }" >
		  <?php if(is_array($hot)): foreach($hot as $key=>$list): ?><li >
				<div class="am-gallery-item" >
					<div >
						<p></p>
						<a href="<?php echo U('Article/index',array('type'=>$list['type'],'id'=>$list['id']));?>" >
							<img  src="<?php echo str_replace('size','middle',$list['imgsrc']);?>"  alt="<?php echo ($list['title']); ?>"/>
							<input type="hidden" value="<?php echo ($list['title']); ?>"/>
						</a>
					</div>
				</div>
			  </li><?php endforeach; endif; ?>
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
<script>
	$("#showtitle li").mouseover(function(){
		var title=$(this).find('input').val();
		$(this).find('img').css('opacity','0.5');
		$(this).find('p').text(title);
	}).mouseout(function(){
		$(this).find('img').css('opacity','1');
		$(this).find('p').text('');
	});
	$("#search").click(function(){
		alert();
	})
</script>
</body>
</html>