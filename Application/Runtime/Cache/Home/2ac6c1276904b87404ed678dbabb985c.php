<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>文章内容</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="alternate icon" type="image/png" href="/Public/assets/i/favicon.png">
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="/Public/css/articleshow.css"/>
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
  <div class="am-u-md-9" >
		
		<div class="article">
			
			<div class="detail-info am-text-center" style="border-bottom:1px solid;padding:20px 20px 0 20px">
				<h2 class="am-text-center"><?php echo ($article['title']); ?></h2>
				<span class="am-margin-horizontal-sm">作者:<?php echo ($article['author']); ?></span>
				<span class="">发布时间:<?php echo (date('Y-m-d H:i',$article['time'])); ?></span>
				<span class="am-icon-eye am-fr"><?php echo ($article['viewtime']); ?></span>
				<span  id="collect" class="am-icon-star-o am-fr" onclick="collect()">收藏</span>
				<input id="articleid" type="hidden" value="<?php echo ($article['id']); ?>" />
			</div>
			
			<div class="article-content">
				<?php echo htmlspecialchars_decode($article['content']);?>
			 </div>
		</div>
	<!---上下篇---->

	<div class="am-container next-box">
		<div class="am-g">
		  <img class="" style="float:left;width:350px;height:150px"src="<?php echo str_replace('size','middle',$nextarticle['imgsrc']);?>" alt=""/>
			<div style="float:left;max-width:350px;">
				<a href="<?php echo U('Article/index',array('type'=>$nextarticle['type'],'id'=>$nextarticle['id']));?>">下一节精彩内容</a>
				<h3><?php echo ($nextarticle['title']); ?></h3>
				<p></p>
			</div>
		</div>
	</div>
	<!---上下篇---->
	<!-----评论区---->
	<div class="comment">
		<form action="<?php echo U('Article/comment',array('id'=>$article[id]));?>" method="post" class="am-form">
			<fieldset style="border:1px solid;border-radius:6px;">
				<div class="am-form-group" style="border-bottom:1px solid;">
					<label for="doc-ta-1">评论区</label>
					<textarea class="" rows="4" id="doc-ta-1"  name="content" style="border:none;"></textarea>
			  	</div><div>
				<?php if($_SESSION['logo']== '' ): ?><a href="<?php echo ($url); ?>" class="am-btn am-btn-primary am-fr">登录</a></div>
				<?php else: ?>
					<button type="submit" class="am-btn am-btn-primary am-fr" name="btn">评论</button></div><?php endif; ?>
				<!---<button type="button" class="am-btn am-btn-warning am-fr">橙色按钮</button>--->
			</fieldset>
		</form>
		<?php if(is_array($comment)): foreach($comment as $key=>$list): ?><article class="am-comment acomment">
			  <a href="#link-to-user-home">
				<img src="<?php echo ($list['logo']); ?>" alt="" class="am-comment-avatar" width="48" height="48"/>
			  </a>
			  <div class="am-comment-main">
				<header class="am-comment-hd">
				  <div class="am-comment-meta">
					<a href="#link-to-user" class="am-comment-author"><?php echo ($list['user']); ?></a>
					评论于 <time><?php echo (date('Y-m-d H:i',$list['time'])); ?></time>
					<input type="hidden" class="commentid" name="commtentid" value="<?php echo ($list['id']); ?>"/>
					<ul class="com-icon am-fr">
						  <li onclick="reply(this)"><i class="am-icon-comment-o am-icon-fw"></i>回复</li>
						  <li onclick="dianzan(this)"><i class="am-icon-thumbs-o-up am-icon-fw"></i>赞<span id="liketime"><?php echo ($list['liketime']); ?></span></li>
					</ul>
				  </div>
				</header>
			    <div class="am-comment-bd">
				  <?php echo ($list['content']); ?>
				</div>
				<!-----回复的列表---->
				<?php if(is_array($list["reply"])): foreach($list["reply"] as $key=>$reply): ?><div class="am-comment-bd reply">
						<a href="#link-to-user-home">
							<img src="<?php echo ($reply['logo']); ?>" alt="" class="am-comment-avatar" width="48" height="48"/>
						</a>
						<div class="am-comment-bd ">
							<a href="#link-to-user" class="am-comment-author"><?php echo ($reply['user']); ?></a>
							回复
							<a href="#link-to-user" class="am-comment-author"><?php echo ($list['user']); ?></a>
							<?php echo ($reply['content']); ?>
						</div>
					</div><?php endforeach; endif; ?>
			<!-----回复列表------>
				<!----回复内容--->
					<div  class="reply-box">
						
					</div>
				<!----回复的内容--->	
			  </div>
			</article><?php endforeach; endif; ?>
	</div>
	<!---/评论区----->
	
		<!-----评论列表------->
  </div>
	
  <div class="am-u-md-3 blog-sidebar">
    <div class="am-panel-group">
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
	var action="<?php echo U('Article/reply',array('id'=>$article[id]));?>"
	var condition="$Think.session.user eq ' ' ";
	var html='<div  class="comment reply-box-content">';
	html+="<form action='"+action+"' method='post' class='am-form'>";
	html+='<fieldset style="border:1px solid;border-radius:6px">';
	html+='<div class="am-form-group" style="border-bottom:1px solid;">';
	html+='<label for="doc-ta-1">回复</label>';
	html+='<textarea class="" rows="4" id="doc-ta-1"  name="replycontent" style="border:none;"></textarea>';
	html+='</div><div>';
	html+='<input id="replyid" type="hidden" name="replyid" value="">';
	//html+='<?php if('+condition+'): ?>';
	//html+='<a href="<?php echo ($url); ?>" class="am-btn am-btn-primary am-fr">登录</a></div>';
	//html+='<?php else: ?>';
	//html+='<?php endif; ?>';
	html+='<button type="submit" class="am-btn am-btn-primary am-fr" name="btn">回复</button>';
	html+='<button type="submit"  onclick="cancel()" class="am-btn am-btn-primary am-fr" name="btn">取消</button>';
	html+='</fieldset>';
	html+='</form>';
	html+='</div>';
	function reply(obj){
		$('.reply-box-content').remove();
		var replyid=$(obj).parents('.am-comment-meta').find('.commentid').val();
		$(obj).parents('.am-comment-main').find('.reply-box').html(html);
		$('#replyid').val(replyid);
	}
	function cancel(){
		$('.reply-box-content').remove();
	}
	//点赞
	function dianzan(obj){
		var replyid=$(obj).parents('.am-comment-meta').find('.commentid').val();
		var liketime=$(obj).find('span');
		var icon=$(obj).find('i');
		$.post(
			"<?php echo U('Home/Article/zan');?>",
			{"commentid":replyid},
			function(data){
				if(data==0){
					alert('请先登录');
				}else if(data=='cancel'){
					var count=parseInt(liketime.text())-1;
					liketime.text(count);
					icon.removeClass('am-icon-thumbs-up').addClass('am-icon-thumbs-o-up');
				}else{
					var count=parseInt(liketime.text())+1;
					liketime.text(count);
					icon.removeClass('am-icon-thumbs-o-up').addClass('am-icon-thumbs-up');
				}
			}
		)
	}
	//收藏
	function collect(){
		var articleid=$('#articleid').val();
		$.post(
			"<?php echo U('Home/Article/collect');?>",
			{"articleid":articleid},
			function(data){
				if(data==0){
					alert('请先登录');
				}else if(data=='cancel'){
					$('#collect').removeClass('am-icon-star').addClass('am-icon-star-o');
				}else if(data=='add'){
					$('#collect').removeClass('am-icon-star-o').addClass('am-icon-star');
				}
			}
		)
	}
</script>
</body>
</html>