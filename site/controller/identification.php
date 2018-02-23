<?php

	require("better_crypt.php");
	
	$student_name =	 explode('.', $_POST['mail'])[0];
	$student_mail =	 $_POST['mail'];
	$password_entered = better_crypt($_POST['password'], 10);
	$password_hash;
	$student_year =  $_POST['year'];


	require("../model/identification.php");
	require("../view/identification.php");
	
	$id_result = 'Erreur d\'identification pour ';

	if(crypt($password_entered, $password_hash) == $password_hash) {
	$id_result = 'Identification réussie';
}
?>
