<?

include_once("./_common.php");
include_once("./head.php");


?>


<style>

  #list_filter{
    display:none;
  }
  .search_box {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
      justify-content: space-between;
  }
  .search_box .search_box_right {
    display: flex;
    align-items: center;
  }
  div.notice_filtering_div {
      font-size: 2.4rem;
      width: 18rem;
      height: 5rem;
      border-radius: 1rem;
      margin-right: 0.5rem;
      border: 1px solid #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
  }
  select.notice_filtering {
      font-size: 2.4rem;
      width: 16rem;
      /* height: 4rem; */
      border: none;
  }
  option.notice_option {
    font-size: 2rem;
  }
  div.notice_search {
      font-size: 2.4rem;
      width: 50rem;
      height: 5rem;
      border-radius: 1rem;
  }
  .notice_search_input {
      font-size: 2.4rem;
      width: 50rem;
      height: 5rem;
      border-radius: 1rem;
  }

  .search_icon{
    width: 3rem;
    position: absolute;
    right: 7px;
    top: 3px;
  }
  .notice_search_icon {
    height: 4rem;
    width: 4rem;
    margin-left: 0.5rem;
}
.notice_search_icon img {
    width: 100%;
}
.main {
  position: relative;
}
.m-inner03 {
    width: 95vw;
    /* height: 100vh; */
    margin: 0 auto !important;
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    padding-bottom: 3rem;
}

.important {
    border: 0.2rem solid #f23f42d1;
    background: #ffffff;
    color: #f23f42de;
    display: inline-block;
    font-size: 2.4rem;
    font-weight: 900;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border-radius: 10rem;
    padding: 1.0rem 2rem 0.8rem 2rem;
}

  @media all and (max-width: 812px) {
    .m-inner03 {
      padding-bottom: 5rem;
    }
    .m-inner03 .dataTables_wrapper {
    height: 46rem !important;
    }
    select.notice_filtering {
      width: 18rem ;
    }
  }
</style>

<div class="header" style="display:none;">
  <div class="inner">
    <h2>공지사항 게시판</h2>
  </div>
</div>

<div class="main">

  <div class="m-inner03">
    <!-- <button type="button" name="button" class="back-icon" id="back-icon" onclick="history.back();return;"><img src="../../../img/mobile/back_icon02.png" alt="뒤로가기블랙아이콘" style="width: 100%;"></button> -->
    <table id="list" class="display nowrap" style="width:100%;">
      <thead>
        <th class="notice_board__th table-shadow" style="border-top-left-radius: 1.5rem; border-bottom-left-radius: 1.5rem; width: 10%;">번호</th>
        <th class="notice_board__th table-shadow" style="width: 50%;">제목</th>
        <th style="display:none;"></th>
        <th class="notice_board__th table-shadow" style="width: 15%; ">작성자</th>
        <th class="notice_board__th table-shadow" style="border-top-right-radius: 1.5rem; border-bottom-right-radius: 1.5rem; width: 25%;">작성일</th>
      </thead>
    </table>
    </div>

  </div>
<!-- 전체 -->


<script src="./js/notice_board/notice_board.js?i=<?=$ranum?>"></script>


<?include "./tail.php"?>
