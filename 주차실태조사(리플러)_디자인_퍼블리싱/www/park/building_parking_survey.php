
<title>노외주차조사</title>

<link href="/park/css/building_parking_survey/building_parking_survey.css?i=<?=$ranum?>" rel="stylesheet"></link>



<div class="top_nav" style="z-index:10000000;">
  <div class="inner">
    <span class="top_icon" onclick="busul_hidden();">
      <img src="./img/icon_back.png" alt="이전으로가기">
    </span>
    <span class="page_name">
      <?=$local?> 건축물부설 주차조사
    </span>
    <span class="top_icon" onclick="location.replace('/park/search_type_select.php')">
      <img src="./img/icon_home.png" alt="홈으로가기">
    </span>
  </div>
</div>


<input type="hidden" class="gps_latitude" value="" />
<input type="hidden" class="gps_longitude" value="" />
<input type="hidden" class="num" value="" />
<input type="hidden" class="search_state" value="" />

<div class="survey_div">
  <div class="inner">
    <div class="box basic_info">
      <div class="flex" style="justify-content: space-between;">
        <div class="" style="width: 25%; margin: 0;padding: 0px 17px;">
          <p>조사구역</p>
          <div class="inputA" style="width:100%;">
            <input type="text" name="josa_num" class="josa_num" value="" >
          </div>
        </div>
        <div class="" style="width: 72%; margin: 0;">
          <p>건물용도</p>
          <div class="inputA" style="width:92%;">
            <input type="text" name="main_use" class="main_use" placeholder="">
          </div>
        </div>
      </div>
      <div style="padding:0px 17px;">
        <p>도로명주소</p>
        <div class="inputA" style="width:100%;">
          <input type="text" name="road" class="road" value="">
          <input type="hidden" name="addr" class="addr" value="">
        </div>
      </div>
    </div>
    <div class="box">
      <div class="flex" style="padding: 0px 10px;">
        <p style="min-width: 5.7rem;">조사주차면</p>
        <div class="inputA" style="width:41%;">
          <input type="text" name="josa_juchameon" class="josa_juchameon" value="" placeholder="" >
        </div>
        <p style="text-align: right; min-width: 2.5rem;">
          /<span>&nbsp0면</span>
        </p>
      </div>
      <div class="flex" style="justify-content: space-between;padding: 0px 10px;">
        <div class="flex">
          <p style="min-width: 5.7rem;">주간주차수요</p>
          <div class="inputA small_input">
            <input type="text" name="af_jucha_demand" class="af_jucha_demand" value="" placeholder="">
          </div>
        </div>
        <div class="flex" style="margin-left: 10px;">
          <p style="min-width: 5.7rem;">야간주차수요</p>
          <div class="inputA small_input">
            <input type="text" name="ng_jucha_demand" class="ng_jucha_demand" value="" placeholder="">
          </div>
        </div>
      </div>
    </div>
    <div class="box">
      <div class="flex_wrap" style="height: 8rem; padding: 0 0.1rem 0.5rem 0.5rem;">
        <div class="B width51per">
          <input type="checkbox" id="a1" value="주차차 단기" class="parking_gate" name="주차차 단기">
          <label for="a1">

            주차차 단기
          </label>
        </div>
        <div class="B width47per">
          <input type="checkbox" id="a2" value="주차관리부스" class="parking_booth" name="주차관리부스">
          <label for="a2">

            주차관리부스
          </label>
        </div>
        <div class="flex" style="width: 100%;">
          <div class="B width51per">
            <input type="checkbox" id="a3" value="주차장 개방여부" class="parking_opening" name="주차장 개방여부">
            <label for="a3">

              주차장 개방여부
            </label>
          </div>
          <div class="flex">
            <p style="width: 3rem;">부제</p>
            <div class="inputA">
              <select name="부제" class="buje">
                <option value="미시행">미시행</option>
                <option value="2부제">2부제</option>
                <option value="5부제">5부제</option>
                <option value="10부제">10부제</option>
              </select>
            </div>
          </div>
        </div>
        <div class="B" style="width: 100%;">
          <input type="checkbox" id="a4" value="주차장 부과여부" class="parking_charge" name="주차요금 부과여부">
          <label for="a4">

            주차요금 부과여부
          </label>
        </div>
        <div class="B width51per" style="margin-top: 14px;">
          <input type="checkbox" id="a5" value="주차정보 제공의사" class="parking_info" name="주차정보 제공의사">
          <label for="a5">

            주차정보 제공의사
          </label>
        </div>
        <div class="B width47per" style="width: 48%;margin-top: 14px;">
          <input type="checkbox" id="a6" value="주차공유 사업참여" class="parking_sharing" name="주차공유 사업참여">
          <label for="a6">

            주차공유 사업참여
          </label>
        </div>
      </div>
    </div>

    <div class="box">
      <div class="flex_wrap last_gost">
        <div class="C" style="margin-left: 15px;width:45%;">
          <span style="display: inline-flex; vertical-align: middle;  margin-top: 16px;">
              <img src="./img/icon_circle.png" alt="동그라미아이콘" style="width:8px;height:8px;">
          </span>
          <label for="w1" style="width: 65px;text-align: center;vertical-align: initial;margin-top: 8px;">

            옥내
          </label>
          <div class="inputA small_input">
            <input type="text" name="in_building" value="" class="in_building" placeholder="">
          </div>
        </div>
        <div class="C" style="margin-left: 15px;width:45%;">
          <span style="display: inline-flex; vertical-align: middle;  margin-top: 16px;">
              <img src="./img/icon_circle.png" alt="동그라미아이콘" style="width:8px;height:8px;">
          </span>
          <label for="w2" style="width: 65px;text-align: center;vertical-align: initial;margin-top: 8px;">

            옥외
          </label>
          <div class="inputA small_input">
            <input type="text" name="out_building" value="" class="out_building" placeholder="">
          </div>
        </div>
        <div class="C" style="margin:10px 0px 0px 15px;width:45%;">
          <span style="display: inline-flex; vertical-align: middle;  margin-top: 16px;">
              <img src="./img/icon_circle.png" alt="동그라미아이콘" style="width:8px;height:8px;">
          </span>
          <label for="w3" style="width: 65px;text-align: center;vertical-align: initial;margin-top: 8px;">

            기타
          </label>
          <div class="inputA small_input">
            <input type="text" name="else_building" value="" class="else_building" placeholder="">
          </div>
        </div>

      </div>
    </div>

    <!-- 용도 -->
    <div class="box purpose">
      <div class="flex" style="justify-content: space-between;">
        <div class="width51per">
          <div class="flex" style="margin-left: 15px;width:100%;">

            <label for="d1" style="width: 78px;text-align: center;">

              장애인
            </label>
            <div class="inputA small_input">
              <input type="text" name="parking_handicap" value="" class="parking_handicap" placeholder="">
            </div>
          </div>
          <div class="flex" style="margin-left: 15px;width:100%;">

            <label for="d2" style="width: 78px;text-align: center;">

              여성
            </label>
            <div class="inputA small_input">
              <input type="text" name="parking_woman" value="" class="parking_woman" placeholder="">
            </div>
          </div>
          <div class="flex" style="margin-left: 15px;width:100%;">

            <label for="d3" style="width: 78px;text-align: center;">

              나눔
            </label>
            <div class="inputA small_input">
              <input type="text" name="parking_distribute" value="" class="parking_distribute" placeholder="">
            </div>
          </div>
        </div>
        <div class="width47per">
          <div class="flex" style="width:100%;">

            <label for="d4" style="width: 78px;text-align: center;">

              경차
            </label>
            <div class="inputA small_input">
              <input type="text" name="parking_lt_car" value="" class="parking_lt_car" placeholder="">
            </div>
          </div>
          <div class="flex" style="width:100%;">

            <label for="d5" style="width: 78px;text-align: center;">

              전기
            </label>
            <div class="inputA small_input">
              <input type="text" name="parking_elect" value="" class="parking_elect" placeholder="">
            </div>
          </div>
          <div class="flex" style="width:100%;">

            <label for="d6" style="width: 78px;text-align: center;">

              기타
            </label>
            <div class="inputA small_input">
              <input type="text" name="parking_else" value="" class="parking_else" placeholder="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="box select">
      <div class="flex" style="justify-content: space-between;">
        <div class="width51per">
          <div class="B" style="margin-left: 15px;width:100%;">
            <div class="flex">
              <span style="display: inline-flex; vertical-align: middle;">
                  <img src="./img/icon_circle.png" alt="동그라미아이콘" style="width:8px;">
              </span>
              <label for="z1" style="width: 70px;text-align: center;">

                기계식
              </label>
              <div class="inputA small_input">
                <input type="text" name="parking_machine" value="" class="parking_machine" placeholder="">
              </div>
            </div>
          </div>
          <div class="B" style="margin-left: 15px;width:100%;">
            <input type="checkbox" id="z2" name="관리인 배치" value="관리인 배치" class="parking_custodian" disabled>
            <label for="z2">

              관리인 배치여부
            </label>
          </div>
        </div>
        <div class="width47per">
          <div class="B" style="width:100%; margin-left:-4px;   margin-top: 8px;">
            <input type="checkbox" id="z5" name="사용검사 이행" value="사용검사 이행" class="use_inspection" disabled>
            <label for="z5">

              사용검사 이행여부
            </label>
          </div>
          <div class="B" style="width:100%;margin-left:-4px;">
            <input type="checkbox" id="z6" name="안전사고 통보" value="안전사고 통보" class="accident_report" disabled>
            <label for="z6">

              안전사고 통보여부
            </label>
          </div>
        </div>
      </div>
    </div>



      <button type="button" name="button" class="blue_btn send_btn" style="display: flex; align-items: center; justify-content: center; border-radius: 0.5rem;margin: 10px 0px 30px 0px;">
        <div class="flex">
          <span>사진 촬영</span>
          <span class="icon" style="margin-left: 0.3rem;">
            <img src="./img/icon_clip.png" alt="클립 아이콘">
          </span>
        </div>
      </button>



  </div>

