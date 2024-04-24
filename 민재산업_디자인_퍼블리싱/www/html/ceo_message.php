<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '1010';
?>

<script>
$( document ).ready(function(){
    var width=window.innerWidth;
    console.log(width);
    if (width < 426){
        console.log(width);
        jQuery('.hexagon img').attr('src','../theme/sample18/img/m_img_content01_four_set.png');
    }
});
</script>

<div class="sub_visual visual01">
  <div class="title_wrap">
    <div class="title">
      <h3>인사말</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>

    <section class="content_wrap clearfix">
        <div class="sub_title">
          <h3>인사말</h3>
        </div>
        <!-- 인삿말 -->
        <div class="content_area greeting clearfix">
            <div class="img_set">
                <div class="img">
                    <img class="" src="/theme/sample18/img/img_ceo_01.png" alt="만세포토">
                </div>
                <div class="shape">
                </div>
            </div>
            <div class="message_set">
                <h1 class="title">
                    Business의 성공적인 미래,<br>㈜민재산업이 함께합니다.
                </h1>
                <div class="line">
                </div>
                <p class="txt">
                ㈜민재산업은 분야별 용역서비스를 제공하는 기업으로,<br>
                시설관리, 경비용역, 미화관리, 근로자파견 등의 전문적 서비스를 고객에게 제공 및<br>
                관리하는 업체로서 고객을 제일로 생각하는 기업이념을 바탕으로<br>
                자연과 시설과 사람이 함께 어우러진 이상적 관리문화를 창조하기 위해<br>
                철저한 주인정신으로 창사이래 최상의 서비스를 제공하기 위해 노력하고 있습니다.
                </p>
            </div>
        </div>
        <div class="greeting02">
            <div class="inner">
                <div class="bg">
                    <div class="flex">
                        <div class="left">
                            회사명
                        </div>
                        <div class="right">
                            ㈜민재산업
                        </div>
                    </div>
                    <div class="flex">
                        <div class="left">
                            설립일
                        </div>
                        <div class="right">
                            1999. 08. 06
                        </div>
                    </div>
                    <div class="flex">
                        <div class="left">
                            사업기간
                        </div>
                        <div class="right">
                            22년
                        </div>
                    </div>
                    <div class="flex">
                        <div class="left">
                            자본금
                        </div>
                        <div class="right">
                            5억원
                        </div>
                    </div>
                    <div class="flex">
                        <div class="left">
                            최근 5년간 매출액
                            <br>(백만원)
                        </div>
                        <div class="right">
                            6,366 (2020년) 6,637 (2019년) / 6,562 (2018년)<br>
                            8,134 (2017년) /18,470 (2016년)
                        </div>
                    </div>
                    <div class="flex">
                        <div class="left">
                            본사/지사
                        </div>
                        <div class="right">
                            본 사 : 대전광역시 동구 동대전로 295, 408호 (가양동, 신도빌딩)<br>
                            충 남 : 충남 천안시 동남구 신원2길 80, 2층
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- 주요사업영역 -->
        <div class="operation">
            <h1 class="heading2">주요사업영업</h1>
            <div class="inner">
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
