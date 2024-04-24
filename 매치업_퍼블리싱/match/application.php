<?
include_once("./_common.php");
include_once("./head.php");


?>

<style>
@media (max-width: 1050px) {
    .content_wrap {
        width: 100%;
        margin-top: 2rem;
    }
}

@media screen and (max-width: 767px) {
  .registration_small_title.block {
    display: block;
  }
}


</style>
<!-- 현위치 -->
<div class="location">
  <div class="inner__2">
      홈 > 이용신청 > <span>시설 관리자</span>
  </div>
  <div class="mobile_nav">
      < 이용신청
  </div>
</div>
<div id="container">
  <div class="inner__2">
    <!-- 왼쪽 상세 메뉴 -->
    <div class="snb_wrap">
        <div class="fixed">
            <ul class="snb navbar-nav">
              <li>
                <div class="snb__logo" style="display: none;">
                    <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                </div>
                <a href="javascript:;" data-index="0">시설관리자</a>
              </li>
              <li>
                <div class="snb__logo" style="display: none;">
                      <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                </div>
                <a href="javascript:;" data-index="1">광고신청</a>
              </li>
              <li>
                  <div class="snb__logo" style="display: none;">
                        <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                  </div>
                <a href="javascript:;" data-index="2"></a>
              </li>
              <li>
                  <div class="snb__logo" style="display: none;">
                        <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                  </div>
                <a href="javascript:;" data-index="3"></a>
              </li>
              <li>
                  <div class="snb__logo" style="display: none;">
                        <img src="img/very-small-logo.png" alt="매우작은매치업로고">
                  </div>
                <a href="javascript:;" data-index="4"></a>
              </li>
            </ul>
        </div>
    </div>
    <!-- 내용물 -->
    <div class="content_wrap">
        <!-- 시설관리자 -->
        <div id="one" class="stop-dragging">
            <div class="registration__title">
                <span class="img">
                    <img src="img/icon_title_logo.png" alt="타이틀로고" style="width: 100%;">
                </span>
                <span class="txt">
                    시설관리자 신청
                </span>
            </div>
            <div class="registration_small_title block">
              <h1 style="font-weight: 500;">시설관리자 신청 등록</h1>
              <p style="color: #e61f19; font-weight: 500; font-size: 0.9rem;">*표시는 필수 입력 사항입니다.</p>
            </div>

            <div class="">
              <div class="registration__list" style="justify-content: space-between;">
                <div class="registration__list-1">
                  <label>제안자명<span>*</span></label>
                  <input type="text" name="sug_name" class="sug_name" placeholder="성함을 입력해 주세요.">
                </div>
                <div class="registration__list-1">
                  <label class="rem7">연락처<span>*</span></label>
                  <input type="text" name="phone" class="phone" placeholder="연락처를 입력해 주세요.">
                </div>
              </div>
              <div class="registration__list">
                <label>시설명칭<span>*</span></label>
                <input type="text" name="facility_name" class="facility_name" placeholder="시설명칭을 입력해 주세요.">
              </div>
              <div class="registration__list">
                <label>시설위치<span>*</span></label>
                <input type="text" name="facility_location" class="facility_location" placeholder="정확한 위치를 입력해 주세요.">
              </div>
              <div class="registration__list">
                <label>구장면수<span>*</span></label>
                <input type="text" name="pitches_num" class="pitches_num" placeholder="구장의 면수를 입력해 주세요.">
              </div>
              <div class="registration__list">
                <label>장소구분<span>*</span></label>
                <input type="text" name="location_type" class="location_type" placeholder="실내/실외/옥상 등의 정보를 입력해 주세요.">
              </div>
              <div class="registration__list" style="align-items: flex-start; margin-top: 25px;">
                <label>가맹내용<span>*</span></label>
                <textarea name="word" class="word" rows="8" cols="80" placeholder="기타 구장정보를 입력해 주세요." style="height: 20rem;"></textarea>
              </div>
              <div class="registration__list">
                <label>파일첨부</label>
                <div class="input-file-button-div">
                  <input type="file" id="input-file" name="upload" placeholder="사업자 등록증을 첨부해 주세요."/>
                  <label class="input-file-button" for="input-file">

                    <div style="display:flex">
                      <input type="text" name="upload" class="input-file" placeholder="사업자 등록증을 첨부해 주세요." disabled/>
                      <div class="label_text">찾아보기</div>
                    </div>
                  </label>
                </div>

              </div>
            </div>
            <div class="" style="margin: 4rem 0;">
              <h3 class="data_introduction" style="font-size: 1.3rem;">개인정보 수집 및 이용에 대한 안내</h3>
              <div class="scroll-box" style="">
                ㈜악동컴퍼니(이하‘매치업플랫폼’라 한다)는 제휴·문의사항 등록 시, 최소한의 범위 내에서 아래와 같이 개인정보를 수집·이용합니다.<br>
                1. 수집하는 개인정보 항목
                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell">구분</div>
                            <div class="divTableCell">수집·이용 항목</div>
                            <div class="divTableCell" style="border-right: 1px solid #000000;">수집·이용 목적</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">가맹신청<br>시설관리자신청</div>
                            <div class="divTableCell">이름,연락처,시설정보(명칭,위치,구장면수,<br>장소,구분,가맹내용)</div>
                            <div class="divTableCell" style="border-right: 1px solid #000000;">신청접수 및<br> 처리결과 회신</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">제휴·제안</div>
                            <div class="divTableCell">소속,이름,전자우편주소</div>
                            <div class="divTableCell" style="border-right: 1px solid #000000;">제휴·제안 접수 및 처리결과 회신</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell" style="border-bottom: 1px solid #000000;">광고신청문의</div>
                            <div class="divTableCell" style="border-bottom: 1px solid #000000;">소속,이름,전자우편주소</div>
                            <div class="divTableCell" style="border-right: 1px solid #000000; border-bottom: 1px solid #000000;">광고신청 접수 및 처리결과 회신</div>
                        </div>
                    </div>
                </div>
                2. 수집 및 이용 목적: 가맹신청/시설관리자신청/제휴·제안/광고신청 접수 및 처리결과 회신<br>
                3. 개인정보의 이용기간: 목적 달성 후, 해당 개인정보 지체없이 파기<br>
                위 개인정보 수집·이용에 대한 동의를 거부할 권리가 있습니다. 다만 동의를 거부하는 경우 등록이 제한될 수 있습니다.
              </div>
              <div class="">
                <input type="checkbox" name="" class="affil_chk" id="affil_1" />
                <label for="affil_1">개인정보 수집 및 이용에 동의합니다.</label>
              </div>
            </div>
            <div class="form-submit">
              <div class="" style="padding-bottom: 1rem">
                <input type="checkbox" name="" value="" id="affil_all" />
                <label for="affil_all">모든 내용을 확인하였으며 이에 동의합니다.</label>
              </div>
              <div class="color-btn-set">
                <button type="button" name="button" class="color-btn" style="background: #040000; margin-right: 1.5rem;">취소하기</button>
                <button type="button" name="button" class="color-btn affiliate_btn" style="background: #f45859;">신청하기</button>
              </div>
            </div>

        </div>
        <!-- 끝 -->

        <!-- 광고신청 -->
        <div id="two" class="stop-dragging">
            <div class="registration__title">
                <span class="img">
                    <img src="img/icon_title_logo.png" alt="타이틀로고" style="width: 100%;">
                </span>
                <span class="txt">
                    광고신청
                </span>
            </div>
            <div class="registration_small_title">
              <h1 style="font-weight: 500;">광고 신청</h1>
              <p style="color: #e61f19; font-weight: 500; font-size: 0.9rem;">*표시는 필수 입력 사항입니다.</p>
            </div>
            <div class="">
              <div class="registration__list">
                <label>제목<span>*</span></label>
                <input type="text" name="title" class="title" placeholder="제목을 입력해 주세요.">
              </div>
              <div class="registration__list">
                <label>소속<span>*</span></label>
                <input type="text" name="belong_to" class="belong_to" placeholder="소속을 입력해 주세요.">
              </div>
              <div class="registration__list">
                <label>이름<span>*</span></label>
                <input type="text" name="name" class="name" placeholder="제안자명을 입력해 주세요.">
              </div>
              <div class="registration__list">
                <label>이메일<span>*</span></label>
                <input type="text" name="email" class="email" placeholder="답변 받을 이메일을 입력해 주세요.">
              </div>
              <div class="registration__list" style="align-items: flex-start; margin-top: 25px;">
                <label>제휴내용<span>*</span></label>
                <textarea name="word_1" class="word_1" rows="8" cols="80" placeholder="자세한 제안 내용을 말씀해 주세요." style="height: 20rem;"></textarea>
              </div>
              <div class="registration__list">
                <label style="padding-bottom: 0.3rem;">파일첨부</label>
                <div class="input-file-button-div">
                  <input type="file" id="input-file-1" name="upload" placeholder="사업자 등록증을 첨부해 주세요."/>
                  <label class="input-file-button" for="input-file-1">

                    <div style="display:flex">
                      <input type="text" name="upload" class="input-file-1" placeholder="사업자 등록증을 첨부해 주세요." disabled/>
                      <div class="label_text">찾아보기</div>
                    </div>
                  </label>
                </div>
              </div>
            </div>
            <div class="" style="margin: 4rem 0;">
              <h3 class="data_introduction" style="font-size: 1.3rem;">개인정보 수집 및 이용에 대한 안내</h3>
              <div class="scroll-box" style="">
                ㈜악동컴퍼니(이하‘매치업플랫폼’라 한다)는 제휴·문의사항 등록 시, 최소한의 범위 내에서 아래와 같이 개인정보를 수집·이용합니다.<br>
                1. 수집하는 개인정보 항목
                <div class="divTable">
                    <div class="divTableBody">
                        <div class="divTableRow">
                            <div class="divTableCell">구분</div>
                            <div class="divTableCell">수집·이용 항목</div>
                            <div class="divTableCell" style="border-right: 1px solid #000000;">수집·이용 목적</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">가맹신청<br>시설관리자신청</div>
                            <div class="divTableCell">이름,연락처,시설정보(명칭,위치,구장면수,<br>장소,구분,가맹내용)</div>
                            <div class="divTableCell" style="border-right: 1px solid #000000;">신청접수 및<br> 처리결과 회신</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell">제휴·제안</div>
                            <div class="divTableCell">소속,이름,전자우편주소</div>
                            <div class="divTableCell" style="border-right: 1px solid #000000;">제휴·제안 접수 및 처리결과 회신</div>
                        </div>
                        <div class="divTableRow">
                            <div class="divTableCell" style="border-bottom: 1px solid #000000;">광고신청문의</div>
                            <div class="divTableCell" style="border-bottom: 1px solid #000000;">소속,이름,전자우편주소</div>
                            <div class="divTableCell" style="border-right: 1px solid #000000; border-bottom: 1px solid #000000;">광고신청 접수 및 처리결과 회신</div>
                        </div>
                    </div>
                </div>
                2. 수집 및 이용 목적: 가맹신청/시설관리자신청/제휴·제안/광고신청 접수 및 처리결과 회신<br>
                3. 개인정보의 이용기간: 목적 달성 후, 해당 개인정보 지체없이 파기<br>
                위 개인정보 수집·이용에 대한 동의를 거부할 권리가 있습니다. 다만 동의를 거부하는 경우 등록이 제한될 수 있습니다.
              </div>
              <div class="check_div">
                <input type="checkbox" name="" class="alliance_chk" id="alliance_1" />
                <label for="alliance_1">개인정보 수집 및 이용에 동의합니다.</label>
              </div>
            </div>


            <!--
            <div class="" style="margin: 4rem 0">
              <h3 style="font-size: 1.3rem;">유의사항 안내</h3>
              <div class="scroll-box" style="">
                  (주)악동컴퍼니 (이하 '매치업 플랫폼'라 한다)는 제안 사항에 관한 검토 진행 상황에 대해 별도 회신을 드리지 않습니다.
                  제안자가 자신이 제안한 사항의 폐기를 원하는 경우, 제안자는 매치업 플랫폼에 요청할 수 있으며 요청 접수 후 즉각
                  폐기합니다.
              </div>
              <div class="check_div">
                <input type="checkbox" name="" class="alliance_chk" id="alliance_2" />
                <label for="alliance_2">유의사항을 확인하고 이에 동의합니다.</label>
              </div>
            </div>
            -->

            <div class="form-submit">
              <div class="check_div" style="padding-bottom: 25px;">
                <input type="checkbox" name="" value="" id="alliance_all" />
                <label for="alliance_all">모든 내용을 확인하였으며 이에 동의합니다.</label>
              </div>
              <div class="color-btn-set">
                <button type="button" name="button" class="color-btn" style="background: #040000; margin-right: 1.5rem;">취소하기</button>
                <button type="button" name="button" class="color-btn alliance_btn" style="background: #f45859;">신청하기</button>
              </div>
            </div>

        </div>
        <!-- 끝 -->

    </div>
  </div>
