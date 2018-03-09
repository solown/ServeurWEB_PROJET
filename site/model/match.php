<?php
session_start();
require("db_connect.php");
$db = db_connect();
if($db) {
	$query_get_score = "SELECT s1.score, s2.score 
	FROM student s1, student s2 
	WHERE s1.id_student = :id_s1 AND s2.id_student = :id_s2"
	$statement = $db->prepare($query_get_score);
	$statement->bindValue(':id_s1', $_SESSION['id']); 
	$statement->bindValue(':id_s2', ???); //où je récupère l'id du match ?
	$statement->execute();
	
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$score1 = $row['s1.score'];
		$score2 = $row['s2.score'];
	}
	
	$ratio = (($score1 - $score2)**2)/100
	if($score1>$score2):
		$score1 = $score1-$ratio;
		$score2 = $score2+$ratio;
	else:
		$score1 = $score1+$ratio;
		$score2 = $score2-$ratio;
		
	$query_update_score1 = "UPDATE STUDENT score = :score1
	WHERE id_student = :id_s1"
	$statement = $db->prepare($query_update_score1);
	$statement->bindValue(':id_s1', $_SESSION['id']); 
	$statement->bindValue(':score1', $score1); 
	$statement->execute();
	
	$query_update_score2 = "UPDATE STUDENT score = :score2
	WHERE id_student = :id_s2"
	$statement = $db->prepare($query_update_score2);
	$statement->bindValue(':id_s2', ); 
	$statement->bindValue(':score2', $score2); 
	$statement->execute();
	
?>
