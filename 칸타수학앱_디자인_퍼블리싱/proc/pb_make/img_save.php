<?


include_once("../../../../common.php");


 $img_name = $_POST['img_name'];
 $img_path = $_POST['img_path'];
 $img_size = $_POST['img_save'];

  $img_sql_update = "insert into img_upload(img_path, img_name, img_size, reg_date) value('{$img_path}', '{$img_name}', '{$img_size}', now())";



  $state = sql_query($img_sql_update);




  if($state){
    $data['rs'] = "success";
    $data['img_name'] = $img_name;
    $data['img_path'] = $path[0];
  }
  else{
    $data['rs'] = "fail";
  }



  echo json_encode($data);



?>
