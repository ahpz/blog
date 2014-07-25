<?php
/*
*@file console.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-23
*@brief
*/
<<<<<<< HEAD

try {
	//= new \Phalcon\DI\FactoryDefault\CLI();
=======
try {
>>>>>>> 9a7b98aedd25d2481c76116b57d22b6eb2b32484
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
<<<<<<< HEAD
			"path" => "../apps/penghui/Task.php",
=======
			"path" => __DIR__."/../apps/penghui/Task.php",
>>>>>>> 9a7b98aedd25d2481c76116b57d22b6eb2b32484
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
