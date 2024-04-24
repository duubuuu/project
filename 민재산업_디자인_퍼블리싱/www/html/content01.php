<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '2010';
?>

<script>
    $( window ).resize(function() {
	var width=window.innerWidth;
    console.log(width);
	if (width < 426){
        console.log(width);
		jQuery('.hexagon img').attr('src','../theme/sample18/img/m_img_content01_four_set.png');
	}
		}).resize();
</script>

<div class="sub_visual visual01">
  <div class="title_wrap">
    <div class="title">
      <h3>사업분야</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>
<!--sub_visual visual-->

<!-- 카테고리지움 -->

<section class="content_wrap">
  <div class="content01 clearfix">
      <!-- 넷쨋줄 -->
      <div class="four inner">
           <h1 class="mini_title">
               사업분야
           </h1>
           <div class="hexagon" style="display: flex; justify-content: center !important;">
               <img src="../theme/sample18/img/img_content01_four_set.png" alt="" style="width: 80%;">
           </div>
      </div>
  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
