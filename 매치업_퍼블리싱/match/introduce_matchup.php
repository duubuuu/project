<?
include_once("./_common.php");
include_once("./head.php");


$sql = "select * from matchup_img order by img_order asc";
$p_info_rs = sql_query($sql);


$sql = "select * from matchup_img_mobile order by img_order asc";
$m_info_rs = sql_query($sql);

$i=1;

?>

<style>
.stop-dragging:nth-child(3){
    position: relative;
}
.transparent_btn_set {
    position: absolute;
    right: -12%;
    top: 57%;
    height: 67%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 22vw;
    transform: translate(-50%, -50%);
}
.transparent_btn_set .flex {
    /* width: 22vw; */
    justify-content: space-between;
}
.flex {
    display: flex;

}
.transparent_btn_set .btn {
    background-color: transparent;
    width: 47%;
    height: 4rem;
}
.transparent_btn_set .btn a {
    width: 100% !important;
    height: 100% !important;
}
/* .btn.active a {
    background-color: transparent !important;
} */
a {
    display: inline-block;
    /* width: 100%; */
    /* height: 100%; */
}

@media all and (max-width: 1050px) {
    .flex {
        width: 26vw;
    }
}

@media all and (max-width: 767px) {
    .transparent_btn_set {
        top: 40%;
        right: 8%;
        height: 12.5%;
    }
    .flex {
        width: 36vw;
    }
    .transparent_btn_set {
        top: 48%;
        right: 12%;
        height: 15%;
        transform: translate(-50%, -50%);
    }
}

</style>

<!-- 현위치 -->
<div class="location">
  <div class="inner__2">
      홈 > 매치업 > 매치업소개 > <span>매치업 문화</span>
  </div>
  <div class="mobile_nav">
      < 매치업_매치업소개
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
                <a href="javascript:;" data-index="0">매치업 문화</a>
              </li>
              <li>
                <div class="snb__logo" style="display: none;">
                      <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                </div>
                <a href="javascript:;" data-index="1">걸어온 길</a>
              </li>
              <li>
                  <div class="snb__logo" style="display: none;">
                        <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                  </div>
                <a href="javascript:;" data-index="2">CI</a>
              </li>
              <li>
                  <div class="snb__logo" style="display: none;">
                        <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                  </div>
                <a href="javascript:;" data-index="3">윤리규정</a>
              </li>
              <li>
                  <div class="snb__logo" style="display: none;">
                        <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                  </div>
                <a href="javascript:;" data-index="4">운영방침</a>
              </li>
            </ul>
        </div>
    </div>
    <!-- 내용물 -->
    <div class="content_wrap">



          <?

          while($row = sql_fetch_array($p_info_rs)){

              preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$matches);

            ?>
              <div id="<?=$i."pc"?>" class="stop-dragging pc">
                  <!-- 이미지 경로 -->
                    <img src="<?=$matches[0].$row['img_name']?>" alt="매치업소개_매치업문화_img" style="width: 100%;">


                    <?if($i == 3){?>
                        <div class="transparent_btn_set">
                            <div class="flex">
                                <div class="btn">
                                    <a href="../img/download_file/matchup_CI.ai" download>
                                    </a>
                                </div>
                                <div class="btn">
                                    <a href="../img/download_file/matchup_CI.png" download>
                                    </a>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="btn">
                                    <a href="../img/download_file/akdongcompany_CI.ai" download>
                                    </a>
                                </div>
                                <div class="btn">
                                    <a href="../img/download_file/akdongcompany_CI.png" download>
                                    </a>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="btn">
                                    <a href="../img/download_file/fieldmanager_CI.ai" download>
                                    </a>
                                </div>
                                <div class="btn">
                                    <a href="../img/download_file/fieldmanager_CI.png" download>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?}?>
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

                  <?if($i == 3){?>
                      <div class="transparent_btn_set">
                          <div class="flex">
                              <div class="btn">
                                  <a href="../img/download_file/matchup_CI.ai" download>
                                  </a>
                              </div>
                              <div class="btn">
                                  <a href="../img/download_file/matchup_CI.png" download>
                                  </a>
                              </div>
                          </div>
                          <div class="flex">
                              <div class="btn">
                                  <a href="../img/download_file/akdongcompany_CI.ai" download>
                                  </a>
                              </div>
                              <div class="btn">
                                  <a href="../img/download_file/akdongcompany_CI.png" download>
                                  </a>
                              </div>
                          </div>
                          <div class="flex">
                              <div class="btn">
                                  <a href="../img/download_file/fieldmanager_CI.ai" download>
                                  </a>
                              </div>
                              <div class="btn">
                                  <a href="../img/download_file/fieldmanager_CI.png" download>
                                  </a>
                              </div>
                          </div>
                      </div>
                  <?}?>



              </div>

          <?$i++;}?>




    </div>
  </div>
</div>


<?include "./tail.php"?>
