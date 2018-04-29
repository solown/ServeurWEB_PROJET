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

	->setBody("<!DOCTYPE html>
	<html xmlns:v="urn:schemas-microsoft-com:vml">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link href='https://fonts.googleapis.com/css?family=Questrial' rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel="stylesheet">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family: Fjalla One;">
<table bgcolor='#F5F7FA' width="100%" border="0" cellpadding="0" cellspacing="0">
    <tbody>
    	<tr style='color : #707070; font-size:20px'>
		<td align="center">
			Bienvenue <span style='color : #61B8D0'>".$student_name."</span>,
		</td>
    	</tr>
	<tr style='color : #707070; font-size:20px'>
		<td align="center">
			pour valider ton compte clique sur le lien suivant :
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td align="center">
			<a href='http://tinder.student.elwinar.com/view/loginPerso.php?token='.$token_hash.'&name='.$student_name.' style='color : #61B8D0; font-size:20px'>http://tinder.student.elwinar.com/view/loginPerso.php?token='.$token_hash.'&name='.$student_name.'</a>
		</td>
	</tr>
	<tr>
		<td align="center">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td align="center">
			<img src='https://zupimages.net/up/18/17/m23z.pn' alt="Logo" width="500px" height="344px"/>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr style='color : #707070'>
		<td align="center">
			Pense à la planète, après avoir validé ton compte, supprime ce mail.
		</td>
	</tr>
	<tr style='color : #707070'>
		<td align="center">
			Le stockage de mail fait tourner suotidiennement léquivalent de
		</td>
	</tr>
	<tr style='color : #707070'>
		<td align="center">
			quatre centrales nucléaire dans le monde.
		</td>
	</tr>
		</tbody>
</table>

</html>
")

//	->setBody("Please, confirm your registration by clicking on the following link : http://tinder.student.elwinar.com/view/loginPerso.php?token=".$token_hash."&name=".$student_name."\n")
//	->setBody("Please, confirm your registration by clicking on the following link : " . $_SERVER['SERVER_NAME'] . "/view/loginPerso.php?token=".$token_hash."&name=".$student_name."\n")

;

$result = $mailer->send($message);

if($result)
	create_token($token_hash, $student_mail);
echo "END";
?>
