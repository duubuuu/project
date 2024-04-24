<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '2010';
?>

<script>
    $( document ).ready(function(){
        var width=window.innerWidth;
        console.log(width);
    	if (width < 426){
            console.log(width);
    		jQuery('.four.inner img').attr('src','../theme/sample18/img/m_img_content02_four_set.png');
    	}
    });
    
</script>



<div class="sub_visual visual02">
  <div class="title_wrap">
    <div class="title">
      <h3>건물·시설관리</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>
<section class="content_wrap">
    <div class="content02 clearfix">
        <!-- 첫줄 -->
        <div class="one">
            <div class="inner">
                건물 시설의 수명연장과 자산가치의 향상을 위하여 철저한 책임 관리 서비스를 제공합니다.
            </div>
        </div>
        <!-- 둘쨋줄 그림아이콘파트 -->
        <div class="two inner">
            <div class="flex">
                <div class="img">
                    <img src="../theme/sample18/img/img_content02_two.jpg" alt="">
                </div>
               <div class="icon_txt">
                   <div class="icon">
                       <img src="../theme/sample18/img/img_content02_two_2.png" alt="">
                   </div>
               </div>
            </div>
        </div>
        <!-- 셋쨋줄 백그라운드이미지 파트 -->
        <div class="three" style="background-image: url(../theme/sample18/img/bg_content02_three.jpg); background-position-y: 39%;">
            <div class="inner">
                <h1>
                    건물관리 업무
                </h1>
                <p>
                    건물기본관리 | 임대관리 | 자산재무관리 | 공무대행 | 골프장위탁운영*
                </p>
                <br>
                <h1>
                    시설관리업무
                </h1>
                <p>
                    설비작동 관찰/점검/보수
                </p>
            </div>
        </div>
        <!-- 넷쨋줄 -->
        <div class="four inner">
            <h1 class="mini_title">
                주요업무
            </h1>
            <img src="../theme/sample18/img/img_content02_four_set.png" alt="">
        </div>
    </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
