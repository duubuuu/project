<?

include_once("../../../../common.php");



$sql = "select * from config";
$row = sql_fetch($sql);


echo $row['category_1_temp'];
?>
