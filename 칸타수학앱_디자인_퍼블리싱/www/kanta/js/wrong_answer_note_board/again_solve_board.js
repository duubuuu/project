
var varUA = navigator.userAgent.toLowerCase(); //userAgent 값 얻기
var pagelength = 4;

if ( varUA.indexOf('android') > -1 || varUA.indexOf("ipod") > -1 || varUA.indexOf("iphone") > -1) {
    //안드로이드
    pagelength = 5;
} else if ( varUA.indexOf("ipad") > -1 ) {
    //IOS
    pagelength = 9;
} else {
    //아이폰, 안드로이드 외
    pagelength = 9;
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
    zeroRecords : "오답노트 게시글이 없습니다.",
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
    "url":"./proc/notice_board/notice_board_proc.php",
    "type":"POST",
    "data": {}
  },


  columns : [

    {data: "num"},
    {data: "title"},
    {data: "mb_id"},
    {data: "reg_date"},

  ],




    initComplete: function(settings, json) {



    }


  });


  // new $.fn.dataTable.FixedHeader(list);
  // $(".select01").html("<select><option value='제목+본문'>제목+본문</option><option value='제목'>제목</option><option value='본문'>본문</option></select>");
  // $(".search_icon").html("<img src='/img/mobile/board_search_icon.png' style='width: 100%;'>");
  // 위에서 추가한 select 클래스 에다가 셀렉트 태그를 넣습니다
