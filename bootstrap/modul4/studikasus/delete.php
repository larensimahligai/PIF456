<!DOCTYPE html >
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

 <title>Delete </title>

 <div class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/bootstrap/index.php">Home</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul4/studikasus">Studi Kasus Modul 4</a></li>
      <li class="active"><a href="http://localhost/bootstrap/modul4/tuprak">Tugas Praktikum Modul 4</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul5/studikasus.php">Studi Kasus Modul 5</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul5/tuprak.php">Tugas Praktikum Modul 5</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    		<span class="glyphicon glyphicon-user"></span>						
		    <li>Larensi</li>
    </ul>
  </div><!-- /.navbar-collapse -->
 <script language="JavaScript">
    // konfirmasi menghapus record tertentu
    function konfirmasi(id)
    {
        tanya = confirm('Anda yakin ingin menghapus data dengan NIM '+ id + '?');
        if (tanya == true)
            return true;
        else
            return false;
    }
 </script>

 </head>

 <body>
    <?php
		error_reporting(0);
        include "koneksi.php";
       
        $id = $_GET['id'];
        if ($id)
        {
            $query = mysql_query("DELETE FROM mahasiswa WHERE nim=$id");
            header("Location:".$_SERVER['PHP_SELF']);
        }
    ?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h3>
				Data Siswa
			</h3>
 <form id="form1" name="form1" method="post" action="">
  <table class="table table-striped table-hover">
    <thead>
					<tr>
						<th>
							NIM
						</th>
						<th>
							Nama
						</th>
						<th>
							Alamat
						</th>
						<th>
							Hapus
						</th>
					</tr>
				</thead>
    <?php
        $sql = mysql_query("SELECT * FROM mahasiswa");
    while ($row = mysql_fetch_array($sql))
    {
        $id = $row['nim'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $_SERVER['PHP_SELF'];
    ?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $nama; ?></td>
      <td><?php echo $alamat; ?></td>
      <td><?php echo "<a href=\"".$_SERVER['PHP_SELF']."?id=$id\" onclick=\"return konfirmasi('$id')\">Delete</a>"; ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
			</table>
		</div> 
 </body>
 </html>