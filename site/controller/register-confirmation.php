<?php

require("better_crypt.php");
require("../model/register-student.php");

$student_name =	explode('.', $_POST['mail'])[0];
$student_name = strtoupper($student_name[0]) . substr($student_name, 1, strlen($student_name) -1 );
$student_mail =	 $_POST['mail'];
$password_hash = better_crypt($_POST['password'], 10); 
$student_year =  $_POST['year'];

register_student($student_name, $student_mail, $password_hash, $student_year);

require("../view/register-confirmation.php");

$token_hash = md5($student_mail.date('Y-m-d H:i:s').rand());


require_once("../model/create-token.php");
require_once("../vendor/autoload.php");

$transport = (new Swift_SmtpTransport("smtp.gmail.com", 465, "ssl"))
	->setUsername("find.the.r8.one@gmail.com")
	->setPassword("tindertinder")
;

$mailer = new Swift_Mailer($transport);

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

$message = (new Swift_Message("Registration confirmation"))
	->setFrom(["find.the.r8.one@gmail.com" => "Find the right one"])
	->setTo([$student_mail."@etu.parisdescartes.fr" => $student_name])
	->setBody("Please, confirm your registration by clicking on the following link : http://tinder.student.elwinar.com/view/loginPerso.php?token=".$token_hash."&name=".$student_name."\n")
//	->setBody("Please, confirm your registration by clicking on the following link : " . $_SERVER['SERVER_NAME'] . "/view/loginPerso.php?token=".$token_hash."&name=".$student_name."\n")

;

$result = $mailer->send($message);

if($result)
	create_token($token_hash, $student_mail);
echo "END";
?>
