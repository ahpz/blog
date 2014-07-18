<?php
namespace blog\pengzhi\controllers;
class LoginController extends \Phalcon\Mvc\Controller
{
	public function indexAction()
	{
       //echo "index";
      // $this->view->pick("login/login");// 默认是登陆
		if($this->request->isPost() === true) {
			$username = $this->request->getPost("username","email");
			$password = $this->request->getPost("password","string");
			$user =\blog\pengzhi\models\User::findFirst("username='".$username."'");
			if (strcmp($user->password, $password) === 0) {
				//$this->flash->success("login succss");
				return $this->dispatcher->forward(array("controller" => "main", "action" => "index")); //不需要return 也可以 (成功跳转到main/index)
			} else {
				//$this->flash->success("login fail");
				$this->view->setVar("info", "Your username or password is wrong!");
				return $this->dispatcher->forward(array("controller"=>"login","action"=>"login"));//模块 内部 跳转 服务器端
			}
		
		} else {
			$this->getDI()->get("logger")->error("request is not post");
			$this->view->pick("login/login");//controller + action
		}
       
	}
	public function registerAction($params)
	{
		echo "ok";
		print_r($params);
		echo "\n";
		print_r($this->router->getParams());
	}

	public function loginAction()
	{
		
		
	}
}