<?
  include_once("../common.php");
  include_once(G5_PATH."/homepage/head.php");
  include_once(G5_PATH."/homepage/header.php");

  $_SESSION['domain_flag'] = "true";

?>



<div class="content01 relative">
    <div class="inner">
        <div class="main_text_set">
            <p class="middle">꼼꼼한 비교와 신중한 선택의 지름길</p>
            <h1 class="main" id="pc_ver">
                인테리어 시공&가구 구매까지<br>
                원스톱 올인하세요!
            </h1>
            <h1 class="main" id="mobile_ver" style="display: none; margin: 5px 0 30px 0;">
                인테리어 <br>시공&amp;가구 구매까지<br>
                원스톱 올인하세요!
            </h1>
            <div class="flex download_btn_set">
                <div class="download_btn mr15">
                    <a href="https://play.google.com/store/apps/details?id=com.wizmade.allin" target="_blank">
                        <img src="<?php echo G5_URL?>/homepage/img/svg_download_google.svg" alt="구글플레이">
                    </a>
                </div>
                <div class="download_btn">
                    <a href="https://apps.apple.com/us/app/%EC%98%AC%EC%9D%B8/id1629599778" target="_blank">
                        <img src="<?php echo G5_URL?>/homepage/img/svg_download_appstore.svg" alt="앱스토어">
                    </a>
                </div>
            </div>

        </div>

    </div>
    <!-- 폰이미지 -->
    <div class="inner absolute">
        <div class="img_main_phone">
            <!-- <img src="./img/img_main_phone.png" alt="메인_폰이미지"> -->
            <img src="<?php echo G5_URL?>/homepage/img/img_last_0722.png" alt="">
        </div>
    </div>
    <div class="img_main_shadow">
        <img src="<?php echo G5_URL?>/homepage/img/img_main_shadow.png" alt="메인_폰이미지">
    </div>
    <!-- 아이콘 슬라이드 icon_slide_div -->
    <div class="rollingbanner">
      <div class="wrap">
        <div class="roller">
          <ul>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon01.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon02.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon03.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon04.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon05.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon06.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon07.svg" style="" alt="롤링아이콘1">
            </li>

            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon01.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon02.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon03.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon04.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon05.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon06.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon07.svg" style="" alt="롤링아이콘1">
            </li>


            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon01.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon02.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon03.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon04.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon05.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon06.svg" style="" alt="롤링아이콘1">
            </li>
            <li class="">
              <img src="<?php echo G5_URL?>/homepage/img/svg_rolling_icon07.svg" style="" alt="롤링아이콘1">
            </li>
          </ul>
        </div>
      </div>
    </div>

    <style>

        @media screen and (max-width: 450px) {
            .icon_slide_div {
                height: 75px;
                bottom: 25px;
            }
        }
    </style>
    <script type="text/javascript">            
        //client rolling banner

        //DOM 생성 후
        window.addEventListener('DOMContentLoaded', function(){

            let roller = document.querySelector('.roller');
            roller.id = 'roller1';

            let clone = roller.cloneNode(true);
            clone.id = 'roller2';
            document.querySelector('.wrap').appendChild(clone);

            document.querySelector('#roller1').style.left = '0px';
            document.querySelector('#roller2').style.left = document.querySelector('.roller ul').offsetWidth+'px';

            roller.classList.add('original');
            clone.classList.add('clone');
        });
    </script>




