<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<div class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/bootstrap/index.php">Home</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul4/studikasus">Studi Kasus Modul 4</a></li>
      <li class="active"><a href="http://localhost/bootstrap/modul4/tuprak">Tugas Praktikum Modul 4</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul5/studikasus.php">Studi Kasus Modul 5</a></li>
	  <li class="active"><a href="http://localhost/bootstrap/modul5/tuprak.php">Tugas Praktikum Modul 5</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
		    <li><a href="#">Larensi</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
  
  </head>
  <body>
  <?php
defined('VALID') or die('not allowed');

function init_login() {
$nama = 'larensi';
$pass = 'mahligai';

if(isset($_POST['nama']) && isset($_POST['pass'])) {
        $n = trim($_POST['nama']);
        $p = trim($_POST['pass']);

        if(($n === $nama) && ($p === $pass)) {
        setcookie('nlogin', $n);
        setcookie('time', time());
?>
<script type="text/javascript">
document.location.href="./";
</script>

<?php
} else {
	?>
        <h3><center>Username dan Password Salah</center></h3>
	<?php
        return false;
}
}
}

function validate() {
if (!isset($_COOKIE['nlogin']) || !isset($_COOKIE['time'])) {
?>
  <div class="container">
	<form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">LOGIN</h2>
        <input type="text" class="input-block-level" name="nama" placeholder="Username">
        <input type="password" class="input-block-level" name="pass" placeholder="Password"><br>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label><br>
        <button class="btn btn-default" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
<?php
exit;
}
        if (isset($_GET['m']) && $_GET['m'] == 'logout') {
if(isset($_COOKIE['nlogin'])) {
        setcookie('nlogin', '', time()-3*3600);
}
if(isset($_COOKIE['time'])) {
        setcookie('time', '', time()-3*3600);
}


?>

<script type="text/javascript">
document.location.href="./";
</script>
<?php
}
}
?>