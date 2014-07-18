<?php
namespace blog\pengzhi\controllers;
class IndexController extends \Phalcon\Mvc\Controller
{
	public function indexAction()
	{
		
		
// 		$this->dispatcher->forward(array(
//             "controller" => "login",
//             "action" => "login"
//         ));

		//echo "indexAction\n";
		//echo $this->getDI()->get("router")->getActionName();
	}
	
	public function testAction()
	{
		//$log = new \blog\pengzhi\models\Log();
		//$log->test();
		\blog\pengzhi\models\Log::test();
		
	}
}