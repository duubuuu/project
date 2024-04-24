<?php
include_once("../common.php");
include_once("head.php");
// include_once("header.php");


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

<div class="inquiry design"><!-- design 클래스명 추가했어요 솔씨 0902 -->
    <div class="inner">
        <div class="img_approval_div">
            <img class="img_wait" src="./img/png_wait_approval.png"  alt="승인대기중">
            <img class="img_finish" src="./img/png_finish_approval.png"  alt="승인완료" style="display: none;">
        </div>
    </div>
</div>

<? include "footer.php" ?><!-- footer -->
