var list = $("#list").DataTable({
  // dom : 'fl<"pr_delete_btn">tp',
  dom : 'ltp', //필터삭제

  // dom : 'fl<"selected_q2">tp', 백업희영 6/22
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "등록된 항목이 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '',
    lengthMenu: '_MENU_ 개 보기',
    paginate: {
      next: '<img src="img/icon_paging_right.png" alt="페이징왼쪽" style="width:50px;">',
      previous: '<img src="img/icon_paging_left.png" alt="페이징왼쪽" style="width:50px;">'
    },

  },



  order: [[ 1, "asc" ]],

  // 검색 기능 숨기기
  searching: true,
  // 표시 건수기능 숨기기
  lengthChange: false,
  // 한 페이지에 표시되는 Row 수
  pageLength: 3,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : true,

  ajax : {
    "url":"./proc/cscenter_sub/cscenter_sub.php",
    "type":"POST",
    "data": {}
  },


  columns : [
    {data: "num"},
    {data: "type"},
    {data: "title"},
    {data: "word"}

  ],


  columnDefs : [
    {
      "targets"   : 0,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "<div class='drop_down_div gray_border' data-num='"+row.num+"'>";

            html += "<div class='Q flex question_style question' data-num='"+row.num+"'>";

            html +=   "<div class='Qleft'>";
            html +=     row.type;
            html +=   "</div>";


            if(row.type != "공지사항"){

              html +=   "<div class='Qcenter'>";
              html +=     "<span>"+row.title+"</span>";
              html +=   "</div>";

            }
            else{
              html += "<a href='/match/notice_detail.php?num="+row.num+"'>";
              html +=   "<div class='Qcenter' style='white-space:nowrap;overflow:hidden;text-overflow:ellipsis;'>";
              html +=     "<span>"+row.title+"</span>";
              html +=   "</div>";
              html += "</a>";
              html += "<div class='Qright'>";



              var time = moment(row.reg_date).format('YY-MM-DD');


              html += time;
              html += "</div>";
            }


            if(row.type != "공지사항"){

              html +=   "<div class='Qright'>";
              html +=     "<div class=''>";
              html +=       "<img src='./img/icon_CaretDown.png' alt='방향고정아래화살표 아이콘'>";
              html +=     "</div>";
              html +=   "</div>";

            }

            html += "</div>";

            if(row.type != "공지사항"){

              html +=   "<div class='flex answer ' id='answer'>";
              html +=     "<div class='Qleft'></div>";

              html +=       "<div class='Qcenter '>";
              html +=         String(row.word).replace(/(<([^>]+)>)/ig, "");
              html +=       "</div>";

              html +=       "<div class='Qright'></div>";
              html +=   "</div>";

            }


            html += "</div>";

        return html;

      }
    },
    {
      "targets"   : 1,
      "orderable" : true,
      "searchable": true,
      "className" : "center none", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        return data;
      }
    },
    {
      "targets"   : 2,
      "orderable" : false,
      "searchable": true,
      "className" : "center none", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        return data;

      }
    },
    {
      "targets"   : 3,
      "orderable" : false,
      "searchable": true,
      "className" : "center none", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        return data;

      }
    }],


    initComplete: function(settings, json) {

      //$(".delete_btn").html("<div class='delete_all'>삭제</div>");
      //$(".notice_reg").html("<div class='reg' onclick=\"location.href = '/adm/match/notice_write.php'\">등록</div>");

      var count = list.rows( {order:'index', search:'applied'} ).nodes().length;
      $(".search_term_num").text(count);

    }


  });









  $('#search_input').keydown(function(e){
        //shop_list.reload ();

        if(e.keyCode == 13)
         {

           $(".search_result").css("display","block");

           list.search(this.value).draw();
           var count = list.rows( {order:'index', search:'applied'} ).nodes().length;
           $(".search_term_num").text(count);
           $(".search_term").text($(this).val());

         }


  });



  $(".icon_search").on('click', function(e){
        //shop_list.reload ();


           $(".search_result").css("display","block");

           list.search($('#search_input').val()).draw();
           var count = list.rows( {order:'index', search:'applied'} ).nodes().length;
           $(".search_term_num").text(count);
           $(".search_term").text($('#search_input').val());



  });




/* select datatable filrter */

$(document).on('click', '.sub_tab', function(){


  $(".search_result").css("display","none");


  var val = $(this).data("val");

  $(".search_term").text("");


  $(".sub_tab").each(function(){
      var each_val = $(this).data("val");

      if(each_val == val){
        $(this).addClass('bottom_border');
      }
      else{
        $(this).removeClass('bottom_border');
      }
  });



  var myregex = val;
  list.column(1).search(myregex,true,false).draw();


  if(val == ""){
    val = "전체";
  }

  var count = list.rows( {order:'index', search:'applied'} ).nodes().length;
  $(".search_term_num").text(count);


});



function sub_tab_init(){

  if(search != '1'){
    $(".search_result").css("display","none");
  }

  var val = String(type).trim();

  if(val == ""){
    return;
  }

  $(".sub_tab").each(function(){
      var each_val = $(this).data("val");

      if(each_val == val){
        $(this).addClass('bottom_border');
      }
      else{
        $(this).removeClass('bottom_border');
      }
  });



  var myregex = val;
  list.column(1).search(myregex,true,false).draw();


  if(val == ""){
    val = "전체";
  }

  var count = list.rows( {order:'index', search:'applied'} ).nodes().length;
  $(".search_term_num").text(count);


}


sub_tab_init();




/* 입력된 서치 폼 */

function search_input_init(){



  if(String(main_search_val).trim() == ""){
    return;
  }

  list.search(main_search_val).draw();
  var count = list.rows( {order:'index', search:'applied'} ).nodes().length;
  $(".search_term_num").text(count);
  $(".search_term").text(main_search_val);

  $("#search_input").val(main_search_val);

}


search_input_init();
