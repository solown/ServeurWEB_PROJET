<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: ../view/logout.php');
}
if (isset($_POST['email']){
	$email = $_POST['email']; 
} /*else {
	    header('Location: ../view/swipe.php');
}*/
?>
	<!DOCTYPE html>
	<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>Accueil</title>
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
			<a href="#" class="menu_inactive">swipe</a>
			<a href="../view/updateprofile.php" class="menu_inactive">my account</a>
			<a href="#" class="menu_inactive">messages</a>
			<a href="../view/logout.php" class="menu_inactive">log out</a>
		</div>
		<div class="back"></div>
		<div class="picture_profil"><img src="../images/alice.png" alt=""></div>
		<div class="cloud_profil"><img src="../images/cloud.svg" alt=""></div>
		<div class="year_email_profil">DUT1 - anissa.belleudy@etu.parisdescartes.fr</div>
		<div class="stats_profil">
			<div>2 matchs</div>
			<div>0 parainage</div>
		</div>
		<div class="name_profil">Anissa</div>
		<div class="adj_profil">Drole - Belle - Sexy</div>
		<div class="description_profil">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
	</body>

	</html>
