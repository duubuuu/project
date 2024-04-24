<?
include_once("./_common.php");
include_once("./head.php");


$sql = "select * from use_media_img order by img_order asc";
$p_info_rs = sql_query($sql);


$sql = "select * from use_media_img_mobile order by img_order asc";
$m_info_rs = sql_query($sql);

$i=1;


$sql = "select * from use_media_banner_img";
$banner = sql_fetch($sql);

$banner_img_name = $banner['img_name'];
$banner_img_path = $banner['img_path'];
$banner_img_size = $banner['img_size'];



preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $banner_img_path ,$matches);



$sql = "select * from use_media_banner_img_mobile";
$banner = sql_fetch($sql);

$banner_img_name_mobile = $banner['img_name'];
$banner_img_path_mobile = $banner['img_path'];
$banner_img_size_mobile = $banner['img_size'];



preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $banner_img_path_mobile ,$matches_mobile);

?>
<!-- 현위치 -->
<div class="location">
  <div class="inner__2">
      홈 > 서비스 > 이용중개 > <span>위치기반 서비스</span>
  </div>
  <div class="mobile_nav">
      < 서비스_이용중개
  </div>
</div>
<!-- 이미지배너 + 타이틀 자리 -->
<div class="banner" style="width: 100%;">



      <img src="<?=$matches_mobile[0].$banner_img_name_mobile?>" class="mobile" alt="경기매치배너" style="width: 100%;">


      <img src="<?=$matches[0].$banner_img_name?>" class="pc" alt="경기매치배너" style="width: 100%;">






</div>

<div id="container">
  <div class="inner__2">
        <!-- 왼쪽 상세 메뉴 -->
        <div class="snb_wrap">
            <div class="fixed">
                <ul class="snb navbar-nav">
                  <li>
                    <div class="snb__logo" style="display: none;">
                        <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                    </div>
                    <a href="javascript:;" data-index="0">위치기반 서비스</a>
                  </li>
                  <li>
                    <div class="snb__logo" style="display: none;">
                          <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                    </div>
                    <a href="javascript:;" data-index="1">구장예약</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="2">할인쿠폰·포인트적립</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="3">실시간 경기매치</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="4"></a>
                  </li>
                </ul>
            </div>
        </div>
        <!-- 내용물 -->
        <div class="content_wrap">


              <?while($row = sql_fetch_array($p_info_rs)){

                  preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$matches);

                ?>
                  <div id="<?=$i."pc"?>" class="stop-dragging pc">
                      <!-- 이미지 경로 입력 -->
                        <img src="<?=$matches[0].$row['img_name']?>" alt="매치업소개_매치업문화_img" style="width: 100%;">
                  </div>

              <?$i++;}?>




              <?
              $i=1;
              while($row = sql_fetch_array($m_info_rs)){

                preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$matches);

                ?>
                  <div id="<?=$i."mobile"?>" class="stop-dragging mobile">
                    <!-- 이미지 경로 입력 -->
                      <img src="<?=$matches[0].$row['img_name']?>" alt="매치업소개_매치업문화_img" style="width: 100%;">
                  </div>

              <?$i++;}?>


        </div>
    </div>
</div>


<?include "./tail.php"?>
