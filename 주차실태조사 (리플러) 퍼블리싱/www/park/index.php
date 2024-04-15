<?

include_once("./_common.php");
include_once("./head.php");


$josa_num = $_REQUEST['josa_num'];
$local = $_REQUEST['local'];

$sql = "select * from excel_data";
$rs = sql_query($sql);



?>


<!-- 지도 -->
<div class="map_wrap">

  <div id="map" class="root_daum_roughmap root_daum_roughmap_landing"></div><!-- 지도 -->
  <!--
  <div class="hAddr">
    <span class="title">지도중심기준 행정동 주소정보</span>
    <span id="centerAddr"></span>
  </div>
  -->


  <div class="excel_name">

    <?while($row = sql_fetch_array($rs)){?>
        <div class="local_select" data-local="<?=$row['local']?>"><?=$row['local']?></div>
    <?}?>

  </div>

</div>

<div class="addr_select">

  <label for="nosang_chk" class="josa_local">
    <div >
      <span>조사구역</span>
      <span><input type='checkbox' id="nosang_chk" class="nosang_chk chk" data-num="0" /></span>
    </div>
  </label>



</div>




<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=e6bdda306eb594eefefb3cd8cd2c9e8c&libraries=services,clusterer"></script>
<script src="js/searcher/function.js?i=<?=$ranum?>"></script>
<script>







let latitude = "";
let longitude = "";
let map;


var local_num = "<?=$josa_num?>";
var local = "<?=$local?>";

var let_map_level = 0;

var features_max_length = 0;
var coordinates_max_length = 0;

var geocoder = new kakao.maps.services.Geocoder();

var timerId;
var searcher_timerId;

var init_flag = 0;

var error_alert_flag = 1;
var timer_flag = 0;
var timer_end_flag = 0;

var polygonPath = [];






var circle_arr = [];

let width = window.innerWidth;

var polygon_arr = [];
var polygon_arr_all = [];
var customOverlay_arr = [];



let line_arr = ['#39DE2A', '#ff0000', '#0000ff'];
let background_arr = ['#A2FF99', '#ffdddd', '#ddddff'];



// 다각형에 마우스오버 이벤트가 발생했을 때 변경할 채우기 옵션입니다
var mouseoverOption =
[
  {
    fillColor: '#A2dddd', // 채우기 색깔입니다
    fillOpacity: 0.8 // 채우기 불투명도 입니다
  },
  {
    fillColor: '#ff0000', // 채우기 색깔입니다
    fillOpacity: 0.8 // 채우기 불투명도 입니다
  },
  {
    fillColor: '#ff0000', // 채우기 색깔입니다
    fillOpacity: 0.8 // 채우기 불투명도 입니다
  }
];
// 다각형에 마우스아웃 이벤트가 발생했을 때 변경할 채우기 옵션입니다
var mouseoutOption =
[
  {
    fillColor: '#A2FF99', // 채우기 색깔입니다
    fillOpacity: 0.8 // 채우기 불투명도 입니다
  },
  {
    fillColor: '#ffdddd', // 채우기 색깔입니다
    fillOpacity: 0.8 // 채우기 불투명도 입니다
  },
  {
    fillColor: '#ffdddd', // 채우기 색깔입니다
    fillOpacity: 0.8 // 채우기 불투명도 입니다
  }
];



var m= L.map('map').setView([34.19641440614805,127.20112455812443], 0);
var geo = L.geoJson({features:[]},{onEachFeature:function popUp(f,l){
  var out = [];
  if (f.properties){
    for(var key in f.properties){
      out.push(key+": "+f.properties[key]);
    }
    l.bindPopup(out.join("<br />"));
  }
}}).addTo(m);







var mapContainer = document.getElementById('map'), // 지도를 표시할 div
mapOption = {
  center : new kakao.maps.LatLng(37.4956362, 126.9508626), // 지도의 중심좌표
  level : 6
  // 지도의 확대 레벨
};

// 지도를 생성합니다
map = new daum.maps.Map(mapContainer, mapOption);



// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
var mapTypeControl = new kakao.maps.MapTypeControl();

// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
var zoomControl = new kakao.maps.ZoomControl();
map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);



kakao.maps.event.addListener(map, 'zoom_changed', function() {


  // 지도의 현재 레벨을 얻어옵니다
  var level = map.getLevel();
  let_map_level = level;

  get_marker();



  if(level > 6){
    customoverlay_remove();
  }
  else{
    if($("#josa_num_chk").prop("checked")){
      customoverlay_setmap();
    }
  }
});


