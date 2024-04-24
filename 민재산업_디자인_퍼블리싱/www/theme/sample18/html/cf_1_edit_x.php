<?php
include './_common.php';
$data = array('error'=>'');
if(!$is_admin) {
    $data['error'] = '관리자로 로그인 하세요.';
    echo json_encode($data); exit;
}

/*
if(!isset($config['cf_xxxx'])) {
    sql_query(" ALTER TABLE {$g5['config_table']} ADD `cf_xxxx` varchar(255) NOT NULL DEFAULT '' AFTER `cf_10` ", false);	
}
*/

$sql = "update {$g5['config_table']} set ".
    "cf_1='{$cf_1}' ";
$data['sql'] = $sql;
sql_query($sql);
echo json_encode($data); exit;
?>