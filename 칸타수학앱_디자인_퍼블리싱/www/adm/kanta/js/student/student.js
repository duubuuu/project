/*휴대폰 정규식 */
function hp_regex(){

  var mb_hp = $(".phone").val().replace(/-*/gi,"");



  var hp="";


  if(!$(".phone").val().match(/[0-9\-]*/gi)){

    $(".phone").val("");
    return;
  }

  if(mb_hp.length == 11){

    hp_val = mb_hp

    var hp1 = hp_val.substring(0,3);

    var hp2 = hp_val.substring(3,7);
    var hp3 = hp_val.substring(7,11);


    hp = hp1 + "-" + hp2 + "-" + hp3;

    $(".phone").val(hp);

  }


  if(mb_hp.length == 10){

    hp_val = mb_hp

    var hp1 = hp_val.substring(0,3);

    var hp2 = hp_val.substring(3,6);
    var hp3 = hp_val.substring(6,10);


    hp = hp1 + "-" + hp2 + "-" + hp3;

    $(".phone").val(hp);

  }


  if(mb_hp.length > 11){

      $(".phone").val("");

  }


}


/* 날짜 자바스크립트  */

var today = new Date();

var year = today.getFullYear(); // 년도
var month = ("0" + (today.getMonth() + 1)).slice(-2);
var date = ("0" + today.getDate()).slice(-2);
var day = ("0" + today.getDay()).slice(-2);  // 요일
var hours = ("0" + today.getHours()).slice(-2); // 시
var minutes = ("0" + today.getMinutes()).slice(-2);  // 분
var seconds = ("0" + today.getSeconds()).slice(-2);  // 초
var milliseconds = ("0" + today.getMilliseconds()).slice(-2); // 밀리초






/* 다음 주소 api */
$(".daum_api_close").on('click', function(){
  $(".daum_api").css("display","none");
});



var width = window.innerWidth;
var height = window.innerHeight;

$(".address_btn").on('click',function(){

  var element_wrap = document.querySelector(".daum_api");


  if(width < 576){
    daum.postcode.load(function(){
      new daum.Postcode({
        oncomplete: function(data) {
          $(".daum_api").css("display","none");
          $(".addr_1").val(data.address);

        },
        onresize : function(size) {
          element_wrap.style.height = size.height+'px';
        },
        width : '100%',
        height : '100%'
      }).embed(element_wrap);

      element_wrap.style.display = 'block';
    });
  }
  else{
    new daum.Postcode({
      oncomplete: function(data) {

        $(".addr_1").val(data.address);

      }
    }).open();
  }


});



$(".student_reg").on('click',function(e){



    if($(".mb_name").val() == "" || $(".mb_name").val().length != 3){
      swal("이름을 입력해주세요, 이름은 3글자입니다.");
      e.preventDefault();

      return;
    }
    else if($(".mb_id").val() == "" || !$(".mb_id").val().match(/[a-zA-Z0-9]*/gi)){
      swal("아이디는 영문, 숫자만 허용됩니다.");
      e.preventDefault();

      return;
    }
    else if($(".mb_email").val() == "" || !$(".mb_email").val().match(/[a-zA-Z0-9]*@[a-zA-Z0-9]*\.com|net|kr/gi)){
      swal("이메일을 입력해주세요. .com, .net, .kr 만 허락됩니다.");
      e.preventDefault();

      return;
    }
    else if(!$(".birth_year").val().match(/\d/gi) || !$(".birth_month").val().match(/\d/gi) || !$(".birth_day").val().match(/\d/gi)){
      swal("생일을 선택해주세요.");
      e.preventDefault();

      return;
    }
    else if($(".mb_password").val() == "" || !$(".mb_password").val().match(/[a-z0-9]{8}/gi)){
      swal("비밀번호를 입력해주세요, 비밀번호는 영문숫자 최소 8자 이상입니다.");

      e.preventDefault();
      return;
    }
    else if(!$(".mb_password").val().match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/gi)){
      swal("비밀번호는 영문 숫자 특수문자를 포함해서 입력해주세요.");
      e.preventDefault();

      return;
    }


    var mb_name = $(".mb_name").val().trim();
    var mb_id = $(".mb_id").val().trim();
    var mb_hp = $(".mb_hp").val().trim();
    var mb_password = $(".mb_password").val().trim();

    var mb_email = $(".mb_email").val().trim();
    var addr_1 = $(".addr_1").val().trim();
    var addr_2 = $(".addr_2").val().trim();
    var school_grade = $(".school_grade").val().trim();
    var grade = $(".grade").val().trim();
    var age = $(".age").val().trim();

    var year = $(".birth_year").val();
    var month = $(".birth_month").val();
    var day = $(".birth_day").val();

    var birth = year+"-"+month+"-"+day;


    var formdata = new FormData();

    formdata.append("mb_id", mb_id);
    formdata.append("mb_name", mb_name);
    formdata.append("mb_email", mb_email);
    formdata.append("mb_password", mb_password);

    formdata.append("addr_1", addr_1);
    formdata.append("addr_2", addr_2);
    formdata.append("school_grade", school_grade);
    formdata.append("grade", grade);
    formdata.append("age", age);

    formdata.append("mb_birth", birth);

    $.ajax({
      type:"POST",
      url:"./proc/student/student_add_proc.php",
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
          swal("등록되었습니다.");
          list.ajax.reload();
        }
        else if(data.rs == "fail"){
          swal("등록에 실패하였습니다.");
        }
        else if(data.rs == "exist"){
          swal("이미 존재하는 아이디입니다.");
        }
        else{
          swal("오류가 발생하였습니다.");
        }



      },
      error: function(err) {
        alert("에러");

      }
    });






});










