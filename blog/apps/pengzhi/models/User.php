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
	public $guid;
	public $user_id;
	public $username;
	public $age; //0 男 1 女
	public $sex;
	public $email;
	public $password;
	public $image;
	public $address;
	public $mod_time;
	public $add_time;
	public function initialize()
	{
		$this->setConnectionService("db");
	}
	public function getSource()
	{
		return "user";
	}
	//判断当前对象是否合法
	public function isValidated()
	{
		return true;
	}
	public function objectToArray()
	{
		return array(
				"guid" => $this->guid,
				"username" => $this->username,
				"sex" => $this->sex,
				"age" => $this->age,
				"email" => $this->email,
				"password" => $this->password,
				"image" => $this->image,
				"mod_time" => $this->mod_time,
				"add_time" => $this->add_time,
		);
	}
}