<?
include "./head_sub.php";


$move = $_REQUEST['move'];

?>



<body>

  <div class="black_overlay">

  </div>

<header>
    <div class="black_overlay">
    </div>
  <div class="header">
    <a href="./" class="logo"><img src="/match/img/logo.png" alt="로고"></a>
    <!-- <a href="main.php" class="logo"><img src="/match/img/logo.png" alt="로고"></a> -->

    <nav>
      <ul class="menu">
        <li>
          <a href="#">
            매치업
            <span class="line"></span>
          </a>
          <div class="sub_menu_box">
            <ul class="sub_menu">
              <li data-list="1">
                <a href="introduce_matchup.php" class="tit"><span>매치업 소개</span></a>
                <a href="introduce_matchup.php?move=1" ><span>매치업 문화</span></a>
                <a href="introduce_matchup.php?move=2" ><span>걸어온 길</span></a>
                <a href="introduce_matchup.php?move=3" ><span>CI</span></a>
                <a href="introduce_matchup.php?move=4" ><span>윤리규정</span></a>
                <a href="introduce_matchup.php?move=5" ><span>운영방침</span></a>
              </li>
              <li data-list="2">
                <a href="platform_matchup.php" class="tit"><span>플랫폼 매치업</span></a>
                <a href="platform_matchup.php?move=1" ><span>소개</span></a>
                <a href="platform_matchup.php?move=2" ><span>이용자 서비스</span></a>
                <a href="platform_matchup.php?move=3"  ><span>시설주 서비스</span></a>
                <a href="platform_matchup.php?move=4" ><span>가맹신청</span></a>
                <a href="platform_matchup.php?move=5" ><span>제휴제안</span></a>
              </li>
              <li data-list="3">
                <a href="matchup_consultant.php" class="tit"><span>매치업 컨설턴트</span></a>
                <a href="matchup_consultant.php?move=1" ><span>소개</span></a>
                <a href="matchup_consultant.php?move=2" ><span>스포츠시설 컨설팅</span></a>
                <a href="matchup_consultant.php?move=3" ><span>비즈니스 운영 컨설팅</span></a>
                <a href="matchup_consultant.php?move=4" ><span>창업 컨설팅</span></a>
                <a href="matchup_consultant.php?move=5" ><span>교육 컨설팅</span></a>
              </li>
              <li data-list="4">
                <a href="field_manager.php" class="tit"><span>필드매니저</span></a>
                <a href="field_manager.php?move=1" ><span>소개</span></a>
                <a href="field_manager.php?move=2" ><span>Sports Wear</span></a>
                <a href="field_manager.php?move=3" ><span>Sports goods</span></a>
                <a href="field_manager.php?move=4" ><span>운영안내</span></a>
              </li>
              <li data-list="5">
                <a href="sports_marketing.php" class="tit"><span>스포츠 마케팅</span></a>
                <a href="sports_marketing.php?move=1" ><span>매치업 광고</span></a>
                <a href="sports_marketing.php?move=2" ><span>온라인 마케팅</span></a>
                <a href="sports_marketing.php?move=3" ><span>콘텐츠 제작</span></a>
              </li>
              <li data-list="6">
                <a href="matchup_academy.php" class="tit"><span>매치업 아카데미</span></a>
                <a href="matchup_academy.php?move=1" ><span>소개</span></a>
                <a href="matchup_academy.php?move=2" ><span>교육철학</span></a>
                <a href="matchup_academy.php?move=3" ><span>서비스</span></a>
                <a href="matchup_academy.php?move=4" ><span>지점안내</span></a>
              </li>
            </ul>
          </div>
        </li><!-- 매치업// -->

        <li>
          <a href="#">
            서비스
            <span class="line"></span>
          </a>
          <div class="sub_menu_box">
            <ul class="sub_menu">
              <li>
                <a href="intermediation.php" class="tit"><span>이용중개</span></a>
                <a href="intermediation.php?move=1"><span>위치기반 서비스</span></a>
                <a href="intermediation.php?move=2"><span>구장예약</span></a>
                <a href="intermediation.php?move=3"><span>할인쿠폰·포인트적립</span></a>
                <a href="intermediation.php?move=4"><span>실시간 경기매치</span></a>
              </li>
              <li>
                <a href="match_match.php" class="tit"><span>경기매치</span></a>
                <a href="match_match.php?move=1"><span>팀 매치</span></a>
                <a href="match_match.php?move=2"><span>용병 매치</span></a>
                <a href="match_match.php?move=3"><span>소셜 매치</span></a>
                <a href="match_match.php?move=4"><span>점령전</span></a>
              </li>
              <li>
                <a href="community.php" class="tit"><span>커뮤니티</span></a>
                <a href="community.php?move=1"><span>자유게시판</span></a>
                <a href="community.php?move=2"><span>팀 홍보 게시판</span></a>
                <a href="community.php?move=3"><span>중고거래</span></a>
                <a href="community.php?move=4"><span>리그·대회</span></a>
              </li>
              <li>
                <a href="team_manager.php" class="tit"><span>Team manager</span></a>
                <a href="team_manager.php?move=1"><span>팀 생성·검색</span></a>
                <a href="team_manager.php?move=2"><span>팀원관리</span></a>
                <a href="team_manager.php?move=3"><span>전술판</span></a>
                <a href="team_manager.php?move=4"><span>팀 매치관리</span></a>
              </li>
              <li>
                <a href="facility_manager.php" class="tit"><span>시설관리자</span></a>
                <a href="facility_manager.php?move=1"><span>시설정보관리</span></a>
                <a href="facility_manager.php?move=2"><span>구장정보관리</span></a>
                <a href="facility_manager.php?move=3"><span>결제예약관리</span></a>
                <a href="facility_manager.php?move=4"><span>고객정보관리</span></a>
                <a href="facility_manager.php?move=5"><span>구장캠페인</span></a>
                <a href="facility_manager.php?move=6"><span>정산관리</span></a>
              </li>
            </ul>
          </div>
        </li><!-- 서비스// -->
        <li>
          <a href="cscenter_main.php">
            고객지원
            <span class="line"></span>
          </a>
        </li><!-- 고객지원// -->

        <li class="small_menu">
          <a href="#">
            이용신청
            <span class="line"></span>
          </a>
          <ul class="sub_menu2">
            <li>
              <a href="application.php" class="tit"><span>시설 관리자</span></a>
            </li>
            <li><div class="liner"></span></li>
            <li>
              <a href="application.php" class="tit"><span>광고신청</span></a>
            </li>
          </ul>
        </li><!-- 이용신청// -->

        <li class="small_menu download">
          <a href="download.php">
            다운로드
            <span class="line"></span>
          </a>
          <ul class="sub_menu2">
            <li>
              <a href="download.php" class="tit"><span>Android</span></a><span class="sub_menu2_img_1"><img src="/match/img/android_mark.png" alt="안드로이드마크" style="width: 100%;"></span>
            </li>
            <li><div class="liner"></span></li>
            <li>
              <a href="download.php" class="tit"><span>IOS</span></a>
              <span class="sub_menu2_img_2"><img src="/match/img/ios_mark.png" alt="애플마크" style="width: 100%;"></span>
            </li>
          </ul>
        </li><!-- 다운로드// -->
      </ul><!-- 메뉴// -->
    </nav>

    <div class="mobile_right_set">
        <ul class="sns">
          <li class="tel_li">
            <a href="#"><img src="/match/img/ic_call-1.png" alt="전화"></a>
            <!-- <a href="tel:1644-8420"><img src="/match/img/ic_call-1.png" alt="전화"></a> -->
          </li>
          <!-- pc 전화하기 아이콘 작동 div -->
          <div class="container" id="tel_li_div" style="display: n1;">
              <div class="icon_x">
                  <img src="./img/icon_X.png" alt="엑스아이콘" style="width: 100%;">
              </div>
              <h3>고객센터 전화번호</h3>
              <div class="copy">
                <form>
                  <input type="text" value="1644-8420" readonly>
                  <button type="button">Copy</button>
                </form>
              </div>
          </div>
          <li class="email_li">
            <a href="#"><img src="/match/img/ic_mail-1.png" alt="메일"></a>
          </li>
          <!-- 이메일아이콘 작동 div -->
          <div class="container" id="email_li_div" style="display: n1;">
              <div class="icon_x">
                  <img src="./img/icon_X.png" alt="엑스아이콘" style="width: 100%;">
              </div>
              <h3>이메일 주소 복사</h3>
              <div class="copy">
                <form>
                  <input type="text" value="akdong_corp@naver.com" readonly>
                  <button type="button">Copy</button>
                </form>
              </div>
          </div>
          <script>
              (function() {
                var copyButton = document.querySelector('.copy button');
                var copyInput = document.querySelector('.copy input');
                copyButton.addEventListener('click', function(e) {
                  e.preventDefault();
                  var text = copyInput.select();
                  document.execCommand('copy');
                });

                copyInput.addEventListener('click', function() {
                  this.select();
                });
              })();

              $('.tel_li').on("click",function(){

                  var device = deviceCheck();

                  console.log(device);

                  if(device == "pc"){
                      $('#tel_li_div').show();
                  }
                  else if(device = "mobile"){

                  }


              });
              $('.icon_x').on("click",function(){
                  $('#tel_li_div').hide();
              });
              $('.email_li').on("click",function(){
                  $('#email_li_div').show();
              });
              $('.icon_x').on("click",function(){
                  $('#email_li_div').hide();
              });
          </script>
          <li>
            <a href="https://www.facebook.com/no1.matchup" target='_blank'><img src="/match/img/ic_facebook-1.png" alt="페이스북"></a>
          </li>
          <li>
            <a href="https://www.instagram.com/no1.matchup/" target='_blank'><img src="/match/img/ic_instagram-1.png" alt="인스타그램"></a>
          </li>
          <li>
            <a href="https://blog.naver.com/akdong_corp" target='_blank'><img src="/match/img/ic_naverblog-1.png" alt="네이버블로그"></a>
          </li>
          <li>
            <a href="http://pf.kakao.com/_FBDJj" target='_blank'><img src="/match/img/ic_kakaotalk-1.png" alt="카카오톡"></a>
          </li>
          <li>
            <a href="http://pf.kakao.com/_xkJvRxb" target='_blank'><img src="/match/img/ic_kakaoch-1.png" alt="카카오채널"></a>
          </li>
        </ul><!-- sns // -->
        <!-- 모바일 -->
        <button class="nav_btn">
          <span class="nav_btn_span"></span><span class="nav_btn_span"></span><span class="nav_btn_span"></span>
        </button>
    </div>


    <div class="RightWrap">



      <div class="box">
        <div id="wrap_head">
          <!-- <a href="#" class="close1">X</a> -->
          <ul class="m_menu">
            <li>
              <a href="#" class="m_menu_title">
                  <span class="m_menu_img">
                      <img src="./img/m_menu01.png" alt="매치업로고" style="width: 60%;">
                  </span>
                  매치업
              </a>
              <ul class="sub">
                <li>
                  <a href="introduce_matchup.php"><span class="arrow_font">></span> 매치업 소개</a>
                  <ul class="sub_sub">
                    <li><a href="introduce_matchup.php">매치업 문화</a></li>
                    <li><a href="introduce_matchup.php?move=2">걸어온 길</a></li>
                    <li><a href="introduce_matchup.php?move=3">CI</a></li>
                    <li><a href="introduce_matchup.php?move=4">윤리규정</a></li>
                    <li><a href="introduce_matchup.php?move=5">운영방침</a></li>
                  </ul>
                </li>
                <li>
                  <a href="platform_matchup.php"><span class="arrow_font">></span> 플랫폼 매치업</a>
                  <ul class="sub_sub">
                    <li><a href="platform_matchup.php">소개</a></li>
                    <li><a href="platform_matchup.php?move=2">이용자 서비스</a></li>
                    <li><a href="platform_matchup.php?move=3">시설주 서비스</a></li>
                    <li><a href="platform_matchup.php?move=4">가맹신청</a></li>
                  </ul>
                </li>
                <li>
                  <a href="matchup_consultant.php"><span class="arrow_font">></span> 매치업 컨설턴트</a>
                  <ul class="sub_sub">
                    <li><a href="matchup_consultant.php">소개</a></li>
                    <li><a href="matchup_consultant.php?move=2">스포츠시설 컨설팅</a></li>
                    <li><a href="matchup_consultant.php?move=3" style="letter-spacing: -1px;">비즈니스 운영 컨설팅</a></li>
                    <li><a href="matchup_consultant.php?move=4">창업 컨설팅</a></li>
                    <li><a href="matchup_consultant.php?move=5">교육 컨설팅</a></li>
                  </ul>
                </li>
                <li>
                  <a href="field_manager.php"><span class="arrow_font">></span> 필드매니저</a>
                  <ul class="sub_sub">
                    <li><a href="field_manager.php">소개</a></li>
                    <li><a href="field_manager.php?move=2">Sports Wear</a></li>
                    <li><a href="field_manager.php?move=3">Sports goods</a></li>
                    <li><a href="field_manager.php?move=4">운영안내</a></li>
                  </ul>
                </li>
                <li>
                  <a href="sports_marketing.php"><span class="arrow_font">></span> 스포츠 마케팅</a>
                  <ul class="sub_sub">
                    <li><a href="sports_marketing.php">매치업 광고</a></li>
                    <li><a href="sports_marketing.php?move=2">온라인 마케팅</a></li>
                    <li><a href="sports_marketing.php?move=3">콘텐츠 제작</a></li>
                  </ul>
                </li>
                <li>
                  <a href="matchup_academy.php"><span class="arrow_font">></span> 매치업 아카데미</a>
                  <ul class="sub_sub">
                    <li><a href="matchup_academy.php">소개</a></li>
                    <li><a href="matchup_academy.php?move=2">교육철학</a></li>
                    <li><a href="matchup_academy.php?move=3">서비스</a></li>
                    <li><a href="matchup_academy.php?move=4">지점안내</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>
              <a href="#" class="m_menu_title">
                  <span class="m_menu_img">
                      <img src="./img/m_menu02.png" alt="서비스" style="width: 35%;">
                  </span>
                  서비스</a>
              <ul class="sub">
                <li>
                  <a href="intermediation.php"><span class="arrow_font">></span> 이용중개</a>
                  <ul class="sub_sub">
                    <li><a href="intermediation.php">위치기반 서비스</a></li>
                    <li><a href="intermediation.php?move=2">구장예약</a></li>
                    <li><a href="intermediation.php?move=3">할인쿠폰·포인트적립</a></li>
                    <li><a href="intermediation.php?move=4">실시간 경기매치</a></li>
                  </ul>
                </li>
                <li>
                  <a href="match_match.php"><span class="arrow_font">></span> 경기매치</a>
                  <ul class="sub_sub">
                    <li><a href="match_match.php">팀 매치</a></li>
                    <li><a href="match_match.php?move=2">용병 매치</a></li>
                    <li><a href="match_match.php?move=3">소셜 매치</a></li>
                    <li><a href="match_match.php?move=4">점령전</a></li>
                  </ul>
                </li>
                <li>
                  <a href="community.php"><span class="arrow_font">></span> 커뮤니티</a>
                  <ul class="sub_sub">
                    <li><a href="community.php">자유게시판</a></li>
                    <li><a href="community.php?move=2">팀 홍보 게시판</a></li>
                    <li><a href="community.php?move=3">중고거래</a></li>
                    <li><a href="community.php?move=4">리그·대회</a></li>
                  </ul>
                </li>
                <li>
                  <a href="team_manager.php"><span class="arrow_font">></span> Team manager</a>
                  <ul class="sub_sub">
                    <li><a href="team_manager.php">팀 생성·검색</a></li>
                    <li><a href="team_manager.php?move=2">팀원관리</a></li>
                    <li><a href="team_manager.php?move=3">전술판</a></li>
                    <li><a href="team_manager.php?move=4">팀 매치관리</a></li>
                  </ul>
                </li>
                <li>
                  <a href="facility_manager.php"><span class="arrow_font">></span> 시설관리자</a>
                  <ul class="sub_sub">
                    <li><a href="facility_manager.php">시설정보관리</a></li>
                    <li><a href="facility_manager.php?move=2">구장정보관리</a></li>
                    <li><a href="facility_manager.php?move=3">결제예약관리</a></li>
                    <li><a href="facility_manager.php?move=4">고객정보관리</a></li>
                    <li><a href="facility_manager.php?move=5">구장캠페인</a></li>
                    <li><a href="facility_manager.php?move=6">정산관리</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#"></a>
                </li>
              </ul>
            </li>
            <li>
              <a href="cscenter_main.php" class="m_menu_title">
                  <span class="m_menu_img">
                      <img src="./img/m_menu03.png" alt="매치업로고" style="width: 61%;">
                  </span>
                  고객지원</a>
            </li>
            <li>
              <a href="#" class="m_menu_title">
                  <span class="m_menu_img">
                      <img src="./img/m_menu04.png" alt="매치업로고" style="width: 50%;">
                  </span>
                  이용신청</a>
              <ul class="sub">
                  <li>
                    <a href="application.php"><span class="arrow_font">></span> 시설 관리자</a>
                  </li>
                  <li>
                    <a href="application.php?move=2"><span class="arrow_font">></span> 광고신청</a>
                  </li>
                  <!-- <li>
                    <a href="#"></a>
                  </li>
                  <li>
                    <a href="#"></a>
                  </li>
                  <li>
                    <a href="#"></a>
                  </li>
                  <li>
                    <a href="#"></a>
                  </li> -->
              </ul>
            </li>
            <li>
              <a href="download.php" class="m_menu_title">
                  <span class="m_menu_img">
                      <img src="./img/m_menu05.png" alt="매치업로고" style="width: 55%;">
                  </span>
                  다운로드</a>
            </li>
            <div class="m_menu_bottom">
                <p>
                    SNS에서 매치업의 하루를 들여다 보세요.
                </p>
                <div class="flex">
                  <a href="https://www.facebook.com/no1.matchup/?ref=pages_you_manage" style="display:flex;">
                    <span class="img">
                        <img src="./img/m_menu06.png" alt="페북" style="width: 55%;">
                    </span>
                    <span class="txt m_menu_sns" style="position:relative;top:-1px;">페이스북</span>
                  </a>
                </div>
                <div class="flex">
                  <a href="https://instagram.com/no1.matchup?utm_medium=copy_link" style="display:flex;">
                    <span class="img">
                        <img src="./img/m_menu07.png" alt="인스타그램" style="width: 55%;">
                    </span>
                    <span class="txt m_menu_sns" style="position:relative;top:-1px;">인스타그램</span>
                  </a>
                </div>
            </div>
          </ul>
        </div>
      </div>
    </div>

  </div><!-- header// -->
