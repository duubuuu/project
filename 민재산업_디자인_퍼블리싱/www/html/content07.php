<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '2060';
?>

<script>
$( document ).ready(function(){
    var width=window.innerWidth;
    console.log(width);
    if (width < 426){
        console.log(width);
        jQuery('.four.inner img.one').attr('src','../theme/sample18/img/m_img_content07_four_set.png');
    }
});

</script>

<div class="sub_visual visual07">
  <div class="title_wrap">
    <div class="title">
      <h3>소독·방역</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover" style=""></p>
  <p class="bg"></p>
</div>
<!--sub_visual visual-->

<section class="content_wrap">
    <div class="content07 clearfix">
       <!-- 첫줄 -->
       <div class="one">
           <div class="inner">
              환경부와 질병관리청의 승인을 받은 약품과 지침을 준수하여 안전한 서비스를 제공합니다.
           </div>
       </div>
       <!-- 둘쨋줄 그림아이콘파트 -->
       <div class="two inner">
           <div class="flex">
               <div class="img">
                   <img src="../theme/sample18/img/img_content07_two_var2.png" alt="">
               </div>
              <div class="icon_txt">
                  <div class="icon">
                      <img src="../theme/sample18/img/img_content07_two_2.png" alt="">
                  </div>
              </div>
           </div>
       </div>
       <!-- 셋쨋줄 백그라운드이미지 파트 -->
       <div class="three" style="background-image: url(../theme/sample18/img/bg_content07_three.jpg);">
           <div class="inner">
               <h1>
                   소독방역 절차
               </h1>
               <p>
                   대상시설 조사 > 현장 분석 > 처방계획 수립 > 방제 실시 > 사후관리 관찰
               </p>
           </div>
       </div>
       <!-- 넷쨋줄 -->
       <div class="four inner">
            <img class="one" src="../theme/sample18/img/img_content07_four_set.png" alt="">
            <h1 class="mini_title" style="margin-top: 80px;">
                법정 방역 대상시설 의무소독
            </h1>
            <img src="../theme/sample18/img/img_content07_2four_set.png" alt="">
       </div>
    </div>
</section>
<!--content_wrap-->



<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
