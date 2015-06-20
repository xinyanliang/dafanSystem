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
  $(function(){
		$(".tijiao").click(function(){
		  $("[name='myform']").submit();
		  });
    });
  </script>
  <style  type="text/css">
	.disappear{display:none;}
	.appear{display:inline;color:#f00;font-size:12px}
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
						
					</div>
					<div  class="shadow1 center main2" >
					    <form name="myform" action="<?php echo U('edit_password');?>" method="post">
						  <div class="magtop5" style="margin-top:50px"></div>
						  <div class="radius border1" style="width:440px;padding:20px 30px;background:#31c8f5">
							<label style="font-size:14px;color:#f00;font-weight:700">原密码:</label>
							 <input  style="border:2px solid #0055f0;height:20px;width:120px;line-height:20px;font-size:20px;color:#f00;text-align:center;outline:none;" type="password" name="oldpassword" placeholder="原密码"  class="radius8"/>
						     <div class="magtop5" ></div>
							 <label style="font-size:14px;color:#f00;font-weight:700">新密码:</label>
							 <input  style="border:2px solid #0055f0;height:20px;width:120px;line-height:20px;font-size:20px;color:#f00;text-align:center;outline:none;" type="password" name="newpassword" placeholder="新密码"  class="radius8"/>
						 </div>					  
					     <div class="magtop5" ></div>
						 <a href="#"  class="tijiao" style="padding-left:400px;"><img src="/Public/Admin/Image/a.jpg" style="width:100px;height:50px;" align="bottom"></a>						  </div>
						</form>
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