</div>
<div class="content content02">
    <div class="inner">
        <p class="middle">
            인테리어 O2O 서비스
        </p>
        <h2 class="middle" id="pc_ver">
            까다로운 업체 선별을 통한 시공 전문가, 올인에 다 있다!
        </h2>
        <h2 class="middle" id="mobile_ver" style="display: none;">
            까다로운 업체 선별을 통한<br>시공 전문가, 올인에 다 있다!
        </h2>
        <div class="flex">
            <div class="img">
                <img src="<?php echo G5_URL?>/homepage/img/img_app01_0722.png" alt="">
            </div>
            <div class="text">
                <h2 class="small">
                    올인의 고객맞춤 1분 견적
                </h2>
                <p class="small" id="pc_ver">
                    단 1분으로, 고객맞춤 시공 전문가를 매칭해드립니다. <br>
                    올트너스의 상세 리뷰와 별점을 살펴보고, 1:1 상담까지 바로 해보세요.<br>
                    일일이 알아보고, 비교하는 수고는 이제 그만! <br>
                    올인에서 소중한 시간을 절약하세요.
                </p>
                <p class="small" id="mobile_ver" style="display: none;">
                  단 1분으로, 고객맞춤 시공 전문가를 매칭해드립니다.<br>
                  올트너스의 상세 리뷰와 별점을 살펴보고,<br>1:1 상담까지 바로 해보세요.<br>
                  일일이 알아보고, 비교하는 수고는 이제 그만! <br>
                  올인에서 소중한 시간을 절약하세요.
                </p>

            </div>
        </div>
    </div>
</div>
<div class="content content03">
    <div class="inner">
        <h2 class="middle" style="color: #ffffff;">
            올인의 3단계 업체 검증 시스템
        </h2>
        <p class="middle" id="pc_ver" style="color: #ffffff;">
            올인은 3단계 검증을 통과한 인테리어 업체에 한해 입점 심사를 진행합니다.<br>
            올인의 선별 전문가와 함께 소중한 공간을 안심하고 채워가세요 :)
        </p>
        <p class="middle" id="mobile_ver" style="display: none; color: rgba(255, 255, 255, 0.7) !important;">
            올인은 3단계 검증을 통과한 인테리어 업체에 한해<br>
            입점 심사를 진행합니다.<br>
            올인의 선별 전문가와 함께<br>
            소중한 공간을 안심하고 채워가세요 :)
        </p>

        <div class="white_box_set">
            <div class="white_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/svg_step_icon01.svg" alt="상장">
                </div>
                <p class="middle">
                    사업자등록증<br>
                    및 건축면허증 검증
                </p>
            </div>
            <div class="white_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/svg_step_icon03.svg" alt="돋보기">
                </div>
                <p class="middle">
                    A/S 및 하자보수 능력<br>
                    사무실 유무 검증
                </p>
            </div>
            <div class="white_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/svg_step_icon02.svg" alt="문서">
                </div>
                <p class="middle">
                    시공의 포트폴리오 검증과<br>
                    시공사의 컨셉트 검증
                </p>
            </div>
        </div>
    </div>
</div>
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
                <img src="<?php echo G5_URL?>/homepage/img/img_alltnurs_bg.png" alt="올트너스bg">
            </div>
        </div>
        <div class="div logo_box_set">


            <!-- <?php

                $sql = "select * from all_company where com_init_logo != ''";
                $rs = sql_query($sql);

                while($row = sql_fetch_array($rs)){

            ?>

              <div class="logo_box">
                  <div class="img">
                    <?if(file_exists(G5_PATH."/data/all_company/".$row['com_init_logo']) && is_file(G5_PATH."/data/all_company/".$row['com_init_logo'])){?>
                      <img src="/data/all_company/<?=$row['com_init_logo']?>" alt="">
                    <?}else{?>
                      <img src="/img/no_img.png" alt="">
                    <?}?>
                  </div>
              </div>

            <?php }?> -->

            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/alltnurs_logo/alltnurs_logo01.png" alt="건인로고" style="max-height: 112px;">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/alltnurs_logo/alltnurs_logo02.png" alt="라인닷디자인">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/alltnurs_logo/alltnurs_logo04.png" alt="명문타일" style="padding-top: 8px;">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/alltnurs_logo/alltnurs_logo05.png" alt="re;object">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/alltnurs_logo/alltnurs_logo06.png" alt="히트">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/alltnurs_logo/alltnurs_logo09.png" alt="지누아트">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/alltnurs_logo/alltnurs_logo10.png" alt="렘플리" style="max-height: 90px;">
                </div>
            </div>


        </div>
        <div class="more_btn">
            <a href="<?php echo G5_URL?>/homepage/alltnurs.php" target="_blank">
                더보기
            </a>
        </div>

        <h2 class="small">
            올트너스 시공사 등급표
        </h2>
        <p class="small">
            올인은 실고객 리뷰와 시공 횟수 기반의 올트너스 시공사 등급을 6단계로 보여드립니다.
        </p>
        <div class="flex level_set">
            <div class="level"><img src="<?php echo G5_URL?>/homepage/img/svg_level01.svg" alt=""></div>
            <div class="level"><img src="<?php echo G5_URL?>/homepage/img/svg_level02.svg" alt=""></div>
            <div class="level"><img src="<?php echo G5_URL?>/homepage/img/svg_level03.svg" alt=""></div>
            <div class="level"><img src="<?php echo G5_URL?>/homepage/img/svg_level04.svg" alt=""></div>
            <div class="level"><img src="<?php echo G5_URL?>/homepage/img/svg_level05.svg" alt=""></div>
            <div class="level"><img src="<?php echo G5_URL?>/homepage/img/svg_level06.svg" alt=""></div>
        </div>
    </div>
