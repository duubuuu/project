<?
include_once("./_common.php");
include_once("./head.php");


$pb_real_code = $_REQUEST['pb_real_code'];
$pr_real_code = $_REQUEST['pr_real_code'];
$num = $_REQUEST['num'];


$sql = "select *, ppt.num from pb left join pb_play_temp ppt on pb.pb_real_code = ppt.pb_real_code left join pb_img_upload piu on pb.video_code = piu.video_code where pb.pb_real_code = '{$pb_real_code}'";
$row = sql_fetch($sql);

$img_url = $row['img_path'].$row['img_name'];
$pb_name = $row['pb_name'];
$pb_code = $row['pb_code'];
$video_code = $row['video_code'];
$pb_answer = $row['pb_answer'];
$answered_view = $row['answered_view'];
$pb_play_num = $row['pb_play_num'];
$num = $row['num'];





?>


<link href="/kanta/css/exam/exam.css?i=<?=$ranum?>" rel="stylesheet" ></link>

<style>
.calculator {
    top: 28.9em !important;
}
@media (max-width: 812px) {
  .calculator {
      right: -14.5rem !important;
  }
  .pb_img_div {
    width: 100%;
    transform: translate(-50%, -50%) !important;
    left: 50%;
  }
}
@media (max-width: 1024px) {
  .calculator {
      right: -15rem !important;
  }
}
</style>

<div class="pb_img_div">

    <img src="<?=$img_url?>" class="pb_img"/>

</div>


<div class="main">
  <div class="m-inner02">
    <div class="top-button-set">
      <div class="top-button-set__button-set">
        <button type="button" name="button" class="back-icon" id="back-icon" onclick="history.back();return;"><img src="../../../img/mobile/back_icon02.png" alt="뒤로가기핑크아이콘" style="width: 100%;"></button>

        <button type="button" name="button" class="test-code">
          <span class="pb_code"><?=$pb_code?></span>
        </button>


      </div>
      <div class="top-button-set__button-set">
        <div class="typed-answer kanta">
          입력답
        </div>
        <input type="text" name="" value="" class="answered_view" disabled>

        <div class="pencilline_div">
          <button type="button" name="button" class="type-button kanta" id="type-button"><img class="pencilline" src="../../../img/mobile/pencil_icon.png" alt="연필아이콘" style="width: 100%;"></button>
        </div>

      </div>
    </div>

  </div>

  <!-- 핑크 뒤로가기 클릭시 팝업 -->
  <div class="popup-box-div" id="end-test" style="display: none;">
    <div class="popup-box">
      <div class="popup-box__icon">
        <img src="../../../img/mobile/info_icon.png" alt="느낌표아이콘" style="width: 100%;">
      </div>
      <p class="popup-box__comment">시험이 진행 중입니다.<br>종료하시겠습니까?</p>
      <div class="m-kanta-button-set">
        <button type="button" name="button" onclick="history.back();" class="m-kanta-button kanta" id="end-test__yes_btn" style="color: #ffffff;">네</button>
        <button type="button" name="button" class="m-kanta-button" id="end-test__no_btn">아니요</button>
      </div>
    </div>
  </div>

  <!-- 제출하기 버튼 클릭시 팝업 -->
  <div class="popup-box-div" id="submission01" style="display: none;">
    <div class="popup-box" >
      <div class="popup-box__icon">
        <img src="../../../img/mobile/info_icon.png" alt="느낌표아이콘" style="width: 100%;">
      </div>
      <p class="popup-box__comment">제출하시겠습니까?</p>
      <div class="m-kanta-button-set">
        <button type="button" name="button" class="m-kanta-button kanta" id="submission01__yes_btn" style="color: #ffffff;">네</button>
        <button type="button" name="button" class="m-kanta-button" id="submission01__no_btn">아니요</button>
      </div>
    </div>
  </div>

  <!-- 제출하기 버튼 >> YES 클릭시 팝업 -->
  <div class="popup-box-div" id="submission02" style="display: none;">
    <div class="popup-box">
      <div class="popup-box__icon">
        <img src="../../../img/mobile/check_circle_icon.png" alt="체크써클아이콘" style="width: 100%;">
      </div>
      <p class="popup-box__comment">정답입니다.</p>
      <button type="button" name="button" class="m-kanta-button kanta" id="submission02__ok_btn" style="color: #ffffff; margin: 0 auto; display: block;">확인</button>
    </div>
  </div>


  <!-- 오답시 등장하는 애니메이션 엑스마크 -->
  <div class="error_mark" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%; display: none;">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
      <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
      <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
      <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
    </svg>
    <p class="error" style="font-size: 5rem;">오답!</p>
  </div>


  <!-- 정답시 등장하는 애니메이션 체크마크 -->
  <div class="success_mark" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%; display: none;">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
      <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
      <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
    </svg>
    <p class="success" style="font-size: 5rem;">정답!</p>
  </div>

  <!-- 계산기 -->
  <div class="calculator_div">
    <div class="calculator" id="calculator" style="width: 30rem;">
      <input type="text" class="calculator__answer"value="">
      <ul class="calculator__ul">
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="1">1</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="2">2</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="3">3</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="4">4</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="5">5</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="6">6</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="7">7</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="8">8</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="9">9</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__correct_btn" data-val="o"><img class="calculator__correct" src="../../../img/mobile/circle_icon.png" alt="동그라미아이콘" style="width: 55%;"></button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="0">0</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__wrong_btn" data-val="x"><img class="calculator__wrong" src="../../../img/mobile/x_icon.png" alt="엑스아이콘" style="width: 55%;"></button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="/">/</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__button" data-val="-">-</button></li>
        <li class="calculator__li"><button type="button" name="button" class="calculator__confirm_btn" data-val="check" style="background: #FAD7D7;"><img class="calculator__confirm" src="../../../img/mobile/check_icon.png" alt="체크아이콘" style="width: 75%; margin-top: 0.5rem;"></button></li>
      </ul>
    </div>
  </div>



</div>

<!-- 전체 -->


<script type="text/javascript">





var pr_real_code = "<?=$pr_real_code?>";

var pb_real_code = "<?=$pb_real_code?>";

var pb_code = "<?=$pb_code?>";

var video_code = "<?=$video_code?>";

var pb_answer = "<?=$pb_answer?>";

var answered_view = "<?=$answered_view?>";

var pb_play_num = "<?=$num?>";







var answer_arr = [];
var correct_arr = [];



var ex_chapter_now = 0;
var ex_chapter_now_temp = 0;


// 제출하기 버튼 작동

/*
 $('#submission-button').click(function() {
    $('#submission01').show();
 });
 $('#submission01__yes_btn').click(function() {
    $('#submission02').show();
    $('#submission01').hide();
 });
 $('#submission02__ok_btn').click(function(){
   $('#submission02').hide();
 });

 $('#submission01__no_btn').click(function() {
    $('#submission01').hide();
 });

// 뒤로가기 버튼 작동
 $('#back-icon').click(function() {
    $('#end-test').show();
 });
 // $('#end-test__yes_btn').click(function() {
 //
 // });
 $('#end-test__no_btn').click(function() {
    $('#end-test').hide();
 });
*/
// 답입력 버튼 작동
 $('#test-number-nav').click(function() {
    $('#question-view-mom').css("display" , "block");
 });

 /*
 $('#type-button').click(function() {
    $('.calculator_div').show();
 });
 $('.calculator_div').click(function() {
    $(this).hide();
 });
*/


</script>


<script src="/kanta/js/again_solve/again_solve.js?i=<?=$ranum?>"></script>

<?include_once("./tail.php")?>
