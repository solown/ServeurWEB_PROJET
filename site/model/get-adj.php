<?php 

require('db_connect.php');

$db = db_connect();

if($db){

		$id_query = "SELECT wording FROM adjective";
		$id_statement = $db->prepare($id_query);
		$id_statement->execute();
		
		$adjectives = array();

		while($row = $id_statement->fetch(PDO::FETCH_ASSOC))
			array_push($adjectives, $row["wording"]);

		$insert_statement->execute();
		echo(json_encode($adjectives));
}

?>
