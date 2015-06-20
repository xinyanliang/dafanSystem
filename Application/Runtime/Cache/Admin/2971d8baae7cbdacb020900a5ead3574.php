<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="/dafen/Public/Admin/Css/common.css" /> 
 </head>
 <body>
	<?php if(empty($_SESSION['user_id'])): echo redirect('Index/index');;?>
	<?php else: ?> 
	
		 
		<div class="wrap">
		    <div class="top">
	<div class="top-con">
		欢迎使用打分系统
	</div>
</div>
			<div class="con">
				<div class="left">
	<div class="left-con">
		<h5><a href="">学生信息管理</a></h5>
		<ul>
			<li><a href="<?php echo U('Student/add_students');?>">添加学生信息</a></li>
			<li><a href="<?php echo U('Student/findby_user_id');?>">查询学生信息</a></li>
		</ul>
		<h5><a href="">实验信息管理</a></h5>
		<ul>
			<li><a href="index/">添加实验信息</a></li>
			<li><a href="Admin/Student/index/">修改实验信息</a></li>
			<li><a href="Admin/Student/index/">删除实验信息</a></li>
		</ul>
	</div>
</div> 
				<div class="main">
				<div style="margin:30px 100px">
					<a href="">学号查询</a>
					<a href="">年级查询</a>
					<a href="">学号范围</a>
					<p class="magtop5"></p>
					 <form action="<?php echo U(find);?>" method="post">
						学号查询：<input name="user_id" style="margin-left:10px"><br/>
						<p class="magtop5"></p>
						年级查询：<input name="grade" style="margin-left:10px"><br/>
						<p class="magtop5"></p>
						学号范围：<input name="user_id_first" style="margin-left:10px"><input name="user_id_last" style="margin-left:10px"><br/>
						<p class="magtop5"></p>
						<input type="submit">
					</form>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="foot">
	<div class="copyright">Copyright © 2015 计算机与信息学院 版权所有</div>
</div> 
	</div><?php endif; ?> 
 </body>
</html>