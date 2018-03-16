<?php
session_start();
require("db_connect.php");
$db = db_connect();
if($db) {
	$query_get_student = "SELECT surname, description
	FROM student
	WHERE id_student = 4";
	$statement = $db->prepare($query_get_student);
	$statement->execute();
	
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$name = $row['surname'];
		$description = $row['description'];
	}
}
