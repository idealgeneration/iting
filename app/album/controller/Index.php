<?php
namespace app\album\controller;
use think\Request;
use think\Db;

class Index{
	public function getAlbumListByAuthId(Request $request){
		$authId=$request->param('authId');
		$pageSize=$request->param('pageSize');
		$pageIndex=$request->param('pageIndex');
		if(!$authId||!$pageIndex||!$pageSize){
			$err_arr=array('result' =>1 ,"msg"=>"param null" );
			return $err_arr;
		}

		$res=Db::name('album')->where(["authid"=>$authId])->paginate($pageSize,false,["page"=>$pageIndex]);
		$res_arr=array('result' => 0);
		$result=array_merge($res->toArray(),$res_arr);
		return $result;
	}

	public function getAlbumListByTagId(Request $request){
		$tagId=$request->param('tagId');
		$pageIndex=$request->param('pageIndex');
		$pageSize=$request->param('pageSize');
		if(!$tagId||!$pageIndex||!$pageSize){
			$err_arr=array('result' =>1 ,"msg"=>"param null" );
			return $err_arr;
		}

		$res=Db::name('album')->where(['tagid'=>$tagId])->paginate($pageSize,false,['page'=>$pageIndex]);
		$res_arr=array('result'=>0);
		$result=array_merge($res->toArray(),$res_arr);
		return $result;
	}

}