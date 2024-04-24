<?
include_once("./_common.php");
include_once("./head.php");


$sql = "select * from matchup_aca_img order by img_order asc";
$p_info_rs = sql_query($sql);


$sql = "select * from matchup_aca_img_mobile order by img_order asc";
$m_info_rs = sql_query($sql);

$i=1;

?>

<style>
.stop-dragging:nth-child(4){
    position: relative;
}
.transparent_btn {
    position: absolute;
    width: 6vw;
    height: 3rem;
    background-color: transparent;
    left: 17%;    
    top: 41%;
    transform: translateY(-50%);
}
div.transparent_btn a {
    display: inline-block;
    width: 100%;
    height: 100%;
}
@media all and (max-width: 1050px) {
    .transparent_btn {
        width: 7vw;
    }
}
@media all and (max-width: 767px) {
    .stop-dragging:nth-child(4){
        position: revert;
    }
    .mobile:nth-child(8) {
        position: relative;
    }
    .transparent_btn {
        width: 11vw;
        left: 27%;
        top: 42%;
    }
}
</style>

<!-- 현위치 -->
<div class="location">
  <div class="inner__2">
      홈 > 매치업 > 매치업 아카데미 > <span>소개</span>
  </div>
  <div class="mobile_nav">
      < 매치업_매치업 아카데미
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
                    <a href="javascript:;" data-index="1">교육철학</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="2">서비스</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="3">지점안내</a>
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

                        <?if($i == 4){?>
                            <div class="transparent_btn">
                                <!-- 매치업 대전점 바로가기 -->
                                <a href="https://djmatchupfc.modoo.at/" target="_blank"></a>
                            </div>
                        <?}?>
                  </div>

              <?$i++;}?>




              <?
              $i=0;
              while($row = sql_fetch_array($m_info_rs)){

                preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$matches);

                ?>
                  <div id="<?=$i."mobile"?>" class="stop-dragging mobile">
                    <!-- 이미지 경로 입력 -->
                      <img src="<?=$matches[0].$row['img_name']?>" alt="매치업소개_매치업문화_img" style="width: 100%;">

                      <?if($i == 3){?>
                          <div class="transparent_btn">
                              <!-- 매치업 대전점 바로가기 -->
                              <a href="https://djmatchupfc.modoo.at/" target="_blank"></a>
                          </div>
                      <?}?>
                  </div>

              <?$i++;}?>


        </div>
    </div>
</div>


<?include "./tail.php"?>
