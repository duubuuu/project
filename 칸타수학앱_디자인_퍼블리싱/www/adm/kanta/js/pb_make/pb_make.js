
/* 버킷 URL 구하는 식 */
var bucketUrl = "";
var albumPhotosKey = encodeURIComponent("lec_vie") + "/";
s3.listObjects({ Prefix: albumPhotosKey }, function(err, data) {
  var href = this.request.httpRequest.endpoint.href;
  bucketUrl = href + albumBucketName + "/";
});

var table_init_flag = false;

var today = new Date();

var year = today.getFullYear(); // 년도
var month = ("0" + (today.getMonth() + 1)).slice(-2);
var date = ("0" + today.getDate()).slice(-2);
var day = ("0" + today.getDay()).slice(-2);  // 요일
var hours = ("0" + today.getHours()).slice(-2); // 시
var minutes = ("0" + today.getMinutes()).slice(-2);  // 분
var seconds = ("0" + today.getSeconds()).slice(-2);  // 초
var milliseconds = ("0" + today.getMilliseconds()).slice(-2); // 밀리초

/* Get Our Elements */
const player = document.querySelector('.player');
const video = player.querySelector('.viewer');
const toggle = player.querySelector('.toggle');
const skipButtons = player.querySelectorAll('[data-skip]');
const ranges = player.querySelectorAll('.player__slider');
const progress = player.querySelector('.progress');
const progressBar = player.querySelector('.progress__filled');


var current_sel_flag = 1; // 영상 선택시 선택시간 띄워줄건지 선택하게해주는 플래그

/* Build out functions */
function togglePlay() {
  const method = video.paused ? 'play' : 'pause';
  video[method]();
}

function updateButton() {
  const icon = video.paused ? '▶' : '❚❚'
  toggle.textContent = icon;
}

function skip() {
  video.currentTime += parseFloat(this.dataset.skip);
}

function handleRangeUpdate() {
  video[this.name] = this.value;
}

function handleProgress() {
  const percent = (video.currentTime / video.duration) * 100;
  progressBar.style.flexBasis = `${percent}%`;

  var now = Math.floor(video.currentTime);
  var minute = Math.floor(now/60);
  var second = now%60;

  if(String(minute).length == 1){
    minute = "0"+minute;
  }

  if(String(second).length == 1){
    second = "0"+second;
  }

  var current = minute+" : "+second;

  $(".now_duration").text(current);
}

function scrub(e) {

  if(e.target.className == "progress" || e.target.className == "progress__filled"){
    const scrubTime = (e.offsetX / progress.offsetWidth) * video.duration;
    video.currentTime = scrubTime;

    var now = Math.floor(video.currentTime);
    var minute = Math.floor(now/60);
    var second = now%60;

    console.log(video.currentTime);

    if(String(minute).length == 1){
      minute = "0"+minute;
    }

    if(String(second).length == 1){
      second = "0"+second;
    }

    var current = minute+"분 "+second+"초";



    var select_bar = (e.offsetX / progress.offsetWidth)*100;
    var arrow_box_left = (e.offsetX / progress.offsetWidth)*100 - 6.3;
    //alert((e.offsetX / progress.offsetWidth));


    if(current_sel_flag == 1){



      var temp_ob = {};
      var js_temp = {};

      temp_ob.selected_time = scrubTime;
      temp_ob.reg_time = date_rs();
      temp_ob.answer = " ";
      temp_ob.num = q_list_arr.length;

      if(q_list_arr.length == 0){
        q_list_arr[0] = temp_ob;
        js_temp = q_list_arr[0];
        console.log("0일때");
      }
      else{
        q_list_arr[q_list_arr.length] = temp_ob;
        js_temp = q_list_arr[(q_list_arr.length-1)];
        console.log("0아닐때 "+(q_list_arr.length-1));
      }



      q_list_arr.sort(function(a,b) {
           return parseFloat(a.selected_time) - parseFloat(b.selected_time);
      });


      for(var i=0; i<q_list_arr.length; i++){
        q_list_arr[i].num = i;
      }


      console.log(JSON.stringify(q_list_arr));

      if(question_list != null){
        console.log("있는곳 지나감");
        $(".progress").append("<div class='progress_selected' data-selected_time='"+js_temp.selected_time+"' data-num='"+js_temp.num+"' style='left:"+select_bar+"%;'></div>");

        if(table_init_flag == false){
          question_list.rows().remove().draw();
          table_init_flag = true;
        }

        //question_list.row.add(js_temp).draw();


        question_list.clear();

        for(var i=0; i<q_list_arr.length; i++){
          question_list.row.add(q_list_arr[i]).draw();
        }


      }
      else{
        console.log("없는곳 지나감");
      }



    }
  }
}

