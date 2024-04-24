<?
include_once("../common.php");
include_once("head.php");
// include_once("header.php");


include_once($_SERVER["DOCUMENT_ROOT"] . '/my_function.php');
if(!$is_member){
    $_SESSION['redirect_url'] = "/homepage/new_store.php";
    alert("로그인이 되어있지 않습니다.","/bbs/login.php");
}
$sql_dbname = "tpgus7918";
$sql_table = "g5_member";
$sql_select ="SELECT * ";
$sql_common = " {$sql_dbname}.{$sql_table} ";
$sql_search =" WHERE 1=1 AND mb_id = '{$member['mb_id']}' ";
$sql = "{$sql_select} FROM {$sql_common} {$sql_search}";

$result_ck1 = sql_fetch($sql);

if(!$result_ck1){
    alert("회원정보가 존재하지않습니다 관리자에게 문의해주세요.",'/');
}
// if($result_ck1['company_yn'] == 'Y'){
//     alert("이미 업체회원입니다.",'/');
// }

$sql_dbname2 = "tpgus7918";
$sql_table2 = "all_shop_affil";
$sql_select2 ="SELECT * ";
$sql_common2 = " {$sql_dbname2}.{$sql_table2} ";
$sql_search2 =" WHERE 1=1 AND mb_id = '{$member['mb_id']}' ";
$sql2 = "{$sql_select2} FROM {$sql_common2} {$sql_search2}";
$result_ck2 = sql_fetch($sql2);

// if(count($result_ck2)>0){
//     alert("이미 업체회원이거나 승인대기중입니다.",'/');
// }


$box = get_my_config_data("tpgus7918","all_config","all_shop_affil");

$active = 'active';
$required = 'required';
$checked = 'checked';





$mb_id = $member['mb_id'];

if($w == 'm') {
  $sql10 = " SELECT * FROM all_shop_affil WHERE mb_id='$mb_id' ";
  $row10 = sql_fetch($sql10);
  // print_r($row10['com_type']);
  // print_r($box['com_type']);
}



?>

<header>
    <div class="inner flex">
        <div class="logo">
            <!-- <a href="allin://action?data=https://tpgus7918.cafe24.com/homepage"> -->
            <a href="https://tpgus7918.cafe24.com/homepage/index.php#">
                <img src="./img/svg_logo.svg" alt="로고">
            </a>
        </div>
        <ul class="menu">
            <li class="menu_btn mr40">
                <a href="https://tpgus7918.cafe24.com/homepage/index.php#">
                    다운로드
                </a>
            </li>
            <li class="menu_btn">
                <a href="./alltnurs.php">
                    올트너스
                </a>
            </li>
        </ul>
    </div>
</header>

<form name="shop_affil_form" id="shop_affil_form" enctype="multipart/form-data" action="./user_form_update.php"  method="post" autocomplete="off">
    <input type="hidden" name="work_mode" value="shopping_mall_affil">
    <input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
    <input type="hidden" name="idx" value="<?=$row10['idx']?>">

