<!DOCTYPE html>

<html>

<head> 
	<title>  Studi Kasus Modul 4 </title> 
	<style type="text/css">
	.even {
	background: #ddd;
	}
	</style>
</head>

<body> 

<?php

require_once './koneksi.php';
require_once './datahandler.php';
define('MHS', 'mahasiswa');

data_handler('?m=data');
?>

</body>
</html>

