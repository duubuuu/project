




$(document).on('click', '.question_delete', function(){


      var clas = $(this).attr("class");
      var num = $(this).data("num");


      q_list_arr.splice(num, 1);


      $('.question_delete').each(function () {
        if($(this).data("num") == num){
          question_list
          .row( $(this).parents('tr') )
          .remove()
          .draw();
        }

      });

      $(".progress_selected").each(function(){
          if($(this).data("num") == num){
            $(this).remove();
          }
      });

      console.log(q_list_arr);


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
