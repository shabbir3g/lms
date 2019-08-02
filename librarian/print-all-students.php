<?php

    require_once("../dbcon.php"); 


    $result = mysqli_query($con, "SELECT * FROM students");



 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LMS | Print All Students</title>

	 <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
</head>
<body onload="window.print()" >
	<style> 
		body{
			margin: 0;
			padding: 0;
		}
		.print-area{
			width: 755px;
			height: 1050px;
			margin: auto;
			box-sizing: border-box;
			page-break-after: always;
		}


	</style>

			<?php 

			$sl = 1;
			$page = 1;
			$total = mysqli_num_rows($result);
			$per_page = 25;

			while($row = mysqli_fetch_assoc($result)): 

				if($sl % $per_page == 1){

					echo page_header();

				}
			 ?>
	
				<tr> 
					<td><?php echo $sl; ?></td>
					<td><?php echo ucwords($row['fname'].' '.$row['lname']); ?></td>
					<td><?php echo $row['roll']; ?></td>
					<td><?php echo $row['reg']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['phone']; ?></td>
				</tr>
			<?php
				if($sl % $per_page ==  0 || $total == $per_page){

					echo page_footer();

				} 
				 $sl++; endwhile; ?>

		


<!-- ========================================================= -->
    <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>




<?php 

function page_header(){
	$data = '<div class="print-area  text-center"> 
		<div class="header">
			 <div class="logo">
            <img width="200" alt="logo" src="../assets/images/logo-dark.png" />
            </div> 
			<h2>PABNA UNIVERSITY OF SCIENCE & TECHNOLOGY</h2>
			<h3>Department of Computer Science and Engineering</h3>
		
		</div>
		<div class="data-info"> 
			<table class="table table-bordered"> 
				<tr>
					<th>SI NO</th>
					<th>Institute Name</th>
					<th>Department Name</th>
					<th>Student IDc</th>
					<th>Student Name</th>
				</tr>';
	return $data;
}

function page_footer(){
	$data = '</table>
			<div class="page-info"> 
				Page:- 01
			</div>

		</div>
	</div>';
	return $data;
}










?>