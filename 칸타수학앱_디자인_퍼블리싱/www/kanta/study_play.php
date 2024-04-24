<?
include_once("./_common.php");
include_once("./head.php");


$pr_real_code = $_REQUEST['pr_real_code'];
$num = $_REQUEST['num'];



/* 해당 프로젝트 영상 불러오기 */
$video_url = array();
$video_code = array();
$pb_name = array();
$pb_code = array();
$pb_play_num = array();
$pb_real_code = array();

$video_name = array();

$chapter_arr = array();
$chapter_now = array();
$chapter_now_temp = array();

$sql = "select * from pr_give pg left join pr on pr.pr_real_code = pg.pr_real_code where pg.pr_real_code = '{$pr_real_code}' and pg.num = '{$num}' and pg.mb_id = '{$member['mb_id']}' and type='lec'";




/* 프로젝트에 수업영상 2개 이상 인지 확인 */

$pr_row = sql_fetch($sql);

$pr_pb_arr = explode("::", $pr_row['pb_real_code_arr']);



for($i=0; $i<count($pr_pb_arr); $i++){


  /* pb_play_temp 확인 */
  $sql_chk = "select count(*) as cnt from pb_play_temp where mb_id = '{$member['mb_id']}' and pr_real_code = '{$pr_real_code}' and pb_real_code = '{$pr_pb_arr[$i]}' and type='lec'";
  $cnt = sql_fetch($sql_chk);



  if($cnt['cnt'] == 0){
    $sql = "insert into pb_play_temp(pb_start_time, pb_end_time, pr_real_code, pb_real_code, mb_id, type) value(now(), now(), '{$pr_real_code}', '{$pr_pb_arr[$i]}', '{$member['mb_id']}', 'lec')";
    sql_query($sql);
  }
  else{
    $sql = "update pb_play_temp set pb_start_time = now(), pb_end_time = now() where num = '{$row['num']}'";
    sql_query($sql);
  }


  $sql = "select *, ppt.num, pb.video_code, pb.pb_real_code from pb left join pb_play_temp ppt on ppt.pb_real_code = pb.pb_real_code where ppt.mb_id = '{$member['mb_id']}' and pb.pb_real_code = '{$pr_pb_arr[$i]}' and ppt.pr_real_code = '{$pr_real_code}' and ppt.type='lec'";
  $row = sql_fetch($sql);

  $sql = "select * from video_upload where video_code = '{$row['video_code']}'";

  $row_1 = sql_fetch($sql);

  $video_url[$i] = $row_1['video_path'].$row_1['video_name'];
  $video_code[$i] = $row_1['video_code'];
  $video_name[$i]  = $row_1['video_name'];
  $pb_name[$i] = $row['pb_name'];
  $pb_code[$i] = $row['pb_code'];
  $pb_play_num[$i] = $row['num'];
  $pb_real_code[$i] = $row['pb_real_code'];

  $chapter_arr[$i]['chapter_now'] = $row['chapter_now'];

}


?>

<style>
  .player__controls > * {
    flex: 0 !important;
  }
  .calculator {
    right: -14.5rem;
    top: 31rem;
  }

  @media (max-width: 812px) {
    .player:hover div.bottom_controls_div {
      transform: translateY(-24%) !important;
    }
    .player__video {
      width: 178vmin !important;
      height: 47vmax;
    }
  }

</style>

<!-- <div class="header">
<div class="inner">
<h2>수업 재생</h2>
</div>
</div> -->

