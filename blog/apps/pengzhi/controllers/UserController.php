<?php
/*
*@file UserController.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-19
*@brief
*/
namespace blog\pengzhi\controllers;
class UserController extends \Phalcon\Mvc\Controller
{
	
	public function indexAction()
	{
	   //session 获取用户名
// 	  // $this->flash->notice($this->session->get("username"));
// 	  $this->session->set("username", "940251401@qq.com");
// 	   if ($this->session->has("username")) {
// 	   	$user = \blog\pengzhi\models\User::findFirst("username='".
// 	   			$this->session->get("username")."'");
// 	   	$this->logger->log("username:{$usrname}", \Phalcon\Logger::NOTICE);
// 	   	if (count($user) === 1) {
// 	   		$info = $user->objectToArray();
// 	   		foreach($info as $k=>$v) {
// 	   			$this->view->setVar($k,$v);
// 	   		}
// 	   	}
// 	   } else {
// 	   	  $this->logger->log("You must login first", \Phalcon\Logger::ERROR);
// 	   	  $this->flash->error("You must login first");
// 	   }
		//
		
	}
	public function saveIndex()
	{
		$user = new \blog\pengzhi\models\User();
		$user->username = $this->request->getPost("username");
		$user->sex = $this->request->getPost("sex");
		$user->age = $this->request->getPost("age");
		
		$user->email = $this->request->getPost("email");
		$user->address = $this->request->getPost("address");
		$fileName = $this->request->getFiles()["image"]["name"];
		$fileSize = $this->request->getFiles()["image"]["size"];
		
		$user->password = $this->request->getPost("password");
		if ($user->save() === false) {
			$this->logger->log("save user info fail", \Phalcon\Logger::ERROR);
			$this->flash->error("save userinfo fail");
		} else {
			$this->flash->success("save userinfo success");
		}
	}
	
}