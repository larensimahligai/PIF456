<?php

	$nilai = 70;
	echo "Nilai anda $nilai, <br><br>";
	
	if($nilai >= 30 && $nilai <70)
	{ 
		echo "Anda tidak lulus";
	}
	else if($nilai == 70 || $nilai == 71)
	{
		echo "Anda berhak memilih Remidi atau tidak";
	}	
	else
	{
		echo "Anda Lulus";
	}
?>


