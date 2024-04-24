<?


include_once("../../../../common.php");


$video_code = video_ouput_code();

$video_name = $_POST['video_name'];
$video_path = $_POST['video_path'];
$video_save = $_POST['video_save'];


  $video_sql_update = "insert into video_upload(video_path, video_name, video_size, video_code, reg_date) value('{$video_path}', '{$video_name}', '{$video_size}', '{$video_code}', now())";



  $state = sql_query($video_sql_update);



  if($state){
    $data['rs'] = "success";
    $data['video_name'] = $video_name;
    $data['video_path'] = $path[0];
    $data['video_code'] = $video_code;
  }
  else{
    $data['rs'] = "fail";
  }



  echo json_encode($data);



?>
