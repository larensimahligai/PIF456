<!DOCTYPE> 
<html> 
<head> 
    <title>Tugas Praktikum</title> 
</head> 

<body>
	<h2>Sorting Data</h2>
    <table border=1 cellspacing=1 cellpadding=5>

    <?php
    require "koneksi.php";
    $query1 = "SELECT * FROM Mahasiswa ORDER BY nim ";
    $urut = 'asc';
    $urutbaru = 'asc';
    if(isset($_GET['orderby']))
	{
        $orderby=$_GET['orderby'];
        $urut=$_GET['urut'];
                                
        $query1="SELECT * FROM Mahasiswa order by $orderby $urut ";
        if($urut=='asc')
		{
            $urutbaru='desc';                                        
        }
		else
		{
            $urutbaru='asc';
        }
    }
    ?>
    <th>
        <td><a href='tuprak.php?orderby=nim&urut=<?=$urutbaru;?>'>Nim</a></td>
        <td><a href='tuprak.php?orderby=nama&urut=<?=$urutbaru;?>'>Nama</a></td>
        <td><a href='tuprak.php?orderby=alamat&urut=<?=$urutbaru;?>'>Alamat</a></td>
    </th>
                                                        
    <?php
        $result = mysql_query($query1) or die (mysql_error());
        $no = 1;
        while($rows=mysql_fetch_object($result))
		{
        ?>
			<tr>
                <td><?php echo $no ?></td>
                <td><?php echo $rows -> nim;?></td>
                <td><?php echo $rows -> nama;?></td>
                <td><?php echo $rows -> alamat;?></td>
            </tr>
                
			<?php
            $no++;
        }
            ?>
    </table>
</body>
</html>