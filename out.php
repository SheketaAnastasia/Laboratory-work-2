<?php session_start();

	$_SESSION["id_role"] = false;
	$_SESSION["login"] = false;
	header('Location: mainDontAuth.php');
	?>