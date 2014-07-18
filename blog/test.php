<?php
print_r(get_loaded_extensions());
phpinfo();
echo "debug";
echo "debug";
$i=0;
while (($a=$i)) {
	echo $a;
	$i++;
	if ($a > 10) break;
}


try {
// $db = new \Phalcon\Db\Adapter\Pdo\Mysql(array(
// 		"host" => "localhost",
// 		"dbname" => "blog",
// 		"port" => 3306,
// 		"username" => "root",
// 		"password" => "123456"
// 		));
//$users=$db->fetchOne("select * from `users`;");
//print_r($users);
} catch(\Exception $err) {
	echo $err->getMessage();
}
