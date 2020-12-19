<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', '43urok');
	mysqli_query($con, "INSERT INTO apllications(student_id, un_id) VALUES ('{$_POST['student_id']}','{$_POST['un_id']}')");
	header("Location: index.php");
 ?>