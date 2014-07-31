<?php
namespace blog\pengzhi\controllers;
class IndexController extends \Phalcon\Mvc\Controller
{
	private function initialize()
	{
		echo "initialize";
	}
	public function indexAction()
	{
		
		$this->dispatcher->forward(array("action"=>"test"));
// 		$this->dispatcher->forward(array(
//             "controller" => "login",
//             "action" => "login"
//         ));

		//echo "indexAction\n";
		//echo $this->getDI()->get("router")->getActionName();
	}
	
	public function testAction()
	{
		$url = explode("/", "test");
		echo json_encode($url);
		//$log = new \blog\pengzhi\models\Log();
		////$log->test();
// 		$db = $this->getDI()->get("db");
// 		$res = $db->query("select * from `log2` where id=1;");
// 		$res->setFetchMode(\Phalcon\Db::FETCH_ASSOC);
// 		$res = $res->fetchAll();
		
// 		echo json_encode($res);
		
	}
}