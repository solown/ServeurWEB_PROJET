
<?php
/*fichier php updateprofile*/
	session_start();	
	require("../model/db_connect.php");
	$db = db_connect();
	$query = "SELECT description FROM student WHERE id_student = :id";
	$statement = $db-> prepare($query);
	$statement -> bindvalue(':id', $_SESSION['id']);
	$statement -> execute();
	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$description = $row['description'];
	}
	if (empty($description)){
		$description = "Les parrains avec une description ont 50% de chance de match en plus";
	}
	
	if(isset($_POST['buttonconfirm'])){
	
		$resume = $_POST['resume'];
		if($db){
			$query = "UPDATE student SET description = :inputresume WHERE id_student = :id";
			$statement = $db->prepare($query);
			$statement->bindvalue(':id', $_SESSION['id']);
			$statement->bindvalue(':inputresume',$resume);
			$statement -> execute();
		}
	}

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