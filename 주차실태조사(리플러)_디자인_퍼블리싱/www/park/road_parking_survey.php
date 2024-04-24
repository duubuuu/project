<?

include_once('./_common.php');
include_once('./head.php');



$latitude = $_REQUEST['latitude'];
$longitude = $_REQUEST['longitude'];
$addr = $_REQUEST['addr'];
$local = $_REQUEST['local'];
$josa_num = $_REQUEST['josa_num'];


if($josa_num == ""){
  $josa_num = "미지정";
}

?>
<div class="top_nav">
    <div class="inner">
        <span class="top_icon" onclick="history.back();">
            <img src="./img/icon_back.png" alt="이전으로가기">
        </span>
        <span class="page_name">
            <?=$local?> 노상 주차조사
        </span>
        <span class="top_icon" onclick="location.replace('/park/search_type_select.php')">
            <img src="./img/icon_home.png" alt="홈으로가기">
        </span>
    </div>
</div>

<link rel="stylesheet" href="css/cropper/cropper.css?i=<?=$ranum?>">
<link rel="stylesheet" href="css/cropper/main.css?i=<?=$ranum?>">
<link rel="stylesheet" href="css/road_parking_survey/road_parking_survey.css?i=<?=$ranum?>">



<div class="survey_div">
  <div class="inner">
    <div class="box">

      <div class="flex" style="justify-content: space-between;">
        <p style="width: 6rem;text-align:center;">행정구역</p>
        <div class="inputA" style="width:59%;margin-right:22px;">
          <input type="text" name="local" class="local" value="<?=$local?>">
        </div>
      </div>

      <div class="flex" style="justify-content: space-between;">
        <p style="width: 6rem;text-align:center;">조사구역</p>
        <div class="inputA" style="width:59%;margin-right:22px;">
          <input type="text" name="search_location" class="search_location" value="<?=$josa_num?>">
        </div>
      </div>


      <div class="flex" style="justify-content: space-between;">
        <p style="width: 6rem;text-align:center;">주소</p>
        <div class="inputA" style="width:59%;margin-right:22px;">
          <input type="text" name="addr" class="addr" value="<?=$addr?>">
        </div>
      </div>
    </div>
    <!-- 사진첨부box -->
    <div class="box">
      <div class="flex" style="margin-left:10px;">
        <p class="left font_600" style="height: auto;">사진 첨부</p>
      </div>



      <!-- 촬영된이미지 -->
      <div class="container" style="margin-top:14px;">
        <div class="photo_s">
          <img src="" class="photo_s_img" />
        </div>

        <div id="result"></div>
      </div>

      <div class="flex" style="padding: 0 0.8rem 1rem 1rem;">
        <div class="left_title">
          <div class="photo_capture_time">
            촬영시간
          </div>
          <div class="" style="height: 5rem;">
            GPS
          </div>
          <div class="">
            차량 번호
          </div>

        </div>
        <div class="right_input">
          <div class="inputB">
            <input type="text" name="photo_capture_time" class="photo_capture_time" value="" disabled>
          </div>
          <div class="inputB" style="height: 80px;">
            <input type="text" name="gps_latitude" class="gps_latitude" value="<?="N ".$latitude?>" disabled style="height: 40px;">
            <input type="text" name="gps_longitude" class="gps_longitude" value="<?="E ".$longitude?>" disabled style="height: 40px;">
          </div>


          <div style="display:flex;">
            <div class="inputA" style="display:flex;">
              <input type="textarea" name="" value="" class="car_number">
            </div>
            <div>
              <input type="button" class="img_num_recognize" id="recognize" value="인식"/>
            </div>
          </div>

        </div>
      </div>
      <button type="button" name="button" class="white_btn big_font" style="width: calc(100% - 2rem);position:relative;">

          <div class="flex">
            <span>
              <input type="file" style="opacity:0; position:absolute; left:0px; top:0px; width:100%;height:100%;" id="photo_capture" accept="image/*"/>
              <label for="photo_capture">사진 촬영·재촬영</label>
            </span>
          </div>

      </button>
    </div>
    <div class="box">
      <div class="flex">
        <p class="left font_600">차량 종류</p>
        <div class="flex_wrap">
          <div class="C">
            <input type="radio" id="a1" name="car" value="승용차" class="car_type" checked>
            <label for="a1">
              <span></span>
              승용차
            </label>
          </div>
          <div class="C">
            <input type="radio" id="a3" name="car" value="승합차" class="car_type">
            <label for="a3">
              <span></span>
              승합차
            </label>
          </div>
          <div class="C">
            <input type="radio" id="a5" name="car" value="화물차" class="car_type">
            <label for="a5">
              <span></span>
              화물차
            </label>
          </div>
          <div class="C">
            <input type="radio" id="a7" name="car" value="이륜차" class="car_type">
            <label for="a7">
              <span></span>
              이륜차
            </label>
          </div>
          <div class="C">
            <input type="radio" id="a2" name="car" value="관광(대)" class="car_type">
            <label for="a2">
              <span></span>
              관광(대)
            </label>
          </div>
          <div class="C">
            <input type="radio" id="a4" name="car" value="관광(중)" class="car_type">
            <label for="a4">
              <span></span>
              관광(중)
            </label>
          </div>
          <div class="C">
            <input type="radio" id="a6" name="car" value="관광(소)" class="car_type">
            <label for="a6">
              <span></span>
              관광(소)
            </label>
          </div>
          <div class="C">
            <input type="radio" id="a8" name="car" value="기타" class="car_type">
            <label for="a8">
              <span></span>
              기타
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="box">
      <div class="flex">
        <p class="left font_600" style="height: auto;">주차 형태</p>
        <div class="flex_wrap other" style="flex-direction: initial; height: auto;">
          <div class="C">
            <input type="radio" id="b1" name="parking_form" value="합법주차" class="parking_type" checked>
            <label for="b1">
              <span></span>
              합법주차
            </label>
          </div>
          <div class="C">
            <input type="radio" id="b2" name="parking_form" value="불법주차" class="parking_type">
            <label for="b2">
              <span></span>
              불법주차
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="box">
      <div class="flex" style="justify-content: space-between;">
        <p class="left font_600" style="height: auto;width:45%;margin-left: 6px;">노상 주차면 번호</p>
        <div class="inputA" style="width: 45%; margin-right:15px;">
          <input type="text" name="" class="nosang_num" value="" placeholder="입력">
        </div>
      </div>
    </div>
    <div class="flex" style="justify-content: space-between; margin-bottom: 1rem;">
      <button type="button" name="button" class="gray_btn big_font" style="width: 49%; margin: 0;">
        <a href="#">
          <div class="flex">
            <span class="icon" style="margin-right: 0.3rem; margin-bottom: 3px;">
              <img src="./img/icon_redX.png" alt="엑스아이콘">
            </span>
            <span onclick="history.back();">
              취소
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

