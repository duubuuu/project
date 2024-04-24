<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '1060';
?>

<style>
    .mapp {

    }
    .mapp img {

    }

    @media screen and (max-width: 425px) {
        #map .flex {
            display: block;
        }
        .flex .location_area {
            width: 100%;
        }
    }
</style>

<div class="sub_visual visual01">
  <div class="title_wrap">
    <div class="title">
      <h3>찾아오시는 길</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>

<section class="content_wrap clearfix" id="map">
  <div class="txtCon">
     <div class="sub_title">
      <h3>찾아오시는 길</h3>
    </div>

    <!-- 본사 -->
    <div class="location_area" style="padding-bottom: 30px;">
      <div class="contact_address flex">
        <div class="liner">
        </div>
        <ul class="main">
          <li class="lead"><strong>본사.</strong> ㈜민재산업<br>대전광역시 동구 동대전로 295, 408호 (가양동, 신도빌딩)</li>
          <li class="lead"> </li>
          <li class="lead"><strong>대표전화.</strong> 042) 621-4088</li>
        </ul>
      </div>
      <!-- * 카카오맵 - 지도퍼가기 -->
     <!-- 1. 지도 노드 -->
     <div id="daumRoughmapContainer1629786261791" class="root_daum_roughmap root_daum_roughmap_landing"></div>
     <!--
     	2. 설치 스크립트
     	* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
     -->
     <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
     <!-- 3. 실행 스크립트 -->
     <script charset="UTF-8">
     	new daum.roughmap.Lander({
     		"timestamp" : "1629786261791",
     		"key" : "274ck",
     		"mapWidth" : "1300",
     		"mapHeight" : "392"
     	}).render();
     </script>
    </div>

    <div class="flex">
        <!-- 지사 -->
        <div class="location_area">
          <div class="contact_address">
            <ul>
              <li class="lead"><strong>천안.</strong> ㈜민재산업<br>충남 천안시 동남구 신원2길 80, 2층</li>
            </ul>
          </div>
          <div class="mapp">
             <img src="../theme/sample18/img/img_mapp1.jpg" alt="지도">
          </div>

        </div>
        <!-- 지사 -->
        <div class="location_area">
          <div class="contact_address">
            <ul>
              <li class="lead"><strong>대전.</strong> ㈜크린업코리아<br>대전광역시 동구 동대전로 295, 305호 (가양동, 신도빌딩)</li>
            </ul>
          </div>
          <div class="mapp">
             <img src="../theme/sample18/img/img_mapp2.jpg" alt="지도">
          </div>

        </div>
    </div>
    <div class="flex">
        <!-- 지사 -->
        <div class="location_area">
          <div class="contact_address">
            <ul>
              <li class="lead"><strong>충남.</strong> ㈜동민산업<br>충청남도 금산군 추부면 홍골1길, 2층</li>
            </ul>
          </div>
          <div class="mapp">
             <img src="../theme/sample18/img/img_mapp3.jpg" alt="지도">
          </div>

        </div>
        <!-- 지사 -->
        <div class="location_area">
          <div class="contact_address">
            <ul>
              <li class="lead"><strong>충북.</strong>  ㈜더빌코리아<br>청주시 흥덕구 직지대로 530 테크노 에스타워 서관 305호</li>
            </ul>
          </div>
          <div class="mapp">
             <img src="../theme/sample18/img/img_mapp4.jpg" alt="지도">
          </div>

        </div>
    </div>
  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
