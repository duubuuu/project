<?
  include_once("../common.php");
  include_once("head.php");
  // include_once("header.php");

?>
<header>
    <div class="inner flex">
        <div class="logo">
            <!-- <a href="allin://action?data=https://tpgus7918.cafe24.com/homepage"> -->
            <a href="<?php echo G5_URL;?>/homepage/index.php#">
                <img src="./img/svg_logo.svg" alt="로고">
            </a>
        </div>
        <ul class="menu">
            <li class="menu_btn mr40">
                <a href="<?php echo G5_URL;?>/homepage/index.php#">
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
<div class="alltnurs">
  <div class="content content04">
      <div class="inner">
          <div class="flex">
              <div class="text">
                  <h2 class="middle">
                      올트너스
                  </h2>
                  <p class="middle">
                      올인은 협력업체를
                      <span class="bold">올트너스</span>
                      라 부릅니다.<br>
                      올인의 ‘올’과 파트너스의 ‘트너스’ 의 합성어로,<br>
                      <span class="bold">협력업체와 동반 성장한다</span>
                      는 의미를 담고 있습니다.
                  </p>
              </div>
              <div class="img">
                  <img src="./img/img_alltnurs_bg.png" alt="올트너스bg">
              </div>
          </div>
          <div class="div logo_box_set">
              <div class="logo_box">
                  <div class="img">
                      <img src="./img/alltnurs_logo/alltnurs_logo01.png" alt="건인로고" style="max-height: 112px;">
                  </div>
              </div>
              <div class="logo_box">
                  <div class="img">
                      <img src="./img/alltnurs_logo/alltnurs_logo02.png" alt="라인닷디자인">
                  </div>
              </div>
              <div class="logo_box">
                  <div class="img">
                      <img src="./img/alltnurs_logo/alltnurs_logo04.png" alt="명문타일" style="padding-top: 8px;">
                  </div>
              </div>
              <div class="logo_box">
                  <div class="img">
                      <img src="./img/alltnurs_logo/alltnurs_logo05.png" alt="re;object">
                  </div>
              </div>
              <div class="logo_box">
                  <div class="img">
                      <img src="./img/alltnurs_logo/alltnurs_logo06.png" alt="히트">
                  </div>
              </div>
              <div class="logo_box">
                  <div class="img">
                      <img src="./img/alltnurs_logo/alltnurs_logo09.png" alt="지누아트">
                  </div>
              </div>
              <div class="logo_box">
                  <div class="img">
                      <img src="./img/alltnurs_logo/alltnurs_logo10.png" alt="렘플리" style="max-height: 90px;">
                  </div>
              </div>



            <?php

                $sql = "select ac.* from all_company ac left join g5_member mb on mb.mb_id = ac.mb_id where com_web_logo != '' and mb.company_yn='Y' ";
                $rs = sql_query($sql);

                while($row = sql_fetch_array($rs)){

            ?>

              <div class="logo_box">
                  <div class="img">
                    <?if(file_exists(G5_PATH."/data/all_company/".$row['com_web_logo']) && is_file(G5_PATH."/data/all_company/".$row['com_web_logo'])){?>
                      <img src="/data/all_company/<?=$row['com_web_logo']?>" alt="">
                    <?}else{?>
                      <img src="/img/no_img.png" alt="">
                    <?}?>
                  </div>
              </div>

            <?php }?>



          </div>
      </div>
  </div>
</div>
<?include "footer.php"?><!-- footer -->