</div>




<div class="photo_div_fix">
  <div class="photo_div">
      <div class="inner">
          <!-- 촬영된이미지 -->
          <div class="photo" style="padding:0px;">
              <img src="" class="photo_s_img" />
          </div>

          <div class="flex">
              <div class="width25per">
                  <div class="">
                      촬영시간
                  </div>
                  <div class="">
                      GPS
                  </div>
              </div>
              <div class="width75per">
                  <div class="inputB">
                      <input type="text" name="" class="photo_capture_time" value="" disabled>
                  </div>
                  <div class="inputB">
                      <input type="hidden" class="latitude" />
                      <input type="hidden" class="longitude" />
                      <input type="textarea" name="" class="latlng_display" value="N 37.594873 E126.93692" disabled>
                  </div>
              </div>
          </div>

          <button type="button" name="button" class="white_btn big_font" style="position:relative;">
            <div class="flex">
              <span>
                <input type="file" style="opacity:0; position:absolute; left:0px; top:0px; width:100%;height:100%;" id="photo_capture" accept="image/*"/>
                <label for="photo_capture">사진 촬영·재촬영</label>
              </span>
            </div>
          </button>
          <div class="flex" style="justify-content: space-between;">
              <button type="button" name="button" class="gray_btn big_font busul_photo_close" style="width: 49%; margin: 0;">
                  <a href="#" >
                      <div class="flex">
                          <span class="icon" style="margin-right: 0.3rem; margin-bottom: 3px;">
                              <img src="./img/icon_redX.png" alt="엑스아이콘">
                          </span>
                          <span>
                              이전단계
                          </span>
                      </div>
                  </a>
              </button>
              <button type="button" name="button" class="blue_btn big_font" id="send_btn" style="width: 49%; margin: 0;">
                  <div class="flex">
                      <span class="icon" style="margin-right: 0.3rem; margin-bottom: 3px;">
                          <img src="./img/icon_green_check.png" alt="체크아이콘">
                      </span>
                      <span>
                          전송
                      </span>
                  </div>
              </button>
          </div>
      </div>


      <!-- 전송완료 팝업 -->
      <div class="popup_background" style="display: none;">
          <div class="popup" id="send_popup" style="display: none;">
              <div class="icon">
                  <img src="./img/icon_green_check.png" alt="체크아이콘">
              </div>
              <h3>
                  전송이 완료되었습니다.
              </h3>
          </div>
      </div>
      <!-- 끝 -->
  </div>

