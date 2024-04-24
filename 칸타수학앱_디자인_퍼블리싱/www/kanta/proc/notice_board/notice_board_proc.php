<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("../../../common.php");

$data = array();

$sql = "select * from notice";
$rs = sql_query($sql);



$i = 0;
 while($row = sql_fetch_array($rs)){


    $data['data'][$i]['num'] = $row['num'];
    $data['data'][$i]['mb_id'] = $row['mb_id'];
    $data['data'][$i]['mb_name'] = $row['mb_name'];
    $data['data'][$i]['title'] = $row['title'];
    $data['data'][$i]['word'] = $row['word'];
    $data['data'][$i]['reg_date'] = $row['reg_date'];

 $i++;}





 echo json_encode($data);




?>
