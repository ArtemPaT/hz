<?php 
	session_start();
	$_SESSION["student_id"] = null;
	header("Location: index.php");
 ?>