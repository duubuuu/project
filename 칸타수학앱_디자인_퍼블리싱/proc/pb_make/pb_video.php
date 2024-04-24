<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("../../../../common.php");

$video_code = $_POST['video_code'];


// 폴더명 지정
$video_dir = G5_PATH."/upload_video/video";

// 핸들 획득
$video_handle  = opendir($video_dir);


// 디렉터리에 포함된 파일을 저장한다.
while ($filename = readdir($video_handle)) {
  if($filename == "." || $filename == ".." || $filename == ""){
    continue;
  }
  // 파일인 경우만 목록에 추가한다.
  if(is_file($video_dir . "/" . $filename)){
    $video_files[] = $filename;
  }
}

closedir($video_handle);


$sql = "select * from video_upload order by reg_date desc";
$rs = sql_query($sql);


$data = array();


$i = 0;
 while($row = sql_fetch_array($rs)){

   //preg_match('/\/upload_video\/[0-9a-zA-Z_\/]*\//i', $row['video_path'] ,$path);

    $data['data'][$i]['num'] = $row['num'];
    $data['data'][$i]['video_name'] = $row['video_name'];
    $data['data'][$i]['video_path'] = $path[0];
    $data['data'][$i]['video_size'] = $row['video_size'];
    $data['data'][$i]['video_code'] = $row['video_code'];
    $data['data'][$i]['video'] = $row['video_path'].$row['video_name'];
    $data['data'][$i]['reg_date'] = $row['reg_date'];


 $i++;}


 if(empty($data)){
   $data['data'][$i]['num'] = '';
   $data['data'][$i]['reg_date'] = 0;

 }




 echo json_encode($data);




?>
