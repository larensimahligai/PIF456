<?php
/*******EDIT BARIS 3-8*******/
$DB_Server = "localhost"; //MySQL Server 
$DB_Username = "root"; //MySQL Username 
$DB_Password = "";             //MySQL Password 
$DB_DBName = "myweb";         //MySQL Database Name 
$DB_TBLName = "mahasiswa"; //MySQL Table Name
$filename = "tabelmahasiswa";         //File Name
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/
//create MySQL connection

$sql = "Select * from $DB_TBLName";
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password)
    or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database
$Db = @mysql_select_db($DB_DBName, $Connect)
    or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());
//execute query
$result = @mysql_query($sql,$Connect)
    or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());
$file_ending = "xls";

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

date_default_timezone_set('Asia/Jakarta');

/** Include PHPExcel */
require_once 'Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                                                         ->setLastModifiedBy("Maarten Balliauw")
                                                         ->setTitle("Office 2007 XLSX Test Document")
                                                         ->setSubject("Office 2007 XLSX Test Document")
                                                         ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                                         ->setKeywords("office 2007 openxml php")
                                                         ->setCategory("Test result file");
                                                         
// Add some data
$query = mysql_query('select nim, nama, alamat from mahasiswa');

//set table header
$objPHPExcel->getActiveSheet()->setCellValue('B6', 'No');
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'NIM');
$objPHPExcel->getActiveSheet()->setCellValue('D6', 'Nama');
$objPHPExcel->getActiveSheet()->setCellValue('E6', 'Alamat');

//start data from row 7
$i = 7;
$no= 1;
while($data=mysql_fetch_array($query)){
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $no);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $data['nim']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $data['nama']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $data['alamat']);
        $i++;
        $no++;
}

// Set title row bold;
$objPHPExcel->getActiveSheet()->getStyle('B6:E6')->getFont()->setBold(true);
// Set fills
$objPHPExcel->getActiveSheet()->getStyle('B6:E6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$objPHPExcel->getActiveSheet()->getStyle('B6:E6')->getFill()->getStartColor()->setARGB('FF808080');

//set border 
$objPHPExcel->getActiveSheet()->getStyle('B6:E6')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
$objPHPExcel->getActiveSheet()->getStyle('B6:E6')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
$objPHPExcel->getActiveSheet()->getStyle('B6:E6')->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);
$objPHPExcel->getActiveSheet()->getStyle('B6:E6')->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->mergeCells('A3:G3');
$objPHPExcel->getActiveSheet()->setCellValue('A3', "DATA MAHASISWA Jurusan Teknik Elektro");
$objPHPExcel->getActiveSheet()->getStyle('A3:J5')->getFont()->setName('Arial');
$objPHPExcel->getActiveSheet()->getStyle('A3:J3')->getFont()->setSize(17);
$objPHPExcel->getActiveSheet()->getStyle('A3:J5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A3:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage
// Echo done
echo date('H:i:s') , "<center><b>Berhasil Di Download<b></center>" , EOL;
echo '<center>File disimpan pada ' , getcwd() , '</center> ', EOL;