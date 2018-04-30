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
		<title>Update profile</title>
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
		<?php include('../model/updateprofile.php') ?>
		<div class="menu">
			<a href="../view/swipe.php" class="menu_inactive">swipe</a>
			<a href="../view/updateprofile.php" class="menu_inactive">my account</a>
			<a href="#" class="menu_inactive">messages</a>
			<a href="../view/logout.php" class="menu_inactive">log out</a>
		</div>
		<div class="back"></div>
		<div class="picture_profile img_profile"><img src="<?php echo htmlspecialchars($picstudent); ?> " alt=""></div>
		<div class="cloud_profile"><img src="../images/cloud.svg" alt=""></div>
		<div class="year_email_profile">
			<span class="DUT">DUT
			<?php echo htmlspecialchars($yearstudent); ?> -</span>

			<?php echo htmlspecialchars($mailstudent); ?>@etu.parisdescartes.fr</div>
		<div class="stats_profile">
			<div><?php echo htmlspecialchars($match); ?> matchs</div>
			<div>0 parainage</div>
		</div>
		<div class="name_profile">
			<?php echo htmlspecialchars($name); ?>
		</div>
		<div class="adj_profile">
			<?php echo htmlspecialchars($word1); ?>-<?php echo htmlspecialchars($word2); ?>-<?php echo htmlspecialchars($word3); ?>
		</div>
		<div class="description_profile">
			<?php echo htmlspecialchars($description); ?>
		</div>
	</body>

	</html>
