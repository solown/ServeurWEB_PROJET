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
		<form method="post">
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
				<input id="inputresume" name="resumestudent" placeholder="Décris toi ici, n'hésite pas à dire ce que tu aimes ou ce que tu cherches sur notre app :)" type="textarea"
					maxlength="280" >
			</input>
			</div>
			<div class="buttonupdate" onclick="update()">
			</div>
			<input class="buttonconfirm" name="updatedescribe" onclick="confirm()" type="submit" value="">
			</input>
			<input class="cancelupdate" name="N_cancelupdate" onclick="cancel()" value=""></input>
			</form>
		<script src="../scripts/updateprofile.js"></script>
		</form>
	</body>

	</html>
