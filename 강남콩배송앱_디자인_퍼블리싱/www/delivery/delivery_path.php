<?
$nav_title = "피킹 완료 주문 최단 경로";
include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');

$sql = "SELECT * FROM ga_config WHERE co_idx ='1'";
$co = $dbobj->sql_list_one($sql);

// $sql = "SELECT * FROM ga_order
//         WHERE mb_id = '{$mb_id}'
//         AND od_con = '003'
//         AND od_picking_con = '200'
//         AND od_date < '{$todate} 10:10:00'
//         ORDER BY od_idx DESC";

$sql = "SELECT * FROM ga_order
        WHERE mb_id = '{$mb_id}'
        AND od_con = '003'
        AND od_picking_con = '200'
        ORDER BY od_idx DESC";

$od_list = $dbobj->sql_list($sql);
if(!$od_list){
  $od_list = [];
}
$sql = "SELECT * FROM ga_order
        WHERE mb_id = '{$mb_id}'
        AND od_con = '004'
        AND od_com_date LIKE '{$todate}%'
        ORDER BY od_idx DESC";
$od_com_list = $dbobj->sql_list($sql);
if(!$od_com_list){
  $od_com_list = [];
}

$od_list = array_merge($od_list,$od_com_list);

$sql = "SELECT * FROM ga_bookmark
        WHERE mb_id = '{$mb_id}'
        AND member_name = '집'";
$ob = $dbobj->sql_list_one($sql);

if($ob['lat'] == "" || $ob['lng'] == ""){
  alert("즐겨찾기에 '집'을 등록해야 사용가능합니다.","/delivery/list_before_picked.php");
}

$param = "origPosY={$co['co_lat']}";
$param .= "&origPosX={$co['co_lng']}";

$param .= "&destPosY={$ob['lat']}";
$param .= "&destPosX={$ob['lng']}";
foreach ($od_list as $val){
  $param .= "&viaPosY={$val['lat']}";
  $param .= "&viaPosX={$val['lng']}";
}
if(count($od_list) == 0){
  alert("피킹완료 목록이 없습니다","/delivery/list_before_picked.php");
}

$sql_it = "SELECT * FROM ga_order_item
        WHERE (mb_id = '{$mb_id}' AND it_con = '001')
        OR (mb_id = '{$mb_id}' AND it_con = '002' AND ti_date > '{$todate_ago} 00:00:00' )";
$it_list = $dbobj->sql_list($sql_it);



foreach ($it_list as $val){
  $it_obj[$val['order_id']][] = $val;
}

for ($i=0; $i <count($od_list) ; $i++) {
  $od_list[$i]['11'] = str_replace('"','',$od_list[$i]['11']);
  $od_list[$i]['address2'] = str_replace('"','',$od_list[$i]['address2']);

}
$od_list_json = json_encode($od_list, JSON_UNESCAPED_UNICODE);
$it_obj_json = json_encode($it_obj, JSON_UNESCAPED_UNICODE);


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://apis.atlan.co.kr/fastrp/searchTrip.json?{$param}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "authKey=13854825031a6761ab97195aae1d39c8e2251c0e4f",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
  ),
));
$rpresults = curl_exec($curl);
curl_close($curl);

$i = 1;
?>
<script type="text/javascript" src="//apis.atlan.co.kr/maps/m/map.js?key=13854825031a6761ab97195aae1d39c8e2251c0e4f"></script>
<title>피킹 완료 주문 최단 경로</title>

