<?

include_once("./_common.php");
include_once("./head.php");


if($is_member){
  header("location: /kanta/index.php");
  exit;
}


$user_bg_path = preg_match("/\/upload_img\/.*/i", $cf_arr['user_bg_path'], $path);
$user_bg_name = $cf_arr['user_bg_name'];

$bg_img_url = $path[0].$user_bg_name;

?>

<style>
    .content{
      max-width:10000px !important;
    }
</style>

<div class="bg_img_div">

  <?if($cf_arr['user_bg_chk'] == "on"){?>
    <img src="<?=$bg_img_url?>" class="bg_img"/>
  <?}?>

</div>

<div class="main">
  <!-- <a href="<? echo G5_HTTPS_DOMAIN.'/bbs/logout.php'?>">로그아웃</a> -->



  <form action="<?=G5_HTTPS_DOMAIN?>/bbs/stu_login_check.php" method="post" >

  <div class="login-inner">
    <div class="login-logo">
      <img src="../../../img/mobile/login_logo.png" alt="칸타로고" style="width: 100%;">
    </div>
    <!-- 로긴인풋들의 엄마 -->
    <div class="login-input-set">
      <!-- 여자캐릭터 -->
      <div class="" style="position: absolute;
    transform: translate(-50%, -50%);
    left: 94%;
    top: -13%;
    width: 22vh;
    min-width:200px;
    ">
        <img src="../../../img/mobile/login_girl.png" alt="여자" style="width: 100%;">
        </div>
        <!-- 여자손 -->
        <div class="" style="position: absolute;
      transform: translate(-50%, -50%);
      left: 94%;
      top: -13%;
      width: 22vh;
      min-width:200px;
      z-index: 999;">
          <img src="../../../img/mobile/login_girl_hand.png" alt="여자손" style="width: 100%;">
        </div>
      <div class="login-input">
        <span class="mgr7">ID</span>
        <input type="text" name="mb_id" value="test123">
      </div>
      <div class="login-input">
        <span>PW</span>
        <input type="password" name="mb_password" value="123123" style="font-family:none;text-indent:6px;">
      </div>
    </div>
    <!-- <p style="font-size: 2rem; text-align: right; letter-spacing: -0.28px;
    text-align: right;
    letter-spacing: -0.28px;
        padding: 3% 0 4%;">
      아이디와 비밀번호를 잊으셨나요?
    </p> -->
    <button class="login-button" type="submit">
      LOGIN
    </button>
  </div>

</form>


  <!-- 아이디나 비번 오류시 팝업 -->
  <div class="popup-box" id="login-error" style="display: none;">
    <div class="popup-box__icon">
    <img src="../../../img/mobile/info_icon.png" alt="느낌표아이콘" style="width: 100%;">
    </div>
    <p class="popup-box__comment">아이디 및 패스워드 오류입니다.</p>
    <button type="button" name="button" class="m-kanta-button kanta" id="login-error__ok_btn" style="color: #ffffff; margin: 0 auto; display: block;">확인</button>
  </div>
</div>
<!-- 전체 -->

<script type="text/javascript">
// 이름 클릭시 로그아웃 하시겠습니까 팝업 작동
/*
 $('.login-button').click(function() {
    $('#login-error').show();
    $('#login-error').addClass('shaking');
 });
 // $('#login-error__yes_btn').click(function() {
 //
 // });
 $('#login-error__ok_btn').click(function() {
    $('#login-error').hide();
 });
</script>


<?include "./tail.php"?>