</div>



<script>


function busul_hidden(){
  $(".busul_popup").css("display", "none");
  busul_val_remove();
}



$(".busul_popup .josa_juchameon").on('keyup', function(){

    var parent = ".busul_popup ";

    if($(this).val().trim() != ""){
        $(parent+".accident_report").attr("disabled", false);
        $(parent+".use_inspection").attr("disabled", false);
        $(parent+".parking_custodian").attr("disabled", false);
    }
    else{
      $(parent+".accident_report").attr("disabled", true);
      $(parent+".use_inspection").attr("disabled", true);
      $(parent+".parking_custodian").attr("disabled", true);
    }

});



$(".busul_popup .send_btn").on('click', function(){

  var parent = ".busul_popup ";

  var formdata      = new FormData();

  <?if($road == ""){?>
    var road_not_exist = 1;
  <?}else{?>
    var road_not_exist = 0;
  <?}?>

  var num = $(".num").val().trim();
  var search_state = $(".search_state").val().trim();
  var josa_num = $(parent+".josa_num").val().trim();
  var main_use = $(parent+".main_use").val().trim();
  var addr = $(parent+".addr").val().trim();
  var road = $(parent+".road").val().trim();
  var josa_juchameon = $(parent+".josa_juchameon").val().trim();
  var af_jucha_demand = $(parent+".af_jucha_demand").val().trim();
  var ng_jucha_demand = $(parent+".ng_jucha_demand").val().trim();

  var parking_gate = $(parent+".parking_gate").prop("checked") ? 1 : 0;
  var parking_booth = $(parent+".parking_booth").prop("checked") ? 1 : 0;
  var parking_opening = $(parent+".parking_opening").prop("checked") ? 1 : 0;
  var parking_charge = $(parent+".parking_charge").prop("checked") ? 1 : 0;
  var parking_info = $(parent+".parking_info").prop("checked") ? 1 : 0;
  var parking_sharing = $(parent+".parking_sharing").prop("checked") ? 1 : 0;

  var buje = $(parent+".buje").val().trim();


  var in_building = $(parent+".in_building").prop("checked") ? 1 : 0;
  var out_building = $(parent+".out_building").prop("checked") ? 1 : 0;
  var else_building = $(parent+".else_building").prop("checked") ? 1 : 0;

  if(in_building == 1){
    var sub = "."+$(parent+".in_building").data("sub_class");
    var sub_val = $(sub).val().trim();
    in_building = in_building+"->"+sub_val;
  }

  if(out_building == 1){
    var sub = "."+$(parent+".out_building").data("sub_class");
    var sub_val = $(sub).val().trim();
    out_building = out_building+"->"+sub_val;
  }

  if(else_building == 1){
    var sub = "."+$(parent+".else_building").data("sub_class");
    var sub_val = $(sub).val().trim();
    else_building = else_building+"->"+sub_val;
  }



  var parking_handicap = $(parent+".parking_handicap").val().trim();
  var parking_lt_car = $(parent+".parking_lt_car").val().trim();
  var parking_woman = $(parent+".parking_woman").val().trim();
  var parking_elect = $(parent+".parking_elect").val().trim();
  var parking_distribute = $(parent+".parking_distribute").val().trim();
  var parking_else = $(parent+".parking_else").val().trim();


  var parking_machine = $(parent+".parking_machine").val().trim();


  var use_inspection = $(parent+".use_inspection").prop("checked") ? 1 : 0;
  var parking_custodian = $(parent+".parking_custodian").prop("checked") ? 1 : 0;
  var accident_report = $(parent+".accident_report").prop("checked") ? 1 : 0;



  var gps_latitude = $(parent+".gps_latitude").val().trim();
  var gps_longitude = $(parent+".gps_longitude").val().trim();


  if(josa_num == ""){
    swal("조사구역을 입력해주세요");
    return;
  }
  else if(main_use == ""){
    swal("건물용도를 입력해주세요.");
    return;
  }



  var js_ob = {};


  js_ob.road_not_exist= road_not_exist;

  js_ob.num= num;
  js_ob.search_state= search_state;
  js_ob.josa_num= josa_num;
  js_ob.main_use= main_use;
  js_ob.road= road;
  js_ob.addr= addr;
  js_ob.josa_juchameon= josa_juchameon;
  js_ob.af_jucha_demand= af_jucha_demand;
  js_ob.ng_jucha_demand= ng_jucha_demand;


  js_ob.parking_gate = parking_gate;
  js_ob.parking_booth = parking_booth;
  js_ob.parking_opening = parking_opening;
  js_ob.parking_charge = parking_charge;
  js_ob.parking_info = parking_info;
  js_ob.parking_sharing = parking_sharing;
  js_ob.in_building = in_building;
  js_ob.out_building = out_building;
  js_ob.else_building = else_building;

  js_ob.buje = buje;

  js_ob.parking_handicap = parking_handicap;
  js_ob.parking_lt_car = parking_lt_car;
  js_ob.parking_woman = parking_woman;
  js_ob.parking_elect = parking_elect;
  js_ob.parking_distribute = parking_distribute;
  js_ob.parking_else = parking_else;

  js_ob.parking_machine = parking_machine;


  js_ob.use_inspection = use_inspection;
  js_ob.parking_custodian = parking_custodian;
  js_ob.accident_report = accident_report;

  js_ob.latitude = gps_latitude;
  js_ob.longitude = gps_longitude;

  console.log(JSON.stringify(js_ob));

  localStorage.setItem("busul_data", JSON.stringify(js_ob));


  var busul_data = localStorage.getItem('busul_data');
      busul_data = JSON.parse(busul_data);

  $(parent+".latlng_display").val("N "+busul_data.latitude+" E"+busul_data.longitude);


  $(parent+".photo_div_fix").css("display","block");

  $(parent+"#photo_capture").trigger('click');


});




  $(".busul_popup #photo_capture").on("change", busul_handleImgsFilesSelect);


