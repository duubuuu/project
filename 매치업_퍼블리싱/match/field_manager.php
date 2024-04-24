<?
include_once("./_common.php");
include_once("./head.php");


$sql = "select * from field_mn_img order by img_order asc";
$p_info_rs = sql_query($sql);


$sql = "select * from field_mn_img_mobile order by img_order asc";
$m_info_rs = sql_query($sql);

$i=1;

?>

<style>
    .stop-dragging:nth-child(1), .stop-dragging:nth-child(2), .stop-dragging:nth-child(3), .stop-dragging:nth-child(4){
        position: relative;
    }

    div.btn a {
        display: inline-block;
        width: 100%;
        height: 100%;
    }

    .transparent_btn_set {
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        bottom: 3%;
        display: flex;
        width: 35rem;
        justify-content: space-between;
    }
    .transparent_btn_set .btn {
        background-color: transparent;
        width: 47%;
        height: 5rem;
        cursor: pointer;
    }
    .two {
        bottom: 7% !important;
    }
    .three {
        bottom: 6% !important;
    }
    .four {
        bottom: -3% !important;
    }

    @media all and (max-width: 1232px) {
        .transparent_btn_set {
            width: 25rem;
        }
    }

    @media all and (max-width: 767px) {
        .stop-dragging:nth-child(1), .stop-dragging:nth-child(2), .stop-dragging:nth-child(3), .stop-dragging:nth-child(4){
            position: revert;
        }
        .stop-dragging:nth-child(5), .stop-dragging:nth-child(6), .stop-dragging:nth-child(7), .stop-dragging:nth-child(8){
            position: relative;
        }
        .transparent_btn_set {
            width: 67vw;
            bottom: 0;
        }
        .two {
            bottom: 0% !important;
        }
        .three {
            bottom: -1% !important;
        }
        .four {
            bottom: 8% !important;
        }
    }

</style>
<!-- 현위치 -->
<div class="location">
  <div class="inner__2">
      홈 > 매치업 > 필드매니저 > <span>소개</span>
  </div>
  <div class="mobile_nav">
      < 매치업_필드매니저
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
                    <a href="javascript:;" data-index="1">Sport Wear</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="2">Sports goods</a>
                  </li>
                  <li>
                      <div class="snb__logo" style="display: none;">
                            <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                      </div>
                    <a href="javascript:;" data-index="3">운영안내</a>
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


                    <div style="position:relative;">
                      <!-- 이미지 경로 입력 -->
                        <img src="<?=$matches[0].$row['img_name']?>" alt="매치업소개_매치업문화_img" style="width: 100%;">

                        <?if($i == 1){?>
                            <div class="transparent_btn_set <?=$i?>">
                                <div class="btn"><!-- 필드매니저 카카오채널 -->
                                    <a href="http://pf.kakao.com/_Kcxncxb" target="_blank"></a>
                                </div>
                                <div class="btn"><!-- 필드매니저shop가기 -->
                                    <a href="https://www.fieldmanager.co.kr/" target="_blank"></a>
                                </div>
                            </div>
                        <?}?>

                        <?if($i == 2){?>
                            <div class="transparent_btn_set two <?=$i?>">
                                <div class="btn"><!-- 필드매니저 카카오채널 -->
                                    <a href="http://pf.kakao.com/_Kcxncxb" target="_blank"></a>
                                </div>
                                <div class="btn"><!-- 필드매니저shop가기 -->
                                    <a href="https://www.fieldmanager.co.kr/" target="_blank"></a>
                                </div>
                            </div>
                        <?}?>

                        <?if($i == 3){?>
                            <div class="transparent_btn_set three <?=$i?>">
                                <div class="btn"><!-- 필드매니저 카카오채널 -->
                                    <a href="http://pf.kakao.com/_Kcxncxb" target="_blank"></a>
                                </div>
                                <div class="btn"><!-- 필드매니저shop가기 -->
                                    <a href="https://www.fieldmanager.co.kr/" target="_blank"></a>
                                </div>
                            </div>
                        <?}?>

                        <?if($i == 4){?>
                            <div class="transparent_btn_set four <?=$i?>">
                                <div class="btn"><!-- 필드매니저 카카오채널 -->
                                    <a href="http://pf.kakao.com/_Kcxncxb" target="_blank"></a>
                                </div>
                                <div class="btn"><!-- 필드매니저shop가기 -->
                                    <a href="https://www.fieldmanager.co.kr/" target="_blank"></a>
                                </div>
                            </div>
                        <?}?>


                      </div>

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

                      <?if($i == 1){?>
                          <div class="transparent_btn_set <?=$i?>">
                              <div class="btn"><!-- 필드매니저 카카오채널 -->
                                  <a href="http://pf.kakao.com/_Kcxncxb" target="_blank"></a>
                              </div>
                              <div class="btn"><!-- 필드매니저shop가기 -->
                                  <a href="https://www.fieldmanager.co.kr/" target="_blank"></a>
                              </div>
                          </div>
                      <?}?>

                      <?if($i == 2){?>
                          <div class="transparent_btn_set two <?=$i?>">
                              <div class="btn"><!-- 필드매니저 카카오채널 -->
                                  <a href="http://pf.kakao.com/_Kcxncxb" target="_blank"></a>
                              </div>
                              <div class="btn"><!-- 필드매니저shop가기 -->
                                  <a href="https://www.fieldmanager.co.kr/" target="_blank"></a>
                              </div>
                          </div>
                      <?}?>

                      <?if($i == 3){?>
                          <div class="transparent_btn_set three <?=$i?>">
                              <div class="btn"><!-- 필드매니저 카카오채널 -->
                                  <a href="http://pf.kakao.com/_Kcxncxb" target="_blank"></a>
                              </div>
                              <div class="btn"><!-- 필드매니저shop가기 -->
                                  <a href="https://www.fieldmanager.co.kr/" target="_blank"></a>
                              </div>
                          </div>
                      <?}?>

                      <?if($i == 4){?>
                          <div class="transparent_btn_set four <?=$i?>">
                              <div class="btn"><!-- 필드매니저 카카오채널 -->
                                  <a href="http://pf.kakao.com/_Kcxncxb" target="_blank"></a>
                              </div>
                              <div class="btn"><!-- 필드매니저shop가기 -->
                                  <a href="https://www.fieldmanager.co.kr/" target="_blank"></a>
                              </div>
                          </div>
                      <?}?>
                  </div>

              <?$i++;}?>



        </div>
    </div>
</div>
<?include "./tail.php"?>