<div class="map">
    <!-- 1. 약도 노드 -->
    <div id="map_div" class="root_daum_roughmap"></div>


    <!-- 슬라이드업div -->
    <div class="slide_up_div">
        <div class="slide_up_div_top">
            <span>
                <!-- <img src="img/img_scroll_up_line.png" alt="스크롤업아이콘" class="scroll_up_icon"> -->
                목록보기
            </span>
        </div>
        <div class="slide_up_div_bottom">
            <p style="font-weight: 600; height: 45px; display: flex; justify-content: center; align-items: center;">
                주소 및 배송상세정보
            </p>
              <!-- <div id="divSearchResult"></div> -->
            <div class="curse_ul inner" id="od_list_box">
              <div id="divSearchResult"></div>
              <?foreach ($od_list as $val){?>
                <div class="course_li" id="od_list<?=$i?>">
                  <input type="hidden" id="od_lng<?=$i?>" value="<?=$val['lng']?>">
                  <input type="hidden" id="od_lat<?=$i?>" value="<?=$val['lat']?>">
                  <input type="hidden" id="order_id<?=$i?>" value="<?=$val['order_id']?>">
                  <input type="hidden" id="od_con<?=$i?>" value="<?=$val['od_con']?>">
                    <div class="flex">
                        <div class="corse_num" id="corse_num<?=$i?>">
                            <?=$i?>
                        </div>
                        <div class="adress font15 <?=$val['shop_no'] == 5?" book_on":""?>">
                          [<?=$val['zip_code']?>]
                          <?=$val['address1']?>
                        </div>
                        <?if($val['od_con'] == "003"){?>
                          <button type="button" name="button" class="finish_btn" onclick="oreder_com(<?=$val['od_idx']?>)">
                              완료처리
                          </button>
                        <?}?>
                        <?if($val['od_con'] == "004"){?>
                          <button type="button" name="button" class="finish_btn on">
                              배송완료
                          </button>
                        <?}?>

                        <button type="button" name="button" class="nav_select_btn" onclick="nav_select_btn(<?=$val['lat']?>,<?=$val['lng']?>)">
                            <img src="img/icon_navi.png" alt="네비아이콘">
                        </button>
                    </div>
                    <!-- div.adress 클릭시 펼쳐지는 div -->
                    <div class="course_li_bottom">
                        <p class="order_num mgt10">[주문번호
                            <span><?=$val['order_id']?></span>
                            ]
                        </p>
                        <div class="flex" style="justify-content: space-between;">
                            <span class="recipient font14">
                                <?=$val['member_name']?>
                            </span>
                            <span class="tel_set font14">
                                tel.
                                <a href="#" class="tel_num blue_color"> <?=$val['member_hp']?></a>
                            </span>
                        </div>
                        <?if($val['address2'] != ""){?>
                          <div class="product_color_box">
                              <strong>메모</strong>
                              <p class="message"><?=$val['address2']?></p>
                          </div>
                        <?}?>
                        <div class="product_color_box">
                            <div class="product_list">
                                <?foreach ($it_obj[$val['order_id']] as $vals) {?>
                                  <div class="flex">
                                      <div class="left">
                                          <a href="https://gangnamkong.co.kr/product/detail.html?product_no=<?=$vals['product_no']?>" target="_blank"><!-- 상품 클릭시, 상세페이지연결 -->
                                              <span class="product_name"><?=$vals['product_name']?></span>
                                              <br>
                                              <span class="option_name">
                                                <?=$vals['option_value']?>
                                              </span>
                                          </a>
                                      </div>
                                      <div class="right">
                                          <span class="quantity"><?=$vals['quantity']?></span>
                                      </div>
                                  </div>
                                <?}?>
                            </div>

                        </div>
                        <div class="flex quantity_set" style="">
                            <span>수량</span>
                            <!-- 수량 수기입력 -->
                            <div class="inputA pxw-50 mgl5 mgr2">
                                <input type="text" name="총박스수량" class="fixed_quantity" value="<?=$val['od_box']?>" readonly>
                            </div>
                            <span class="unit mgr10">(box)</span>
                        </div>
                    </div>
                </div>
              <?$i++;} // 순서증가?>
            </div>
        </div>
    </div>

    <!-- 네비아이콘 클릭 시, display: block -->
    <div class="navi_set flex" style="display:none;">
        <div class="navi_btn" id="t_map_btn">
            <img src="img/icon_tmap.png" alt="티맵아이콘">
        </div>
        <div class="navi_btn" id="kakao_btn">
            <img src="img/icon_kakaonavi.png" alt="카카오내비아이콘">
        </div>
        <!-- <div class="navi_btn" id="inavi_btn">
            <img src="img/icon_inaviair.png" alt="아이나비아이콘">
        </div> -->
    </div>
    <div class="popup">
      <div class="popup_pink_line mgt30"></div>

      <form action="/delivery/proc.php" method="post" multiple="multiple" enctype="multipart/form-data" onsubmit="return ck_img()">
        <p class="popup_text mgt20 popup_text_note">
          사진을 올려 배송완료를 완료해주세요
          <input type="hidden" name="work_mode" value="order_com"/>
          <input type="hidden" name="od_idx" id="od_idx"/>
          <label class="od_img_label" for="od_img">
            <input type="file" name="od_img" id="od_img" onchange="od_img_change_event(this)" accept="image/jpeg">
            <img src="/delivery/img/no-image.png" id="od_img_view"/>
          </span>
        </p>
        <div class="flex popup_bottom_btnset">
          <button type="button" class="close">아니요</button>
          <button type="submit" class="path_search">배송완료</button>
        </div>
      </form>

    </div>
    <div class="black_overlay">
    </div>