/* photo 페이지 자바스크립트 */


$(".busul_photo_close").on('click', function(){
  $(".photo_div_fix").css("display","none");
  busul_val_remove();
});


$(".busul_popup #send_btn").on('click', function(){


  if($(".busul_popup #photo_capture")[0].files.length == 0){
    swal("사진을 촬영해주세요.");
    return;
  }

  var busul_data = localStorage.getItem('busul_data');
      busul_data = JSON.parse(busul_data);


  var formdata      = new FormData();



  Object.keys(busul_data).forEach(function(k){
      console.log('키값 : '+k + ', 데이터값 : ' + busul_data[k]);
      formdata.append(k, busul_data[k]);
  });


  formdata.append("photo_capture", $(".busul_popup #photo_capture")[0].files[0]);


  $.ajax({
    url: 'proc/building_parking_survey/building_parking_survey.php',
    type: 'post',
    data: formdata,
    encType : "multipart/form-data",
    processData: false,
    contentType: false,

    beforeSend : function(){
    },

    success: function (data) {

      var data = JSON.parse(data);

      if(data.rs == "success"){



          localStorage.setItem("map_latlng", busul_data.latitude+"::"+busul_data.longitude);

          swal({
            title : "전송이 완료되었습니다.",
            text : " ",
            icon : "success",
            showCancelButton : false,
            showConfirmButton: false,
            buttons: false
          })

          sleep(2500).then(function(){
              swal.close();
              $(".busul_popup").css("display","none");
              $(".photo_div_fix").css("display","none");

              busul_val_remove();
              get_marker();
          });
      }
      else if(data.rs == "fail"){
          swal("전송 실패하였습니다.");
      }
    },

    error : function(err){
      alert("통신실패");
    }
  });


});


