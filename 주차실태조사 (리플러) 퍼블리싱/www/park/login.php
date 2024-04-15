<?

include_once('./_common.php');
include_once('./head.php');


if($s_member['mb_name'] != ""){
  alert("이미 로그인되어 있습니다.", "/park/search_type_select.php");
  exit;
}



?>



<title>초기화면</title>
 <link href="/park/css/login/login.css?i=<?=$ranum?>" rel="stylesheet"></link>

<div class="main_inner">
  <div class="">
    <h1 class="main_title">
      주차수급<br>실태조사를<br>시작합니다
    </h1>

    <!-- 메인 인풋 세트 -->
    <div class="input_set" id="main_set">
      <div class="A">
        <input type="text" name="mb_name" class="mb_name" placeholder="사용자명">
      </div>
      <div class="A">
        <input type="text" name="mb_hp" class="mb_hp" placeholder="연락처">
      </div>
      <button type="button" name="button" class="blue_btn login_btn" id="login_btn">로그인</button>
      <button type="button" name="button" class="manager_login_btn" id="login_btn" onclick="location.replace('/park/manager_login.php');">관리자 로그인</button>
      <a href="/park/member_ent.php" ><button type="button" name="button" class="white_btn mb_join_btn" id="join_btn">회원가입</button></a>
    </div>
    <!-- 끝 -->

    <!-- 로그인 - 조사선택 세트 -->
    <div class="input_set" id="survey_set" style="display: none;">
      <button type="button" name="button" class="sky_btn">
        <a href="survey1_1.php">부설·노외주차 조사</a>
      </button>
      <button type="button" name="button" class="blue_btn">노상주차 조사</button>
      <button type="button" name="button" class="white_btn" id="logout_btn">로그아웃</button>
    </div>
    <!-- 끝 -->

    <div class="main_logo">
      <img src="./img/img_logo.png" alt="로고">
    </div>
  </div>

  <!-- 미승인 사용자 로그인시, 팝업 -->

<div class="login_deny_popup_back">
   <div class="login_deny_popup swal2-show">
      <div class="icon width35">
          <img src="../img/icon_danger.png" alt="경고아이콘">
      </div>
      <div class="deny_font_bold">
          승인되지 않은 접근입니다.<br>
          회원가입 후,<br>
          아래의 연락처로 승인요청바랍니다.
      </div>
      <div class="deny_phone_mail">
        <a style="color:#a0a0a0;" href="tel:02-3402-1043"><span class="tel_link_copy" data-clipboard-text="02-3402-1043">Tel. 02-3402-1043</span></a><br>
        <span class="mail_link_copy" data-clipboard-text="tyrnd@hanmail.net">E-mail : tyrnd@hanmail.net</span>
      </div>
  </div>
</div>

</div>



<div class="toast_div">
    <div class="toast"></div>

</div>

<script>

/*
$('#login_btn').on("click",function(){
  $('#survey_set').show();
  $('#main_set').hide();
});
$('#logout_btn').on("click",function(){
  $('#main_set').show();
  $('#survey_set').hide();
});
$('#join_btn').on("click",function(){
  $('#join_set').show();
  $('#main_set').hide();
  $('.main_title').hide();
});
*/

var ajax_mb_name = "";
var ajax_unique_code = "";


$(".blue_btn").on('click', function(){


  if($(".mb_name").val().trim() == "" || !String($(".mb_name").val().trim()).match(/^[가-힣]{2,4}$/gi) ){
    swal("이름을 입력해주세요,\n이름은 2~4글자입니다.");
    e.preventDefault();

    return;
  }
  /*
  else if($(".mb_password").val() == "" || !$(".mb_password").val().match(/[a-z0-9]{8}/gi)){
    swal("비밀번호를 입력해주세요, 비밀번호는 영문숫자 최소 8자 이상입니다.");

    e.preventDefault();
    return;
  }
  else if(!$(".mb_password").val().match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/gi)){
    swal("비밀번호는 영문 숫자 특수문자를 포함해서 입력해주세요.");
    e.preventDefault();

    return;
  }
  */
  else if(String(String($(".mb_hp").val().trim().replace(/[^0-9]*/gi,"")).match(/^[0-9]*/gi)).length != 11 && String(String($(".mb_hp").val().trim().replace(/[^0-9]*/gi,"")).match(/^[0-9]*/gi)).length != 10){
    swal("휴대폰 번호를 입력해주세요.");
    e.preventDefault();

    return;
  }


  var mb_name = $(".mb_name").val().trim();
  var mb_hp = $(".mb_hp").val().trim();


  var formdata = new FormData();
  formdata.append("mb_name", mb_name);
  formdata.append("mb_hp", mb_hp);


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
        //location.replace(data.link);


        ajax_mb_name = data.mb_name;
        ajax_unique_code = data.unique_code;


        var mobile_chk = "<?=isMobile()?>";
        login_check();

      }
      else if(data.rs == "fail"){
        swal("이름이나 연락처가 올바르지 않습니다.");
      }
      else if(data.rs == "not_allowed"){
        //swal("관리자 승인이 완료되지 않았습니다.");

        $(".login_deny_popup_back").css("display", "block");
      }
      else{
        alert("오류가 발생하였습니다.");
      }

    },
    error: function(err) {
      alert("에러");
      $(".loading_div").css("display","none");
    }
  });

});