</div>


<script>

$("#input-file").on('change', function(){

  var filename = $(this).val().split("\\");;
  filename = filename[filename.length-1];

  if(!filename.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)){
    alert("이미지 형식이 아닙니다.");
    return;
  }

  $(".input-file").val(filename);
});


$("#input-file-1").on('change', function(){

  var filename = $(this).val().split("\\");;
  filename = filename[filename.length-1];

  if(!filename.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)){
    alert("이미지 형식이 아닙니다.");
    return;
  }

  $(".input-file-1").val(filename);
});



$("#alliance_all").on('click', function(){

    if($(this).prop("checked")){
        $("#alliance_1").prop("checked", true);
        $("#alliance_2").prop("checked", true);
    }
    else{
        $("#alliance_1").prop("checked", false);
        $("#alliance_2").prop("checked", false);
    }

});


$("#affil_all").on('click', function(){

    if($(this).prop("checked")){
        $("#affil_1").prop("checked", true);
    }
    else{
        $("#affil_1").prop("checked", false);
    }

});




$(".affil_chk").on('click', function(){

    var clas = "affil_chk";

    checkbox_chk(clas);

});

$(".alliance_chk").on('click', function(){

    var clas = "alliance_chk";

    checkbox_chk(clas);

});

$(".affiliate_btn").on('click', function(){



  if(!$(".sug_name").val().trim().match(/[가-힣]{2,4}/gi)){
      swal("제안자 명을 입력해주세요.");
      return;
  }
  else if(String($(".phone").val().trim().replace(/[^0-9]/gi, "")).length != 11){
      swal("연락처를 입력해주세요.");
      return;
  }
  else if($(".facility_name").val().trim() == ""){
      swal("시설명칭을 입력해주세요.");
      return;
  }
  else if($(".facility_location").val().trim() == ""){
      swal("시설위치를 입력해주세요.");
      return;
  }
  else if($(".pitches_num").val().trim() == ""){
      swal("구장면수를 입력해주세요.");
      return;
  }
  else if($(".location_type").val().trim() == ""){
      swal("장소구분을 입력해주세요.");
      return;
  }
  else if($("#input-file").val() == ""){
      swal("사업자 등록증을 첨부해주세요.");
      return;
  }
  else if(!$("#affil_all").prop("checked")){
    swal("모든항목에 동의해주세요");
    return;
  }


  var formdata = new FormData();


  formdata.append("affiliate", $("#input-file")[0].files[0]);
  formdata.append("filename", "affiliate");
  formdata.append("sug_name", $(".sug_name").val().trim());
  formdata.append("phone", $(".phone").val().trim());
  formdata.append("facility_name", $(".facility_name").val().trim());
  formdata.append("facility_location", $(".facility_location").val().trim());
  formdata.append("pitches_num", $(".pitches_num").val().trim());
  formdata.append("location_type", $(".location_type").val().trim());
  formdata.append("word", $(".word").val().trim());



  $.ajax({
    type:"POST",
    url:"./proc/application/facility_manager.php",
    data : formdata,
    processData: false,
    contentType: false,

    beforeSend : function(){
      $(".loading_div").css("display","block");
    },

    success: function(data){

      $(".loading_div").css("display","none");

      var data = JSON.parse(data);

      if(data.rs == "success"){
        alert("등록되었습니다.");
        location.reload();
      }
      else if(data.rs == "fail"){
        alert("등록에 실패하였습니다.");
      }
      else{
        alert("오류가 발생하였습니다.");
      }

    },
    error: function(err) {
      alert("에러");
    }
  });
});





