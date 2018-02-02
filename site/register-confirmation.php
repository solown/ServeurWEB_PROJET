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
            $host_db='localhost';
            $name_db='tinder';
            $user_db='tinder';
            $pass_db='tinder';

            $student_name = explode('.', $_POST['mail'])[0];
            echo $student_name;
            $student_mail = $_POST['mail'];
            $student_pass = $_POST['password'];
            $student_year = $_POST['year'];
        
            try{
                $db = new PDO("pgsql:host=".$host_db.";dbname=".$name_db."", "".$user_db."", "".$pass_db."") or die(print_r($db->errorInfo()));
                $db->exec("SET NAMES utf8");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                
                $query = "INSERT INTO STUDENT (surname, email, password_student, year) VALUES (:firstname, :mail, :pass, :year)";
                $statement = $db->prepare($query);
                $statement->bind(':firstname', $student_name);
                $statement->bind(':mail', $student_mail);
                $statement->bind(':pass', $student_pass);
                $statement->bind(':year', $student_year);
                $statement->execute();
                
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    echo $row;
                }
            }
            
            catch(Exeption $e){
                die("Erreur!".$e->getMessage());
            }
        ?>
</body>
</html>