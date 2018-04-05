<?php

require_once("db_connect.php");
require_once("student.php");

$db = db_connect();

if($db) {
	$query = "SELECT S.year, S.surname, S.email, S.pic, S.description, A.wording as adj1, A2.wording as adj2, A3.wording as adj3 FROM STUDENT S WHERE email = :mail AND S.adjective_1 = A.id_adjective AND S.adjective_2 = A2.id_adjective AND S.adjective_3 = A3.id_adjective";
	$statement = $db->prepare($query);
	$statement->bindValue(':mail', $student_mail);
	$statement->execute();

	
}  

?>
