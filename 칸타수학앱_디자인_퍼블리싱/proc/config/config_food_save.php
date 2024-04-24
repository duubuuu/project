<?

include_once("../../../../common.php");

$data = $_POST['data'];

$sql = "update config set category_1_temp	= '{$data}', category_1_temp_date = NOW()";
$state = sql_query($sql);

if($state){
  echo "y";
}
else{
  echo "n";
}
?>
