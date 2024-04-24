</div>

<div class="tail">
  <div class="tail-top">
    <div class="inner">
      <span><img src="../img/web/tail_logo.png" alt="푸터로고" style="width: 45%;"></span>
      <ul>
        <li style="cursor: pointer">블로그</li>
        <li style="cursor: pointer">인스타그램</li>
      </ul>
    </div>
  </div>
  <div class="inner">
    <h3 style="font-size: 2rem; padding: 3rem 0 2rem;">문의하기</h3>
    <div class="tail-box-set">
      <div class="tail-box" style="margin-right: 2rem;">
        <div class="title">
          이메일
        </div>
        <p class="tail-txt">
          <a href="#">tailfriends@naver.com</a>
        </p>
      </div>
      <div class="tail-box">
        <div class="title">
          카카오톡
        </div>
        <div class="tail-txt tail-txt_01">
          <p class="kakaotalk-btn" style="cursor: pointer;">1:1 문의
            <span class="ic-kakao"><img src="../img/web/ic_kakaotalk-1.png" style="width: 100%;"></span>
            <div class="kakaotalk-link" >
              문의 필요시 클릭 해주세요.
            </div>
          </p>
          <p style="font-size: 14px; font-weight: 500; margin-top: 10px;" class="tail_time">운영시간 : 평일 09:00~18:00</p>
        </div>
      </div>
    </div>
    <div class="tail_copy">
      <div class="inner" style="padding: 0; font-size: 11px;">
        서울시 성동구 광나루로 275 315-30<br>
        ⒸTAIL FRENDS. All rights reserved.
      </div>
    </div>
  </div>
</div>

<script>
  $('.kakaotalk-btn').on("mouseover",function(){
    $('.kakaotalk-link').addClass("on");
    // $('.tail_time').hide();
    // $(".tail-txt_01").addClass("on")
  });
  $('.tail-txt_01').on("mouseleave",function(){
    $('.kakaotalk-link').removeClass("on");
    // $('.tail_time').show();
    // $(".tail-txt_01").removeClass("on")
  });
</script>

</body>
</html>
