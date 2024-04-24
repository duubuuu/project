<?php
include_once("../common.php");
include_once("head.php");
// include_once("header.php");


include_once($_SERVER["DOCUMENT_ROOT"] . '/my_function.php');
if (!$is_member) {
    $_SESSION['redirect_url'] = "/homepage/new_interior.php";
    alert("로그인이 되어있지 않습니다.", "/bbs/login.php");
}
$sql_dbname = "tpgus7918";
$sql_table = "g5_member";
$sql_select = "SELECT * ";
$sql_common = " {$sql_dbname}.{$sql_table} ";
$sql_search = " WHERE 1=1 AND mb_id = '{$member['mb_id']}' ";
$sql = "{$sql_select} FROM {$sql_common} {$sql_search}";

$result_ck1 = sql_fetch($sql);

if (!$result_ck1) {
    alert("회원정보가 존재하지않습니다 관리자에게 문의해주세요.", '/');
}
// if($result_ck1['company_yn'] == 'Y'){
//     alert("이미 업체회원입니다.",'/');
// }

$sql_dbname2 = "tpgus7918";
$sql_table2 = "all_company";
$sql_select2 = "SELECT * ";
$sql_common2 = " {$sql_dbname2}.{$sql_table2} ";
$sql_search2 = " WHERE 1=1 AND mb_id = '{$member['mb_id']}' ";
$sql2 = "{$sql_select2} FROM {$sql_common2} {$sql_search2}";
$result_ck2 = sql_fetch($sql2);

// if(count($result_ck2)>0){
//     alert("이미 업체회원이거나 승인대기중입니다.",'/');
// }


$box = get_my_config_data("tpgus7918", "all_config", "all_company");

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
            <a href="<?php echo G5_URL?>/homepage/index.php#">
                <img src="./img/svg_logo.svg" alt="로고">
            </a>
        </div>
        <ul class="menu">
            <li class="menu_btn mr40">
                <a href="<?php echo G5_URL?>/homepage/index.php#">
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


