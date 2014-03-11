<?php
require APPLICATION_ENV.'/Application/com/application_rely.php';

/**
 * TODO:设置只new 一次
 * @author rube
 *
 */
class applicationRun{
	private $controll;
	public function Run($type=1,$conKey='con',$actKey='act'){
		
		/*** 设置超全局变量,为以后检验GET提供方便 ***/
		$GLOBALS['conKey']=$conKey;
		$GLOBALS['actKey']=$actKey;
		
		$controll=new ControllRun($type, $conKey, $actKey);
		$controll->Run();
	}
}