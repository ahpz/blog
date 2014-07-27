<?php
/*
*@file console.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-23
*@brief
*/

try {
	//= new \Phalcon\DI\FactoryDefault\CLI();
$di = new \Phalcon\DI\FactoryDefault\CLI();
$di->set("router", function() {
	$router = new \Phalcon\CLI\Router();
	return $router;
});
$app = new \Phalcon\CLI\Console();
$app->setDI($di);
$app->registerModules(array(
	"penghui" => array(
			"className" => "\blog\penghui\Task",
			"path" => "../apps/penghui/Task.php",
	 ),	
 ));
$args = array("module" => "penghui","task" => "Login","action"=> "index");
$app->handle($args);
} catch(\Phalcon\CLI\Console\Exception $e) {
    echo $e->getMessage();
} catch(\Phalcon\CLI\Dispatcher\Exception $e) {
    echo $e->getMessage();
} catch(\Phalcon\Router\Exception $e) {
	echo $e->getMessage();
} catch (\Exception $e) {
	echo "Exception:".$e->getMessage();
}
