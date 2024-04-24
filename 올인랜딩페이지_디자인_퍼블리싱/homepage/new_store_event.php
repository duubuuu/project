<?php
include_once("../common.php");
include_once("head.php");
// include_once("header.php");


include_once($_SERVER["DOCUMENT_ROOT"] . '/my_function.php');
// if(!$is_member){
//     $_SESSION['redirect_url'] = "/homepage/new_interior.php";
//     alert("로그인이 되어있지 않습니다.","/bbs/login.php");
// }
// $sql_dbname = "tpgus7918";
// $sql_table = "g5_member";
// $sql_select ="SELECT * ";
// $sql_common = " {$sql_dbname}.{$sql_table} ";
// $sql_search =" WHERE 1=1 AND mb_id = '{$member['mb_id']}' ";
// $sql = "{$sql_select} FROM {$sql_common} {$sql_search}";
//
// $result_ck1 = sql_fetch($sql);
//
// if(!$result_ck1){
//     alert("회원정보가 존재하지않습니다 관리자에게 문의해주세요.",'/');
// }
// if($result_ck1['company_yn'] == 'Y'){
//     alert("이미 업체회원입니다.",'/');
// }

$sql_dbname2 = "tpgus7918";
$sql_table2 = "all_company";
$sql_select2 ="SELECT * ";
$sql_common2 = " {$sql_dbname2}.{$sql_table2} ";
$sql_search2 =" WHERE 1=1 AND mb_id = '{$member['mb_id']}' ";
$sql2 = "{$sql_select2} FROM {$sql_common2} {$sql_search2}";
$result_ck2 = sql_fetch($sql2);

// if(count($result_ck2)>0){
//     alert("이미 업체회원이거나 승인대기중입니다.",'/');
// }


$box = get_my_config_data("tpgus7918","all_config","all_company");

$active = 'active';
$required = 'required';
$checked = 'checked';


$sql10 = " SELECT * FROM all_company WHERE mb_id='$mb_id' ";
$row10 = sql_fetch($sql10);

?><!-- header -->

<header>
    <div class="inner flex">
        <div class="logo">
            <!-- <a href="allin://action?data=https://tpgus7918.cafe24.com/homepage"> -->
            <a href="https://tpgus7918.cafe24.com/homepage/index.php#">
                <img src="./img/svg_logo.svg" alt="로고">
            </a>
        </div>
        <ul class="menu">
            <li class="menu_btn mr40">
                <a href="https://tpgus7918.cafe24.com/homepage/index.php#">
                    다운로드
                </a>
            </li>
            <li class="menu_btn">
                <a href="./alltnurs.php">
                    올트너스
                </a>
            </li>
        </ul>
    </div>
</header>

<!-- 내용 -->
<div class="event_wrap">
    <div class="event_title_box">
        <div class="inner">
            <div class="event_title">
                <img src="./img/event_page/svg_pc_event_title.svg" alt="" class="pc_ver">
                <img src="./img/event_page/svg_mobile_event_title.svg" alt="" class="mobile_ver" style="display: none;">
            </div>
        </div>
    </div>
    <div class="benefit_box">
        <div class="inner">
            <div class="benefit">
                <img src="./img/event_page/svg_pc_event01.svg" alt="" class="pc_ver">
                <img src="./img/event_page/svg_mobile_event01.svg" alt="" class="mobile_ver" style="display: none;">
            </div>
            <div class="benefit">
                <img src="./img/event_page/svg_pc_event02.svg" alt="" class="pc_ver">
                <img src="./img/event_page/svg_mobile_event02.svg" alt="" class="mobile_ver" style="display: none;">
            </div>
            <div class="benefit">
                <img src="./img/event_page/svg_pc_event03.svg" alt="" class="pc_ver">
                <img src="./img/event_page/svg_mobile_event03.svg" alt="" class="mobile_ver" style="display: none;">
            </div>
            <div class="benefit">
                <img src="./img/event_page/svg_pc_event04.svg" alt="" class="pc_ver">
                <img src="./img/event_page/svg_mobile_event04.svg" alt="" class="mobile_ver" style="display: none;">
            </div>
            <div class="benefit">
                <img src="./img/event_page/svg_pc_event05.svg" alt="" class="pc_ver">
                <img src="./img/event_page/svg_mobile_event05.svg" alt="" class="mobile_ver" style="display: none;">
            </div>
            <div class="benefit go_btn">
                <a href="./new_store.php">
                    <img src="./img/event_page/svg_pc_event_go_btn.svg" alt="" class="pc_ver">
                    <img src="./img/event_page/png_mobile_event_go_btn.png" alt="" class="mobile_ver" style="display: none;">
                </a>
            </div>
        </div>
    </div>
</div>


<?include "footer.php"?><!-- footer -->
