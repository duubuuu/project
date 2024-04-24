<?
include_once("./_common.php");
include_once("./head.php");


$sql = "select * from slide_manager_img order by img_order asc";
$p_info_rs = sql_query($sql);


$sql = "select * from slide_manager_img_mobile order by img_order asc";
$m_info_rs = sql_query($sql);


$sql = "select * from main_img order by img_order asc";
$p_info_rs_1 = sql_query($sql);


$sql = "select * from main_img_mobile order by img_order asc";
$m_info_rs_1 = sql_query($sql);

$a=1;

$i=1;
$mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";


if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
	$ma =  "Mobile";
}else{
	$ma =  "PC";
}
?>
<style>
    @media screen and (max-width:767px) {
        .swiper-wrapper {
            width: 100vw;
            height: auto;
        }
        .main {
            height: auto;
        }
    }
</style>


<!-- Swiper 메인 -->
<div class="main">
    <!-- 매치업홍보영상    -->
    <div class="main-video" >
        <?if($ma == "PC"){?>
            <video src="video/main_intro.mp4" autoplay="autoplay" muted="mute" style="height: 100%;"></video>
        <?}?>
        <button type="button" class="intro_skip_btn">skip</button>
    </div>

    <!-- 메인슬라이드배너 -->
    <div class="swiper-container mySwiper" style="position: relative; height: 100%;">
      <div class="swiper-wrapper">




        <?if(!isMobile()){?>

            <?while($row = sql_fetch_array($p_info_rs)){

                preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$matches);

              ?>

                  <div class="swiper-slide"><img src="<?=$matches[0].$row['img_name']?>" alt=""></div>

            <?$i++;}?>

        <?}else{?>


            <?while($row = sql_fetch_array($m_info_rs)){

              preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$matches);

              ?>
                <div class="swiper-slide"><img src="<?=$matches[0].$row['img_name']?>" alt=""></div>

            <?$i++;}?>


        <?}?>

      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>

    <script type="text/javascript">
    $('.intro_skip_btn').on("click",function(){
        // $('.mySwiper').show();
        $('.main-video').hide();
    });
    </script>
</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
  cssMode: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
  },
  mousewheel: true,
  keyboard: true,
  autoplay: {
  delay: 5000,
},
});
</script>

<div class="main-contents">
    <div class="inner">


          <?while($row = sql_fetch_array($p_info_rs_1)){

              preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$matches);

            ?>

              <div id="<?=$a."pc"?>" class="stop-dragging pc">
                  <!-- 이미지 경로 입력 -->
                    <img src="<?=$matches[0].$row['img_name']?>" alt="매치업소개_매치업문화_img" style="width: 100%;">

              </div>

          <?$a++;}?>




          <?

          $a=1;
          while($row = sql_fetch_array($m_info_rs_1)){

            preg_match('/\/match\/[0-9a-zA-Z_\/]*\//i', $row['img_path'] ,$matches);

            ?>

              <div id="<?=$a."mobile"?>" class="stop-dragging mobile">
                <!-- 이미지 경로 입력 -->
                  <img src="<?=$matches[0].$row['img_name']?>" alt="매치업소개_매치업문화_img" style="width: 100%;">

              </div>
          <?$a++;}?>


    </div>
     <!-- <div class="box-shadow-div"></div> -->
</div>

<!-- 전체 끝 -->






<?include "./tail.php"?>
