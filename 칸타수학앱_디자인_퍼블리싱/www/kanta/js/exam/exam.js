function sleep(ms) {
  return new Promise((r) => setTimeout(r, ms))
}

answered_chk();

$("#elapsed-test__ok_btn").on('click',function(e){
    $("#elapsed-test").css("display","none");
});



$(".left_button").on('click',function(e){

  if((Number(img_list_now)-1) >= 0){

      img_list_now = Number(img_list_now)-1;

      var url_temp = img_url[img_list_now];


      $(".answered_view").val(answered_view[(img_list_now)]);

      $(".pb_img").attr("src", url_temp);
      $(".ex_chapter_now").text((img_list_now+1));
      $(".pb_code").text(pb_code[img_list_now]);

      ex_chapter_now = img_list_now;

      console.log("answered_view : "+answered_view[(img_list_now)]);
      console.log("pb_answer : "+pb_answer[(img_list_now)]);
      console.log("img_list_now : "+img_list_now);

    }
    else{

    }
});

$(".right_button").on('click',function(e){


  if((Number(img_list_now)+1) <= img_list_cnt){

      img_list_now = Number(img_list_now)+1;

      var url_temp = img_url[img_list_now];

      $(".answered_view").val(answered_view[(img_list_now)]);

      $(".pb_img").attr("src", url_temp);
      $(".ex_chapter_now").text((img_list_now+1));
      $(".pb_code").text(pb_code[img_list_now]);

      ex_chapter_now = img_list_now;

      console.log("answered_view : "+answered_view[(img_list_now)]);
      console.log("pb_answer : "+pb_answer[(img_list_now)]);
      console.log("img_list_now : "+img_list_now);

   }
   else{
     swal({
         text : "마지막 문제입니다.",
         icon : "warning"
     });
   }
});








$(document).on('click', function(e){

  var classname = e.target.className;

  console.log(classname);

  if(classname != "calculator" && classname != "calculator__correct_btn" && classname != "calculator__wrong_btn" && classname != "question-view-mom" && classname != "num-nav"
    && classname != "calculator__correct" && classname != "calculator__wrong" && classname != "calculator__button" && classname != "calculator__confirm_btn"&& classname != "calculator__confirm"){
    $(".calculator_div").css("display","none");
    $(".question-view-mom").css("display","none");
  }

  if(classname == "num-nav"){
      if(!$(this).hasClass("view_on")){
        $(this).addClass("view_on");

        $(".question-view-mom").css("display","block");

      }
      else{
        $(this).removeClass("view_on");

        $(".question-view-mom").css("display","none");

      }
  }

  if(classname == "pencilline"){
    if(!$(this).hasClass("pencil_on")){
      $(this).addClass("pencil_on");

      $(".calculator_div").css("display","block");
      calc_display = 1;
    }
    else{
      $(this).removeClass("pencil_on");

      $(".calculator_div").css("display","none");
      calc_display = 0;
    }
  }


});

/* 키패드 입력 */
var keypad_val = "";

$(".calculator__button").on('click', function(){
  var val = String($(this).data("val"));

  keypad_val += val;

  console.log(val);

  if(keypad_val.match(/[0-9\-\/]*/gi)){
    $(".calculator__answer").val(keypad_val);

  }

});






/* 번호클릭하여 문제 이동하는 칸 */

$(".question-view__button").on('click', function(){
    var num = $(this).data("num");

    ex_chapter_now = num;

    img_list_now = num;

    var url_temp = img_url[num];

    $(".ex_chapter_now").text((num+1));

    $(".answered_view").val(answered_view[num]);

    $(".pb_code").text(pb_code[num]);

    $(".pb_img").attr("src", url_temp);
});




var answer_input_flag = true;

$(".calculator__confirm").on('click', function(){

  var val = $(".calculator__answer").val().trim();

  answered_view[img_list_now] = val;
  $(".answered_view").val(val);

  console.log(answered_view);



  answered_chk();


  if(answer_input_flag == true){

    $(".success_mark").css("display","none");
    $(".error_mark").css("display","none");
    $(".ing_mark").css("display","none");


    console.log("정답"+val+"---------"+pb_answer[img_list_now]);



      $(".success_mark").css("display","block");
      sleep(2000).then(function(){
        $(".success_mark").css("display","none");
      });


      var ex_pb_pf_rate;

      ex_pb_pf_rate = (img_list_now/img_url.length)*100;


      var remain_time = (hour*3600)+(minute*60)+second;


      var formdata = new FormData();


      formdata.append("ex_pb_pf_rate", ex_pb_pf_rate);
      formdata.append("video_code", video_code[img_list_now]);
      formdata.append("pr_real_code", pr_real_code);
      formdata.append("pb_real_code", pb_real_code[img_list_now]);
      formdata.append("ex_chapter_now", img_list_now);
      formdata.append("remain_time", remain_time);
      formdata.append("num", pb_play_num[img_list_now]);

      formdata.append("pb_answer", pb_answer[img_list_now]);
      formdata.append("answered_view", answered_view[img_list_now]);

      if(pb_answer[img_list_now] == answered_view[img_list_now]){
          formdata.append("exam_correct", '1');
      }
      else{
          formdata.append("exam_correct", '0');
      }

      $.ajax({
        type:"POST",
        url:"./proc/exam/exam_pf_rate.php",
        data : formdata,
        processData: false,
        contentType: false,
        async : false,

        beforeSend : function(){
          $(".loading_div").css("display","block");
        },

        success: function(data){
            answer_input_flag = true;

        },
        error: function(err) {
          alert("에러");
        }
      });



    keypad_val = "";
    $(".calculator__answer").val("");

  }
  else{

    if((ex_chapter_now[img_list_now]/img_url.length) == 1){

      $(".completed_mark").css("display","block");
      sleep(3000).then(function(){
        $(".completed_mark").css("display","none");
      });
    }
    else{
      $(".ing_mark").css("display","block");
      sleep(3000).then(function(){
        $(".ing_mark").css("display","none");
      });
    }

    keypad_val = "";
    $(".calculator__answer").val("");

    answer_input_flag = true;

  }

});




