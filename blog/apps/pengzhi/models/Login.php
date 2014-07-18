<?php 
namespace blog\pengzhi\models;
class Login extends \Phalcon\Mvc\Model
{
	public $username;
	public $password;
	public $accesstime;
	
	public function  getSource() {
		return "access_log"; //map db table name
	}
	public static function checkLogin($username, $password) {
		try {
			
		} catch (\Exception $e)
	}
}

?>