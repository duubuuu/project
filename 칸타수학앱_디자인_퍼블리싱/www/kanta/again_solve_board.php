<?
include_once("./_common.php");
include_once("./head.php");


$pr_real_code = $_REQUEST['pr_real_code'];

if($pr_real_code == ""){
  $pr_real_code = "4EBT9D3kZK0igh4IReLXiYBxpSqkU42vAsgiwUzTXkGSO1SIhP";
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

.re_exam {
    border: 1px solid #F23F42;
    background: #ffffff;
    color: #F23F42;
    font-size: 2.4rem;
    font-weight: 900;
    white-space: nowrap;
    cursor: pointer;
    background-image: none;
    border-radius: 1rem;
    padding: 1rem 0.5rem 0.8rem 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 13rem;
    /* margin: 0 auto; */
}
td.re_exam_correct {
    display: flex;
    align-items: center;
    /* justify-content: center; */
    justify-content: space-between;
}
/* 오답노트 다시풀기 기본상태 & 정답상태 */
.re_exam_cor {
    background: transparent;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    margin-left: 0.5rem;
    color: #F23F42;
    font-size: 2.4rem;
    font-weight: 600;
    padding: 1rem 0 0.8rem 0;
    width: 9rem;
    border-radius: 1rem;
}
/* 오답노트 다시풀기 오답상태 css 추가*/
.re_exam_cor01 {
    background: #fde6e7 !important;
}

</style>



<div class="main">
    <div class="m-inner04">
      <button type="button" name="button" class="back-icon" id="back-icon" onclick="history.back();return;"><img src="../../../img/mobile/back_icon02.png" alt="뒤로가기블랙아이콘" style="width: 100%;"></button>
      <table id="list" class="display nowrap" style="width:100%;">
        <thead>
          <th class="notice_board__th table-shadow" style="width: 15%; border-top-left-radius: 1.5rem; border-bottom-left-radius: 1.5rem; ">문제코드</th>
          <th class="notice_board__th table-shadow" style="width: 41%;">문제명</th>
          <th class="notice_board__th table-shadow" style="width: 12%;">정답여부</th>
          <th class="notice_board__th table-shadow" style="width: 12%;">오답강의</th>
          <th class="notice_board__th table-shadow" style="width: 20%; border-top-right-radius: 1.5rem; border-bottom-right-radius: 1.5rem;">오답노트</th>
        </thead>
      </table>
    </div>
</div>
<!-- 전체 -->


<script>
    var pr_real_code = "<?=$pr_real_code?>";
</script>


<script src="./js/again_solve_board/again_solve_board.js?i=<?=$ranum?>"></script>


<?include "./tail.php"?>
