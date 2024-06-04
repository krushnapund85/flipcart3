<?php 
$readPOcsv=file_get_contents("http://192.168.0.17/jfffl/index.php?r=submitrate/ReadsapPOcsv");
echo$readPOcsv;
$readGRNcsv=file_get_contents("http://192.168.0.17/jfffl/index.php?r=submitrate/ReadsapGRNcsv");
echo$readGRNcsv;

$readPOErrorcsv=file_get_contents("http://192.168.0.17/jfffl/index.php?r=submitrate/ReadsapPOERRORcsv");
echo$readPOErrorcsv;
$readGRNErrorcsv=file_get_contents("http://192.168.0.17/jfffl/index.php?r=submitrate/ReadsapGRNERRORcsv");
echo$readGRNErrorcsv;

$readMATERIALcsv=file_get_contents("http://192.168.0.17/jfffl/index.php?r=submitrate/ReadsapMATERIALcsv");
echo$readMATERIALcsv;
$readVENDORcsv=file_get_contents("http://192.168.0.17/jfffl/index.php?r=submitrate/ReadsapVENDORcsv");
echo$readVENDORcsv;

/*
mysql_connect("localhost", "root", "");
mysql_select_db("jisl_qas");
$curr_dt=date('Y-m-d H:i:s');
mysql_query("INSERT INTO aaa_sample (col1,col2) VALUES ('JFFFL Scheduler Running','$curr_dt')");
*/
exit(); 
?>