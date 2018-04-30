<?php 

require('db_connect.php');

$db = db_connect();

if($db){

		$adj_query = "SELECT wording FROM adjective";
		$adj_statement = $db->prepare($adj_query);
		$adj_statement->execute();
		
		$adjectives = array();

		while($row = $adj_statement->fetch(PDO::FETCH_ASSOC))
			array_push($adjectives, $row["wording"]);

		echo(json_encode($adjectives));
}