<div class="inquiry">
  <div class="inner">
    <h1 class="main">
      스토어 입점신청
    </h1>

    <!-- 담당자정보 -->
    <div class="input_set_wrap">
      <h2 class="middle">
        담당자 정보
      </h2>
      <div class="input_set flex">
        <div class="input_box">
          <p class="middle">
            담당자 성함
          </p>
          <div class="input_wrap">
            <input id="manager_name" name="manager_name" type="text" placeholder="담당자 성함을 입력해주세요.">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            담당자 연락처
          </p>
          <div class="input_wrap">
            <input id="manager_tel" name="manager_tel" type="text" placeholder="010 - 1234 - 5678">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            이메일
          </p>
          <div class="input_wrap">
            <input id="manager_email" name="manager_email" type="text" placeholder="allthatin@gmail.com">
          </div>
        </div>
      </div>
    </div>

    <div class="input_set_wrap">
      <h2 class="middle">
        기업 정보
      </h2>
      <div class="input_set flex">
        <div class="input_box">
          <p class="middle">
            상호명
          </p>
          <div class="input_wrap">
            <input id="com_init_tag" name="com_init_tag" type="text" placeholder="올인">
          </div>
        </div>

        <div class="input_box">
          <p class="middle">
            사이트 주소
          </p>
          <div class="input_wrap">
            <input id="homepage_url" name="homepage_url" type="text" placeholder="www.abcd.efg">
          </div>
        </div>

        <div class="input_box">
          <p class="middle">
            대표자 성함
          </p>
          <div class="input_wrap">
            <input id="com_init_name" name="com_init_name" type="text" placeholder="대표자 성함을 입력해주세요.">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            대표자 연락처
          </p>
          <div class="input_wrap">
            <input id="com_tel" name="com_tel" type="text" placeholder="010 - 1234 - 5678">
          </div>
        </div>

        <div class="input_box">
          <p class="middle">
            사업자 유형
          </p>
        <div class="input_wrap">
            <div class="tab_box">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <?for ($i=0; $i<count($box['com_type']); $i++) {?>
                                <label class="btn btn-danger <?=($i == 0 && $w!="m")?$active:''?> <?=$box['com_type'][$i]==$row10['com_type']?$active:''?>">
                                    <input <?=($i == 0)?$required:''?> type="radio" name="com_type" value="<?=$box['com_type'][$i]?>"
                                      id="jb-radio-1" <?=($i == 0 && $w!="m")?$checked:''?> <?=$box['com_type'][$i]==$row10['com_type']?"checked":""?>> <?=$box['com_type'][$i]?>
                                </label>
                                <?}?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="input_box">
          <p class="middle">
            사업자등록번호
          </p>
          <div class="input_wrap">
            <input id="com_init_no" name="com_init_no" type="text" placeholder="123 - 45 - 67890">
          </div>
        </div>

        <div class="input_box" style="width: 100%;">
          <p class="middle">
            사업자 주소
          </p>
          <!-- <div class="altnus_cont1 address_input"> -->
          <div class="input_wrap adress" style="display: flex; justify-content: space-between;">
            <input type="text" name="com_addr1" id="com_addr1"   required placeholder="주소를 검색해주세요" value="<?=$row10['com_addr1']?>" style="width: calc(50% - 10px);">
            <div class="flex" style="width: calc(50% - 10px); justify-content: space-between;">
                <div class="flex" style="width: calc(50% - 5px);">
                  <input type="text" name="com_zip" id="com_zip"   required placeholder="우편번호" value="<?=$row10['com_zip']?>">
                  <button class="number_s" type="button" onclick="javascript:openDaumPostcode();">주소검색</button>
                </div>
                <input type="text" name="com_addr2" id="com_addr2"  required placeholder="상세주소 입력" value="<?=$row10['com_addr2']?>" style="width: 50%;">
            </div>


            <!-- <div class="flex" style="width: calc(50% - 10px); justify-content: space-between;">
                <input type="text" name="com_addr2" id="com_addr2"  required placeholder="상세주소 입력" value="<?=$row10['com_addr2']?>" style="width: calc(50% - 5px);">
                <div class="flex" style="width: calc(50% - 5px);">
                  <input type="text" name="com_zip" id="com_zip"   required placeholder="우편번호" value="<?=$row10['com_zip']?>">
                  <button class="number_s" type="button" onclick="javascript:openDaumPostcode();">주소검색</button>
                </div>
            </div> -->
          </div>
        </div>

        <div class="input_box">
          <p class="middle">
            업태
          </p>
          <div class="input_wrap">
            <input id="business_status" name="business_status" type="text" placeholder="업태를 입력해주세요.">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            종목
          </p>
          <div class="input_wrap">
            <input id="business_item" name="business_item" type="text" placeholder="종목을 입력해주세요.">
          </div>
        </div>

        <div class="input_box">
          <p class="middle">
            판매유형
          </p>
          <div class="input_wrap">
            <input id="sell_type" name="sell_type" type="text" placeholder="예) 오프라인, 도소매, 해외직구 등">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            통신판매업신고번호
          </p>
          <div class="input_wrap">
            <input id="report_tele" name="report_tele" type="text" placeholder="123 - 45 - 67890">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            주력 상품
          </p>
          <div class="input_wrap">
            <input id="main_product" name="main_product" type="text" placeholder="예) 가구, 조명 등">
          </div>
        </div>
        <div class="input_box">
          <p class="middle">
            고객문의 연락처
          </p>
          <div class="input_wrap">
            <input id="qa_tel" name="qa_tel" type="text" placeholder="070 - 1234 - 5678">
          </div>
        </div>

        <div class="input_box">
          <p class="middle">
            사업자등록증
          </p>

          <div class="altnus_cont3" style="margin-top: 9px;">

              <input type="file" multiple='multiple' name="com_init[]" id="com_init" accept="image/*" style="display:none;">

              <div class="img_upload">
                <label for="com_init" class="label_box">

                  <div class="plus_icon">
                    <img src="/pub/img/plus.png" alt="">
                  </div>
                  <p class="upload_note">
                    <span class="tit">실제 사업자등록증 사진을 등록해주세요.</span><br>
                    개당 10MB 이하, 최대 1개 첨부 가능<br>
                  </p>
                </label>
              </div>

              <!-- img_upload 클릭 후 사진을 업로드 할 시 img_upload 사라지고 img_upload_complete가 노출. -->

              <!-- 사진 업로드 했을 시 목록 -->
              <ul class="img_upload_complete">
                <label for="com_init" class="upload_label">
                  <img src="/pub/img/plus.png" alt="" style="position:unset;">
                </label>
              </ul>

          </div>



        </div>
        <div class="input_box">

          <p class="middle">
            업체로고
          </p>

          <div class="altnus_cont3" style="margin-top:6px;">

              <input type="file" multiple='multiple' name="com_init_logo[]" id="com_init_logo" accept="image/*" style="display:none;">

              <div class="img_upload_logo">
                <label for="com_init_logo" class="label_box">

                  <div class="plus_icon">
                    <img src="/pub/img/plus.png" alt="">
                  </div>
                  <p class="upload_note">
                    <span class="tit">업체 로고를 등록해주세요.</span><br>
                    개당 10MB 이하, 최대 1개 첨부 가능<br>
                  </p>
                </label>
              </div>

              <!-- img_upload 클릭 후 사진을 업로드 할 시 img_upload 사라지고 img_upload_complete가 노출. -->

              <!-- 사진 업로드 했을 시 목록 -->
              <ul class="img_upload_complete_logo">
                <label for="com_init_logo" class="upload_label">
                  <img src="/pub/img/plus.png" alt="" style="position:unset;">
                </label>
              </ul>

          </div>

        </div>

        <div class="input_box wide">
          <p class="middle">
            희망사항
          </p>
          <div class="input_wrap">
            <textarea class="content" id="wish"  name="wish" maxlength="500" placeholder="예) 상품 일관 등록 솔루션 요청 등" rows="1"></textarea>
            <!-- 공백포함 -->
            <div class="limit">
                [
                <span class="limit_num_s">
                    0
                </span>
                /500]
            </div>
          </div>
        </div>

      </div>
    </div>


    <button type="submit" class="more_btn">
        신청하기
    </button>


  </div>
