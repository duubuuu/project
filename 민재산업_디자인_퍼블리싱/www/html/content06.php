<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '2050';
?>

<script>
$( document ).ready(function(){
    var width=window.innerWidth;
    console.log(width);
    if (width < 426){
        console.log(width);
        jQuery('.four.inner img').attr('src','../theme/sample18/img/m_img_content06_four_set.png');
    }
});


</script>

<div class="sub_visual visual06">
  <div class="title_wrap">
    <div class="title">
      <h3>도장·방수</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>
<!--sub_visual visual-->

<section class="content_wrap">
    <div class="content06 clearfix">
       <!-- 첫줄 -->
       <div class="one">
           <div class="inner">
              건물/시설물의 미관과 더불어 안정성 내구성을 유지합니다
           </div>
       </div>
       <!-- 둘쨋줄 그림아이콘파트 -->
       <div class="two inner">
           <div class="flex">
               <div class="img">
                   <img src="../theme/sample18/img/img_content06_two.png" alt="">
               </div>
              <div class="icon_txt">
                  <div class="icon">
                      <img src="../theme/sample18/img/img_content06_two_2.png" alt="">
                  </div>
              </div>
           </div>
       </div>
       <!-- 셋쨋줄 백그라운드이미지 파트 -->
       <div class="three" style="background-image: url(../theme/sample18/img/bg_content06_three.jpg);">
           <div class="inner">
               <h1>
                   도장공법
               </h1>
               <p>
                   탄성몰탈 | 복합시트 | 기능성 크랙실 | 무늬코트 | 스톤코트 | 칼라콘크리트 | 폴리우레아 | MMA
               </p>
               </br>
               <h1>
                   방수공법
               </h1>
               <p>
                   스틸방수 | 태널방수 | 우레탄방수 | 칼라강판 | 징크 | 아스팔트 싱글 | 뉴-아쿠아
               </p>
           </div>
       </div>
       <!-- 넷쨋줄 -->
       <div class="four inner">
           <!-- <h1 class="mini_title">
               위생미화 주요업무
           </h1> -->
            <img src="../theme/sample18/img/img_content06_four_set.png" alt="">
       </div>
    </div>
</section>


<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
