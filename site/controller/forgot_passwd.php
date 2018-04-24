<?php

require("../model/create_forgot_passwd_token");

$student_mail = $_POST['mail'];
$token_hash = md5($student_mail.date('Y-m-d H:i:s').rand());
create_forgot_passwd_token($token_hash, $student_mail);

//Send mail to user



header("Location: ../view/forgot_passwd_sent.html");

?>
