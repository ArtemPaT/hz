<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', '43urok');
	$uploadfile = 'img/' . basename($_FILES['file']['name']);
	move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
	mysqli_query($con, "INSERT INTO works(description, file, student_id) VALUES ('{$_POST["desc"]}','{$uploadfile}','{$_POST["id"]}')");
	header("Location: accountStudent.php");
 ?>