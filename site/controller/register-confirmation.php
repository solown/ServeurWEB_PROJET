<?php

require("better_crypt.php");
require("../model/register-student.php");

$student_name =	 explode('.', $_POST['mail'])[0];
$student_mail =	 $_POST['mail'];
$password_hash = better_crypt($_POST['password'], 10); 
$student_year =  $_POST['year'];

register_student($student_name, $student_mail, $password_hash, $student_year);

require("../view/register-confirmation.php");

$token_hash = md5($student_mail);


require_once("../model/create-token.php");
require_once("../vendor/autoload.php");

$transport = (new Swift_SmtpTransport("todo", 25))
	->setUsername("user")
	->setPassword("pass")
;

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message("Registration confirmation"))
	->setFrom(["adresse@domaine.com" => "name"])
	->setTo(["receiver@domaine.com" => "name"])
	->setBody("Please, confirm your registration by clicking on the following link :\n")
;

//$result = $mailer->send($message);

//if($result)
	create_token($token_hash, $student_mail);

?>
