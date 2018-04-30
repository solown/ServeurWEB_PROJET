<?php

require("../model/db_connect.php");
require("../controller/uploadfile.php");
/*fichier php updateprofile*/
	/* A faire !!!
		- Recuperer et afficher la photo stocké dans la base
		-Match request
		-change basephoty.jpg par la bonne
		-Supprimer les tags géo de la photo*/

	//Connect to db
	$id = $_SESSION['id'];
	$db = db_connect();
if($db) {
	$query = "SELECT S.year, S.surname, S.email, S.pic, S.description, A.wording as adj1, A2.wording as adj2, A3.wording as adj3
	FROM ADJECTIVE A, ADJECTIVE A2, ADJECTIVE A3, STUDENT S WHERE id_student=:student_id AND S.adjective_1 = A.id_adjective AND S.adjective_2 = A2.id_adjective AND S.adjective_3 = A3.id_adjective";
	$statement = $db->prepare($query);
	$statement_student->bindvalue(':student_id', $id);

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
if(isset($_POST['description'])){
	if(!empty($_POST['description'])){
		$newDescription = $_POST['description'];
		$query = "UPDATE student SET description = :newDescription WHERE id_student = :id";
		$statement = $db->prepare($query);
		$statement->bindvalue(':newDescription',$newDescription);
		$statement->bindvalue(':id', $id);
		$statement -> execute();
	}
}

//
//	//UPDATE de la description
//	if(isset($_POST['updatedescribe'])){
//
//			$resume = $_POST['resumestudent'];
//			$query = "UPDATE student SET description = :inputresume WHERE id_student = :id";
//			$statement = $db->prepare($query);
//			$statement->bindvalue(':inputresume',$resume);
//			$statement->bindvalue(':id', $_SESSION['id']);
//			$statement -> execute();
//			$filename = randfilename();
//			$filepath = "../images/images_student/";
//			$destination = $filepath.$filename;
//			$succesupload = upload('upload_pic', $destination);
//		if ($succesupload){
//			$query_getpic = "SELECT pic from student where id_student = :id";
//			$statement_getpic = $db -> prepare($query_getpic);
//			$statement_getpic -> bindvalue(':id', $_SESSION['id']);
//			$statement_getpic -> execute();
//			while($row = $statement_getpic->fetch(PDO::FETCH_ASSOC)){
//				$oldpicpath = $row['pic'];
//			}
//			if (strcmp($oldpicpath, "../images/images_student/basephoto.jpg")!=0){
//				unlink($oldpicpath);
//			}
//			$query_updatepic = "UPDATE student SET pic = :picpath WHERE id_student = :id";
//			$statement_updatepic = $db-> prepare($query_updatepic);
//			$statement_updatepic -> bindvalue('id:', $_SESSION['id']);
//			$statement_updatepic -> execute();
//
//		}
//			header("location: https://tinder.student.elwinar.com/view/updateprofile.php");
//	}
