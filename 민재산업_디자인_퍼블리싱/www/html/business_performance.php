<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '3010';
?>

<div class="sub_visual visual02">
  <div class="title_wrap">
    <div class="title">
      <h3>운영실적</h3>
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
  <div class="txtCon content03 clearfix">

    <div class="sub_title">
      <h3>운영실적</h3>
      <!-- <p class="sub_title">이용해주셔서 감사합니다.</p> -->
    </div>

    <div class="content_area icon clearfix">
      <ul>
        <li>
          <div class="web_icon"><i class="xi-building"></i></div>
          <h2>TITLE TEXT</h2>
          <p class="lead">이곳에 간단한 설명글을 넣어주세요.</p>
        </li>
        <li>
          <div class="web_icon"><i class="xi-spa"></i></div>
          <h2>TITLE TEXT</h2>
          <p class="lead">이곳에 간단한 설명글을 넣어주세요.</p>
        </li>
        <li>
          <div class="web_icon"><i class="xi-restaurant"></i></div>
          <h2>TITLE TEXT</h2>
          <p class="lead">이곳에 간단한 설명글을 넣어주세요.</p>
        </li>
        <li>
          <div class="web_icon"><i class="xi-restaurant"></i></div>
          <h2>TITLE TEXT</h2>
          <p class="lead">이곳에 간단한 설명글을 넣어주세요.</p>
        </li>
        <li>
          <div class="web_icon"><i class="xi-restaurant"></i></div>
          <h2>TITLE TEXT</h2>
          <p class="lead">이곳에 간단한 설명글을 넣어주세요.</p>
        </li>
        <li>
          <div class="web_icon"><i class="xi-restaurant"></i></div>
          <h2>TITLE TEXT</h2>
          <p class="lead">이곳에 간단한 설명글을 넣어주세요.</p>
        </li>
      </ul>
    </div>

  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
