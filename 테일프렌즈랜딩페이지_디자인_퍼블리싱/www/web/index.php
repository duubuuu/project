<?include "./head.php"?>


<!-- 메인 -->
<!-- <div class="main">
  <img src="img/main.png" alt="">
</div> -->

<!-- Swiper 메인 -->
<div class="main">
  <div class="swiper-container mySwiper" style="position: relative; height: 100%;">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="swiper-slide__text-div">
          <p class="swiper-slide__title" style="word-spacing: -5px;">인증, 교육 받은 도그 워커</p>
          <p style="line-height: 150%;">
            산책로 설정으로 더욱 안전한 도심산책과<br>
            산책 전후 상태 체크를 통한 세심 케어
          </p>
        </div>
        <img src="../img/web/main_slide01.jpg" alt="메인슬라이드1">
      </div>
      <div class="swiper-slide">
        <div class="swiper-slide__text-div">
          <p class="swiper-slide__title" style="color: #fbb71e; ">찾아가는 프렌즈 놀이</p>
          <p style="line-height: 150%;">
            보호자를 대신한 맞춤 돌보미<br>
            반려견의 활동량을 풀어줄 수 있는<br>
            다양한 실내놀이 도구
          </p>
        </div>
        <img src="../img/web/main_slide02.jpg" alt="메인슬라이드2">
        <!-- <img src="../img/web/img_main_slide02.jpg" alt="메인슬라이드2"> -->
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    speed: 700,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
</script>
</div>

<!-- 홍보 영상 -->
<div class="video-box">
  <div class="inner">
    <video class="pr-video" controls="controls" src="../video/pr_video.mp4"></video>
  </div>
</div>


<!-- 테일프렌즈 의미소개 -->
<div class="" id="box1">
  <div class="inner">
    <p style="padding-bottom: 1rem; color: #434343b8; font-size: 1rem;">Show us your tail</p>
    <div class="logo_desc">
      <img src="../img/web/img_logo_desc02.png" alt="로고설명이미지" style="width: 100%;">
    </div>
    <div class="line-box">
      <h1 class="tail-txt" style="font-family: 'yg-jalnan'; line-height: 135%;">의사 소통 수단 '꼬리'<br>
      Tail+Friends
      </h1>
      <p class="tail-txt" style="font-size: 1.3rem; font-weight: 700;">반려견의 감정 신호를 읽어주는 친구</p>
      <p class="tail-txt" style="font-size: 1.3rem; padding-top: 0.2rem;">
        애완견이 아닌 보호자와 함께하는 “반려견”, 가족이며 친구의 의미를 담았습니다.
      </p>
    </div>
  </div>
</div>

<!-- 테일프렌즈 특징설명 -->
<div class="box2" id="box2">
  <div class="inner">
    <div class="box2__div" style="background-image: url(../img/web/img_main01.png);">
      <p class="tail-txt">
        반려견에 대한 이해와 소통을 기반으로<br>
      안전한 산책과 돌봄 서비스를<br>제공합니다.</p>
    </div>
    <div class="box2__div two" style="background-image: url(../img/web/img_main02.png);">
      <p class="tail-txt">
      반려견 성향에 맞춘 산책 장소와 방법을<br>
      제안합니다.<br>
      산책 중 만날 수 있는 다양한 자극과 <br>
      친해져요!
    </p>
    </div>
    <div class="box2__div" style="background-image: url(../img/web/img_main03.png);">
      <p class="tail-txt">
      프렌즈가 가져가는 장난감으로 놀면서<br>
      긍정적인 경험을 쌓을 수 있습니다.
    </p>
    </div>
  </div>
</div>


<!-- 인증,교육 받은 반려견 케어 전문 인력 -->
<div class="" id="box3">
  <div class="inner">
    <!-- 백그라운드로 이미지넣기 -->
    <h1>
      <span>인증, 교육 받은</span><br>
      반려견 케어 전문 인력
    </h1>
    <p class="tail-txt" style="padding-top: 2rem; font-size: 1.3rem;">
      성동구 반려견 돌봄 전문가 과정 이수<br>
      반려견 케어 협동 조합
    </p>
  </div>
</div>

<!-- 테일프렌즈의 다짐 -->
<div class="" id="box4">
  <div class="inner">
    <div class="title__div">
      <img src="../img/web/img_main05.png" alt="테일프렌즈의다짐" style="width: 100%;">
    </div>
    <!-- <h1 style="text-align: center; font-family: 'yg-jalnan';">테일프렌즈’s 다짐</h1> -->
    <div class="txt-set">
      <p class="tail-txt">
        <span class="list-style"><img src="../img/web/ic_list_style.png" alt="리스트_체크아이콘" style="width: 100%;"></span>
        테일프렌즈는 동물 보호법을 준수합니다.
      </p>
      <p class="tail-txt">
        <span class="list-style"><img src="../img/web/ic_list_style.png" alt="리스트_체크아이콘" style="width: 100%;"></span>
        테일프렌즈는 반려견에게 폭력 또는 강압적인<br>행위를 하지 않습니다.
      </p>
      <p class="tail-txt">
        <span class="list-style"><img src="../img/web/ic_list_style.png" alt="리스트_체크아이콘" style="width: 100%;"></span>
        테일프렌즈는 견종에 대한 선입견과 편견을 <br>갖지 않겠습니다.
      </p>
      <p class="tail-txt">
        <span class="list-style"><img src="../img/web/ic_list_style.png" alt="리스트_체크아이콘" style="width: 100%;"></span>
        테일프렌즈는 반려견의 행복과 안전을 추구합니다.
      </p>
      <p class="tail-txt">
        <span class="list-style"><img src="../img/web/ic_list_style.png" alt="리스트_체크아이콘" style="width: 100%;"></span>
        테일프렌즈는 항상 보호자와 반려견 입장에서 <br>생각하겠습니다.
      </p>
    </div>
  </div>
</div>


<!-- 전체 끝 -->


<?include "./tail.php"?>
