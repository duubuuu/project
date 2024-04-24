<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '2030';
?>

<script>
$( document ).ready(function(){
    var width=window.innerWidth;
    console.log(width);
    if (width < 426){
        console.log(width);
        jQuery('.four.inner .top img').attr('src','../theme/sample18/img/m_img_content03_four_set.png');
        jQuery('.four.inner .bottom img').attr('src','../theme/sample18/img/m_img_content03_four_bottom_01.png');
    }
});
</script>

<div class="sub_visual visual03">
  <div class="title_wrap">
    <div class="title">
      <h3>위생·미화</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>

<section class="content_wrap">
  <div class="content03 clearfix">
     <!-- 첫줄 -->
     <div class="one">
         <div class="inner">
            쾌적하고 깨끗한 공간에서 활동할 수 있도록 철저히 관리합니다.
         </div>
     </div>
     <!-- 둘쨋줄 그림아이콘파트 -->
     <div class="two inner">
         <div class="flex">
             <div class="img">
                 <img src="../theme/sample18/img/img_content03_two.png" alt="">
             </div>
            <div class="icon_txt">
                <div class="icon">
                    <img src="../theme/sample18/img/img_content03_two_2.png" alt="">
                </div>
            </div>
         </div>
     </div>
     <!-- 셋쨋줄 백그라운드이미지 파트 -->
     <div class="three" style="background-image: url(../theme/sample18/img/bg_content03_three.jpg);">
         <div class="inner">
             <h1>
                 위생미화업무
             </h1>
             <p>
                 청소구역 지정 및 청소｜
                 용도별 적합한 청소용품 배치｜
                 고객요청 바닥왁스청소｜
                 고객요청 외벽유리청소｜
                 고객요청 저수조(물탱크)청소
             </p>
         </div>
     </div>
     <!-- 넷쨋줄 -->
     <div class="four inner">
         <h1 class="mini_title">
             위생미화 주요업무
         </h1>
         <div class="top">
             <img src="../theme/sample18/img/img_content03_four_set.png" alt="">
         </div>
         <div class="liner">
         </div>
         <div class="bottom">
             <div class="img" style="margin-bottom: 50px;">
                <img src="../theme/sample18/img/img_content03_four_bottom_01.png" alt="">
             </div>
         </div>
     </div>
  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
