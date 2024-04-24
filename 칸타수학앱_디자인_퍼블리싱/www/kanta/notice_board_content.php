<?include "./head.php"?>

<div class="header">
  <div class="inner">
    <h2>공지사항 상세</h2>
  </div>
</div>

<div class="main">
    <div class="m-inner03 n_b_c_mobile">
      <div class="flex" style="width: 100%; margin-bottom: 0;">
        <div class="flex">
          <span class="content-title">작성자</span><input type="text" name="" class="content-input" value="관리자" disabled>
        </div>
        <div class="flex" style="margin-left: 2rem;">
          <span class="content-title">등록일</span><input type="text" name="" class="content-input" value="2021-03-31 15:00" disabled>
        </div>
      </div>
      <div class="flex" style="width: 100%;">
        <span class="content-title" style="width: 9rem;">제목</span><input type="text" name="" class="content-input" value="공지사항 제목입니다." disabled>
      </div>
      <div class="flex" style="width: 100%;">
        <span class="content-title" style="width: 9rem;">내용</span>
        <textarea name="name" rows="8" cols="80" class="content-input content-content" disabled style="height: 60rem; overflow-y: scroll;">공지사항 내용 입니다.</textarea>
      </div>

      <button type="button" name="button" style="background: #f36063; color: #ffffff; font-size: 2.4rem; border-radius: 1.5rem; padding: 1rem 2rem; float: right;">목록</button>
    </div>
</div>
<!-- 전체 -->


<script src="./js/notice_board/notice_board.js?i=<?=$ranum?>"></script>


<?include "./tail.php"?>
