<?php

	require("better_crypt.php");
	
	
	$student_mail =	 $_POST['mail'];
	var_dump($student_mail);
	require("../model/sign_up.php");

	if($row == 0) {
	var_dump($row);
		echo "OK";
	}
	else
		echo "FAIL";

?>
