<?

include_once('./_common.php');
include_once('./head.php');



?>

<div class="top_nav" style="position: absolute; top: 14px;">
    <div class="inner">
        <span class="top_icon" onclick="history.back();">
            <img src="./img/icon_back.png" alt="이전으로가기" style="width:35px;max-width:unset;">
        </span>

    </div>
</div>


 <link href="/park/css/login/login.css?i=<?=$ranum?>" rel="stylesheet"></link>

<div class="main_inner">
  <div class="">
    <h1 class="main_title" style="text-align:center;">
      관리자 로그인
    </h1>

    <!-- 메인 인풋 세트 -->
    <div class="input_set" id="main_set">
      <div class="A">
        <input type="text" name="mb_id" class="mb_id" placeholder="관리자 아이디">
      </div>
      <div class="A">
        <input type="password" name="mb_password" class="mb_password" placeholder="관리자 비밀번호">
      </div>
      <button type="button" name="button" class="blue_btn login_btn" id="login_btn">로그인</button>

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




$(".blue_btn").on('click', function(){


  if($(".mb_id").val().trim() == ""){
    swal("아이디를 입력해주세요.");
    e.preventDefault();

    return;
  }
  else if(  (!$(".mb_id").val().trim().match(/[a-zA-Z0-9]*/gi) || $(".mb_id").val().trim().length < 7) ){

    if($(".mb_id").val().trim() != "admin"){
      swal("아이디는 6자 이상 영문, 숫자만 허용됩니다."+$(".mb_id").val().trim().length);
      e.preventDefault();
      return;
    }

  }
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



  var mb_id = $(".mb_id").val().trim();
  var mb_password = $(".mb_password").val().trim();


  var formdata = new FormData();
  formdata.append("mb_id", mb_id);
  formdata.append("mb_password", mb_password);


  $.ajax({
    type:"POST",
    url:"./proc/manager_login/manager_login_check.php",
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
        location.replace(data.link);

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





$(".main_logo").on('click', function(){
    window.park.camera_activity_move();
});

</script>








<script src="" ></script>


<?include "./tail.php"?>
