<?php

require("db_connect.php");

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
