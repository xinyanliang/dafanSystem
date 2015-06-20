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
	</div>
</div> 
				<div class="main">
					<div class="shadow1 center main1">
						<a href="<?php echo U('Project/findby_proname');?>" class="tianjiaa selfb">名称查询</a>
						<a href="<?php echo U('Project/findby_group');?>" class="tianjiaa selfb">组号查询</a>
						<a href="<?php echo U('Project/findby_grade');?>" class="tianjiaa selfb">年级查询</a>
						<form action="<?php echo U('findby_gradeandgroup');?>" method="post" class="font12">
							年级：<input name="grade" style="margin-left:10px">组号：<input name="group" style="margin-left:10px"><input type="submit">
						</form>
					</div>
					<?php if(empty($projectData)): else: ?> 
					<div  class="shadow1 center main22">
						  <table width="70%"  border=1 cellspacing=0 bordercolor="#ccc" class="table_tr20">
							<tr   align="middle"><th></th><th>编号</th><th>项目名称</th><th>年级</th><th>组号</th><th>分数</th><th>是否可打分</th><th>操作</th></tr>
							<?php if(is_array($projectData)): foreach($projectData as $key=>$vo): ?><tr   align="middle">
								    <td><input type="checkbox" name="pro_id" value="pro_id[]"/></td>
									<td><?php echo ($vo['pro_id']); ?></td>
									<td><?php echo ($vo['proname']); ?></td>
									<td><?php echo ($vo['grade']); ?></td>
									<td><?php echo ($vo['group']); ?></td>
									<td><?php echo ($vo['score']); ?></td>
									<td><?php if($vo['flag'] == 0): ?>否<?php else: ?>是<?php endif; ?></td>
									<td><a href=<?php echo U('edit_student','user_id='.$vo['user_id']);?>>修改</a>| <a href=<?php echo U('delete_project','pro_id='.$vo['pro_id']);?>>删除</a></td>
								</tr><?php endforeach; endif; ?>	
						  </table>
					</div><?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="foot shadow1">
	<div class="copyright">Copyright © 2015 计算机与信息学院 版权所有</div>
</div> 
	</div><?php endif; ?> 
 </body>
</html>