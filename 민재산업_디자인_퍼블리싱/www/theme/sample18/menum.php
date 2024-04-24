<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$MENUM = array();
$where = '';
if(G5_IS_MOBILE) $where = ' where me_mobile_use=1 ';
else $where = ' where me_use=1 ';

$sql = "select *, CHAR_LENGTH(me_code) cl from {$g5['menu_table']} {$where} order by cl asc, me_order asc, me_code asc";
$res = sql_query($sql);
while($row = sql_fetch_array($res)) {
    if($row['cl'] == 2) {
		$k1 = $row['me_code'];
		$MENUM[$k1] = $row;
		$dp1++;
		$dp2 = 0;
    }
    else if($row['cl'] == 4) {
		$k1 = substr($row['me_code'],0,2);
		$k2 = $row['me_code'];
		$MENUM[$k1]['ms'][$k2] = $row;
		$dp2++;
		$dp3 = 0;
    }
}
?>