<?php
/*
*@file Log.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-16
*@brief
*/
namespace blog\pengzhi\models;
class Log extends \Phalcon\Mvc\Model
{
	public $subject;
	public $content;
	
  
	public function initialize() //新建 对象时 自动调用的方法 
	{
		$this->setConnectionService("db");  //默认是di中的db服务
		echo "initialize";
		
	}
	public function getSource()  //可以修改对应的表名 
	{
		return "log";
	}
	public function getSchema()  //默认木有返回值 
	{
		return "blog";
	}
	public function test()
	{
		echo "logtest";
	}
	
	
}

