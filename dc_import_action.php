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

 $objPHPExcel->setActiveSheetIndexByName("u");

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
	$SQL = "delete   from  project";
	$dsql->query($SQL);
   while ($rowIndex < $rowCount) {
	
	  $cellIndex = 0;
	  $rowData = $objPHPExcel->getActiveSheet();
	  
	 
	
		 
		$id =  trim($rowData->getCellByColumnAndRow(0, $rowIndex)->getValue()) ;
		$xiangmumingcheng =  trim($rowData->getCellByColumnAndRow(1, $rowIndex)->getValue()) ;
		$danweimingcheng =  trim($rowData->getCellByColumnAndRow(2, $rowIndex)->getValue()) ;
		$xianqu =  trim($rowData->getCellByColumnAndRow(3, $rowIndex)->getValue()) ;
		$dizhi =  trim($rowData->getCellByColumnAndRow(4, $rowIndex)->getValue()) ;
		$shenbaodanwei =  trim($rowData->getCellByColumnAndRow(5, $rowIndex)->getValue()) ;
		$fenlei861 =  trim($rowData->getCellByColumnAndRow(6, $rowIndex)->getValue()) ;
		$neirong =  trim($rowData->getCellByColumnAndRow(7, $rowIndex)->getValue()) ;
		$jiansheqixian =  trim($rowData->getCellByColumnAndRow(8, $rowIndex)->getValue()) ;
		$zongtouzi =  trim($rowData->getCellByColumnAndRow(9, $rowIndex)->getValue()) ;
		$quniantouzi =  trim($rowData->getCellByColumnAndRow(10, $rowIndex)->getValue()) ;
		$dangniantouzi =  trim($rowData->getCellByColumnAndRow(11, $rowIndex)->getValue()) ;
		$zhuangtai =  trim($rowData->getCellByColumnAndRow(12, $rowIndex)->getValue()) ;
		$jieduan =  trim($rowData->getCellByColumnAndRow(13, $rowIndex)->getValue()) ;
		$jihuakaigong =  trim($rowData->getCellByColumnAndRow(14, $rowIndex)->getValue()) ;
		$shijikaigong =  trim($rowData->getCellByColumnAndRow(15, $rowIndex)->getValue()) ;
		$jihuajungong =  trim($rowData->getCellByColumnAndRow(16, $rowIndex)->getValue()) ;
		$shijijungong =  trim($rowData->getCellByColumnAndRow(17, $rowIndex)->getValue()) ;

	   $isweikaigong =  trim($rowData->getCellByColumnAndRow(18, $rowIndex)->getValue()) ;
	   $isweijugong =  trim($rowData->getCellByColumnAndRow(19, $rowIndex)->getValue()) ;
	   $zerendanwei =  trim($rowData->getCellByColumnAndRow(20, $rowIndex)->getValue()) ;
	   $isjihuaxinkaigong =  trim($rowData->getCellByColumnAndRow(21, $rowIndex)->getValue()) ;
	   $isyijingkaigong =  trim($rowData->getCellByColumnAndRow(22, $rowIndex)->getValue()) ;
	   $isjihuajungong =  trim($rowData->getCellByColumnAndRow(23, $rowIndex)->getValue()) ;
	   $isyijingjungong =  trim($rowData->getCellByColumnAndRow(24, $rowIndex)->getValue()) ;

	   $isyijingjungong =  trim($rowData->getCellByColumnAndRow(24, $rowIndex)->getValue()) ;
	   $zerenren =  trim($rowData->getCellByColumnAndRow(25, $rowIndex)->getValue()) ;
	   $lianxidianhua =  trim($rowData->getCellByColumnAndRow(26, $rowIndex)->getValue()) ;


	   if($xiangmumingcheng==$isjihuaxinkaigong){
		   $isjihuaxinkaigong = 1;
	   }else{
		   $isjihuaxinkaigong = 0;
		   echo "<font color='red'>$isyijingkaigong</font>";
	   }
	   if($xiangmumingcheng==$isyijingkaigong){
		   $isyijingkaigong = 1;
	   }else{
		   $isyijingkaigong = 0;
		   echo "<font color='red'>$isyijingkaigong</font>";
	   }
	   if($xiangmumingcheng==$isjihuajungong){
		   $isjihuajungong = 1;
	   }else{
		   $isjihuajungong = 0;
		   echo "<font color='red'>$isjihuajungong</font>";
	   }
	   if($xiangmumingcheng==$isyijingjungong){
		   $isyijingjungong = 1;
	   }else{
		   $isyijingjungong = 0;
		   echo "<font color='red'>$isyijingjungong</font>";
	   }
		if($id==intval($id)&&$id>0){
			$SQL = "INSERT INTO project (id, xiangmumingcheng, danweimingcheng, xianqu, dizhi, shenbaodanwei, fenlei861, neirong, jiansheqixian, zongtouzi, quniantouzi, dangniantouzi, zhuangtai, jieduan, jihuakaigong, shijikaigong, jihuajungong, shijijungong,isweikaigong,isweijugong,zerendanwei,isjihuaxinkaigong,isyijingkaigong,isjihuajungong,isyijingjungong,zerenren,lianxidianhua)VALUES('$id', '$xiangmumingcheng', '$danweimingcheng', '$xianqu', '$dizhi', '$shenbaodanwei', '$fenlei861', '$neirong', '$jiansheqixian', '$zongtouzi', '$quniantouzi', '$dangniantouzi', '$zhuangtai', '$jieduan', '$jihuakaigong', '$shijikaigong', '$jihuajungong', '$shijijungong','$isweikaigong','$isweijugong','$zerendanwei','$isjihuaxinkaigong','$isyijingkaigong','$isjihuajungong','$isyijingjungong','$zerenren','$lianxidianhua')";
			echo "'$id', '$xiangmumingcheng', '$danweimingcheng', '$xianqu', '$dizhi', '$shenbaodanwei', '$fenlei861', '$neirong', '$jiansheqixian', '$zongtouzi', '$quniantouzi', '$dangniantouzi', '$zhuangtai', '$jieduan', '$jihuakaigong', '$shijikaigong', '$jihuajungong', '$shijijungong'<br>";
				$dsql->query($SQL);
		}
		if(  $rowIndex>500)exit;
				
				
				
		 
  $rowIndex++;
 }


   echo "<br/>消耗的内存为：".(memory_get_peak_usage(true) / 1024 / 1024)."M";
   $endTime = time();
   echo "<div>解析完后，当前的时间为：".date("Y-m-d H:i:s")."　　　总共消耗的时间为：".(($endTime - $startTime))."秒</div>";
   echo implode("", $dataArr);


   $dataArr = NULL;


?>
