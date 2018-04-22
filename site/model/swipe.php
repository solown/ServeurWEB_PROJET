<?php
require("db_connect.php");
require("student.php");

function getArrayStudents() {
	
	$db = db_connect();
	$tab_student = array();
	if($db) {

		$query_get_score = "SELECT score, year  
			FROM student
			WHERE id_student = :student_id";
		$statement_score = $db->prepare($query_get_score);
		$statement_score->bindValue(':student_id', $_SESSION['id']); 
		$statement_score->execute();

		while($row = $statement_score->fetch(PDO::FETCH_ASSOC)){
			$score_student = $row['score'];
			$student_year = $row['year'];
		}

		$score_min = $score_student - 50;
		$score_max = $score_student + 50;

		if($student_year == 1){
			$query_get_student = 
			"SELECT A.wording as adj1, A2.wording as adj2, A3.wording as adj3, S.surname, S.description, S.pic
			FROM ADJECTIVE A, ADJECTIVE A2, ADJECTIVE A3, STUDENT S
			WHERE S.id_student <> :student_id AND year = 2 AND S.score BETWEEN :score_min AND :score_max AND S.adjective_1 = 				A.id_adjective AND S.adjective_2 = A2.id_adjective AND S.adjective_3 = A3.id_adjective AND S.id_student NOT IN (SELECT 				id_student_god_father from match where id_student_god_son <> :student_id)"; 
		}
		else {
			$query_get_student = 
			"SELECT A.wording as adj1, A2.wording as adj2, A3.wording as adj3, S.surname, S.description, S.pic
			FROM ADJECTIVE A, ADJECTIVE A2, ADJECTIVE A3, STUDENT S
			WHERE S.id_student <> :student_id AND year = 1 AND S.score BETWEEN :score_min AND :score_max AND S.adjective_1 = 				A.id_adjective AND S.adjective_2 = A2.id_adjective AND S.adjective_3 = A3.id_adjective AND S.id_student NOT IN (SELECT 				id_student_god_son from match where id_student_god_father <> :student_id)"; 
		}
			
		$statement_student = $db->prepare($query_get_student);
		$statement_student->bindValue(':score_min', $score_min, PDO::PARAM_INT);
		$statement_student->bindValue(':score_max', $score_max, PDO::PARAM_INT);
		$statement_student->bindValue(':student_id', $_SESSION['id']);
		$statement_student->execute();

		$tab_student = array();

		$count = 0;

		while($row = $statement_student->fetch(PDO::FETCH_ASSOC)){
			$student = new Student($row['surname'], $row['description'], $row['adj1'], $row['adj2'], $row['adj3'], NULL, $row['email'], $row['pic'] );
			$tab_student[] = $student->to_array();
			$count=$count+1;
		}
	}
	return $tab_student;
}
