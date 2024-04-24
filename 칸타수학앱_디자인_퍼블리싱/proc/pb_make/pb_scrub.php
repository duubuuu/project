<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("../../../../common.php");

$selected_time = $_POST['selected_time'];
$video_code = $_POST['video_code'];

$data = array();

$sql = "insert into video_output(selected_time, video_code, reg_date) value('{$selected_time}', '{$video_code}', now())";
$state = sql_query($sql);


if($state){

  $sql = "select * FROM video_output ORDER BY num DESC LIMIT 1";
  $row = sql_fetch($sql);

  $data['rs'] = "success";
  $data['selected_time'] = $selected_time;
  $data['num'] = $row['num'];
}
else{
  $data['rs'] = "fail";
}


 echo json_encode($data);




?>
