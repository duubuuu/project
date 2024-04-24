<?

include_once("./_common.php");
include_once("./head.php");
?>

<style>
.main {
  position: relative;
}
.m-inner04 {
    width: 95vw;
    /* height: 100vh; */
    margin: 0 auto !important;
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    padding-bottom: 3rem;
}
.back-icon {
  margin-bottom: 2rem;
}


@media all and (max-width: 812px) {
  .m-inner03 {
    padding-bottom: 5rem;
  }
  .m-inner03 .dataTables_wrapper {
  height: 46rem !important;
  }
}
</style>

<link href="./css/exam/exam_board.css?i=<?=$ranum?>" rel="stylesheet"></link>


<div class="main">
    <div class="m-inner04">
      <button type="button" name="button" class="back-icon" id="back-icon" onclick="history.back();return;"><img src="../../../img/mobile/back_icon02.png" alt="뒤로가기블랙아이콘" style="width: 100%;"></button>
      <table id="list" class="display nowrap" style="width:100%;">
        <thead>
          <th class="notice_board__th table-shadow" style="width: 14%; border-top-left-radius: 1.5rem; border-bottom-left-radius: 1.5rem; ">출제일</th>
          <th class="notice_board__th table-shadow" style="width: 32%;">시험명</th>
          <th class="notice_board__th table-shadow" style="width: 10%;">시작시각</th>
          <th class="notice_board__th table-shadow" style="width: 10%;">종료시각</th>
          <!-- <th class="notice_board__th table-shadow" style="width: 10%;">진행률</th> -->
          <th class="notice_board__th table-shadow" style="width: 10%;">점수</th>
          <th class="notice_board__th table-shadow" style="width: 12%;">시험응시</th>
          <th class="notice_board__th table-shadow" style="width: 12%; border-top-right-radius: 1.5rem; border-bottom-right-radius: 1.5rem;">틀린문제</th>
        </thead>
      </table>
    </div>

</div>
<!-- 전체 -->


<script src="./js/exam_board/exam_board.js?i=<?=$ranum?>"></script>


<?include "./tail.php"?>
