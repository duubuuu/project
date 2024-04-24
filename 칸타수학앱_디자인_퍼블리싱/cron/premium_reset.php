<?

include_once('../../common.php');


/* 이니시스 날짜 계산 */

$pay_list_sql_1 = "(select num as num, use_state as use_state , resultMsg as resultMsg, TotPrice as TotPrice, payMethod as payMethod, buyerName as buyerName , buyerTel as buyerTel, sip.mb_id as mb_id, concat(applDate, applTime) as Time , period_month, period_day from inicis_pc sip left join g5_member g5_m on sip.mb_id = g5_m.mb_id where sip.use_state = '1')";

$union = " union ALL";

$pay_list_sql_2 = " (select num as num, use_state as use_state , P_RMESG1 as resultMsg, P_AMT as TotPrice, P_TYPE as payMethod, P_UNAME as buyerName, g5_m.mb_hp as buyerTel, sim.mb_id as mb_id, P_AUTH_DT as Time , period_month, period_day from inicis_mobile sim left join g5_member g5_m on sim.mb_id = g5_m.mb_id where sim.use_state = '1')";

$sql = $pay_list_sql_1.$union.$pay_list_sql_2;

$rs = sql_query($sql);

while($row = sql_fetch_array($rs)){


  $mb_chk = "select * from g5_member where mb_id = '{$row['mb_id']}'";

  $mb_chk_row = sql_fetch($mb_chk);


  if($mb_chk_row['mb_premium_state'] == "1" && $mb_chk_row['mb_inicis_state'] == "1" && $row['use_state'] == "1"){

    $time = $row['Time'];

    $after_1_month_time = date("Y-m-d", strtotime("+".$row['period_month']." month +".$row['period_day']." day", strtotime($time)));

    $time_subtract = (strtotime($after_1_month_time) - strtotime(date('Y-m-d H:i:s')));
    //  echo $time_temp;
    $result = $time_subtract/(3600*24);

    //echo $result;

    if($result <= 0){

        $use_state_update_pc_sql = "update inicis_pc set use_state = 0 where inicis_code = '{$row['inicis_code']}' and use_state = 1";
        $use_state_update_mobile_sql = "update inicis_mobile set use_state = 0 where inicis_code = '{$row['inicis_code']}' and use_state = 1";

        sql_query($use_state_update_pc_sql);
        sql_query($use_state_update_mobile_sql);

        push_insert( 'admin' , "premium_date_chk", $mb_chk_row['mb_id']."님, 프리미엄 이용권 기간이 종료되었습니다.", "", '', $mb_chk_row['mb_id'], '','');

        $update_sql = "update g5_member set mb_premium_state = '0', mb_inicis_state = '0', mb_level = 2 where mb_id = '{$row['mb_id']}'";
        sql_query($update_sql);

    }
    else if($result > 0 && $result <= 7){

      push_insert( 'admin' , "premium_date_chk", $mb_chk_row['mb_id']."님, 프리미엄 이용권 기간이 ".floor($result)."일 남으셨습니다.", "", '', $mb_chk_row['mb_id'], '','');

    }

  }


}


?>
