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

$psw_link = 'http://tinder.student.elwinar.com/view/change_passwd.php?mail='.$student_mail.'&token='.$token_hash;

$message = (new Swift_Message("Change your password"))
	->setFrom(["find.the.r8.one@gmail.com" => "Find the right one"])
	->setTo([$student_mail."@etu.parisdescartes.fr" => $student_name])
	->setBody(
		'<!DOCTYPE html>'.
		  '<html xmlns:v="urn:schemas-microsoft-com:vml">'.
		  '<head>'.
		      '<meta http-equiv="content-type" content="text/html; charset=utf-8">'.
		      '<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">'.
		      '<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet" type="text/css">'.
		      '<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">'.
		  '</head>'.
		  '<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family: Fjalla One;">'.

		  '<table bgcolor="#F5F7FA" width="100%" border="0" cellpadding="0" cellspacing="0">'.
		      '<tbody>'.
		        '<tr style="color : #707070; font-size:20px">'.
		    '	<td align="center">'.
		        'Bonjour <span style="color : #FF5544">'.$student_name.'</span>,'.
		      '</td>'.
		        '</tr>'.
		  '	<tr style="color : #707070; font-size:20px">'.
		  '		<td align="center">'.
		  '			pour réinitialiser ton mot de passe clique sur le lien suivant :'.
		  '		</td>'.
		  '	</tr>'.
		      '<td>'.
		      '	<tr>'.
		      '	&nbsp;'.
		      '</td>'.
		  '	<tr>'.
		  '	</tr>'.
		  '		<td align="center">'.
		  '			<a href="'.$psw_link.'" style="color : #FF5544; font-size:20px">'.$psw_link.'</a>'.
		  '		</td>'.
		  '	</tr>'.
		  '	<tr>'.
		  '		<td align="center">'.
		    '	</td>'.
		      '			&nbsp;'.
		  '	</tr>'.
		  '	<tr>'.
		  '		<td align="center">'.
		  '			<img src="https://zupimages.net/up/18/17/m23z.png" alt="Logo" width="500px" height="344px"/>'.
		  '		</td>'.
		  '	</tr>'.
		  '	<tr>'.
		  '		<td>'.
		  '			&nbsp;'.
		  '		</td>'.
		    '<tr style="color : #707070">'.
		    '	</tr>'.
		    '	<td align="center">'.
		    '		Pense à la planète, après avoir validé ton compte, supprime ce mail.'.
		    '	</td>'.
		    '</tr>'.
		    '<tr style="color : #707070">'.
		    '	<td align="center">'.
		    '		Le stockage de mail fait tourner quotidiennement l équivalent de'.
		    '	</td>'.
		  '	</tr>'.
		      '<tr style="color : #707070">'.
		  '		<td align="center">'.
		  '			quatre centrales nucléaire dans le monde.'.
		  '		</td>'.
		    '  </tbody>'.
		      '	</tr>'.
		'		</table>'.
		'		</html>',"text/html"
	);

$result = $mailer->send($message);

if($result)
	create_forgot_passwd_token($token_hash, $student_mail);


//equire("../view/forgot_passwd_sent.html");

?>