/*  학생 데이터 테이블  */


/*
var list = $("#list").DataTable({

  dom : '<"video_upload_input">f<t>p',
  // 표시 건수기능 숨기기
  language: {
    emptyTable: '데이터가 없습니다.',
    infoEmpty: '',
    info:'현재 _PAGE_페이지 입니다',
    zeroRecords : "등록된 학생이 없습니다.",
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
  ordering : false,

  ajax : {
    "url":"./proc/student/student_proc.php",
    "type":"POST",
    "data": {}
  },


  columns : [

    {data: "mb_name", 'render': function ( data, type, row ) {

      if(data == 0){
        return '';
      }

      return "<a href='/adm/kanta/student_repair.php?num="+row.num+"'>"+data+"</div>";
    }},
    {data: "mb_id", 'render': function ( data, type, row ) {

      if(data == 0){
        return '';
      }

      return "<a href='/adm/kanta/student_repair.php?num="+row.num+"'>"+data+"</div>";
    }},
    {data: "mb_email", 'render': function ( data, type, row ) {

      if(data == 0){
        return '';
      }

      return "<a href='/adm/kanta/student_repair.php?num="+row.num+"'>"+data+"</div>";
    }},
    {data: "school_grade", 'render': function ( data, type, row ) {

      if(data == 0){
        return '';
      }

      return "<a href='/adm/kanta/student_repair.php?num="+row.num+"'>"+data+"</div>";
    }},
    {data: "grade", 'render': function ( data, type, row ) {

      if(data == 0){
        return '';
      }

      return "<a href='/adm/kanta/student_repair.php?num="+row.num+"'>"+data+"</div>";
    }}
  ],




    initComplete: function(settings, json) {



    }


  });



  new $.fn.dataTable.FixedHeader(list);



*/






  /* 학교 이름 검색 */

  $("#input_school_grade").on('keydown', function(e){


    if(e.keyCode == 13){
      var data = $(this).val().trim();

      if(data == ""){
        return;
      }


      $(".loading_div").css("display","block");

      var formdata = new FormData();

      formdata.append("search_data", data);




      $.ajax({
        type:"POST",
        url:"./proc/student/school_name_search.php",
        data : formdata,
        processData: false,
        contentType: false,
        async : false,

        beforeSend : function(){

        },

        success: function(data){

          $(".loading_div").css("display","none");

          $(".school_info_zone div").remove();

          var data = JSON.parse(data);

          var html = "";

          for(var i=0; i<data.school.length; i++){
            //console.log(data.school[i].school_name);
            html += "<div class='school_info_div'>";
            html += "<div class='school_name_div'>"+data.school[i].school_name+"</div>";
            html += "<div class='school_road_addr'>"+data.school[i].road_addr+"</div>";
            html += "</div>";
          };


          $(".school_info_zone").append(html);

        },
        error: function(err) {
          alert("에러");
        }
      });
    }

  });


  $(".school_search_popup").draggable();







  $(".school_popup_close").on('click', function(){
    $(".school_search_popup").css("display", "none");
  });



  $(document).on('click', '.school_info_div', function(){
    var data = $(this).children(".school_name_div").text();

    $(".school_grade").val(data);
    $(".school_search_popup").css("display","none");

  });


  $(document).on('click', '.school_grade', function(){

    $(".school_search_popup").css("display", "block");
  });
