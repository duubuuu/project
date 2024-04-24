<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
  include_once(G5_THEME_MOBILE_PATH . '/index.php');
  return;
}

include_once(G5_THEME_PATH . '/head.php');
include G5_BBS_PATH . '/newwin.inc.php'; // 팝업레이어
?>


<!--■■■visual_slider■■■-->
<script>
  AOS.init();
</script>
<!-- <script>
var mHtml = $("html");
var page = 1;

mHtml.animate({scrollTop : 0},10);

$(window).on("wheel", function(e) {
    if(mHtml.is(":animated")) return;
    if(e.originalEvent.deltaY > 0) {
        if(page == 3) return;
        page++;
    } else if(e.originalEvent.deltaY < 0) {
        if(page == 1) return;
        page--;
    }
    var posTop =(page-1) * $(window).height();
    mHtml.animate({scrollTop : posTop});
})
</script>
<style>
    html {
    overflow: hidden;
    }

    html, body {
    display: block;
    width: 100%;
    height: 100%;
    margin: 0;

    }

    .section {
    width: 100%;
    height: 100%;
    position: relative;
    }

</style> -->

<style>
.section2_1 .inner {
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 100%;
}
a.more_view {
    border-top: 1px solid #b1b1b1;
    border-bottom: 1px solid #b1b1b1;
    color: #555;
    height: 40px;
    width: 120px;
    font-size: 17px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}
a.more_view:hover {
    background: #06519d;
    border-top: 1px solid #06519d;
    border-bottom: 1px solid #06519d;
    color: #fff;
    transition: all .3s;
}
.section2_2 .text_set {
    position: absolute;
    transform: translateY(-50%);
    top: 45%;
    right: 0;
    padding-right: 20px;
}
</style>



<!-- 1. 메인 -->
<div class="main-carousel owl-carousel section" id="section1">
  <div class="li img01">
    <div class="copy_area">
        <h2><strong>(주)민재산업</strong></h2>
    </div>
    <p class="cover"></p>
  </div>
</div>
<script>
  $(function() {
    var $btn = $(".quick_info li a");
    $btn.on('mouseenter focusin mouseleave focusout', function(e) {
      switch (e.type) {
        case 'mouseenter':
        case 'focusin':
          TweenLite.to($(this), 0.5, {
            width: "180px",
            backgroundColor: "#2253b8",
            ease: Cubic.easeOut
          });
          TweenLite.to($(this).find("span"), 0.7, {
            left: 30,
            opacity: 1,
            ease: Cubic.easeOut
          });
          break;
        case 'mouseleave':
        case 'focusout':
          TweenLite.to($(this).find("span"), 0.3, {
            left: 0,
            opacity: 0,
            ease: Cubic.easeOut
          });
          TweenLite.to($(this), 0.5, {
            width: "60px",
            backgroundColor: "#343434",
            ease: Cubic.easeOut
          });
          break;
      }
    });
  });
</script>


