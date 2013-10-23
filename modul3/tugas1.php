<!DOCTYPE html> 
<html> 
	<head> 
	  <title>login</title> 
	</head>

	<body>
		<?php 
		session_start();
		if (isset($_SESSION['user'])){
			session_destroy();
		}
		?> 
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onSubmit="return checkform(this)">
	<table bordercolor="purple" align="center" width="400" cellpadding="3" bgcolor="#DDA0DD">
	<tr> <td> <h2 style="color:purple"><center> LOGIN </center></h2></td> </tr>
	<tr> <td> <hr align="center" width="350" color="purple"/> </td></tr>
	
	<tr>
	<td style="font-family:Arial; color:purple" ><center>Username<center></td> </tr>
	<tr><td><center><input type="text" name="username" /></center></td>
	</tr><br />
	
	<tr>
	<td style="font-family:Arial; color:purple"><center>Password <center></td> </tr>
	<tr><td><center><input type="text" name="password" /></center></td>
	</tr><br />
	
	<tr> 
	<td align="center"> 
	<input type="submit" name ="login" value="Login">
	</td>
	</tr>
	</table>
	
	<tr>
	<td> <br>
	<center>
		<?php 
			$usname = 'larensi';
			$pass = '180493';
			if (isset($_POST['username']) && isset($_POST['password'])) 
			{ 
				$username = strip_tags($_POST['username']);
				$password = strip_tags($_POST['password']);
				if (($username==$usname)&&($password==$pass)){
					$_SESSION['user'] = $username;
					echo '<h2>Login berhasil. Selamat datang '.$usname .'</h2>'.
						'<a href="tugas.php">Lanjutkan</a><br/>';
				} 
				else 
				{
					echo ' <h2>Login gagal <br> Koreksi Username dan Password</h2><br/>'.
					'<a href="tugas.php">Coba Lagi</a>';
			}
		}
		?>
		</center>
	</td>
	</tr>
	</form>
	</body>
</html>