<?php 

require_once("dbcon.php");


session_start();


	$std_student = isset($_COOKIE['image']) ? $_COOKIE['image'] : $_SESSION['image'];



$chat = $_POST['chat'];



$datetime = date('F d, Y | g:i A');


if(isset($chat)){

	$data = mysqli_query($con, "INSERT INTO `message`(`user_image`, `message`, `datetime`) VALUES ('$std_student','$chat','$datetime')");

	 if($data == true){

		echo '<audio src="../assets/messenger.mp3" autoplay="true" ></audio>';
	}else{

		false;
	}


}