</div>

</form>


<script>

$(".content").on('keyup', function(){

    var letter_all     = $(this).val();
    var letter_cnt     = 0;
    var letter_cnt_s   = 0;

    if(letter_all.length > 500){
      alert("희망사항은 500자를 넘을 수 없습니다.");
      return;
    }

    for(var i=0; i<letter_all.length; i++){
        if(letter_all[i].match(/\s/gi)){
            letter_cnt_s++;
        }
        else{
            letter_cnt_s++;
            letter_cnt++;
        }
    }

    // $(".limit_num").text(letter_cnt);
    $(".limit_num_s").text(letter_cnt_s);
});




function openDaumPostcode() {
    new daum.Postcode({
        oncomplete: function (data) {

            document.getElementById('com_addr1').value = data.address;
            document.getElementById('com_zip').value = data.zonecode;
            document.getElementById('com_addr2').focus();

        }
    }).open();
}


$("#interior_form").submit(function(e){



  var com_init_tag      = $("#com_init_tag").val().trim();
  var com_init_name     = $("#com_init_name").val().trim();
  var com_init_no     = $("#com_init_no").val().trim();
  var com_tel           = $("#com_tel").val().trim();
  var business_status    = $("#business_status").val().trim();
  var business_item      = $("#business_item").val().trim();
  var sell_type         = $("#sell_type").val().trim();
  var homepage_url      = $("#homepage_url").val().trim();
  var report_tele   = $("#report_tele").val().trim();
  var qa_tel          = $("#qa_tel").val().trim();
  var main_product      = $("#main_product").val().trim();

  var com_zip           = $("#com_zip").val().trim();
  var com_addr1         = $("#com_addr1").val().trim();
  var com_addr2         = $("#com_addr2").val().trim();

  var manager_name      = $("#manager_name").val().trim();
  var manager_tel       = $("#manager_tel").val().trim();
  var manager_email     = $("#manager_email").val().trim();


  if(com_init_tag == ""){
    alert("상호명을 입력해주세요");
    $("#com_init_tag").focus();
    return false;
  }

  if(com_init_name == ""){
    alert("대표자 명을 입력해주세요.");
    $("#com_init_name").focus();
    return false;
  }

  if(com_init_no == ""){
    alert("사업자 등록번호를 입력해주세요.");
    $("#com_init_no").focus();
    return false;
  }

  if(com_tel == ""){
    alert("대표 연락처를 입력해주세요");
    $("#com_tel").focus();
    return false;
  }

  if(!com_tel.match(/^01([0|1|6|7|8|9])-?([0-9]{3,4})-?([0-9]{4})$/)){
    alert("대표 연락처를 올바르게 입력해주세요.");
    $("#com_tel").focus();
    return false;
  }


  if(homepage_url == ""){
      alert("사이트 주소를 입력해주세요.");
      $("#homepage_url").focus();
      return false;
  }


  if(com_zip == "" || com_addr1 == ""){
    alert("기업 주소를 입력해주세요.");
    $("#com_zip").focus();
    return false;
  }


  if(business_status == ""){
    alert("업태를 입력해주세요.");
    $("#business_status").focus();
    return false;
  }


  if(business_item == ""){
    alert("종목을 입력해주세요.");
    $("#business_item").focus();
    return false;
  }

  if(sell_type == ""){
    alert("판매유형을 입력해주세요.");
    $("#sell_type").focus();
    return false;
  }

  if(report_tele == ""){
    alert("통신판매업 신고번호를 입력해주세요.");
    $("#report_tele").focus();
    return false;
  }

  if(qa_tel == ""){
    alert("고객문의 연락처를 입력해주세요.");
    $("#qa_tel").focus();
    return false;
  }

  if(main_product == ""){
    alert("주력상품을 입력해주세요.");
    $("#main_product").focus();
    return false;
  }


  if(wish == ""){
    alert("주력상품을 입력해주세요.");
    $("#wish").focus();
    return false;
  }

  if(manager_name == ""){
    alert("담당자 성함을 입력해주세요.");
    $("#manager_name").focus();
    return false;
  }

  if(manager_tel == ""){
    alert("담당자 연락처를 입력해주세요.");
    $("#manager_tel").focus();
    return false;
  }

  if(manager_email == ""){
    alert("담당자 이메일을 입력해주세요.");
    $("#manager_email").focus();
    return false;
  }

  return true;

});






