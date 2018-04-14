<?php

require('db_connect.php');

$db = db_connect();

if($db and session_start()) {
	$query = "UPDATE STUDENT SET adjective_1 = (SELECT id_adjective FROM ADJECTIVE WHERE wording = :adj1),
				adjective_2 = (SELECT id_adjective FROM ADJECTIVE WHERE wording = :adj2),
				adjective_3 = (SELECT id_adjective FROM ADJECTIVE WHERE wording = :adj3) WHERE id_student = :id";
	$statement = $db->prepare($query);
	$statement->bindValue(':adj1', $_POST['adj1']);
	$statement->bindValue(':adj2', $_POST['adj2']);
	$statement->bindValue(':adj3', $_POST['adj3']);
	$statement->bindValue('id', $_SESSION['id']); //Safe ??
	$statement->execute();
}

header('Location: http://' . $_SERVER['SERVER_NAME'] . '/view/swipe.php');

?>
