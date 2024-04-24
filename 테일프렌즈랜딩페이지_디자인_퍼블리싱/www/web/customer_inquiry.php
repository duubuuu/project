<?include "./head.php"?>

<!-- 내비게이션 바 -->
<div class="navigation_bar" style="background-image: url(../img/web/img_nav_customer_inquiry02.jpg); background-position: center -35rem;">
  <h1>고객문의</h1>
</div>

<!-- 고객문의 -->
<div class="customer_inquiry_box1">
  <h1 class="big-title">고객문의</h1>
  <p class="big-title__p">
    궁금하신 사항이 있다면 문의해 주세요.
  </p>
  <div class="inner">
    <div class="customer_inquiry_div" style="border-top: 2px solid #434343; margin-top: 4rem;">
      <h2 style="padding-left: 1rem;">이메일</h2>
      <p><a href="#">tailfriends@naver.com</a></p>
    </div>
    <div class="customer_inquiry_div">
      <h2>
        <!-- <span style="width: 1.8rem; display: inline-flex; margin-right: 0.5rem;"><img src="../img/web/ic_kakaotalk-1.png" alt="카카오톡아이콘" style="width: 100%;"></span> -->
        카카오톡
      </h2>
      <p class="tail-txt_02">
        <span style="width: 1.8rem; display: inline-flex;"><img src="../img/web/ic_kakaotalk-1.png" alt="카카오톡아이콘" style="width: 100%;"></span>
        <span class="kakaotalk-btn02">1:1 문의</span> <span style="font-size: 1.176rem;">운영시간 : 평일 09:00~18:00</span>
      </p>
      <div class="kakaotalk-link02" >
        문의 필요시 클릭 해주세요.
      </div>
    </div>

  </div>
</div>

<script>
  $('.kakaotalk-btn02').on("mouseover",function(){
    $('.kakaotalk-link02').addClass("on");
    // $('.tail_time').hide();
    // $(".tail-txt_01").addClass("on")
  });
  $('.tail-txt_02').on("mouseleave",function(){
    $('.kakaotalk-link02').removeClass("on");
    // $('.tail_time').show();
    // $(".tail-txt_01").removeClass("on")
  });
</script>


<?include "./tail.php"?>
