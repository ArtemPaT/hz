<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль поступающего</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

	<!--если студент НЕ авторизовался, то показывается эта часть, в том числе ссылка на страницу  логина-->
	<?php 
		if ($_SESSION["student_id"] == null) {
			
	 ?>
	<div class="col-10 mx-auto">
		<h3>Войдите как абитуриент</h3>
		<p>Вы не авторизованы</p>
		<a href="loginStudent.php">Авторизация абитуриента</a>
		<a href="loginUniversity.php">Авторизация университета</a>
	</div>
	<?php } ?>
	<?php elseif ($_SESSION["university_id"] != null) {
		 
	 ?>
	 <?php 
	 	//
	 	$con = mysqli_connect('127.0.0.1', 'root', '', '43urok');
	 	$query = mysqli_query($con, "SELECT * FROM students WHERE id = '{$_SESSION["student_id"]}'");
	 	$result = $query->fetch_assoc();
	 	//
	 	$query_work = mysqli_query($con, "SELECT * FROM apllications INNER JOIN students WHERE un_id = '{$_SESSION["university_id"]}'");
	 	//
		$query_un = mysqli_query($con, "SELECT * FROM apllications INNER JOIN university_account ON apllications.un_id = university_account.university_id WHERE university_id = {$_SESSION['university_id']}");
		$un_name = mysqli_query($con, "SELECT name FROM universities WHERE id = {$_SESSION['university_id']}");
		$table_count_un = mysqli_num_rows($query_work);
		$result_un = $query_un->fetch_assoc();
	  ?>
	 <h5>Добро пожаловать, <?php echo $result_un["login"]; ?></h5>
	 <h4>Ваш университет: <?php echo $un_name ?></h4>
	 <h3>Заявки абитуриентов:</h3>
	 <?php 
	 	for ($i=0; $i < $table_count_un; $i++) { 
			 $result_work = $query_work->fetch_assoc();
	  ?>
	 <p>Возраст: <?php echo $result_work["age"] ?></p>
	 <p>Школа: <?php echo $result_work["school"] ?></p>
	 <input type="" name="" value="<?php echo $result_work["id"] ?>">
	 <button class="btn btn-primary">Посмотреть портфолио</button>
	<?php } ?>
	<?php else { ?>
	<!--если студент авторизовался, то показываются nav (меню) и контент всего сайта-->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Привет, <?php echo $result["fio"]; ?></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a href="signOutStudent.php" class="nav-link text-danger">Выйти</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Главная</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav>

	<div class="col-10 mx-auto mt-5">
		<div class="row">
			<div class="col-3 border py-3 rounded">
				<h5>Добавить работу</h5>
				<form action="addWork.php" method="POST" enctype="multipart/form-data">
					<input class="mt-3 form-control" type="" name="id" style="display: none;" value="<?php echo $result['id'] ?>">
					<input class="mt-3 form-control" type="" placeholder="Описание" name="desc">
					<input placeholder="Выбрать файл" class="mt-3" type="file" name="file">
					<button class="btn btn-success mt-3">Загрузить работу в портфолио</button>
				</form>
			</div>
			
			<!--Вывод работ-->
			<?php 
				$query2 = mysqli_query($con, "SELECT * FROM works WHERE student_id = '{$_SESSION['student_id']}'");
				$table_count = mysqli_num_rows($query2);
				for ($i=0; $i < $table_count; $i++) { 
					$res2 = $query2->fetch_assoc();					
				
			 ?>
			<div class="col-3">
				<img class="w-100" src="<?php echo $res2['file'] ?>">
				<p><?php echo $res2['description'] ?></p>
			</div>
			<?php } ?>	
		</div>
		<div class=" mt-5">
			<h3>Мои заявки в университеты</h3>		
			<?php 
				$con_join = mysqli_query($con, "SELECT * FROM apllications INNER JOIN universities ON apllications.un_id = universities.id WHERE student_id = {$_SESSION['student_id']}");
				$table_count2 = mysqli_num_rows($con_join);
				for ($i=0; $i < $table_count2; $i++) { 
					$res3 = $con_join->fetch_assoc();
			 ?>
			 <p><?php echo $res3['name'] ?></p>
			<?php } ?>
		</div>
	</div>
	<?php } ?>

</body>
</html>
