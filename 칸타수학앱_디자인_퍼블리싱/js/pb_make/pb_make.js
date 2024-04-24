
/* 버킷 URL 구하는 식 */
var bucketUrl = "";
var albumPhotosKey = encodeURIComponent("lec_vie") + "/";
s3.listObjects({ Prefix: albumPhotosKey }, function(err, data) {
  var href = this.request.httpRequest.endpoint.href;
  bucketUrl = href + albumBucketName + "/";
});



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
  const icon = video.paused ? '►' : '❚ ❚';
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


/* 데이터 테이블 */


var today = new Date();

var year = today.getFullYear(); // 년도
var month = ("0" + (today.getMonth() + 1)).slice(-2);
var date = ("0" + today.getDate()).slice(-2);
var day = ("0" + today.getDay()).slice(-2);  // 요일
var hours = ("0" + today.getHours()).slice(-2); // 시
var minutes = ("0" + today.getMinutes()).slice(-2);  // 분
var seconds = ("0" + today.getSeconds()).slice(-2);  // 초
var milliseconds = ("0" + today.getMilliseconds()).slice(-2); // 밀리초

/*
var table = $("#table").DataTable({

  dom : 'lf<t>Bp',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
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



  ajax : {
    "url":"./proc/pb_make/pb_make_proc.php",
    "type":"POST",

    "data": function (data) {

    }
  },


  columns : [

    {data: "Totprice"},
    {data: "payMethod"},
    {data: "buyerName"},
    {data: "buyerTel"},
    {data: "mb_id"},
    {data: "Time"}


  ]


});



new $.fn.dataTable.FixedHeader(table);


var count;
table.on( 'responsive-resize', function (e, datatable, columns) {
  count = columns.reduce( function (a,b) {
     return b === false ? a+1 : a;
 }, 0 );

 if(count > 0){
   $("table.dataTable.display tbody tr td:nth-child(1)").addClass("plus");
   $("table.dataTable.display tbody tr td:nth-child(1)").addClass("padding");
 }
 else{
   $("table.dataTable.display tbody tr td:nth-child(1)").removeClass("plus");
   $("table.dataTable.display tbody tr td:nth-child(1)").removeClass("padding");
 }
});



table.on( 'click', 'td',function () {
   if($(this).hasClass("plus")){
     $(this).addClass("minus");
     $(this).removeClass("plus");
   }
   else{
     if(count > 0){
       $(this).removeClass("minus");
      $(this).addClass("plus");
     }
   }
});



table.on( 'draw', function (e, datatable, columns) {
 if(count > 0){
   $("table.dataTable.display tbody tr td:nth-child(1)").addClass("plus");
   $("table.dataTable.display tbody tr td:nth-child(1)").addClass("padding");
 }
 else{
   $("table.dataTable.display tbody tr td:nth-child(1)").removeClass("plus");
   $("table.dataTable.display tbody tr td:nth-child(1)").removeClass("padding");
 }
});

// I instantiate the two datepickers here, instead of all at once like before.
// I also changed the dateFormat to match the format of the dates in the data table.
$("#startdate").datepicker({
  "dateFormat": "yy-mm-dd",
  "nextText": '<i class="fas fa-arrow-circle-right"></i>',
  "prevText": '<i class="fas fa-arrow-circle-left"></i>',
  "changeMonth": true,
  "showMonthAfterYear":true,
  "dayNames": ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
  "dayNamesMin": ['일', '월', '화', '수', '목', '금', '토'],
  "monthNamesShort": ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
  "monthNames": ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
  "onSelect": function(date) {  // This handler kicks off the filtering.
    minDateFilter = new Date(date).getTime();
    table.draw(); // Redraw the table with the filtered data.
  }
}).keyup(function() {
  minDateFilter = new Date(this.value).getTime();
table.draw();
});

$("#enddate").datepicker({
  "dateFormat": "yy-mm-dd",
  "nextText": '<i class="fas fa-arrow-circle-right"></i>',
  "prevText": '<i class="fas fa-arrow-circle-left"></i>',
  "changeMonth": true,
  "showMonthAfterYear":true,
  "dayNames": ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],
  "dayNamesMin": ['일', '월', '화', '수', '목', '금', '토'],
  "monthNamesShort": ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
  "monthNames": ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
  "onSelect": function(date) {
    maxDateFilter = new Date(date).getTime();
    table.draw();
  }
}).keyup(function() {
  maxDateFilter = new Date(this.value).getTime();
table.draw();
});

// The below code actually does the date filtering.
minDateFilter = "";
maxDateFilter = "";

$.fn.dataTableExt.afnFiltering.push(
  function(oSettings, aData, iDataIndex) {
    if (typeof aData._date == 'undefined') {
      aData._date = new Date(aData[5].trim()).getTime(); // Your date column is 3, hence aData[3].
    }

    if (minDateFilter && !isNaN(minDateFilter)) {
      if (aData._date < minDateFilter) {
        return false;
      }
    }

    if (maxDateFilter && !isNaN(maxDateFilter)) {
      if (aData._date > maxDateFilter) {
        return false;
      }
    }

    return true;
  }
);


*/







