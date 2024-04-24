

var today = new Date();

var year = today.getFullYear(); // 년도
var month = ("0" + (today.getMonth() + 1)).slice(-2);
var date = ("0" + today.getDate()).slice(-2);
var day = ("0" + today.getDay()).slice(-2);  // 요일
var hours = ("0" + today.getHours()).slice(-2); // 시
var minutes = ("0" + today.getMinutes()).slice(-2);  // 분
var seconds = ("0" + today.getSeconds()).slice(-2);  // 초
var milliseconds = ("0" + today.getMilliseconds()).slice(-2); // 밀리초

/* 이미지 리스트 */


var pb_list = $("#pb_list").DataTable({

  dom : '<"pb_img_upload_input">ftp',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "등록된 문제가 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '문제 검색...',
    lengthMenu: '_MENU_ 개 보기',
    paginate: {
      next: '>',
      previous: '<'
    },

  },



  buttons: [
    {
      extend: 'excel',
      charset: 'UTF-8',
      bom: true,
      filename: year+""+month+""+date+""+hours+""+minutes+""+seconds+"-excel",
      title: year+""+month+""+date+""+hours+""+minutes+""+seconds+"-excel"
    },

    {
      extend: 'pdf',
      charset: 'UTF-8',
      bom: true,
      filename: year+""+month+""+date+""+hours+""+minutes+""+seconds+"-pdf",
      title: year+""+month+""+date+""+hours+""+minutes+""+seconds+"-pdf"
    }
  ],



  // 검색 기능 숨기기
  searching: true,
  // 표시 건수기능 숨기기
  lengthChange: true,
  // 한 페이지에 표시되는 Row 수
  pageLength: 10,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : false,


  ajax : {
    "url":"./proc/pb_make_list/pb.php",
    "type":"POST",
    "data": {}
  },


  columns : [
    {data : "pb_code"},
    {data : "pb_code"},
    {data: "pb_name"},
    {data: "reg_date", 'render': function ( data, type, row ) {


      return "<div class='pointer' style='padding:10px 0px'>"+data+"</div>";
    }},
    {data: "num", 'render': function ( data, type, row ) {


        var html = "";
            html += "<a href='/adm/kanta/pb_repair.php?pb_code="+row.pb_real_code+"' style='margin-right:5px;'>";
            html += "<div class='btn btn-primary'><i class='fas fa-tools'></i></div>";
            html += "</a>";
            html += "<div class='btn btn-danger pb_delete' data-video_name='"+row.video_name+"' data-video_code='"+row.video_code+"' data-pb_code='"+row.pb_code+"' data-num='"+row.num+"'><i class='fas fa-trash-alt'></i></div>";

      return html;
    }},
    {data: "pb_name"}
],


columnDefs : [
  {
    "targets"   : 0,
    "orderable" : false,
    "searchable": true,
    "className" : "center pointer", //칼럼에 클래스네임추가
    "render"    : function ( data, type, row ) { //row: ajax

      var html = "";
      html += "<input type='checkbox' class='pb_chk' data-video_code='"+row.video_code+"' data-pb_name='"+row.pb_name+"' data-pb_real_code='"+row.pb_real_code+"' data-pb_code='"+row.pb_code+"' data-num='"+row.num+"'/>";


      return html;
    }
  },
  {
    "targets"   : 1,
    "orderable" : false,
    "searchable": true,
    "className" : "center pointer", //칼럼에 클래스네임추가
    "render"    : function ( data, type, row ) { //row: ajax

      var html = "";

      html +=   "<div style='text-align:center;'>";
      html +=     "<input type='text'  value='"+row.pb_code+"' class='img_code_input' data-img_code='"+row.pb_code+"' data-num='"+row.num+"' data-img_code='"+row.pb_code+"' data-img_name='"+row.pb_name+"'  style='display: inline-block;text-align:center;'/>";
      html +=     "<div style='display:none;'>"+row.pb_code+"</div>";
      html +=   "</div>";


      return html;
    }
  },
  {
    "targets"   : 2,
    "orderable" : false,
    "searchable": true,
    "className" : "center pointer", //칼럼에 클래스네임추가
    "render"    : function ( data, type, row ) { //row: ajax




      var html = "";
      html += "<a href='/adm/kanta/pb_repair.php?pb_code="+row.pb_real_code+"'>";
      html += "<div class='img_url' data-img_real_code='"+row.pb_real_code+"' data-pb_answer='"+row.pb_answer+"' data-img_name='"+row.pb_name+"' data-url='"+row.img+"'>"+row.pb_name;
      html += "</div>";
      html += "</a>";
      //html +=    "<div class='pb_make_tooltip'>";
      //html +=       "<span class='tooltiptext'><img src='"+row.img+"' class='pb_make_tooltip_img'/></span>";
      //html +=       "<span class='tri'></span>";
      //html +=    "</div>"
      return html;
      }
    },
    {
      "targets"   : 5,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "";
        html += "<div class='img_url' data-img_real_code='"+row.pb_real_code+"' data-pb_answer='"+row.pb_answer+"' data-img_name='"+row.pb_name+"' data-url='"+row.img+"'>미리보기";
        html += "</div>";
        html +=    "<div class='pb_make_tooltip'>";
        html +=       "<span class='tooltiptext'><img src='"+row.img+"' class='pb_make_tooltip_img'/></span>";
        html +=       "<span class='tri'></span>";
        html +=    "</div>"
        return html;

      }}
    ],



  initComplete: function(settings, json) {






  }




});



new $.fn.dataTable.FixedHeader(pb_list);
//$("div.pb_img_upload_input").append('<label for="img_input" class="img_input btn btn-info">문제 업로드</label>');
$("div#pb_list_filter label").append("<img src='/img/search.png' style='position:absolute; right:6px; top:7px;'/>");























/* 질문 등록하는 테이블 */
$(document).on("keyup", ".answer_input", function(){

  var num = $(this).data("num");
  var video_code =  $(this).data("video_code");
  var answer = $(this).val().trim();

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


});




/* 비디오 이름 수정 */


/* 질문 등록하는 테이블 */
$(document).on("keyup", ".video_tag_name_input", function(){

  var video_tag_name = $(this).val().trim();
  var num = $(this).data("num");
  var video_code = $(this).data("video_code");



  var formdata = new FormData();

  formdata.append("video_tag_name", video_tag_name);
  formdata.append("num", num);
  formdata.append("video_code", video_code);



  $.ajax({
    type:"POST",
    url:"./proc/pb_make/video_tag_name_reg.php",
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

        $(".video_tag_name_input").each(function(){
          if($(this).data("num") == num ){
            $(this).removeClass("red_border");
            $(this).addClass("blue_border");

            $(this).siblings("div").text(video_tag_name);
          }
        });

      }
      else if(data.rs == "fail"){
        $(".video_tag_name_input").each(function(){
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






/* 문제리스트 전부 체크 기능 */

$(document).on('click', ".pb_all_chk", function(){
  if($(".pb_all_chk").prop("checked")){
      $(".pb_chk").prop("checked", true);
  }
  else{
      $(".pb_chk").prop("checked", false);
  }

});





/* 호버시 제트 인덱스 변환 */

$(document).on('mouseenter', ".img_url", function(){
    $("#pb_list tbody tr").each(function(i){
        $(this).css("position", "relative").css("z-index", -(i+1));
    });
});
