<?php

	require("better_crypt.php");
	
	$student_name =	 explode('.', $_POST['mail'])[0];
	$student_mail =	 $_POST['mail'];
	$password_entered = $_POST['password'];
	$password_hash;

	require("../model/identification.php");

	$id_result = 'Erreur d\'identification pour ';

	echo crypt($password_entered, $password_hash); 

	if(crypt($password_entered, $password_hash) == $password_hash) {
		$id_result = 'Identification réussie';
	}

	require("../view/identification.php");
	
?>
