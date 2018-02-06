<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<title>identification</title>
	<link rel="stylesheet" href="styles/style.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>

<body style="text-align:center">

	<p>
		vous etes
		<?php echo $_POST['mail'];?>

		</br>
	</p>
	<?php 
 
            $host_db='localhost';
            $name_db='tinder';
            $user_db='tinder';
            $pass_db='tinder';
  			$password_entered=$_POST['password'];
   			$student_mail=$_POST['mail'];
           

            try{
                $db = new PDO("pgsql:host=".$host_db.";dbname=".$name_db."", "".$user_db."", "".$pass_db."") or die(print_r($db->errorInfo()));
                $db->exec("SET NAMES utf8");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                
                $query = "SELECT password_student FROM STUDENT WHERE email = :mail";
                $statement = $db->prepare($query);
                $statement->bindValue(':mail', $student_mail);
                $statement->execute();
                while ($password_hash=$statement->fetch(PDO::FETCH_ASSOC)) {
                    echo $password_hash;
                }
			}
            
            catch(Exeption $e){
                die("Erreur!".$e->getMessage());
            }

  if(crypt($password_entered, $password_hash) == $password_hash) {
    echo  'identification réussie';
  }else{
	echo  'ERREUR d identification';
  }

        ?>
</body>

</html>
