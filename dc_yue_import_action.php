<?
//error_reporting(ALL);
set_time_limit(300000); 
//error_reporting(ALL);
session_start();
include("config/config.php");
include("config/dsql.php");
if(!isset($dsql)){
	$dsql = new DSQL();
}

ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
@mkdir("excel");
$project_name = time().".xls";
@copy( $_FILES['project']['tmp_name'] ,"excel/$project_name");

print_r ($_FILES['project']);
$inputFileName = "excel/$project_name";
if (!file_exists($inputFileName)) {  exit("文件".$inputFileName."不存在");   }

echo $inputFileName;


require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';  
require_once 'Classes/PHPExcel/Calculation/DateTime.php';  
require_once 'Classes/PHPExcel/Autoloader.php';  


	include 'phpqrcode/phpqrcode.php';
$errorCorrectionLevel = 'L';//容错级别 
$matrixPointSize = 6;//生成图片大小 

echo $phone_name;
echo "==".$phone;

 
//    $inputFileType = 'Excel2007';
    $inputFileType = 'Excel2003XML';
//    $inputFileType = 'OOCalc';
//    $inputFileType = 'SYLK';
//    $inputFileType = 'Gnumeric';
//    $inputFileType = 'CSV';


$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

 


$sheetCount = $objPHPExcel->getSheetCount();


$sheetSelected = 0;



for($j=0;$j<=12;$j++){

echo $j;
	$objPHPExcel->setActiveSheetIndex($j);

	//u getSheetByName('Worksheet 1');
	$rowArray = $objPHPExcel->getActiveSheet()->getRowDimensions();

	$cellArray = $objPHPExcel->getActiveSheet()->getColumnDimensions();

	$rowCount = count($rowArray)+10000;

	$cellCount = count($cellArray)+6;


	echo "<div>Sheet Count : ".$sheetCount."　　行数： ".$rowCount."　　列数：".$cellCount."</div>";


	$rowIndex = 0;

	$cellIndex = 0;

	$rowData = NULL;


	$dataArr = array();

	echo "<table>";
	$dsql->query("set names utf8");
	//$SQL = "delete   from  project";
	//$dsql->query($SQL);
	while ($rowIndex < $rowCount) {

		$cellIndex = 0;
		$rowData = $objPHPExcel->getActiveSheet();

		$pid =  trim($rowData->getCellByColumnAndRow(0, $rowIndex)->getValue()) ;
		$jinzhan =  trim($rowData->getCellByColumnAndRow(1, $rowIndex)->getValue()) ;
		$tupian =  trim($rowData->getCellByColumnAndRow(2, $rowIndex)->getValue()) ;
		$mubiao =  trim($rowData->getCellByColumnAndRow(3, $rowIndex)->getValue()) ;
		$wenti =  trim($rowData->getCellByColumnAndRow(4, $rowIndex)->getValue()) ;
		$wanchengtouzi =  trim($rowData->getCellByColumnAndRow(5, $rowIndex)->getValue()) ;
		$bennianleijitouzi =  trim($rowData->getCellByColumnAndRow(6, $rowIndex)->getValue()) ;
		$leijitouzi =  trim($rowData->getCellByColumnAndRow(7, $rowIndex)->getValue()) ;
		$yue =  trim($rowData->getCellByColumnAndRow(8, $rowIndex)->getValue()) ;
		if($pid==intval($pid)&&$pid>0){
			$SQL = "select * from project where id ='$pid'";
			$dsql->query($SQL);
			if($dsql->next_record()){
				$SQL = "delete from projectyue  where pid ='$pid' and yue='$yue'";
				$dsql->query($SQL);
				$SQL = "INSERT INTO projectyue (pid,jinzhan,tupian,mubiao,wenti,wanchengtouzi,bennianleijitouzi,leijitouzi,yue)VALUES('$pid', '$jinzhan', '$tupian', '$mubiao', '$wenti', '$wanchengtouzi', '$bennianleijitouzi', '$leijitouzi', '$yue')";



				echo "'$pid', '$jinzhan', '$tupian', '$mubiao', '$wenti', '$wanchengtouzi', '$bennianleijitouzi', '$leijitouzi', '$yue<br>";
				$dsql->query($SQL);
			}


		}
		$dsql->query("update projectyue set  wanchengtouzi = replace(wanchengtouzi,'?','')，bennianleijitouzi = replace(bennianleijitouzi,'?',''),leijitouzi = replace(leijitouzi,'?','')");

		if(  $rowIndex>400) break;




		$rowIndex++;
	}
	}


   echo "<br/>消耗的内存为：".(memory_get_peak_usage(true) / 1024 / 1024)."M";
   $endTime = time();
   echo "<div>解析完后，当前的时间为：".date("Y-m-d H:i:s")."　　　总共消耗的时间为：".(($endTime - $startTime))."秒</div>";
   echo implode("", $dataArr);


   $dataArr = NULL;


?>