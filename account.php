<?php
session_start();
include("function.php");
$user = new User();
$id = $_SESSION['id'];

if(!$user->session()){
	header("location:login.php");
}

if(isset($_GET['logout']) and $_GET['logout'] == 'yes'){
	$user->logout();
	header("location:login.php");
}
?>

<a href="?logout=yes">Դուս գալ</a>

<h5><?php $user->get_name($id); ?></h5>