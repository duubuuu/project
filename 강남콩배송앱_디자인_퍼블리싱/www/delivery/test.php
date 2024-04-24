
<?php
include_once('./_common.php');
include_once('./head.php');


$sql = "SELECT * FROM ga_config WHERE co_idx ='1'";
$co = $dbobj->sql_list_one($sql);

$sql = "SELECT * FROM ga_order
        WHERE mb_id = '{$mb_id}'
        AND od_con = '003'
        AND od_picking_con = '200'
        AND od_date < '{$todate} 10:10:00'
        ORDER BY od_idx DESC";
$od_list = $dbobj->sql_list($sql);


$param = "origPosY={$co['co_lat']}";
$param .= "&origPosX={$co['co_lng']}";

$param .= "&destPosY=37.5666484";
$param .= "&destPosX=126.9783364";

foreach ($od_list as $val){
  $param .= "&viaPosY={$val['lat']}";
  $param .= "&viaPosX={$val['lng']}";
}

echo $param;
echo "<br>";
echo "<br>";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://apis.atlan.co.kr/fastrp/searchRoute.json?{$param}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "authKey=13854825031a6761ab97195aae1d39c8e2251c0e4f",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

echo $response;

?>
