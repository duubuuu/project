<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("../../../../common.php");


$sql = "";



$pay_list_rs = sql_query($sql);




$data = array();


$i = 0;
 while($pay_list_row = sql_fetch_array($pay_list_rs)){


    $data['data'][$i]['num'] = $pay_list_row['num'];


 $i++;}




 echo json_encode($data);




?>
