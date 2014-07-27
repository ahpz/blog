<?php
/*
*@file console.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-23
*@brief
*/

$di = new \Phalcon\DI\DefaultFactory\CLI();
$app = new \Phalcon\CLI\Console();
$app->setDI($di);
$app->registerModules(array(
	"penghui" => array(
			"className" => "blog\penghui\Task",
			"path" => "../apps/penghui/Task.php",
	 ),	
));
$app->handle($args);