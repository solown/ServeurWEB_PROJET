<?php

require("db_connect.php");
require("better_crypt.php");

$db = db_connect();

$student_name =	 explode('.', $_POST['mail'])[0];
$student_mail =	 $_POST['mail'];
$password_hash = better_crypt($_POST['password'], 10); 
$student_year =  $_POST['year'];


if($db) {
	$query = "SELECT password_student FROM STUDENT WHERE email = :mail";
	$statement = $db->prepare($query);
	$statement->bindValue(':mail', $student_mail);
	$statement->execute();

	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$password_hash = $row['password_student'];
	}
}  

$id_result;

if(crypt($password_entered, $password_hash) == $password_hash) {
	$id_result = 'Identification réussie';
}
else{
	$id_result = 'Erreur d\'identification pour ';
}

?>
