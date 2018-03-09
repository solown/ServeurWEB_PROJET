<?php

require("../model/db_connect.php");

$db = db_connect();

if($db){
	$query = "UPDATE STUDENT SET validate_account = 't' WHERE id_student = (
				SELECT id_student FROM TOKEN WHERE token = :token)";
	$statement = $db->prepare($query);
	$statement->bindValue(':token', $_GET['token']);
	$statement->execute();
}

?>