</div>
<script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
<script>
$(document).ready(function(){
  $(".slide_up_div_bottom").addClass('off');
  $(".slide_up_div").addClass('off');
  $(".slide_up_div_top").click(function(){
      $(".slide_up_div_bottom").toggleClass('off');
      $(".slide_up_div").toggleClass('off');
      // $(".scroll_up_icon").toggle().attr("src", "img/img_scroll_up_line02.png");
  });
  $("#whole_completed_picking").click(function(){
      $(".black_overlay").css("display", "block");
      $(".popup").css({"display":"flex", "flex-direction":"column", "align-items":"center"});
  });
  $(".close").click(function(){
      $(".popup").hide();
      $(".black_overlay").hide();
  });
});

var authKey = '13854825031a6761ab97195aae1d39c8e2251c0e4f';

var directionsService = new atlan.maps.local.DirectionsService(authKey);
var geocoder = new atlan.maps.local.Geocoder(authKey);

var heightLimitMarkers = [];
var weightLimitMarkers = [];

var originMarker, destinationMarker, waypointMarker;
var originIconUrl = "/delivery/img/icon_map_start.png";
var destinationIconUrl = "/delivery/img/icon_map_end.png";
var waypointIconUrl = "http://img.atlan.co.kr/_atlan_map/img/marker_via.png";

//var originPosition = new atlan.maps.UTMK(953933.75, 1952050.75); // 서울특별시청
var originPosition = new atlan.maps.LatLng(<?=$co['co_lat']?>,<?=$co['co_lng']?>); // //출발
var destinationPosition = new atlan.maps.LatLng(<?=$ob['lat']?>,<?=$ob['lng']?>); // 도착


var waypoint_arr = []

var pointType = directionsRenderer = map = null;
var boundary = null;
Kakao.init('ebbea329571768974d2b69354da431d0');
Kakao.isInitialized();

$(document).ready(function() {

  let pre_lat;
  let pre_lng;
  navigator.geolocation.getCurrentPosition(function (res) {
    pre_lat = res.coords.latitude;
    pre_lng = res.coords.longitude;
  },function(err) {
    if(err.code == 1){
      alert("현재 위치가 비활성화 상태입니다.");
    }
  });
  map = new atlan.maps.Map(document.getElementById('map_div'), {
    center : originPosition,
    zoom : 10
  });
  // 지도 영역에 출발지/경유지/도착지 모두 표시할 수 있도록 바운드리 조정
  if (boundary == null) {
    boundary = new atlan.maps.Boundary(originPosition, originPosition);
  }
  boundary = boundary.union(destinationPosition);
  boundary = boundary.union(originPosition);
  //boundary = boundary.union(waypointPosition);

  map.fitBoundary(boundary);
  var directionsRendererOptions = {
    map : map,
    keepView : false,
    offMarkers : true,
    offPolylines : false,
    polylineOptions : {
      strokeColor : '#2ca7ed',
      strokeWeight : 5
    }
  };

  directionsRenderer = new atlan.maps.local.DirectionsRenderer(directionsRendererOptions);

  originMarker = new atlan.maps.overlay.Marker({
    visible : true,
    position : originPosition,
    icon : ({
      url : originIconUrl,
      size : new atlan.maps.Size(27, 35)
    }),
    draggable : true,
    map : map
  });
  destinationMarker = new atlan.maps.overlay.Marker({
    visible : true,
    position : destinationPosition,
    icon : ({
      url : destinationIconUrl,
      size : new atlan.maps.Size(27, 35)
    }),
    draggable : true,
    map : map
  });

  directionsService_callback('<?=$rpresults?>');
});

// 좌표를 POI로 변환
function coord2poi(coord, target) {
  var callFunction = "coord2poi_callback_" + target;
  geocoder.coord2poi({
    type : 1,
    x : coord.x,
    y : coord.y
  }, callFunction);
}

