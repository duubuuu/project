<?php

include_once('./_common.php');
include_once('../admin.head.php');

$sql = "select * from student_info";
$stu_info = sql_query($sql);

?>

<link rel="stylesheet" href="./css/project/pr_schedule.css?i=<?=$ranum?>">
<link rel="stylesheet" href="./css/project/pr_give_calendar.css?i=<?=$ranum?>">

<style>
.adm-box {
      padding: 2rem 2rem !important;
}
.pr_side_menu {
  height: auto;
}
.student_category {
  height: 600px !important;
}
  .pr_side_menu_border, .student_category, .pr_give_calendar_div {
    box-shadow: 4px 4px 5px #d0d0d054;
    border: 1px solid #d0d0d094;
    border-radius: 0.3rem !important;
    filter: none !important;
  }
  .pr_give_calendar_div {
    width: 100% !important;
    height: auto !important;
    margin: 0 !important;
  }
  .cal-table tr th {
    border-left: none !important;
    border-right: none !important;
    border-top: none !important;
    border-bottom: none !important;
}
td, th {
  height: 55px !important;
}
.pr_give_title {
  padding: 8px !important;
  border-radius: 0.3rem !important;
  margin: 0 0 8px 0 !important;
}
.pr_give_form {
  background: transparent !important;
}
.pr_give_div {
  width: 100% !important;
  justify-content: space-between;
  height: 67vh !important;

}
.pr_give_calendar {
    min-width: auto !important;
    display: flex;
    flex-direction: column;
    height: auto;
    padding: 0 !important;
    margin: 0 !important;
    width: 30%;
}
.search_div {
  width: 100% !important;
  margin: 0 0 15px 0 !important;
}
.ctr-box {
    padding: 0 !important;
    margin-bottom: 0 !important;
    font-size: 20px;
    height: 45px;
    display: inline-flex;
    justify-content: space-between;
    width: 95%;
}
.clearfix:after {
  display: none !important;
}
select.start_hour, .end_hour, .end_minute, .start_minute {
    margin-right: 0.3rem;
    width: 51px;
    padding: 0px 3px;
}


#stu_list_wrapper {
  box-shadow: 4px 4px 5px #d0d0d054;
  border: 1px solid #d0d0d094;
  border-radius: 0.3rem !important;
}
#stu_list_wrapper {
  min-height: 513px;
}
.row {
  margin-right: 0 !important;
  margin-left: 0 !important;
}
table.dataTable {
  margin-top: 0 !important;
  margin-bottom: 0 !important;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 0 !important;
    height: 45px !important;
}
div.row:last-child {
    position: fixed;
    right: 0;
    bottom: -54px;
}
</style>


<div class="pr_give_form">
  <div class="big-title">
    프로젝트 일정 상세
  </div>

  <div class="pr_give_div flex adm-box">


    <!--------------------------- 프로젝트 일정부여 ----------------------->

    <div class="pr_give_calendar">
      <div class="pr_give_title">
        날짜 선택
      </div>

      <div class="pr_give_calendar_div">
        <div class="container">
          <div class="my-calendar clearfix">
            <div class="clicked-date" style="display:none;">
              <div class="cal-day"></div>
              <div class="cal-date"></div>
            </div>

            <div class="calendar-box">
              <div class="ctr-box clearfix">
                <button type="button" title="prev" class="btn-cal prev">
                </button>
                <div class="">
                  <span class="cal-month"></span>
                  <span class="cal-year"></span>
                </div>
                <button type="button" title="next" class="btn-cal next">
                </button>
              </div>
              <table class="cal-table" style="border-collapse:collapse">
                <thead>
                  <tr style="background: #f23f42;color:#fff;">
                    <th>일</th>
                    <th>월</th>
                    <th>화</th>
                    <th>수</th>
                    <th>목</th>
                    <th>금</th>
                    <th>토</th>
                  </tr>
                </thead>
                <tbody class="cal-body"></tbody>
              </table>
            </div>
          </div>
          <!-- // .my-calendar -->
        </div>
      </div>

    </div>
    <!-- 우측 리스트 -->
    <div style="width: 68%; min-height: 513px;">
        <div style="width:100%;">
          <table id="stu_list" class="display nowrap">
            <thead>
              <th>수업/시험</th>
              <th>프로젝트 명</th>
              <th>시작시간</th>
              <th>종료시간</th>
              <th>프로젝트참여자</th>
            </thead>

          </table>
        </div>

    </div>



  </div>

</div>



<div class="pr_stu_view">

  <div class="pr_stu_title">프로젝트 참여자</div>

  <div style="width:100%;min-height:430px;">
    <table id="pr_stu_list" class="display nowrap" style="width:92%;">
      <thead style="display:none;">
        <th style="display:none;"></th>
        <th style="display:none;"></th>
        <th style="display:none;"></th>
        <th style="display:none;"></th>
      </thead>

    </table>
  </div>

  <div style="width:100%;text-align:center;">
    <div class="pr_stu_button">확인</div>
  </div>


</div>





<script src="./js/project/pr_schedule.js?i=<?=$ranum?>"></script>






<?
include_once(G5_PATH.'/tail.sub.php');
?>
