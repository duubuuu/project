<?


include_once("../../../../common.php");


$video_code = video_ouput_code();

$uploadBase = G5_PATH."/upload_video/video/";

if(!is_dir($uploadBase)){
  mkdir($uploadBase);
}


$file_name = "video";


  $valid_formats = array("avi", "mp4", "mkv", "wmv", "mov", "ts", "tp", "flv", "3gp", "webp");

  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
  {
      $name = $_FILES[$file_name]['name'];
      $size = $_FILES[$file_name]['size'];


      if(strlen($name))
      {
          list($txt, $ext) = explode(".", $name);
          if(in_array($ext,$valid_formats))
          {
              if($size < ( 55*1024*1024 )) // Image size max 1 MB
              {
                  $actual_video_name = time().".".$ext;
                  $tmp = $_FILES[$file_name]['tmp_name'];

                  $uploadFile = $uploadBase.$actual_video_name;

                  if(move_uploaded_file($tmp, $uploadBase.$actual_video_name))
                  {
                      $data['rs'] = "success";




                      $video_name = $actual_video_name;
                      $video_path = $uploadBase;
                      $video_size = $size;


                      // 파일 리사이즈 후 복사하기

                      //img_resize($uploadFile, $uploadFile, $cf_arr['u_img_resize_size'], $cf_arr['u_img_resize_size_1'], $cf_arr['u_img_resize_size_2'], $cf_arr['u_img_resize_quaility'], $cf_arr['u_img_resize_quaility_1'], $cf_arr['u_img_resize_quaility_2']);




                  }
                  else
                  {
                      $data['success'] = false;
                      $data['error'] = "error";
                  }

              }
              else{
                $data['rs'] = "size";
                $data['size'] = $cf_arr['img_size'];
              }
          }
          else{
              $data['error'] = "Invalid file format..";
          }
      }
      else{
          $data['error'] = "Please select image..!";
          $data['name'] = $_FILES[$file_name]['name'];
      }
  }






  $video_sql_update = "insert into video_upload(video_path, video_name, video_size, video_code, reg_date) value('{$video_path}', '{$video_name}', '{$video_size}', '{$video_code}', now())";



  sql_query($video_sql_update);

  preg_match("/\/upload_video\/[0-9a-zA-Z_\/]*\//i", $video_path ,$path);

  $data['video_name'] = $video_name;
  $data['video_path'] = $path[0];
  $data['video_code'] = $video_code;

  echo json_encode($data);



?>
