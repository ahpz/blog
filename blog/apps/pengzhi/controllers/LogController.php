<?php
/*
*@file LogController.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-16
*@brief
*/
namespace blog\pengzhi\controllers;
class LogController extends \Phalcon\Mvc\Controller
{
	public function indexAction()
	{
		
	}
	public function saveAction()
	{
		$log = new \blog\pengzhi\models\Log();
		$log->subject = $this->request->getPost("subject");
		$log->content = $this->request->getPost("content");
		if ($log->save() === false) {
			$this->logger->log("save individual log fail", \Phalcon\Logger::ERROR);
			$this->flash->error("save individual log fail:".json_encode(array("subject"=>
					$log->subject,"content"=> $log->content)));
		} else {
			$this->flash->success("save log success");
		}
		//$this->view->setVar("save", "success");
	}
}

