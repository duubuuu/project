<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("../../../../common.php");


$video_path = G5_PATH."/upload_video/video/";
$img_path = G5_PATH."/upload_img/img/";

$num = $_POST['num'];
$type = $_POST['type'];
$img_name = $_POST['img_name'];
$video_name = $_POST['video_name'];

$data = array();




if($type == "video"){
  $sql = "delete from video_upload where num = '{$num}'";
  video_remove($video_name, $video_path);
}
else if($type == "img"){
  $sql = "delete from img_upload where num = '{$num}'";
  img_remove($img_name, $img_path);
}
else if($type == "question"){
  $sql = "delete from video_output where num = '{$num}'";
}


$state = sql_query($sql);


if($state){
    $data['rs'] = "success";
    $data['sql'] = $sql;
}
else{
    $data['rs'] = "fail";
    $data['sql'] = $sql;
}


 echo json_encode($data);




?>
