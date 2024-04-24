<?
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include_once('../../common.php');

$sql = "select * from g5_member";
$rs = sql_query($sql);


$i=0;
while($row = sql_fetch_array($rs)){

  $mb_birth = date( "md", strtotime($row['mb_birth']) );
  $now = date("md");

  if($mb_birth != ""){



    if($now == $mb_birth){

      //echo $row['mb_id']." : 일치"."<br>";

      $sql = "select * from mb_heart_selected where mb_id = '{$row['mb_id']}'";
      $rs_1 = sql_query($sql);

      while($row_1 = sql_fetch_array($rs_1)){

        $coupon_shop_code = $row_1['heart_selected_code'];

        //echo "<br><br><br>--------------------------------<br>";

        //echo "쿠폰 샵 코드 :".$coupon_shop_code."<br>";

        $sql = "select * from coupon where birth_select = 1 and shop_code = '{$coupon_shop_code}'";
        $rs_2 = sql_query($sql);

        $rr = sql_fetch($sql);

        //echo $rr['coupon_code']."코드<br>";

        //echo $sql."<br>";


        while($row_2 = sql_fetch_array($rs_2)){

          $coupon_code = $row_2['coupon_code'];

            //echo "쿠폰 코드 : ".$coupon_code."<br>";

            /* 쿠폰 생성 */
            sql_query("create TEMPORARY TABLE temp_table_".$i." select * FROM coupon where coupon_code = '{$coupon_code}'");
            $cnt = sql_fetch("select count(*)+1 as cnt from coupon_user_get");
            sql_query("update temp_table_".$i." set num='{$cnt['cnt']}', get_state = 1, birth_user_get = 1 ,get_mb_id = '{$row['mb_id']}' where coupon_code = '{$coupon_code}'");


            $sql = "insert into coupon_user_get (select * from temp_table_".$i." where coupon_code = '{$coupon_code}' and get_mb_id = '{$row['mb_id']}')";
            $state = sql_query($sql);

            if($state){
              //echo $sql;
              //echo "성공"."<br>";
            }


        $i++;}


      }


    }

  }


}
?>
