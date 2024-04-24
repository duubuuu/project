<?php
include './_common.php';
$data = array('error'=>'');
if(!$is_admin) {
    $data['error'] = '관리자로 로그인 하세요.';
    echo json_encode($data); exit;
}
if($bo_table == '') {
    $data['error'] = '게시판을 지정하셔야 합니다.';
    echo json_encode($data); exit;
}
$sql = "select * from {$g5['board_table']} where bo_table='{$bo_table}' ";
$board = sql_fetch($sql);
if(!isset($board['bo_me_code'])) {
    sql_query(" ALTER TABLE {$g5['board_table']} ADD `bo_me_code` varchar(255) NOT NULL DEFAULT '' AFTER `bo_10` ", false);
}
if(!isset($board['bo_head_bg_class'])) {
    sql_query(" ALTER TABLE {$g5['board_table']} ADD `bo_head_bg_class` varchar(255) NOT NULL DEFAULT '' AFTER `bo_me_code` ", false);
}
if(!isset($board['bo_head_sub_title'])) {
    sql_query(" ALTER TABLE {$g5['board_table']} ADD `bo_head_sub_title` varchar(255) NOT NULL DEFAULT '' AFTER `bo_head_bg_class` ", false);    
}

if($board['bo_table'] == '') {
    $data['error'] = '유효하지 않은 접근입니다.'; 
    echo json_encode($data); exit;
}
$sql = "update {$g5['board_table']} set ".
    "bo_me_code='{$bo_me_code}', ".
    "bo_head_bg_class='{$bo_head_bg_class}', ".
    "bo_head_sub_title='{$bo_head_sub_title}' ".
    "where bo_table='{$bo_table}' ";
sql_query($sql);
echo json_encode($data); exit;
?>