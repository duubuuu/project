$.fn.dataTable.ext.errMode = 'none';


var pb_selected_list_para = {

  // dom : 'f<"pr_create_btn">l<"pb_delete_btn">tp',
    dom : 'f<"pr_create_btn">l<"selected_q">tp',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "등록된 문제가 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '문제 검색',
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
    "url":"./proc/project/pb_pr_temp.php",
    "type":"POST",
    "data": {}
  },


  columns : [
    {data: "video_name"},
    {data: "video_name"},
    {data: "pb_name"},
    {data: "difficulty", 'render': function ( data, type, row ) {

      var html = "미선택";

      if(row.difficulty == "3"){
        html = "상";
      }
      else if(row.difficulty == "2"){
        html = "중";
      }
      else if(row.difficulty == "1"){
        html = "하";
      }

      return html;
    }},
    {data: "cate_type", 'render': function ( data, type, row ) {

      var type = "";

      if(row.cate_type == "chapter"){
        type = "단원";
      }
      else if(row.cate_type == "type"){
        type = "유형";
      }

      return type;
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
      return "<div class='btn btn-danger pb_delete' data-pb_real_code="+row.pb_real_code+" data-num='"+row.num+"'><i class='fas fa-trash-alt'></i></div>";
    }},

    {data: "pb_name"}
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



      return row.pb_code;
    }
  },
  {
    "targets"   : 2,
    "orderable" : false,
    "searchable": true,
    "className" : "center", //칼럼에 클래스네임추가
    "render"    : function ( data, type, row ) { //row: ajax

      var html = "";
      html += "<div class='img_url' data-img_real_code='"+row.pb_real_code+"' data-pb_answer='"+row.pb_answer+"' data-img_name='"+row.pb_name+"' data-url='"+row.img+"'>"+row.pb_name;
      html += "</div>";

      return html;

    }
  },
  {
    "targets"   : 7,
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

    }
  }],


  initComplete: function(settings, json) {

    video_code = json.data[0].video_code;
      $(".selected_num").text(selected_cnt);

  }


};


var pb_selected_list = $("#pb_selected_list").DataTable(pb_selected_list_para);

$(".selected_q").html("선택된 문제 갯수 <span class='selected_num'>0</span>건");





var pr_list_para = {
  // dom : 'fl<"pr_delete_btn">tp',
  dom : 'fl<"selected_q2">tp',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "등록된 프로젝트가 없습니다.",
    //info: ' _TOTAL_ 개의 데이터가 있습니다.',
    search: '_INPUT_',
    searchPlaceholder: '프로젝트 검색',
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
    "url":"./proc/project/pr_list.php",
    "type":"POST",
    "data": {}
  },


  columns : [
    {data: "video_name"},
    {data: "video_name"},

    {data: "pr_name"},
    {data: "pb_real_code_cnt", 'render': function ( data, type, row ) {

      if(data == 0){
        return '';
      }

      return data+" 개";
    }},

    {data: "pr_reg_date", 'render': function ( data, type, row ) {

      if(data == 0){
        return '';
      }

      return data;
    }},
    {data: "num", 'render': function ( data, type, row ) {

      if(data == 0){
        return '';
      }

      var html = "";

      html += "<div class='btn btn-danger pr_delete' data-pr_real_code="+row.pr_real_code+" data-num='"+row.num+"'><i class='fas fa-trash-alt'></i></div>";
      html += "<div class='btn btn-primary pr_repair' data-pr_real_code="+row.pr_real_code+" data-num='"+row.num+"'><i class='fas fa-tools'></i></div>";

      if(row.pb_real_code_cnt > 1){
        html += "<div class='btn btn-primary pr_order' data-pr_real_code="+row.pr_real_code+" data-num='"+row.num+"'><i class='fas fa-sort'></i></div>";
      }

      return html;
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

      html += "<input type='checkbox' class='pr_chk' data-pr_name='"+row.pr_name+"' data-pr_real_code='"+row.pr_real_code+"' data-pr_code='"+row.pr_code+"' data-num='"+row.num+"'/>";

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
      html += "<span class='pr_code_span' data-num='"+row.num+"' data-pr_code='"+row.pr_code+"' data-pr_real_code='"+row.pr_real_code+"'>"+row.pr_code+"</span>";
      html += "<input type='text' data-num='"+row.num+"' data-pr_code='"+row.pr_code+"' data-pr_real_code='"+row.pr_real_code+"' class='pr_code_input' value='"+row.pr_code+"'>";

      return html;
    }
  },
  {
    "targets"   : 2,
    "orderable" : false,
    "searchable": true,
    "className" : "center", //칼럼에 클래스네임추가
    "render"    : function ( data, type, row ) { //row: ajax

      var html = "";
      html += "<span class='pr_code_span' data-num='"+row.num+"' data-pr_code='"+row.pr_code+"' data-pr_real_code='"+row.pr_real_code+"'>"+row.pr_name+"</span>";
      html += "<input type='text'  data-num='"+row.num+"' data-pr_code='"+row.pr_code+"' data-pr_real_code='"+row.pr_real_code+"' class='pr_name_input' value='"+row.pr_name+"'>";

      return html;

    }
  }],


  initComplete: function(settings, json) {

    video_code = json.data[0].video_code;
    $(".selected_num2").text(selected_cnt_2);

  }


};


