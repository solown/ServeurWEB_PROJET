<?php
session_start();
require("db_connect.php");
$db = db_connect();
if($db) {
	
	$query_get_score = "SELECT score, s2.score 
	FROM student,
	WHERE id_student = :id_score";
	$statement = $db->prepare($query_get_score);
	$statement->bindValue(':id_score', $_SESSION['id']); 
	$statement->execute();
	
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$score_student = $row['score'];
	}
	
	$score_min = $score_student - 50;
	$score_max = $score_student + 50;
	
	$query_get_student = "SELECT surname, description
	FROM student
	WHERE score BETWEN :socre_min AND :score_max";
	$statement->bindValue(':score_min ', $score_min);
	$statement->bindValue(':score_max ', $score_max);
	$statement = $db->prepare($query_get_student);
	$statement->execute();
	

	$count = 0;
	$tab_student = array();
	
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){		
		$tab_student[$count] = array($count=>array('name'=>$row['surname'], 'description'=>$row['description']));
		$count=$count+1;
	}
	
	
}
