<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Confirmation de votre inscription</title>
	<link rel="stylesheet" href="../styles/signup_login.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../styles/main.css">
</head>

<body>

	<div class="row fullscreen_height">
		<div class="col-7 left_part ">
		</div>
		<div class="col-5 right_part">
			<div class="row fullscreen_height">
				<div class="col-10 offset-1 formulaire text_center">
					<div class="title_logo">
						<div><img src="../images/singUp.png" class="cloud2"></div>

					</div>
					<div>
						<div>Un email de confirmation à été envoyé à</div>
						<span class="purple">
							<?php echo htmlentities($_POST['mail'], ENT_QUOTES, 'UTF-8')?> </span>
						<span>@etu.parisdescartes.fr</span>
						</br>
						</br>
						</br>
						<a href="/">Home page</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
