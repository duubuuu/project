<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("../../../../common.php");

$video_code = $_POST['video_code'];

$sql = "select * from video_output where video_code = '{$video_code}' order by num desc";
$rs = sql_query($sql);


$data = array();


$i = 0;
 while($row = sql_fetch_array($rs)){


    $data['data'][$i]['num'] = $row['num'];
    $data['data'][$i]['question'] = $row['question'];
    $data['data'][$i]['answer'] = $row['answer'];
    $data['data'][$i]['selected_time'] = $row['selected_time'];
    $data['data'][$i]['reg_date'] = $row['reg_date'];
    $data['data'][$i]['video_code'] = $row['video_code'];


 $i++;}



if(empty($data)){
  $data['data'][$i]['num'] = '없음';
  $data['data'][$i]['question'] = '없음';
  $data['data'][$i]['selected_time'] = '없음';
  $data['data'][$i]['answer'] = '없음';
  $data['data'][$i]['video_code'] = '없음';
  $data['data'][$i]['reg_date'] = '없음';
}


 echo json_encode($data);




?>