kakao.maps.event.addListener(map, 'dragend', function() {


  // 지도의 현재 레벨을 얻어옵니다
  var level = map.getLevel();
  let_map_level = level;

  get_marker();


  if(level > 6){
    customoverlay_remove();
  }
  else{
    if($("#josa_num_chk").prop("checked")){
      customoverlay_setmap();
    }
  }
});




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
  //console.log(swLatLng.getLat(), swLatLng.getLng(),neLatLng.getLat(), neLatLng.getLng()); // 남서

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
      $(".cluster_mark").remove();

      console.log("지역이름 : "+ out_json[0]);



      if(let_map_level != 1){

        for (var i = 0; i < out_json.length; i++) {



          var clas = "";

          if(out_json[i].counts <= 100){
            clas = "cluster_back_blue cluster_mark";
          }
          else if(out_json[i].counts > 100 && out_json[i].counts <= 500){
            clas = "cluster_back_green cluster_mark";
          }
          else if(out_json[i].counts > 500 && out_json[i].counts <= 2000){
            clas = "cluster_back_yellow cluster_mark";
          }
          else if(out_json[i].counts > 2000 && out_json[i].counts <= 5000){
            clas = "cluster_back_orange cluster_mark";
          }
          else if(out_json[i].counts > 5000){
            clas = "cluster_back_red cluster_mark";
          }

          content = "<div class ='"+clas+"' data-lat='"+out_json[i].latitude+"' data-lng='"+out_json[i].longitude+"'>"+out_json[i].counts+"</div>";
          position = new kakao.maps.LatLng(out_json[i].latitude, out_json[i].longitude);
          customOverlay = new kakao.maps.CustomOverlay({
            position: position,
            content: content
          });


          if(customOverlay != null){
            customOverlay.setMap(map);
          }

        }


      }
      else if(let_map_level == 1){

        for (var i = 0; i < out_json['positions'].length; i++) {

          // 지도에 표시할 원을 생성합니다
          var circle = new kakao.maps.Circle({
            center : new kakao.maps.LatLng(out_json['positions'][i].latitude, out_json['positions'][i].longitude),  // 원의 중심좌표 입니다
            radius: 0.1, // 미터 단위의 원의 반지름입니다
            strokeWeight: 10, // 선의 두께입니다
            strokeColor: '#ff0000', // 선의 색깔입니다
            strokeOpacity: 1, // 선의 불투명도 입니다 1에서 0 사이의 값이며 0에 가까울수록 투명합니다
            strokeStyle: 'solid', // 선의 스타일 입니다
            fillColor: '#ffdddd', // 채우기 색깔입니다
            fillOpacity: 0.7  // 채우기 불투명도 입니다
          });


          circle_arr.push(circle);

          // 지도에 원을 표시합니다
          circle.setMap(map);

        }

      }



    },
    error: function(err) {
      $(".loading_div").css("display","none");
      alert("에러");
    }
  });

}





map_draw_set();
map_draw();


function map_draw(){

  var textstring = "";
  var text_lat = "";
  var text_lng = "";

      var base = base_arr[b_arr];


      shp(base).then(function(data){

        console.log(data);

        var features = data.features;
        polygon_arr = [];

        $.each(features, function(a, val){

          var coordinates = [];




            if(val.geometry.type == "Polygon"){

              for(var b=0; b<val.geometry.coordinates[0].length; b++){

                coordinates = val.geometry.coordinates[0];

                if(local_num == a ){
                  displayArea(coordinates, a, b);
                }

              }

            }
            else if(val.geometry.type == "Point"){
              num_coordinates = val.geometry.coordinates;

              textstring = val.properties.TEXTSTRING;

              var textstring_num = textstring.replace(/0/gi, "");

              if(local_num == textstring_num){
                josa_num(num_coordinates, textstring);
              }
            }



        });


        /* 마커 생성 */
        var markerPosition  = polygonPath[(polygonPath.length-1)];

        // 마커를 생성합니다
        infowindow = new kakao.maps.InfoWindow({zindex:1});
        var marker = new kakao.maps.Marker({
          position: markerPosition
        });

        marker.setMap(map);



        // 마커가 표시될 위치입니다


        // 현재 지도 중심좌표로 주소를 검색해서 지도 좌측 상단에 표시합니다
        //searchAddrFromCoords(map.getCenter(), displayCenterInfo);

        // 지도를 클릭했을 때 클릭 위치 좌표에 대한 주소정보를 표시하도록 이벤트를 등록합니다
        kakao.maps.event.addListener(map, 'click', function(mouseEvent) {
          searchDetailAddrFromCoords(mouseEvent.latLng, function(result, status) {
            if (status === kakao.maps.services.Status.OK) {
              var detailAddr = !!result[0].road_address ? '<div>도로명주소 : ' + result[0].road_address.address_name + '</div>' : '';
              detailAddr += '<div>지번 주소 : ' + result[0].address.address_name + '</div>';

              var content = '<div class="bAddr">' +
              '<span class="title">법정동 주소정보</span>' +
              detailAddr +
              '</div>';



              // 마커를 클릭한 위치에 표시합니다
              marker.setPosition(mouseEvent.latLng);
              marker.setMap(map);

              // 인포윈도우에 클릭한 위치에 대한 법정동 상세 주소정보를 표시합니다
              infowindow.setContent(content);
              infowindow.open(map, marker);
            }
          });
        });

        // 중심 좌표나 확대 수준이 변경됐을 때 지도 중심 좌표에 대한 주소 정보를 표시하도록 이벤트를 등록합니다
        /*
        kakao.maps.event.addListener(map, 'idle', function() {
          searchAddrFromCoords(map.getCenter(), displayCenterInfo);
        });
        */



        polygon_arr_all.push(polygon_arr);

        //console.log(polygon_arr_all);


        if( (b_arr+1) < base_arr.length){
          b_arr = b_arr + 1;

          map_draw();
        }
      });






}











