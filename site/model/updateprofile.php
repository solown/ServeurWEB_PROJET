
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
		$adj1 = $row['adjective_1'];
		$adj2 = $row['adjective_2'];
		$adj3 = $row['adjective_3'];
	}
	//Récuperation des string des adjectifs
	$query = "SELECT wording FROM adjective WHERE id_adjective = :idadj";
	$statement = $db-> prepare($query);
	$statement -> bindvalue(':idadj', $adj1);
	$statement -> execute();
	//Stockage des résultats dans les variables
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$word1 = $row['wording'];
	}
	$query = "SELECT wording FROM adjective WHERE id_adjective = :idadj";
	$statement = $db-> prepare($query);
	$statement -> bindvalue(':idadj', $adj2);
	$statement -> execute();
	//Stockage des résultats dans les variables
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$word2 = $row['wording'];
	}
	$query = "SELECT wording FROM adjective WHERE id_adjective = :idadj";
	$statement = $db-> prepare($query);
	$statement -> bindvalue(':idadj', $adj3);
	$statement -> execute();
	//Stockage des résultats dans les variables
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$word3 = $row['wording'];
	}
	//Première lettre du nom en UPPER CASE
	$name = ucfirst($name);
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