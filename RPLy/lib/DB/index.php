<?php 
require APPLICATION_ENV.'/DB/com/DB_mysql.php';
$xmlFileName=APPLICATION_PATH.'/Config/config.xml';
if (!file_exists($xmlFileName)){
	die('config Error:无法找到App/Config目录下的config.xml配置文件');
} else
	$config=simplexml_load_file($xmlFileName);

define ('RPLy_DBHOST', $config->application->DBHost);
define ('RPLy_DBUSER', $config->application->DBUserName);
define ('RPLy_DBPW',  $config->application->DBPassWord);
define ('RPLy_DBNAME', $config->application->DBName);