/* 프로젝트 데이터테이블 */

  var pr_list = $("#pr_list").DataTable(pr_list_para);
  $("div#pr_list_filter label").append("<img src='/img/search.png' style='position:absolute; right:6px; top:50%; transform: translateY(-50%);'/>");





// 프로젝트 문제 순서 바꾸는 창



var pb_order;


function pb_order_func(pr_real_code){

  var pb_order_para = {

    // dom : 'f<"pr_create_btn">l<"pb_delete_btn">tp',
      dom : 'f<"pr_create_btn">l<"selected_q">tp',
    // 표시 건수기능 숨기기
    language: {
      emptyTable: '데이터가 없습니다.',
      infoEmpty: '',
      info:'현재 _PAGE_페이지 입니다',
      zeroRecords : "등록된 문제가 없습니다.",
      //info: ' _TOTAL_ 개의 데이터가 있습니다.',
      search: '_INPUT_',
      searchPlaceholder: '문제 검색',
      lengthMenu: '_MENU_ 개 보기',
      paginate: {
        next: '>',
        previous: '<'
      },

    },





    // 검색 기능 숨기기
    searching: false,
    // 표시 건수기능 숨기기
    lengthChange: false,
    // 한 페이지에 표시되는 Row 수
    pageLength: 10,
    processing:false,
    serverSide:false,
    responsive: true,
    ordering : false,

    ajax : {
      "url":"./proc/project/pb_order_proc.php",
      "type":"POST",
      "data": {"pr_real_code" : pr_real_code}
    },


    columns : [
      {data: "video_name"},
      {data: "order"},
      {data: "video_name"},
      {data: "pb_name"},
      {data: "reg_date", 'render': function ( data, type, row ) {

        if(data == 0){
          return '';
        }




        return data;
      }},
      {data: "pb_name"}
  ],


  columnDefs : [
    {
      "targets"   : 0,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "";

        html += "<input type='checkbox' class='order_chk' data-order='"+row.order+"' data-pb_name='"+row.pb_name+"' data-pr_real_code='"+row.pr_real_code+"' data-pb_real_code='"+row.pb_real_code+"' data-pb_code='"+row.pb_code+"' data-num='"+row.num+"'/>";

        return html;
      }
    },
    {
      "targets"   : 2,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax



        return row.pb_code;
      }
    },
    {
      "targets"   : 3,
      "orderable" : false,
      "searchable": true,
      "className" : "center", //칼럼에 클래스네임추가
      "render"    : function ( data, type, row ) { //row: ajax

        var html = "";
        html += "<div class='img_url' data-img_real_code='"+row.pb_real_code+"' data-pb_answer='"+row.pb_answer+"' data-img_name='"+row.pb_name+"' data-url='"+row.img+"'>"+row.pb_name;
        html += "</div>";

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

      }
    }],


    initComplete: function(settings, json) {

      $(".pb_order_view").css("display" ,"block");

      var str = (json.data[0].pb_real_code_arr).split("::");

       for(var i=0; i<str.length; i++){
          pb_real_code_order_arr[i] = str[i];
       }





    }


  };

  pb_order = $("#pb_order").DataTable(pb_order_para);
}








  //new $.fn.dataTable.FixedHeader(pr_list);
  // $(".pr_delete_btn").html("<button class='btn btn-danger'>선택 삭제</button>");
    $(".selected_q2").html("선택된 문제 갯수 <span class='selected_num2'>0</span>건");
    $("div#pb_selected_list_filter label").append("<img src='/img/search.png' style='position:absolute; right:6px; top:50%; transform: translateY(-50%);'/>");


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







