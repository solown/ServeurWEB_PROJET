
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
	$query = "SELECT surname, description, email, year FROM student WHERE id_student = :id";
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
	//Première lettre du nom en UPPER CASE
	$name = ucfirst($name)
	if (empty($description)){
		$description = "Les parrains avec une description ont 50% de chance de match en plus";
	}
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