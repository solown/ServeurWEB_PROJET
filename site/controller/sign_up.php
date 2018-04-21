<?php

	require("better_crypt.php");
	
	
	$student_mail =	 $_POST['mail'];

	require("../model/sign_up.php");

	if($statement->rowCount() == 0) {
		echo "OK";
	}
	else
		echo "FAIL";

?>