/* 이미지 추가 후단계*/
$('#com_init').change(function (e) {


var files = $("#com_init")[0].files;
var filesArr = Array.prototype.slice.call(files);


var file = $("#com_init")[0].files;
var file_length = $("#com_init")[0].files.length;

if (file_length > 1) {
  alert("최대 1개까지 이미지 첨부 가능합니다.");
  $('#com_init').val('');
  return false;
}



//$(".selected_photo").remove();
filesArr.forEach(function (f) {

  var reader = new FileReader();
  var cnt = 0;


  $(".img_upload_complete li").remove();

  reader.onload = function (e) {

    var file_size;
    var file_size_name;


    if (f.size > 1024 * 500) {
      file_size = Math.round(f.size / (1024 * 1024));
      file_size_name = "MB";
    }
    else if (f.size > 1024) {
      file_size = Math.round(f.size / (1024));
      file_size_name = "KB";
    }
    else if (f.size < 1024) {
      file_size = Math.round(f.size);
      file_size_name = "Byte";
    }



    var file_name = f.name;
    var file_img_src = e.target.result;
    var lastModified = f.lastModified;


    if (f) {
      if(f.name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i))
      {

        var length = $(".img_upload_complete li").length;
            length = length + 1;

        selectFile        = f;

        var html = "";
            html += "<li data-id='"+lastModified+"'>";
            html += "  <img src='"+file_img_src+"'>";
            html += "  <a class='close_ic'>";
            html += "     <img src='/pub/img/close_w.png' class='remove_img' data-id='"+lastModified+"' data-index='"+length+"'>";
            html += "  </a>";
            html += "</li>";

        $(".img_upload_complete").append(html);



      }
      else
      {
        alert("이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.");
        return;
      }

      cnt = cnt + 1;

    }

  }
  reader.readAsDataURL(f);

});



$(".img_upload_complete").css("display","flex");
$(".img_upload").css("display","none");

}); // FUNCTION





