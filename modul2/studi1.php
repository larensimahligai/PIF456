<!DOCTYPE html>
<html>
    <head>
		<title>Larensi Mahligai (Studi Kasus 1)</title>
	</head>
	
	<body>
	<h2><center>Data Diri</center></h2>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	<table bordercolor ="purple" align="center" width="400" cellspacing="3" cellpadding="3">
	
	<tr>
	<td> Nama Lengkap </td>
	<td> : </td> 
	<td> <input type="text" name="nama" /> </td>
	</tr><br />
	
	<tr>
	<td> Tanggal Lahir </td>
	<td> : </td> 
		<td><select name="tanggal">
			<option value="1">1
			<option value="2">2
			<option value="3">3
			<option value="4">4
			<option value="5">5
			<option value="6">6
			<option value="7">7
			<option value="8">8
			<option value="9">9
			<option value="10">10
			<option value="11">11
			<option value="12">12
			<option value="13">13
			<option value="14">14
			<option value="15">15
			<option value="16">16
			<option value="17">17
			<option value="18" selected>18
			<option value="19">19
			<option value="20">20
			<option value="21">21
			<option value="22">22
			<option value="23">23
			<option value="24">24
			<option value="25">25
			<option value="26">26
			<option value="27">27
			<option value="28">18
			<option value="29">29
			<option value="30">30
			<option value="31">31
		</select></td>
	</tr><br />	
	
	<tr>
	<td> Bulan Lahir </td> 
		<td>:</td>
			<td><select name="bulan">
                <option value="Januari">Januari
                <option value="Februari">Februari
                <option value="Maret">Maret
				<option value="April" selected>April
				<option value="Mei">Mei
				<option value="Juni">Juni
				<option value="Juli">Juli
				<option value="Agustus">Agustus
				<option value="September">September
				<option value="Oktober">Oktober
				<option value="November">November
				<option value="Desember">Desember
                </select></td>
		</td>
	</tr> <br />

	<tr>
	<td> Tahun Lahir </td> 
		<td>:</td>
			<td><select name="tahun">
                <option value="1988">1988
                <option value="1989">1989
                <option value="1990">1990
				<option value="1991">1991
				<option value="1992">1992
				<option value="1993" selected>1993
				<option value="1994">1994
				<option value="1995">1995
				<option value="1996">1996
				<option value="1997">1997
                </select></td>
			</td>
			</tr> <br />	

	<tr> 
	<td></td> <td></td>
	<td> <input type="submit" value="OK"/> </td>
	</tr>
	
	</table>
	<tr>
	<td>
	<center> <br>
	<?php
	if (isset($_POST['tanggal']))
	{
		echo "Namaku ";
		echo $_POST['nama'];
		echo "<br>Tanggal lahirku ";
		echo $_POST['tanggal'];
		echo " ";
		echo $_POST['bulan'];
		echo " ";
		echo $_POST['tahun'];
	}
	?>
	</center>
	</td>
	</tr>
	</form>
	
	
	</body>
</html>
	