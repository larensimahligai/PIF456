<!DOCTYPE html> 
<html> 
 
<head> 
  <title>Halaman Admin</title> 
</head> 
 
<body> 
 
<?php 
session_start();
if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	echo	'<p align="right">
			<a href="tugas1.php">Logout</a>
			'.$user.'
			<h2 style="color:purple"><center><b>Selamat Datang</b></center></h2><br/><br/>
			<br/><br>
			';
	} else {
		header('location:tugas1.php');
		exit;
	}
?>
</body>
</html>