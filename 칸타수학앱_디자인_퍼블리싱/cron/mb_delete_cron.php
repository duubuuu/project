<?
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once('../../common.php');


/* 이니시스 날짜 계산 */

$sql = "select * from g5_member";
$rs = sql_query($sql);

while($row = sql_fetch_array($rs)){


if($row['mb_secession_date'] != "" &&  $row['mb_secession_state'] == "1"){

  $time = $row['mb_secession_date'];

  $after_1_month_time = date("Y-m-d H:i:s",strtotime("+1 month", strtotime($time)));

  $time_subtract = (strtotime($after_1_month_time) - strtotime(date('Y-m-d H:i:s')));
  //  echo $time_temp;
  $result = $time_subtract/(3600*24);



  if($result <= 0){

      $delete_sql = "delete from g5_member where mb_id = '{$row['mb_id']}'";
      sql_query($delete_sql);

      $delete_shop = "delete from shop_off where mb_id = '{$row['mb_id']}'";
      sql_query($delete_shop);

  }

}


}


?>
