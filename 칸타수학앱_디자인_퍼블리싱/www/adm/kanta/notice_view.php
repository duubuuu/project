<?php

include_once('./_common.php');
include_once('../admin.head.php');

$num = $_REQUEST['num'];

$sql = "select * from notice where num = '{$num}'";
$view = sql_fetch($sql);


?>

<link href="./css/notice_manager/notice_view.css?i=<?=$ranum?>" rel="stylesheet"></link>

<style>
  .title_div {
    padding: 0 !important;
    width: 5%;
  }
  .btn_form {
    align-items: center;
    display: flex;
    justify-content: center;
  }
</style>


<div class="notice_write_form">
<div class="adm-box" style="margin-top: 2rem; padding: 1.5rem 2rem 2rem 2rem !important;">
    <div class="notice_top">

      <div class="flex" style="margin-bottom:10px; margin-left: 20px;">
        <div class="title_div">작성자</div>
        <div class="input_div" style="width:80%;"><?=$view['mb_id']?></div>
      </div>

      <div class="flex" style="margin:10px 0px; margin-left: 20px;">
        <div class="title_div" style="letter-spacing: 13px;">제목</div>
        <div class="input_div"><?=$view['word']?></div>
      </div>

    </div>



    <div class="word_div">
      <?=$view['word']?>
    </div>
</div>



  <div class="btn_form">
    <a href="./notice_manager.php">
      <div class="notice_move_list out__line-btn" style="line-height: 37px !important;">목록으로</div>
    </a>

    <a href="./notice_repair.php?num=<?=$num?>">
      <div class="notice_repair out__red-btn" style="line-height: 42px !important;">수정</div>
    </a>



  </div>

</div>


<script>


</script>


<script src="./js/notice_manager/notice_view.js?i=<?=$ranum?>"></script>


<?

include_once(G5_PATH.'/tail.sub.php');
?>
