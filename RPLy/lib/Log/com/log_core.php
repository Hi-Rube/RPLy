<?php

/*
 * 查找配置文件中日志文件位置
 * @return 日志文件位置
 */
function log_core_Init(){
	$xmlFileName=APPLICATION_PATH.'/Config/config.xml';
	if (!file_exists($xmlFileName)){
		die('config Error:无法找到App/Config目录下的config.xml配置文件');
	} else
	$config=simplexml_load_file($xmlFileName);
	$logFile=APPLICATION_PATH.$config->system->logFile;
	return $logFile;
}

/*
 * 向日志文件中插入日志信息
 * @return 插入是否成功(0||>0)
 */
function log_core_put($data){
	$data.="\n";
	$logFile=log_core_Init();
	if (!file_exists($logFile)) {
		die("config Error:{$logFile}日志文件无法找到");
	} else 
	return file_put_contents($logFile, $data, FILE_APPEND);
}

/*
 * 记录日志
 * $data 信息
 * @return true:插入成功 false:插入失败 
 */
function log_core($data){
	if (log_core_put($data)>0) {
		return true;
	} else return false;
}