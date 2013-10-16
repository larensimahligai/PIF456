<!DOCTYPE html>
<html>
    <head>
		<title>Larensi Mahligai (Studi Kasus 2)</title>
	</head>
	
	<body>
	<h2><center>Data Diri</center></h2>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	<table  bordercolor ="purple" align="center" width="400" cellspacing="3" cellpadding="3">
	
	<tr>
	<td> Nama </td>
	<td> : </td> 
	<td> <input type="text" name="nama" /> </td>
	</tr><br />
	
	<tr>
	<td>Hobby</td>
	<td>:</td>
	<td><input name="hobby[]" type="checkbox" value="Nonton TV" checked> </input> Nonton TV </td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td><input name="hobby[]" type="checkbox"value="Main Game"> </input> Main Game</td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td><input name="hobby[]" type="checkbox"value="Tidur"></input> Tidur </td>
	</tr><br>
	<tr>
	<td></td>
	<td></td>
	<td><input name="hobby[]" type="checkbox" value="Jalan jalan"></input> Jalan-jalan </td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td><input name="hobby[]" type="checkbox" value="Membaca"></input> Membaca </td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	<td><input name="hobby[]" type="checkbox" value="Menulis"></input> Menulis </td>
	</tr>
	
	<tr> 
	<td></td> <td></td>
	<td> <input type="submit" value="OK"/> </td>
	</tr>
	
	</table>
	<tr>
	<td> <br>
	<center>
	<?php
	if (isset($_POST['hobby']))
	{
		echo 'Namaku ' .$_POST['nama']. ',<br/>';
		echo 'Hobbyku : <br>';
		foreach ($_POST['hobby'] as $key => $val)
		{
			echo ' ' .$val . ', ';
		}
	}
	?>
	</center>
	</td>
	</tr>
	</form>
	
	
	</body>
</html>
	