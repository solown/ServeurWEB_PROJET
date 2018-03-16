<?php>
	//session_start();
<?>
<!DOCTYPE HTML>
<html lang="fr">
<header>
	<meta charset="utf-8" />
	<title>Update profile </title>
	<link rel="stylesheet" href="../styles/main.css">
	<link rel="stylesheet" href="../styles/updateprofile.css">
	<link rel="stylesheet" href="../styles/signup_login.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</header>
<body>
	<div class="menu">
		<a href="#" class="menu_inactive">swipe</a>
		<a href="#" class="menu_active">my account</a>
		<a href="#" class="menu_inactive">messages</a>
		<a href="#" class="menu_inactive">log out</a>
	</div>
	<div id="mailclasse">
		<p><b>DUT2</b></p><span>alicecapelle@etu.parisdecartes.fr</span>
	</div>
	<div id="stats">
		<h2>12 matchs</h2>
		<h2> 1 filleule</h2>
	</div>
	<div id="present">

		<div class="image" onclick="addpicture()">
				<input type=file class=input_btn name=upload_pic></input>
		</div>
		<div id="background">
		</div>
		<div class="name">
			<center> Alice </center>
		</div>
		<div class="adj">
			<center>Belle-Intelligente-Sensible</center>
		</div>
		<div class="resume" >
			Lorem ipsum dolor sit amet, consectetur
					adipiscing elit, sed do eiusmod tempor
					incididunt ut labore et dolore magna aliqua. Ut
					enim ad minim veniam, quis nostrud exercitation
					ullamco laboris nisi ut aliquip ex ea commodo
					consequat.
		</div>
		<textarea id="inputresume"name="resume" placeholder="Décris toi :)"></textarea>
	</div>
	<div class="buttonupdate" onclick="update()">
	</div>
	<div class="buttonconfirm" onclick="confirm()">
	</div>
	<script src="../scripts/updateprofile.js"></script>
	

<?php	
	/*require("../model/db_connect.php")
	if(isset($_POST['buttonconfirm'])
	{
		$resume = $_POST['resume']
		$db = db_connect();
		if($db){
			$query = "UPDATE student SET description = :inputresume WHERE id_student = :id"
			$statement = $db->prepare($query):
			$statement->bindvalue(':id', $_SESSION['id']);
			$statement->bindvalue(':inputresume',$resume);
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
	}*/
	?>


</body>
</html>
