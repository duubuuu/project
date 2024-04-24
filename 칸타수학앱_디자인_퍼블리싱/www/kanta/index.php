<?

include_once("./_common.php");
include_once("./head.php");

?>

<style>
  @media (max-width: 812px) {
    .main-inner {
      top: 47%;
    }
  }
</style>

<div class="main">
  <div class="main-inner">
    <div class="login-comment">반갑습니다,
      <div class="login-comment__icon"><img src="../../../img/mobile/main_cap.png" alt="학사모아이콘" style="width: 100%"></div>
      <span class="login-comment__span" id="logged-in-user"><?=$member['mb_name']?>(<?=$member['mb_id']?>)</span>님
      <!-- 로그아웃 아이콘 -->
      <span style="width: 2vw; margin-bottom: 2rem; margin-left: 0.3rem;">
        <a onclick="logout();">
          <img src="/img/mobile/icon_logout02.png" alt="톱니바퀴아이콘" style="width: 95%;">
        </a>
      </span>
    </div>
    <!-- 로그인 안되어 있을 때 -->
    <div class="login-comment" id="please-login" style="display: none;">
      로그인이 필요합니다.
    </div>
    <div class="main-button-set">
      <button class="main-button" onclick="location.href='/kanta/notice_board.php'">
        <img src="../../../img/mobile/main_01_1.png" alt="메인버튼1">
        <h1>NOTICE</h1>
      </button>
      <button class="main-button" onclick="location.href='/kanta/study_board.php'">
        <img src="../../../img/mobile/main_02_1.png" alt="메인버튼1" style="width: 102%;">
        <h1 style="left: 70%;">STUDY</h1>
      </button>
      <button class="main-button" onclick="location.href='/kanta/exam_board.php'">
        <img src="../../../img/mobile/main_03_1.png" alt="메인버튼1" style="width:90%;">
        <h1 style="left: 70%;">EXAM</h1>
      </button>
    </div>
  </div>

  <!-- 이름 클릭시 로그아웃 하시겠습니까 팝업 -->
  <div class="popup-box" id="logout-popup" style="display: none;">
    <div class="popup-box__icon">
      <img src="../../../img/mobile/info_icon.png" alt="느낌표아이콘" style="width: 100%;">
    </div>
    <p class="popup-box__comment">현재 로그인 중입니다.<br>로그아웃하시겠습니까?</p>
    <div class="m-kanta-button-set">
      <button type="button" name="button" class="m-kanta-button kanta" id="logout-popup__yes_btn" style="color: #ffffff;"><a href="<? echo G5_HTTPS_DOMAIN.'/bbs/logout.php'?>">네</a></button>
      <button type="button" name="button" class="m-kanta-button" id="logout-popup__no_btn">아니요</button>
    </div>
  </div>
</div>
<!-- 전체 -->

<script type="text/javascript">
// 이름 클릭시 로그아웃 하시겠습니까 팝업 작동
function logout(){
  $('#logout-popup').show();
}

 // $('#logout-popup__yes_btn').click(function() {
 //
 // });
 $('#logout-popup__no_btn').click(function() {
    $('#logout-popup').hide();
 });
</script>


<?include "./tail.php"?>
