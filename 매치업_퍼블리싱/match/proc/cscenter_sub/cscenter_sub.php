<?php

include_once("../../../common.php");


$data = array();


$sql = "select * from freq_faq";


$rs = sql_query($sql);


$i=0;
while($row = sql_fetch_array($rs)){

    foreach($row as $k => $v){
     $data['data'][$i][$k] = $v;
   }

$i++;}





echo json_encode($data);


?>
