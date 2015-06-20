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
			var numsTr=$('tr').length;
			if(numsTr==1){
				alert("请先获取项目！");
				return 0;
			}
			
			
			var score=$("[name='score']").val();
			if(isNaN(score)){
				alert("分数必须为数字！！！"); return 0;
			}
			if(score>100 || score<0){
				$(".reminde").addClass("appear");
				$(".reminde").removeClass("disappear");
				$("[name='score']").val("");
				$("[name='score']").focus();
			}else{
				var comment=$("[name='comment']").val();
				if(score>95 || score<70){
					if(comment.length==0){
						alert("分数大于95或小于70，必须写出原因(原因必须大于8个字)！！"); return 0;
					}
					if(comment.length<8){
						alert("原因必须大于8个字！"); return 0;
					}else{
						$(".reminde").addClass("disappear");
						$(".reminde").removeClass("appear");
						$("[name='myform']").submit();
					}
				}else{
						$(".reminde").addClass("disappear");
						$(".reminde").removeClass("appear");
						$("[name='myform']").submit();
				}				
			}
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
						现在评测的是<font color="#f00" style="font-size:20px;font-family:'华文行楷'" size="5"><?php echo ($projectData[0]['group']); ?></font>组项目：<br/>
						<font color="#f00"  style="font-size:20px;font-family:'华文行楷'" size="4"><b>&nbsp<?php echo ($projectData[0]['proname']); ?></b></font><br/>
						<a href=<?php echo U('Student/get_project');?>><img src="/Public/Home/Image/huoqu.jpg" style="display:block;position:absolute;right:80px;bottom:10px;width:100px;height:80px" title="获取项目"></a>
					</div>
					<div  class="shadow1 center main2" >
					    <form name="myform" action="<?php echo U('score');?>" method="post">
						  <table width="500px"  border=1 cellspacing=0 bordercolor="#f00" class="table_tr20">
							<tr align="middle"><th>项目名称</th><th>年级</th><th>组号</th></tr>
							<?php if(is_array($projectData)): foreach($projectData as $key=>$vo): ?><tr   align="middle">
								    <input type="hidden" name="pro_id" value="<?php echo ($vo['pro_id']); ?>"/>
									<td><?php echo ($vo['proname']); ?></td>
									<td><?php echo ($vo['grade']); ?></td>
									<td><?php echo ($vo['group']); ?></td>
								</tr><?php endforeach; endif; ?>	
						  </table>
						  <div class="magtop5" style="margin-top:50px"></div>
						  <div class="radius border1" style="width:440px;padding:20px 30px;background:#31c8f5">
							<label style="font-size:14px;color:#f00;font-weight:700">分数:</label>
							 <input  style="border:2px solid #0055f0;height:20px;width:80px;line-height:20px;font-size:20px;color:#f00;text-align:center;outline:none;" type="text" name="score" placeholder="打分"  class="radius8"/>
							 <div class="magtop5" ></div>
							 <textarea rows="5" cols="56" name="comment" value="" placeholder="分数大于95或小于70，必须写出原因(原因必须大于8个字)！！" style="border:2px solid #0055f0;background:#fff;padding:5px 10px;outline:none;"  class="radius" ></textarea><br/>
						 </div>					  
					     <div class="magtop5" ></div>
						 <a href="#"  class="tijiao" style="padding-left:450px;"><img src="/Public/Home/Image/dafen.jpg" style="width:50px;height:50px;" align="bottom"></a>						  </div>
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