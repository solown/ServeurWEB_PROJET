<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
	<title>Confirmation de votre inscription</title>
	<link rel="stylesheet" href="styles/style.css">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
</head>
<body style="text-align:center">
    <h1>Merci de votre inscription !</h1>
        <p>
            Un e-mail a été envoyé à l'adresse <?php echo $_POST['mail'];?>@etu.parisdescartes.fr afin de confirmer celle-ci.</br>
        </p>
        <?php 
            $host_bdd='tinder@ogg.elwinar.com';
            $name_bdd='tinder';
            $user_bdd='tinder';
            $pass_bdd='tinder';
        
            try{
                $bdd = new PDO ("pgsql:host=".$host_bdd.";dbname=".$name_bdd."", "".$user_bdd."", "".$pass_bdd."") or die(print_r($bdd->errorInfo()));
                $bdd->exec("SET NAMES utf8");
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }
            
            catch(Exeption $e){
                die("Erreur!".$e->getMessage());
            }
            $query = "SELECT * FROM STUDENT";
            $statement = $db->prepare($query);
            $statement->execute();
            echo $statement;
        ?>
</body>
</html>