/* 영상 리스트 */


var video_list = $("#video_list").DataTable({

  dom : '<"video_upload_input">f<t>p',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "등록된 영상이 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '내용 입력...',
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
  pageLength: 5,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : false,

  ajax : {
    "url":"./proc/pb_make/pb_video.php",
    "type":"POST",
    "data": {"video_code": video_code}
  },


  columns : [

    {data: "video_name"},
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
                               return "<div class='btn btn-danger video_delete' data-video_name="+row.video_name+" data-video_code="+row.video_code+" data-num='"+row.num+"'><i class='fas fa-trash-alt'></i></div>";
                           }
    }
  ],


  columnDefs : [{
          "targets"   : 0,
          "orderable" : false,
          "searchable": true,
          "className" : "center", //칼럼에 클래스네임추가
          "render"    : function ( data, type, row ) { //row: ajax

                        if(row.reg_date == 0){
                            return "";
                        }

                        var html = "";
                            html = "<div class='video_url' data-album='lec_vid' data-video_name="+row.video_name+" data-video_code="+row.video_code+" data-url='"+row.video+"'>"+row.video_name+"</div>"

                        return html;
                    }
  }],


  initComplete: function(settings, json) {

      video_code = json.data[0].video_code;


  }


});



new $.fn.dataTable.FixedHeader(video_list);
$("div.video_upload_input").append('<label for="video_input"  class="video_input btn btn-success">비디오 업로드</label>');




/* 이미지 리스트 */


var img_list = $("#img_list").DataTable({

  dom : '<"img_upload_input">f<t>p',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "등록된 이미지가 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '내용 입력...',
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
  pageLength: 5,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : false,


  ajax : {
    "url":"./proc/pb_make/pb_img.php",
    "type":"POST",
    "data": {"video_code": video_code}
  },


  columns : [

    {data: "img_name", 'render': function ( data, type, row ) {

                                if(data == 0){
                                    return '';
                                }

                               return data;
                           }},
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

                               return "<div class='btn btn-danger img_delete' data-img_name="+row.img_name+" data-num='"+row.num+"'><i class='fas fa-trash-alt'></i></div>";
                           }
    }
  ],


  columnDefs : [{
          "targets"   : 0,
          "orderable" : false,
          "searchable": true,
          "colspan" : 3,
          "className" : "center", //칼럼에 클래스네임추가
          "render"    : function ( data, type, row ) { //row: ajax


                        if(row.reg_date == 0){
                          return "없음";
                        }

                        var html = "";
                            html = "<div class='img_url' data-img_name="+row.img_name+" data-url='"+row.img+"'>"+row.img_name+"</div>"

                        return html;
                    }
  }],



  initComplete: function(settings, json) {






  }




});



new $.fn.dataTable.FixedHeader(img_list);
$("div.img_upload_input").append('<label for="img_input" class="img_input btn btn-info">이미지 업로드</label>');












/* 질문 리스트 */
var question_list;
var q_cnt = 0;

function q_list(video_code){

question_list = $("#question_list").DataTable({

  dom : 'lf<t>p',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
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
  pageLength: 5,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : false,


  ajax : {
    "url":"./proc/pb_make/pb_question_proc.php",
    "type":"POST",
    "data": {"video_code": video_code}
  },


  columns : [

    {data: "selected_time"},
    {data: "question"},
    {data: "answer"},
    {data: "reg_date"},
    {data: "num", 'render': function ( data, type, row ) {
                               return "<div class='btn btn-danger question_delete' data-num='"+row.num+"' data-video_code='"+row.video_code+"'><i class='fas fa-trash-alt'></i></div>";
                           }
    }
  ],


  columnDefs : [{
    "targets"   : 0,
    "orderable" : false,
    "searchable": true,
    "className" : "center", //칼럼에 클래스네임추가
    "render"    : function ( data, type, row ) { //row: ajax

      if(row.reg_date == 0){
        return "없음";
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


      var html = "";
          html = "<div class='time_selected' data-num='"+row.num+"' data-video_name="+row.video_name+" data-video_code="+row.video_code+" data-selected_time='"+row.selected_time+"' data-url='"+row.video+"'>"+current+"</div>"

      return html;
    }
  }],



  initComplete: function(settings, json) {


    $(".progress_selected").remove();

    for(var i=0; i<json.data.length; i++){

      console.log("question_list cnt :" + q_cnt);
      q_cnt++;
      var now = Math.floor(json.data[i].selected_time);
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
        $(".progress").append("<div class='progress_selected' data-selected_time='"+now+"' data-num='"+json.data[i].num+"' style='left:"+select_bar+"%;'></div>");
      }

    }


  }


});



}

if(question_list != null){
  new $.fn.dataTable.FixedHeader(question_list);
}
