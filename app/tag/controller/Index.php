<?php
namespace app\tag\controller;
use think\Request;
use think\Db;

class Index{
	public function getTagList(Request $request){
		$res=Db::name("tag")->select();
		$res_arr=array('result' => 0, "tagList"=>$res);
		return $res_arr;
	}
}