function coord2poi_callback_orign(jsonData) {
  if (jsonData.ItemCnt != "0") {
    console.log(jsonData.Item[0].PoiStr);
    $('#originStr').text(jsonData.Item[0].PoiStr);
  }
}
function coord2poi_callback_destination(jsonData) {
  if (jsonData.ItemCnt != "0") {
    console.log(jsonData.Item[0].PoiStr);
    $('#destinationStr').text(jsonData.Item[0].PoiStr);
  }
}
function coord2poi_callback_waypoint(jsonData) {
  if (jsonData.ItemCnt != "0") {
    console.log(jsonData.Item[0].PoiStr);
    $('#waypointStr').text(jsonData.Item[0].PoiStr);
  }
}

/*
 * #########################################
 * Directions Service
 * #########################################
 */


function directionsService_callback(res){
  var data = JSON.parse(res);
  var directionsResult = directionsService.parseRoute(data);
  if (directionsResult.errcd != 0) {
    alert("경로 검색에 이상이 있어 이용할 수 없습니다.\n잠시 후 다시 이용해 주시기 바랍니다.");
  } else {
    directionsRenderer.removeDirections();
    directionsRenderer.setDirections(directionsResult);
  }
  showRouteInfo(directionsResult)

  let permutation = data.rpresults.items[0].permutation; // 경로순서
  console.log(permutation);
  //console.log(data.rpresults.items[0].permutation);
  var od_lng;
  var od_lat;
  var od_con;
  var order_id_tmp;
  var img_icon;
  var od_html = [];
  for (var i = 0; i < permutation.length; i++){
    od_lng = $("#od_lng"+i).val();
    od_lat = $("#od_lat"+i).val();
    od_con = $("#od_con"+i).val();
    order_id_tmp = $("#order_id"+i).val();

    if(od_con == "004"){
      img_icon = 'https://img.atlan.co.kr/_atlan_map/img/weight_limit.png';
    }else {
      img_icon = 'https://map.ecn.cdn.ofs.kr/images_20160226/img/poi06.png';
    }
    // 마커삽입
    if(typeof od_lng != "undefined" && typeof od_lat != "" && typeof order_id_tmp != ""){
      var coordLatLng = new atlan.maps.LatLng(od_lat, od_lng); // 경위도 좌표
      marker = new atlan.maps.overlay.Marker({
        position : coordLatLng,
        icon : {
          //https://map.ecn.cdn.ofs.kr/images_20160226/img/poi06.png
          //http://img.atlan.co.kr/_atlan_map/img/weight_limit.png
          url : img_icon,
          size : new atlan.maps.Size(30,30),
          anchor : new atlan.maps.Point(15, 15)
        },
        cursor : "default",
        content : '<p class="go_point" onclick="go_point('+od_lng+','+od_lat+','+"'"+order_id_tmp+"'"+')">'+permutation[i]+"</p>",
        map : map
      });

      $("#corse_num"+i).html(permutation[i]);
      od_html[permutation[i]] =   document.getElementById("od_list"+i).outerHTML;
      $("#od_list"+i).remove();
    }
  }
  // dom  생성
  for (var i = 0; i < od_html.length; i++) {
    $("#od_list_box").append(od_html[i+1]);
  }
  $(".course_li_bottom").hide();
  $(".adress").click(function(){
    $(this).parent().next(".course_li_bottom").toggle();
  });

  $(".black_overlay").click(function(){
      $(".navi_set").hide();
      $(".popup").hide();
      $(".black_overlay").hide();
  });
  $("#kakao_btn").click(function(){
     let lng = $(this).attr("lng");
     let lat = $(this).attr("lat");
    Kakao.Navi.start({
      name: '다음목적지',
      x:Number(lng),
      y:Number(lat),
      coordType: 'wgs84',
    });
  });
  $("#t_map_btn").click(function(){
     let datas = {}
     datas['lng'] = $(this).attr("lng");
     datas['lat'] = $(this).attr("lat");
     datas['work_mode'] = "t_map_btn";
     let dataJson = JSON.stringify(datas);
     window.ReactNativeWebView.postMessage(dataJson);
  });
  $("#inavi_btn").click(function(){
     let datas = {}
     datas['lng'] = $(this).attr("lng");
     datas['lat'] = $(this).attr("lat");
     datas['work_mode'] = "inavi_btn";
     let dataJson = JSON.stringify(datas);
     window.ReactNativeWebView.postMessage(dataJson);
  });




}

