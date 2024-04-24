<?
include_once("./_common.php");
include_once("./head.php")

?>


<div class="header">
  <div class="inner">
    <h2>오답 다시 풀기</h2>
  </div>
</div>

<div class="main">
  <div class="m-inner02" style="background: #000000;">
    <div class="top-button-set">
      <div class="top-button-set__button-set">
        <button type="button" name="button" class="back-icon" id="back-icon"><img src="../../../img/mobile/back_icon.png" alt="뒤로가기핑크아이콘" style="width: 100%;"></button>
        <button type="button" name="button" class="test-code" style="margin: 0 1.5rem 0 0.5rem;"><span>1-1235</span></button>
      </div>
      <div class="top-button-set__button-set">
        <div class="typed-answer kanta">
          입력답
        </div>
        <input type="text" name="" value="1234" class="typed-answer-view" disabled>
        <button type="button" name="button" class="type-button kanta" id="type-button"><img src="../../../img/mobile/pencil_icon.png" alt="연필아이콘" style="width: 100%;"></button>
      </div>
    </div>
    <div class="success_mark" style="position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2" style="width: 25rem;">
  <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
  <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
</svg>
    </div>
  </div>

  <!-- 핑크 뒤로가기 클릭시 팝업 -->
  <div class="popup-box" id="end-wrong-answer-note" style="display: none;">
    <div class="popup-box__icon">
      <img src="../../../img/mobile/info_icon.png" alt="느낌표아이콘" style="width: 100%;">
    </div>
    <p class="popup-box__comment">오답노트 진행 중입니다.<br>종료하시겠습니까?</p>
    <div class="m-kanta-button-set">
      <button type="button" name="button" class="m-kanta-button kanta" id="end-wrong-answer-note__yes_btn" style="color: #ffffff;">네</button>
      <button type="button" name="button" class="m-kanta-button" id="end-wrong-answer-note__no_btn">아니요</button>
    </div>
  </div>
</div>

<!-- 전체 -->


<script type="text/javascript">
// 정답 입력시 작동
 $(".test-code").on('click', function(){
   swal({
      // title: "",
      // text: "",
      icon: "success",
      // button: "",
    });
 });
</script>
<style>
svg {
    width: 100px;
    display: block;
    margin: 40px auto 0;
}

.path {
    stroke-dasharray: 1000;
    stroke-dashoffset: 0;
}

.path.circle {
    -webkit-animation: dash .9s ease-in-out;
    animation: dash .9s ease-in-out;
}

.path.line {
    stroke-dashoffset: 1000;
    -webkit-animation: dash .9s .35s ease-in-out forwards;
    animation: dash .9s .35s ease-in-out forwards;
}

.path.check {
    stroke-dashoffset: -100;
    -webkit-animation: dash-check .9s .35s ease-in-out forwards;
    animation: dash-check .9s .35s ease-in-out forwards;
}

p {
    text-align: center;
    margin: 20px 0 60px;
    font-size: 1.25em;
}

p.success {
    color: #73AF55;
}

p.error {
    color: #D06079;
}

@-webkit-keyframes dash {
    0% {
        stroke-dashoffset: 1000;
    }
    100% {
        stroke-dashoffset: 0;
    }
}

@keyframes dash {
    0% {
        stroke-dashoffset: 1000;
    }
    100% {
        stroke-dashoffset: 0;
    }
}

@-webkit-keyframes dash-check {
    0% {
        stroke-dashoffset: -100;
    }
    100% {
        stroke-dashoffset: 900;
    }
}

@keyframes dash-check {
    0% {
        stroke-dashoffset: -100;
    }
    100% {
        stroke-dashoffset: 900;
    }
}

</style>


<?include_once("./tail.php")?>
