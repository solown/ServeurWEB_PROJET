<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<title>identification</title>
	<link rel="stylesheet" href="styles/style.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>

<body style="text-align:center">

	<p>
		<?php Bienvenue echo $_POST['mail'];?>@etu.parisdescartes.fr
		</br>
	</p>
	<?php 
		require("./model/identification.php");
 	 ?>
</body>

</html>
