<?php
/*
 *获取路由路径
 *$type=1 参数形式 $type=0 URI形式
 *TODO:多种路由方式 
 */
function controll_Route_Init($type){
	$reqParse=array();
	if ($type==1){
		$reqQuery=$_SERVER["QUERY_STRING"];
		$reqQueryArr=explode('&', $reqQuery);
		for ($i=0; $i<count($reqQueryArr); $i++){
			$eachParse=explode('=', $reqQueryArr[$i]);
			$reqParse[$eachParse[0]]=$eachParse[1]; 
		}			
	} else if ($type==0){
			
	}
	else throw new Exception('路由形式错误--$type=(1 || 0)');
	return $reqParse;
}

/*
 * 以参数的方式控制路由
 */
function controll_Route_By_Parse(){
	$routePath=controll_Route_Init(1);
	return $routePath;
}




