<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title><?php echo C('TITLE');?></title>
  <link rel="stylesheet" type="text/css" href="/Public/Home/Css/common.css" /> 
  <script type="text/javascript" src="/Public/jquery-1.8.2.min.js"></script>
  <script type="text/javascript">
    function getPro(){
		var url = "<?php echo U('Project/get_project');?>?pro_id=" + flagValue;
		$.get(url,function(data,status){
			alert("Data: " + data + "\nStatus: " + status);
		});
	}
	
	//setTimeout(getPro(), 2000);
  </script>
 </head>
 <body>
	<?php if(empty($_SESSION['user_id'])): echo redirect('Index/index');;?>
	<?php else: ?> 
		<div class="wrap">
		    <div class="top">
	<div class="top-con">
		<font style="display:block;position:absolute;right:200px;bottom:35px">欢迎<font color="#f00" style="font-weight:bold;font-size:20px;font-family:'华文行楷'">&nbsp<?php echo (session('name')); ?></font>
		<?php if($_SESSION['role']== '老师'): ?>老师<?php else: ?>同学<?php endif; ?></font>
		<?php if($_SESSION['role']== '老师'): ?><a href="<?php echo U('Admin/Student/index');?>"><img width="40px" height="50px" src="/Public/Admin/Image/tubiao1.jpg" style="position:absolute;right:115px;top:14px"></a><?php endif; ?>
		<a href="<?php echo U('Student/edit_password');?>" style="position:absolute;right:360px;top:45px;color:#77f;font-size:20px;font-family:'华文行楷'">修改密码</a>
		<a href="<?php echo U('Index/loginout');?>"><img width="40px" height="50px" src="/Public/Admin/Image/tubiao2.jpg" style="position:absolute;right:45px;top:14px"></a>
	</div>
</div>
			<div class="con">
				<div class="left shadow1" >
	<div class="left-con center" style="color:#c00c0b">
		<img src="/Public/Home/Image/jishao.jpg" style="display:block">
		<ul>
			<li >1.请点击“获取项目”按钮（U型吸铁石）获取当前可以打分的项目；</li>
			<li>2.在方框内输入你所打分数，然后点打分按钮；</li>
			<li>3.如果你打分超过95分或低于70分，请写打分理由.</li>
		</ul>
		
		<a href="<?php echo U('Student/edit_password');?>" style="position:relative;top:50px;left:20px;weight:900;color:#77f;font-size:20px;font-family:'华文行楷'">修改密码</a>
	</div>
</div> 
				<div class="main">
					<div  class="shadow1 center main1" style="position:relative">
						谢谢您给<font color="#f00" size="5"><?php echo ($qq['projectData'][0]['group']); ?></font>组项目评分<br/>
						<font color="#f00" size="4"><b>&nbsp<?php echo ($projectData[0]['proname']); ?></b></font><br/>
						<a href=<?php echo U('get_project');?>><img src="/Public/Home/Image/huoqu.jpg" style="display:block;position:absolute;right:80px;bottom:10px;width:80px;height:50px" title="获取项目"></a>
					</div>
					<div  class="shadow1 center main2" >
					   <?php echo ($info); ?>
					</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="foot shadow1">
	<div class="copyright">Copyright © 2015 计算机与信息学院 版权所有</div>
</div> 
	</div><?php endif; ?> 
 </body>
</html>