<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '1040';
?>

<!-- Link Swiper's CSS -->
<link
  rel="stylesheet"
  href="https://unpkg.com/swiper/swiper-bundle.min.css"
/>

<!-- Demo styles -->
<style>

  .swiper {
    width: 100%;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
  }

  .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      height: calc((100% - 30px) / 2) !important;
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
      max-width: 204px; /* 임의 */
      display: flex;
      flex-direction: column;
      min-height: 330px;
  }
  .swiper-grid-column>.swiper-wrapper {
      flex-wrap: wrap;
      flex-direction: column;
      max-height: 700px;
      max-width: 1200px;
}
.swiper-button-next, .swiper-rtl .swiper-button-prev {
    display: block !important;
    transform: translateX(-50%);
    right: -6% !important;
}
.swiper-button-prev, .swiper-rtl .swiper-button-next {
    display: block !important;
    transform: translateX(-50%);
    left: -6% !important;
}

@media screen and (max-width: 425px) {
    .swiper-button-next, .swiper-button-prev {
        display: none !important;
    }
    .content_wrap .txtCon {
        padding: 60px 5px 50px 5px;
    }

}
</style>

<div class="sub_visual visual01">
  <div class="title_wrap">
    <div class="title">
      <h3>허가 및 인증현황</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>

<section class="content_wrap">
  <div class="txtCon permission clearfix">

    <div class="sub_title">
      <h3>허가 및 인증현황</h3>
    </div>

    <div class="content_area icon clearfix" style="position: relative;">
      <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/01shadow_permit.png" alt=""></div>
              <h2>ISO14001인증서</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/02shadow_permit.png" alt=""></div>
              <h2>ISO9001인증서</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/03shadow_permit.png" alt=""></div>
              <h2>시설경비 허가증</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/04shadow_permit.png" alt=""></div>
              <h2>신변보호  허가증</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/05shadow_permit.png" alt=""></div>
              <h2>위생관리 영업신고증</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/06shadow_permit.png" alt=""></div>
              <h2>근로자파견 허가증</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/07shadow_permit.png" alt=""></div>
              <h2>소독업 신고증</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/08shadow_permit.png" alt=""></div>
              <h2>저수조청소업 신고증</h2>
            </div>

            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/09shadow_permit.png" alt=""></div>
              <h2>사업자등록증</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/10shadow_permit.png" alt=""></div>
              <h2>강성열법률사무소<br>상생발전협약서</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/11shadow_permit.png" alt=""></div>
              <h2>유승웅법무사사무소<br>상생발전협약서</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/12shadow_permit.png" alt=""></div>
              <h2>신우이레산업<br>상생발전협약서</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/13shadow_permit.png" alt=""></div>
              <h2>경인화학<br>상생발전협약서</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/14shadow_permit.png" alt=""></div>
              <h2>남동후세무사무소<br>상생발전협약서</h2>
            </div>
            <div class="swiper-slide">
              <div class="web_icon"><img src="../theme/sample18/img/15shadow_permit.png" alt=""></div>
              <h2>다솔안전<br>상생발전협약서</h2>
            </div>
          </div>
      </div>
      <!-- 좌우화살표 -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
    <!-- Initialize Swiper -->
    <script>
             var swiper = new Swiper(".mySwiper", {// 강사진소개 슬라이드그리드
                slidesPerView: 1,
                // slidesPerColumn: 6,
                // slidesPerGroup :5,
                grid: {
                  rows: 2,
                },
                spaceBetween: 15,
                navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev"
                },
                loopFillGroupWithBlank : true,
                breakpoints: {
                  768: {
                    slidesPerView: 3,  //브라우저가 768보다 클 때
                    spaceBetween: 15,
                  },
                  1024: {
                    slidesPerView: 4,  //브라우저가 1024보다 클 때
                    spaceBetween: 15,
                  },
                  1200: {
                    slidesPerView: 5,  //브라우저가 1200보다 클 때
                    spaceBetween: 15,
                  },
                },
            });
            </script>
    </div>

  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
