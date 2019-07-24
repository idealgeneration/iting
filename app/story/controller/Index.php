<?php
namespace app\story\controller;
use think\Request;
use think\Db;

class Index{
	public function getStoryList(Request $request){
		$albumId=$request->param('albumId');
		$pageIndex=$request->param('pageIndex');
		$pageSize=$request->param('pageSize');
		if(!$albumId||!$pageIndex||!$pageSize){
			$err_arr=array('result'=>1,"msg"=>"param null");
			return $err_arr;
		}
		$res=Db::name('story')->where(['albumid'=>$albumId])->paginate($pageSize,false,['page'=>$pageIndex]);
		$res_arr=array("result"=>0);
		$result=array_merge($res->toArray(),$res_arr);
		return $result;
	}
}