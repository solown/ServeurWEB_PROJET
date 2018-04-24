<?php

$new_passwd = $_POST['passwd'];
$token = $_POST['token'];

require('../model/change_passwd.php');

change_passwd_for($token);

require('../view/passwd_changed.html');

?>
