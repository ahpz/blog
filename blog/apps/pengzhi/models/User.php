<?php
namespace blog\pengzhi\models;
/*
*@file User.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-16
*@brief
*/


class User extends \Phalcon\Mvc\Model
{
	public $username;
	public $password;
	
	public function getSource()
	{
		return "user";
	}
	public function getSchema() //数据库名称 blog
	{
		return "blog"; //映射的数据库名
	}
}