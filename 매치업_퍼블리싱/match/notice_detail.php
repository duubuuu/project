<?
include_once("./_common.php");
include_once("./head.php");



$num = $_REQUEST['num'];


$sql = "select * from freq_faq where type='공지사항' and num = '{$num}'";
$row = sql_fetch($sql);

?>

<link href="/match/css/notice_detail/notice_detail.css?i=<?=$ranum?>" rel="stylesheet"></link>

<script>
  $(document).ready(function(){
    // $(".answer").hide();
    // $("#question").click(function(){
    //   $(this).next(".answer").slideToggle(300);
    //   $('.drop_down_div').addClass('change_style');
    //   $('#question').removeClass('gray_border');
    // });

    $(".question").click(function(){
        $(".drop_down_div").toggleClass('change_style');
        $(this).next(".answer").slideToggle(300);
        $(this).next(".answer").toggleClass('on');
        $(this).toggleClass('gray_border');
    });

    $(".num_btn").click(function(){

        var idx = $(this).index() - 1;
         $(".paging_btn_set .num_btn").removeClass('on');
         $(".paging_btn_set .num_btn").eq(idx).addClass('on');
    });
  });



</script>
<script>

// $("#show_div_1").hide();
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

</script>
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


        <!--
        <div class="top">
            <div class="">
                <h1>자주 묻는 질문</h1>
                <div class="search_set">
                    <input type="text" name="" value="" placeholder="검색어를 입력해주세요.">
                    <span class="icon_search">
                        <img src="img/icon_search.png" alt="돋보기아이콘">
                    </span>
                </div>
            </div>
        </div>
      -->
        <!-- 카테고리 -->


        <!--
            <div class="B" id="button1" onclick="show_div('1')" >
                <h3>
                    전체
                </h3>
            </div>
            <div class="B" id="button2" onclick="show_div('2')" >
                <h3>
                    구장예약
                </h3>
            </div>
            <div class="B" id="button3" onclick="show_div('3')" >
                <h3>
                    경기매치
                </h3>
            </div>
            <div class="B" id="button4" onclick="show_div('4')" >
                <h3>
                    팀관리
                </h3>
            </div>
            <div class="B" id="button5" onclick="show_div('5')" >
                <h3>
                    시설협력
                </h3>
            </div>
            <div class="B" id="button6" onclick="show_div('6')" >
                <h3>
                    이벤트
                </h3>
            </div>
            <div class="B bottom_border" id="button7" onclick="show_div('7')" >
                <h3>
                    공지사항
                </h3>
            </div>
        </div>
      -->

        <!-- 공지사항 글 상세 -->
        <div class="notice_detail_div">
            <p class="category_notice">공지사항</p>
            <h1 class="notice_title">
                <?=$row['title']?>
            </h1>
            <p class="notice_date">
                <?=$row['reg_date']?>
            </p>
            <div class="notice_content">
                <p>
                    <?=$row['word']?>
                </p>
            </div>
        </div>

        <button type="button" name="button" class="go_list gray_border">
            <a href="/match/cscenter_sub.php">목록으로</a>
        </button>


    </div>
</div>


<?include "./tail.php"?>
