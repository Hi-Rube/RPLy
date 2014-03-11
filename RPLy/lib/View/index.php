<?php
class viewRun{
	/**
	 * 视图参数加载
	 * @param unknown $data  如果为数组 以$arr['key'] $arr['value'] 的形式
	 * @param unknown $value
	 */
	function view_render($data,$value){
		if (is_array($data)){
			for ($i=0; $i<count($data); $i++){
				$this->$data[$i]['key']=$data[$i]['value'];
			}
		} else {
			$this->$data=$value;
		}
	}
	
	/**
	 * 视图显示
	 * @param unknown $viewTemp 模板名称 默认为.html后缀 可修改 如Rube.ly
	 */
	function view_show($viewTemp){
		$v=explode('.', $viewTemp);
		if (count($v)<2){
			$viewTemp.='.html';
		}
		$viewsPath=APPLICATION_PATH.'/View/'.$viewTemp;
		require $viewsPath;
	}
	
	/**
	 * 运行视图
	 * @param unknown $viewTemp
	 */
	public function Run($viewTemp){
		$this->view_show($viewTemp);	
	}

	/**
	 * 参数接入
	 * @param unknown $data
	 * @param unknown $value
	 */
	public function render($data,$value){
		$this->view_render($data, $value);
	}
}