</header>

<script>

$(function(){
  //네비화면
  $(".nav_btn").click(function(){
    $(".black_overlay").css("display", "block");
    $(".RightWrap").animate({right:0},500,"swing")
  });

  $(".close1").click(function(){
    $(".RightWrap").animate({right:'-100%'},500,"swing")
  });

  /*

  $('.m_menu > li').each(function() {
    var submenu = $(this).find('.sub');
    $(this).click(function(){
        $(submenu).stop().slideToggle();
    })
  });

  */
});

// 상단이동아이콘
$(window).scroll(function() {
    // top button controll
    if ($(this).scrollTop() > 500) {
        $('#move-top-button').fadeIn();
    } else {
        $('#move-top-button').fadeOut();
    }
});
$(document).ready(function() {
  // Top Button click event handler
  $("#move-top-buttonImg").click(function() {
    $('html, body').animate({scrollTop:0}, '300');
  });



  var width = screen.availWidth;
  var move = "<?=$move?>";

  if(move != ""){

    var parents = "";

    if(width > 768){
      parents = "pc";
    }
    else{
      parents = "mobile";
    }

    move = "#"+move+parents;

    console.log(move);

    var offset = $(move).offset().top;

    console.log("offset : " +offset);

    $("html, body").animate({
      scrollTop : offset -100
    }, 1000);

  }
});







