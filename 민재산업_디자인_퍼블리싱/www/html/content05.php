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
        jQuery('.four.inner img').attr('src','../theme/sample18/img/m_img_content05_four_set.png');
    }
});
</script>

<div class="sub_visual visual05">
  <div class="title_wrap">
    <div class="title">
      <h3>근로자 파견</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>
<section class="content_wrap">
  <div class="content05 clearfix">
      <!-- 첫줄 -->
      <div class="one">
          <div class="inner">
             사업주가 만족하는 효율적이고 지속적인 인재파견 서비스를 제공합니다.
          </div>
      </div>
      <!-- 둘쨋줄 그림아이콘파트 -->
      <div class="two inner">
          <div class="flex">
              <div class="img">
                  <img src="../theme/sample18/img/img_content05_two.jpg" alt="">
              </div>
             <div class="icon_txt">
                 <div class="icon">
                     <img src="../theme/sample18/img/img_content05_two_2.png" alt="">
                 </div>
             </div>
          </div>
      </div>
      <!-- 셋쨋줄 백그라운드이미지 파트 -->
      <div class="three" style="background-image: url(../theme/sample18/img/bg_content05_three.jpg); background-position-y: 22%;">
          <div class="inner">
              <h1>
                  업무분야
              </h1>
              <div class="flex">
                  <p>
                      <strong>사무</strong><br>
                      문서작성 | 경리회계 | 사무보조
                  </p>
                  <p>
                      <strong>안내</strong><br>
                      로비안내 | 방문객응대
                  </p>
                  <p>
                      <strong>보안</strong><br>
                      경비 | 주차관리 | CCTV
                  </p>
                  <p>
                      <strong>생산</strong><br>
                      물류관리 | 창고관리
                  </p>
                  <p>
                      <strong>기타서비스</strong><br>
                      운전원 | 미화원
                  </p>
              </div>
          </div>
      </div>
      <!-- 넷쨋줄 -->
      <div class="four inner">
          <h1 class="mini_title">
              근로자파견 기대효과
          </h1>
          <img src="../theme/sample18/img/img_content05_four_set.png" alt="">
      </div>
  </div>
</section>
<!--content_wrap-->



<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
