<?
include_once("./_common.php");
include_once("./head.php");


$sql = "select * from matchup_cons_img order by img_order asc";
$p_info_rs = sql_query($sql);


$sql = "select * from matchup_cons_img_mobile order by img_order asc";
$m_info_rs = sql_query($sql);

$i=1;

?>
<!-- 현위치 -->
<div class="location">
  <div class="inner__2">
      홈 > 매치업 > 컨설턴트 매치업 > <span>소개</span>
  </div>
  <div class="mobile_nav">
      < 매치업_컨설턴트 매치업
  </div>
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
                    <a href="javascript:;" data-index="0">소개</a>
                  </li>
                  <li>
                    <div class="snb__logo" style="display: none;">
                          <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                    </div>
                    <a href="javascript:;" data-index="1">스포츠 시설 컨설팅</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="2">비즈니스 운영 컨설팅</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="3">창업 컨설팅</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="4">교육 컨설팅</a>
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
