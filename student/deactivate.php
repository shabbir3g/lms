<?php 



require_once("../dbcon.php");
	
	
	if(isset($_GET['profileid'])){
		$id = base64_decode($_GET['profileid']);
	
	
		mysqli_query($con,"DELETE FROM students WHERE id='$id'");
		
		session_start();


		session_destroy();

		unset($_COOKIE['student_id']);
		unset($_COOKIE['student_login']);

		setcookie('student_id', $stdid, -time() + 60*60*24);
		setcookie('student_login', $email, -time() + 60*60*24);

		header('location: login.php');
		
	}