var init_time = date_rs();

var hour = 0;
var minute = 60;
var second = 0;

$(".hour").text(z_a(hour));
$(".minute").text(z_a(minute));
$(".second").text(z_a(second));



function z_a(elem){
  elem = ("0" + elem).slice(-2);

  return elem;
}


function zero_chk(elem){
  if(Number(elem)-1 >= 0){
    elem = Number(elem)-1;
  }

  return elem;
}


var intervalID = setInterval(function(){



  if(hour == 0 && minute == 0 && second == 0){
    clearInterval(intervalID);

    $("#elapsed-test").css("display", "block");

    sleep(3000).then(function(){
        pb_submit();
    });
    return;
  }


    //console.log("시간 : "+ hour + "   분 : "+ minute+"   초 : "+ second);


    if(minute == 0 && second == 0){
      hour = zero_chk(hour);
      minute = zero_chk(minute);
      second = 60;
      minute = 59;
      //console.log("시 초기화 들어옴");

      $(".second").text(z_a(second));
      $(".minute").text(z_a(minute));
      $(".hour").text(z_a(hour));
    }

    if(second == 0){

      //console.log("분 초기화 들어옴");

      minute = zero_chk(minute);
      second = 60;

      $(".second").text(z_a(second));
      $(".minute").text(z_a(minute));
    }


    second = zero_chk(second);
    $(".second").text(z_a(second));



}, 1000);



$(".submission-button").on('click', function(){
  $("#submission01").css("display","block");
});



$("#submission01__yes_btn").on('click', function(){
    pb_sumbit();
});


$("#submission01__no_btn").on('click', function(){
    $("#submission01").css("display","none");
});


$("#submission02__ok_btn").on('click', function(){
    history.back();
});


function pb_sumbit(){
  var ex_pb_pf_rate="";
  ex_pb_pf_rate = (img_list_now/img_url.length)*100;

  var remain_time = (hour*3600)+(minute*60)+second;

  var pb_answer_arr = "";

  for(var i=0; i<pb_answer.length; i++){
      pb_answer_arr = pb_answer_arr + "::" + pb_answer[i];
  }

  pb_answer_arr = pb_answer_arr.replace("::", "");

  var answered_view_arr = "";

  for(var i=0; i<pb_answer.length; i++){
      answered_view_arr = answered_view_arr + "::" + answered_view[i];
  }

  answered_view_arr = answered_view_arr.replace("::", "");



  var formdata = new FormData();


  formdata.append("ex_pb_pf_rate", ex_pb_pf_rate);
  formdata.append("video_code", video_code[img_list_now]);
  formdata.append("pr_real_code", pr_real_code);
  formdata.append("pb_real_code", pb_real_code[img_list_now]);
  formdata.append("ex_chapter_now", img_list_now);
  formdata.append("remain_time", remain_time);
  formdata.append("num", pb_play_num[img_list_now]);
  formdata.append("pb_answer_arr", pb_answer_arr);
  formdata.append("answered_view_arr", answered_view_arr);


  $.ajax({
    type:"POST",
    url:"./proc/exam/exam_submit.php",
    data : formdata,
    processData: false,
    contentType: false,
    async : false,

    beforeSend : function(){
      $(".loading_div").css("display","block");
    },

    success: function(data){
        $("#submission01").css("display","none");
        $("#submission02").css("display","block");

        sleep(2000).then(function(){
            $("#submission02").css("display","none");
            history.back();
        });

    },
    error: function(err) {
      alert("에러");
    }
  });
}





function answered_chk(){
  for(var i=0; i<answered_view.length; i++){
     if(answered_view[i] != ""){
       $(".question-view__button").eq(i).addClass("answered");
     }
     else{
       $(".question-view__button").eq(i).removeClass("answered");
     }
  }
}
