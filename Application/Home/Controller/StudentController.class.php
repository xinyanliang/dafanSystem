<?php
/*
	Author:xinyanliang
	Data:2015.5.27
	Email:lxy19890408@126.com
	Copyright:xinyanliang
*/
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
    public function index(){
		$Project = M("pro");
		$map['flag']  = 1;
		$result =$Project->where($map)->select();
		//$data['status']  = 1;
		//$data['content'] = 'xinyan';
		//$this->ajaxReturn($data);
		$this->assign('projectData',$result);
		$this->display('index');
	}
	
	//获取项目
	 public function get_project(){
		if(IS_GET){
			//如果该用户已经给项目打过分就不能获取信息
			$Score = M("score");
			$map['flag']  = 1;
			$Project = M("pro");
			$result =$Project->where($map)->select();
			$map1['user_id']  = session('user_id');
			$map1['pro_id']=$result[0]['pro_id'];
			$resultScore =$Score->where($map1)->select();
			if($resultScore){//获取过跳转到finishscore页面
				$this->assign('info',"您已经参与过该项目的评分！！！");
				$this->display('finishscore');
			}else{//没获取过跳转到index
				$this->assign('projectData',$result);
				$this->display('index');
			}
		}else{
			$this->assign('projectData',$result);
		    $this->display('index');
		}
	}
	//评分完成后跳转的页面控制器
	 public function finishscore(){
		 $Project = M("pro");
		$map['flag']  = 1;
		$result1 =$Project->where($map)->select();
		 $this->assign('projectData',$result1);
		$this->assign('info',"感谢您的参与！！！");
		
		$this->display('finishscore');
	 }
	
	//评分函数
	function score(){
		$Project = M("pro");
		$map['flag']  = 1;
		$result1 =$Project->where($map)->select();
		$Score = M("score");
		
		
		$scoreData=array(
			'user_id'=>session('user_id'),
			'pro_id'=>$result1[0]['pro_id'],
			'varscore'=>I('score'),
			'comment'=>I('comment'),
			'group'=>$result1[0]['group'],
		);
		$result =$Score->add($scoreData);//写入数据库
		$count_people=$result1[0]['count_people']+1;
		
		$data111 = array('count_people'=>$count_people);
		$Project-> where($map)->setField($data111 ); // 该项目评分人数加1
				
		$User = M("user");
		$userData=$User->where('user_id='.session('user_id'))->select();
		$Config = M("config");
		$configData=$Config->select();
		
		//计算Score中varscore的总和
		$map1['pro_id']=$result1[0]['pro_id'];
		$map1['role']="老师";
		$scoreData1 = $Score->join('user ON score.user_id = user.user_id')->where($map1)->sum('varscore');
		$scoreDataCount1 = $Score->join('user ON score.user_id = user.user_id')->where($map1)->count();

		$map2['pro_id']=$result1[0]['pro_id'];
		$map2['role']="学生";
		$scoreData2 = $Score->join('user ON score.user_id = user.user_id')->where($map2)->sum('varscore');
		$scoreDataCount2 = $Score->join('user ON score.user_id = user.user_id')->where($map2)->count();
		
		$varscore=$scoreData1/$scoreDataCount1*$configData[0]['teacher_weight']+$scoreData2/$scoreDataCount2*$configData[0]['student_weight'];
		$data['score'] = $varscore;
		$Project->where('pro_id='.$result1[0]['pro_id'])->save($data);
		
		$this->assign('projectData',$result1);
		$this->assign('info',"感谢您的参与！！！");
		
		//$this->display('finishscore');
		
		$this->redirect('finishscore');
		
	}
	
	//修改学生信息
	public function edit_password(){
		$User = M("user");
		$map['user_id']=session('user_id');
		$result =$User->where($map)->select();
		if(IS_GET){
			$this->assign('userData',$result[0]);
			$this->display('edit_password');
		}else{
			if(MD5(trim(I('oldpassword')))==$result[0]['password']){
				$userData=array(
						'user_id'=>trim(session('user_id')),
						'password'=>MD5(trim(I('newpassword'))),
					);
				$User->where($map)->save($userData); // 根据条件保存修改的数据
				$this->success('修改成功',U('index'));	
			}else{
				$this->success('原密码不正确',U('edit_password'));	
			}	
		}		
	}
}