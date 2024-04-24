$(".daum_api_close").on('click', function(){
      $(".daum_api").css("display","none");
});



var width = window.innerWidth;
var height = window.innerHeight;

$(".address_btn").on('click',function(){

  var element_wrap = document.querySelector(".daum_api");


if(width < 576){
  daum.postcode.load(function(){
      new daum.Postcode({
          oncomplete: function(data) {
            $(".daum_api").css("display","none");
            $(".addr_1").val(data.address);

          },
          onresize : function(size) {
                      element_wrap.style.height = size.height+'px';
                  },
                  width : '100%',
                  height : '100%'
          }).embed(element_wrap);

          element_wrap.style.display = 'block';
    });
  }
  else{
    new daum.Postcode({
        oncomplete: function(data) {

            $(".addr_1").val(data.address);

        }
    }).open();
  }


});



var form_flag = true;
$("#s_reg").on('click',function(e){



  if(form_flag == true){

    form_flag = false;

    if($(".mb_id").val() == "" || !$(".mb_id").val().match(/[a-zA-Z0-9]*@[a-zA-Z0-9]*\.com|net|kr/gi)){
      swal("이메일을 입력해주세요. .com, .net, .kr 만 허락됩니다.");
      e.preventDefault();
      return;
    }
    else if($(".mb_name").val() == "" || $(".mb_name").val().length != 3){
      swal("이름을 입력해주세요, 이름은 3글자입니다.");
      e.preventDefault();
      return;
    }
    else if($(".mb_password").val() == "" || !$(".mb_password").val().match(/[a-z0-9]{8}/gi)){
      swal("비밀번호를 입력해주세요, 비밀번호는 영문숫자 최소 8자 이상입니다.");
      e.preventDefault();
      return;
    }
    else if($(".mb_password_re").val() == ""){
      swal("비밀번호 확인을 입력해주세요");
      e.preventDefault();
      return;
    }
    else if(!$(".mb_id").val().match(/[a-zA-Z0-9_-]*@[a-zA-Z]*\.[com|net|kr]*/gi)){
      swal("아이디 형식이 맞지 않습니다.");
      e.preventDefault();
      return;
    }
    else if(!$(".mb_password").val().match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/gi)){
      swal("비밀번호는 영문 숫자 특수문자를 포함해서 입력해주세요.");
      e.preventDefault();
      return;
    }
    else if(!$(".mb_password_re").val().match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/gi)){
      swal("비밀번호 확인은 영문 숫자 특수문자를 포함해서 입력해주세요");
      e.preventDefault();
      return;
    }
    else if($(".mb_password").val() != $(".mb_password_re").val()){
      swal("비밀번호와 비밀번호 확인이 일치하지 않습니다.");
      e.preventDefault();
      return;
    }

    var mb_id = $(".mb_id").val();
    $(".mb_email").val(mb_id);

    $(".loading_div").css("display","block");

  }
  else if(form_flag == false){
    form_flag = true;
    e.preventDefault();
    return false;
  }

});
