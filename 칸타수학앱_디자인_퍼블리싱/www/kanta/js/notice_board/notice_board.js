
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


  // dom : "<'select01'>f<'search_box'>tp",
  dom : "f<'search_box'>tp", // t : 테이블,  p : 페이징 , f : 필터(검색창), select : div class 이름,


  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "공지사항이 없습니다.",
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

    {data: "rownum"},
    {data: "title"},
    {data: "word"},
    {data: "mb_id", 'render': function ( data, type, row ) {

      var html = "";
      html += "<a href='/kanta/notice_board_content.php?num="+row.num+"'>"+data+"</a>";

      return html;
    }},
    {data: "reg_date", 'render': function ( data, type, row ) {

      var html = "";
      html += "<a href='/kanta/notice_board_content.php?num="+row.num+"'>"+data+"</a>";

      return html;
    }},

  ],

  columnDefs : [
    {
      "targets"   : 0,
      "orderable" : false,
      "searchable": true,
      "className" : "", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax


        var html = "";

        if(row.important != "true"){
          html += "<a href='/kanta/notice_board_content.php?num="+row.num+"'>"+row.rownum+"</a>";
        }
        else{
          html += "<a href='/kanta/notice_board_content.php?num="+row.num+"'><div class='important'>중요</div></a>";
        }


        return html;


      }
    },
    {
      "targets"   : 1,
      "orderable" : false,
      "searchable": true,
      "className" : "align_left", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "<a href='./notice_view.php?num="+row.num+"'>";
            html += row.title+"</a>";

        return html;


      }
    },
    {
      "targets"   : 2,
      "orderable" : false,
      "searchable": true,
      "className" : "none", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        return data;
      }
    }],


    initComplete: function(settings, json) {



    }


  });


  new $.fn.dataTable.FixedHeader(list);
  // $(".select01").html("<select class='notice_filtering'><option value='제목+본문'>제목+본문</option><option value='title'>제목</option><option value='word'>본문</option></select>");
  // $(".search_box").html("<div class='notice_search'><input type='text' class='notice_search_input'/><img src='/img/mobile/board_search_icon.png' class='search_icon' /></div>");
  $(".search_box").html("<button type='button' name='button' class='back-icon' id='back-icon' onclick='history.back();return;'><img src='../../../img/mobile/back_icon02.png' alt='뒤로가기블랙아이콘' style='width: 100%;'></button><div class='search_box_right'><div class='notice_filtering_div'><select class='notice_filtering'><option value='title_and_word' class='notice_option'>제목 + 본문</option><option value='title' class='notice_option'>제목</option><option value='word' class='notice_option'>본문</option></select></div><div class='notice_search'><input type='text' class='notice_search_input'/></div><div class='notice_search_icon'><img src='/img/mobile/board_search_icon.png' /></div></div>");


  // 위에서 추가한 select 클래스 에다가 셀렉트 태그를 넣습니다


  $(document).on( 'keyup', ".dataTables_filter label input", function(){

        var n_val = $(".notice_filtering").val();

        list.column(1).search("").draw();

        if(n_val == "title"){
            list.column(1).search(this.value).draw();
        }
        else if(n_val == "word"){
            list.column(2).search(this.value).draw();
        }



  });
