
<?php
/*fichier php updateprofile*/
	/* A faire !!! 
		-Rajouter une requête sql qui compte dans la table match le nombre de filleul et
		de match 
		-Ajouter la possibilité d'insérer la photo dans le html/css et l'upload dans la base
		-Supprimer les tags géo de la photo*/
	//Connexion à la bd
	$id = $_SESSION['id'];
	require("../model/db_connect.php");
	$db = db_connect();
	//Récupération des valeurs à afficher via une requête
	$query = "SELECT surname, description, email, year, adjective_1, adjective_2, adjective_3 FROM student WHERE id_student = :id";
	$statement = $db-> prepare($query);
	$statement -> bindvalue(':id', $id);
	$statement -> execute();
	//Stockage des résultats dans les variables
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$description = $row['description'];
		$name = $row['surname'];
		$yearstudent = $row['year'];
		$mailstudent = $row['email'];
	}
	//get adjective in one request
	$query_get_student = 
		"SELECT A.wording as adj1, A2.wording as adj2, A3.wording as adj3, S.surname, S.description
		FROM ADJECTIVE A, ADJECTIVE A2, ADJECTIVE A3, STUDENT S
		WHERE id_student=:student_id AND S.adjective_1 = A.id_adjective AND S.adjective_2 = A2.id_adjective AND S.adjective_3 = A3.id_adjective;" 
	$statement_student = $db->prepare($query_get_student);
	$statement_student->bindValue(':student_id', $id);
	$statement_student->execute();
	while($row = $statement_student->fetch(PDO::FETCH_ASSOC)){
		$word1 = ['adj1'];
		$word2 = ['adj2'];
		$word3 = ['adj3'];
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
		/*while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
			$god_father_exist = $row['statement'];
		}*/
	}
	/*if ($god_son_exist== true or god_father_exist==true){
		$god_son_exist = 1;
		$god_father_exist=1;
	}else{
		$god_son_exist = 0;
		$god_father_exist= 0;
	}*/
	
	//UPDATE de la description
	if(isset($_POST['buttonconfirm'])){
	
		$resume = $_POST['resumestudent'];
		if($db){
			$query = "UPDATE student SET description = :inputresume WHERE id_student = :id";
			$statement = $db->prepare($query);
			$statement->bindvalue(':id', $_SESSION['id']);
			$statement->bindvalue(':inputresume',$resume);
			$statement -> execute();
		}
	}
	//UPDATE de l'image
	if(isset($_POST['input_btn']))
	{
		$filetmp = $_FILES["file_img"]["tmp_name"];
		$filename = $_FILES["file_img"]["name"];
		$filetype = $_FILES["file_img"]["type"];
		$filepath = "profile_pic/".$filename;
		
		move_uploaded_file($filetmp,$filepath);
	    
		$sql = "INSERT INTO student (pic) VALUES ('$filepath')";
		$result = mysql_query($sql);
	}
?>