<?
include_once("./_common.php");
include_once("./head.php");



$type = $_REQUEST['type'];

$main_search_val = $_REQUEST['val'];
$search = $_REQUEST['search'];


?>


<link href="./css/cscenter_sub/cscenter_sub.css?i=<?=$ranum?>" rel="stylesheet" ></link>


<script>
  $(document).ready(function(){
    // $(".answer").hide();
    // $("#question_style").click(function(){
    //   $(this).next(".answer").slideToggle(300);
    //   $('.drop_down_div').addClass('change_style');
    //   $('#question_style').removeClass('gray_border');
    // });

    /*
    $(".question").click(function(){
        $(".drop_down_div").toggleClass('change_style');
        $(this).next(".answer").slideToggle(300);
        $(this).next(".answer").toggleClass('on');
        $(this).toggleClass('gray_border');
    });
    */


    $(document).on('click', ".drop_down_div .question", function(){

      var num = $(this).data("num");



      $(".drop_down_div .question").each(function(){

         if($(this).data("num") == num){
            console.log($(this).data("num")+"--------------"+num);
            if(!$(this).siblings(".answer").hasClass("on")){

               $(this).parents(".drop_down_div").css("background", "#E5E5E5");
               $(this).siblings(".answer").addClass("on");
               $(this).siblings(".answer").slideDown({
                 start: function () {
                    $(this).css({
                      display: "flex"
                    })
                  }
                },300);


            }
            else{
              $(this).parents(".drop_down_div").css("background", "#ffffff");
              $(this).siblings(".answer").removeClass("on");
              $(this).siblings(".answer").slideUp(300);

            }

         }
         else{

           $(this).parents(".drop_down_div").css("background", "#ffffff");
           $(this).siblings(".answer").removeClass("on");
           $(this).siblings(".answer").slideUp(300);

         }

      });
    });





  });

// $("#show_div_1").hide();
/*

$(".num_btn").click(function(){

    var idx = $(this).index() - 1;
     $(".paging_btn_set .num_btn").removeClass('on');
     $(".paging_btn_set .num_btn").eq(idx).addClass('on');
});

function show_div(id) {
  var i = 1;
  for (i = 1; i < 8; i++) {
    if (i == id) {
      $("#button" + id).addClass('bottom_border');
      $("#show_div_" + id).css({
        'display': 'block',
        // 'width': '100%'
      });
    } else {
      $("#button" + i).removeClass('bottom_border');
      $("#show_div_" + i).hide();
    }
  }
}
*/
</script>


<div class="stop-dragging"></div>



<!-- 현위치 -->
<div class="location">
  <div class="inner__2">
      홈 > <span>고객지원</span>
  </div>
  <div class="mobile_nav">
      < 다운로드
  </div>
</div>
<div id="container">
    <div class="inner__2" style="text-align: initial; width: 70vw;">
        <div class="top">
            <div class="">
                <h1>자주 묻는 질문</h1>
                <div class="search_set">
                    <input type="text" name="" value="" id="search_input" placeholder="검색어를 입력해주세요.">
                    <span class="icon_search">
                        <img src="img/icon_search.png" alt="돋보기아이콘">
                    </span>
                </div>
            </div>
        </div>
        <!-- 카테고리 -->
        <div class="flex" id="category_set">
            <div class="bottom_border sub_tab" id="button1" data-val="">
                <h3>
                    전체
                </h3>
            </div>
            <div  id="button2" class="sub_tab" data-val="구장예약" >
                <h3>
                    구장예약
                </h3>
            </div>
            <div  id="button3" class="sub_tab" data-val="경기매치" >
                <h3>
                    경기매치
                </h3>
            </div>
            <div  id="button4" class="sub_tab" data-val="팀관리"  >
                <h3>
                    팀관리
                </h3>
            </div>
            <div  id="button5" class="sub_tab" data-val="시설협력" >
                <h3>
                    시설협력
                </h3>
            </div>
            <div id="button6" class="sub_tab" data-val="이벤트" >
                <h3>
                    이벤트
                </h3>
            </div>
            <div  id="button7" class="sub_tab" data-val="공지사항" >
                <h3>
                    공지사항
                </h3>
            </div>
        </div>

        <!-- 모바일 작동이너 -->
        <div class="" id="inner_in_inner">
            <div class="search_result">
                <p>
                    <strong>
                        <span class="search_term"></span>
                    </strong>
                    으로 검색한 결과는 총
                    <strong>
                        <span class="search_term_num">
                            0
                        </span>
                    </strong>
                    건입니다.
                </p>
            </div>

            <!-- 전체 질문 -->
            <div class="question_style_box" id="show_div_1">



              <table id="list" class="display nowrap" style="width:100%;">
                <thead>

                  <th style=""></th>
                  <th style="display:none;"></th>
                  <th style="display:none;"></th>
                  <th style="display:none;"></th>
                  <th style="display:none;"></th>

                </thead>

              </table>








            </div>





            <!-- 1대1 문의하기 -->
            <div class="gray_border Q flex" id="inquire">
                <div class="more_inquire_text">
                    궁금한 내용을 찾지 못하셨나요?
                </div>
                <div class="more_inquire_btn">
                    <a href="https://pf.kakao.com/_FBDJj" target="_blank">
                        1:1 문의하기
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>



<script>

  var type = "<?=$type?>";
  var main_search_val = "<?=$main_search_val?>";

  var search = "<?=$search?>";


  if(main_serach_val != ""){
    $(".search_result").css("display","block");
  }

</script>


<script src="/match/js/cscenter_sub/cscenter_sub.js?i=<?=$ranum?>"></script>


<?include "./tail.php"?>
