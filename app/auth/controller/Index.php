<?php
namespace app\auth\controller;

use think\Controller;
use think\Db;

class Index extends Controller{
	// public function insert(){
	// 	for($i=10;$i<20;$i++){
	// 		$res=Db::name('author')->insert(["authid"=>"AXNLA000".$i,"authname"=>"测试播音员".$i,"authdesc"=>""]);
	// 		dump($res);
	// 	}
	// }

	// public function update(){
	// 	$res=Db::name('author')->where(["authid"=>"AXMLA00001"])->update(["authimg"=>""]);
	// 	dump($res);
	// }
	/**
		获取播音员列表
	*/
	public function getAuthList(){
		$pageSize=$this->request->param('pageSize');
		$pageIndex=$this->request->param('pageIndex');
		if(!$pageSize||!$pageIndex){
			$res_err=array("result"=>1,"msg"=>"param null");
			return $res_err;
		}
		$res=Db::name('author')->order('authid')->paginate($pageSize,false,["page"=>$pageIndex]);
		$resArr= array('result' =>0);
		$result=array_merge($res->toArray(),$resArr);
		return $result;
	}
}