function showRouteInfo(directionsResult){
  $('#divSearchResult').html('');
  var elem = document.getElementById("divSearchResult");
  var distanceTxt, durationTxt, durationMin;

  // elem.innerHTML = "<h4>경로탐색 결과</h4>";

  if (directionsResult.result.total_distance.value < 1000) {
    distanceTxt = directionsResult.result.total_distance.value + "m";
  } else {
    distanceTxt = Math.round(directionsResult.result.total_distance.value) / 1000 + "km";
  }
  durationMin = parseInt(directionsResult.result.total_duration.value / 60)
  if (durationMin < 60) {
    durationTxt = durationMin + "분";
  } else {
    durationTxt = parseInt(durationMin / 60) + "시간 " + durationMin % 60 + "분";
  }
  elem.innerHTML = elem.innerHTML + "<p> 전체 거리 : " + distanceTxt + "</p>";
  elem.innerHTML = elem.innerHTML + "<p> 소요 시간 : " + durationTxt + "</p>";
}

// 지도 컨트롤
console.log('<?=$od_list_json?>');
let od_list_json_text = '<?=$od_list_json?>';
od_list_json_text = od_list_json_text.replace(/\n/g, "\\\\n").replace(/\r/g, "\\\\r").replace(/\t/g, "\\\\t");
let od_list_json = JSON.parse(od_list_json_text);
let it_obj_json = JSON.parse('<?=$it_obj_json?>');
var info;
function go_point(od_lng,od_lat,order_id){
  // 지도를 중앙으로
  if(info){
    info.setMap(null)
  }

  var coordLatLng = new atlan.maps.LatLng(od_lat, od_lng); // 경위도 좌표
  map.setCenter(coordLatLng);
  let od = get_order_info(od_lng,od_lat);
  var tmpl = 	'<div class="destination_box">';
  tmpl += "<h3 class='destination'>"+od.address1+"</h3>";
  tmpl += "<h3 class='destination'>"+od.member_name+" / <a href='tel:"+od.member_hp+"'>"+od.member_hp+"</a></h3>";
  if(typeof it_obj_json[order_id] != "undefined"){
    for (var obj of it_obj_json[order_id]) {
      tmpl += "<p class='destination'>"+obj.product_name+"("+obj.quantity+"개)</p>";
      if(obj.option_value != "" ){
          tmpl += "<p class='destination'>- 옵션 "+obj.option_value+"</p>";
      }
    }
  }

  //tmpl += "<p>"+od.address1+"</p>";
  tmpl += "<div class='finish_btn_box'>";
  if(od.od_con == '003'){
    tmpl += "<button class='finish_btn' onclick='oreder_com("+od.od_idx+")'>완료처리</button>";
  }
  if(od.od_con == '004'){
    tmpl += "<button class='finish_btn on'>배송완료</button>";
  }
  tmpl += "<button class='finish_btn' onclick='nav_select_btn("+od.lat+","+od.lng+")'>내비</button>";
  tmpl += "</div>";
  tmpl += "</div>";
	info = new atlan.maps.overlay.InfoWindow({
		maxWidth : 300,
    maxHeight:100,
    height:100,
		position : coordLatLng,
		content : tmpl
	});
    //$('.atlanmap-info').remove();
    info.open(map);
}
function get_order_info(od_lng,od_lat){
  for (var i = 0; i < od_list_json.length; i++) {
    if(od_list_json[i].lng == od_lng && od_list_json[i].lat == od_lat){
      return od_list_json[i];
      break;
    }
  }
  return;
}

function nav_select_btn(od_lat,od_lng){
  $(".navi_set").show();
  $(".black_overlay").show();
  // 다들 온클릭 이벤트 등록
  $("#t_map_btn").attr("lat",od_lat);
  $("#t_map_btn").attr("lng",od_lng);

  $("#kakao_btn").attr("lat",od_lat);
  $("#kakao_btn").attr("lng",od_lng);

  $("#inavi_btn").attr("lat",od_lat);
  $("#inavi_btn").attr("lng",od_lng);
}

function ck_img(){
  const previewImage = document.getElementById("od_img_view");
  if(previewImage.src == "https://softer097.cafe24.com/delivery/img/no-image.png"){
    alert('사진을 올려주세요');
    return false;
  }
  $(".popup").hide();
  $(".black_overlay").hide();

}


function od_img_change_event(input){

  if(input.files && input.files[0]){
    const reader = new FileReader();
    reader.onload = function(e){
      const previewImage = document.getElementById("od_img_view");
      previewImage.src = e.target.result;
    }
    reader.readAsDataURL(input.files[0])
  }else{

  }
}

</script>




<? include "./tail.php"?>
