<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once("../../../../common.php");

$video_code = $_POST['video_code'];


$img_dir = G5_PATH."/upload_img/img";
$img_handle  = opendir($img_dir);


// 디렉터리에 포함된 파일을 저장한다.
while ($filename = readdir($img_handle)) {
  if($filename == "." || $filename == ".." || $filename == ""){
    continue;
  }
  // 파일인 경우만 목록에 추가한다.
  if(is_file($img_dir . "/" . $filename)){
    $img_files[] = $filename;
  }
}

// 핸들 해제

closedir($img_handle);

// 파일명을 출력한다.


$sql = "select * from img_upload order by reg_date desc";
$rs = sql_query($sql);


$data = array();


$i = 0;
 while($row = sql_fetch_array($rs)){


   //preg_match('/\/upload_img\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$path);


   $data['data'][$i]['num'] = $row['num'];
   $data['data'][$i]['img_name'] = $row['img_name'];
   $data['data'][$i]['img_path'] = $path[0];
   $data['data'][$i]['img_size'] = $row['img_size'];
   $data['data'][$i]['img'] = $row['img_path'].$row['img_name'];
   $data['data'][$i]['reg_date'] = $row['reg_date'];


 $i++;}


 if(empty($data)){
   $data['data'][$i]['num'] = '';
   $data['data'][$i]['reg_date'] = 0;
 }

 echo json_encode($data);




?>
