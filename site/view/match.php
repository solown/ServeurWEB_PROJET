<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: ../view/logout.php');
}
?>
	<!DOCTYPE html>
	<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>You Find The Right One</title>
		<!--		<CSS>				-->
		<link rel="stylesheet" href="../styles/main.css">
		<link rel="stylesheet" href="../styles/signup_login.css">
		<!--		<font>				-->
		<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<!--		<bootstrap>				-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>

	<body>
		<div class="menu">
			<a href="#" class="menu_active">swipe</a>
			<a href="../view/updateprofile.php" class="menu_inactive">my account</a>
			<a href="#" class="menu_inactive">messages</a>
			<a href="../view/logout.php" class="menu_inactive">log out</a>
		</div>

		<div class="match_container">
			<div class="match_continue">
				<a href="swipe.php"><img src="../images/continue.png" alt="continue"></a>
			</div>
			<div class="img_profile match_pic_top">
				<a href="updateprofile.php"><img src="../images/images_student/alice.png" alt=""></a>
			</div>

			<div class="match_talk"><img src="../images/Talk.png" alt="talk"></div>
			<!-- faire un truc en js qui permette d'aller sur le profil de la personne cf match -->
			<div class="img_profile match_pic_bot">
				<img src="../images/images_student/alice.png" alt="">
			</div>
			<div class="match_slogan">Votre histoire commence ici.</div>
		</div>


	</body>

	</html>
