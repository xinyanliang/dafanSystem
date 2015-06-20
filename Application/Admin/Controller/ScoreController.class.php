<?php
/*
	Author:xinyanliang
	Data:2015.5.27
	Email:lxy19890408@126.com
	Copyright:xinyanliang
*/
namespace Admin\Controller;
use Think\Controller;
class ScoreController extends Controller {
    public function index(){	

		$Score = M("score");
		$count=$Score->join('user ON score.user_id = user.user_id')->join(' pro ON pro.pro_id = score.pro_id')->count();
		$Page       = getpage($count,20);
		$show       = $Page->show();
		$scoreData = $Score->join('user ON score.user_id = user.user_id')->join(' pro ON pro.pro_id = score.pro_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('scoreData',$scoreData);
		$this->assign('page',$show);
        $this->display();
	}
	
	//修改分数
	public function edit_score(){
		$Score = M("score");		
		if(IS_GET){
			$map['pro_id']=I('pro_id');
			$map['user_id']=I('user_id');
			$result =$Score->where($map)->select();
			$this->assign('scoreData',$result[0]);
			$this->display('edit_score');
		}else{
			$Score->create();
			$Score->save(); // 根据条件保存修改的数据
			$this->success('修改成功',U('index'));	
		}
	}
	//删除不符合要求的分数
	public function delete(){
		$Config = M("config");
		$configData=$Config->select();
		$Project = M("pro");
		$Score = M("score");
		$map['pro_id']=I('pro_id');
		$map['user_id']=I('user_id');
		
		$result =$Score->where($map)->delete();
		
		//计算Score中varscore的总和
		$map1['pro_id']=I('pro_id');
		$map1['role']="老师";
		$scoreData1 = $Score->join('user ON score.user_id = user.user_id')->where($map1)->sum('varscore');
		$scoreDataCount1 = $Score->join('user ON score.user_id = user.user_id')->where($map1)->count();

		$map2['pro_id']=I('pro_id');
		$map2['role']="学生";
		$scoreData2 = $Score->join('user ON score.user_id = user.user_id')->where($map2)->sum('varscore');
		$scoreDataCount2 = $Score->join('user ON score.user_id = user.user_id')->where($map2)->count();
		
		$varscore=$scoreData1/$scoreDataCount1*$configData[0]['teacher_weight']+$scoreData2/$scoreDataCount2*$configData[0]['student_weight'];
		$data['score'] = $varscore;
		$Project->where('pro_id='.I('pro_id'))->save($data);
		
		if($result ){
			$this->success('删除成功',U('index'));
		}else{
			$this->error('删除失败');
		}
	}
	
	//批量删除学生
	public function delete_scores(){
		$Score = M("score");
		$map['user_id']=array('in',I('user_id'));
		$result =$User->where($map)->delete();
		if($result ){
			$this->success('删除成功',U('index'));
		}else{
			$this->error('删除失败');
		}
	}
	//更新分数
	public function saveScore(){
		$Config = M("config");
		$configData=$Config->select();
		$Project = M("pro");
		$Score = M("score");
		$proIdArray=$Project->select();
		
		for($i=0;$i<count($proIdArray);$i++){
			//计算Score中varscore的总和
			$proId=$proIdArray[$i]['pro_id'];
			$map1['pro_id']=$proId;
			$map1['role']="老师";
			$scoreData1 = $Score->join('user ON score.user_id = user.user_id')->where($map1)->sum('varscore');
			$scoreDataCount1 = $Score->join('user ON score.user_id = user.user_id')->where($map1)->count();

			$map2['pro_id']=$proId;
			$map2['role']="学生";
			$scoreData2 = $Score->join('user ON score.user_id = user.user_id')->where($map2)->sum('varscore');
			$scoreDataCount2 = $Score->join('user ON score.user_id = user.user_id')->where($map2)->count();
			
			$varscore=$scoreData1/$scoreDataCount1*$configData[0]['teacher_weight']+$scoreData2/$scoreDataCount2*$configData[0]['student_weight'];
			$data['score'] = $varscore;
			$Project->where('pro_id='.$proId)->save($data);
			
			// 统计已打分总人数
			$map4['pro_id']=$proId;
			$result4=$Score->where($map4)->count();
			$data1['count_people'] = $result4;
			$Project->where($map4)->save($data1);
			//统计已打分总人数结束
		}
		
		$count=$Project->count();
		$Page       = getpage($count,20);
		$show       = $Page->show();
		$scoreData = $Project->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('scoreData',$scoreData);
		$this->assign('page',$show);
		$this->display('tongji');
	}
	
}