<form name="interior_form" id="interior_form" enctype="multipart/form-data" action="./user_form_update.php"
      method="post" autocomplete="off">

    <input type="hidden" name="work_mode" value="<?= $w == "m" ? "company_reg_mod" : "company_reg" ?>">
    <input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
    <input type="hidden" name="idx" value="<?= $row10['idx'] ?>">

    <div class="inquiry">
        <div class="inner">
            <h1 class="main">
                <span>인테리어 시공업체 </span>
                <span>등록신청</span>
            </h1>

            <!-- 담당자정보 -->
            <div class="input_set_wrap">
                <h2 class="middle">
                    담당자 정보
                </h2>
                <div class="input_set flex">
                    <div class="input_box">
                        <p class="middle">
                            담당자 성함
                        </p>
                        <div class="input_wrap">
                            <input id="manager_name" name="manager_name" type="text" placeholder="담당자 성함을 입력해주세요.">
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            담당자 연락처
                        </p>
                        <div class="input_wrap">
                            <input id="manager_tel" name="manager_tel" type="text" placeholder="010 - 1234 - 5678">
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            이메일
                        </p>
                        <div class="input_wrap">
                            <input id="manager_email" name="manager_email" type="text"
                                   placeholder="allthatin@gmail.com">
                        </div>
                    </div>
                </div>
            </div>

            <div class="input_set_wrap">
                <h2 class="middle">
                    기업 정보
                </h2>
                <div class="input_set flex">
                    <div class="input_box">
                        <p class="middle">
                            상호명
                        </p>
                        <div class="input_wrap">
                            <input id="com_init_tag" type="text" placeholder="올인" name="com_init_tag">
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            사이트 주소
                        </p>
                        <div class="input_wrap">
                            <input id="com_homepage" name="com_homepage" type="text" placeholder="www.abcd.efg">
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            대표자 성함
                        </p>
                        <div class="input_wrap">
                            <input id="com_init_name" type="text" placeholder="대표자 성함을 입력해주세요." name="com_init_name">
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            대표자 연락처
                        </p>
                        <div class="input_wrap">
                            <input id="com_tel" type="text" placeholder="010 - 1234 - 5678" name="com_tel">
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            이메일
                        </p>
                        <div class="input_wrap">
                            <input id="com_email" name="com_email" type="text" placeholder="all_in@allin.com">
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            기업 연락처
                        </p>
                        <div class="input_wrap">
                            <input id="com_busi_tel" name="com_busi_tel" type="text" placeholder="070 - 1234 - 5678">
                        </div>
                    </div>
                    <div class="input_box" style="width: 100%;">
                        <p class="middle">
                            사업장 주소
                        </p>
                        <!-- <div class="altnus_cont1 address_input"> -->
                        <div class="input_wrap adress" style="display: flex; justify-content: space-between;">
                            <input type="text" name="com_addr1" id="com_addr1" placeholder="주소를 검색해주세요"
                                   value="<?= $row10['com_addr1'] ?>" style="width: calc(50% - 10px);">
                            <div class="flex" style="width: calc(50% - 10px); justify-content: space-between;">
                                <div class="flex" style="width: calc(50% - 5px);">
                                    <input type="text" name="com_zip" id="com_zip" placeholder="우편번호"
                                           value="<?= $row10['com_zip'] ?>">
                                    <button class="number_s" type="button" onclick="javascript:openDaumPostcode();">
                                        주소검색
                                    </button>
                                </div>
                                <input type="text" name="com_addr2" id="com_addr2" placeholder="상세주소 입력"
                                       value="<?= $row10['com_addr2'] ?>" style="width: 50%;">
                            </div>
                            <!-- <div class="flex">
              <input type="text" name="com_zip" id="com_zip"  placeholder="우편번호" value="<?= $row10['com_zip'] ?>">
              <button class="number_s" type="button" onclick="javascript:openDaumPostcode();">주소검색</button>
            </div>
            <input type="text" name="com_addr1" id="com_addr1"   placeholder="주소를 검색해주세요" value="<?= $row10['com_addr1'] ?>">
            <input type="text" name="com_addr2" id="com_addr2"  placeholder="상세주소 입력" value="<?= $row10['com_addr2'] ?>"> -->
                        </div>
                    </div>

                    <div class="input_box">
                        <p class="middle">
                            회사 설립일
                        </p>
                        <div class="input_wrap">
                            <input id="com_established" name="com_established" type="text" placeholder="2022.01.01">
                        </div>
                    </div>
                    <div class="input_box"></div>

                    <div class="input_box wide">
                        <p class="middle">
                            업체 소개
                        </p>
                        <div class="input_wrap">
                            <textarea class="content low" name="com_memo" id="com_memo" maxlength="500"
                                      placeholder="검색 시, 노출될 업체소개입니다." rows="1"
                                      value="<?= $row10['com_memo'] ?>"></textarea>
                            <!-- 공백포함 -->
                            <div class="limit">
                                [
                                <span class="limit_num_s">
                    0
                </span>
                                /100]
                            </div>
                        </div>

                    </div>
                    <div class="input_box">
                        <p class="middle">
                            사업자 유형
                        </p>
                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-toggle grid n3" data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_type']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?> <?= $box['com_type'][$i] == $row10['com_type'] ? $active : '' ?>">
                                                        <input <?= ($i == 0) ? $required : '' ?> type="radio"
                                                                                                 name="com_type"
                                                                                                 value="<?= $box['com_type'][$i] ?>"
                                                                                                 id="jb-radio-1" <?= ($i == 0 && $w != "m") ? $checked : '' ?> <?= $box['com_type'][$i] == $row10['com_type'] ? "checked" : "" ?>> <?= $box['com_type'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input_box">
                        <p class="middle">
                            공간 유형
                        </p>
                        <!-- 출처 : https://codeconvey.com/custom-select-dropdown-css-only/ -->
                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">

                                            <div class="btn-group btn-group-toggle grid n3" data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_space']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?>
                                       <?
                                                    $com_space = explode("|", $row10['com_space']);
                                                    $com_space_cnt = count($com_space);
                                                    for ($j = 0; $j < $com_space_cnt; $j++) {
                                                        if ($box['com_space'][$i] == $com_space[$j]) {
                                                            echo "active";
                                                        }
                                                    }
                                                    ?>">
                                                        <input type="checkbox" name="com_space[]"
                                                               value="<?= $box['com_space'][$i] ?>"
                                                               id="jb-radio-1" <?= ($i == 0 && $w != "m") ? $checked : '' ?>
                                                            <? for ($j = 0; $j < $com_space_cnt; $j++) {
                                                                if ($box['com_space'][$i] == $com_space[$j]) {
                                                                    echo "checked";
                                                                }
                                                            } ?>>
                                                        <?= $box['com_space'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            업종 유형
                        </p>
                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-toggle grid n3" data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_space_detail']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?>
                                      <?
                                                    $com_detail = explode("|", $row10['com_space_detail']);
                                                    $com_detail_cnt = count($com_detail);
                                                    for ($j = 0; $j < $com_detail_cnt; $j++) {
                                                        if ($box['com_space_detail'][$i] == $com_detail[$j]) {
                                                            echo "active";
                                                        }
                                                    }
                                                    ?>">
                                                        <input type="checkbox" name="com_space_detail[]"
                                                               value="<?= $box['com_space_detail'][$i] ?>"
                                                               id="jb-radio-1" <?= ($i == 0 && $w != "m") ? $checked : '' ?>
                                                            <? for ($j = 0; $j < $com_detail_cnt; $j++) {
                                                                if ($box['com_space_detail'][$i] == $com_detail[$j]) {
                                                                    echo "active";
                                                                }
                                                            } ?>>
                                                        <?= $box['com_space_detail'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            시공 유형
                        </p>
                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-toggle grid n3 mobile_n2"
                                                 data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_space_type']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?>
                                        <?
                                                    $com_type = explode("|", $row10['com_space_type']);
                                                    $com_type_cnt = count($com_type);
                                                    for ($j = 0; $j < $com_type_cnt; $j++) {
                                                        if ($box['com_space_type'][$i] == $com_type[$j]) {
                                                            echo "active";
                                                        }
                                                    }
                                                    ?>">
                                                        <input type="checkbox" name="com_space_type[]"
                                                               value="<?= $box['com_space_type'][$i] ?>"
                                                               id="jb-radio-1" <?= ($i == 0 && $w != "m") ? $checked : '' ?>
                                                            <? for ($j = 0; $j < $com_type_cnt; $j++) {
                                                                if ($box['com_space_type'][$i] == $com_type[$j]) {
                                                                    echo "checked";
                                                                }
                                                            } ?>>
                                                        <?= $box['com_space_type'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="input_box">
                        <p class="middle">
                            활동 지역
                        </p>
                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-toggle grid n5 mobile_n3"
                                                 data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_active']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?>
                                        <?
                                                    $com_active = explode("|", $row10['com_active']);
                                                    $com_active_cnt = count($com_active);
                                                    for ($j = 0; $j < $com_active_cnt; $j++) {
                                                        if ($box['com_active'][$i] == $com_active[$j]) {
                                                            echo "active";
                                                        }
                                                    }
                                                    ?>">
                                                        <input type="checkbox" name="com_active[]"
                                                               value="<?= $box['com_active'][$i] ?>"
                                                               id="jb-radio-1" <?= ($i == 0 && $w != "m") ? $checked : '' ?>
                                                            <? for ($j = 0; $j < $com_active_cnt; $j++) {
                                                                if ($box['com_active'][$i] == $com_active[$j]) {
                                                                    echo "checked";
                                                                }
                                                            } ?>>
                                                        <?= $box['com_active'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input_box">
                        <p class="middle">
                            A/S 제공기간
                        </p>
                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-toggle grid n5 mobile_n3"
                                                 data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_as']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?> <?= $box['com_as'][$i] == $row10['com_as'] ? $active : '' ?>">
                                                        <input <?= ($i == 0 && $w != "m") ? $required : '' ?>
                                                                type="radio" name="com_as"
                                                                value="<?= $box['com_as'][$i] ?>"
                                                                id="jb-radio-1" <?= ($i == 0 && $w != "m") ? $checked : '' ?> <?= $box['com_as'][$i] == $row10['com_as'] ? "checked" : "" ?>>
                                                        <?= $box['com_as'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="middle">
                            제공가능 서비스
                        </p>

                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-toggle grid n5 mobile_n3"
                                                 data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_plus']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?>
                                       <?
                                                    for ($j = 0; $j < $plus_cnt; $j++) {
                                                        // echo $box['com_plus'][$i];
                                                        if ($com_plus[$j] == $box['com_plus'][$i]) {
                                                            echo "active";
                                                        }
                                                    }
                                                    ?>">
                                                        <input type="checkbox" name="com_plus[]"
                                                               value="<?= $box['com_plus'][$i] ?>"
                                                               id="jb-radio-1" <?= ($i == 0) ? $checked : '' ?>
                                                            <?
                                                            for ($j = 0; $j < $plus_cnt; $j++) {
                                                                // echo $box['com_plus'][$i];
                                                                if ($com_plus[$j] == $box['com_plus'][$i]) {
                                                                    echo "checked";
                                                                }
                                                            }
                                                            ?>
                                                        >
                                                        <?= $box['com_plus'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input_box">
                        <p class="middle">
                            경력
                        </p>
                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-toggle grid n5 mobile_n3"
                                                 data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_year']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?> <?= $box['com_year'][$i] == $row10['com_year'] ? $active : '' ?>">
                                                        <input <?= ($i == 0 && $w != "m") ? $required : '' ?>
                                                                type="radio" name="com_year"
                                                                value="<?= $box['com_year'][$i] ?>"
                                                                id="jb-radio-1" <?= ($i == 0 && $w != "m") ? $checked : '' ?> <?= $box['com_year'][$i] == $row10['com_year'] ? "checked" : "" ?>>
                                                        <?= $box['com_year'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input_box">
                        <p class="middle">
                            계약금(선금) 비율
                        </p>
                        <div class="input_wrap">
                            <div class="tab_box">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="btn-group btn-group-toggle grid n5 mobile_n3"
                                                 data-toggle="buttons">
                                                <? for ($i = 0; $i < count($box['com_payment']); $i++) { ?>
                                                    <label class="btn btn-danger <?= ($i == 0 && $w != "m") ? $active : '' ?> <?= $box['com_payment'][$i] == $row10['com_payment'] ? $active : '' ?>">
                                                        <input <?= ($i == 0 && $w != "m") ? $required : '' ?>
                                                                type="radio" name="com_payment"
                                                                value="<?= $box['com_payment'][$i] ?>"
                                                                id="jb-radio-1" <?= ($i == 0 && $w != "m") ? $checked : '' ?> <?= $box['com_payment'][$i] == $row10['com_payment'] ? "checked" : "" ?>>
                                                        <?= $box['com_payment'][$i] ?>
                                                    </label>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input_box">
                        <p class="middle">
                            사업자등록증
                        </p>

                        <div class="altnus_cont3" style="margin-top: 9px;">

                            <input type="file" multiple='multiple' name="com_init[]" id="com_init" accept="image/*"
                                   style="display:none;">

                            <div class="img_upload">
                                <label for="com_init" class="label_box">

                                    <div class="plus_icon">
                                        <img src="/pub/img/plus.png" alt="">
                                    </div>
                                    <p class="upload_note">
                                        <span class="tit">실제 사업자등록증 사진을 등록해주세요.</span><br>
                                        개당 10MB 이하, 최대 1개 첨부 가능<br>
                                    </p>
                                </label>
                            </div>

                            <!-- img_upload 클릭 후 사진을 업로드 할 시 img_upload 사라지고 img_upload_complete가 노출. -->

                            <!-- 사진 업로드 했을 시 목록 -->
                            <ul class="img_upload_complete">
                                <label for="com_init" class="upload_label">
                                    <img src="/pub/img/plus.png" alt="" style="position:unset;">
                                </label>
                            </ul>

                        </div>


                    </div>


                    <div class="input_box">

                        <p class="middle">
                            업체로고
                        </p>

                        <div class="altnus_cont3" style="margin-top:6px;">

                            <input type="file" multiple='multiple' name="com_init_logo[]" id="com_init_logo"
                                   accept="image/*" style="display:none;">

                            <div class="img_upload_logo">
                                <label for="com_init_logo" class="label_box">

                                    <div class="plus_icon">
                                        <img src="/pub/img/plus.png" alt="">
                                    </div>
                                    <p class="upload_note">
                                        <span class="tit">업체 로고를 등록해주세요.</span><br>
                                        개당 10MB 이하, 최대 1개 첨부 가능<br>
                                    </p>
                                </label>
                            </div>

                            <!-- img_upload 클릭 후 사진을 업로드 할 시 img_upload 사라지고 img_upload_complete가 노출. -->

                            <!-- 사진 업로드 했을 시 목록 -->
                            <ul class="img_upload_complete_logo">
                                <label for="com_init_logo" class="upload_label">
                                    <img src="/pub/img/plus.png" alt="" style="position:unset;">
                                </label>
                            </ul>

                        </div>

                    </div>

                    <div class="input_box wide">
                        <p class="middle">
                            개인정보 수집 동의
                        </p>

                        <div class="input_wrap" style="margin: 10px 0 6px 0;">
                            <textarea class="content"><?php include_once('./policy_txt.php'); ?></textarea>
                        </div>
                        <input type="checkbox" name="policy_ok" id="policy_ok" value="1" style="display: block;float:left;"> <p>  개인정보 수집 및 이용에 동의합니다.</p>
                    </div>




                </div>
            </div>
            <button type="submit" class="more_btn">
                신청하기
            </button>
        </div>

    </div>


</form>


<script>

    $(".content").on('keyup', function () {

        var letter_all = $(this).val();
        var letter_cnt = 0;
        var letter_cnt_s = 0;

        if (letter_all.length > 100) {
            alert("업체소개는 100자를 넘을 수 없습니다.");
            return;
        }

        for (var i = 0; i < letter_all.length; i++) {
            if (letter_all[i].match(/\s/gi)) {
                letter_cnt_s++;
            } else {
                letter_cnt_s++;
                letter_cnt++;
            }
        }

        // $(".limit_num").text(letter_cnt);
        $(".limit_num_s").text(letter_cnt_s);
    });


    function openDaumPostcode() {
        new daum.Postcode({
            oncomplete: function (data) {

                document.getElementById('com_addr1').value = data.address;
                document.getElementById('com_zip').value = data.zonecode;
                document.getElementById('com_addr2').focus();

            }
        }).open();
    }


    $("#interior_form").submit(function (e) {
        var com_logo = $("#com_init_logo").val();
        var com_init = $("#com_init").val();

        if (!com_logo) {
            alert("실제 사업자등록증 사진을 등록해주세요");
            return false;
        }

        if (!com_logo) {
            alert("업체 로고를 등록해주세요");
            return false;
        }


        var com_init_tag = $("#com_init_tag").val();
        var com_init_name = $("#com_init_name").val();
        var com_tel = $("#com_tel").val();
        var com_active = $("#com_active").val();
        var com_busi_tel = $("#com_busi_tel").val();
        var com_email = $("#com_email").val();
        var com_homepage = $("#com_homepage").val();
        var com_established = $("#com_established").val();
        var com_memo = $("#com_memo").val();

        var com_zip = $("#com_zip").val();
        var com_addr1 = $("#com_addr1").val();
        var com_addr2 = $("#com_addr2").val();


        if (com_init_tag == "") {
            alert("상호명을 입력해주세요");
            $("#com_init_tag").focus();
            return false;
        }


        if (com_init_name == "") {
            alert("대표자 성함을 입력해주세요.");
            $("#com_init_name").focus();
            return false;
        }

        if (com_tel == "") {
            alert("대표자 연락처를 입력해주세요");
            $("#com_tel").focus();
            return false;
        }

        if (!com_tel.match(/^01([0|1|6|7|8|9])-?([0-9]{3,4})-?([0-9]{4})$/)) {
            alert("대표 연락처를 올바르게 입력해주세요.");
            $("#com_tel").focus();
            return false;
        }

        if (com_active == "") {
            alert("시공가능 지역을 입력해주세요");
            $("#com_active").focus();
            return false;
        }

        if (com_busi_tel == "") {
            alert("기업 연락처를 입력해주세요");
            $("#com_busi_tel").focus();
            return false;
        }


        if (!com_email.match(/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/)) {
            alert("기업 이메일을 입력해주세요.");
            $("#com_email").focus();
            return false;
        }


        if (com_zip == "" || com_addr1 == "") {
            alert("기업 주소를 입력해주세요.");
            $("#com_zip").focus();
            return false;
        }

        if (com_homepage == "") {
            alert("기업 홈페이지 주소를 입력해주세요.");
            $("#com_homepage").focus();
            return false;
        }

        if (com_established == "") {
            alert("기업 설립일을 입력해주세요.");
            $("#com_homepage").focus();
            return false;
        }

        if (com_memo == "") {
            alert("기업 소개문구를 입력해주세요.");
            $("#com_memo").focus();
            return false;
        }

        if( !$("#policy_ok").is(":checked") ) {
            alert("개인정보 수집 및 이용에 동의해주세요.");
            return false;
        }


        return true;

    });


    $(".input_box label").on('change', function () {

        // if(!$(this).hasClass("active")){
        //   $(this).addClass("active");
        // }
        // else{
        //   $(this).removeClass("active");
        // }


    });


    /* 사업자 등록증 이미지 */


    /* 이미지 추가 후단계*/
    $('#com_init').change(function (e) {


        var files = $("#com_init")[0].files;
        var filesArr = Array.prototype.slice.call(files);


        var file = $("#com_init")[0].files;
        var file_length = $("#com_init")[0].files.length;

        if (file_length > 1) {
            alert("최대 1개까지 이미지 첨부 가능합니다.");
            $('#com_init').val('');
            return false;
        }


//$(".selected_photo").remove();
        filesArr.forEach(function (f) {

            var reader = new FileReader();
            var cnt = 0;


            $(".img_upload_complete li").remove();

            reader.onload = function (e) {

                var file_size;
                var file_size_name;


                if (f.size > 1024 * 500) {
                    file_size = Math.round(f.size / (1024 * 1024));
                    file_size_name = "MB";
                } else if (f.size > 1024) {
                    file_size = Math.round(f.size / (1024));
                    file_size_name = "KB";
                } else if (f.size < 1024) {
                    file_size = Math.round(f.size);
                    file_size_name = "Byte";
                }


                var file_name = f.name;
                var file_img_src = e.target.result;
                var lastModified = f.lastModified;


                if (f) {
                    if (f.name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)) {

                        var length = $(".img_upload_complete li").length;
                        length = length + 1;

                        selectFile = f;

                        var html = "";
                        html += "<li data-id='" + lastModified + "'>";
                        html += "  <img src='" + file_img_src + "'>";
                        html += "  <a class='close_ic'>";
                        html += "     <img src='/pub/img/close_w.png' class='remove_img' data-id='" + lastModified + "' data-index='" + length + "'>";
                        html += "  </a>";
                        html += "</li>";

                        $(".img_upload_complete").append(html);


                    } else {
                        alert("이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.");
                        return;
                    }

                    cnt = cnt + 1;

                }

            }
            reader.readAsDataURL(f);

        });


        $(".img_upload_complete").css("display", "flex");
        $(".img_upload").css("display", "none");

    }); // FUNCTION


    /* 로고 이미지 추가 후단계*/
    $('#com_init_logo').change(function (e) {


        var files = $("#com_init_logo")[0].files;
        var filesArr = Array.prototype.slice.call(files);


        var file = $("#com_init_logo")[0].files;
        var file_length = $("#com_init_logo")[0].files.length;

        if (file_length > 1) {
            alert("최대 1개까지 이미지 첨부 가능합니다.");
            $('#com_init_logo').val('');
            return false;
        }


//$(".selected_photo").remove();
        filesArr.forEach(function (f) {

            var reader = new FileReader();
            var cnt = 0;


            $(".img_upload_complete_logo li").remove();

            reader.onload = function (e) {

                var file_size;
                var file_size_name;


                if (f.size > 1024 * 500) {
                    file_size = Math.round(f.size / (1024 * 1024));
                    file_size_name = "MB";
                } else if (f.size > 1024) {
                    file_size = Math.round(f.size / (1024));
                    file_size_name = "KB";
                } else if (f.size < 1024) {
                    file_size = Math.round(f.size);
                    file_size_name = "Byte";
                }


                var file_name = f.name;
                var file_img_src = e.target.result;
                var lastModified = f.lastModified;


                if (f) {
                    if (f.name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)) {

                        var length = $(".img_upload_complete_logo li").length;
                        length = length + 1;

                        selectFile = f;

                        var html = "";
                        html += "<li data-id='" + lastModified + "'>";
                        html += "  <img src='" + file_img_src + "'>";
                        html += "  <a class='close_ic'>";
                        html += "     <img src='/pub/img/close_w.png' class='remove_img_logo' data-id='" + lastModified + "' data-index='" + length + "'>";
                        html += "  </a>";
                        html += "</li>";

                        $(".img_upload_complete_logo").append(html);


                    } else {
                        alert("이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.");
                        return;
                    }

                    cnt = cnt + 1;

                }

            }
            reader.readAsDataURL(f);

        });


        $(".img_upload_complete_logo").css("display", "flex");
        $(".img_upload_logo").css("display", "none");

    }); // FUNCTION


    $(document).on('click', ".remove_img", function () {

        var files = $("#com_init")[0].files;
        var index = $(this).data("index");
        var removeTargetId = $(this).data("id");

        var dataTranster = new DataTransfer();

        console.log(removeTargetId);

        Array.from(files).filter(file => file.lastModified != removeTargetId)
            .forEach(file => {
                dataTranster.items.add(file);
            });

        $("#com_init")[0].files = dataTranster.files;

        $(".img_upload_complete li").each(function () {
            var id = $(this).data("id");
            if (id == removeTargetId) {
                $(this).remove();
            }
        });

        console.log($("#com_init")[0].files);
    });


    $(document).on('click', ".remove_img_logo", function () {

        var files = $("#com_init_logo")[0].files;
        var index = $(this).data("index");
        var removeTargetId = $(this).data("id");

        var dataTranster = new DataTransfer();

        console.log(removeTargetId);

        Array.from(files).filter(file => file.lastModified != removeTargetId)
            .forEach(file => {
                dataTranster.items.add(file);
            });

        $("#com_init_logo")[0].files = dataTranster.files;

        $(".img_upload_complete_logo li").each(function () {
            var id = $(this).data("id");
            if (id == removeTargetId) {
                $(this).remove();
            }
        });

        console.log($("#com_init_logo")[0].files);
    });


</script>


<? include "footer.php" ?><!-- footer -->
