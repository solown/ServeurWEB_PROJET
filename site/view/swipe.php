<?php
session_start();
require("../model/swipe.php");
if(!isset($_SESSION['id'])) {
	require('../model/stay_connected.php');
	if(is_stay_connected($_COOKIE['fr81_stay_connected']))
		header('Location: ../view/logout.php');
}
?>
	<!DOCTYPE html>
	<html lang="fr">


	<head>
		<meta charset="utf-8" />
		<title>Swipe</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="../styles/animate.css">
		<link rel="stylesheet" href="../styles/main.css">
		<link rel="stylesheet" href="../styles/signup_login.css">
		<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

	</head>

	<body>
		<script type="text/javascript">
			console.log("debut de la recuperation des data");
			var students = <?php echo json_encode(getArrayStudents()); ?>;
			var email;
			console.log(students);
			//students = JSON.parse(students);
			console.log("fin");
			console.log(students);
			console.log("fin des log");

		</script>


		<div class="menu">
			<a href="#" class="menu_active">swipe</a>
			<a href="../view/updateprofile.php" class="menu_inactive">mon compte</a>
			<a href="#" class="menu_inactive">messages</a>
			<a href="../view/logout.php" class="menu_inactive">log out</a>
		</div>
		<div class="row fullscreen_height">


			<div class="col-3 swipe_icon no">
				<img class="recycling" src="../images/recycling.png" alt="no">
			</div>
			<div class="col-6 swipe_profile available_profile animated ">
				<div class="swipe_face">
					<img class="swipe_cloud" src="../images/cloud.svg" alt="cloud"> -
					<div class="img_profile swipe_picture"><img id="swipe_picture" src="" alt="picture"></div>
				</div>
				<div class="swipe_name" id="swipe_name">
				</div>
				<div class="swipe_adj" id="swipe_adj">
				</div>
				<div class="swipe_description" id="swipe_description">
					<!-- TODO : Only keep id -->
				</div>
			</div>
			<div class="col-6 no_more_profile swipe_profile animated ">
				<div class="sad_student">
					<div><img src="../images/sad_student.svg" alt="no more profile"></div>
				</div>
				<div class="no_more_profile_sorry">
					Vous avez déjà vu tous les profiles que vous pouviez voir.
				</div>
				<div class="swipe_more_btn">
					<div><a href="swipe.php">Voir encore</a></div>
				</div>
			</div>
			<div class="col-3 swipe_icon yes">
				<img class="heart" src="../images/heart.png" alt="yes">
			</div>



		</div>
		<script src="../scripts/swipe.js"></script>
	</body>

	</html>