$(".alliance_btn").on('click', function(){





    if($(".title").val().trim() == ""){
        swal("제목을 입력해주세요.");
        return;
    }
    else if($(".belong_to").val().trim() == ""){
        swal("소속을 입력해주세요.");
        return;
    }
    else if($(".name").val().trim() == ""){
        swal("이름을 입력해주세요.");
        return;
    }
    else if($(".email").val().trim() == ""){
        swal("이메일을 입력해주세요.");
        return;
    }
    else if($("#input-file-1").val() == ""){
        swal("사업자 등록증을 첨부해주세요.");
        return;
    }
    else if(!$("#alliance_all").prop("checked")){
      swal("모든항목에 동의해주세요");
      return;
    }



  var formdata = new FormData();


  formdata.append("alliance", $("#input-file-1")[0].files[0]);
  formdata.append("filename", "alliance");
  formdata.append("title", $(".title").val().trim());
  formdata.append("belong_to", $(".belong_to").val().trim());
  formdata.append("name", $(".name").val().trim());
  formdata.append("email", $(".email").val().trim());
  formdata.append("word", $(".word_1").val().trim());



  $.ajax({
    type:"POST",
    url:"./proc/application/adver.php",
    data : formdata,
    processData: false,
    contentType: false,

    beforeSend : function(){
      $(".loading_div").css("display","block");
    },

    success: function(data){

      $(".loading_div").css("display","none");

      var data = JSON.parse(data);

      if(data.rs == "success"){
        alert("등록되었습니다.");
        location.reload();
      }
      else if(data.rs == "fail"){
        alert("등록에 실패하였습니다.");
      }
      else{
        alert("오류가 발생하였습니다.");
      }

    },
    error: function(err) {
      alert("에러");
    }
  });
});








function checkbox_chk(clas){

  var clas = "."+clas;

  var length = $(clas).length;
  var cnt = 0;





  $(clas).each(function(){
      if($(this).prop("checked")){
        cnt++;
      }
  });


  if( cnt == length){
    if(clas == ".affil_chk"){
      $("#affil_all").prop("checked", true);
    }
    else if(clas == ".alliance_chk"){
      $("#alliance_all").prop("checked", true);
    }
  }
  else{
    if(clas == ".affil_chk"){
      $("#affil_all").prop("checked", false);
    }
    else if(clas == ".alliance_chk"){
      $("#alliance_all").prop("checked", false);
    }
  }

}




</script>


<?include "./tail.php"?>
