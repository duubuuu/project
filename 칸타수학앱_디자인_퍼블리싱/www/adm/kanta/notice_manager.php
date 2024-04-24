<?php

include_once('./_common.php');
include_once('../admin.head.php');

$sql = "select * from student_info";
$stu_info = sql_query($sql);


?>

<link href="./css/notice_manager/notice_manager.css?i=<?=$ranum?>" rel="stylesheet"></link>
<style>
.adm-box {
      padding: 2rem 2rem !important;
}
div.dataTables_wrapper {
    min-height: 37rem !important;
    max-height: 37rem !important;
}
label {
    margin-bottom: 0 !important;
}
div.dataTables_wrapper div.dataTables_filter input {
  height: 36px !important;
  box-shadow: inset 2px 2px 7px rgb(0 0 0 / 10%) !important;
  font-size: 1rem;
  padding: 0 40px 0 10px !important;
}

.important {
    border: 0.1rem solid #f23f42d1;
    background: #ffffff;
    color: #f23f42de;
    display: inline-block;
    font-size: 1rem;
    font-weight: 900;
    text-align: center;
    height: 30px;
    line-height: 27px;
    margin-right: 6px !important;
}
</style>

<div class="notice_manager_form">
  <h1 class="big-title">공지사항 관리</h1>
  <div class="adm-box">
    <div style="width:100%;">
      <table id="list" class="display nowrap" style="margin-top: 1rem !important; width: 100%;">
        <thead>
          <th style="width: 5%;"><input type='checkbox' class="notice_all_chk" /></th>
          <th style="width: 5%;">번호</th>
          <th style="width: 50%;">제목</th>
          <th style="width: 20%;">작성자</th>
          <th style="width: 20%;">작성일자</th>
        </thead>

      </table>
    </div>
  </div>
  <!-- <div class="" style="text-align: center;">
    <button type="button" name="button" class="out__line-button">취소</button>
    <button type="button" name="button" class="out__red-button">완료</button>
  </div> -->

</div>






<script src="./js/notice_manager/notice_manager.js?i=<?=$ranum?>"></script>






<?

include_once(G5_PATH.'/tail.sub.php');
?>
