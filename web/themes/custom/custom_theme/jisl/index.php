<?php



$allowed_arr=array('localhost','127.0.0.1','::1');



//if(!in_array($_SERVER['REMOTE_ADDR'],$allowed_arr)) {

//echo "Work in Progress..!"; die();

//}



// change the following paths if necessary

$yii=dirname(__FILE__).'/../yii/framework/yii.php';

$config=dirname(__FILE__).'/protected/config/main.php';



// remove the following lines when in production mode

defined('YII_DEBUG') or define('YII_DEBUG',false);

// specify how many levels of call stack should be shown in each log message

defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);







require_once($yii);

Yii::createWebApplication($config)->run();

