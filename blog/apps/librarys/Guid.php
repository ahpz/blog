<?php
/*
*@file Guid.php
*@author pengzhi (com@baidu.com)
*@date 2014-7-26
*@brief
*/
namespace blog;
class Guid{
	
	static public  function newGuid(){
		$charid = strtoupper(md5(uniqid(mt_rand(), true)));
		$guid = "";
		$guid .= substr($charid,0,8);
		$guid .= "-";
		$guid .= substr($charid, 8, 4);
		$guid .= "-";
		$guid .= substr($charid, 12, 4);
		$guid .= "-";
		$guid .= substr($charid, 16, 4);
		$guid .= "-";
		$guid .= substr($charid, 20, 12);
		return $guid;
		
	}
	

}
