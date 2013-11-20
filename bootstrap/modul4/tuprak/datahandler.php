<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
<?php
function data_handler($root) {
        if (isset($_GET['act']) && $_GET['act'] == 'add') {
                data_editor($root);
                return;
        }
        $res = mysql_query("SELECT count(*) AS total FROM " . MHS );
        if(mysql_num_rows($res)) {
                if(isset($_GET['act']) && $_GET['act'] != '') {
                        switch ($_GET['act']) {
                                case 'edit':
                                        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                                                data_editor($root, $_GET['id']);
                                        } else {
                                                show_admin_data($root);
                                        }
                                        break;
                                case 'view':
                                        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                                                data_detail($root, $_GET['id'], 1);
                                        } else {
                                                show_admin_data($root);
                                        }
                                        break;
                                case 'del':
                                        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $ok = "DELETE FROM mahasiswa WHERE nim='$id'"; 
                                                $res = mysql_query($ok);
                                                if ($res) {
                                                        
                                                        ?>

                                                <?php
                                                } else {
                                                        echo 'Gagal menghapus data';
                                                } 
                                        } else {
                                                show_admin_data($root);
                                        }
                                        break;
                                default:
                                        show_admin_data($root);
                                        break;
                        }
                } else {
                        show_admin_data($root);
                }
                @mysql_close(res);
        } else {
                echo 'Data Tidak ditemukan';
        }
}

function show_admin_data($root) { ?>
        
        <?php
        $sql = 'SELECT nim, nama, alamat FROM mahasiswa';
        $res = mysql_query($sql);

        if($res) {
                $num = mysql_num_rows($res);
                if ($num) {
                        ?>
                        <div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h3>
				Administrasi Data
			</h3>
			<a href="<?php echo $root; ?>&amp;act=add">Tambah Data</a>
			<a href="#" class="btn" type="button"></a>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th> # </th>
						<th>
							NIM
						</th>
						<th>
							Nama
						</th>
						<th>
							Alamat
						</th>
						<th> Menu 
						</th>
					</tr>
				</thead>
				<tbody>
                        <?php
                        $i=1;
                        while($row = mysql_fetch_row($res)) {
                                $bg = (($i % 2) != 0) ? '' : 'even';
                                $id = $row[0]; ?>
                                <tr class="<?php echo $bg; ?>">
                                        <td width="2%"><?php echo $i;?></td>
                                        <td>
                                                <a href="<?php echo $root;?>&amp;act=view&amp;id=<?php echo $id;?>" title="Lihat Data"><?php echo $id;?></a>
                                        </td>
                                        <td><?php echo $row[1];?></td>
                                        <td><?php echo $row[2];?></td>
                                        <td>
                                        |<a href ="<?php echo $root;?>&amp;act=edit&amp;id=<?php echo $id;?>">
                                        Edit</a> | 
                                        <a href ="delete.php"> Hapus
                                        </td>
                                </tr>
                                <?php
                                $i++;
                                }
                                ?>
                        </tbody>
			</table>
		</div>
        <?php
        } else {
                echo 'Belum ada data, isi <a href="' . $root.'&amp;act=add">di sini</a>';
        }
        mysql_close();
        }
		echo "<p><a href='?m=logout'>Logout</a>";

}

function data_detail($root, $id) {
        $sql = "SELECT nim, nama, alamat FROM mahasiswa WHERE nim ='$id'";
        $res = mysql_query($sql);
        if($res) {
                if (mysql_num_rows($res)) { ?>
                        <div class="container">
						<div class="row clearfix">
						<div class="col-md-12 column">
						</br> </br>
                            <table class="table table-striped table-hover">
				<tbody>
                                        <?php
                                        $row = mysql_fetch_row($res); ?>
                                        <tr class="success">
                                                <td>NIM</td>
                                                <td><?php echo $row[0];?></td>
                                        </tr>        
                                        <tr>
                                                <td>Nama</td>
                                                <td><?php echo $row[1];?></td>
                                        </tr>
                                        <tr class="success">
                                                <td>Alamat</td>
                                                <td><?php echo $row[2];?></td>
                                        </tr>
                                </tbody>
			</table>
		</div>
                        <?php
                } else {
                        echo 'Data Tidak Ditemukan';
                }
                mysql_close();
        }
}

function data_editor($root, $id = 0) {
        $view = true;
        if(isset($_POST['nim']) && $_POST['nim']) {
                if (!$id) {
                        $nim         = $_POST['nim'];
                        $nama         = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $res = mysql_query("INSERT INTO mahasiswa VALUES ('".$nim."', '" .$nama."', '" .$alamat."')");
						echo "<a href='index.php'> Kembali ke Menu Utama </a>";
                        if($res) { ?>
                        <script type="text/javascript">
                        document.location.href="<?php echo $root;?>";
                        </script>
                <?php
                } else {
                        echo 'Gagal menambah data';
                }
                } else {
                        $nim         = $_POST['nim'];
                        $nama         = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $res = mysql_query("UPDATE mahasiswa SET nim='$nim', nama='$nama', alamat='$alamat' WHERE nim='$id'");
						echo "<a href='index.php'> Kembali ke Menu Utama </a>";
                        if ($res) { ?>

                <?php
                } else {
                        echo 'Gagal Modifikasi';
                }
                }
        }
        if ($view) {
                if ($id) {
                        $sql = "SELECT nim, nama, alamat FROM mahasiswa WHERE nim ='$id'";
                        $res = mysql_query($sql);
                        if ($res) {
                                if(mysql_num_rows($res)) {
                                        $row = mysql_fetch_row($res);
                                        $nim = $row[0];
                                        $nama = $row[1];
                                        $alamat = $row[2];
                                } else {
                                        show_admin_data();
                                        return;
                                }
                        }
                } else {
                        $nim = @$_POST['nim'];
                        $nama = @$_POST['nama'];
                        $alamat = @$_POST['alamat'];
                }
                ?>
                
                <div class="container">
				<h2> <?php echo $id ? 'Edit' : 'Tambah';?> Data </h2>
				<div class="row clearfix">
				<div class="col-md-12 column">
                <form class="form-horizontal" role="form" action="" method="post">
				
				<div class="form-group">
					<label for="NIM" class="col-sm-2 control-label">NIM*</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nim" value="<?php echo $nim;?>"/>
					</div> 
				</div>
				<div class="form-group">
					<label for="Nama" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama" value="<?php echo $nama;?>"/>
					</div> 
				</div>
				<div class="form-group">	
					<label for="Alamat" class="col-sm-2 control-label">Alamat</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="alamat" value="<?php echo $alamat;?>"/>
					</div> 
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						 <input type="submit" value="Submit"/> <input type="button" value="cancel" onclick="history.go(-1)"/>
					</div>
					<p> Ket: * Harus diisi</p>
				</div>
			</form>
		</div>
	</div>
</div>
                <?php
        }
        return false;
        }


?>

 </body>
</html>