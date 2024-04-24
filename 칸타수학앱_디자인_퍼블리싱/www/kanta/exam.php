<?
include_once("./_common.php");
include_once("./head.php");


$pb_real_code = $_REQUEST['pb_real_code'];
$pr_real_code = $_REQUEST['pr_real_code'];
$num = $_REQUEST['num'];


$sql = "select * from pr_give pg left join pr on pr.pr_real_code = pg.pr_real_code where pg.pr_real_code = '{$pr_real_code}' and pg.mb_id = '{$member['mb_id']}' and pg.num = '{$num}' and type='exam'";
$row = sql_fetch($sql);




/* 해당 프로젝트 이미지 불러오기 */
$img_url = array();
$img_code = array();
$pb_name = array();
$pb_code = array();
$pb_play_num = array();

$pb_answer = array();
$pb_real_code = array();
$answered_view = array();

$chapter_arr = array();
$chapter_now = array();
$chapter_now_temp = array();

$pb_real_code_arr = explode("::", $row['pb_real_code_arr']);


for($i=0; $i<count($pb_real_code_arr); $i++){



  /* pb_play_temp 확인 */
  $sql_chk = "select count(*) as cnt from pb_play_temp where pb_real_code = '{$pb_real_code_arr[$i]}' and pr_real_code = '{$pr_real_code}' and mb_id = '{$member['mb_id']}' and type='exam'";
  $cnt = sql_fetch($sql_chk);

  if($cnt['cnt'] == 0){
    $sql = "insert into pb_play_temp(pb_start_time, pb_end_time, pb_real_code, pr_real_code, mb_id, type) value(now(), now(), '{$pb_real_code_arr[$i]}', '{$pr_real_code}', '{$member['mb_id']}', 'exam')";
    sql_query($sql);
  }
  else{
    $sql = "update pb_play_temp set pb_start_time = now(), pb_end_time = now() where num = '{$row['num']}'";
    sql_query($sql);
  }


  $chapter_arr[$i]['chapter_now'] = $row['chapter_now'];


  $sql = "select *, pb.pb_answer,  ppt.pb_real_code, ppt.num as pb_play_num, pb.video_code from pb left join pb_play_temp ppt on ppt.pb_real_code = pb.pb_real_code where ppt.pb_real_code = '{$pb_real_code_arr[$i]}' and ppt.pr_real_code = '{$pr_real_code}' and ppt.type='exam'";
  $row_1 = sql_fetch($sql);

  //echo $sql;

  $sql = "select * from pb_img_upload where video_code = '{$row_1['video_code']}'";
  $row_2 = sql_fetch($sql);


  $img_url[$i] = $row_2['img_path'].$row_2['img_name'];
  $pb_code[$i] = $row_1['pb_code'];
  $img_real_code[$i] = $row_2['img_real_code'];
  $pb_name[$i] = $row_1['pb_name'];
  $pb_play_num[$i] = $row_1['pb_play_num'];

  $pb_answer[$i] = $row_1['pb_answer'];

  $pb_real_code[$i] = $row_1['pb_real_code'];
  $answered_view[$i] = $row_1['answered_view'];

}

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

    <img src="<?=$img_url[0]?>" class="pb_img"/>

</div>


