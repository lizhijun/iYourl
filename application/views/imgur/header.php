<!DOCTYPE html>
<html lang="en">
  <head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title><?php //echo $title;?>头条图片: 简单的图片分享地</title>
    <meta name="description" content="头条图片: 简单的图片分享地" />
    <meta name="keywords" content="头条图片,91头条,头版头条,91toutiao.com,reddit 中国,投票,评论,提交,分享" />
             <link rel="shortcut icon" href="<?php echo base_url("favicon.ico");?>" type="image/x-icon" >
    <link rel="icon" href="<?php echo base_url("favicon.ico");?>" type="image/x-icon" >
    <link href="<?php echo base_url("assets/css/bootstrap.css");?>" rel="stylesheet" media="screen">
	<script src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/application.js"); ?>"></script><!--工具提示-->
  </head>
  <style type="text/css">
	.navbar-inner { /*去除导航圆角效果*/
		-webkit-border-radius: 0;
		-moz-border-radius: 0;
		border-radius: 0;
	}
	
	.navbar li a {
		background:#444442;
	}
  </style>
  
  <body style="background-color:#121211;">

	
		<div class="navbar nav-inverse">
			  <div class="navbar-inner" style="background:#2B2B2B;border-bottom:4px solid #444442;">
				<div style="width:940px;margin:0 auto;">
					<ul class="nav">
					  <li style="border-right:1px solid #121211;"><a style="color:#fff;" href="#">头条图片</a></li>
					  
					  <li style="border-right:1px solid #121211;"><a href="#random_mode" title="随机显示"><i class="icon-random icon-white"></i></a></li>
					  
					  <li style="border-right:1px solid #121211;"><a href="#upload_images" title="上传图片"><i class="icon-upload icon-white"></i></a></li>
					  
					</ul>
					<ul class="nav pull-right">
					  
					  <li><a style="border-left:1px solid #121211;color:#fff;" href="<?php echo base_url('user/login');?>"><i class="icon-user icon-white"></i> 登录</a></li>
					  
					  <li><a style="border-right:1px solid #121211;color:#fff;" href="<?php echo base_url('user/register');?>">注册</a></li>
					  
					</ul>
				</div>
			  </div>
		</div>
	


	<div class="container">