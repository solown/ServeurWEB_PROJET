<?php

	require("better_crypt.php");
	
	$student_name =	 explode('.', $_POST['mail'])[0];
	$student_mail =	 $_POST['mail'];
	$password_entered = $_POST['password'];
	$password_hash;
	$validate_account;
	$adj1; //If it's the first connection, adj1 will be null

	require("../model/login.php");

	if(crypt($password_entered, $password_hash) == $password_hash and $validate_account) {
		session_start();
		$_SESSION['id'] = $id_student;
		if(is_null($adj1))
			echo "FIRST";
		else	
			echo "OK";
	}
	else
		echo "FAIL";

?>
