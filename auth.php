<?php
// Start the session
session_start();
?>

 <?php 
 
	require_once "db.php"; //підключення скрипту
	if (count($_POST)>0) {
		//potential sql injection, 
		

		$query = "SELECT * FROM `users` WHERE login = '{$_POST['login']}' AND password = '{$_POST['password']}'";
		$res = mysqli_query ($conn,$query);
		$row = mysqli_fetch_array($res);
		if (is_array($row)){
			$_SESSION["id_role"] = $row["id_role"];
			$_SESSION["login"] = $row["login"];
		} else {
			$_SESSION["id_role"] = false;
			$_SESSION["login"] = false;
			echo "Invalid password";
		}
}

	
	/*if(!strcmp($login,$_POST["login"]) && !strcmp($password,$_POST["password"]) ){
		$_SESSION["auth"] = true;
}else $_SESSION["auth"] = false;*/
	header('Location: mainDontAuth.php');
?>
 
