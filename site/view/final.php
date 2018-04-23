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
		<link rel="stylesheet" href="../styles/style.css">
		<!--		<font>				-->
		<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<!--		<bootstrap>				-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>

	<body>
		<div class="menu">
			<a href="#" class="menu_inactive">swipe</a>
			<a href="../view/updateprofile.php" class="menu_inactive">my account</a>
			<a href="#" class="menu_active">messages</a>
			<a href="../view/logout.php" class="menu_inactive">log out</a>
		</div>
		<div class="row ">
			<div class="col-3 final_section">
				<!--lien vers le profil-->
				<div class="final_title"><a href="#">parrain</a></div>
				<!-- ou maraine selon le profil-->
				<div><img src="../images/alice.png" alt=""></div>
			</div>

			<div class="col-3 offset-6 final_section">
				<!--lien vers le profil-->
				<div class="final_title"><a href="#">fieul</a></div>
				<!--ou fieule selon le profil-->
				<div><img src="../images/magne.png" alt=""></div>
			</div>
			<div class="slogan2">You find the right one.</div>
		</div>
	</body>

	</html>
