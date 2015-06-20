<?php
/*
	Author:xinyanliang
	Data:2015.5.27
	Email:lxy19890408@126.com
	Copyright:xinyanliang
*/
namespace Admin\Controller;
use Think\Controller;
class StudentController extends Controller {
    public function index(){		
		$User = M("user");           // 实例化User对象
		$count      = $User->count();// 查询满足要求的总记录数
		$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$userData = $User->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('userData',$userData);// 赋值数据集	
		$this->assign('page',$show);// 赋值分页输出
        $this->display();
	}
	
	//增加一个学生的信息
	public function add_student(){
		if(IS_GET){
			$this->display('add_student');
		}else{
			$User = M("user");    // 实例化User对象
			$userData=array(
				'user_id'=>I('user_id'),
				'password'=>MD5(I('password')),
				'group'=>I('group'),
				'grade'=>I('grade'),
				'role'=>I('role'),
				'name'=>I('name'),
			);
			$result =$User->add($userData);//批量写入数据库
			if($result ){
				$this->success('添加成功',U('index'));
				//T('Admin@Public/menu')
			}else{
				$this->error('添加失败');
			}
		}
		
	}
	
	//批量增加学生的信息
	public function add_students(){
		
		if(IS_POST){
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('csv');// 设置附件上传类型
			$upload->rootPath  =     "./Uploads/"; // 设置附件上传根目录
			$upload->savePath  =      '';
			$upload->autoSub = false;

			// 上传文件 
			$info   =   $upload->uploadOne($_FILES['photo']);
			$path="./Uploads/".$info['savename'];
			$myfile = fopen($path, "r") or die("文件格式不正确!");
			
			$User = M("user");    // 实例化User对象
			fgets($myfile);
			while(!feof($myfile)) {
				$str = explode(",",fgets($myfile));
				if(count($str)!=1){
					//创建写入数据库的每条记录
					$userData[]=array(
						'user_id'=>trim($str[0]),
						'password'=>MD5(trim($str[1])),
						'group'=>trim($str[2]),
						'grade'=>trim($str[3]),
						'role'=>iconv('gbk','utf-8',trim($str[4])),//解决中文乱码问题
						'name'=>iconv('gbk','utf-8',trim($str[5]))
					);
				}
			}
			fclose($myfile);
			$result =$User->addAll($userData);//批量写入数据库
			if($result ){
			$this->success('批量导入成功',U('index'));
			//T('Admin@Public/menu')
			}else{
				$this->error('批量导入失败');
			}
		}else{
			 $this->display();
		}	
	}
	
	//修改学生信息
	public function edit_student(){
		$User = M("user");
		$map['user_id']=I('user_id');
		if(IS_GET){
			$result =$User->where($map)->select();
			$this->assign('userData',$result[0]);
			$this->display('edit_student');
		}else{
			$userData=array(
						'user_id'=>trim(I('user_id')),
						'password'=>MD5(trim(I('password'))),
						'group'=>trim(I('group')),
						'grade'=>trim(I('grade')),
						'role'=>trim(I('role')),//解决中文乱码问题
						'name'=>trim(I('name')),
					);
			$User->where($map)->save($userData); // 根据条件保存修改的数据
			$this->success('修改成功',U('index'));	
		}
			
	}
	//删除学生
	public function delete_student(){
		$User = M("user");
		$result =$User->where('user_id='.I('user_id'))->delete();
		if($result ){
			$this->success('删除成功',U('index'));
		}else{
			$this->error('删除失败');
		}
	}
	
	//批量删除学生
	public function delete_students(){
		$User = M("user");
		$map['user_id']=array('in',I('user_id'));
		$result =$User->where($map)->delete();
		if($result ){
			$this->success('删除成功',U('index'));
		}else{
			$this->error('删除失败');
		}
	}
	
	//通过学号查询学生
	function findby_user_id(){
		if(IS_POST){
			$User = M("user");
			$map['user_id']  = I('user_id');
			$result =$User->where($map)->select();
			if($result){
				$this->assign('userData',$result);
				$this->display('findby_user_id');
			}else{
				$this->error('没有匹配的学生！');
			}
		}else{
			$this->display('findby_user_id');
		}
		
	}
	//通过学号范围查询学生
	public function findby_bewtten_user_id(){
		if(IS_POST){
			$User = M("user");    
			$user_id_first=I('user_id_first');
			$user_id_last=I('user_id_last');
			$map['user_id']  = array('between',$user_id_first.','.$user_id_last);
			$count      = $User->where($map)->count();// 查询满足要求的总记录数
			$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			$result = $User->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
			if($result){
				$this->assign('userData',$result);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
				$this->display('findby_bewtten_user_id');
			}else{
				$this->error('没有匹配的学生');
			}
		}else{
			$this->display('findby_bewtten_user_id');
		}
	}
	
	//通过年级查询学生
	public function findby_grade(){
		if(IS_POST){
			$User = M("user"); 
			$map['grade']  = I('grade');
			$count      = $User->where($map)->count();// 查询满足要求的总记录数
			$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			$result = $User->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
			if($result){
				$this->assign('userData',$result);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
				$this->display('findby_grade');
			}else{
				$this->error('没有匹配的学生');
			}
		}else{
			$this->display('findby_grade');
		}
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
			'group'=>$result1[0]['group'],
		);
		$result =$Score->add($scoreData);//写入数据库
		$Project->where($map)->setInc('count_people',1); // 该项目评分人数加1
				
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
		$this->assign('info',"您已经参与过该项目的评分！！！");


		$count      = $Project->count();// 查询满足要求的总记录数
		$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$ProjectData = $Project->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$map['flag']  = 1;
		$result5 =$Project->where($map)->select();
		$this->assign('projectData1',$result5[0]);// 赋值数据集	
		
		$this->assign('projectData',$ProjectData);// 赋值数据集	
		$this->assign('page',$show);// 赋值分页输出
        $this->display('Project/index');
	}
	
}