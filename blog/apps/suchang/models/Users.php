<?php
class Users extends \Phalcon\Mvc\Model
{
	public function initialize()
	{
		$this->setConnectionService("db");
	}
	public function getSource()
	{
		return "users";//建立表映射
	}
}