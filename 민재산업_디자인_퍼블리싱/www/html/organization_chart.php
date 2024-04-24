<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '1040';
?>

<div class="sub_visual visual01">
  <div class="title_wrap">
    <div class="title">
      <h3>조직도</h3>
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
  <div class="txtCon">
    <div class="sub_title">
      <h3>조직도</h3>
    </div>
    <img src="../theme/sample18/img/img_organization_chart.png" alt="조직도">
  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
