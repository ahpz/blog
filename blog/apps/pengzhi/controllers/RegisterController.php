<?php
namespace blog\pengzhi\controllers;
use blog\pengzhi\models\User; //否则下面User 需要全部路径
use blog\pengzhi\models\Log;
use blog\librarys\Service;

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
    public function loginAction()
    {
    	if ($this->session->has("limit")) echo $this->session->get("limit");
//     	if (isset($_SESSION['limit'])) {
//     		echo $_SESSION['limit'];
//     	}
//     	else {
//     		echo "not exist";
//     	}
    	//$this->flash->notice("login");
//     	$log = new Log();
//     	$log->test();
    	//$ser = Service::getInstance();
//     	$params = $this->router->getParams();
//     	print_r($params);
//     	$params = $this->dispatcher->getParams();
//     	print_r($params);
    	
    	
    	
    }
	public function testAction($param)
	{
		
		$this->session->set("limit", time()+5);
		//$ser = Service::getInstance();
// 		echo "first param:".$param."\n";
		
	
// 		$params = $this->router->getParams();
// 		print_r($params);
// 		foreach($params as $it) {
// 			echo $it."\n";
// 		}
// 		$sign = $_REQUEST["sign"];
// 		echo "sign:".$sign;
// 		$data = $this->request->get("data");
// 		echo "data:".$data;
// 		$this->flash->success("success");
// 		return $this->dispatcher->forward(array("controler" => "login", 
// 				"action" => "login",
// 				"params" => array(1,3),
// 		));
		//$this->view->pick("login/login"); 
		
// 		$log = Log::findFirst(array("id=3")); // "id"=>1 id= 1都行
// 		echo $log->subject;
//  		if($log === true) echo "true";
//  		if ($log === false) echo "fales";
		$this->dispatcher->forward(array("controller" => "register", "action" => "login"));
// 	     $log->subject = "subject";
// 	     //$log->add_time = date("Y-m-d H:i:s");
// 	     if ($log->save() === false) {
// 	     	foreach($log->getMessages() as $message) echo $message;
// 	     	echo "falses";
// 	     } else {
// 	     	echo "success";
// 	     	echo json_encode($log);
// 	     }
// 		print_r($params);
// 		echo "\n";
// 		echo "</br>";
// 		$params = $this->router->getParams();
// 		print_r($params);
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

// 		$con = $this->getDI()->get("db");
// 		$sql = "select * from log where id = ?";
// 		//$sth = $con->executePrepared($sql, array(1 => 3), \Phalcon\DB\Column::BIND_PARAM_INT);
// 		//$ret = $con->fetchOne($sql,\Phalcon\Db::FETCH_ASSOC, array(3));
// 		$ret = $con->execute($sql, array(3));
// 		echo json_encode($ret);
		
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