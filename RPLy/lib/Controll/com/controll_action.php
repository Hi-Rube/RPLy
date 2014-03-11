<?php

/*
 * 获取路由调度控制器方法
 * $parse 路由参数数组 $conKey控制器参数名 $actKey控制方法参数名
 * @return Array([0]=>控制器名,[1]=>方法名) 
 */
function controll_Action_Init($parse,$conKey,$actKey){
	$conValue='';
	$actValue='';
	if ($conKey!==NULL && isset($parse[$conKey]))
		$conValue=$parse[$conKey];
	else $conValue='index';
	
	if ($actKey!=NULL && isset($parse[$actKey]))
		$actValue=$parse[$actKey];
	else $actValue='index';

	if ($actKey==NULL && $conKey==NULL)
	throw new Exception('Action 参数错误--$conKey,$actKey(not defined)');
	return $return=array($conValue,$actValue);
}

/*
 * 控制器脚本的执行
 * $con 控制器文件名,类名 $act控制器方法名
 * @return Exception || true 
 */
function controll_Action_Exec($con,$act){
	$conFile=APPLICATION_PATH.'/Controll/'.$con.'.php';
	if (!file_exists($conFile)){
		throw new Exception('Action执行错误--没有找到相应的控制文件(CON NOT FOUND)');
		return false;
	}else {
		include ($conFile);
		$conClass=$con;
		$conExec=new $con();
		if (is_callable(array($conExec,$act))){
			$conExec->$act();
			return true;
		} else {
			throw new Exception('Action执行错误--没有相应的可执行方法(public ACT NOT FOUND)');
			return false;
		}
	}
}

/*
 * 控制操作
 * $parse 路由参数 $conKey 控制器路由参数名 $actKey 控制器方法参数名
 * @return Exception || true
 */
function controll_Action($parse,$conKey,$actKey){
	if ($conKey==NULL || $actKey==NULL){
		$conKey='con';
		$actKey='act';
	}
	$conAndact=controll_Action_Init($parse, $conKey, $actKey);
	$return=controll_Action_Exec($conAndact[0], $conAndact[1]);
	return $return;
}




