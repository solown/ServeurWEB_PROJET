<?php

	require("better_crypt.php");
	
	$student_name =	 explode('.', $_POST['mail'])[0];
	$student_mail =	 $_POST['mail'];
	$password_entered = $_POST['password'];
	$password_hash;

	require("../model/login.php");

	if(crypt($password_entered, $password_hash) == $password_hash) {
		session_start();
		echo "OK";
		$_SESSION['id'] = $id_student;		
	}
	else
		echo "FAIL";

?>
