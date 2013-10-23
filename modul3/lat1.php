<!DOCTYPE html>
<html>
    <head>
		<title>Set Cookie</title>
	</head>
	
	<body>
	
		<?php
			//men-set nilai cookie
			setcookie('nama_cookie', 'nilai_cookie');
			//mendapatkan nilai cookie
			echo $_COOKIE['nama_cookie'];
		?>
		<p> Tekan Refresh (F5);
		
	</body>
	
</html>