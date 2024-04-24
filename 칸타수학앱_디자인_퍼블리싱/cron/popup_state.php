<?

include_once('../../common.php');

$sql = "update g5_member set shop_popup_state = 0";
sql_query($sql);

$sql_1 = "delete from popup_dev_chk";
sql_query($sql_1);



?>
