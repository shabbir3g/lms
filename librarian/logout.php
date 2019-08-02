<?php 


session_start();


session_destroy();

unset($_COOKIE['librarian_login']);

setcookie('librarian_login', $email, -time() + 60*60*24);

header('location: login.php');











?>