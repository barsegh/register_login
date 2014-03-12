<?php
include('connect.php');

class User{
	function register($name,$username,$password,$email){
		$password = md5($password);
		$sql = mysql_query("SELECT id FROM users WHERE username='$username' or email='$email'");
		$num_rows = mysql_num_rows($sql);

		if($num_rows == 0){
			$result = mysql_query("INSERT INTO users(name,username,password,email) VALUE ('$name','$username','$password','$email')") or die(mysql_error());
			return $result;
		}else{
			return false;
		}

	}

	function login($userlogin,$password){
		$password = md5($password);
		$result = mysql_query("SELECT id FROM users WHERE (email='$userlogin' or username='$userlogin') and password='$password'");
		$array = mysql_fetch_array($result);
		$num_rows = mysql_num_rows($result);

		if($num_rows === 1){
			$_SESSION['login'] = true;
			$_SESSION['id'] = $array['id'];
			return true;
		}else{
			return false;
		}

	}

	function logout(){
		$_SESSION['login'] = false;
		session_destroy();

	}

	function session(){
		return $_SESSION['login'];

	}

	function get_name($id){
		$result = mysql_query("SELECT name FROM users WHERE id='$id'");
		$array =  mysql_fetch_array($result);
		echo $array['name'];

	}
}
?>