function duration_init(){

  var dura = Math.floor(video.duration);
  var minute = Math.floor(dura/60);
  var second = dura%60;

  var duration = minute+" : "+second;

  video_duration = video.duration;

  $(".all_duration").text(duration);
}

/* Hook up the event listeners */
video.addEventListener('click', togglePlay);
video.addEventListener('play', updateButton);
video.addEventListener('pause', updateButton);
video.addEventListener('timeupdate', handleProgress);

video.addEventListener('canplaythrough', duration_init);

toggle.addEventListener('click', togglePlay);



skipButtons.forEach(button => {
  button.addEventListener('click', skip);
});

ranges.forEach(range => {
  range.addEventListener('change', handleRangeUpdate);
  range.addEventListener('mousemove', handleRangeUpdate);
});

let mousedown = false;
progress.addEventListener('click', scrub);
progress.addEventListener('mousemove', e => {
  mousedown && scrub(e);
});
progress.addEventListener('mousedown', () => mousedown = true);
progress.addEventListener('mouseup', () => mousedown = false);



$(document).on('click', ".arrow_box", function(){

  if(!$(this).hasClass("video_on")){
    $(this).addClass("none");
  }
  else{
    $(this).removeClass("none");
  }
});




$.fn.dataTableExt.sErrMode = 'none';



