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
	   				'blog\penghui\models' => "./models",
	   		        'blog\penghui\tasks' => "./tasks"  				
	   ))->register();
	}
	
	public function registerServices($di) 
	{
		$di->set("config", function(){
			$config = new \Phalcon\Config\Adapter\Ini("../apps/penghui/confs/dev.ini");
			return $config;
		});
		$di->setShared("dispatcher", function(){
			$dispatcher = new \Phalcon\CLI\Dispatcher();
			$dispatcher->setDefaultNamespaces("blog\penghui\\tasks\\");
			return $dispatcher;
		});
		
		
		
	}
}
	
