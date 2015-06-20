<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title><?php echo C('TITLE');?></title>
  <script type="text/javascript" src="/Public/jquery-1.8.2.min.js"></script>
  <script type="text/javascript">
		$(function(){
			$(".verify").click(function(){
				var verifyimg = $(this).attr("src");  
				if( verifyimg.indexOf('?')>0){  
					$(this).attr("src", verifyimg+'&random='+Math.random());  
				}else{  
					$(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
				}				
			});
		});
  </script>
  <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/common.css" /> 
  <style>
	.con{background-image:url(/Public/Admin/Image/login.jpg);width:995px;height:591px;margin:0 auto;margin-top:30px;}
	.con .login{position:relative;left:450px;top:200px;}
	.verify{cursor:pointer}
  </style>
 </head>
 <body>

    <div class="con">
		<div class="login">
			<form action="<?php echo U(index);?>" method="post" name="myform" class="font12" style="width:280px;color:#0055f0">
			<fieldset style="padding:20px 30px;" class=" border1">
				<legend style="font-size:20px;">学生登陆</legend>
				工  号：<input name="user_id" style="margin-left:10px;border:2px solid #0055f0;padding-left:5px;outline:none;outline:none;" class="radius8"><br/>
				<p class="magtop5"></p>
				密  码：<input type="password" name="password" style="margin-left:10px;border:2px solid #0055f0;padding-left:5px;outline:none;" class="radius8"><br/>
				<p class="magtop5"></p>
				<a  href="#" onclick="document.myform.submit()";><img src="/Public/Admin/Image/tijiao.jpg" style="width:70px;height:30px;padding-left:130px"align="bottom"></a></fieldset>
			</form>
		</div>
	</div>
	<div class="foot shadow1">
	<div class="copyright">Copyright © 2015 计算机与信息学院 版权所有</div>
</div> 
</body>
</html>