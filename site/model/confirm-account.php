<?php

require("../model/db_connect.php");

$db = db_connect();

if($db){
	$query = "UPDATE STUDENT SET validate_account = TRUE WHERE id_student IN (
				SELECT id_student FROM TOKEN WHERE token = :token AND is_alive = TRUE)";
	$statement = $db->prepare($query);
	$statement->bindValue(':token', $_GET['token']);
	$statement->execute();
	
	$query = "DELETE FROM TOKEN WHERE token = :token"; 
	$statement = $db->prepare($query);
	$statement->bindValue(':token', $_GET['token']);
	$statement->execute();
}
