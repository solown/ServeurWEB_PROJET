<?php

	require("better_crypt.php");

	$student_name =	 explode('.', $_POST['mail'])[0];
	$student_mail =	 $_POST['mail'];
	$password_hash = better_crypt($_POST['password'], 10); 
	$student_year =  $_POST['year'];

$a = $_POST['mail'] ;
$a .= "@etu.parisdescartes.fr"; 
$message = "hello";

$b = mail($student_mail, 'TEST', $message);
echo($b);
require("../model/register-confirmation.php");



?>
