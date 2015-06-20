<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title><?php echo C('ADMINTITLE');?></title>
  <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/common.css" /> 
 </head>
 <body>
	<?php if($_SESSION['role']!= '老师'): echo redirect(U('Index/index'));?>
	<?php else: ?>
		<div class="wrap">
		    <div class="top">
	<div class="top-con">
		<font style="display:block;position:absolute;right:200px;bottom:35px">欢迎<font color="#f00" style="font-weight:bold;font-size:20px;font-family:'华文行楷'">&nbsp<?php echo (session('name')); ?></font>
		<?php if($_SESSION['role']== '老师'): ?>老师<?php else: ?>同学<?php endif; ?></font>
		<a href="<?php echo U('Home/Student/index');?>"><img width="40px" height="50px" src="/Public/Admin/Image/tubiao1.jpg" style="position:absolute;right:115px;top:6px"></a>
		<a href="<?php echo U('Index/loginout');?>"><img width="40px" height="50px" src="/Public/Admin/Image/tubiao2.jpg" style="position:absolute;right:45px;top:6px"></a>
	</div>
</div>
			<div class="con">
				<div class="left shadow1" >
	<div class="left-con center">
		<h5><a href="">系统设置</a></h5>
		<ul>
			<li><a href="<?php echo U('Config/index');?>">基本参数</a></li>
		</ul>
		<h5><a href="">学生信息管理</a></h5>
		<ul>
			<li><a href="<?php echo U('Student/index');?>">学生列表</a></li>
			<li><a href="<?php echo U('Student/add_student');?>">添加学生</a></li>
			<li><a href="<?php echo U('Student/findby_user_id');?>">查询学生</a></li>
		</ul>
		<h5><a href="">实验信息管理</a></h5>
		<ul>
			<li><a href="<?php echo U('Project/index');?>">项目列表</a></li>
			<li><a href="<?php echo U('Project/add_project');?>">添加项目</a></li>
			<li><a href="<?php echo U('Project/findby_proname');?>">查询项目</a></li>
		</ul>
		<h5><a href="">分数管理</a></h5>
		<ul>
			<li><a href="<?php echo U('Score/index');?>">分数列表</a></li>
			<li><a href="<?php echo U('Score/saveScore');?>">分数统计</a></li>
		</ul>
		<h5><a href="">下载</a></h5>
		<ul>
			<li><a href="<?php echo U('Download/download');?>">相关文件下载</a></li>
		</ul>
	</div>
</div> 
				<div class="main">
					<div class="shadow1 center main11 selfb">
						修改分数
					</div>
					<?php if(empty($scoreData)): else: ?> 
					<div  class="shadow1 center main2">
						<form action="<?php echo U('edit_score');?>" method="post">
						  <table width="70%"  border=1 cellspacing=0 bordercolor="#ccc">
								<tr   heigth="30px" align="middle"><td>项目ID：</td><td><input name="pro_id" style="margin-left:10px;border:0px" value="<?php echo ($scoreData['pro_id']); ?>" readonly="ture" ></td></tr>
								<tr   align="middle"><td>组号：</td><td><input name="group" style="margin-left:10px;border:0px" value="<?php echo ($scoreData['group']); ?>" readonly="ture"></td></tr>
								<tr   align="middle"><td>学号：</td><td><input name="user_id" style="margin-left:10px;border:0px" value="<?php echo ($scoreData['user_id']); ?>" readonly="ture"></td></tr>
								<tr   align="middle"><td>分数:</td><td><input name="varscore" style="margin-left:10px" value="<?php echo ($scoreData['varscore']); ?>"></td></tr>
								<tr   align="middle"><td>评论:</td><td><input name="comment" style="margin-left:10px" value="<?php echo ($scoreData['comment']); ?>"></td></tr>
						  </table>
						  <input type="submit" value="保存" >
						</form>
					</div><?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="foot shadow1">
	<div class="copyright">Copyright © 2015 计算机与信息学院<font style="display:none">2014级 梁新彦</font> 版权所有</div>
</div> 
	</div><?php endif; ?> 
 </body>
</html>