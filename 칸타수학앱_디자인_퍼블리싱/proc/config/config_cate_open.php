<?

include_once("../../../../common.php");



$sql = "select * from config";
$row = sql_fetch($sql);


 $arr = $row['category_1_temp'];
 $arr[0] = " ";
 $arr[strlen($arr)-1] = " ";

echo $row['category_1_temp'];
?>
