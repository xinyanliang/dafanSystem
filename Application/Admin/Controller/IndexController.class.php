<?php
/*
	Author:xinyanliang
	Data:2015.5.27
	Email:lxy19890408@126.com
	Copyright:xinyanliang
*/
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		if(session('role')=="老师"){
			$this->display('Student/index');
		}else{
			if(IS_POST){
				
				$User = M("user");    // 实例化User对象
				$user_id=I('user_id');
				$password=MD5(I('password'));
				$result=$User->where('user_id='.$user_id)->select();
				
				if($result[0]['role']!="老师"){
					$this->error('您无权登陆后台！',U('index'));
				}
				if($result[0]['user_id']==$user_id){
					if($result[0]['password']==$password){
						if(!check_verify(I('verify'))){
							session('user_id',$user_id);
							session('role',$result[0]['role']);
							session('name',$result[0]['name']);
							$this->redirect('Student/index');
						}else{
							$this->error('验证码错误！',U('index'));
						}
					}else{
						$this->error('密码错误！',U('index'));
					}
				}else{
					$this->error('用户名错误或不存在！',U('index'));
				}
					
			}else{

				$this->display();
			}
		}

	}
	
	 public function loginout(){
		session('user_id',null); // 删除name
		session('[destroy]'); // 销毁session 
		$this->display('Index/index');
	 }
	
}