</div>
<div class="content content05">
    <div class="awards_box">
        <div class="awards">
            Awards
        </div>
    </div>
    <div class="inner">
        <div class="div logo_box_set">
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/png_award_logo01.png" alt="">
                </div>
            </div>
            <div class="logo_box">
                <div class="img mofe_logo">
                    <img src="<?php echo G5_URL?>/homepage/img/png_award_logo02.png" alt="">
                </div>
            </div>
            <div class="logo_box">
                <div class="img cntt_logo">
                    <!-- <img src="./img/png_award_logo03_x2.png" alt="" style="width: 54%;"> -->
                    <img src="<?php echo G5_URL?>/homepage/img/png_award_logo03_0722.png" alt="">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/png_award_logo04.png" alt="">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/jpg_award_logo05.jpg" alt="">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/gif_award_logo06.gif" alt="">
                </div>
            </div>
            <div class="logo_box">
                <div class="img wizmade_logo">
                    <img src="<?php echo G5_URL?>/homepage/img/png_award_logo07.png" alt="">
                </div>
            </div>
            <div class="logo_box">
                <div class="img">
                    <img src="<?php echo G5_URL?>/homepage/img/png_award_logo08.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content content06">
    <div class="inner">
        <h2 class="middle" id="pc_ver">
            올인에서 인테리어 쇼핑을 올-인하다!
        </h2>
        <h2 class="middle" id="mobile_ver" style="display: none;">
            올인에서<br>인테리어 쇼핑을<br>올-인하다!
        </h2>
        <div class="flex">
            <div class="img">
                <img src="<?php echo G5_URL?>/homepage/img/img_app02_0722.png" alt="">
            </div>
            <div class="texts">
                <div class="text">
                    <h2 class="small">
                        내가 찾던 모든 것, 여기 있다.
                    </h2>
                    <p class="small" id="pc_ver">
                        많이 구매한 상품과 리뷰가 좋은 상품을 선별하여 보여 드립니다.<br>
                        가구·소품은 물론 가전 패브릭 홈데코 주방 생활용품 수납·정리까지<br>
                        모두 ‘올인’에 있어요!
                    </p>
                    <p class="small" id="mobile_ver" style="display : none;">
                        많이 구매한 상품과 리뷰가 좋은 상품을 <br>선별하여 보여 드립니다.<br>
                        가구·소품은 물론 가전 패브릭 홈데코 주방 <br>생활용품 수납·정리까지<br>
                        모두 ‘올인’에 있어요!
                    </p>
                </div>
                <div class="text">
                    <h2 class="small">
                        실구매자 인증을 통한 찐-리뷰 확인.
                    </h2>
                    <p class="small">
                        실구매자 인증 리뷰를 확인하고,<br>
                        나에게 맞는 시공 & 제품을 선택하세요!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content content07">
    <div class="inner">
        <h2 class="middle" id="pc_ver">
            랜선집들이, 새로운 공간의 아이디어를 만나다!
        </h2>
        <h2 class="middle" id="mobile_ver" style="display: none;">
            랜선집들이,<br>새로운 공간의 아이디어를<br>만나다!
        </h2>
        <p class="middle" id="pc_ver">
            올인의 랜선이웃들과 다양한 콘텐츠를 공유하며, 새로운 인테리어 영감을 얻어보세요.<br>
            나만의 인테리어 개성도 자유롭게 드러낼 수 있습니다 :)
        </p>
        <p class="middle" id="mobile_ver" style="display: none; color: rgba(33, 37, 41, 0.7);">
            올인의 랜선이웃들과 다양한 콘텐츠를 공유하며, <br>
            새로운 인테리어 영감을 얻어보세요.<br>
            나만의 인테리어 개성도 <br>
            자유롭게 드러낼 수 있습니다 :)
        </p>
    </div>


    <div class="house_slide_div">
        <div class="rollingbanner2">
          <div class="wrap2">
            <div class="roller2">
              <ul>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming01.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming02.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming03.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming04.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming01.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming02.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming03.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming04.png" alt="롤링아이콘">
                </li>

                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming01.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming02.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming03.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming04.png" alt="롤링아이콘">
                </li>

                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming01.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming02.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming03.png" alt="롤링아이콘">
                </li>
                <li class="">
                  <img src="<?php echo G5_URL?>/homepage/img/img_housewarming04.png" alt="롤링아이콘">
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>

    <style>
        .house_slide_div {
            height: 500px;
            width: calc(100vw - 370px);
            position: absolute;
            overflow: hidden;
            right: 0;
        }
        @media screen and (max-width: 450px) {
            .house_slide_div {
                height: 250px;
                width: calc(100vw - 20px);
                margin: 100px 0 0 0;
            }
            .content.content07 {
                padding: 100px 0 0 0 !important;
                height: -webkit-fill-available;
            }
        }
    </style>
    <script type="text/javascript">

    //DOM 생성 후
    window.addEventListener('DOMContentLoaded', function(){

        let roller = document.querySelector('.roller2');
        roller.id = 'roller3';

        let clone = roller.cloneNode(true);
        clone.id = 'roller4';
        document.querySelector('.wrap2').appendChild(clone);

        document.querySelector('#roller3').style.left = '0px';
        document.querySelector('#roller4').style.left = document.querySelector('.roller2 ul').offsetWidth+'px';

        roller.classList.add('original2');
        clone.classList.add('clone2');
    });


    </script>



