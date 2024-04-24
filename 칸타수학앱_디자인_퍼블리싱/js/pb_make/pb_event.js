


$(document).on('click', '.video_delete, .img_delete, .question_delete', function(){
      var clas = $(this).attr("class");
      var num = $(this).data("num");
      var video_name = $(this).data("video_name");
      var img_name = $(this).data("img_name");
      var type = "";


      var formdata = new FormData();

      if(clas.match("video_delete")){
          type = "video";
          formdata.append("video_name", video_name);
      }
      else if(clas.match("img_delete")){
          type = "img";
          formdata.append("img_name", img_name);
      }
      else if(clas.match("question_delete")){
          type = "question";
      }


      formdata.append("type", type);
      formdata.append("num", num);

      $.ajax({
        type:"POST",
        url:"./proc/pb_make/delete.php",
        data : formdata,
        processData: false,
        contentType: false,
        async : false,

        beforeSend : function(){
            $(".loading_div").css("display","block");
        },

        success: function(data){

          $(".loading_div").css("display","none");

          var data = JSON.parse(data);

            if(data.rs == "success"){

              if(clas.match("video_delete")){
                  video_list.ajax.reload();
                  deletevid("lec_vid", "lec_vid/"+video_name);
                  console.log("video");
              }
              else if(clas.match("img_delete")){
                  img_list.ajax.reload();
                  deleteimg("lec_img", "lec_img/"+img_name);
                  console.log("img");
              }
              else if(clas.match("question_delete")){
                  question_list.ajax.reload();
                  console.log("question");

                  $(".progress_selected").each(function(){
                      if($(this).data("num") == num){
                        $(this).remove();
                      }
                  });
              }

            }
            else if(data.rs == "fail"){
              alert("등록에 실패하였습니다.");
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









/* 영상 셀렉트바 선택 클릭시 */

$(document).on('click', ".progress_selected", function(){

      var num = $(this).data("num");

      var selected_time = $(this).data("selected_time");
      console.log("선택된시간 : " + selected_time);
      video.currentTime = selected_time;


      $(".time_selected").each(function(){
          if($(this).data("num") == num){
              $(this).css("background", "#000077").css("color","#fff");
          }
          else{
              $(this).css("background", "unset").css("color","#000");
          }
      });

});





/* 데이터 테이블 영상시간 클릭시 이동 */

$(document).on('click', ".time_selected", function(){
    var selected_time = $(this).data("selected_time");
    console.log("선택된시간 : " + selected_time);
    video.currentTime = selected_time;
});
