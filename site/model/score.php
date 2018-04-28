<?php

	$ratio = ((abs($student_connected_score - $student_liked_score)**2)/100)+1;
	if($student_connected_score>$student_liked_score){
		$student_connected_score = $student_connected_score-$ratio;
		$student_liked_score = $student_liked_score+$ratio;
	}
	else{
		$student_connected_score = $student_connected_score+$ratio;
		$student_liked_score = $student_liked_score-$ratio;
	}
	$query_update_score1 = "UPDATE student SET score = :score1
	WHERE id_student = :id_s1";
	$statement_update_score1 = $db->prepare($query_update_score1);
	$statement_update_score1->bindValue(':id_s1', $id_student_connected); 
	$statement_update_score1->bindValue(':score1', ceil($student_connected_score)); 
	$statement_update_score1->execute();
	
	$query_update_score2 = "UPDATE student SET score = :score2
	WHERE id_student = :id_s2";
	$statement_update_score2 = $db->prepare($query_update_score2);
	$statement_update_score2->bindValue(':id_s2', $id_student_liked); 
	$statement_update_score2->bindValue(':score2', ceil($student_liked_score)); 
	$statement_update_score2->execute();


