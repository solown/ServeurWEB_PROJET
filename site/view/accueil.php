<!DOCTYPE html>
<html lang="fr">

<head>
	<?php session_start(); ?>
	<meta charset="utf-8" />
	<title>Accueil</title>
	<link rel="stylesheet" href="../styles/style.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>

<body>
	<div class="buttons">
		<a class="login" href="./view/login.html">Login</a>
		<a class="signUp" href="./view/signup.html">Sign Up</a>
	</div>
	<?php echo $_SESSION['id'] ?>
	<div class="slogan">Find the right one </div>
	<script src="../scripts/main.js"></script>
</body>

</html>
