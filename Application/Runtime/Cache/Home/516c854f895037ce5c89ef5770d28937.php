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
 

</head>
<body>
<form method="post" action="/home/index/check">
    <p>用户名:<input type="text" name="user" ></p>
    <p>邮箱:<input type="text" name="email" ></p>
    <p>密码:<input type="password" name="password" ></p>
   <p>确认密码: <input type="password" name="repassword" ></p>
   <!---<p><img height="42" src="/user/verify" ></p>
   <p>验证码:<input name="verify" type="text" maxlength="4"></p>---->
	<p><input name="btn" type="submit" ></p>
</form>
<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="Public/assets/js/amazeui.min.js"></script>

</body>
</html>