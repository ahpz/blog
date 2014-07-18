<?php
namespace blog\suchang;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
	
	public function registerAutoloaders()
	{
		$loader = new \Phalcon\Loader();
		$loader->registerDirs(array(
				"./controllers/",
				"../models/"))->register();
		
	}
	public function registerServices($di) 
	{
		
		$view = new \Phalcon\Mvc\View();
		$view->setViewsDir("./views/");
		$di->setShared('view', $view);
		$db = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
				 'host' => 'localhost',
				 'dbname' => 'blog',
				 'port' => 3306,
				 'username' => 'root',
				 'password' => '123456'
				 
				));
		$di->setShared('db', $db);
		$logger = new \Phalcon\Logger\Adapter\File("./logs/log.txt");
		$di->setShared("logger", $logger);
		
	}
}