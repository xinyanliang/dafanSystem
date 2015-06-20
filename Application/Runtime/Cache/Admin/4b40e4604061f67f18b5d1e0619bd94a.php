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
  <script type="text/javascript" src="/Public/jquery-1.8.2.min.js"></script>
  <script type="text/javascript">
	$(function(){
		$("[name='flag']").click(function(){
						var flagValue=$(this).val();
						var url = "<?php echo U('Project/edit_flag');?>?pro_id=" + flagValue;  
						window.location=url;
		});
		$(".selectAll").click(function(){
			$("[name='user_id[]']").attr("checked","true");//全选
		});
		$(".cancelAll").click(function(){
			$("[name='user_id[]']").removeAttr("checked")//取消全选
		});
		$(".reverse").click(function(){
		     $("[name='user_id[]']").each(function(){
				if($(this).attr("checked")){
					$(this).removeAttr("checked");   
				}else{
					$(this).attr("checked","true"); }
				});
		});
	});
  
  </script>
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
					<div  class="shadow1 center main3" style="overflow:auto;">
					    <form action="<?php echo U('delete');?>" method="post" name="myform">
						  <table width="70%"  border=1 cellspacing=0 bordercolor="#ccc" class="table_tr20">
							<tr   align="middle"><th style="width:40px">姓名</th><th style="width:40px">项目名称</th>
							<th style="width:40px">组号</th><th style="width:40px">分数</th><th style="width:40px">理由</th><th style="width:40px">操作</th></tr>
							<?php if(is_array($scoreData)): foreach($scoreData as $key=>$vo): ?><tr   align="middle">
									<td style="width:40px"><?php echo ($vo['name']); ?></td>
									<td style="width:40px"><?php echo ($vo['proname']); ?></td>
									<td style="width:40px"><?php echo ($vo['group']); ?></td>
									<td style="width:40px"><?php echo ($vo['varscore']); ?></td>
									<td style="width:40px"><?php echo ($vo['comment']); ?></td>
									<td style="width:40px">
									<a href="<?php echo U('edit_score','user_id='.$vo['user_id'].'&pro_id='.$vo['pro_id']);?>">修改</a>|<a href=<?php echo U('delete','user_id='.$vo['user_id'].'&pro_id='.$vo['pro_id']);?>>删除</a></td>
								</tr><?php endforeach; endif; ?>	
							
						  </table>
						</form>
						 <div  class="pages">
							 <?php echo ($page); ?>
						 </div>
					</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="foot shadow1">
	<div class="copyright">Copyright © 2015 计算机与信息学院<font style="display:none">2014级 梁新彦</font> 版权所有</div>
</div> 
	</div><?php endif; ?> 
 </body>
</html>