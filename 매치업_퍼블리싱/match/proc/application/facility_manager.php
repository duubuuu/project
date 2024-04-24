<?

include_once("../../../common.php");
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');
$data = array();

$uploadBase = G5_PATH."/match/upload_img/facility_manager/";

if(!is_dir($uploadBase)){
  mkdir($uploadBase);
}

$file_name = $_POST['filename'];

$sug_name = $_POST['sug_name'];
$phone = $_POST['phone'];
$facility_name = $_POST['facility_name'];
$facility_location = $_POST['facility_location'];
$pitches_num = $_POST['pitches_num'];
$location_type = $_POST['location_type'];
$word = $_POST['word'];



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
            if($size < ( 10*1024*1024 )) // Image size max 1 MB
            {
                $actual_image_name = time().".".$ext;
                $tmp = $_FILES[$file_name]['tmp_name'];

                $uploadfile = $uploadBase.$actual_image_name;


                if(move_uploaded_file($tmp, $uploadBase.$actual_image_name))
                {



                    $img_name = $actual_image_name;
                    $img_size = $size;
                    $img_path = $uploadfile;



                    // 파일 리사이즈 후 복사하기

                  img_resize($uploadfile, $uploadfile);

                  $sql = "insert into facility_manager_ent(sug_name, phone, facility_name, facility_location, pitches_num, location_type, word, img_name, img_path, img_size, reg_date)
                          value('{$sug_name}', '{$phone}', '{$facility_name}', '{$facility_location}', '{$pitches_num}', '{$location_type}', '{$word}', '{$img_name}', '{$img_path}', '{$img_size}', now())";
                  $state = sql_query($sql);

                  $data['sql'] = $sql;

                  if($state){


                    $data['rs'] = "success";


                    preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $img_path , $path);


                    $subject = "제안자 [".$sug_name."] 시설관리자 신청 입니다.";

                    $content = "제안자 : ".$sug_name."<br>";
                    $content .= "연락처 : ".$phone."<br>";
                    $content .= "시설이름 : ".$facility_name."<br>";
                    $content .= "시설위치 : ".$facility_location."<br>";
                    $content .= "구장 수 : ".$pitches_num."<br>";
                    $content .= "장소타입 : ".$location_type."<br>";
                    $content .= "내용 : ".$word."<br>";



                    $path = G5_PATH.$path[0].$img_name;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $img_data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img_data);


                    $content .= "<html><body>";
                    $content .= "<img src='".$base64."' style='width:500px;' />";
                    $content .="</body></html>";



                    $to = "akdongup@gmail.com";

                    mailer("매치업수신", "akdongup@gmail.com", $to, $subject, $content, $type=0, $file="", $cc="", $bcc="");




                  }
                  else{
                    $data['rs'] = "fail";
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
            $data['size'] = $cf_arr['img_size'];
        }
        else
            $data['error'] = "Invalid file format..";
    }
    else
        $data['error'] = "Please select image..!";
}



echo json_encode($data);

?>