<div class="main">
  <div class="m-inner02">
    <div class="top-button-set">
      <div class="top-button-set__button-set">
        <button type="button" name="button" class="back-icon" id="back-icon" onclick="history.back();return;"><img src="../../../img/mobile/back_icon02.png" alt="뒤로가기핑크아이콘" style="width: 100%;"></button>
        <button type="button" name="button" class="number-nav num-nav kanta" id="test-number-nav" >
          <span class="num-nav">
            <span class="num-nav ex_chapter_now">1</span>
            /<?=count($pb_real_code_arr)?>
          </span>
          <span style="width: 4rem;"><img class="num-nav" src="../../../img/mobile/mouse_icon.png" alt="마우스아이콘" style="width: 100%;"></span>


        </button>
        <button type="button" name="button" class="test-code">
          <span class="pb_code"><?=$pb_code[0]?></span>
        </button>

        <!-- 문제답 유무 확인 박스-->
        <div id="question-view-mom" class="question-view-mom">
          <ul class="question-view kanta">

            <?for($i=0; $i<count($pb_real_code_arr);$i++){?>
              <li class="question-view__li" data-pb_real_code="<?=$pb_real_code_arr[$i]?>">
                <button type="button" name="button" class="question-view__button" data-num="<?=$i?>"><?=($i+1)?></button>
              </li>
            <?}?>

          </ul>
        </div>
      </div>
      <div class="top-button-set__button-set">
        <div class="typed-answer kanta">
          입력답
        </div>
        <input type="text" name="" value="<?=$answered_view[0]?>" class="answered_view" disabled>

        <div class="pencilline_div">
          <button type="button" name="button" class="type-button kanta" id="type-button"><img class="pencilline" src="../../../img/mobile/pencil_icon.png" alt="연필아이콘" style="width: 100%;"></button>
        </div>

      </div>
    </div>
    <div class="bottom-button-set">
      <div class="time-view">
        <i><img src="../../../img/mobile/clock_icon.png" alt="시계아이콘" style="width: 100%;"></i>
        <span>
          <span class="hour">00</span> :
          <span class="minute">00</span> :
          <span class="second">00</span>
        </span>
      </div>
      <div class="bottom-button-set__button-set">
        <button type="button" name="button" class="submission-button" id="submission-button"><i><img src="../../../img/mobile/check_icon.png" alt="체크아이콘" style="width: 100%;"></i><span>제출하기</span></button>
        <button type="button" name="button" class="previous-question-button left_button"><img src="../../../img/mobile/arrow_back_icon.png" alt="이전문제로돌아가기아이콘" style="width: 100%;"></button>
        <button type="button" name="button" class="next-question-button right_button"><img src="../../../img/mobile/arrow_back02_icon.png" alt="다음문제로가기아이콘" style="width: 100%;"></button>
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
  <div class="popup-box-div" id="submission02">
    <div class="popup-box">
      <div class="popup-box__icon">
        <img src="../../../img/mobile/check_circle_icon.png" alt="체크써클아이콘" style="width: 100%;">
      </div>
      <p class="popup-box__comment">시험 제출을 완료했습니다.<br>수고하셨습니다.</p>
      <button type="button" name="button" class="m-kanta-button kanta" id="submission02__ok_btn" style="color: #ffffff; margin: 0 auto; display: block;">확인</button>
    </div>
  </div>

  <!-- 마지막문제입니다.  -->
  <div class="popup-box-div" id="last_question_popup" style="display: none;">
    <div class="popup-box" style="width: 32rem;">
      <div class="popup-box__icon">
        <img src="../../../img/mobile/info_icon.png" alt="느낌표아이콘" style="width: 100%;">
      </div>
      <p class="popup-box__comment">마지막 문제입니다.</p>
      <button type="button" name="button" class="m-kanta-button kanta" id="submission02__ok_btn" style="color: #ffffff; margin: 0 auto; display: block;">확인</button>
    </div>
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

  <!-- 시험시간 경과로 인한 종료 팝업 -->
  <div class="popup-box-div" id="elapsed-test" style="display: none;">
    <div class="popup-box">
      <div class="popup-box__icon">
        <img src="../../../img/mobile/check_circle_icon.png" alt="체크써클아이콘" style="width: 100%;">
      </div>
      <p class="popup-box__comment">시험시간이 경과하였습니다.<br>시험이 종료됩니다.</p>
      <button type="button" name="button" class="m-kanta-button kanta" id="elapsed-test__ok_btn" style="color: #ffffff; margin: 0 auto; display: block;">확인</button>
    </div>
  </div>

</div>

<!-- 전체 -->


<script type="text/javascript">





var pr_real_code = "<?=$pr_real_code?>";

var video_code = "<?=implode("::", $video_code)?>";
video_code = video_code.split("::");

var img_url = "<?=implode("::", $img_url)?>";
img_url = img_url.split("::");

var img_real_code = "<?=implode("::", $img_real_code)?>";
img_real_code = img_real_code.split("::");

var pb_code = "<?=implode("::", $pb_code)?>";
pb_code = pb_code.split("::");

var pb_real_code = "<?=implode("::", $pb_real_code)?>";
pb_real_code = pb_real_code.split("::");

var pb_name = "<?=implode("::", $pb_name)?>";
pb_name = pb_name.split("::");

var pb_answer = "<?=implode("::", $pb_answer)?>";
pb_answer = pb_answer.split("::");

console.log(pb_answer);

var answered_view = "<?=implode("::", $answered_view)?>";
answered_view = answered_view.split("::");

var pb_play_num = "<?=implode("::", $pb_play_num)?>";
pb_play_num = pb_play_num.split("::");



var num = "<?=$num?>";



var img_list_now = 0;
var img_list_cnt = "<?=count($img_real_code)-1?>";

var pr_pb_cnt = "<?=count($pr_pb_arr)?>";
var pr_pb_arr = "<?=implode("::", $pr_pb_arr)?>";


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


<script src="/kanta/js/exam/exam.js?i=<?=$ranum?>"></script>

<?include_once("./tail.php")?>
