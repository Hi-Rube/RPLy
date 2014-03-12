<?php
require APPLICATION_ENV.'/APP/index.php';
class dong extends APP{
	public function asdd(){
		$db=$this->DBInit();
		$view=$this->viewInit();
		$this->comInit('v/test');
		$data[0]['key']='a';
		$data[0]['value']=$db->getAll("select * from Admin")[0]['UserName'];
		$view->render($data);
		$view->Run('b.htmld');
	}
}