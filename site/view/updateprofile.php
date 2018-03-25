<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: ../view/logout.php');
}
?>
	<!DOCTYPE HTML>
	<html lang="fr">

	<header>
		<meta charset="utf-8" />
		<title>Update profile </title>
		<link rel="stylesheet" href="../styles/main.css">
		<link rel="stylesheet" href="../styles/updateprofile.css">
		<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	</header>

	<body>
		<?php include('../model/updateprofile.php') ?>
		<div class="menu">
			<a href="../view/swipe.php" class="menu_inactive">swipe</a>
			<a href="#" class="menu_active">my account</a>
			<a href="#" class="menu_inactive">messages</a>
			<a href="../view/logout.php" class="menu_inactive">log out</a>
		</div>
		<div id="mailclasse">
			<p><b>DUT <?php echo htmlspecialchars($yearstudent)?></b></p><span><?php echo htmlspecialchars($mailstudent) ?>@etu.parisdescartes.fr</span>
		</div>
		<div id="stats">
			<h2><?php echo htmlspecialchars($match)?></h2>
			<h2> <?php echo htmlspecialchars($god_son_exist)</h2>
		</div>
		<div id="present">

			<div class="image" onclick="addpicture()">
				<input type=file class=input_btn name=upload_pic></input>
			</div>
			<div id="background">
			</div>
			<div class="name">
				<center>
					<?php echo htmlspecialchars($name) ?> </center>
			</div>
			<div class="adj">
				<center><?php echo htmlspecialchars(adj1) ?>-<?php echo htmlspecialchars(adj2) ?>-<?php echo htmlspecialchars(adj3) ?></center>
			</div>
			<form method="post">
				<div class="resume">
					<?php echo htmlspecialchars($description)?>
				</div>
				<input id="inputresume" name="resumestudent" placeholder="Décris toi :)" type="textarea"></input>
		</div>
		<div class="buttonupdate" onclick="update()">
		</div>
		<input class="buttonconfirm" onclick="confirm()" type="submit" value="">
		</input>
		</form>
		<script src="../scripts/updateprofile.js"></script>
	</body>

	</html>
