<?

include_once("./_common.php");
include_once("./head.php");


?>

<style>
.count_label{
  width:50px;
  height:50px;
  line-height:50px;
  background-color:#00000090;
  text-align:center;
  color:#fff;
  border-radius:50%;
}
</style>
<!-- 지도 -->
<div class="map_wrap">

  <div id="map" class="root_daum_roughmap root_daum_roughmap_landing"></div><!-- 지도 -->
  <div class="hAddr">
    <span class="title">지도중심기준 행정동 주소정보</span>
    <span id="centerAddr"></span>
  </div>

</div>

<div class="addr_select" style="display:flex;">

  <label for="nosang_chk">
    <div data-num="0">
      <span>노상</span>
      <span><input type='checkbox' id="nosang_chk" class="nosang_chk chk" data-num="0" /></span>
    </div>
  </label>

  <label for="josa_chk">
    <div data-num="1">
      <span>조사구역</span>
      <span><input type='checkbox' id="josa_chk" class="josa_chk chk" data-num="1" /></span>
    </div>
  </label>

  <label for="josa_num_chk">
    <div data-num="2">
      <span>조사구역 번호</span>
      <span><input type='checkbox' id="josa_num_chk" class="josa_num_chk chk" data-num="2" /></span>
    </div>
  </label>

</div>



<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=e6bdda306eb594eefefb3cd8cd2c9e8c&libraries=services,clusterer"></script>



<script>

let mapContainer = document.getElementById('map'), // 지도를 표시할 div
    mapOption = {
        center: new kakao.maps.LatLng(37.5030395113759, 126.9018003137082), // 지도의 중심좌표
        level: 5 // 지도의 확대 레벨
    };


let map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
let mapTypeControl = new kakao.maps.MapTypeControl();

// 지도 타입 컨트롤을 지도에 표시합니다
map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

kakao.maps.event.addListener(map, 'zoom_changed',get_marker);
kakao.maps.event.addListener(map, 'dragend',get_marker);

function get_marker() {
    // 지도의 현재 중심좌표를 얻어옵니다
    let center = map.getCenter();
    // 지도의 현재 레벨을 얻어옵니다
    let level = map.getLevel();
    // 지도타입을 얻어옵니다
    let mapTypeId = map.getMapTypeId();
    // 지도의 현재 영역을 얻어옵니다
    let bounds = map.getBounds();
    // 영역의 남서쪽 좌표를 얻어옵니다
    let swLatLng = bounds.getSouthWest();
    // 영역의 북동쪽 좌표를 얻어옵니다
    let neLatLng = bounds.getNorthEast();
    // 영역정보를 문자열로 얻어옵니다. ((남,서), (북,동)) 형식입니다
    let boundsStr = bounds.toString();

    let message = '지도 중심좌표는 위도 ' + center.getLat() + ', <br>';
    message += '경도 ' + center.getLng() + ' 이고 <br>';
    message += '지도 레벨은 ' + level + ' 입니다 <br> <br>';
    message += '지도 타입은 ' + mapTypeId + ' 이고 <br> ';
    message += '지도의 남서쪽 좌표는 ' + swLatLng.getLat() + ', ' + swLatLng.getLng() + ' 이고 <br>';
    message += '북동쪽 좌표는 ' + neLatLng.getLat() + ', ' + neLatLng.getLng() + ' 입니다';

    // 개발자도구를 통해 직접 message 내용을 확인해 보세요.
    console.log(swLatLng.getLat(), swLatLng.getLng(),neLatLng.getLat(), neLatLng.getLng()); // 남서

    let formdata = {
      lat1:swLatLng.getLat(),
      lat2:neLatLng.getLat(),
      lng1:swLatLng.getLng(),
      lng2:neLatLng.getLng(),
      level:level
    }
    $.ajax({
      type:"POST",
      url:"/park/proc/search_data/search_data.php",
      data : formdata,
      async : false,
      beforeSend : function(){
        $(".loading_div").css("display","block");
      },
      success: function(data){
        $(".loading_div").css("display","none");
        let out_json = JSON.parse(data);
        console.log(out_json);
        let content;
        let position;
        let customOverlay;
        $(".count_label").remove();
        for (var i = 0; i < out_json.length; i++) {
          content = "<div class ='count_label'>"+out_json[i].counts+"</div>";
          position = new kakao.maps.LatLng(out_json[i].latitude, out_json[i].longitude);
          customOverlay = new kakao.maps.CustomOverlay({
              position: position,
              content: content
          });
          customOverlay.setMap(map);
        }
      },
      error: function(err) {
          $(".loading_div").css("display","none");
          alert("에러");
      }
    });

}

</script>



</div>
</body>
</html>
