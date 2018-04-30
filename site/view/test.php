<!DOCTYPE html>

<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Personality Test</title>
	<link rel="stylesheet" href="../styles/main.css">
	<link rel="stylesheet" href="../styles/signup_login.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>
		.adj-input {
			display: block;
			text-align: center;
		}
		
		.title_logo {
			margin-top: 25%;
		}

	</style>
</head>

<body>
	<div class="row fullscreen-height">
		<div id="left-adj-container" class="col-4">
		</div>

		<div class="col-4">
			<div class="title_logo">
				<h1>Qui es-tu  ?</h1>
				<h3>Clique sur ce qui te décris le mieux!</h3>
			</div>
			<form method="POST" action="../model/add_adjs.php">
				<input class="adj-input" type="text" name="adj1" onkeypress="return false"></input>
				</br>
				<input class="adj-input" type="text" name="adj2" onkeypress="return false"></input>
				</br>
				<input class="adj-input" type="text" name="adj3" onkeypress="return false"></input>
				</br>
				<input type="submit" value="Valider"></input>
			</form>
		</div>

		<div id="right-adj-container" class="col-4">
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../scripts/test.js"></script>
</body>

</html>
