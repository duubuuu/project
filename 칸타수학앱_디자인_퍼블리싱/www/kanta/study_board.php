<?
include_once("./_common.php");
include_once("./head.php");

$pr_real_code = $_REQUEST['code'];

if($pr_real_code == ""){
  $pr_real_code = "Hs1JhYiN8bWxCnny3y5CrRAObthrRYyrD0FBq4zTPO5tT2V9w9";
}

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



<div class="main">
    <div class="m-inner04">
      <button type="button" name="button" class="back-icon" id="back-icon" onclick="history.back();return;"><img src="../../../img/mobile/back_icon02.png" alt="뒤로가기블랙아이콘" style="width: 100%;"></button>
      <table id="list" class="display nowrap" style="width:100%;">
        <thead>
          <th class="notice_board__th table-shadow" style="width: 15%; border-top-left-radius: 1.5rem; border-bottom-left-radius: 1.5rem; ">수업일</th>
          <th class="notice_board__th table-shadow" style="width: 37%;">수업명</th>
          <th class="notice_board__th table-shadow" style="width: 12%;">시작시각</th>
          <th class="notice_board__th table-shadow" style="width: 12%;">종료시각</th>
          <th class="notice_board__th table-shadow" style="width: 12%;">수업수행율</th>
          <th class="notice_board__th table-shadow" style="width: 12%; border-top-right-radius: 1.5rem; border-bottom-right-radius: 1.5rem;">수업듣기</th>
        </thead>
      </table>
    </div>

</div>
<!-- 전체 -->


<script>
  var pr_real_code = "<?=$pr_real_code?>";
</script>
<script src="./js/study_board/study_board.js?i=<?=$ranum?>"></script>




<?include "./tail.php"?>
