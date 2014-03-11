<?php
require APPLICATION_ENV.'/Controll/com/controll_route.php';
require APPLICATION_ENV.'/Controll/com/controll_action.php';
require APPLICATION_ENV.'/Controll/com/controll_rely.php';

class ControllRun{
	private $parse;
	private $conKey;
	private $actKey;
	function __construct($type,$conKey,$actKey){
			if ($type==NULL || $type==1){
				try {
					$this->parse=controll_Route_By_Parse();
				} catch (Exception $e){
					runingLog($e->getMessage()."\n".'Detail:'.$e->getTraceAsString()."\n\n");
				}
				
			}
			$this->conKey=$conKey;
			$this->actKey=$actKey;
	}
	
	public function Run(){
		try{
			controll_Action($this->parse, $this->conKey, $this->actKey);
		} catch (Exception $e){
			runingLog($e->getMessage()."\n".'Detail:'.$e->getTraceAsString()."\n\n");
		}
		  
	}
}