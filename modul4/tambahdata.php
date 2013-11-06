<!DOCTYPE>
<html>
<head>
	<title>Tambah Data</title>
</head>

<body>

	<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
	<table>
		<tr>
			<td>NIM</td>
			<td><input type="text" name="nim" /></td>
		</tr>
		<tr>
			<td>Nama</d>
			<td><input type="text" name="nama" size=40 /></td>
		</tr>
		<tr>
			<td>Alamat</d>
			<td><input type="text" name="alamat" size=60 /></td>
		</tr>
		<tr>
			<td></d>
			<td><input type="submit" value="Simpan"/></td>
		</tr>
	</table>
	</form>
	
	<?php
	error_reporting(0);
	require_once 'koneksi.php';
	
	//Jika field nim dan nama diisi lalu submit
	if (isset($_POST['nim']) && isset($_POST['nama']))
	{
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$alamat= $_POST['alamat'];
		
		//tambahkan data baru ke tabel
		$sql = "INSERT INTO mahasiswa
				VALUES ('" .$nim. "', '" .$nama. "', '" .$alamat. "')";
		
		$res = mysql_query($sql);
		if ($res)
		{
			echo 'Data Berhasil Ditambahkan';
			mysql_close($res);
		}
		else
		{
			echo 'Gagal Menambahkan Data <br/>';
			echo mysql_error();
		}
	}
		
		echo '<hr/>';
		//memanfaatkan script pengambilan data untuk menampilkan hasil
		require_once 'seleksi.php';
		?>
	</body>
</html>
	