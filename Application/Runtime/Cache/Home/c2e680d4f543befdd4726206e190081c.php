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
  <style>
	.fontheight{inline-height:20px}
	.font1{font-weight:bold;font-size:20px;font-family:'华文行楷'}
  </style>
 </head>
 <body>
	<?php if(empty($_SESSION['user_id'])): echo redirect('Index/index');;?>
	<?php else: ?> 
		<div class="wrap">
		    <div class="top">
	<div class="top-con">
		<font style="display:block;position:absolute;right:180px;bottom:35px">欢迎<font color="#f00" style="font-weight:bold;font-size:20px;font-family:'华文行楷'">&nbsp<?php echo (session('name')); ?></font>
		<?php if($_SESSION['role']== '老师'): ?>老师<?php else: ?>同学<?php endif; ?></font>
		<?php if($_SESSION['role']== '老师'): ?><a href="<?php echo U('Admin/Student/index');?>"><img width="40px" height="50px" src="/Public/Admin/Image/tubiao1.jpg" style="position:absolute;right:115px;top:14px"></a><?php endif; ?>
		<a href="<?php echo U('Student/edit_password');?>" style="position:absolute;right:380px;top:45px;color:#77f;font-size:20px;font-family:'华文行楷'">修改密码</a>
		<a href="<?php echo U('Student/about');?>" style="position:absolute;right:320px;top:45px;color:#77f;font-size:20px;font-family:'华文行楷'">关于</a>
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
		
		<a href="<?php echo U('Student/edit_password');?>" style="position:relative;top:50px;left:20px;weight:900;color:#77f;font-size:20px;font-family:'华文行楷'">修改密码</a><br/>
		<a href="<?php echo U('Student/about');?>" style="position:relative;top:50px;left:20px;weight:900;color:#77f;font-size:20px;font-family:'华文行楷'">关于</a>
	</div>
</div> 
				<div class="main">
					<div  class="shadow1 center main1" style="position:relative">
						<p class="font1">相关作者</p>
					</div>
					<div  class="shadow1 center main2 fontheight font1"  >
					    <p >代码编写：梁新彦</p><br/>
						<p>界面设计：郭倩</p><br/>
						<p>论文编写：胡小康、李晨强、刘淑琳、孙瑞瑞、张浩杰（排名不分先后，按姓氏排名）</p>
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