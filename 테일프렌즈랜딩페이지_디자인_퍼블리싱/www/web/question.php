<?
include "./head.php";
include_once('../common.php');
?>

<!-- 내비게이션 바 -->
<div class="navigation_bar" style="background-image: url(../img/web/img_nav_question.png); background-repeat: no-repeat;">
  <h1>자주 묻는 질문</h1>
</div>

<!-- 자주 묻는 질문 -->
<div class="notice_box">
  <div class="inner">
    <h1 class="big-title">자주 묻는 질문</h1>
    <div class="search">
      <input type="text" name="" value="" placeholder="검색어를 입력하세요.">
      <span><img src="../img/web/ic_search.png" style="width: 100%;"></span>
    </div>

    <!-- 질문 항목 탭 -->
    <div class="q_btn_set">
      <?php
      $sql = " SELECT fm_subject FROM g5_faq_master ORDER BY fm_order ASC";
      $res = sql_query($sql);
      $i = 1;
      while($row=sql_fetch_array($res)) {
      ?>
      <div class="q_btn <?=$i==1?"select_color":""?>" id="button<?=$i?>" onclick="show_div('<?=$i?>')" ><?=$row['fm_subject']?></div>
      <?php
      $i++;}
      $sql = " SELECT  faq.fm_id, fm_subject FROM g5_faq AS faq INNER JOIN g5_faq_master AS mas ON faq.fm_id=mas.fm_id ";
      ?>
    </div>

    <!-- 산책 div -->
    <?php
    $sql = " SELECT fm_id FROM g5_faq_master ORDER BY fm_order ASC ";
    $res = sql_query($sql);
    $i = 1;
    while($row=sql_fetch_array($res)) {
      $fm_id = $row['fm_id'];
      // $sql1 = " SELECT  faq.fm_id, fm_subject FROM g5_faq AS faq INNER JOIN g5_faq_master AS mas ON faq.fm_id=mas.fm_id WHERE fm_id='$fm_id' ";
      $sql1 = " SELECT *,faq.fm_id FROM g5_faq AS faq INNER JOIN g5_faq_master AS mas ON faq.fm_id=mas.fm_id WHERE faq.fm_id = '$fm_id' ";
      $res1 = sql_query($sql1);
      ?>
      <div class="question_accordian" id="show_div_<?=$i?>" <?=$i!=1?"style='display:none;'":""?>>
      <?php
      while($row1 = sql_fetch_array($res1)) {
        // print_r($row1);
      ?>
      <div class="question">
        <span class="txt_ic_q"><?=$row1['fm_subject']?></span>
        <span class="question_txt"><?=$row1['fa_subject']?></span><span class="ic_accordian_arrow"><img src="../img/web/ic_accordian_arrow.png" style="width: 100%;"></span>
      </div>
      <div class="answer">
        <span class="txt_ic_answer">답변</span>
        <span class="answer_txt"><?=$row1['fa_content']?></span>
      </div>
      <?php
      }
      ?>
      </div>
      <?php
      $i++;}
      ?>


    <!-- 아코디언 -->
    <script>
      $(document).ready(function(){
        $(".answer").hide();
        $(".question").click(function(){
          $(this).next(".answer").slideToggle(300);
          $('.ic_accordian_arrow').animate({
            deg: 90,
            }, {
            speed: "slow",
            step: function(now) {
              $(this).css({
                transform: 'rotate(' + now + 'deg)'
              })
            }
          });
        });
      });
    </script>

    <script>
  // $("#show_div_1").hide();
  function show_div(id) {
    var i = 1;
    for (i = 1; i < 5; i++) {
      if (i == id) {
        $("#button" + id).addClass('select_color');
        $("#show_div_" + id).css({
          'display': 'block',
          // 'width': '100%'
        });
      } else {
        $("#button" + i).removeClass('select_color');
        $("#show_div_" + i).hide();
      }
    }
  }
</script>
  </div>

</div>


<?include "./tail.php"?>
