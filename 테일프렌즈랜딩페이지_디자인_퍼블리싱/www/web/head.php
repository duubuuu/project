<?
include "./head_sub.php";
?>
<body>


<header>
  <div class="header">
    <a href="./" class="logo"><img src="../img/web/tail_logo.png" alt="로고" style="width: 70%;"></a>

    <nav>
      <ul class="menu">
        <li class="small_menu">
          <a href="use_guide.php">
            이용안내
            <span class="line"></span>
          </a>
        </li>
        <li class="small_menu">
          <a href="#">
            서비스안내
            <span class="line"></span>
          </a>
          <ul class="sub_menu2">
            <li>
              <a href="walking_service.php" class="tit"><span>산책 서비스</span></a>
            </li>
            <li>
              <a href="care_service.php" class="tit"><span>돌봄 서비스</span></a>
            </li>
          </ul>
        </li>
        <li class="small_menu">
          <a href="#">
            고객센터
            <span class="line"></span>
          </a>
          <ul class="sub_menu2">
            <li>
              <a href="notice.php" class="tit"><span>공지사항</span></a>
            </li>
            <li>
              <a href="question.php" class="tit"><span>자주 묻는 질문</span></a>
            </li>
            <li>
              <a href="customer_inquiry.php" class="tit"><span>고객문의</span></a>
            </li>
          </ul>
        </li>
      </ul><!-- 메뉴// -->
    </nav>

    <!-- 모바일 -->
    <button class="nav_btn">
      <span></span><span></span><span></span>
    </button>

  </div><!-- header// -->
</header>

<script>

$(function(){
  //네비화면
  $(".nav_btn").click(function(){
    $(".RightWrap").animate({right:0},500,"swing")
  });

  $(".close1").click(function(){
    $(".RightWrap").animate({right:'-100%'},500,"swing")
  });

  $('.m_menu > li').each(function() {
    var submenu = $(this).find('.sub');
    $(this).click(function(){
        $(submenu).stop().slideToggle();
    })
  });
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
});
</script>

<div class="content">
  <div class="fix-download-icon">
    <img src="../img/web/img_app_download.png" alt="앱다운로드img" style="width: 100%;">
  </div>
  <div id="move-top-button" style="cursor: pointer"><img src="../img/web/move-top-icon.png" id="move-top-buttonImg"></div>

  <div class="modal-popup" id="modal-popup">
    <div class="modal-content">
      <div class="modal-inner">
        <div class="title">
          <span><img src="../img/web/tail_logo.png" alt="로고" style="width: 10%;"></span>
          <span class="comma">,</span>
          <span style="padding-left: 5px;">간편하게 앱으로 만나보세요!</span>
        </div>
        <p class="txt-desc">앱 설치주소 메시지로 받기</p>
        <input class="phone-num-input" type="text" placeholder="휴대폰번호 11자리 입력 ('-' 제외)" style="">
        <div class="terms-box">
          <input type="checkbox" id="checkbox-accept-terms"><label for="checkbox-accept-terms">개인정보 수집/이용에 동의합니다.</label>
          <!-- <a href="#" style="text-decoration-line: underline; font-size: 15px; color: #434343a3;">내용보기</a> -->
        </div>
        <button class="send-btn" type="button">
          보내기
        </button>
        <div class="modal-popup-close">
          <img src="../img/web/ico_modal_popup_X.png" alt="모달팝업엑스icon" style="width: 8%; opacity: 75%;">
        </div>
      </div>
    </div>
  </div>
  <!-- 모달팝업 script -->
  <script type="text/javascript">
    $('.fix-download-icon').click(function(){
      $('.modal-popup').addClass("on");
      $('.fix-download-icon').addClass("on");
    });
    $('.modal-popup-close').click(function(){
      $('.modal-popup').removeClass("on");
      $('.fix-download-icon').removeClass("on");
    });
  </script>
