<?php
	require("../view/identification.php");

	$student_name =	 explode('.', $_POST['mail'])[0];
	$student_mail =	 $_POST['mail'];
	$password_hash = better_crypt($_POST['password'], 10); 
	$student_year =  $_POST['year'];
	require("../model/identification.php");
?>
