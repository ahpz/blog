<?php
namespace blog\pengzhi;
class Module //implements \Phalcon\Mvc\ModuleDefinitionInterface
{
	public function registerAutoLoaders()
	{
	
		$loader = new \Phalcon\Loader();
// 		$loader->registerDirs(array(
// 				"../apps/pengzhi/controllers/",
// 				"../apps/pengzhi/models/"))->register();
		
		$loader->registerNamespaces(array(
				'blog\pengzhi\controllers' => '../apps/pengzhi/controllers/',
				'blog\pengzhi\models' => '../apps/pengzhi/models/',
				'blog\librarys' => "../apps/librarys/"
				))->register();
		
	}
	public function registerServices($di)
	{
		$di->setShared("dispatcher", function() {
			$dispatcher = new \Phalcon\Mvc\Dispatcher();
			$dispatcher->setDefaultNamespace("blog\pengzhi\controllers\\");
			return $dispatcher;
		});
		
		$di->set("view", function() {
			$view = new \Phalcon\Mvc\View();
			$view->setViewsDir("../apps/pengzhi/views/");
			return $view;
		});
		
		$di->set("config", function(){
			$config = new \Phalcon\Config\Adapter\Ini("../apps/pengzhi/configs/dev.ini");
			return $config;
		});
		$di->set("logger", function() use ($di) {
			$fileName = date("Ymd").".txt";
			$file = $di->get("config")->log->dir.$fileName;
			$logger = new \Phalcon\Logger\Adapter\File($file);
			return $logger;
			
		});
		
		$di->set("db", function() use ($di){
			$config = $di->get("config");
			$db = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
					"host" => $config->database->host,
			        "port" => $config->database->port,
					"username" => $config->database->user,
					"dbname" => $config->database->dbname));
			return $db;
		});
		$di->setShared("session", function(){
			$session = new \Phalcon\Session\Adapter\Files(array('uniqueId'=>"pengzhi_blog"));
			$session->start();
			return $session;
			
		});
	}
}