<?php
function db_connect(){
	$host_db='localhost';
	$name_db='tinder';
	$user_db='tinder';
	$pass_db='tinder';

	$student_name = explode('.', $_POST['mail'])[0];
	echo $student_name;
	$student_mail = $_POST['mail'];
	$password_hash = better_crypt($_POST['password'], 10); 
	$student_year = $_POST['year'];

	$db;
	try{
		$db = new PDO("pgsql:host=".$host_db.";dbname=".$name_db."", "".$user_db."", "".$pass_db."") or die(print_r($db->errorInfo()));
		$db->exec("SET NAMES utf8");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	}
	catch(Exeption $e){
		die("Erreur!".$e->getMessage());
	}
	return db;
}
?>
