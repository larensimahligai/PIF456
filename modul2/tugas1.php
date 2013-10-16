<!DOCTYPE html>
<html>
    <head>
		<title>Larensi Mahligai(Tugas)</title>
	</head>
	
	<body>
	
	<script language="JavaScript" type="text/javascript">
	function checkusername(input) {
		re = /^\D{4,}$/;
		return re.test(input);
	}

	function checkpassword(input) {
		re = /^\D{4,}$/;
		return re.test(input);
	}
	
	function checkform(form) 
	{
		if(!checkusername(form.username.value)) 
		{
		alert("Username Salah");
		form.username.focus();
		return false; 
		}
	
	if(!checkpassword(form.password.value)) 
		{
		alert("Password Salah");
		form.password.focus();
		return false;
		}
	}
	</script>
	
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
	if(isset($_POST["login"])) {
	$user = $_POST['username'];	
	$pass = $_POST['password'];
	if($user == "larensi" && $pass == "larensi") {
		echo '<h2>Login berhasil. Selamat datang '.$user .'</h2>';}
	else {echo '<h2> Login gagal <br> Koreksi Username dan Password</h2>';}
	}
	?>
	</center>
	</td>
	</tr>
	</form>
	
	
	</body>
</html>
	