$(document).on('click', function(e){

    var classname = e.target.className;


    if(classname == "login_deny_popup_back"){
      $(".login_deny_popup_back").css("display", "none");
    }

});


/* 클립보드 데이터 복사 */
var tel_clipboard = new Clipboard('.tel_link_copy');
var mail_clipboard = new Clipboard('.mail_link_copy');
tel_clipboard.on('success', function(e) {

  $(".toast_div").css("opacity","1");

  if(dev_login_check=='android'){
    console.log("Success");
    $(".toast").text("연락처가 복사되었습니다.");
    $(".toast_div").css("display","block");

    sleep(2300).then(function(){

      $(".toast_div").css("opacity","0");

      sleep(3500).then(function(){
        $(".toast_div").css("display","none");
      });
    });
    //swal("복사되었습니다.");
    /*
    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
    */
  }
  else if(dev_login_check=='ios'){
    console.log("Success");
    $(".toast").text("연락처가 복사되었습니다.");
    $(".toast_div").css("display","block");

    sleep(2300).then(function(){

      $(".toast_div").css("opacity","0");

      sleep(3500).then(function(){
        $(".toast_div").css("display","none");
      });
    });


    //swal("복사되었습니다.");
     /*
    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
    */
  }
  else{
    console.log("Success");
    $(".toast").text("연락처가 복사되었습니다.");
    $(".toast_div").css("display","block");

    sleep(2300).then(function(){

      $(".toast_div").css("opacity","0");

      sleep(3500).then(function(){
        $(".toast_div").css("display","none");
      });
    });
    //swal("복사되었습니다.");
    /*
    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
    */
  }

});
tel_clipboard.on('error', function(e) {
  alert("다시 시도해주세요.");
    console.log("Fail");
});


mail_clipboard.on('success', function(e) {

  $(".toast_div").css("opacity","1");

  if(dev_login_check=='android'){
    console.log("Success");
    $(".toast").text("메일이 복사되었습니다.");
    $(".toast_div").css("display","block");

    sleep(2300).then(function(){

      $(".toast_div").css("opacity","0");

      sleep(3500).then(function(){
        $(".toast_div").css("display","none");
      });
    });
    //swal("복사되었습니다.");
    /*
    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
    */
  }
  else if(dev_login_check=='ios'){
    console.log("Success");
    $(".toast").text("메일이 복사되었습니다.");

    $(".toast_div").css("display","block");

    sleep(2300).then(function(){

      $(".toast_div").css("opacity","0");

      sleep(3500).then(function(){
        $(".toast_div").css("display","none");
      });
    });
    //swal("복사되었습니다.");
     /*
    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
    */
  }
  else{
    console.log("Success");
    $(".toast").text("메일이 복사되었습니다.");
    $(".toast_div").css("display","block");

    sleep(2300).then(function(){

      $(".toast_div").css("opacity","0");

      sleep(3500).then(function(){
        $(".toast_div").css("display","none");
      });
    });
    //swal("복사되었습니다.");
    /*
    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
    */
  }

});
mail_clipboard.on('error', function(e) {
  alert("다시 시도해주세요.");
    console.log("Fail");
});





function login_check(){


  if(dev_login_check=='android'){
    if( window.park){
      console.log("window_park 지나옴");

      var token = window.park.postPushToken();

      if(token != ""){

        $.ajax({
            type:"POST",
            dataType:"text",
            url: "/api/push_token_rev.php",
            async: true,
            data:{
                'mb_name': ajax_mb_name,
                'unique_code' : ajax_unique_code,
                'token': token,
            },
            success:function(data){

                location.replace("/park/search_type_select.php");

            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            },
            complete : function(){

            }
        });
      }
    }else{
        location.replace("/park/search_type_select.php");
    }
  }else if(dev_login_check=='ios'){

    if(window.webkit ){

      window.webkit.messageHandlers.park.postMessage("token");
      return;

    }else{
        location.replace("/park/search_type_select.php");
    }

  }
  else{
    location.replace("/park/search_type_select.php");
  }
}


function testCallBack(token){


  //alert(mb_name);

$.ajax({
    type:"POST",
    dataType:"text",
    url: "/api/push_token_rev.php",
    async: true,
    data:{
        'mb_name': ajax_mb_name,
        'unique_code' : ajax_unique_code,
        'token': token,
    },
    success:function(data){

        location.replace("/park/search_type_select.php");

    },
    error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
    },
    complete : function(){

    }
});
}





</script>








<script src="" ></script>


<?include "./tail.php"?>