var q_list_para = {

  dom : 'lf<t>p',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '목록이 없습니다.',
    infoEmpty: '',
    zeroRecords : "목록이 없습니다.",
    info:'현재 _PAGE_페이지 입니다',
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '내용 입력...',
    lengthMenu: '_MENU_ 개 보기',
    paginate: {
      next: '>',
      previous: '<'
    },

  },

  order: [[ 4, "desc" ]],

  // 검색 기능 숨기기
  searching: false,
  // 표시 건수기능 숨기기
  lengthChange: false,
  // 한 페이지에 표시되는 Row 수
  pageLength: 5,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : true,


  ajax : {
    "url":"./proc/pb_make/pb_question_proc.php",
    "type":"POST",
    "data": {},
    "async" : false
  },


  columns : [
    {data: "selected_time"},
    {data: "selected_time"},
    {data: "answer"},
    {data: "selected_time"},
    {data: "reg_time"}
  ],


  columnDefs : [
    {
      "targets"   : 0,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        if(data == ""){
          return "";
        }

        var html = "";
        html += "<input type='checkbox' class='question_chk' data-video_code='"+row.video_code+"' data-num='"+row.num+"'/>";


        return html;
      }
    },
    {
      "targets"   : 1,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        if(data == ""){
          return "";
        }

        var now = Math.floor(data);
        var minute = Math.floor(now/60);
        var second = now%60;

        var second_flag = 0;

        if(String(minute).length == 1){
          minute = "0"+minute;
        }

        if(String(second).length == 1){
          second = "0"+second;
        }

        if(isNaN(minute)){
          minute = "0";
        }

        if(isNaN(second)){
          second = "0";
          second_flag = "1";
        }

        var current = minute+"분 "+second+"초";

        var q_time_input = "";
            q_time_input += "<span class='q_time_span' data-num='"+row.num+"' data-video_name='"+row.video_name+"' data-video_code='"+row.video_code+"' data-selected_time='"+row.selected_time+"' data-url='"+row.video+"'>";
            q_time_input += "<input type='text' class='q_time_input q_time_minute' value='"+minute+"' data-num='"+row.num+"' data-video_name='"+row.video_name+"' data-video_code='"+row.video_code+"' data-selected_time='"+row.selected_time+"' data-url='"+row.video+"'/>";
            q_time_input += "<span style='margin:0px 5px;'>분</span>";
            q_time_input += "<input type='text' class='q_time_input q_time_second' value='"+second+"' data-num='"+row.num+"' data-video_name='"+row.video_name+"' data-video_code='"+row.video_code+"' data-selected_time='"+row.selected_time+"' data-url='"+row.video+"'/>";
            q_time_input += "<span style='margin:0px 5px;'>초</span>";
            q_time_input += "<div class='q_time_confirm' data-num='"+row.num+"' data-video_name='"+row.video_name+"' data-video_code='"+row.video_code+"' data-selected_time='"+row.selected_time+"'><i class='fas fa-check' aria-hidden='true'></i></div>";
            q_time_input += "</span>";

        var html = "";
        html += "<div class='time_selected' data-num='"+row.num+"' data-video_name='"+row.video_name+"' data-video_code='"+row.video_code+"' data-selected_time='"+row.selected_time+"' data-url='"+row.video+"'>"+current+"</div>";
        html += q_time_input;
        html += "<div class='q_time_repair' data-num='"+row.num+"' data-video_name='"+row.video_name+"' data-video_code='"+row.video_code+"' data-selected_time='"+row.selected_time+"'><i class='fas fa-tools' aria-hidden='true'></i></div>";
        return html;
      }
    },
    {
      "targets"   : 2,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        if(data == ""){
          return " ";
        }

        var answer = ""

        if(row.answer == "" || row.answer === undefined){
          answer = ""
        }
        else{
          answer = row.answer;
        }

        var html = "";
        html += "<div style='text-align:center;'>";
        html += "<input type='text'  value='"+answer+"' class='answer_input' data-num='"+row.num+"' data-video_name='"+row.video_name+"' data-video_code='"+row.video_code+"' style='display: inline-block;text-align:center;'/>";
        html += "</div>";

        return html;
      }
    },
    {
      "targets"   : 3,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        if(data == ""){
          return "";
        }

        return "<div class='btn btn-danger question_delete' data-num='"+row.num+"' data-video_code='"+row.video_code+"'><i class='fas fa-trash-alt'></i></div>";


        return html;
      }
    },
    {
      "targets"   : 4,
      "orderable" : false,
      "searchable": true,
      "className" : "center none", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        if(data == ""){
          return "";
        }

        return row.selected_time;

      }
    }

    ],



    initComplete: function(settings, json) {


      $(".progress_selected").remove();

      sleep(300).then(function(){



        console.log("question_list cnt :" + q_cnt);
        q_cnt++;
        var now = Math.floor(json.data.selected_time);
        var minute = Math.floor(now/60);
        var second = now%60;

        var second_flag = 0;

        if(String(minute).length == 1){
          minute = "0"+minute;
        }

        if(String(second).length == 1){
          second = "0"+second;
        }

        if(isNaN(minute)){
          minute = "0";
        }

        if(isNaN(second)){
          second = "0";
          second_flag = "1";
        }

        var current = minute+"분 "+second+"초";


        if(second_flag == 0){
          var select_bar = (now / video_duration)*100;
          var arrow_box_left = (now / video_duration)*100 - 6.3;
          //alert((e.offsetX / progress.offsetWidth));
          $(".progress").append("<div class='progress_selected' data-selected_time='"+now+"' data-num='"+json.data.num+"' style='left:"+select_bar+"%;'></div>");
        }



      });






      $(".pb_video_path").text(json.data[0].video_path);
      $(".pb_video_name").text(json.data[0].video_tag_name);
      let_pb_video_path = json.data[0].video_path;
      let_pb_video_name = json.data[0].video_tag_name;

    }




  };

  /* 데이터 테이블 */







  /* 이미지 리스트 */


  var pb_list = $("#pb_list").DataTable({

    dom : '<"pb_img_upload_input">f<t>p',
    // 표시 건수기능 숨기기
    language: {
      emptyTable: '데이터가 없습니다.',
      infoEmpty: '',
      info:'현재 _PAGE_페이지 입니다',
      zeroRecords : "등록된 문제가 없습니다.",
      //info: ' _TOTAL_ 개의 데이터가 있습니다.',
      search: '_INPUT_',
      searchPlaceholder: '내용 입력...',
      lengthMenu: '_MENU_ 개 보기',
      paginate: {
        next: '>',
        previous: '<'
      },

    },





    // 검색 기능 숨기기
    searching: true,
    // 표시 건수기능 숨기기
    lengthChange: true,
    // 한 페이지에 표시되는 Row 수
    pageLength: 8,
    processing:false,
    serverSide:false,
    responsive: true,
    ordering : false,


    ajax : {
      "url":"./proc/pb_make/pb.php",
      "type":"POST",
      "data": {"video_code": video_code}
    },


    columns : [
      {data : "pb_code"},
      {data : "pb_code"},
      {data: "pb_name"},
      {data: "reg_date", 'render': function ( data, type, row ) {

        if(data == 0){
          return '';
        }

        return data;
      }},
      {data: "num", 'render': function ( data, type, row ) {

        if(data == 0){
          return '';
        }

        return "<div class='btn btn-danger pb_delete' data-pb_code='"+row.pb_code+"' data-num='"+row.num+"'><i class='fas fa-trash-alt'></i></div>";
      }
    }
  ],


  columnDefs : [
    {
      "targets"   : 0,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "";

        html += "<input type='checkbox' class='pb_chk' data-pb_name='"+row.pb_name+"' data-pb_real_code='"+row.pb_real_code+"' data-pb_code='"+row.pb_code+"' data-num='"+row.num+"'/>";


        return html;
      }
    },
    {
      "targets"   : 1,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "";


        html += "<div style='text-align:center;'>";
        html += "<input type='text'  value='"+row.pb_code+"' class='img_code_input' data-img_code='"+row.pb_code+"' data-num='"+row.num+"' data-img_code='"+row.pb_code+"' data-img_name='"+row.pb_name+"'  style='display: inline-block;text-align:center;'/>";
        html += "<div style='display:none;'>"+row.pb_code+"</div>";
        html += "</div>";


        return html;
      }
    },
    {
      "targets"   : 2,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax


        if(row.reg_date == 0){
          return "없음";
        }

        var html = "";
        html += "<div class='img_url' data-img_real_code='"+row.pb_real_code+"' data-pb_answer='"+row.pb_answer+"' data-img_name='"+row.pb_name+"' data-url='"+row.img+"'>"+row.pb_name;
        html += "</div>";
        html +=    "<div class='pb_make_tooltip'>";
        html +=       "<span class='tooltiptext'><img src='"+row.img+"' class='pb_make_tooltip_img'/></span>";
        html +=       "<span class='tri'></span>";
        html +=    "</div>"
        return html;
      }
    }],



    initComplete: function(settings, json) {






    }




  });



  //new $.fn.dataTable.FixedHeader(pb_list);
  //$("div.pb_img_upload_input").append('<label for="img_input" class="img_input btn btn-info">문제 업로드</label>');












  /* 영상 커스텀 시간  리스트 */
  let question_list;
  var q_cnt = 0;

  function q_list(){

    question_list = $("#question_list").DataTable(q_list_para);


  }




  if(question_list != null){
    new $.fn.dataTable.FixedHeader(question_list);
  }
















  /* 정답 등록하는 테이블 */
  $(document).on("keyup", ".answer_input", function(){

    var num = $(this).data("num");
    var video_code =  $(this).data("video_code");
    var answer = $(this).val().trim();


    q_list_arr[num].answer = answer;
    console.log(q_list_arr[num].answer);

    /*


    if(make_complete_flag == false){

    var formdata = new FormData();

    formdata.append("num", num);
    formdata.append("video_code", video_code);
    formdata.append("answer", answer);


    $.ajax({
    type:"POST",
    url:"./proc/pb_make/answer_reg.php",
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

  $(".answer_input").each(function(){
  if($(this).data("num") == num ){
  $(this).removeClass("red_border");
  $(this).addClass("blue_border");
}
});

}
else if(data.rs == "fail"){
$(".answer_input").each(function(){
if($(this).data("num") == num ){
$(this).removeClass("blue_border");
$(this).addClass("red_border");
}
});
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
}


*/


});















