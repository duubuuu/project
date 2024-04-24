<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '2020';
?>

<div class="sub_visual visual02">
  <div class="title_wrap">
    <div class="title">
      <h3>회사소개</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>
<!--sub_visual visual-->

<section class="category-wrap">
    <?php
    include_once(G5_THEME_PATH.'/html/sub_navi.php');
    ?>
</section>
<section class="content_wrap">
  <div class="txtCon">
    <div class="sub_title">
      <h3>content02</h3>
    </div>

    <div class="content_area content02 clearfix">

    </div>
  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
