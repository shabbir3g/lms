<?php 


session_start();


session_destroy();

unset($_COOKIE['student_id']);
unset($_COOKIE['student_login']);

setcookie('student_id', $stdid, -time() + 60*60*24);
setcookie('student_login', $email, -time() + 60*60*24);

header('location: login.php');











?>