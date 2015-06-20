<?php
/*
	Author:xinyanliang
	Data:2015.5.27
	Email:lxy19890408@126.com
	Copyright:xinyanliang
*/
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends Controller {
    public function index(){
		$Config=M("config");
		if(IS_POST){
			$config=array(
				'id'=>I('weight_id'),
				'teacher_weight'=>I('teacher_weight'),
				'student_weight'=>I('student_weight'),
			);
			$Config->create();
			$Config->save(); // 根据条件保存修改的数据
			$this->success('修改成功',U('index'));	
		}else{
			$configData=$Config->select();
			$config=array(
				'id'=>$configData[0]['id'],
				'teacher_weight'=>$configData[0][teacher_weight],
				'student_weight'=>$configData[0][student_weight],
			);
			$this->assign('config',$config);
			$this->display();
		}
	}
	
}