<?php
include_once('../db_config.php');
include_once('../common.php');

$mb_id = $_SESSION['mb_id'];
$nows = date("Ymdhis");
$value = trim($value);

header( "Content-type: application/vnd.ms-excel" );
header( "Content-type: application/vnd.ms-excel; charset=utf-8");
header( "Content-Disposition: attachment; filename = excel_{$mb_id}_{$nows}.xls" );
header( "Content-Description: PHP4 Generated Data" );
$sql = "SELECT *,SUM(quantity) AS quantitys FROM ga_order_item
        WHERE mb_id = '{$mb_id}'
        AND it_con = '001'
        AND it_pick_con = '100'
        AND additional_option_value = ''
        GROUP BY variant_code";

$or_list = $dbobj->sql_list($sql);

$key_arr = ["product_name","option_value","quantitys"];
$name_arr = ["상품명","옵션명","수량"];
$type_arr = ["",""];

$table = make_table($key_arr,$name_arr,$type_arr,$or_list,"",$data_arr);
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'> ";

?>

<style>
th,td{border:1px solid #eee;text-align:center;}
input{display:none;}
</style>
<?=$table?>
