<?php

require_once("db_connect.php");

function create_token($token_hash, $mail_student) {
	
	$db = db_connect();

	if($db){
		$id_query = "SELECT id_student FROM student WHERE email = :mail";
		$id_statement = $db->prepare($id_query);
		$id_statement->bindValue(":mail", $mail_student);
		$result_id_statement = $id_statement->execute();

		$id_student;
		while($row = $id_statement->fetch(PDO::FETCH_ASSOC))
			$id_student = $row["id_student"];

		$insert_query = "INSERT INTO token values (:date, :token, true, :id)";
		$insert_statement = $db->prepare($insert_query);
		$insert_statement->bindValue(":date", date("Y-m-d"));
		$insert_statement->bindValue(":token", $token_hash);
		$insert_statement->bindValue(":id", $id_student);
		$insert_statement->execute();
	}
}