/* 카테고리 탭 클릭했을때 */
$(".cate_tab").on('click', function(){

  $(".cate_tab").css("border-bottom", "1px solid #d0d0d0");
  $(".cate_tab").css("box-shadow", "0px 0px 6px #d0d0d0 inset");
  $(".chapter").css("display","none");
  $(".type").css("display","none");
  $(this).css("border-bottom", "2px solid #f23f42");
  $(this).css("box-shadow", "0px 0px 6px #d0d0d0");

  if($(this).hasClass("chapter_cate")){
    cate_type = "chapter";
    $(".pb_cate_column").text("단원별");
    $(".chapter").css("display", "block");
  }
  else if($(this).hasClass("type_cate")){
    cate_type = "type";
    $(".pb_cate_column").text("유형별");
    $(".type").css("display", "block");
  }




});







/* 카테고리의 문제 선택했을때 문제 테이블에 문제 추가 */

$(".cate_4_name").on('click', function(){

  var pb_real_code = $(this).data("pb_real_code");


  var formdata = new FormData();

  formdata.append("pb_real_code", pb_real_code);
  formdata.append("cate_type", cate_type);

  $.ajax({
    type:"POST",
    url:"./proc/project/pb_pr_temp_save.php",
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
          pb_selected_list.destroy();
          pb_selected_list = $("#pb_selected_list").DataTable(pb_selected_list_para);

      }
      else if(data.rs == "fail"){
        swal("문제 추가에 실패하였습니다.");
      }
      else if(data.rs == "exist"){
        swal("이미 추가되어있습니다.");
      }
      else{

      }

    },
    error: function(err) {
      alert("에러");
    }
  });


});






function pb_selected_cnt(){
  $(".pb_chk").each(function(){
    if($(this).prop("checked")){
        selected_cnt++;
    }
  });

  $(".selected_num").text(selected_cnt);
  selected_cnt = 0;
}


function pr_selected_cnt(){
  $(".pr_chk").each(function(){
    if($(this).prop("checked")){
        selected_cnt_2++;
    }
  });

  $(".selected_num2").text(selected_cnt_2);
  selected_cnt_2 = 0;
}

/* 추가된 문제 일괄 체크 */

$(document).on('click', ".pb_all_chk", function(){
  if($(".pb_all_chk").prop("checked")){
      $(".pb_chk").prop("checked", true);
  }
  else{
      $(".pb_chk").prop("checked", false);
  }

  pb_selected_cnt();

});


$(document).on('click', ".pb_chk", function(){
    pb_selected_cnt();
});




/* 추가된 프로젝트 일괄 체크 */

$(document).on('click', ".pr_all_chk", function(){
  if($(".pr_all_chk").prop("checked")){
      $(".pr_chk").prop("checked", true);
  }
  else{
      $(".pr_chk").prop("checked", false);
  }

  pr_selected_cnt();

});

$(document).on('click', ".pr_chk", function(){
    pr_selected_cnt();
});




/* 선택된 문제들 모아서 프로젝트 생성 */

