
var varUA = navigator.userAgent.toLowerCase(); //userAgent 값 얻기
var pagelength = 4;

if ( varUA.indexOf('android') > -1 || varUA.indexOf("ipod") > -1 || varUA.indexOf("iphone") > -1) {
  //안드로이드
  pagelength = 5;
} else if ( varUA.indexOf("ipad") > -1 ) {
  //IOS
  pagelength = 10;
} else {
  //아이폰, 안드로이드 외
  pagelength = 10;
}


$.fn.dataTable.ext.errMode = 'none';


var list = $("#list").DataTable({

  sDom: 'lfr<"fixed_height"t>ip', // 테이블 바디 고정

  // dom : "<'select01'>f<'search_icon'>tp", // t : 테이블,  p : 페이징 , f : 필터(검색창), select : div class 이름,

  dom : "tp", // t : 테이블,  p : 페이징 , f : 필터(검색창), select : div class 이


  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "시험 게시글이 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '검색하실 내용을 입력하세요.',
    lengthMenu: '_MENU_ 개 보기',
    paginate: {
      next: '<div style="width: 2.4rem; margin: 0 auto;"><img src="../../../img/mobile/paginate_next.png" alt="페이징다음아이콘" style="width: 100%;"></div>',
      previous: '<div style="width: 2.4rem; margin: 0 auto;"><img src="../../../img/mobile/paginate_previous.png" alt="페이징이전아이콘" style="width: 100%;"></div>'
    },

  },


  // 검색 기능 숨기기
  searching: true,
  // 표시 건수기능 숨기기
  lengthChange: false,
  // 한 페이지에 표시되는 Row 수
  pageLength: pagelength,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : false,



  ajax : {
    "url":"./proc/exam_board/exam_board_proc.php",
    "type":"POST",
    "data": {}
  },


  columns : [

    {data: "give_date", 'render': function ( data, type, row ) {


      var html = "";

      html +=   data;


      return html;
    }},
    {data: "pr_name", 'render': function ( data, type, row ) {


      var html = "";

      html +=   data;


      return html;
    }},
    {data: "start_year", 'render': function ( data, type, row ) {

      var html_temp = "";

      if(data == "" || data === undefined || data == null){
        html_temp += "00:00";
      }
      else{
        html_temp += row.start_hour+":"+row.start_minute;
      }

      var html = "";

      html +=   html_temp;


      return html;
    }},
    {data: "end_year", 'render': function ( data, type, row ) {

      var html_temp = "";

      if(data == "" || data === undefined || data == null){
        html_temp += "00:00";
      }
      else{
        html_temp += row.end_hour+":"+row.end_minute;
      }

      var html = "";

      html +=   html_temp;


      return html;
    }},
    // {data: "pr_pf_rate", 'render': function ( data, type, row ) {
    //
    //   var html_temp = "";
    //
    //   if(data == "" || data === undefined || data == null){
    //     html_temp += "0%";
    //   }
    //   else{
    //     html_temp += Math.floor(data)+"%";
    //   }
    //
    //   var html = "";
    //
    //   html +=   html_temp;
    //
    //
    //   return html;
    // }},
    {data: "score", 'render': function ( data, type, row ) {


      if(row.submited == '0'){
        return "미제출";
      }

      var data = Math.floor(data)+"점";

      return data;
    }},
    {data: "pr_pf_rate"},
    {data: "pr_pf_rate"}

  ],



  columnDefs : [
    {
      "targets"   : 5,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "";

        var now_strtotime = row.now_strtotime;
        var end_strtotime = row.end_strtotime;
        var start_strtotime = row.start_strtotime;

        if(start_strtotime < now_strtotime && end_strtotime > now_strtotime){

          if(row.submited == "0"){

            if(row.exam_complete == "0"){
              html += "<a href='/kanta/exam.php?num="+row.num+"&pb_real_code="+row.pb_real_code+"&pr_real_code="+row.pr_real_code+"'>";
              html += "<div class='exam_chal'>";
              html += "응시하기";
              html += "</div>";
              html += "</a>";
            }
            else{
              html += "<a href='/kanta/exam.php?num="+row.num+"&pb_real_code="+row.pb_real_code+"&pr_real_code="+row.pr_real_code+"'>";
              html += "<div class='exam_complete'>";
              html += "응시완료";
              html += "</div>";
              html += "</a>";
            }

          }
          else{
            html += "<div class='time_over'>";
            html += "응시불가";
            html += "</div>";
          }

        }
        else{
          html += "<div class='time_over'>";
          html += "응시불가";
          html += "</div>";
        }

        return html;
      }
    },
    {
      "targets"   : 6,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "";
        html += "<a href='/kanta/again_solve_board.php?num="+row.num+"&pb_real_code="+row.pb_real_code+"&pr_real_code="+row.pr_real_code+"'>";
        html += "<div class='w_ans_view'>";
        html += "<span>";
        html += "보기";
        html += "</span>";
        html += "<span style='width: 2rem; margin-left: 0.5rem;'>";
        html += "<img src='../img/mobile/icon_zoom_in.png' alt='보기확대아이콘' style='width: 100%;'>";
        html += "</span>";
        html += "</div>";
        html += "</a>";

        return html;
      }
    }],


    initComplete: function(settings, json) {



    }


  });


  // new $.fn.dataTable.FixedHeader(list);
  // $(".select01").html("<select><option value='제목+본문'>제목+본문</option><option value='제목'>제목</option><option value='본문'>본문</option></select>");
  // $(".search_icon").html("<img src='/img/mobile/board_search_icon.png' style='width: 100%;'>");
  // 위에서 추가한 select 클래스 에다가 셀렉트 태그를 넣습니다
