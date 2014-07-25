<?php
/*
*@file Task.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-23
*@brief
*/
namespace blog\penghui;
class Task 
{
	public function registerAutoLoaders()
	{
	   $loader = new \Phalcon\Loader();
	   $loader->registerNamespaces(array(
	   				'blog\penghui\models' => "../apps/penghui/models",
	   		        'blog\penghui\tasks' => "../apps/penghui/tasks"  				
	   ))->register();
	   				'blog\penghui\models' => __DIR__."/models",
	   		        'blog\penghui\tasks' =>__DIR__."/tasks",			
	   ));
	   $loader->register();
	}
	
	public function registerServices($di) 
	{
		$di->set("config", function(){
			$config = new \Phalcon\Config\Adapter\Ini("../apps/penghui/confs/dev.ini");			$config = new \Phalcon\Config\Adapter\Ini(__DIR__."/confs/dev.ini");
			return $config;
		});
		$di->setShared("dispatcher", function(){		$di->set("dispatcher", function(){
			$dispatcher = new \Phalcon\CLI\Dispatcher();
			$dispatcher->setDefaultNamespaces("blog\penghui\tasks\\");
			$dispatcher->setDefaultNamespace("blog\penghui\\tasks\\");
			return $dispatcher;
		});
		
		
		
	}
}
	
