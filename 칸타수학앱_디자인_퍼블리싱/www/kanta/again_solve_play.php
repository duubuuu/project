<?
include_once("./_common.php");
include_once("./head.php");


$pb_real_code = $_REQUEST['pb_real_code'];
$num = $_REQUEST['num'];


$sql = "select * from pb left join video_upload vu on pb.video_code = vu.video_code where pb.pb_real_code = '{$pb_real_code}'";
$row = sql_fetch($sql);




$video_url = $row['video_path'].$row['video_name'];
$pb_name = $row['pb_name'];

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
    <video class="player__video viewer" src="<?=$video_url?>" poster="/img/poster.png" style="width:100%; min-height:350px;"></video>
    <div class="player__controls __top"  style="width: 100%; height: 5rem;top: 0; padding-top: 3rem;">
      <button data-skip="-10" onclick="history.back();return;" class="player__button" style="flex: none; margin-left: 4rem; width: 5rem; vertical-align: bottom; padding: 0;">
        <!-- <img src="../../../img/mobile/back_icon_white.png" alt="뒤로가기화이트아이콘" style="width: 5rem;"> -->
        <img src="../../../img/mobile/back_icon02.png" alt="뒤로가기아이콘" style="width: 100%;">
      </button>
      <span class="study_title"><?=$pb_name?></span>

    </div>
    <div class="player__controls bottom_controls_div">
      <div class="progress" style="opacity: 0;">
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
          <button style="display:none;" data-skip="-10" class="player__button left_button" ><img src="../../../img/mobile/arrow_back.png" alt="이전구간으로가기아이콘"></button>
          <button style="display:none;" data-skip="10" class="player__button right_button" style="margin: 0 2rem;"><img src="../../../img/mobile/arrow_back-1.png" alt="다음구간으로가기아이콘"></button>
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
     <p class="ing" style="font-size:3rem;margin-top:30px;">수업이 진행중입니다.</p>
   </div>


   <!-- 정답시 등장하는 애니메이션 체크마크 -->
   <div class="completed_mark" style="position: absolute; transform: translate(-50%, -50%); top: 50%; left: 50%; display: none;">
     <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
       <circle class="path circle" fill="none" stroke="#F23F42" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
       <polyline class="path check" fill="none" stroke="#F23F42" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
     </svg>
     <p class="completed" style="font-size: 3rem;">수업이 완료된 상태입니다.</p>
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


  // 볼륨아이콘 버튼 누르면 상세 조절 등장
  $('.volume__img').click(function(){
    $('.player__slider').toggleClass('appearance');
  });



</script>

<script src="./js/again_solve_play/again_solve_play.js?i=<?=$ranum?>"></script>

<?include_once("./tail.php")?>
