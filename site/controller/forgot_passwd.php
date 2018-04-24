<?php

require("../model/create_forgot_passwd_token.php");

$student_name =	explode('.', $_POST['mail'])[0];
$student_name = strtoupper($student_name[0]) . substr($student_name, 1, strlen($student_name) -1 );
$student_mail = $_POST['mail'];
$token_hash = md5($student_mail.date('Y-m-d H:i:s').rand());

//Send mail to user

require_once("../vendor/autoload.php");

$transport = (new Swift_SmtpTransport("smtp.gmail.com", 465, "ssl"))
	->setUsername("find.the.r8.one@gmail.com")
	->setPassword("tindertinder")
;

$mailer = new Swift_Mailer($transport);

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

$message = (new Swift_Message("Change your password"))
	->setFrom(["find.the.r8.one@gmail.com" => "Find the right one"])
	->setTo([$student_mail."@etu.parisdescartes.fr" => $student_name])
	->setBody("You asked to change your password.\n
Please, click on the following link to reset your password : http://tinder.student.elwinar.com/controller/change_password.php?token=".$token_hash)
;

$result = $mailer->send($message);

if($result)
	create_forgot_passwd_token($token_hash, $student_mail);


require("../view/forgot_passwd_sent.html");

?>
