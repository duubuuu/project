

var lec_list;

function lec_list_func(num){

lec_list = $("#lec_list").DataTable({



  dom : "<'lec_delete_div'>tp", // t : 테이블,  p : 페이징 , f : 필터(검색창), select : div class 이름,


  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "수업 게시글이 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '검색하실 내용을 입력하세요.',
    lengthMenu: '_MENU_ 개 보기',
    paginate: {
      next: '>',
      previous: '<'
    },

  },


  // 검색 기능 숨기기
  searching: true,
  // 표시 건수기능 숨기기
  lengthChange: false,
  // 한 페이지에 표시되는 Row 수
  pageLength: 3,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : false,



  ajax : {
    "url":"./proc/student_manager/lec_table.php",
    "type":"POST",
    "data": {"num": num}
  },


  columns : [

    {data: "num", 'render': function ( data, type, row ) {

      var html = "";
          html += "<input data-num='"+row.num+"' data-pr_no='"+row.pr_no+"' type='checkbox' class='lec_chk' />";

      return html;
    }},
    {data: "pr_name", 'render': function ( data, type, row ) {

      var html = "";
          html +=   data;

      return html;
    }},
    {data: "give_date", 'render': function ( data, type, row ) {

      return data;

    }},
    {data: "give_date", 'render': function ( data, type, row ) {

      var html = "";

      if(row.pr_pf_rate == "100"){
         html += "수강완료";
      }
      else{
        html += "수강중";
      }

      return html;

    }},
    {data: "pr_pf_rate", 'render': function ( data, type, row ) {

      var html_temp = "";

      if(data == "" || data === undefined || data == null){
        html_temp += "0%";
      }
      else{
        html_temp += Math.floor(data)+"%";
      }

      var html = "";
          html +=   html_temp;


      return html;
    }}


  ],

    initComplete: function(settings, json) {



    }


  });


$(".lec_delete_div").append("<div class='lec_delete'>일괄 삭제</div>");

}







/* 시험내역 테이블 */

var exam_list;

function exam_list_func(num){

exam_list = $("#exam_list").DataTable({

  dom : "<'exam_delete_div'>tp", // t : 테이블,  p : 페이징 , f : 필터(검색창), select : div class 이름,


  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "수업 게시글이 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '검색하실 내용을 입력하세요.',
    lengthMenu: '_MENU_ 개 보기',
    paginate: {
      next: '>',
      previous: '<'
    },

  },


  // 검색 기능 숨기기
  searching: true,
  // 표시 건수기능 숨기기
  lengthChange: false,
  // 한 페이지에 표시되는 Row 수
  pageLength: 3,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : false,



  ajax : {
    "url":"./proc/student_manager/exam_table.php",
    "type":"POST",
    "data": {"num": num}
  },


  columns : [

    {data: "num", 'render': function ( data, type, row ) {

      var html = "";
          html += "<input type='checkbox' data-num='"+row.num+"' data-pr_no='"+row.pr_no+"' class='exam_chk' />";

      return html;
    }},
    {data: "pr_name", 'render': function ( data, type, row ) {

      var html = "";
          html +=   data;

      return html;
    }},
    {data: "give_date", 'render': function ( data, type, row ) {

      var html = "";

      if(row.pr_pf_rate == "100"){
         html += "수강완료";
      }
      else{
        html += "수강중";
      }

      return html;

    }},
    {data: "pr_pf_rate", 'render': function ( data, type, row ) {

      var html_temp = "";

      if(data == "" || data === undefined || data == null){
        html_temp += "0%";
      }
      else{
        html_temp += Math.floor(data)+"%";
      }

      var html = "";

      html +=   html_temp;


      return html;
    }},
    {data: "submited_time", 'render': function ( data, type, row ) {

      return data;

    }},
    {data: "score", 'render': function ( data, type, row ) {

      var data = Math.floor(data)+"점";

      return data;
    }},

    {data: "score", 'render': function ( data, type, row ) {

      var html = "";
          html = "<div data-pr_real_code='"+row.pr_real_code+"' data-pr_no='"+row.pr_no+"' data-stu_no='"+row.stu_no+"' data-num='"+row.num+"' class='exam_detail'>자세히보기</div>";

      return html;
    }}



  ],

    initComplete: function(settings, json) {



    }


  });


  $(".exam_delete_div").append("<div class='exam_delete'>일괄 삭제</div>");


}