</div>
<div class="content content08">
    <div class="inner">
        <div class="flex" style="align-items: flex-start;">
            <div class="left">
                <h1 class="last" id="pc_ver" style="color: #ffffff;">
                    원하는 공간 만들기,<br>
                    올인과 함께 시작해 볼까요?<br>
                    지금 다운로드 하세요.
                </h1>
                <h1 class="last" id="mobile_ver" style="display: none; color: #ffffff;">
                    원하는 공간 만들기,<br>
                    올인과 함께<br>시작해 볼까요?<br>
                    지금 다운로드 하세요.
                </h1>
                <div class="flex download_btn_set">
                    <div class="download_btn mr15">
                        <a href="https://play.google.com/store/apps/details?id=com.wizmade.allin" target="_blank">
                            <img src="<?php echo G5_URL?>/homepage/img/svg_download_google.svg" alt="구글플레이">
                        </a>
                    </div>
                    <div class="download_btn">
                        <a href="https://apps.apple.com/us/app/%EC%98%AC%EC%9D%B8/id1629599778" target="_blank">
                            <img src="<?php echo G5_URL?>/homepage/img/svg_download_appstore.svg" alt="앱스토어">
                        </a>
                    </div>
                </div>
            </div>
            <div class="right img">
                <!-- <img src="./img/img_last.svg" alt=""> -->
                <img src="<?php echo G5_URL?>/homepage/img/img_last_0722.png" alt="">
            </div>
        </div>

    </div>
</div>


<script>

  function top_move(){
     $( 'html, body' ).animate({scrollTop: '0'}, 1000);
  }



</script>
<?include  (G5_PATH.'/homepage/footer.php') ?><!-- footer -->
