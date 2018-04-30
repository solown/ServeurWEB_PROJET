<?php

require_once("db_connect.php");
require_once("student.php");

$db = db_connect();
$student;
if($db) {
	$query = "SELECT S.year, S.surname, S.email, S.pic, S.description, A.wording as adj1, A2.wording as adj2, A3.wording as adj3
	FROM ADJECTIVE A, ADJECTIVE A2, ADJECTIVE A3, STUDENT S WHERE S.email = :mail AND S.adjective_1 = A.id_adjective AND S.adjective_2 = A2.id_adjective AND S.adjective_3 = A3.id_adjective";
	$statement = $db->prepare($query);
	$statement->bindValue(':mail', $student_mail);
	$statement->execute();

	$row = $statement->fetch(PDO::FETCH_ASSOC);
	$student = new Student($row['surname'], $row['description'], $row['adj1'], $row['adj2'], $row['adj3'], $row['year'], $row['email'], $row['pic']);


	if ($student->getYear() == 2){
		$sql = "SELECT count(*) FROM match WHERE id_student_god_father =:id and result = true";
		$result = $db->prepare($sql);
		$result -> bindvalue(':id',$id);
		$result->execute();
		$match = $result->fetchColumn();
		/*while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$god_son_exist = $row['statement'];
		}*/
	}
	else if($student->getYear()==1){
		$sql = "SELECT COUNT (*) from match WHERE id_student_god_son =:id and result = true";
		$result = $db->prepare($sql);
		$result -> bindvalue(':id',$id);
		$result->execute();
		$match = $result->fetchColumn();
	}

}
