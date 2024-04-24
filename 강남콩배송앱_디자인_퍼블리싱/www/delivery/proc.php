<?
include_once('../db_config.php');
include_once('../common.php');

switch ($work_mode) {
  case 'member_login':
    $sql = "SELECT * FROM ga_member WHERE mb_id = '{$mb_id}'";
    $mb = $dbobj->sql_list_one($sql);
    if($mb['mb_id'] == ""){
      alert("아이디가 올바르지 않습니다.");
      exit();
    }
    if(password_verify($mb_pass,$mb['mb_pass'])){
        $_SESSION['mb_id'] = $mb['mb_id'];
        $_SESSION['mb_name'] = $mb['mb_name'];
        alert("로그인성공","/delivery");
    }else {
      alert("비밀번호가 올바르지 않습니다.");
      exit();
    };
  break;
  case 'member_login_admin':
    $mall_id = $_SESSION['mall_id'];
    $access_token = $_SESSION['access_token'];
    if($_SESSION['mall_id'] =="" || $_SESSION['access_token'] ==""){
      $msg['msg'] =  "NO_SESSION by head";
      echo json_encode($msg);
      exit;
    }
    $sql = "SELECT * FROM ga_member WHERE mb_idx = '{$mb_idx}'";
    $mb = $dbobj->sql_list_one($sql);
    if($mb['mb_id'] == ""){
      echo "아이디가 올바르지 않습니다.";
      exit();
    }
    $_SESSION['mb_name'] = $mb['mb_name'];
    $_SESSION['mb_id'] = $mb['mb_id'];
    url_goto("/delivery");
  break;

  case 'picking_update':
    $where_ga['od_idx'] = $od_idx;
    if($od_idx != ""){
      $ga['od_box'] = $od_box;
      $ga['od_picking_con'] = $od_picking_con;
      $dbobj->update($ga,$where_ga,"ga_order");

      $it['it_pick_con'] = $od_picking_con;
      $dbobj->update($it,$where_ga,"ga_order_item");
    }

  break;

  case 'list_before_picked_ck':
    $sql = "SELECT * FROM ga_config
            WHERE co_idx = '1'
            AND co_pass = '{$co_pass}'";
    $rs = $dbobj->sql_list_one($sql);
    if($rs['co_idx'] == '1'){
      echo "ok";
    }
  break;

  case 'add_bookmark':
    $bo['member_name'] = $member_name;
    $bo['member_hp'] = $member_hp;
    $bo['zip_code'] = $zip_code;
    $bo['address1'] = $address1;
    $bo['bo_memo'] = $bo_memo;
    $bo['mb_id'] = $mb_id;
    $bo['lng'] = $lng;
    $bo['lat'] = $lat;
    if($member_name == ""){
      echo "수령인 & 수령지 값을 적어주세요";
      exit;
    }
    if($member_name == "집"){
      $boc['mb_id'] =$mb_id;
      $boc['member_name'] = $member_name;
      $cnt = $dbobj->count_by($boc,"","ga_bookmark");
      if($cnt > 0){
        echo "'집' 이라는 수령지가 이미 존재합니다.";
        exit;
      }
    }
    if($member_hp == ""){
      echo "연락처 값을 적어주세요";
      exit;
    }
    if($zip_code == ""){
      echo "주소값이 누락되었습니다.";
      exit;
    }
    $dbobj->insert($bo,"ga_bookmark");
    echo "ok";
  break;

  case 'update_bookmark':
    $bo['member_name'] = $member_name;
    $bo['member_hp'] = $member_hp;
    $bo['zip_code'] = $zip_code;
    $bo['address1'] = $address1." ".$address1_1;
    $bo['bo_memo'] = $bo_memo;
    $bo['lng'] = $lng;
    $bo['lat'] = $lat;
    $bo_where['bo_idx'] = $bo_idx;
    if($bo_where['bo_idx'] != ""){
        $dbobj->update($bo,$bo_where,'ga_bookmark');
    }
    alert("수정되었습니다.","/delivery/add_order.php");
  break;

  case 'delete_bookmark':
    if($bo_idx != ""){
        $sql = "DELETE FROM ga_bookmark WHERE bo_idx = '{$bo_idx}'";
        $dbobj->sql_read($sql);
    }
    alert("삭제되었습니다.","/delivery/add_order.php");
  break;

  case 'add_order':
    $date_time = date("Ymd");
    $rand = mt_rand(0,99999);
    $order_id = $date_time."-".$rand;
    $od['member_name'] = $member_name;
    $od['member_hp'] = $member_hp;
    $od['zip_code'] = $zip_code;
    $od['address1'] = $address1;
    $od['address2'] = "[수기메모] ".$bo_memo;
    $od['mb_id'] = $mb_id;
    $od['lng'] = $lng;
    $od['lat'] = $lat;

    // 앱수기셋팅
    // 수기추가시 언제든지 적을 수 있다면...??? 여기에서 시간을 업데이드 해주면 됨
    // 그렇게 해야 유류비등을 계산 할 수 있음!
    // 10시쯤에 스케줄러가 돌아가면서 해당일에 어디를 돌아가는지 메모를함
    $od['order_type'] = "어플수기등록";
    $od['product_name'] = "{$member_name} 수기배송";
    $od['order_id'] = $order_id;
    $od['od_con'] = "003";
    $od['shop_no'] = "5";
    $od['mall_id'] = "gangnamkong";
    if($member_name == ""){
      echo "수령인 & 수령지 값을 적어주세요";
      exit;
    }
    if($member_hp == ""){
      echo "연락처 값을 적어주세요";
      exit;
    }
    if($zip_code == ""){
      echo "주소값이 누락되었습니다.";
      exit;
    }
    $dbobj->insert($od,"ga_order");
    echo "ok";
  break;
  // 즐겨찾기에 값을 배송지에 추가합니다.
  case 'add_order_bookmark':
    if($bo_idx != ""){

      $sql = "SELECT * FROM ga_bookmark
              WHERE bo_idx = '{$bo_idx}'";
      $bo = $dbobj->sql_list_one($sql);

      $date_time = date("Ymd");
      $rand = mt_rand(0,99999);
      $order_id = $date_time."-".$rand;
      $od['member_name'] = $bo['member_name'];
      $od['member_hp'] = $bo['member_hp'];
      $od['zip_code'] = $bo['zip_code'];
      $od['address1'] = $bo['address1'];
      $od['address2'] = "[수기메모] ".$bo['bo_memo'];
      $od['mb_id'] = $bo['mb_id'];
      $od['lng'] = $bo['lng'];
      $od['lat'] = $bo['lat'];

      // 앱수기셋팅
      // 수기추가시 언제든지 적을 수 있다면...??? 여기에서 시간을 업데이드 해주면 됨
      // 그렇게 해야 유류비등을 계산 할 수 있음!
      // 10시쯤에 스케줄러가 돌아가면서 해당일에 어디를 돌아가는지 메모를함
      $od['order_type'] = "어플수기등록";
      $od['product_name'] = "{$bo['member_name']} 수기배송";
      $od['order_id'] = $order_id;
      $od['od_con'] = "003";
      $od['shop_no'] = "5";
      $od['mall_id'] = "gangnamkong";
      $dbobj->insert($od,"ga_order");
    }
  break;
  // 배송완료 처리를 합니다.
  case 'order_com':


    if($od_idx != ""){
      $sql = "SELECT * FROM ga_order WHERE od_idx = '{$od_idx}'";
      $od_data = $dbobj->sql_list_one($sql);
      if($od_data['shipping_code'] != ""){
        $mall_id = "gangnamkong";
        $sql_tk = "SELECT access_token FROM ga_auth WHERE mall_id = '{$mall_id}'";
        $rs_tk = $dbobj->sql_list_one($sql_tk);

        $od_rq['status'] = "shipped";
        $od_rq['shipping_code'] = $od_data['shipping_code'];
        $od_rq['order_id'] = $od_data['order_id'];
        $shipments[] = $od_rq;
        $input_json['shop_no'] = 1;
        $input_json['requests'] = $shipments;
        $shipments_json = json_encode($input_json,JSON_UNESCAPED_UNICODE);

        $info['access_token'] = $rs_tk['access_token'];
        $info['api'] = 'shipments';
        $info['mall_id'] = $mall_id;
        $res_sh = cafe24_put($info,$shipments_json);

        $lo['lo_type'] = "009";
        $lo['lo_content'] = json_encode($res_sh,JSON_UNESCAPED_UNICODE);
        $dbobj->insert($lo,"ga_log");

      }
      $source_img = $_FILES['od_img']['tmp_name'];
      $destination_img = $_FILES['od_img']['tmp_name'];
      ini_set('memory_limit', -1);
      $od_temp = compress($source_img, $destination_img, 50);
      $rand = mt_rand(0,99999999);
      $img_type = mb_substr($_FILES['od_img']['name'], -4, 4);
      if($img_type == "jpeg"){
        $img_type = ".jpeg";
      }
      $name = "od_img".date("Ymdhis").$rand.$img_type;
      $uploaddir = "./od_img/{$name}";
      if(move_uploaded_file($od_temp,$uploaddir)){
        $lo['lo_type'] = "011";
        $lo['lo_content'] = "이미지 업로드 {$od_idx} {$_SESSION['mb_id']} {$name}";
        $dbobj->insert($lo,"ga_log");

        $od['od_img'] = $name;
      }else{
        if(move_uploaded_file($_FILES['od_img']['tmp_name'],$uploaddir)){
          $lo['lo_type'] = "011";
          $lo['lo_content'] = "이미지 업로드 {$od_idx} {$_SESSION['mb_id']} {$name}";
          $dbobj->insert($lo,"ga_log");

          $od['od_img'] = $name;
        }else{
          $lo['lo_type'] = "011";
          $lo['lo_content'] = "이미지 업로드 실패 {$od_idx} {$_SESSION['mb_id']} {$name}";
          $dbobj->insert($lo,"ga_log");

          $lo['lo_type'] = "011";
          $lo['lo_content'] = json_encode($_FILES,JSON_UNESCAPED_UNICODE);
          $dbobj->insert($lo,"ga_log");
        }
      }


      $od['od_com_date'] = date("Y-m-d H:i:s");
      $od['od_con'] = "004";
      $it['it_con'] = "002";
      $where_od['od_idx'] = $od_idx;
      //if($_SESSION['mb_id'] != "deli_02"){
        $dbobj->update($od,$where_od,'ga_order');
        $dbobj->update($it,$where_od,'ga_order_item');
        // 알림톡전송
        order_com_talk($od_data['member_name'],$od_data['member_hp'],$od_data['order_id']);
      //}

      alert("완료처리 되었습니다.","/delivery/delivery_path.php");
    }else {
      // 인덱스가 없는경우
      alert("다시한번 시도해주세요","/delivery/delivery_path.php");
    }
  break;
  // 주문번호로 상품목록을 가져옵니다.
  case 'ga_order_item':
    $sql_it = "SELECT * FROM ga_order_item
            WHERE order_id = '{$order_id}'";
    $it_list = $dbobj->sql_list($sql_it);
    echo json_encode($it_list,JSON_UNESCAPED_UNICODE);
  break;


}

?>
