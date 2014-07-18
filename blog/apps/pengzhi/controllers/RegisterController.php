<?php
namespace blog\pengzhi\controllers;
use blog\pengzhi\models\User; //否则下面User 需要全部路径
use blog\pengzhi\models\Log;
/*
*@file RegisterController.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-16
*@brief
*/

class RegisterController extends \Phalcon\Mvc\Controller
{
	protected $menu = array();
// 	public function __construct()  //final 方法 不能重写
// 	{
// 		$memu = array("url" => "www.baidu.com");
// 	}
	public function testAction($params)
	{
		print_r($params);
		echo "\n";
		echo "</br>";
		$params = $this->router->getParams();
		print_r($params);
// 		echo $this->router->getControllerName();
// 		echo $this->router->getActionName();
// 		print_r($this->router->getParams()); // mdoule/controller/action/parma1/parma2……

		//print_r($this->menu);
 		
//  		$log->test();
 		
//  		echo "\n";
//  		\blog\pengzhi\models\Log::test(); //静态 动态调用都可以的
 		
// 		echo $log->getSchema()." : ".$log->getSource()."\n";
		
		
		
// 		$transactionManager = new \Phalcon\Mvc\Model\Transaction\Manager();
		
// 		$transaction = $transactionManager->get();
// 		$log = new \blog\pengzhi\models\Log();
// 		$log->subject="subject1";
// 		$log->content="content";
		
// 		$log->setTransaction($transaction);
		

// 		if($log->save()==false){
// 			$transaction->rollback("Can't save log");
// 		} else {
// 			$transaction->rollback("Can save log");
// 		}
// 		$transaction->commit();
		
	}
	public function indexAction()
	{
		
		
	}
	public function registerAction()
	{
		if ($this->request->isPost() === true) {
			$username = $this->request->getPost("username");
			$password = $this->request->getPost("password");
			$user = new User();
			$user->username = $username;
			$user->password = $password;
			if ($user->save() === false) {
				$this->getDI()->get("logger")->error("register ".$username." :".$password." fail");
				$this->flash->error("register ".$username." :".$password." fail");
			} else {
				$this->logger->log("register success".$username.":".$password); //controller 中可以直接访问 di中的注册的服务 默认是DEBUG 日志
				//$this->flash->success("register ".$username." :".$password." success");
				//$this->dispatcher->forward(array("controller"=>"main", "action"=>"index"));//可以转达其他controller action
				$this->view->pick("main/index"); //可以跳转
			}
		} else {
			$this->logger->log("request is not send by post", \Phalcon\Logger::ERROR);
		}
	}
}