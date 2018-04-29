<!DOCTYPE html>

<html>

<body>
	<p>Enter the new password for
		<?= $_GET['mail'] ?> :</p>
	<form method="POST" action="../controller/change_passwd.php">
		<input name="token" type="hidden" value="<?php echo htmlspecialchars($_GET['token']) ?>" />
		<input type="password" name="passwd"></input>
		<input type="submit" value="Confirm"></input>
	</form>
</body>

</html>
