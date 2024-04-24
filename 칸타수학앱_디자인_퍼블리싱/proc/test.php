<?php

include_once("../../../common.php");

$sql = "select * from shcool_info";
$row = sql_fetch($sql);


echo $row['school_json'];


?>
