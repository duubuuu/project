<?
include_once("./_common.php");
include_once("./head.php");



$sql = "select * from download_banner_img";
$banner = sql_fetch($sql);

$banner_img_name = $banner['img_name'];
$banner_img_path = $banner['img_path'];
$banner_img_size = $banner['img_size'];



preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $banner_img_path ,$matches);




$sql = "select * from download_banner_img_mobile";
$banner = sql_fetch($sql);

$banner_img_name_mobile = $banner['img_name'];
$banner_img_path_mobile = $banner['img_path'];
$banner_img_size_mobile = $banner['img_size'];



preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $banner_img_path_mobile ,$matches_mobile);

?>
<style>
.download_btn_set {
    position: absolute;
    display: flex;
    justify-content: space-between;
    width: 30vw;
    transform: translate(-50%, -50%);
    bottom: 17%;
    left: 33%;
}
.download_btn {
    width: 47%;
    height: 4rem;
    background-color: transparent;
}
div.download_btn a {
    display: inline-block;
    width: 100%;
    height: 100%;
}
@media all and (max-width: 1272px) {
    .download_btn {
        height: 3rem;
    }
}
@media all and (max-width: 767px) {
    .download_btn_set {
        bottom: 10%;
        left: 37%;
        width: 61vw;
        transform: translate(-50%, -50%);
    }
    .main-contents .box-shadow-div {
        display: none;
    }
}
</style>

<!-- 현위치 -->
<div class="location">
  <div class="inner__2">
      홈 > <span>다운로드</span>
  </div>
  <div class="mobile_nav">
      < 다운로드
  </div>
</div>
<div id="container" style="position: relative;">
  <!-- <img src="img/img_download01.jpg" alt="다운로드_img" style="width: 100%;"> -->
  <!-- 버튼없는 백그라운드 -->




    <img src="<?=$matches_mobile[0].$banner_img_name_mobile?>" class="mobile" alt="" style="width: 100%;">



    <img src="<?=$matches[0].$banner_img_name?>" class="pc" alt="" style="width: 100%;">



  <!-- 버튼묶음 -->
  <div class="download_btn_set">
    <!-- 구글플레이 다운로드 -->
    <button class="download_btn" type="button" name="button">
      <a href="https://play.google.com/store/apps/details?id=kr.co.matchup" style="display:inline-block;width:100%;height:100%;"></a>
    </button>
    <!-- 앱스토어 다운로드 -->
    <button class="download_btn" type="button" name="button">
      <a href="https://apps.apple.com/kr/app/%EB%A7%A4%EC%B9%98%EC%97%85/id1463155313" style="display:inline-block;width:100%;height:100%;"></a>
    </button>
  </div>
</div>
<div class="main-contents">
     <div class="box-shadow-div"></div>
</div>


<?include "./tail.php"?>
