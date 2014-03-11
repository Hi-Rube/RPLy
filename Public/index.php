<?php
set_include_path(get_include_path().':'.realpath('../').'/RPLy/lib');	
defined ( 'APPLICATION_PATH' ) || define ( 'APPLICATION_PATH', realpath ( dirname ( __FILE__ ) . '/../App' ) );
defined ( 'APPLICATION_ENV' ) || define ( 'APPLICATION_ENV', realpath ( dirname ( __FILE__ ) . '/../RPLy/lib' ) );
require (APPLICATION_ENV.'/Application/index.php');
$APP=new applicationRun();
$APP->Run();



