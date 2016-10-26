<?
header("Content-type: text/vnd.wap.wml"); 
include "gb2utf8.php"; 
$obj=new GB2UTF8();



$obj->gb='
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
	<card id="welcome" title="">
	<p align="left">
$m
$u
	</card>
</wml>';
$obj->Convert();
 
 
echo $obj->utf8;

?>
