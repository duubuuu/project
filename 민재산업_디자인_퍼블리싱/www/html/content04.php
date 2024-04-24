<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '2040';
?>

<script>
    $( document ).ready(function(){
        var width=window.innerWidth;
        console.log(width);
    	if (width < 426){
            console.log(width);
    		jQuery('.four.inner img').attr('src','../theme/sample18/img/m_img_content04_four_set.png');
    	}
    });
</script>


<div class="sub_visual visual04">
  <div class="title_wrap">
    <div class="title">
      <h3>경비·보안</h3>
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
  <div class="content04 clearfix">
      <!-- 첫줄 -->
      <div class="one">
          <div class="inner">
             외부침입 방어와 화재예방 등 시설과 재산을 보호합니다.
          </div>
      </div>
      <!-- 둘쨋줄 그림아이콘파트 -->
      <div class="two inner">
          <div class="flex">
              <div class="img">
                  <img src="../theme/sample18/img/img_content04_two.jpg" alt="">
              </div>
             <div class="icon_txt">
                 <div class="icon">
                     <img src="../theme/sample18/img/img_content04_two_2.png" alt="">
                 </div>
             </div>
          </div>
      </div>
      <!-- 셋쨋줄 백그라운드이미지 파트 -->
      <div class="three" style="background-image: url(../theme/sample18/img/bg_content04_three.jpg); background-position-y: 39%;">
          <div class="inner">
              <h1>
                  보안관리 업무
              </h1>
              <p>
                  사전예방활동인 방범/방재 | 사후관리활동인 긴급대응 | 편리성 제공하는 주차/안내업무
              </p>
          </div>
      </div>
      <!-- 넷쨋줄 -->
      <div class="four inner">
          <h1 class="mini_title">
              보안관리 주요업무
          </h1>
          <img src="../theme/sample18/img/img_content04_four_set.png" alt="">
      </div>
  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
