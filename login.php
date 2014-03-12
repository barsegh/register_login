<?php
session_start();
include('function.php');
$user= new User();

if($user->session()){
	header("location:account.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$login = $user->login($_POST['userlogin'],$_POST['password']);

	if($login){
		header("location:login.php");
	}else{
		echo "Ծածկանունը կամ գաղտնաբառը սխալ է";
	}
}
?>

<form action="" method="POST" name="login">
	Էլ-հասցե կամ Ծածկանուն
	<input type="text" name="userlogin" />
	Գաղտնաբառ
	<input type="text" name="password" />
    <input type="submit" value="Մուտք" />
</form>