<?php
require 'config.php';
class DB
{
	public static function getConnect(){
		// 创建连接
		global $db_host, $db_user, $db_password,$db_name,$db_port;
		$conn = new mysqli($db_host, $db_user, $db_password,$db_name,$db_port);
		// 检测连接
		if ($conn->connect_error) {
		    die("连接失败: " . $conn->connect_error);
		} 
		return $conn;
	}
	public static function checkUser($name,$password){
		$ret = false;
		$conn = DB::getConnect();
		$sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
		    while($row = $result->fetch_assoc()) {
				$ret = true;
		    }
		}
		$conn->close();
		return $ret;
	}
}
//test
// $ret = DB::checkUser("chenglong","123456987");
// echo $ret;
?>