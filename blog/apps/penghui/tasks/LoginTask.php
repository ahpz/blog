<?php
/*
*@file LoginTask.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-23
*@brief
*/
namespace blog\penghui\tasks;
class LoginTask extends \Phalcon\CLI\Task
{
	public function indexAction()
	{
		echo "indexAction";
		echo __DIR__;
		echo json_encode($this->getDI()->get("config")->database);
	}
}