// 모바일 위주로 구별
var mobileKeyWords = new Array('iPh1', 'iPod', 'BlackBerry', 'Android', 'Windows CE', 'Windows CE;', 'LG', 'MOT', 'SAMSUNG', 'SonyEricsson', 'Mobile', 'Symbian', 'Opera Mobi', 'Opera Mini', 'IEmobile');




// PC, MOBILE 구별
function deviceCheck() {
  // 디바이스 종류 설정
  var pcDevice = "win16|win32|win64|mac|macintel";

  // 접속한 디바이스 환경
  if ( navigator.platform ) {
    if ( pcDevice.indexOf(navigator.platform.toLowerCase()) < 0 ) {
      return "mobile";
    } else {
      return "pc";
    }
  }
}



$(".m_menu > li").on('click', function(){


    if(!$(this).hasClass("on")){
      $(this).addClass("on");
      $(this).find("ul.sub").css("display","flex");
    }
    else{
      $(this).removeClass("on");
      $(this).find("ul.sub").css("display","none");
    }
});




$(window).on("scroll", function () {


    var tail_height = $(".tail").height();

    if(tail_height > 150){
       tail_height = tail_height + 10;
    }
    else{
      tail_height = tail_height + 10;
    }


    var bottom_cert = detectBottom();

    //console.log(bottom_cert);

    if(bottom_cert){
      $(".fix-download-icon").css("transition", "all 0.3s ease-in").css("bottom", tail_height+"px");
    }
    else{
      $(".fix-download-icon").css("transition", "all 0.3s ease-in").css("transform", "translateY(-50%)").css("bottom", "0px");
    }


});


