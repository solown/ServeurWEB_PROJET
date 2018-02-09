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

	while($row = $statement->fetch(PDO::FETCH_ASSOC)){
		$password_hash = $row['password_student'];
	}
	echo $password_hash;
}    
catch(Exeption $e){
	die("Erreur!".$e->getMessage());
} 

if(crypt($password_entered, $password_hash) == $password_hash) {
	echo  'identification réussie';
}
else{
	echo  'ERREUR d identification';
}
?>
