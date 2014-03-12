<?php
require APPLICATION_ENV.'/APP/APP_rely.php';
class APP{
	public function viewInit(){
		return new viewRun();
	}
	
	public function DBInit(){
		return DB::getInstance();
	}
	
	public function comInit($conName){
		require APPLICATION_PATH."/Com/{$conName}.php";
	}
}