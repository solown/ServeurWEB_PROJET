<?php

	require("better_crypt.php");
	
	
	$student_mail =	 $_POST['mail'];

	require("../model/sign_up.php");

	if($row == 0) {
		echo "OK";
	}
	else
		echo "FAIL";

?>
