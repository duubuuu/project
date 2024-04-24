<?
$nav_title = "피킹 완료 주문 최단 경로";
include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');
?>

<!-- web버전  map.js -->
<script type="text/javascript" src="//apis.atlan.co.kr/maps/map.js?key=13854825031a6761ab97195aae1d39c8e2251c0e4f"></script>
<!-- mobile버전  map.js -->
<!-- script type="text/javascript" src="//apis.atlan.co.kr/maps/m/map.js?key=YOUR_API_KEY"></script -->
<script type="text/javascript">
	var map;
	function initialize() {
		var mapOpts = {
		center : new atlan.maps.UTMK(953933.75, 1952050.75),
		zoom : 11
	};
	map = new atlan.maps.Map(document.getElementById('map'), mapOpts);
	};
	window.onload = initialize;
</script>

	<div id="map" style="width:800px;height:600px;"></div>
