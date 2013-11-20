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
  
  <div class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul4/studikasus">Studi Kasus Modul 4</a></li>
      <li class="active"><a href="http://localhost/bootstrap/modul4/tuprak">Tugas Praktikum Modul 4</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul5/studikasus.php">Studi Kasus Modul 5</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul5/tuprak.php">Tugas Praktikum Modul 5</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
		    <li><a href="#">Larensi</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
  
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
				Data
			</h3>
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
                                        <td><?php echo $id;?></td>
                                        </td>
                                        <td><?php echo $row[1];?></td>
                                        <td><?php echo $row[2];?></td>
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
		

}

?>

 </body>
</html>