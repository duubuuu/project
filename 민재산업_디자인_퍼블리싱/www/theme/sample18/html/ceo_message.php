<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '1010';
?>

<div class="sub_visual visual01">
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
<!--sub_visual visual01-->

<section class="category-wrap">
  <?php
    include_once(G5_THEME_PATH.'/html/sub_navi.php');
    ?>
</section>

    <section class="content_wrap clearfix">
      <div class="txtCon">
        <div class="sub_title">
          <h3>인사말</h3>
          <p class="sub_title">티로그테마를 이용해주셔서 감사합니다.</p>
        </div>
        <div class="content_area greeting  clearfix">
          <div class="img">&nbsp;</div>
          <div class="tit">
            <h3>티로그는 웹컨텐츠 제작에서 유지관리 및 종합적인 웹서비스 제공으로 고객의 편리성을 극대화하고
              브랜드의 가치를 더욱 끌어 올릴 수 있는 웹에이전시 전문기업입니다</h3>
          </div>
          <div class="colum">
            <div class="left lead">사용자들이 컴퓨터 시스템 또는 PC와 모바일에서 데이터 입력이나 동작을 제어하기 위하여 사용자가 컴퓨터나 프로그램과 의사소통을 하고 쉽고 편리하게 사용할 수 있도록 하는 것이 티로그의 목적입니다.
              컨텐츠양에 따른 작업일수로 견적 산출을 하고있으며 티로그에서
              제작하는 퀄리티에 관한 모든건 디자이너와 개발자만의 몫입니다.</div>
            <div class="right lead">컨텐츠양에 따른 작업일수로 견적 산출을 하고있으며 티로그에서
              제작하는 퀄리티에 관한 모든건 디자이너와 개발자만의 몫입니다. 사용자들이 컴퓨터 시스템 또는 PC와 모바일에서 데이터 입력이나 동작을 제어하기 위하여 사용자가
              컴퓨터나 프로그램과 의사소통을 하고 쉽고 편리하게 사용할 수 있도록 하는 것이 티로그의 목적입니다.</div>
          </div>
          <p class="sign sign01">티로그 대표 <span class="name">홍길동</span></p>
        </div>
      </div>
    </section>

<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
