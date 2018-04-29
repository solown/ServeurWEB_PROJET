<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Log In</title>
	<link rel="stylesheet" href="../styles/main.css">
	<link rel="stylesheet" href="../styles/signup_login.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div class="row fullscreen-height">
		<div class="col-5 right_part ">
			<div class="row fullscreen_height">
				<a class="home-btn" href="/">
						&#139; Home Page</a>
				<div class="col-6 offset-3 ">
					<div class="formulaire">
						<div class="title_logo_password">
							<div><img src="../images/set_up_new_psd.png" class="cloud2"></div>
						</div>
						<p class="psw_size2">Enter your new passeword for
						</p>
						<span class="purple psw_size"><?= $_GET['mail'] ?></span>
						<span class="register_conf_psw_mail psw_size">@etu.parisdescartes.fr</span>
						<div>
							<form method="POST" action="../controller/change_passwd.php">
								<input name="token" type="hidden" value="<?php echo htmlspecialchars($_GET['token']) ?>" />
								<div class="space_top"><label>New Password</label></div>
								<input type="password" name="passwd"></input>
								<input type="submit" value="Confirm"></input>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-7 left_part upside">

		</div>
	</div>
	<script src="../scripts/checkForm.js"></script>
	<script src="../scripts/login.js"></script>
</body>

</html>
