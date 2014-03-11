<?php
require APPLICATION_ENV.'/View/index.php';
class dong{
	public function asdd(){
		$view=new viewRun();
		$data[0]['key']='a';
		$data[0]['value']='love yaner';
		$view->render($data);
		$view->Run('b.htmld');
	}
}