<div class="main">
  <div class="player">
    <!--<video class="player__video viewer" src="./652333414.mp4"></video>-->
    <video class="player__video viewer" src="<?=$video_url[0]?>" poster="/img/poster.png" style="width:100%; min-height:350px;" muted></video>
    <div class="player__controls __top"  style="width: 95vw;
    height: 9rem;
    top: 0;
    padding-top: 2rem;
    display: inline-flex;
    justify-content: space-between;
    margin: 0 auto;
    right: 0;">
      <!-- 뒤로가기버튼 -->
      <button data-skip="-10" onclick="history.back();return;" class="player__button" style="flex: none;"><img src="../../../img/mobile/back_icon02.png" alt="뒤로가기아이콘" style="width: 5rem;"></button>


      <!-- 문제답 유무 확인 박스-->
      <div id="question-view-mom-lec" class="question-view-mom">
        <ul class="question-view kanta">

          <?for($i=0; $i<count($pr_pb_arr);$i++){?>
            <li class="question-view__li" data-pb_real_code="<?=$pr_pb_arr[$i]?>">
              <button type="button" name="button" class="question-view__button" data-num="<?=$i?>"><?=($i+1)?></button>
            </li>
            <?}?>

          </ul>
        </div>

        <span class="study_title" style="display:none;"><?=$pb_name[0]?></span>
        <div class="pencilline_div">
          <button type="button" name="button" class="type-button" id="type-button" style="background: #F23F42;"><img class="pencilline" src="../../../img/mobile/pencil_icon.png" alt="연필아이콘" style="width: 100%;"></button>
        </div>

      </div>
      <div class="player__controls bottom_controls_div">
        <div class="progress" style="opacity: 0;"> <!-- 진행바 숨기기 -->
          <div class="progress__filled"></div>
        </div>

        <div class="bottom_background_bar" style="display: flex; justify-content: space-between; background: #434343d9; ">

          <div class="" style="display: flex; align-items: center;">
            <button class="player__button toggle" title="Toggle Play" style="margin-left: 16px;padding: 1rem 0 1rem 0; font-size: 4rem; margin-bottom: 1rem; width: 7rem;"></button>
            <div class="" style="margin: 0 2rem;">
              <span class="now_duration">00 : 00</span>
              <span style="font-size: 3rem; color: #fff; padding: 0px 1rem;">/</span>
              <span class="all_duration"></span>
            </div>
            <div class="" style="display: flex; align-items: center; position: relative;">
              <img class="volume__img" src="../../../img/mobile/volume_up.png" alt="볼륨아이콘" style="width: 5rem;">
              <input type="range" name="volume" class="player__slider" min="0" max="1" step="0.05" value="1">
            </div>
          </div>
          <div class="" style="margin-right: 3rem;">
            <button data-skip="-10" class="player__button left_button" ><img src="../../../img/mobile/arrow_back.png" alt="이전구간으로가기아이콘"></button>
            <button data-skip="10" class="player__button right_button" style="margin: 0 2rem;"><img src="../../../img/mobile/arrow_back-1.png" alt="다음구간으로가기아이콘"></button>
            <button data-skip="25" class="player__button refresh"><img src="../../../img/mobile/refresh.png" alt="처음부터 재생" style="width: 6rem;"></button>
          </div>
        </div>


      </div>
      <!-- 계산기 -->
      <!-- .calculator_div 에 display: none; 걸려있어요 -->
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

    <!-- 수업완료시 팝업 -->
    <div class="popup-box" id="complete-study" style="display: none;">
      <div class="popup-box__icon">
        <img src="../../../img/mobile/check_circle_icon.png" alt="체크써클아이콘" style="width: 100%;">
      </div>
      <p class="popup-box__comment">수업이 완료되었습니다.<br>수업이 종료됩니다.</p>
      <button type="button" name="button" class="m-kanta-button kanta" id="complete-study__ok_btn" style="color: #ffffff; margin: 0 auto; display: block;">확인</button>
    </div>


    <!-- 수업완료시 팝업 -->
    <div class="popup-box" id="move-study" style="display: none;">
      <div class="popup-box__icon move_study_number">

      </div>
      <p class="popup-box__comment">잠시 후 다음 영상이 재생됩니다.</p>
      <button type="button" name="button" class="m-kanta-button kanta" id="complete-study__ok_btn" style="color: #ffffff; margin: 0 auto; display: block;">확인</button>
    </div>

    <!-- 정답시 등장하는 애니메이션 체크마크 -->
    <div class="success_mark" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%; display: none;">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
        <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
        <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
      </svg>
      <p class="success" style="font-size: 5rem;">정답!</p>
    </div>

    <!-- 진행도중 정답 입력시 나타나는 팝업 -->
    <div class="ing_mark" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%; display: none;">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
        <circle class="path circle" fill="none" stroke="#ffd400" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
        <line class="path line" fill="none" stroke="#ffd400" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="65" y1="100" x2="65" y2="102"/>
        <line class="path line" fill="none" stroke="#ffd400" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="65" y1="30" x2="65" y2="90"/>
      </svg>
      <p class="ing" style="font-size: 5rem;">수업이 진행중입니다.</p>
    </div>



    <!-- 영상이 없을 시 나타나는 팝업 -->
    <div class="no_exist_mark" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%; display: none;">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
        <circle class="path circle" fill="none" stroke="#ffd400" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
        <line class="path line" fill="none" stroke="#ffd400" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="65" y1="100" x2="65" y2="102"/>
        <line class="path line" fill="none" stroke="#ffd400" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="65" y1="30" x2="65" y2="90"/>
      </svg>
      <p class="no_exist" style="font-size:3rem;margin-top:30px;">영상이 존재하지 않습니다. 다음 강의로 이동합니다.</p>
    </div>


    <!-- 정답시 등장하는 애니메이션 체크마크 -->
    <div class="completed_mark" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%; display: none;">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
        <circle class="path circle" fill="none" stroke="#F23F42" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
        <polyline class="path check" fill="none" stroke="#F23F42" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
      </svg>
      <p class="completed" style="font-size: 3rem;">현재 강의영상 시청을 완료하셨습니다.</p>
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
    <!-- 뒤로가기 클릭시 팝업 -->
    <div class="popup-box" id="end-study" style="display: none;">
      <div class="popup-box__icon">
        <img src="../../../img/mobile/info_icon.png" alt="느낌표아이콘" style="width: 100%;">
      </div>
      <p class="popup-box__comment">수업 진행 중입니다.<br>종료하시겠습니까?</p>
      <div class="m-kanta-button-set">
        <button type="button" name="button" class="m-kanta-button kanta" id="end-study__yes_btn" style="color: #ffffff;">네</button>
        <button type="button" name="button" class="m-kanta-button" id="end-study__no_btn">아니요</button>
      </div>
    </div>

  </div>


  <!-- 전체 -->

  <link rel="stylesheet" href="./css/pb_make/pb_make.css?i=<?=$ranum?>">




  <script>

  var pr_real_code = "<?=$pr_real_code?>";
  var video_code = "<?=implode("::", $video_code)?>";
  video_code = video_code.split("::");

  var video_name = "<?=implode("::", $video_name)?>";
  video_name = video_name.split("::");

  var pb_name = "<?=implode("::", $pb_name)?>";
  pb_name = pb_name.split("::");
  var num = "<?=$num?>";

  var pb_code = "<?=implode("::", $pb_code)?>";
  pb_code = pb_code.split("::");

  var pb_real_code = "<?=implode("::", $pb_real_code)?>";
  pb_real_code = pb_real_code.split("::");

  var pb_play_num = "<?=implode("::", $pb_play_num)?>";
  pb_play_num = pb_play_num.split("::");

  var video_list_now = 0;
  var video_list_cnt = "<?=count($video_code)-1?>";

  var pr_pb_cnt = "<?=count($pr_pb_arr)?>";
  var pr_pb_arr = "<?=implode("::", $pr_pb_arr)?>";

  var q_cnt = 0;
  var selected_time_arr = [];
  var answer_arr = [];
  var correct_arr = [];

  var chapter_now = 0;
  var chapter_now_temp = 0;

  <?

  if($chapter_arr[0]['chapter_now'] != ""){

    for($i=0; $i<count($chapter_arr); $i++){
      $chapter_arr_temp = $chapter_arr_temp."::".$chapter_arr[$i]['chapter_now'];

    }
    ?>
    chapter_now = "<?=$chapter_arr_temp?>";
    chapter_now = chapter_now.replace("::","");
    chapter_now = chapter_now.split("::");

    chapter_now_temp = chapter_now;
    <?

  }

  ?>


  var answer_input_flag = false;

  // 볼륨아이콘 버튼 누르면 상세 조절 등장
  $('.volume__img').click(function(){
    $('.player__slider').toggleClass('appearance');
  });



  // 오답 입력시 엑스마크 애니메이션
  // $('.test-code').click(function() {
  //     $('.error_mark').show();
  //     window.setTimeout(function() {
  //         $('.error_mark').fadeOut(0);
  //     }, 1200);
  // });

  // 수업완료시 작동 팝업
  $('#back-icon').click(function() {
    $('.complete-study').show();
  });

  // 뒤로가기 버튼 작동 팝업
  $('#back-icon').click(function() {
    $('#end-study').show();
  });
  // $('#end-study__yes_btn').click(function() {
  //
  // });
  $('#end-study__no_btn').click(function() {
    $('#end-study').hide();
  });


  function find_vid(video_name, type){

    var exist = 0;



    var params = {
      Bucket: "kantas3",
      Key: "lec_vid/"+video_name
    };

    return new Promise(function(resolve, reject) {
      s3.headObject(params, function(err, data) {
        if (err){

          console.log("없음"+video_list_now);

          $(".no_exist_mark").css("display","block");

          if(type == "btn"){
            $(".no_exist").text("강의영상이 존재하지 않습니다.");
            sleep(1500).then(function(){
              $(".no_exist_mark").css("display","none");
            });
          }
          else{
            $(".no_exist").text("영상이 존재하지 않습니다. 다음 강의로 이동합니다.");

            sleep(1500).then(function(){
              $(".no_exist_mark").css("display","none");
            });

          }

          resolve(exist);

        }
        else{

          console.log("있음"+video_name);
          exist = 1;

          resolve(exist);
        }
      });
    });



  }



</script>

<script src="./js/study_play/study_play.js?i=<?=$ranum?>"></script>






<?include_once("./tail.php")?>