/* 로고 이미지 추가 후단계*/
$('#com_init_logo').change(function (e) {


var files = $("#com_init_logo")[0].files;
var filesArr = Array.prototype.slice.call(files);


var file = $("#com_init_logo")[0].files;
var file_length = $("#com_init_logo")[0].files.length;

if (file_length > 1) {
  alert("최대 1개까지 이미지 첨부 가능합니다.");
  $('#com_init_logo').val('');
  return false;
}



//$(".selected_photo").remove();
filesArr.forEach(function (f) {

  var reader = new FileReader();
  var cnt = 0;


  $(".img_upload_complete_logo li").remove();

  reader.onload = function (e) {

    var file_size;
    var file_size_name;


    if (f.size > 1024 * 500) {
      file_size = Math.round(f.size / (1024 * 1024));
      file_size_name = "MB";
    }
    else if (f.size > 1024) {
      file_size = Math.round(f.size / (1024));
      file_size_name = "KB";
    }
    else if (f.size < 1024) {
      file_size = Math.round(f.size);
      file_size_name = "Byte";
    }



    var file_name = f.name;
    var file_img_src = e.target.result;
    var lastModified = f.lastModified;


    if (f) {
      if(f.name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i))
      {

        var length = $(".img_upload_complete_logo li").length;
            length = length + 1;

        selectFile        = f;

        var html = "";
            html += "<li data-id='"+lastModified+"'>";
            html += "  <img src='"+file_img_src+"'>";
            html += "  <a class='close_ic'>";
            html += "     <img src='/pub/img/close_w.png' class='remove_img_logo' data-id='"+lastModified+"' data-index='"+length+"'>";
            html += "  </a>";
            html += "</li>";

        $(".img_upload_complete_logo").append(html);



      }
      else
      {
        alert("이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.");
        return;
      }

      cnt = cnt + 1;

    }

  }
  reader.readAsDataURL(f);

});



$(".img_upload_complete_logo").css("display","flex");
$(".img_upload_logo").css("display","none");

}); // FUNCTION





$(document).on('click', ".remove_img", function(){

    var files = $("#com_init")[0].files;
    var index = $(this).data("index");
    var removeTargetId = $(this).data("id");

    var dataTranster = new DataTransfer();

    console.log(removeTargetId);

    Array.from(files).filter(file => file.lastModified != removeTargetId)
      .forEach(file => {
          dataTranster.items.add(file);
      });

    $("#com_init")[0].files = dataTranster.files;

    $(".img_upload_complete li").each(function(){
        var id = $(this).data("id");
        if(id == removeTargetId){
          $(this).remove();
        }
    });

      console.log($("#com_init")[0].files);
});




$(document).on('click', ".remove_img_logo", function(){

    var files = $("#com_init_logo")[0].files;
    var index = $(this).data("index");
    var removeTargetId = $(this).data("id");

    var dataTranster = new DataTransfer();

    console.log(removeTargetId);

    Array.from(files).filter(file => file.lastModified != removeTargetId)
      .forEach(file => {
          dataTranster.items.add(file);
      });

    $("#com_init_logo")[0].files = dataTranster.files;

    $(".img_upload_complete_logo li").each(function(){
        var id = $(this).data("id");
        if(id == removeTargetId){
          $(this).remove();
        }
    });

      console.log($("#com_init_logo")[0].files);
});



</script>

<?include "footer.php"?><!-- footer -->
