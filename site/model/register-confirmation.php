<?php

require("db_connect.php");

$student_name =	 explode('.', $_POST['mail'])[0];
$student_mail =	 $_POST['mail'];
$password_hash = better_crypt($_POST['password'], 10); 
$student_year =  $_POST['year'];

$db = db_connect();
if($db){
	$query = "INSERT INTO STUDENT (surname, email, password_student, year) VALUES (:firstname, :mail, :pass, :year)";
	$statement = $db->prepare($query);
	$statement->bindValue(':firstname', $student_name);
	$statement->bindValue(':mail', $student_mail);
	$statement->bindValue(':pass', $password_hash);
	$statement->bindValue(':year', $student_year);
	$statement->execute();
}
?>
