<?
include_once("../../../../common.php");


$uploadBase = G5_PATH."/sik/upload_img/config/";

if(!is_dir($uploadBase)){
  mkdir($uploadBase);
}


$type = $_POST['type'];

$post_img_name = $_POST['img_name'];



if($type == "banner"){
  $file_name = "banner";
}
else if($type == "m_banner"){
  $file_name = "m_banner";
}
else if($type == "popup"){
  $file_name = "popup";
}

else if($type == "menu"){

}




$img_db_sql = "select * from sik_config";
$img_db = sql_fetch($img_db_sql);



$img_db_arr_name = explode("::", $img_db[$type."_img_name"]);
$img_db_arr_path = explode("::", $img_db[$type."_img_path"]);
$img_db_arr_size = explode("::", $img_db[$type."_img_size"]);

for($i=0; $i<count($img_db_arr_name); $i++){

    if($img_db_arr_name[$i] == $post_img_name){


      unset($img_db_arr_name[$i]);
      unset($img_db_arr_path[$i]);
      unset($img_db_arr_size[$i]);

    }

}


db_single_img_remove($post_img_name);

$img1_name = implode("::", $img_db_arr_name);
$img1_path = implode("::", $img_db_arr_path);
$img1_size = implode("::", $img_db_arr_size);



  if($type == "banner"){
    $sql_update = "update sik_config set banner_img_path = '{$img1_path}', banner_img_name = '{$img1_name}', banner_img_size = '{$img1_size}' ";
  }
  else if($type == "m_banner"){
    $sql_update = "update sik_config set m_banner_img_path = '{$img1_path}', m_banner_img_name = '{$img1_name}', m_banner_img_size = '{$img1_size}' ";
  }
  else if($type == "popup"){
    $sql_update = "update sik_config set popup_img_path = '{$img1_path}', popup_img_name = '{$img1_name}', popup_img_size = '{$img1_size}' ";
  }
  else if($type == "menu"){

  }



  $state = sql_query($sql_update);

  if($state){
    echo 'y';
  }
  else{
    echo "n";
  }



?>
