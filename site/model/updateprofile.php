<?php

require("../model/db_connect.php");
require("../controller/uploadfile.php");
/*fichier php updateprofile*/
	/* A faire !!! 
		- Recuperer et afficher la photo stocké dans la base
		-Match request
		-change basephoty.jpg par la bonne
		-Supprimer les tags géo de la photo*/
		
	//Connexion à la bd
	$id = $_SESSION['id'];
	$db = db_connect();
	//Récupération des valeurs à afficher via une requête
	$query = "SELECT surname, description, email, year, adjective_1, adjective_2, adjective_3, pic FROM student WHERE id_student = :id";
	$statement = $db-> prepare($query);
	$statement -> bindvalue(':id', $id);
	$statement -> execute();
	//Stockage des résultats dans les variables
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$description = $row['description'];
		$name = $row['surname'];
		$yearstudent = $row['year'];
		$mailstudent = $row['email'];
		$picstudent = $row['pic'];
	}
	//get adjective in one request
	$query_get_student = 
		"SELECT A.wording as adj1, A2.wording as adj2, A3.wording as adj3, S.surname, S.description
		FROM ADJECTIVE A, ADJECTIVE A2, ADJECTIVE A3, STUDENT S
		WHERE id_student=:student_id AND S.adjective_1 = A.id_adjective AND S.adjective_2 = A2.id_adjective AND S.adjective_3 = A3.id_adjective"; 
	$statement_student = $db->prepare($query_get_student);
	$statement_student->bindvalue(':student_id', $id);
	$statement_student->execute();
	while($row = $statement_student->fetch(PDO::FETCH_ASSOC)){
		$word1 = $row['adj1'];
		$word2 = $row['adj2'];
		$word3 = $row['adj3'];
	}
	if (empty($description)){
		$description = "Les parrains avec une description ont 50% de chance de match en plus";
	}
	if ($yearstudent == 2){
		$sql = "SELECT count(*) FROM match WHERE id_student_god_father =:id"; 
		$result = $db->prepare($sql);
		$result -> bindvalue(':id',$id); 
		$result->execute(); 
		$match = $result->fetchColumn();
		/*while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$god_son_exist = $row['statement'];
		}*/
	}
	else if($yearstudent==1){
		$sql = "SELECT COUNT (*) from match WHERE id_student_god_son =:id";
		$result = $db->prepare($sql);
		$result -> bindvalue(':id',$id); 
		$result->execute(); 
		$match = $result->fetchColumn();	
	}
	
	
	//UPDATE de la description
	if(isset($_POST['updatedescribe'])){
	
			$resume = $_POST['resumestudent'];
			$query = "UPDATE student SET description = :inputresume WHERE id_student = :id";
			$statement = $db->prepare($query);
			$statement->bindvalue(':inputresume',$resume);
			$statement->bindvalue(':id', $_SESSION['id']);
			$statement -> execute();
			$filename = randfilename();
			$filepath = "../images/images_student/";
			$destination = $filepath . $filename;
			$succesupload = upload('upload_pic', $destination);
		if ($succesupload){
			$query_getpic = "SELECT pic from student where id_student = :id";
			$statement_getpic = $db -> prepare($query_getpic);
			$statement_getpic -> bindvalue(':id', $_SESSION['id']);
			$statement_getpic -> execute();
			while($row = $statement_getpic->fetch(PDO::FETCH_ASSOC)){
				$oldpicpath = $row['pic'];
			}
			if (strcmp($oldpicpath, "../images/images_student/basephoto.jpg")!=0){
				unlink($oldpicpath);
			}
			$query_updatepic = "UPDATE student SET pic = :picpath WHERE id_student = :id";
			$statement_updatepic = $db-> prepare($query_updatepic);
			$statement_updatepic -> bindvalue('id:', $_SESSION['id']);
			$statement_updatepic -> execute();
			
		}
			header("location: https://tinder.student.elwinar.com/view/updateprofile.php");
	}

		
		
