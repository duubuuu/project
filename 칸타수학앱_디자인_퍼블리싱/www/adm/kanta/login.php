<?

include_once('./_common.php');
$g5['title'] = "관리자 로그인";
include_once('./head.php');


if($member['mb_id'] == "admin"){
  alert("로그인되어 있습니다.", "/adm/kanta/pb_make.php");
  exit;
}

$adm_bg_path = preg_match("/\/upload_img\/.*/i", $cf_arr['adm_bg_path'], $path);
$adm_bg_name = $cf_arr['adm_bg_name'];

$bg_img_url = $path[0].$adm_bg_name;

?>
<title>관리자 로그인</title>

<link href="./css/login/login.css" rel="stylesheet"></link>

<style media="screen">
  body {
    display: flex;
    align-items: center;
  }
</style>


<div class="bg_img_div">

  <?if($cf_arr['adm_bg_chk'] == "on"){?>
    <img src="<?=$bg_img_url?>" class="bg_img"/>
  <?}?>

</div>

<!-- 로그인 -->
<div class="login wrap">



  <div class="kanta"></div>

<div id="header_m" style="">
  <div class="header none_back">
    <a  class="header_back" onclick="history.back();return false;" class="h_back">〈</a>

  </div>
</div>



  <div class="login_logo">
    <a href="/adm/kanta/pb_make.php">
      <img src="/img/logo.png" />
      <span class="logo_title">관리자</span>
    </a>
  </div>

  <div class="logo02">
    <a href="/kanta"><img src="img/app_icon.jpg" alt="식도락가 로고"></a>
  </div>
  <!--
  <form name="foutlogin" action="<?=G5_HTTPS_DOMAIN?>/bbs/login_check.php" onsubmit="return fhead_submit(this);" method="post" autocomplete="off" class="login_form">
  -->

  <form>

      <input type="text" name="mb_id" class="mb_id" value="admin" placeholder="이메일 입력">
      <input type="password" name="mb_password" value="1111" class="mb_password" placeholder="비밀번호 입력">

<!--
      <div class="login_if_auto chk_box">
          <input type="checkbox" name="auto_login" id="login_auto_login" class="selec_chk">
          <label for="login_auto_login"><span></span> 자동로그인</label>
      </div>
-->

      <input type="button" class="login_btn form_btn btn_submit" id="ol_submit" value="로그인"></a>


      <!--<p class="sns_description">SNS계정으로 간편하게 로그인하세요.</p>-->

      <!--
      <div class="sns_login flex">
        <a href="#" class="kakao_login"><img src="img/kakao_logo.png" alt="카카오톡 계정으로 로그인"></a>
        <a href="#" class="naver_login"><img src="img/naver_logo.png" alt="네이버 계정으로 로그인"></a>
        <a href="#" class="facebook_login"><img src="img/facebook_logo.png" alt="페이스북 계정으로 로그인"></a>
      </div>
    -->

  </form>




</div><!-- 전체 끝 -->


<script src="./js/jquery-3.3.1.min.js"></script>
<script src="/adm/kanta/common_js/swal/swal.js"></script>

<script>


$(".login_btn").on('click', function(){

  var mb_id = $(".mb_id").val().trim();
  var mb_password = $(".mb_password").val().trim();

  if(mb_id == "" || mb_password == ""){
    swal("아이디나 비밀번호가 올바르지 않습니다.");
    return;
  }


  var formdata = new FormData();
  formdata.append("mb_id", mb_id);
  formdata.append("mb_password", mb_password);

  $.ajax({
    type:"POST",
    url:"./proc/login/login_check.php",
    data : formdata,
    processData: false,
    contentType: false,


    beforeSend : function(){
      $(".loading_div").css("display","block");
    },

    success: function(data){

      $(".loading_div").css("display","none");

      var data = JSON.parse(data);

      if(data.rs == "success"){
        location.replace("/adm/kanta/pb_make.php");

      }
      else if(data.rs == "fail"){
        swal("아이디나 비밀번호가 올바르지 않습니다.");
      }
      else{
        alert("오류가 발생하였습니다.");
      }

    },
    error: function(err) {
      alert("에러");
    }
  });

});


</script>


<?include "./tail.php"?>