function busul_val_remove(){
  $(".busul_popup input[type='checkbox']").prop("checked",false);
  $(".busul_popup input[type='text']").val("");
  $(".busul_popup #photo_capture").val("");
  $(".busul_popup .photo_s_img").attr("src", "");
}


/* 이미지 추가 */

function busul_handleImgsFilesSelect(e) {

  var parent = ".busul_popup ";

  var files = $(parent+"#photo_capture")[0].files;
  var filesArr = Array.prototype.slice.call(files);



  //$(".selected_photo").remove();
  filesArr.forEach(function (f) {

    var reader = new FileReader();
    var cnt = 0;

    reader.onload = function (e) {

      var file_size;
      var file_size_name;

      var file = $(parent+"#photo_capture")[0].files;
      var file_length = $(parent+"#photo_capture")[0].files.length;



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



      if (f) {
        if(f.name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i))
        {

          selectFile        = f;
          $(".photo_s_img").attr("src", file_img_src);


          let date = new Date();

          let hour = date.getHours();
          hour = hour >= 10 ? hour : '0' + hour;
          let min = date.getMinutes();
          min = min >= 10 ? min : '0' + min;
          let sec = date.getSeconds();
          sec = sec >= 10 ? sec : '0' + sec;

          let capture_time = hour + ':' + min + ':' + sec;

          var ext = "";


          if(hour <= 20 && hour >= 07){
            ext = "AM";
          }
          else if(hour >= 20 || hour <= 07){
            ext = "PM";
          }

          $(parent+".photo_capture_time").val(ext+" "+capture_time);



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
} // FUNCTION




</script>
