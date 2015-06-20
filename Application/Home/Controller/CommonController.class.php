<?php
/*
	Author:xinyanliang
	Data:2015.5.27
	Email:lxy19890408@126.com
	Copyright:xinyanliang
*/
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function verify($id=1){
		$config =    array(
		'fontSize'    =>    15,    // 验证码字体大小
		'length'      =>    4,     // 验证码位数
		'imageH'      =>    35, // 关闭验证码杂点
		'imageW'      =>    100, // 关闭验证码杂点
		'useNoise'    =>    false, // 关闭验证码杂点
		'useCurve'    =>    false,
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry($id);
	}
	
}