/* 질문 등록하는 이미지 테이블 */
$(document).on("keyup", ".img_code_input", function(){

  var img_code = $(this).val().trim();
  var num = $(this).data("num");




  var formdata = new FormData();

  formdata.append("img_code", img_code);
  formdata.append("img_code", img_code);
  formdata.append("num", num);




  $.ajax({
    type:"POST",
    url:"./proc/pb_make/img_code_reg.php",
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

        $(".img_code_input").each(function(){
          if($(this).data("num") == num ){
            $(this).removeClass("red_border");
            $(this).addClass("blue_border");

            $(this).siblings("div").text(img_code);
          }
        });

      }
      else if(data.rs == "fail"){
        $(". _input").each(function(){
          if($(this).data("num") == num ){
            $(this).removeClass("blue_border");
            $(this).addClass("red_border");
          }
        });
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








function pb_make_complete_func(){


  var pb_code = $(".pb_code").val().trim();
  var pb_name = $(".pb_name").val().trim();
  var difficulty = $(".difficulty").val().trim();
  var pb_answer = $(".pb_answer_input").val().trim();


  var formdata = new FormData();

  formdata.append("pb_answer", pb_answer);
  formdata.append("video_code", video_code);
  formdata.append("img_real_code", img_real_code);
  formdata.append("pb_code", pb_code);
  formdata.append("pb_real_code", pb_real_code);
  formdata.append("pb_name", pb_name);
  formdata.append("difficulty", difficulty);
  formdata.append("selected_category_code", selected_category_code);
  formdata.append("img_name", let_img_name);
  formdata.append("img_path", let_img_path);

  $.ajax({
    type:"POST",
    url:"./proc/pb_make/pb_make_complete.php",
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

        s_confirm("문제가 생성되었습니다.");
        //swal("문제가 생성되었습니다.");
        //$(".loading_div").css("display","none");

        $(".cate_chk").each(function(i){
          if($(this).prop("checked")){

            var pb_name = $(".pb_name").val().trim();
            var pb_code = $(".pb_code").val().trim();

            var target_num = $(this).data("target_num");

            var cate_code = menu_code();

            var formdata = new FormData();

            formdata.append("cate_code", cate_code);
            formdata.append("pb_name", pb_name);
            formdata.append("type", cate_type);
            formdata.append("target_num", target_num);
            formdata.append("pb_code", pb_code);
            formdata.append("video_code", video_code);
            formdata.append("pb_real_code", pb_real_code);
            formdata.append("depth", '3');

            $.ajax({
              type:"POST",
              url:"./proc/pb_make/selected_cate_create.php",
              data : formdata,
              processData: false,
              contentType: false,
              async : false,

              beforeSend : function(){
                $(".loading_div").css("display","block");
              },

              success: function(data){



                var data = JSON.parse(data);

                if(data.rs == "success"){

                  selected_cate_create(data.num, pb_name, pb_code);


                }
                else if(data.rs == "fail"){
                  swal("등록에 실패하였습니다.");
                }
                else if(data.rs == "exist"){
                  //swal("이미 존재하는 항목이 포함되어 있습니다.");
                }
                else{
                  swal("오류가 발생하였습니다.");
                }

              },
              error: function(err) {
                alert("에러");
              }
            });



          }
        });

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

}




/* 문제생성 완료버튼 눌렀을때 */

$(".pb_make_complete").on('click', function(){



  make_complete_flag = true;




  var pb_code = $(".pb_code").val().trim();
  var pb_name = $(".pb_name").val().trim();
  var difficulty = $(".difficulty").val().trim();
  var pb_answer = $(".pb_answer_input").val().trim();



  if(pb_code == ""){
    swal("문제 코드를 입력 해 주세요.");
    return;
  }
  else if(pb_name == ""){
    swal("문제 이름을 입력해 주세요.");
    return;
  }
  else if(difficulty == ""){
    swal("난이도를 설정 해 주세요.");
    return;
  }

  if(img_real_code == ""){
    swal("이미지가 업로드되지 않았습니다.");
    return;
  }

  if(pb_answer == ""){
    swal("정답을 입력해주세요.");
    return;
  }

  addvideo("lec_vid");


});








// 업로드된 비디오 다이렉트 삭제
$(".pb_video_delete").on('click', function(){


  deletevid("lec_vid", "lec_vid/"+let_pb_video_name);


  var formdata = new FormData();


  formdata.append("video_code", video_code);


  $.ajax({
    type:"POST",
    url:"./proc/pb_make/pb_make_video_delete.php",
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
        question_list.ajax.reload();
        video_list.ajax.reload();
        $(".viewer").attr("src", "");
        swal("삭제되었습니다.");
        return;

      }
      else if(data.rs == "fail"){
        alert("삭제 실패하였습니다.");
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




// 질문 일괄 삭제 기능
$(".question_delete").on('click', function(){

  var num = $(this).data("num");

  q_list_arr.splice(num, 1);



  $(".question_delete").each(function(){
    if($(this).data("num") == num){
      console.log("werrwewer");
      $(this).closest("tr").remove();
    }
  });

  question_list.draw();


});





/* 문제리스트 전부 체크 기능 */

$(document).on('click', ".pb_all_chk", function(){
  if($(".pb_all_chk").prop("checked")){
    $(".pb_chk").prop("checked", true);
  }
  else{
    $(".pb_chk").prop("checked", false);
  }

});


/* 질문 전부 체크 기능 */

$(document).on('click', ".question_all_chk", function(){
  if($(".question_all_chk").prop("checked")){
    $(".question_chk").prop("checked", true);
  }
  else{
    $(".question_chk").prop("checked", false);
  }

});




/* 선택된 질문 혹은 영상구간 삭제 */

$(document).on('click', ".question_select_delete", function(){



  $(".question_chk").each(function(i){
    if($(this).prop("checked")){

        var num = $(this).data("num");

        question_list
        .row( $(this).parents('tr') )
        .remove()
        .draw();


        $(".progress_selected").each(function(){
            if($(this).data("num") == num){
              $(this).remove();
            }
        });

    }
  });



    //question_list.ajax.reload();


});




/* 카테고리 검색 */

$(".cate_search").on('keydown', function(e){

  if(e.keyCode == 13){

    var val = $(this).val().trim();

    $(".cate_2_name").each(function(){
      //console.log("반복문 들어옴 " + $(this).children("span.val_span").text() + "-----" + val);
      if($(this).children("span.val_span").text().match(val)){
        //console.log("네임값 들어옴 " + $(this).children("span.val_span").text());

        var parent = $(this).parent(".cate_2");

        $(this).parent(".cate_2").css("display","block");
        parent.siblings(".cate_2").css("display","block");
      }
    });


    $(".cate_3_name").each(function(){
      console.log("반복문 들어옴 " + $(this).children("span.val_span").text() + "-----" + val);
      if($(this).children("span.val_span").text().match(val)){
        console.log("네임값 들어옴 " + $(this).children("span.val_span").text());

        var parent_1 = $(this).closest(".cate_2");

        parent_1.css("display","block");

        var parent = $(this).parent(".cate_3");

        $(this).parent(".cate_3").css("display","block");
        parent.siblings(".cate_3").css("display","block");
      }
    });

  }
});




/* 카테고리 상위태그 전파 금지 */
$(document).on('click', ".cate_chk", function(e){
  e.stopPropagation();
});




/* 영상 이미지 삭제 */

$(".lec_video_delete").on('click', function(){

    $(".player__video").attr("src", "");
    $("#video_input").val("");
    $(".progress_selected").remove();
    $(".progress__filled").css("flex-basis", "0%");
    video.currentTime = 0;

    updateButton();

    if(question_list != null){
      question_list.ajax.reload();
      question_list.rows().remove().draw();
    }

    var html = "";
        html += '<label for="video_input" class="video_input_inside">';
        html +=  '<img src="/img/plus.png" class="lec_video_plus" style="" alt=" ">';
        html += '</label>';

    $(".player").prepend(html);
});

$(".pb_img_delete").on('click', function(){

  $(".pb_img_reg").remove();

    var html = "";
        html += "<label for='img_input' class='img_input_inside'>";
        html += "<img src='/img/plus.png' class='lec_img_plus'>";
        html += "</label>";

    $(".lec_img_zone").html(html);

    $("#img_input").val("");
});



/* 취소버튼 눌렀을때 */

$(".out__line-btn").on('click', function(){
    location.replace("/adm/kanta/pb_make.php");
});






/* 영상 속 구간 시간 설정 변경 */

$(document).on('click', '.q_time_repair', function(){

  var num = $(this).data("num");


  $(".q_time_span").each(function(){
      if(num == $(this).data("num")){
          $(this).css("display", "inline-block");
          $(this).siblings("div.time_selected").css("display", "none");
          $(this).siblings("div.q_time_repair").css("display", "none");
      }
  });



});




$(document).on('click', ".q_time_confirm", function(){

  var num = $(this).data("num");
  var q_time_minute = "";
  var q_time_second = "";

  var selected_time = "";




  $(".q_time_minute").each(function(){
      if(num == $(this).data("num")){
          q_time_minute = $(this).val().trim();
      }
  });


  $(".q_time_second").each(function(){
      if(num == $(this).data("num")){
         q_time_second = $(this).val().trim();
      }
  });


  selected_time = q_time_minute + "분" + q_time_second + "초";

  var repair_time = (Number(q_time_minute)*60) + Number(q_time_second);

  if(Number(repair_time) > video.duration){
    swal("영상 시간보다 길어 수정 할 수 없습니다.");
    return;
  }




  $(".q_time_span").each(function(){
      if(num == $(this).data("num")){
          $(this).css("display", "none");
          $(this).siblings("div.time_selected").text(selected_time);
          $(this).siblings("div.time_selected").css("display", "inline-block");
          $(this).siblings("div.q_time_repair").css("display", "inline-block");
      }
  });



  var select_bar = (repair_time / video.duration)*100;






  q_list_arr[num].selected_time = repair_time;

  console.log(q_list_arr);

  $(".progress_selected").each(function(){
      if($(this).data("num") == num){
          $(this).remove();

          $(".progress").append("<div class='progress_selected' data-selected_time='"+repair_time+"' data-num='"+num+"' style='left:"+select_bar+"%;'></div>");
          video.currentTime = repair_time;
      }
  });

});
