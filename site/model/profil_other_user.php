<?php

require_once("db_connect.php");

$db = db_connect();

if($db) {
	$query = "SELECT year, surname, email, pic, description, adjective_1, adjective_2, adjective_3 FROM STUDENT WHERE email = :mail";
	$statement = $db->prepare($query);
	$statement->bindValue(':mail', $student_mail);
	$statement->execute();

	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$surname = $row['id_student'];
		$validate_account = $row['validate_account'];
	}
}  

?>
