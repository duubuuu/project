<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '1040';
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
<!--sub_visual visual-->

<section class="category-wrap">
    <?php
    include_once(G5_THEME_PATH.'/html/sub_navi.php');
    ?>
</section>


<section class="content_wrap clearfix">
  <div class="txtCon">
     <div class="sub_title">
      <h3>오시는 길</h3>
      <p class="sub_title">티로그테마를 이용해주셔서 감사합니다.</p>
    </div>
    <div class="location_area">
      <div class="contact_address">
        <ul>
          <li class="lead"><strong>A.</strong> 부산시 광안로7번길 22</li>
          <li class="lead"> </li>
          <li class="lead"><strong>T.</strong> 051)325-6700</li>
        </ul>
      </div>
      <div class="contact_traffic">
        <ul class="bus">
          <h3><i class="xi-bus xi-x"></i>&nbsp;&nbsp;버스 이용시</h3>
          <li class="lead">1003(부산역) → 광안역 정류장 하차</li>
          <li class="lead">40(부산역) → 광안역 정류장 하차</li>
          <li class="lead">82(부산역) → 일반버스 83((구)영남예식장) → 광안리입구 정류장 하차</li>
          <li class="lead">43(부산역) → 일반버스 83((구)영남예식장) → 광안리입구 정류장 하차</li>
          <li class="lead">81(부산역) → 일반버스 83((구)영남예식장) → 광안리입구 정류장 하차</li>
        </ul>
        <ul class="subway">
          <h3><i class="xi-subway xi-x"></i>&nbsp;&nbsp;지하철 이용시</h3>
          <li class="lead">부산지하철 2호선 - 광안역 하차 - 3번 출구 - 도보200m</li>
        </ul>
      </div>
      
      <!-- * 카카오맵 - 지도퍼가기 --> 
      <!-- 1. 지도 노드 -->
      <div id="daumRoughmapContainer1580779444958" class="root_daum_roughmap root_daum_roughmap_landing" style="max-width: 100%; width: 1200px;"></div>
      
      <!--
	2. 설치 스크립트
	* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
--> 
      <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script> 
      
      <!-- 3. 실행 스크립트 --> 
      <script charset="UTF-8">
	new daum.roughmap.Lander({
		"timestamp" : "1580779444958",
		"key" : "wufy",
		"mapWidth" : "1200",
		"mapHeight" : "360"
	}).render();
</script> 
    </div>
  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