<script>

</script>



<script src="js/cropper/cropper.js?i=<?=$ranum?>"></script>

<script>

var recognize_img = "";

$(document).ready(function(){
  $("#photo_capture").on("change", handleImgsFilesSelect);
  var selectFile  = null;
  var postionData = {};

  var minAspectRatio = 1;
  var maxAspectRatio = 20;

  var image = document.querySelector('.photo_s_img');
  var data  = document.querySelector('#data');
  var result = document.getElementById('result');

  var minCroppedWidth = 200;
  var minCroppedHeight = 110;
  var maxCroppedWidth = 640;
  var maxCroppedHeight = 320;


  var mb_name = "<?=$s_member['mb_name']?>";
  var mb_local = "<?=$s_member['mb_local']?>";

  var latitude = "<?=$latitude?>";
  var longitude = "<?=$longitude?>";

  var cropper = new Cropper(image, {

    viewMode: 3,
    zoomable: false,

    data: {
      width: (minCroppedWidth + maxCroppedWidth) / 2,
      height: (minCroppedHeight + maxCroppedHeight) / 2,
    },

    ready: function () {

      var cropper       = this.cropper;
      var cropBoxData   = cropper.getCropBoxData();
      var aspectRatio   = cropBoxData.width / cropBoxData.height;
      var newCropBoxWidth;


        var canvas        = cropper.getCroppedCanvas({});

        canvas.toBlob(function (blob) {
          var formdata      = new FormData();
          var positionData  = cropper.getData(true);

          formdata.append('img_file_car_number', blob, 'image.jpg');

          $.ajax({
            url: 'proc/road_parking_survey/recognize.php',
            type: 'post',
            data: formdata,
            encType : "multipart/form-data",
            processData: false,
            contentType: false,

            beforeSend : function(){
                $(".car_number").val("인식중....");
            },

            success: function (data) {

              var data = JSON.parse(data);


                $(".car_number").val(data.text);



            },

            error : function(err){
              alert("통신실패");
              $(".car_number").val("");
            }
          });
        });


      if (aspectRatio < minAspectRatio || aspectRatio > maxAspectRatio) {
        newCropBoxWidth = cropBoxData.height * ((minAspectRatio + maxAspectRatio) / 2);

        /*
        console.log('left', (containerData.width - newCropBoxWidth) / 2);
        console.log('width', newCropBoxWidth);

        cropper.setCropBoxData({
          left: (containerData.width - newCropBoxWidth) / 2,
          width: newCropBoxWidth
        });
        */
      }
    },

    cropmove: function () {

      var cropper = this.cropper;
      var cropBoxData = cropper.getCropBoxData();
      var aspectRatio = cropBoxData.width / cropBoxData.height;

      if (aspectRatio < minAspectRatio) {
        cropper.setCropBoxData({
          width: cropBoxData.height * minAspectRatio
        });
      } else if (aspectRatio > maxAspectRatio) {
        cropper.setCropBoxData({
          width: cropBoxData.height * maxAspectRatio
        });
      }
    },

    crop: function (event) {

      var width = event.detail.width;
      var height = event.detail.height;


      // if (
      //   width < minCroppedWidth
      //   || height < minCroppedHeight
      //   || width > maxCroppedWidth
      //   || height > maxCroppedHeight
      // ) {
      //   cropper.setData({
      //     width: Math.max(minCroppedWidth, Math.min(maxCroppedWidth, width)),
      //     height: Math.max(minCroppedHeight, Math.min(maxCroppedHeight, height)),
      //   });
      // }

      //data.textContent  = JSON.stringify(cropper.getData(true));
    }
  });


  $("#send_btn").on('click', function(){


    if($("#photo_capture")[0].files.length == 0){
      swal("촬영 사진을 업로드해주세요.");
      return;
    }

    var canvas        = cropper.getCroppedCanvas({
    });

    canvas.toBlob(function (blob) {
      var formdata      = new FormData();
      var positionData  = cropper.getData(true);


      var search_location = $(".search_location").val().trim();
      var photo_capture_time = $(".photo_capture_time").val().trim();

      var car_number = $(".car_number").val().trim();

      var parking_type;
      var car_type;


      $(".car_type").each(function(){
        if($(this).prop("checked")){
          car_type = $(this).val().trim();
        }
      });


      $(".parking_type").each(function(){
          if($(this).prop("checked")){
              parking_type = $(this).val().trim();
          }
      });



      var nosang_num = $(".nosang_num").val().trim();
      var local = $(".local").val().trim();
      var addr = $(".addr").val().trim();




      if(search_location == ""){
        swal("조사구역을 입력해주세요");
        return;
      }
      else if(car_number == ""){
        swal("차량 번호를 인식해주세요.");
        return;
      }
      else if(nosang_num == ""){
        swal("노상 주차면 번호를 인식해주세요.");
        return;
      }



      formdata.append('img_file_chk', $("#photo_capture")[0].files[0]);
      formdata.append('img_file',  $("#photo_capture")[0].files[0]);
      formdata.append('img_file_car_number', blob, 'image.jpg');

      formdata.append('mb_name', mb_name);
      formdata.append('mb_local', mb_local);

      formdata.append('search_location', search_location);
      formdata.append('local', local);
      formdata.append('addr', addr);

      formdata.append('photo_capture_time', photo_capture_time);

      formdata.append('latitude', latitude);
      formdata.append('longitude', longitude);
      formdata.append('car_number', car_number);

      formdata.append('car_type', car_type);
      formdata.append('parking_type', parking_type);

      formdata.append('nosang_num', nosang_num);


      $.ajax({
        url: 'proc/road_parking_survey/road_parking_save.php',
        type: 'post',
        data: formdata,
        encType : "multipart/form-data",
        processData: false,
        contentType: false,

        beforeSend : function(){
          $(".loading_div").css("display", "block");
        },

        success: function (data) {

          $(".loading_div").css("display", "none");

          var data = JSON.parse(data);

          if(data.rs == "success"){

            swal("전송이 완료되었습니다.");

            sleep(2500).then(function(){
                swal.close();
                location.replace("/park/ru_map.php?local="+data.mb_local);
            });
          }
          else if(data.rs == "fail"){

          }
        },

        error : function(err){
          $(".loading_div").css("display", "none");
          alert("통신실패");
        }
      });
    });

  });




  $("#recognize").on('click', function(){


    if($("#photo_capture")[0].files.length == 0){
      return;
    }

    var canvas        = cropper.getCroppedCanvas({
      width: 500,
      height: 500,
    });

    canvas.toBlob(function (blob) {
      var formdata      = new FormData();
      var positionData  = cropper.getData(true);

      formdata.append('img_file_car_number', blob, 'image.jpg');

      $.ajax({
        url: 'proc/road_parking_survey/recognize.php',
        type: 'post',
        data: formdata,
        encType : "multipart/form-data",
        processData: false,
        contentType: false,

        beforeSend : function(){
          $(".car_number").val("인식중....");
        },

        success: function (data) {

          var data = JSON.parse(data);


            $(".car_number").val(data.text);



        },

        error : function(err){
          alert("통신실패");
          $(".car_number").val("");
        }
      });
    });

  });


  function handleImgsFilesSelect(e) {
    var files = $("#photo_capture")[0].files;
    var filesArr = Array.prototype.slice.call(files);

    $(".loading_div").css("display", "block");


    //$(".selected_photo").remove();
    filesArr.forEach(function (f) {

      var reader = new FileReader();
      var cnt = 0;

      reader.onload = function (e) {

        var file_size;
        var file_size_name;

        var file = $("#photo_capture")[0].files;
        var file_length = $("#photo_capture")[0].files.length;



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
            cropper.replace(file_img_src);
            cropper.reset();

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

            if(hour > 12){
              ext = "PM";
            }
            else if(hour < 12){
              ext = "AM";
            }

            $(".photo_capture_time").val(ext+" "+capture_time);

            $(".loading_div").css("display", "none");


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

});

</script>


<?include "./tail.php"?>