function detectBottom() {
  var scrollTop = $(window).scrollTop();
  var innerHeight = $(window).innerHeight();
  var scrollHeight = $('body').prop('scrollHeight');
  if (scrollTop + innerHeight >= scrollHeight) {
    return true;
  } else {
    return false;
  }
}



$(document).on('click', function(e){
   var classname = e.target.className;

   console.log(classname);

   if(classname != "RightWrap" && classname != "nav_btn_span" && classname != "nav_btn" && classname != "m_menu_title" && classname != "m_menu_sns"){
     $(".black_overlay").css("display", "none");
     $(".RightWrap").animate({
       right: "-100%"
     })
   }
});






</script>




<div class="content">
  <div class="fix-download-icon">


    <a class="pc" href="download.php" style="position:relative;left:-20px;top:-10px;">
      <img src="/match/img/ic_matchupdownload.png" alt="매치업다운로드아이콘" style="width: 100%;">
    </a>

    <a class="mobile" href="download.php" style="position:relative;left:40px;">
      <img src="/match/img/ic_matchupdownload.png" alt="매치업다운로드아이콘" style="width: 150px;">
    </a>

    <a class="mobile" style="position:relative;left: 82px;">
      <img src="/img/move-top-icon02.png" id="move-top-button" onclick="window.scrollTo(0,0);" style="width:40px;">
    </a>


    <a class="pc" style="position:relative;left: 35px;top:-10px;">
      <img src="./img/move-top-icon02.png" id="move-top-button" onclick="window.scrollTo(0,0);" style="width:50px;">
    </a>

  </div>
