<?php

include_once('./_common.php');
include_once('../admin.head.php');




?>

<link href="./css/notice_manager/notice_write.css?i=<?=$ranum?>" rel="stylesheet"></link>

<style>
  .title_div {
    width: 5% !important;
    line-height: 38px;
    font-weight: 500 !important;
    padding: 0 1rem 0 0 !important;
}
#smart_editor2 #smart_editor2_content {
  width: 1536px;
}
</style>


<div class="notice_write_form">
  <div class="big-title">
    공지사항 글쓰기
  </div>
  <div class="adm-box">
      <div class="notice_top">
        <div class="flex" style="margin-bottom: 0.5rem; align-items: center;">
          <div class="title_div">작성자</div>
          <div class="input_div" style="width:10%;"><input type="text" class="write_user form-control adm-input" value="관리자" /></div>
          <!-- 중요표시 -->
          <div class="" style="display: flex; align-items: center; margin-left: 1rem;">
            <input type="checkbox" class="important" id="cb1">
            <label for="cb1" style="margin-bottom: 0; margin-left: 6px; font-weight: 600;">중요표시</label>
          </div>
        </div>
        <div class="flex" style="margin-bottom: 0.5rem;">
          <div class="title_div" style="letter-spacing: 13px;">제목</div>
          <div class="input_div" style="width: 100%;"><input type="text" class="notice_title form-control adm-input" value="" PlaceHolder="공지사항 제목" /></div>
        </div>
      </div>

      <div class="smart_editor_div">
        <textarea rows="10" cols="30" id="ir1" name="ir1"></textarea>
      </div>
  </div>



  <div class="btn_form">

    <a href="./notice_manager.php">
      <div class="notice_move_list out__line-btn" style="line-height: 40px !important;">목록으로</div>
    </a>
    <div class="notice_reg out__red-btn" style="line-height: 39px !important;">저장</div>
  </div>

</div>


<script>
var oEditors = [];

$(function(){
   nhn.husky.EZCreator.createInIFrame({
      oAppRef: oEditors,
      elPlaceHolder: "ir1",
      //SmartEditor2Skin.html 파일이 존재하는 경로
      sSkinURI: "/plugin/editor/smarteditor2/SmartEditor2Skin.html",
      htParams : {
          // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
          bUseToolbar : true,
          // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
          bUseVerticalResizer : true,
          // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
          bUseModeChanger : true,
          fOnBeforeUnload : function(){

          }
      },
      fOnAppLoad : function(){
          //textarea 내용을 에디터상에 바로 뿌려주고자 할때 사용
          oEditors.getById["ir1"].exec("PASTE_HTML", [""]);
      },
      fCreator: "createSEditor2"
      });



      $(".title_div").on('click', function(){
        oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
        var ir1 = $("#ir1").val();

        alert(ir1);
      });
});

</script>


<script src="./js/notice_manager/notice_write.js?i=<?=$ranum?>"></script>






<?

include_once(G5_PATH.'/tail.sub.php');
?>
