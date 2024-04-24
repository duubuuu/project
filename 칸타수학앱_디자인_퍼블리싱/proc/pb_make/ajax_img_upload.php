<?


include_once("../../../../common.php");




$uploadBase = G5_PATH."/upload_img/img/";

if(!is_dir($uploadBase)){
  mkdir($uploadBase);
}


$file_name = "img";


  $valid_formats = array("jpg", "png", "gif", "bmp","jpeg");

  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
  {
      $name = $_FILES[$file_name]['name'];
      $size = $_FILES[$file_name]['size'];


      if(strlen($name))
      {
          list($txt, $ext) = explode(".", $name);
          if(in_array($ext,$valid_formats))
          {
              if($size < ( 2*1024*1024 )) // Image size max 1 MB
              {
                  $actual_img_name = time().".".$ext;
                  $tmp = $_FILES[$file_name]['tmp_name'];

                  $uploadFile = $uploadBase.$actual_img_name;

                  if(move_uploaded_file($tmp, $uploadBase.$actual_img_name))
                  {
                      $data['rs'] = "success";




                      $img_name = $actual_img_name;
                      $img_path = $uploadBase;
                      $img_size = $size;


                      // 파일 리사이즈 후 복사하기

                      //sik_img_resize($uploadFile, $uploadFile, $sik_cf_arr['u_img_resize_size'], $sik_cf_arr['u_img_resize_size_1'], $sik_cf_arr['u_img_resize_size_2'], $sik_cf_arr['u_img_resize_quaility'], $sik_cf_arr['u_img_resize_quaility_1'], $sik_cf_arr['u_img_resize_quaility_2']);




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






  $img_sql_update = "insert into img_upload(img_path, img_name, img_size, reg_date) value('{$img_path}', '{$img_name}', '{$img_size}', now())";



  sql_query($img_sql_update);

  preg_match("/\/upload_img\/[0-9a-zA-Z_\/]*\//i", $img_path ,$path);

  $data['img_name'] = $img_name;
  $data['img_path'] = $path[0];

  echo json_encode($data);



?>