<div class="section" id="section2">
    <!-- 2-1. 회사소개이동 -->
    <div class="tl_center_banner_wrap section2_1">
        <div class="inner">
            <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
                Partner for Successful future
            </h2>
            <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                성공적인 비지니스 미래, (주)민재산업이 함께합니다.
            </p>
            <a href="html/ceo_message.php" class="more_view">
                More View
            </a>
        </div>
    </div>
    <!-- 2-2. 사업실적이동 -->
    <div class="tl_center_banner_wrap section2_2">
         <ul class="slider owl-carousel">
           <li class="img01">
            <div class="text_area">
             <div data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate img_business_performance img01">
             </div>
             <div class="text_set">
                 <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
                     Business Performance
                 </h2>
                 <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                     건물 · 시설관리 사업실적입니다.
                 </p>
                 <a href="tl_gallery?sca=건물+·+시설관리" class="more_view">
                     More View
                 </a>
             </div>
            </div>
           </li>
           <li class="img01">
            <div class="text_area">
             <div data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate img_business_performance img02">
             </div>
             <div class="text_set">
                 <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
                     Business Performance
                 </h2>
                 <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                     위생 · 미화 사업실적입니다.
                 </p>
                 <a href="tl_gallery?sca=위생+·+미화" class="more_view">
                     More View
                 </a>
             </div>
            </div>
           </li>
           <li class="img01">
            <div class="text_area">
             <div data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate img_business_performance img03">
             </div>
             <div class="text_set">
                 <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
                     Business Performance
                 </h2>
                 <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                     경비 · 보안 사업실적입니다.
                 </p>
                 <a href="tl_gallery?sca=경비+·+보안" class="more_view">
                     More View
                 </a>
             </div>
            </div>
           </li>
           <li class="img01">
            <div class="text_area">
             <div data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate img_business_performance img04">
             </div>
             <div class="text_set">
                 <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
                     Business Performance
                 </h2>
                 <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                     근로자 파견 사업실적입니다.
                 </p>
                 <a href="tl_gallery?sca=근로자+파견" class="more_view">
                     More View
                 </a>
             </div>
            </div>
           </li>
           <!-- <li class="img01">
            <div class="text_area">
             <div data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate img_business_performance img05">
             </div>
             <div class="text_set">
                 <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
                     Business Performance
                 </h2>
                 <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                     도장 · 방수 사업실적입니다.
                 </p>
                 <a href="tl_gallery?sca=도장+·+방수" class="more_view">
                     More View
                 </a>
             </div>
            </div>
           </li>
           <li class="img01">
            <div class="text_area">
             <div data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate img_business_performance img06">
             </div>
             <div class="text_set">
                 <h2 data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
                     Business Performance
                 </h2>
                 <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                     소독 · 방역 사업실적입니다.
                 </p>
                 <a href="tl_gallery?sca=소독+·+방역" class="more_view">
                     More View
                 </a>
             </div>
            </div>
           </li> -->
    </div>
</div>
<script>
	$(document).ready(function(){
		$('.slider').owlCarousel({
			items:1,//보여줄 이미지 갯수
			nav:true,
			loop: true,
	    	autoplay: true,
			autoplayTimeout:5000,
			navText: ["PREV","NEXT"]
		});
	});
</script>

<!-- 3. 사업분야소개이동 -->
<section class="tl_main_quick_wrap section" id="section3">
    <div class="inner clearfix">
        <div class="title_set">
            <a href="html/content01.php">
                <h1 class="title">
                    Business Areas
                </h1>
                <p class="txt">
                    사업분야
                </p>
            </a>
        </div>
        <ul class="clearfix">
            <li class="img01" data-aos="fade-up" data-aos-delay="200" class="aos-init aos-animate">
               <h2>건물 · 시설관리</h2>
               <a href="html/content02.php">Detail View</a>
            </li>
            <li class="img02" data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                <h2>위생 · 미화</h2>
                <a href="html/content03.php">Detail View</a>
            </li>
            <li class="img03" data-aos="fade-up" data-aos-delay="600" class="aos-init aos-animate">
                <h2>경비 · 보안</h2>
                <a href="html/content04.php">Detail View</a>
            </li>
            <li class="img04" data-aos="fade-up" data-aos-delay="800" class="aos-init aos-animate">
               <h2>근로자 파견</h2>
               <a href="html/content05.php">Detail View</a>
            </li>
            <li class="img05" data-aos="fade-down" data-aos-delay="1000" class="aos-init aos-animate">
                <h2>도장 · 방수</h2>
                <a href="html/content06.php">Detail View</a>
            </li>
            <li class="img06" data-aos="fade-down" data-aos-delay="1200" class="aos-init aos-animate">
                <h2>소독 · 방역</h2>
                <a href="html/content07.php">Detail View</a>
            </li>
        </ul>
    </div>
</section>


<!-- pr -->
<!-- <section class="tl_box_quick_wrap clearfix">
 <div class="inner">
   <ul>
    <li class="box01" data-aos="fade-down" data-aos-delay="800" class="aos-init aos-animate"><h3>MINJAE theme</h3><h2>회사소개<span>간단한 서브문구를 넣어주세요..</span></h2><a href="#">Detail View</a></li>
    <li class="box02" data-aos="fade-down" data-aos-delay="1000" class="aos-init aos-animate"><h3>MINJAE theme</h3><h2>회사연혁<span>간단한 서브문구를 넣어주세요.</span></h2><a href="#">Detail View</a></li>
   </ul>
 </div>
</section> -->




<?php
include_once(G5_THEME_PATH . '/tail.php');
?>
