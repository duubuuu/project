<?
$nav_title = "배송지 수기추가";
include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');

$sql = "SELECT * FROM ga_bookmark
        WHERE bo_idx = '{$bo_idx}'";
$bo = $dbobj->sql_list_one($sql);
?>
<title>주문번호별 상품 정보</title>

<script>



</script>
<div class="add_delivery_address_tab" >

<form action="/delivery/proc.php" method="post">
   <input type="hidden" name="work_mode" value="update_bookmark"/>
   <input type="hidden" name="lat" id="lat" value="<?=$bo['lat']?>"/>
   <input type="hidden" name="lng" id="lng" value="<?=$bo['lng']?>"/>
   <input type="hidden" name="bo_idx" id="bo_idx" value="<?=$bo['bo_idx']?>"/>

   <div class="update_bookmark">
       <div class="">
           <p class="item mgb5">수령인&수령지</p>
           <div class="A">
               <input type="text" placeholder="신규 추가 수령인" name="member_name" value="<?=$bo['member_name']?>" id="member_name" required>
           </div>
       </div>
       <div class="mgt15">
           <p class="item mgb5">연락처</p>
           <div class="A">
               <input type="text" name="member_hp" value="<?=$bo['member_hp']?>" placeholder="010-1234-5678" id="member_hp" required>
           </div>
       </div>
       <div class="mgt15">
           <p class="item mgb5">배송지</p>
           <div class="flex mgb5">
               <div class="A pw-60">
                   <input type="text" name="zip_code" value="<?=$bo['zip_code']?>" id="zip_code" placeholder="우편번호 입력" readonly required>
               </div>
               <button type="button" name="button" id="zip_code_search_btn" onclick="address_sc()" class="pw-40 mgl3">우편번호 검색</button>
           </div>
           <div class="A ">
               <input type="text" name="address1" value="<?=$bo['address1']?>" placeholder="주소" id="address1" readonly required>
           </div>
       </div>
       <div class="mgt15" id="address1_1box">
         <p class=" mgb5">상세주소</p>
         <div class="A ">
             <input type="text" name="address1_1" value="<?=$bo['address1_1']?>" id="address1_1" placeholder="상세주소">
         </div>
       </div>
       <div class="mgt15">
           <p class="mgb5">메모</p>
           <div class="A pxh-80">
               <textarea name="bo_memo" rows="8" cols="70" id="bo_memo"><?=$bo['bo_memo']?></textarea>
           </div>
       </div>
       <!-- 즐겨찾기 목록에 추가 + 배송지 추가 -->
       <button type="submit" name="button" class="soft_pink_btn login_btn flex mgt10 mgb5" id="add_bookmark_btn">
           <span>즐겨찾기 수정</span>
           <span>
               <img src="img/icon_star.png" alt="즐겨찾기별아이콘">
           </span>
       </button>

   </div>

</form>
</div>

<div class="white_overlay"></div>
<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:99;-webkit-overflow-scrolling:touch;">
  <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1;width:auto" onclick="closeDaumPostcode()" alt="닫기 버튼">
</div>
<div id="map" style="width:300px;height:300px;margin-top:10px;display:none"></div>

<script>
    $(function(){
        $("#whole_completed_picking").click(function(){
            $(".black_overlay").css("display", "block");
            $(".popup").css({"display":"flex", "flex-direction":"column", "align-items":"center"});
        });
        $(".close").click(function(){
            $(".popup").hide();
            $(".black_overlay").hide();
        });
    });
    $(document).ready(function(){
      $("#address1_1box").hide();
    });
</script>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=061d278831be08b6406f597ef9ea41ec&libraries=services"></script>
<script>
    var geocoder = new daum.maps.services.Geocoder();
    var element_layer = document.getElementById('layer');

    function closeDaumPostcode() {
        // iframe을 넣은 element를 안보이게 한다.
        element_layer.style.display = 'none';
    }
    function address_sc(){
        new daum.Postcode({
            oncomplete: function(data) {
                // 주소 정보를 해당 필드에 넣는다.
                document.getElementById("address1").value = data.address;
                document.getElementById("zip_code").value = data.zonecode;
                //document.getElementById("address1").value = addr;
                // 주소로 상세 정보를 검색
                geocoder.addressSearch(data.address, function(results, status) {
                    // 정상적으로 검색이 완료됐으면
                    if (status === daum.maps.services.Status.OK) {
                        var result = results[0]; //첫번째 결과의 값을 활용
                        $("#lat").val(result.y);
                        $("#lng").val(result.x);
                    }
                });
                element_layer.style.display = 'none';
                $("#address1_1box").show();
            },
            width : '100%',
            height : '100%',
            maxSuggestItems : 5
        }).embed(element_layer);
         element_layer.style.display = 'block';
        initLayerPosition();
    }
    function initLayerPosition(){
        var width = 300; //우편번호서비스가 들어갈 element의 width
        var height = 400; //우편번호서비스가 들어갈 element의 height
        var borderWidth = 5; //샘플에서 사용하는 border의 두께

        // 위에서 선언한 값들을 실제 element에 넣는다.
        element_layer.style.width = width + 'px';
        element_layer.style.height = height + 'px';
        element_layer.style.border = borderWidth + 'px solid';
        // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
        element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
        element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
    }
</script>



<?include "./tail.php"?>
