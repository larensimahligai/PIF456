<!DOCTYPE html>

<html>

<head> 
	<title>  Tugas Praktikum Modul 4 </title> 
	<style type="text/css">
	.even {
	background: #ddd;
	}
	</style>
</head>

<body> 

<?php
ini_set('display_error',1);
define('VALID', 1);

require_once('./auth.php');

init_login();
validate();

require_once './koneksi.php';
require_once './datahandler.php';
define('MHS', 'mahasiswa');

data_handler('?m=data');
?>

</body>
</html>

