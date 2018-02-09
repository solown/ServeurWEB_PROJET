<?php

function better_crypt($input, $rounds = 7) {
	$salt = "";
	$salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
	for($i=0; $i < 22; $i++) {
		$salt .= $salt_chars[array_rand($salt_chars)];
	}
	return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
}

require("db_connect.php");
$db = db_connect();
if($db){
	$query = "INSERT INTO STUDENT (surname, email, password_student, year) VALUES (:firstname, :mail, :pass, :year)";
	$statement = $db->prepare($query);
	$statement->bindValue(':firstname', $student_name);
	$statement->bindValue(':mail', $student_mail);
	$statement->bindValue(':pass', $password_hash);
	$statement->bindValue(':year', $student_year);
	$statement->execute();

	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		echo $row;
	}
}
?>
