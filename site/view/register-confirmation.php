<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Confirmation de votre inscription</title>
	<link rel="stylesheet" href="../styles/signup.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../styles/main.css">
</head>

<body>

	<div class="row ">
		<div class="col-7 left_part ">
		</div>
		<div class="col-5 right_part">
			<div class="row">
				<div class="col-8 offset-2 formulaire">
					<div class="title_logo">
						<div><img src="../images/singUp.svg" class="cloud2"></div>

					</div>
					<div classe="text_center">
						<div>Un email de confirmation à été envoyé à</div>
						<div class="inline purple">
							<?php echo $_POST['mail'];?> </div>
						<div class="inline">@etu.parisdescartes.fr</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
