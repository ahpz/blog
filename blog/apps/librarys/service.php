<?php
/*
*@file service.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-23
*@brief
*/
namespace blog\librarys;
class Service 
{
	private  static $_instance = null;
	private function __construct()
	{
		echo "construct service";
		
	}
	public static function getInstance()
	{
		if (! self::$_instance instanceof self) {

			self::$_instance = new self();
		}
		return self::$_instance;
	}
}
