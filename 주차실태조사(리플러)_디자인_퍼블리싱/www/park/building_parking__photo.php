<?

include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');


if($s_member['mb_name'] == ""){
  alert("로그인 해주세요", "/park/login.php");
  exit;
}



?>
<title>건축물부설주차조사_사진촬영</title>
<style>

</style>


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
              <label for="photo_capture" id="photo_capture">사진 촬영·재촬영</label>
            </span>
          </div>
        </button>
        <div class="flex" style="justify-content: space-between;">
            <button type="button" name="button" class="gray_btn big_font" style="width: 49%; margin: 0;" onclick="history.back();">
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

<script>

$(".photo_s_img").click(function(){
  console.log("!");
  $("#photo_capture").click();
});
$(".photo_s_img").click();

  $(function(){
      $("#photo_capture").on("change", handleImgsFilesSelect);

      var busul_data = localStorage.getItem('busul_data');
          busul_data = JSON.parse(busul_data);

      $(".latlng_display").val("N "+busul_data.latitude+" E"+busul_data.longitude);


  });





$("#send_btn").on('click', function(){


  if($("#photo_capture")[0].files.length == 0){
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


  formdata.append("photo_capture", $("#photo_capture")[0].files[0]);


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
              location.replace("/park/bn_map.php?local="+data.mb_local);
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



/* 이미지 추가 */

function handleImgsFilesSelect(e) {
  var files = $("#photo_capture")[0].files;
  var filesArr = Array.prototype.slice.call(files);

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
          else if(hour >= 20 && hour <= 07){
            ext = "PM";
          }

          $(".photo_capture_time").val(ext+" "+capture_time);



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

<?include "./tail.php"?>
