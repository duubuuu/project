<?php

include_once("../../../../common.php");



$banner_img_link = $_POST['banner_img_link'];
$m_banner_img_link = $_POST['m_banner_img_link'];



$category_1 = $_POST['category_1'];



$sql_update = "update config set category_1 = '{$category_1}'";


sql_query($sql_update);


alert("수정되었습니다.", "/adm/kanta/config.php");

?>
