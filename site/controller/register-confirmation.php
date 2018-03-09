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

$transport = (new Swift_SmtpTransport("smtp.gmail.com", 465, "ssl"))
	->setUsername("raphael.neveu98@gmail.com")
	->setPassword("password")
;

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message("Registration confirmation"))
	->setFrom(["raphael.neveu98@gmail.com" => "Choose the right one"])
	->setTo([$student_mail."@etu.parisdescartes.fr" => $student_name])
//	->setBody("Please, confirm your registration by clicking on the following link : http://tinder.student.elwinar.com/view/loginPerso.php?token=".$token_hash."&name=".$student_name."\n")
	->setBody("Please, confirm your registration by clicking on the following link : localhost/view/loginPerso.php?token=".$token_hash."&name=".$student_name."\n")

;

$result = $mailer->send($message);

if($result)
	create_token($token_hash, $student_mail);

?>
