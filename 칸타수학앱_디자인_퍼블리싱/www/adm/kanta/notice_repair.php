<?php

include_once('./_common.php');
include_once('../admin.head.php');

$num = $_REQUEST['num'];

$sql = "select * from notice where num = '{$num}'";
$row = sql_fetch($sql);


?>

<link href="./css/notice_manager/notice_repair.css?i=<?=$ranum?>" rel="stylesheet"></link>




<div class="notice_write_form">

  <div class="adm-box" style="margin-top: 0.5rem;">
    <div class="notice_top">
      <div class="flex" style="margin:10px 0px;">
        <div class="title_div">작성자</div>
        <div class="input_div" style="width:96%;"><input type="text" class="write_user form-control" value="<?=$row['mb_id']?>" style="padding: 0 15px;"/></div>
      </div>

      <div class="flex" style="margin:10px 0px;">
        <div class="title_div">제목</div>
        <div class="input_div" style="width:96%;"><input type="text" class="notice_title form-control" value="<?=$row['title']?>" PlaceHolder="공지사항 제목" /></div>
      </div>

    </div>



    <div class="smart_editor_div">
      <textarea rows="10" cols="30" id="ir1" name="ir1"></textarea>
    </div>
  </div>



  <div class="btn_form">

    <a href="./notice_manager.php">
      <div class="notice_move_list out__line-button">목록으로</div>
    </a>

    <div class="notice_repair out__red-button" style="line-height: 36px;">수정</div>
  </div>

</div>


<script>
var oEditors = [];
var num = "<?=$num?>";

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
          oEditors.getById["ir1"].exec("PASTE_HTML", [`<?=$row['word']?>`]);
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


<script src="./js/notice_manager/notice_repair.js?i=<?=$ranum?>"></script>






<?

include_once(G5_PATH.'/tail.sub.php');
?>
