<?php
/*
	Author:xinyanliang
	Data:2015.5.27
	Email:lxy19890408@126.com
	Copyright:xinyanliang
*/
namespace Admin\Controller;
use Think\Controller;
class ProjectController extends Controller {
    public function index(){		
		$Project = M("pro");    // 实例化User对象
		$Score=M("score");
		//判断是否打分
		$map['flag']  = 1;
		$result2 =$Project->where($map)->select();
		$map4['user_id']  = session('user_id');
		$map4['pro_id']=$result2[0]['pro_id'];
		$resultScore =$Score->where($map4)->select();
		if($resultScore){//获取过跳转到finishscore页面
			$this->assign('info',"您已经参与过该项目的评分！！！");
		}else{
			$this->assign('info',"no");
		}
		$count      = $Project->count();// 查询满足要求的总记录数
		$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$ProjectData = $Project->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$map['flag']  = 1;
		$result1 =$Project->where($map)->select();
		$this->assign('projectData1',$result1[0]);// 赋值数据集	
		
		$this->assign('projectData',$ProjectData);// 赋值数据集	
		$this->assign('page',$show);// 赋值分页输出
        $this->display();
	}
	
	//增加一个项目的信息
	public function add_project(){
		if(IS_GET){
			$this->display('add_project');
		}else{
			$Project = M("pro");    // 实例化Project对象
			$projectData=array(
				'proname'=>I('proname'),
				'grade'=>I('grade'),
				'group'=>I('group'),
				'peoplenums'=>I('peoplenums'),
			);
			$result =$Project->add($projectData);//写入数据库
			if($result ){
				$this->success('添加成功',U('index'));
				//T('Admin@Public/menu')
			}else{
				$this->error('添加失败');
			}
		}
	}
	
	//批量增加项目的信息
	public function add_projects(){
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
			
			$Project = M("pro");    // 实例化User对象
			fgets($myfile);
			while(!feof($myfile)) {
				$str = explode(",",fgets($myfile));
				if(count($str)!=1){
					//创建写入数据库的每条记录
					$projectData[]=array(
						'proname'=>iconv('gbk','utf-8',trim($str[0])),//解决中文乱码问题
						'grade'=>trim($str[1]),
						'group'=>trim($str[2]),
						'peoplenums'=>trim($str[3]),
					);
				}
			}
			fclose($myfile);
			$result =$Project->addAll($projectData);//批量写入数据库
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
	
	//修改项目
	public function edit_project(){
		$Project = M("pro");
		session('proid',I('pro_id'));
		$map['pro_id']=I('pro_id');
		if(IS_GET){
			$result =$Project->where($map)->select();
			$this->assign('projectData',$result);
			$this->display('edit_project');
		}else{
			$Project->create();
			$Project->save(); // 根据条件保存修改的数据
			$this->success('修改成功',U('index'));	
		}
	}
	//删除项目
	public function delete_project(){
		$Project = M("pro");
		$result =$Project->where('pro_id='.I('pro_id'))->delete();
		if($result ){
			$this->success('删除成功',U('index'));
		}else{
			$this->error('删除失败');
		}
	}
	//批量删除项目
	public function delete_projects(){
		$Project = M("pro");
		$map['pro_id']=array('in',I('pro_id'));
		$result =$Project->where($map)->delete();
		if($result ){
			$this->success('删除成功',U('index'));
		}else{
			$this->error('删除失败');
		}
	}
	//修改flag字段，使得对应的项目可以被打分
	public function edit_flag(){
		$Project = M("pro");
		$map['pro_id']=I('pro_id');
		$Project->where($map)->setField('flag',1); // 根据条件保存修改的数据
		$map1['pro_id']  = array('neq',I('pro_id'));
		$Project->where($map1)->setField('flag',0);
		
		$result =$Project->where($map)->select();
		session('score_pro',$result[0]);
		$this->success('修改成功',U('index'));	
	}
	//通过名称查询项目
	function findby_proname(){
		if(IS_POST){
			$Project = M("pro");
			$map['proname']  = I('proname');
			$count      = $Project->where($map)->count();// 查询满足要求的总记录数
			$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			$result = $Project->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
			if($result){
				$this->assign('projectData',$result);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
				$this->display('findby_proname');
			}else{
				$this->error('没有匹配的项目！');
			}
		}else{
			$this->display('findby_proname');
		}
	}
	//通过组号查询项目
	function findby_group(){
		if(IS_POST){
			$Project = M("pro");
			$map['group']  = I('group');
			$count      = $Project->where($map)->count();// 查询满足要求的总记录数
			$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			$result = $Project->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
			if($result){
				$this->assign('projectData',$result);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
				$this->display('findby_group');
			}else{
				$this->error('没有匹配的项目！');
			}
		}else{
			$this->display('findby_group');
		}	
	}
	
	//通过年级查询项目
	function findby_grade(){
		if(IS_POST){
			$Project = M("pro");
			$map['grade']  = I('grade');
			$count      = $Project->where($map)->count();// 查询满足要求的总记录数
			$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			$result = $Project->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
			if($result){
				$this->assign('projectData',$result);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
				$this->display('findby_group');
			}else{
				$this->error('没有匹配的项目！');
			}
		}else{
			$this->display('findby_grade');
		}	
	}
	//通过组号范围查询项目
	public function findby_gradeandgroup(){
		if(IS_POST){
			$Project = M("pro");  
			$map['group']  =I('group') ;
			$map['grade']  =I('grade') ;
			$count      = $Project->where($map)->count();// 查询满足要求的总记录数
			$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
			$show       = $Page->show();// 分页显示输出
			$result = $Project->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();
			if($result){
				$this->assign('projectData',$result);// 赋值数据集
				$this->assign('page',$show);// 赋值分页输出
				$this->display('findby_gradeandgroup');
			}else{
				$this->error('没有匹配的项目');
			}
		}else{
			$this->display('findby_gradeandgroup');
		}
	}
	public function get_count_people(){
		$Project = M("pro");
		$map['flag']  = 1;
		$result =$Project->where($map)->select();
		session('score_pro',$result[0]);
		
		$Project = M("pro");    // 实例化User对象
		$count      = $Project->count();// 查询满足要求的总记录数
		$Page       = getpage($count,12);// 实例化分页类 传入总记录数和每页显示的记录数
		$show       = $Page->show();// 分页显示输出
		$ProjectData = $Project->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('projectData',$ProjectData);// 赋值数据集	
		$this->assign('page',$show);// 赋值分页输出
		$this->display('index');	
	}
	
}