$(".addr_select #nosang_chk").on('click', function(){

    if( $("#nosang_chk").prop("checked") ){

      for(var i=0; i<polygon_arr_all.length; i++){
        for(var a=0; a<polygon_arr_all[i].length; a++){
          polygon_arr_all[i][a].setMap(map);
        }
      }


      customoverlay_setmap();
    }
    else{

      for(var i=0; i<polygon_arr_all.length; i++){
        for(var a=0; a<polygon_arr_all[i].length; a++){
          polygon_arr_all[i][a].setMap(null);
        }
      }

      customoverlay_remove();
    }


});














$(function(){
  get_marker();



  $(document).on('click', ".cluster_mark", function(){
    var lat = $(this).data("lat");
    var lng = $(this).data("lng");

    //console.log(lat+"----------"+lng);

    // 지도를 클릭된 클러스터의 마커의 위치를 기준으로 확대합니다
    map.setLevel( 1 , {anchor: new kakao.maps.LatLng(lat, lng)});
  });


});











window.onload = function(){

  if(window.webkit){
    //alert("ios");
    window.webkit.messageHandlers.go.postMessage("currentposition");
  }
  else{
    //alert("web");
    navigator.geolocation.getCurrentPosition(success, error, options);
  }

}







function reloadgeo(){

  timer_end_flag = 1;

  if(init_flag == 0){
    if(navigator.geolocation){
      if(window.webkit){
        window.webkit.messageHandlers.go.postMessage("currentposition");
      }
      else{
        navigator.geolocation.getCurrentPosition(success, error, options);
      }
    }
    else{
      alert("죄송합니다. 위치기능이 지원되지않는 브라우저입니다.");
    }
  }
}

var options = {
  // 가능한 경우, 높은 정확도의 위치(예를 들어, GPS 등) 를 읽어오려면 true로 설정
  // 그러나 이 기능은 배터리 지속 시간에 영향을 미친다.
  enableHighAccuracy: false, // 대략적인 값이라도 상관 없음: 기본값

  // 위치 정보가 충분히 캐시되었으면, 이 프로퍼티를 설정하자,
  // 위치 정보를 강제로 재확인하기 위해 사용하기도 하는 이 값의 기본 값은 0이다.
  maximumAge: 0,     // 5분이 지나기 전까지는 수정되지 않아도 됨

  // 위치 정보를 받기 위해 얼마나 오랫동안 대기할 것인가?
  // 기본값은 Infinity이므로 getCurrentPosition()은 무한정 대기한다.
  timeout: 3000    // 15초 이상 기다리지 않는다.
}


//alert("현재 위치는 : " + latitude + ", "+ longitude);

function error(e) {
  // 오류 객체에는 수치 코드와 텍스트 메시지가 존재한다.
  // 코드 값은 다음과 같다.
  // 1: 사용자가 위치 정보를 공유 권한을 제공하지 않음.
  // 2: 브라우저가 위치를 가져올 수 없음.
  // 3: 타임아웃이 발생됨.
  if(error_alert_flag == 0){
    alert("정확한 위치감지를 위하여 위치기능을 켜주세요.");
    error_alert_flag = 1;
    //no_loca();
  }

  $(".loading_div").css("display","none");

  if(timer_flag == 0 && timer_end_flag == 0){

    timerId = setInterval(reloadgeo, 4000);

  }
  //alert("Geolocation 오류 "+e.code +": " + e.message);


}



function success(pos) {


  loca_on_flag = 0;

  if(timerId != null) {

    clearInterval(timerId);
    timer_flag = 1;
    init_flag = 1;
  }


  if(typeof pos !== 'object'){
    pos = JSON.parse(pos);
  }




  latitude = pos.coords.latitude;
  longitude = pos.coords.longitude;



  var position = new daum.maps.LatLng(latitude, longitude);


  var marker = new daum.maps.Marker({
    map : map,
    position : position
  });


  var content = "<div class='dotOverlay distanceInfo' style='color:#000; font-weight:600; position:relative; top:-20px;'>현재위치</div>";


  // 커스텀 오버레이가 표시될 위치입니다
  var position = new daum.maps.LatLng(
    latitude, longitude);


    // 커스텀 오버레이를 생성합니다/
    customOverlay = new daum.maps.CustomOverlay(
      {
        map : map,
        position : position,
        content : content,
        yAnchor : 2
      });





      //searcher_timerId = setInterval(searcher_tracking, 4000);



    }





  </script>






</div>
</body>
</html>