$(document).on('click', ".pr_create_btn", function(){

    var pb_chk_arr = [];
    var pb_chk_arr_1 = [];

    var pb_cnt = 0;

    var i=0;
    $(".pb_chk").each(function(){
      console.log($(this).prop("checked"));
       if($(this).prop("checked")){
         console.log("들어옴");
         pb_chk_arr[i] = $(this).data("num");
         pb_chk_arr_1[i] = $(this).data("pb_real_code");
         pb_cnt++;
         i++;
       }
    });

    if(pb_cnt == 0){
      swal("문제를 선택해주세요.");
      return;
    }



    var num_arr = pb_chk_arr.join("::");
    var pb_real_code_arr = pb_chk_arr_1.join("::");


      console.log(num_arr);

    var formdata = new FormData();
    formdata.append("num_arr", num_arr);
    formdata.append("pb_real_code_arr", pb_real_code_arr);
    formdata.append("type", "make");


    $.ajax({
      type:"POST",
      url:"./proc/project/pb_to_pr_make_delete.php",
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

          pr_list.ajax.reload();
          return;

        }
        else if(data.rs == "fail"){
          alert("생성 실패하였습니다.");
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





/* 선택된 문제들 일괄삭제 */

$(document).on('click', ".pb_delete_btn", function(){

    var pb_chk_arr = [];

    $(".pb_chk").each(function(i){
       if($(this).prop("checked")){
         pb_chk_arr[i] = $(this).data("num");
       }
    });



    var num_arr = pb_chk_arr.join("::");


      console.log(num_arr);

    var formdata = new FormData();
    formdata.append("num_arr", num_arr);
    formdata.append("type", "delete");


    $.ajax({
      type:"POST",
      url:"./proc/project/pb_to_pr_make_delete.php",
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
          pb_selected_list.destroy();
          pb_selected_list = $("#pb_selected_list").DataTable(pb_selected_list_para);
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





/* 프로젝트 코드, 이름 수정 */
$(document).on('click',  ".pr_repair", function(){

  var num = $(this).data("num");

  $(".pr_repair").each(function(){
      if(num == $(this).data("num")){
        $(this).attr("class", "btn btn-primary pr_confirm");
        $(this).children("i").attr("class", "fas fa-check");
      }
  });

  $(".pr_name_input").each(function(){
      if(num == $(this).data("num")){
          $(this).css("display", "inline-block");
          $(this).siblings("span").css("display", "none");
      }
  });


  $(".pr_code_input").each(function(){
      if(num == $(this).data("num")){
         $(this).css("display", "inline-block");
         $(this).siblings("span").css("display", "none");
      }
  });


});



/* 프로젝트 리스트 수정 확정 눌렀을때 */

$(document).on('click', ".pr_confirm", function(){

  var num = $(this).data("num");
  var pr_real_code = $(this).data("pr_real_code");
  var pr_name = "";
  var pr_code = "";



  $(".pr_name_input").each(function(){
      if(num == $(this).data("num")){
          pr_name = $(this).val().trim();
      }
  });


  $(".pr_code_input").each(function(){
      if(num == $(this).data("num")){
         pr_code = $(this).val().trim();
      }
  });




  var formdata = new FormData();
  formdata.append("pr_real_code", pr_real_code);
  formdata.append("pr_code", pr_code);
  formdata.append("pr_name", pr_name);
  formdata.append("num", num);

  $.ajax({
    type:"POST",
    url:"./proc/project/pr_repair.php",
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


        $(".pr_confirm").each(function(){
            if(num == $(this).data("num")){
              $(this).attr("class", "btn btn-primary pr_repair");
              $(this).children("i").attr("class", "fas fa-tools");

            }
        });

        $(".pr_name_input").each(function(){
            if(num == $(this).data("num")){
                $(this).css("display", "none");
                $(this).siblings("span").text(data.pr_name);
                $(this).siblings("span").css("display", "inline-block");

                $(this).data("pr_name", data.pr_name);
                $(this).siblings("span").data("pr_name", data.pr_name);
            }
        });


        $(".pr_code_input").each(function(){
            if(num == $(this).data("num")){
               $(this).css("display", "none");
               $(this).siblings("span").text(data.pr_code);
               $(this).siblings("span").css("display", "inline-block");

               $(this).data("pr_name", data.pr_name);
               $(this).siblings("span").data("pr_name", data.pr_code);
            }
        });

        $(".pr_chk").each(function(){
            if(num == $(this).data("num")){
              $(this).data("pr_code", data.pr_code);
              $(this).data("pr_name", data.pr_name);
            }
        });

        return;

      }
      else if(data.rs == "fail"){
        alert("수정 실패하였습니다.");
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





/* 프로젝트 리스트 삭제 */

$(document).on('click', ".pr_delete", function(){

  var num = $(this).data("num");
  var pr_real_code = $(this).data("pr_real_code");

  var formdata = new FormData();

  formdata.append("num", num);
  formdata.append("pr_real_code", pr_real_code);

  $.ajax({
    type:"POST",
    url:"./proc/project/pr_delete.php",
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
        pr_list.destroy();
        pr_list = $("#pr_list").DataTable(pr_list_para);
        return;

      }
      else if(data.rs == "fail"){
        alert("수정 실패하였습니다.");
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




/* 프로젝트 리스트 일괄 삭제 */

$(document).on('click', ".pr_delete_btn", function(){



  var num = $(this).data("num");

  var pr_chk_arr = [];

  $(".pr_chk").each(function(i){
     if($(this).prop("checked")){
       pr_chk_arr[i] = $(this).data("num");
     }
  });

  var num_arr = pr_chk_arr.join("::");

  var formdata = new FormData();
  formdata.append("num_arr", num_arr);



  $.ajax({
    type:"POST",
    url:"./proc/project/pr_selected_delete.php",
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
        pr_list.destroy();
        pr_list = $("#pr_list").DataTable(pr_list_para);
        return;

      }
      else if(data.rs == "fail"){
        alert("수정 실패하였습니다.");
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







/* 카테고리 검색 */

$(".pr_cate_search").on('keydown', function(e){

   if(e.keyCode == 13){

      var val = $(this).val().trim();

      $(".pr_cate_2_name").each(function(){
        //console.log("반복문 들어옴 " + $(this).children("span.val_span").text() + "-----" + val);
        if($(this).children("span.val_span").text().match(val)){
          //console.log("네임값 들어옴 " + $(this).children("span.val_span").text());

          var parent = $(this).parent(".pr_cate_2");

          $(this).parent(".pr_cate_2").css("display","block");
          parent.siblings(".pr_cate_2").css("display","block");
        }
      });


      $(".pr_cate_3_name").each(function(){
        console.log("반복문 들어옴 " + $(this).children("span.val_span").text() + "-----" + val);
        if($(this).children("span.val_span").text().match(val)){
          console.log("네임값 들어옴 " + $(this).children("span.val_span").text());

          var parent_1 = $(this).closest(".pr_cate_2");

          parent_1.css("display","block");

          var parent = $(this).parent(".pr_cate_3");

          $(this).parent(".pr_cate_3").css("display","block");
          parent.siblings(".pr_cate_3").css("display","block");
        }
      });

    }
});





/* 취소버튼 눌렀을때 */

$(".out__line-btn").on('click', function(){
    history.back();
});




/* 호버시 제트 인덱스 변환 */

$(document).on('mouseenter', ".img_url", function(){
    $("#pb_selected_list tbody tr").each(function(i){
        $(this).css("position", "relative").css("z-index", -(i+1));
    });

    $("#pb_order tbody tr").each(function(i){
        $(this).css("position", "relative").css("z-index", -(i+1));
    });
});




/* 문제순서 바꾸는 chk */
$(document).on('change', '.order_chk', function(){

   $(".order_chk").prop("checked", false);

   $(this).prop("checked", true);


});





/* 프로젝트 안에 포함되어있는 문제 테이블 띄워줄때 */



$(document).on('click', '.pr_order', function(){

      var num = $(this).data("num");
      var pr_real_code = $(this).data("pr_real_code");

      if(pb_order != null){
        pb_order.destroy();
      }
      pb_order_func(pr_real_code);


});




$(".order_confirm").on('click', function(){

    $(".pb_order_view").css("display","none");


});



$(".arrow_up").on('click', function(){

  var selected_order;
  var selected_pr_real_code;
  var selected_pb_real_code;

  var chk_cnt = 0;


  $(".order_chk").each(function(){
      if($(this).prop("checked")){
        selected_order = $(this).data("order");
        selected_pr_real_code = $(this).data("pr_real_code");
        selected_pb_real_code = $(this).data("pb_real_code");
        chk_cnt++;
      }
  });

    if(chk_cnt == 0){
      swal("순서를 바꿀 문제를 선택해주세요.");
      return;
    }


    pb_real_code_order_change(selected_pr_real_code, selected_pb_real_code, "up");

});


$(".arrow_down").on('click', function(){

  var selected_order;
  var selected_pr_real_code;
  var selected_pb_real_code;

  var chk_cnt = 0;


  $(".order_chk").each(function(){
      if($(this).prop("checked")){
        selected_order = $(this).data("order");
        selected_pr_real_code = $(this).data("pr_real_code");
        selected_pb_real_code = $(this).data("pb_real_code");
        chk_cnt++;
      }
  });

  if(chk_cnt == 0){
    swal("순서를 바꿀 문제를 선택해주세요.");
    return;
  }


    pb_real_code_order_change(selected_pr_real_code, selected_pb_real_code, "down");

});



function pb_real_code_order_change(pr_real_code, pb_real_code, arrow_type){


  var formdata = new FormData();
  formdata.append("pr_real_code", pr_real_code);
  formdata.append("pb_real_code", pb_real_code);
  formdata.append("arrow_type", arrow_type);

  $.ajax({
    type:"POST",
    url:"./proc/project/pb_order_change.php",
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

          pb_order.ajax.reload();


          pb_order.on( 'draw', function () {
            $(".order_chk").each(function(){
                if($(this).data("pb_real_code") == data.pb_real_code){
                  console.log("asdfasdfasfd");
                    $(this).prop("checked", true);
                }
            });
          });




      }
      else if(data.rs == "fail"){
        alert("실패하였습니다.");
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
