<?php
include_once("../common.php");
include_once("head.php");
// include_once("header.php");

// if(!$is_member){
//     $_SESSION['redirect_url'] = "/homepage/new_inquiry.php";
//     alert("로그인이 되어있지 않습니다.","/");
// }

?>

<header>
    <div class="inner flex">
        <div class="logo">
            <!-- <a href="allin://action?data=https://tpgus7918.cafe24.com/homepage"> -->
            <a href="https://tpgus7918.cafe24.com/homepage/index.php#">
                <img src="./img/svg_logo.svg" alt="로고">
            </a>
        </div>
        <ul class="menu">
            <li class="menu_btn mr40">
                <a href="https://tpgus7918.cafe24.com/homepage/index.php#">
                    다운로드
                </a>
            </li>
            <li class="menu_btn">
                <a href="./alltnurs.php">
                    올트너스
                </a>
            </li>
        </ul>
    </div>
</header>



<form name="adv_form" id="adv_form" enctype="multipart/form-data" action="/homepage/ajax/ajax_proc.php"  method="post" autocomplete="off">

  <input type="hidden" name="work_mode" value="adv_ent">

<div class="inquiry">
  <div class="inner">
    <h1 class="main">
      제휴/광고 문의
    </h1>
    <div class="input_set_wrap">
      <div class="input_set flex">
        <div class="input_box">
          <p class="middle">
            성함
          </p>
          <div class="input_wrap">
            <input id="name" name="name" type="text" placeholder="성함을 입력해주세요.">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            이메일
          </p>
          <div class="input_wrap">
            <input id="email" name="email" type="text" placeholder="all_in@allin.com">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            연락처
          </p>
          <div class="input_wrap">
            <input id="phone" name="phone" type="text" placeholder="010 - 1234 - 5678">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            제목
          </p>
          <div class="input_wrap">
            <input id="title" name="title" type="text" placeholder="제목을 입력해주세요.">
          </div>
        </div>
        <div class="input_box wide">
          <p class="middle">
            문의 내용
          </p>
          <div class="input_wrap">
            <textarea class="content" name="content" maxlength="500" placeholder="문의 내용을 입력해주세요." rows="1"></textarea>
            <!-- <div class="limit">
                공백제외 [
                <span class="limit_num">
                    0
                </span>
                /500]
            </div> -->

            <!-- 공백포함 -->
            <div class="limit">
                [
                <span class="limit_num_s">
                    0
                </span>
                /500]
            </div>
          </div>
        </div>

      </div>
    </div>
    <button type="submit" class="more_btn">
        신청하기
    </button>
  </div>
</div>


</form>

<script>


$(".content").on('keyup', function(){

    var letter_all     = $(this).val();
    var letter_cnt     = 0;
    var letter_cnt_s   = 0;

    if(letter_all.length > 500){
      alert("문의내용은 500자를 넘을 수 없습니다.");
      return;
    }

    for(var i=0; i<letter_all.length; i++){
        if(letter_all[i].match(/\s/gi)){
            letter_cnt_s++;
        }
        else{
            letter_cnt_s++;
            letter_cnt++;
        }
    }

    // $(".limit_num").text(letter_cnt);
    $(".limit_num_s").text(letter_cnt_s);
});


$("#adv_form").submit(function(e){



  var name = $("#name").val().trim();
  var email = $("#email").val().trim();
  var phone = $("#phone").val().trim();
  var title = $("#title").val().trim();
  var content = $("#content").val().trim();


  if(name == ""){
    alert("성함을 입력해주세요.");
    $("#name").focus();
    return false;
  }

  if(email == ""){
    alert("이메일을 입력해주세요.");
    $("#email").focus();
    return false;
  }

  if(phone == ""){
    alert("휴대폰 번호를 입력해주세요.");
    $("#phone").focus();
    return false;
  }

  if(title == ""){
    alert("제목을 입력해주세요.");
    $("#title").focus();
    return false;
  }

  if(content == ""){
    alert("내용을 입력해주세요.");
    $("#content").focus();
    return false;
  }

  return true;

});



</script>
<?include "footer.php"?><!-- footer -->
