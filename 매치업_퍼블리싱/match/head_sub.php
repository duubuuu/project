<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />

  <title>매치업</title>
	<meta name="Keywords" content="축구/풋살 NO.1 플랫폼 매치업 :) 구장 간편예약, 실시간 경기매치, 채팅하기 소셜매치, 점령전, 팀관리, 전술판, 할인쿠폰&포인트적립, 커뮤니티, 시설관리전용프로그램, 스포츠시설컨설팅, 비즈니스 운영 컨설팅 등 전국 축구/풋살 생활체육시민과 체육시설자영업자의 편의를 위한 최적의 솔루션 서비스를 제공드리고 있습니다.">
	<meta name="Description" content="축구/풋살 NO.1 플랫폼 매치업 :) 구장 간편예약, 실시간 경기매치, 채팅하기 소셜매치, 점령전, 팀관리, 전술판, 할인쿠폰&포인트적립, 커뮤니티, 시설관리전용프로그램, 스포츠시설컨설팅, 비즈니스 운영 컨설팅 등 전국 축구/풋살 생활체육시민과 체육시설자영업자의 편의를 위한 최적의 솔루션 서비스를 제공드리고 있습니다.">
	<meta property="og:description" content="축구/풋살 NO.1 플랫폼 매치업 :) 구장 간편예약, 실시간 경기매치, 채팅하기 소셜매치, 점령전, 팀관리, 전술판, 할인쿠폰&포인트적립, 커뮤니티, 시설관리전용프로그램, 스포츠시설컨설팅, 비즈니스 운영 컨설팅 등 전국 축구/풋살 생활체육시민과 체육시설자영업자의 편의를 위한 최적의 솔루션 서비스를 제공드리고 있습니다.." />
  <link href="/match/css/common.css" rel="stylesheet">
  <link href="/match/css/style.css?i=<?=$ranum?>" rel="stylesheet">

  <link href="common_css/datatable/datatable.css?i=<?=$ranum?>" rel="stylesheet">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="/match/js/swal/swal.js"></script>
  <script src="/match/js/clipboard/clipboard.js"></script>
  <script src="/match/js/fastclick/fastclick.js"></script>

  <script src="/match/common_js/datatable/datatable.js"></script>
  <script src="/match/common_js/moment/moment.js"></script>
<meta name="twitter:image" content="https://www.match-up.co.kr/img/sns_logo.png">
<link rel="shortcut icon" href="/img/favicon_72.png" />
<link rel="apple-touch-icon" type="image/x-ico" sizes="72x72" href="/img/favicon_72.png" />
<link rel="apple-touch-icon" type="image/x-ico" sizes="144x144" href="/img/favicon_144.png" />
<link rel="apple-touch-icon" type="image/x-ico" sizes="180x180" href="/img/favicon_180.png" />
<link rel="apple-touch-icon" type="image/x-ico" sizes="192x192" href="/img/favicon_192.png" />

  <script>

  var dev_login_check = "<?=device_check();?>";
  // stop-dragging의 위치를 읽어옴
  $( document ).ready(function() {
    var postions          = [];
    settingPostions();

    $('.snb li a').on("click", function(){
      // 스크롤
      var index             = $(this).data('index');
      var offset            = postions[index].top;
      var headerHeight      = $("header").height();
      offset            = offset - headerHeight - 50;
      $('html, body').stop().animate({ scrollTop: offset }, 1000);
    });

    function settingPostions(){
      postions          = [];
      $(".stop-dragging").each(function(index, item){
        if(!$(this).hasClass("mobile")){
          var obj       = $(".stop-dragging").eq(index);
          postions.push( obj.offset() )
        }
      })
    }

    // 브라우저 사이즈가 바뀌었을 때 포지션을 다시 읽기
    $(window).resize(function(){
      settingPostions();
    });

    // 스크롤 위치 읽어서 좌측 메뉴에 로고 아이콘 표시
    $( window ).scroll(function() {
      var scr               = document.documentElement.scrollTop;
      var headerHeight      = $("header").height();
      scr               = scr + headerHeight + 100;

      // 자측 Nav에 매치업 아이콘 표ㅣ
      $.each(postions, function(index, item){
        let check = item.top;
        if( scr >= check ){
          $(".snb__logo").hide();
          $(".snb a").removeClass('snb_a_active');
          $(".snb__logo").eq(index).show();
          $(".snb a").eq(index).addClass('snb_a_active');
        }
      });

      // 좌측 Nav 스크롤 따라오도록 작업
      var firstObjOffset  = $(".stop-dragging").eq(0).offset().top;
      var leftNavScr      = scr - firstObjOffset;
      leftNavScr      = leftNavScr < 0 ? 0 : leftNavScr;
      $(".snb_wrap").stop().animate({ 'marginTop': leftNavScr}, 600);
    });
  });



  if ('addEventListener' in document) {
    document.addEventListener('DOMContentLoaded', function() {
      FastClick.attach(document.body);
    }, false);
  }




  </script>

</head>
