<?php

require_once("db_connect.php");

function create_token($token_hash, $student_mail) {
	
	$db = db_connect();

	if($db){
		$id_query = "SELECT id_student FROM student WHERE email = :mail";
		$id_statement = $db->prepare($id_query);
		$id_statement->bindValue(":mail", $student_mail);
		$result_id_statement = $id_statement->execute();

		$student_id;
		while($row = $id_statement->fetch(PDO::FETCH_ASSOC))
			$student_id = $row["id_student"];

		$insert_query = "INSERT INTO token values (:date, :token, true, :id)";
		$insert_statement = $db->prepare($insert_query);
		$insert_statement->bindValue(":date", date("Y-m-d"));
		$insert_statement->bindValue(":token", $token_hash);
		$insert_statement->bindValue(":id", $student_id);
		$insert_statement->execute();
	}
}
