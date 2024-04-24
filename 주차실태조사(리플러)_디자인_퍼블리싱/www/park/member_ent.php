<?

include_once('./_common.php');
include_once('./head.php');



$sql = "select distinct mb_local from g5_member where mb_id != 'admin'";
$rs = sql_query($sql);

?>



<title>초기화면</title>
 <link href="/park/css/member_ent/member_cnt.css?i=<?=$ranum?>" rel="stylesheet"></link>

<div class="main_inner">
  <div class="" style="width:98%;">


    <!-- 회원가입 세트 -->
    <div id="join_set" style="">
      <h1 class="main_title02">
        회원가입
      </h1>
      <div class="input_set">
        <p>이름</p>
        <div class="A">
          <input type="text" name="mb_name" class="mb_name" placeholder="이름 입력">
        </div>
        <p>연락처</p>
        <div class="A">
          <input type="text" name="mb_hp" class="mb_hp" placeholder="- 제외하고 입력해 주세요.">
        </div>
        <p>생년월일</p>
        <div class="A">
          <input type="text" name="mb_birth" class="mb_birth" placeholder="ex. 930421">
        </div>
        <p>조사지역</p>
        <div class="A">
          <select name="조사지역" class="mb_local">
            <option value="">조사지역 선택</option>

            <?while($row = sql_fetch_array($rs)){?>
              <option value="<?=$row['mb_local']?>"><?=$row['mb_local']?></option>
            <?}?>

          </select>
        </div>
        <button type="button" name="button" class="blue_btn">완료</button>
      </div>
    </div>
    <!-- 끝 -->

    <div class="main_lopark">
      <img src="./img/img_logo.png" alt="로고">
    </div>
  </div>
</div>






<script>
$('#login_btn').on("click",function(){
  $('#survey_set').show();
  $('#main_set').hide();
});
$('#loparkut_btn').on("click",function(){
  $('#main_set').show();
  $('#survey_set').hide();
});
$('#join_btn').on("click",function(){
  $('#join_set').show();
  $('#main_set').hide();
  $('.main_title').hide();
});


$(".blue_btn").on('click', function(e){



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
  else if(String(String($(".mb_birth").val().trim().replace(/[^0-9]*/gi,"")).match(/^[0-9]*/gi)).length != 6){
    swal("생일을 입력해주세요.");
    e.preventDefault();

    return;
  }
  else if($(".mb_local").val() == "" ){
    swal("지역을 선택해주세요.");
    e.preventDefault();

    return;
  }


  var mb_name = $(".mb_name").val().trim();
  var mb_hp = $(".mb_hp").val().trim();
  var mb_birth = $(".mb_birth").val().trim();
  var mb_local = $(".mb_local").val().trim();


  var formdata = new FormData();
  formdata.append("mb_name", mb_name);
  formdata.append("mb_hp", mb_hp);
  formdata.append("mb_birth", mb_birth);
  formdata.append("mb_local", mb_local);

  $.ajax({
    type:"POST",
    url:"./proc/member_ent/member_ent.php",
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


            var mb_name = data.mb_name;

            var mobile_chk = "<?=isMobile()?>";
            login_check(mb_name);




      }
      else if(data.rs == "fail"){
        swal("신청 실패하였습니다.");
      }
      else if(data.rs == "exist"){
        swal("이미 존재하는 연락처입니다.");
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









function login_check(mb_name){

  if(dev_login_check=='android'){
    if( window.park){
      var token = window.park.postPushToken();

      if(token != ""){

        $.ajax({
            type:"POST",
            dataType:"text",
            url: "/api/push_token_rev.php",
            async: true,
            data:{
                'mb_name': mb_name,
                'token': token,
            },
            success:function(data){

                s_confirm("가입신청이 완료되었습니다.", "/park/login.php");
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            },
            complete : function(){

            }
        });
      }
    }else{
        s_confirm("가입신청이 완료되었습니다.", "/park/login.php");
    }
  }else if(dev_login_check=='ios'){

    if(window.webkit ){

      window.webkit.messageHandlers.park.postMessage("token");
      return;

    }else{
        s_confirm("가입신청이 완료되었습니다.", "/park/login.php");
    }

  }
}


function testCallBack(token){

$.ajax({
    type:"POST",
    dataType:"text",
    url: "/api/push_token_rev.php",
    async: true,
    data:{
        'mb_name': mb_name,
        'token': token,
    },
    success:function(data){
        s_confirm("가입신청이 완료되었습니다.", "/park/login.php");

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
