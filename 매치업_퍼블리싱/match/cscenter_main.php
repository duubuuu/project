<?
include_once("./_common.php");
include_once("./head.php");



$sql = "select * from freq_faq where topfive != '0' order by topfive desc";
$rs = sql_query($sql);


$sql = "select * from freq_faq where type='공지사항'";
$n_rs = sql_query($sql);

?>

<link href="./css/cscenter_main/cscenter_main.css?i=<?=$ranum?>" rel="stylesheet" ></link>



<script>

  $(document).ready(function(){


      $("#user_counseling").click(function(){
          $(".user_popup").show();
      });
      $("#user_close").click(function(){
          $(".user_popup").hide();
      });

      $("#boss_counseling").click(function(){
          $(".boss_popup").show();
      });
      $("#boss_close").click(function(){
          $(".boss_popup").hide();
      });



  $(".drop_down_div .question").on('click', function(){

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



  /* 검색 기능  */

  $('.search_input').keydown(function(e){

      if(e.keyCode == 13){

        var val =  $(this).val().trim();

        location.replace("cscenter_sub.php?val="+val+"&search=1");

      }

  });


  $('.icon_search').on('click', function(e){


        var val =  $('.search_input').val().trim();

        location.replace("cscenter_sub.php?val="+val+"&search=1");



  });



  });
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
    <div class="bg_img"></div>
    <div class="inner__2" style="text-align: initial; width: 70vw;">
        <div class="top">
            <div class="div_in_top">
                <p>안녕하세요, 고객지원서비스 입니다.
                    <br>궁금한게 있으시다고요?
                </p>
                <h1>무엇이든 물어보세요!</h1>
            </div>

            <div class="search_set">
                <input type="text" name="" value="" class="search_input" placeholder="검색어를 입력해주세요.">
                <span class="icon_search">
                    <img src="img/icon_search.png" alt="돋보기아이콘">
                </span>
            </div>
        </div>
        <!-- 카테고리 -->

        <div class="flex gray_border category_grid">
            <a href="cscenter_sub.php?type=구장예약">
                <div class="B">
                    <div class="img">
                        <img src="img/icon_cscenter01.png" alt="구장예약">
                    </div>
                    <h3>
                        구장예약
                    </h3>
                </div>
            </a>
            <a href="cscenter_sub.php?type=경기매치">
                <div class="B">
                    <div class="img">
                        <img src="img/icon_cscenter02.png" alt="경기매치">
                    </div>
                    <h3>
                        경기매치
                    </h3>
                </div>
            </a>
            <a href="cscenter_sub.php?type=팀관리" class="border_none">
                <div class="B">
                    <div class="img">
                        <img src="img/icon_cscenter03.png" alt="팀관리">
                    </div>
                    <h3>
                        팀관리
                    </h3>
                </div>
            </a>
            <div class="liner2" style="display: none;"></div>
            <a href="cscenter_sub.php?type=시설협력">
                <div class="B">
                    <div class="img">
                        <img src="img/icon_cscenter04.png" alt="시설협력">
                    </div>
                    <h3>
                        시설협력
                    </h3>
                </div>
            </a>
            <a href="cscenter_sub.php?type=이벤트">
                <div class="B">
                    <div class="img">
                        <img src="img/icon_cscenter05.png" alt="이벤트">
                    </div>
                    <h3>
                        이벤트
                    </h3>
                </div>
            </a>
            <a href="cscenter_sub.php?type=공지사항" style="border-right: none;">
                <div class="B">
                    <div class="img">
                        <img src="img/icon_cscenter06.png" alt="공지사항">
                    </div>
                    <h3>
                        공지사항
                    </h3>
                </div>
            </a>
        </div>
        <!-- 자주묻는 질문 -->
        <div class="questions">
            <div class="title">
                <span class="img">
                    <img src="img/icon_cscenter_logo.png" alt="매우작은매치업로고">
                </span>
                <span>자주 묻는 질문 Top5</span>
            </div>
            <div class="">



              <?
              $i=0;
              while($row = sql_fetch_array($rs)){?>


                <div class="drop_down_div gray_border" data-num="<?=$i?>"><!-- 드롭다운시 -->
                    <div class="Q flex question_style question" data-num="<?=$i?>">
                        <div class="Qleft">
                            <?=$row['type']?>
                        </div>
                        <div class="Qcenter">
                            <span><?=$row['title']?></span>
                        </div>
                        <div class="Qright">
                            <div class="">
                                <img src="./img/icon_CaretDown.png" alt="방향고정아래화살표 아이콘">
                            </div>
                        </div>
                    </div>
                    <div class="flex answer" id="answer">
                        <div class="Qleft"></div>
                        <div class="Qcenter">
                            <?=$row['word']?>
                        </div>
                        <div class="Qright"></div>
                    </div>
                </div>


              <?$i++;}?>


                <div class="more_btn gray_border" onclick="location.href = 'cscenter_sub.php'">
                    자주 묻는 질문 더보기
                </div>
            </div>
        </div>

        <!-- 공지사항 -->
        <div class="notice">
            <div class="title">
                <span class="img">
                    <img src="img/icon_cscenter_logo.png" alt="img">
                </span>
                <span>공지사항</span>
            </div>

            <div class="gray_border">



              <?
              $i=0;
              while($row = sql_fetch_array($n_rs)){?>



                  <div class="Q flex">
                      <div class="Qleft">
                          공지사항
                      </div>


                      <div class="Qcenter">
                          <a href="notice_detail.php?num=<?=$row['num']?>">
                            <?=trim($row['title'])?>
                          </a>
                      </div>

                      <div class="Qright">
                          <?=date("y.m.d", strtotime(trim($row['reg_date'])) )?>
                      </div>
                  </div>


                <?if($i%2==0){?>
                  <div class="liner"></div>
                <?}?>

              <?$i++;}?>






            </div>

            <div class="more_btn gray_border" onclick="location.href = 'cscenter_sub.php?type=공지사항'">
                공지사항 더보기
            </div>
        </div>

        <!-- 상담안내 -->
        <div class="cscenter">
            <div class="title">
                <span class="img">
                    <img src="img/icon_cscenter_logo.png" alt="img">
                </span>
                <span>안녕하세요.</span><span class="down_span" style="margin-left: 0.5rem;">도움이 필요하신가요?</span>
            </div>
            <div class="cscenter_btn_set">
                <p class="left">매치업 온라인 도움센터를 통해 궁금증을 해결하세요.</p>
                <p class="right">전화 도움센터</p>
                <!-- 이용자 상담 버튼 -->
                <div class="Wleft gray_border" id="user_counseling">
                    <h3 class="W_title">이용자 상담</h3>
                    <p>
                        원하는 시간에 궁금증을<br>1:1채팅으로 상담할 수 있습니다.
                    </p>
                </div>
                <!-- 끝 -->
                <!-- 사장님 상담 버튼 -->
                <div class="Wleft gray_border" id="boss_counseling">
                    <h3 class="W_title">사장님 상담</h3>
                    <p>
                        원하는 시간에 궁금증을<br>1:1채팅으로 상담할 수 있습니다.
                    </p>
                </div>
                <!-- 끝 -->
                <!-- 전화 도움센터 버튼 -->
                <div class="W_half gray_border">
                    <p>대표번호 <span>
                        <a href="tel:1644-8420">1644-8420</a>
                    </span></p>
                    <span class="icon">
                        <img src="img/icon_call.png" alt="전화기아이콘">
                    </span>
                </div>
                <!-- 끝 -->
            </div>
        </div>
    </div>
</div>

<!-- 이용자 상담 팝업 -->
<div class="user_popup" id="user_counseling_popup" style="display: none;">

  <div class="counseling_popup">

    <div class="top">
        <h3>이용자 상담</h3>

        <a href="https://pf.kakao.com/_FBDJj" target="_blank">
            <div class="flex">
                <div class="img">
                    <img src="../img/icon_big_kakao_ch.png" alt="카카오톡채널아이콘">
                </div>
                <div class="text">
                    <p>
                        <strong>매치업</strong><br>
                        카카오톡으로 간편하게<br>
                        상담할 수 있습니다.
                    </p>
                </div>
            </div>
        </a>

    </div>
    <div class="bottom" id="user_close">
        닫기
    </div>

 </div>

</div>
<!-- 사장님 상담 팝업 -->
<div  class="boss_popup" id="boss_counseling_popup" style="dispaly: none;">

  <div class="counseling_popup">
    <div class="top">
        <h3>사장님 상담</h3>

        <a href="https://pf.kakao.com/_xkJvRxb" target="_blank">
            <div class="flex">
                <div class="img">
                    <img src="../img/icon_big_kakao_ch.png" alt="카카오톡채널아이콘">
                </div>
                <div class="text">
                    <p>
                        <strong>매치업 기업회원 전용</strong><br>
                        카카오톡으로<br>
                        상담할 수 있습니다.
                    </p>
                </div>
            </div>
        </a>

    </div>
    <div class="bottom" id="boss_close">
        닫기
    </div>
  </div>

</div>

<?include "./tail.php"?>
