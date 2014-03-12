<?php
include("function.php");
$user = new User();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$register = $user->register($_POST['name'],$_POST['username'],$_POST['password'],$_POST['email']);

	if($register){
		echo "Գրանցումը ավարտվեց հաջողությամբ մուտ գործելու համար <a href='login.php'>սեղմեք այստեղ</a>";
	}else{
		echo "Գրանցման ընթացում տեղի է ունեցել սխալ";
	}
}

?>

<form action="" method="POST" name="reg">
	ԱՆուն
	<input type="text" name="name" />
	Ծածկանուն
	<input type="text" name="username" />
	Գաղտնաբառ
	<input type="password" name="password" />
	Էլ-հասցե
	<input type="text" name="email" />
	<input type="submit" value="Գրանցվել" />

</form>