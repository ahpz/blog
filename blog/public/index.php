<?php 
$di = new \Phalcon\DI\FactoryDefault();//依赖注入 注册一些服务 和 视图模型

$router = new \Phalcon\Mvc\Router();
$router->setDefaultModule("pengzhi");
$router->add("/:module/:controller/:action/:params",
         array( "module" => 1,
         		"controller" => 2,
         		"action" => 3,
         		"params" => 4
         		)
		);
$router->add("/pz/:action/:params",   //测试成功 不稳定
		array(  "module" => "pengzhi",
				"controller" => "register",
				"action" =>1,
				"params" =>2)
		);
// $router->add(
// 		"/:module/",
// 		array(
// 				'module'     => 'pengzhi',
// 				'controller' => 'index',
// 				'action'     => 'index',
// 		)
// );
$di->set("router", $router);


try {
	$app = new \Phalcon\Mvc\Application();
	$app->setDI($di);
	$app->registerModules(array(
			"suchang" => array(
					"className" => "blog\suchang\Module",
					"path" => "../apps/suchang/Module.php"
					),
			"pengzhi" => array(
					"className" => "blog\pengzhi\Module",
					"path" => "../apps/pengzhi/Module.php"
					)
			));
	echo $app->handle()->getContent();
} catch(\Phalcon\Exception $ex) {
	echo $ex->getMessage();
}
?>