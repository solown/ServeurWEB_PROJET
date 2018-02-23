<?php 
/*require("db_connect.php");

$db = db_connect();*/

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="file_img" />
<input type="submit" name="btn_upload" value="Upload"/>    
</form>

<?php
if(isset($_POST['btn_upload']))
{
    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
    $filepath = "profile_pic/".$filename;
    
    move_uploaded_file($filetmp,$filepath);
/*    
    $sql = "INSERT INTO student (pic) VALUES ('$filepath')";
    $result = mysql_query($sql);
}*/
?>

</body>
</html>
