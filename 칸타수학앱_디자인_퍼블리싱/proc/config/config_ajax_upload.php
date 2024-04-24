<?

include_once("../../../../common.php");




$uploadBase = G5_PATH."/sik/upload_img/config/";

if(!is_dir($uploadBase)){
  mkdir($uploadBase);
}


$type = $_POST['type'];
$shop_code = $_POST['shop_code'];


$img_cnt_sql = "select * from sik_config";
$img_cnt = sql_fetch($img_cnt_sql);



if($type == "banner"){
  $file_name = "banner";

  $img_cnt_exp = explode("::", $img_cnt[$file_name."_img_name"]);

  if(count($img_cnt_exp) > $sik_cf_arr['img_cnt']){
    $data['result'] = "cnt_over";
    $data['cnt'] = $sik_cf_arr['img_cnt'];
    echo json_encode($data);
    exit;
  }
}
else if($type == "m_banner"){
  $file_name = "m_banner";

  $img_cnt_exp = explode("::", $img_cnt[$file_name."_img_name"]);

  if(count($img_cnt_exp) > $sik_cf_arr['img_cnt']){
    $data['result'] = "cnt_over";
    $data['cnt'] = $sik_cf_arr['img_cnt'];
    echo json_encode($data);
    exit;
  }
}
else if($type == "popup"){
  $file_name = "popup";

  $img_cnt_exp = explode("::", $img_cnt[$file_name."_img_name"]);

  if(count($img_cnt_exp) > 1){
    $data['result'] = "cnt_over";
    echo json_encode($data);
    exit;
  }
}
else if($type == "menu"){

}



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
              if($size < ( $sik_cf_arr['img_size']*1024*1024 )) // Image size max 1 MB
              {
                  $actual_image_name = time().".".$ext;
                  $tmp = $_FILES[$file_name]['tmp_name'];
                  $uploadfile = $uploadBase.$actual_image_name;

                  if(move_uploaded_file($tmp, $uploadBase.$actual_image_name))
                  {
                      $data['success'] = true;
                      $data['url']  = "http://yoururl/uploads/".$actual_image_name;




                      $banner_img = "select * from sik_config";
                      $banner_img_row = sql_fetch($banner_img);

                      $img1_name = $banner_img_row[$type."_img_name"];
                      $img1_path = $banner_img_row[$type."_img_path"];
                      $img1_size = $banner_img_row[$type."_img_size"];

                      $img1_name = $img1_name."::".$actual_image_name;
                      $img1_size = $img1_size."::".$size;
                      $img1_path = $img1_path."::".$uploadBase;

                      // 파일 리사이즈 후 복사하기

                      if($type == "m_banner"){
                        sik_img_resize($uploadfile, $uploadfile, $sik_cf_arr['img_resize_size'], $sik_cf_arr['img_resize_size_1'], $sik_cf_arr['img_resize_size_2'], $sik_cf_arr['img_resize_quaility'], $sik_cf_arr['img_resize_quaility_1'], $sik_cf_arr['img_resize_quaility_2']);
                      }




                  }
                  else
                  {


                      $data['success'] = false;
                      $data['error'] = "error";
                  }

              }
              else
                  $data['result'] = "size";
                  $data['size'] = $sik_cf_arr['img_size'];
          }
          else
              $data['error'] = "Invalid file format..";
      }
      else
          $data['error'] = "Please select image..!";
  }





  if($type == "banner"){
    $img_sql_update = "update sik_config set banner_img_path = '{$img1_path}', banner_img_name = '{$img1_name}', banner_img_size = '{$img1_size}'";
  }
  else if($type == "m_banner"){
    $img_sql_update = "update sik_config set m_banner_img_path = '{$img1_path}', m_banner_img_name = '{$img1_name}', m_banner_img_size = '{$img1_size}'";
  }
  else if($type == "popup"){
    $img_sql_update = "update sik_config set popup_img_path = '{$img1_path}', popup_img_name = '{$img1_name}', popup_img_size = '{$img1_size}'";
  }
  else if($type == "menu"){

  }


  sql_query($img_sql_update);

  $data['img_name'] = $actual_image_name;

  echo json_encode($data);




?>
