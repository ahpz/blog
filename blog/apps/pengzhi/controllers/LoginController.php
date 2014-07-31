<?php
namespace blog\pengzhi\controllers;
class LoginController extends ControllerBase
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
				$this->session-set("username",$username);
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
		
		if ($this->request->isPost() === false) {
			$this->render("1002", "you do not have permission");
		} 
		
		$name = $this->request->getPost("name");
		$pass = $this->request->getPost("pass");
		
		
		if ($name && $pass) {
			if (\blog\pengzhi\plugins\UseOpt::doAuth($name, $pass) === true) {
				$this->render("1000", "login success");
			} else {
				$this->render("1001", "login fail");
			}
		}
		$this->render("1002", "params error");
	}
}