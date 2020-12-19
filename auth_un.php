<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', '43urok');
	$query = mysqli_query($con, "SELECT * FROM university_account WHERE login = '{$_POST['login']}' AND password = '{$_POST['password']}'");
	$table_count = mysqli_num_rows($query);
	$result = $query->fetch_assoc();
	if ($table_count == null) {
		header("Location: accountStudent.php");
	}
	else {
		$_SESSION['university_id'] = $result['university_id'];
		header("Location: accountStudent.php");
	}
	
 ?>
