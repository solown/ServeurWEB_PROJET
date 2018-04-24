<?php

require('db_connect.php');

function change_passwd_for($token) {

	$db = db_connect();

	if($db) {

		require('better_crypt.php');
		
		$id_query = "SELECT id_student FROM token_forgot_passwd WHERE token=:token";
		$id_statement = $db->prepare($id_query);
		$id_statement->bindValue(':token', $token);
		$id_statement->execute();

		$id_result;
		while($row = $id_statement->fetch(PDO::FETCH_ASSOC))
			$id_result = $row['id_student'];

		$new_passwd_hash = better_crypt($_POST['passwd'], 10);
		$query = "UPDATE STUDENT SET password_student=:passwd WHERE id_student=:id";
		$statement = $db->prepare($query);
		$statement->bindValue(':passwd', $new_passwd_hash);
		$statement->bindValue(':id', $id_result);
		$statement->execute();

		$delete_query = "DELETE FROM token_forgot_passwd WHERE id_student=:id";
		$delete_statement = $db->prepare($delete_query);
		$delete_statement->bindValue(":id", $id_result);
		$delete_statement->execute();
	}
}

?>
