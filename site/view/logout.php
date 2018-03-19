<?php 
session_start();
echo $_SESSION['id'];
session_destroy(); 
echo $_SESSION['id'];
//header('Location: ../index.php');
?>
