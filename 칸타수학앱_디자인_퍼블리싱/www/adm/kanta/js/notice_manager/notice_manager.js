$.fn.dataTable.ext.errMode = 'none';


var list = $("#list").DataTable({

  dom: '<"toolbar">f<"notice_write_div">tp',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'',
    zeroRecords : "공지사항이 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '공지사항 검색',
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
  pageLength: 10,
  processing:false,
  serverSide:false,
  responsive: true,
  ordering : false,

  ajax : {
    "url":"./proc/notice_manager/notice_manager_proc.php",
    "type":"POST",
    "data": {}
  },


  columns : [
    {data: "num", 'render': function ( data, type, row ) {

      var html = "";
      html += "<input type='checkbox' class='notice_chk' data-num='"+row.num+"'/>";
      return html;

    }},
    {data: "num", 'render': function ( data, type, row ) {
      return "<a href='./notice_view.php?num="+row.num+"'>"+data+"</a>";
    }},
    {data: "title", 'render': function ( data, type, row ) {

      var important = "";

      if(row.important == "true"){
         important = "<div class='important'>중요</div>";
      }


      var html = "<a href='./notice_view.php?num="+row.num+"'>";
          html += important;
          html += data+"</a>";

      return html;
    }},
    {data: "mb_id", 'render': function ( data, type, row ) {
      return "<a href='./notice_view.php?num="+row.num+"'>"+data+"</a>";
    }},
    {data: "reg_date", 'render': function ( data, type, row ) {
      return "<a href='./notice_view.php?num="+row.num+"'>"+data+"</a>";
    }}

  ],


    initComplete: function(settings, json) {


    }


  });



  new $.fn.dataTable.FixedHeader(list);
  $("div.toolbar").html("<div class='notice_select_delete'>선택삭제</div>");
  $("div.notice_write_div").append("<a href='./notice_write.php'><div class='notice_write'>공지작성</div></a>");
  $("div#list_filter label").append("<img src='/img/search.png' style='position:absolute; right:6px; top:7px;'/>");
  // $("div#list_filter label").append("<svg width='22' height='22' viewBox='0 0 24 24' fill='none' style='position: absolute; right: 2%; transform: translateY(-50%); top: 50%;'><path d='M15.5 14H14.71L14.43 13.73C15.41 12.59 16 11.11 16 9.5C16 5.91 13.09 3 9.5 3C5.91 3 3 5.91 3 9.5C3 13.09 5.91 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z' fill='#323232'/></svg>");






  /* 공지사항 전부 체크 기능 */

  $(document).on('click', ".notice_all_chk", function(){
    if($(".notice_all_chk").prop("checked")){
        $(".notice_chk").prop("checked", true);
    }
    else{
        $(".notice_chk").prop("checked", false);
    }

  });


  $(document).on('click', '.notice_select_delete', function(){

    var selected_cnt = 0;

    var notice_chk_arr = [];

    $(".notice_chk").each(function(i){
       if($(this).prop("checked")){
         notice_chk_arr[i] = $(this).data("num");
         selected_cnt++;
       }
    });


    if(selected_cnt == 0){
      swal("삭제할 항목을 선택해 주세요.");
      return;
    }


    var num_arr = notice_chk_arr.join("::");
    num_arr = num_arr.replace("::", "");

      console.log(num_arr);

    var formdata = new FormData();
    formdata.append("num_arr", num_arr);


    $.ajax({
      type:"POST",
      url:"./proc/notice_manager/notice_select_delete.php",
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
          img_uploaded_flag = 0;
          swal("삭제되었습니다.");
          list.ajax.reload();
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
