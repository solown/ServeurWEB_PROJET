<?php

require_once("db_connect.php");

$db = db_connect();

if($db) {
	$query = "SELECT password_student, id_student, validate_account FROM STUDENT WHERE email = :mail";
	$statement = $db->prepare($query);
	$statement->bindValue(':mail', $student_mail);
	$statement->execute();

	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$password_hash = $row['password_student'];
		$id_student = $row['id_student'];
		$validate_account = $row['validate_account'];
	}
}  

?>
