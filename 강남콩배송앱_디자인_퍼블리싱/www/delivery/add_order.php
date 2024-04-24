<?
$nav_title = "배송지 수기추가";
include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');

$sql = "SELECT * FROM ga_bookmark
        WHERE mb_id = '{$mb_id}'
        ORDER BY bo_idx DESC";
$bo_list = $dbobj->sql_list($sql);
?>
<title>주문번호별 상품 정보</title>

<script>
  $(document).ready(function(){
    $(".detail_li_bottom").hide();
    $(".adress_p").click(function(){
      //$(this).attr();
      $(this).parent().next(".detail_li_bottom").slideToggle(300);
    });
  });
  $(document).ready(function(){
    $(".detail_li_bottom").hide();
    $(".new_adress").click(function(){
      $(this).next(".detail_li_bottom").slideToggle(300);
    });
  });

  $(document).ready(function(){

  });
</script>
<div class="add_delivery_address_tab" >

   <ul class="tabs">
       <li class="tab-link current" data-tab="tab-1">
       <span>즐겨찾기</span>
       <span>
           <img src="img/icon_star.png" alt="즐겨찾기별아이콘">
       </span>
        </li>
       <li class="tab-link" data-tab="tab-2">신규 입력</li>
   </ul>
   <input type="hidden" id="mb_id" value="<?=$mb_id?>"/>
   <input type="hidden" id="lat" value="" />
   <input type="hidden" id="lng" value=""/>
   <div id="tab-1" class="tab-content current">
       <ul class="inner">
          <?foreach ($bo_list as $val) {?>
            <li class="bookmark_li <?=$val['member_name'] == "집"?"bookmark_li_on":""?>">
                <div class="bookmark_li_name_box flex">
                    <div class="">
                        <input type="checkbox" id="bookmark_ck<?=$val['bo_idx']?>" value="<?=$val['bo_idx']?>" class="bookmark">
                        <label for="bookmark_ck<?=$val['bo_idx']?>" class="bookmark_li_name h5">
                            <span></span>
                            <?=$val['member_name']?>
                        </label>
                    </div>
                    <div class="bookmark_li_right_btnset">

                        <?if($val['member_name'] != "집"){?>
                          <a class="change_btn" href="/delivery/update_bookmark.php?bo_idx=<?=$val['bo_idx']?>">
                              수정
                          </a>
                          <a class="elimination" href="/delivery/proc.php?work_mode=delete_bookmark&bo_idx=<?=$val['bo_idx']?>">
                              삭제
                          </a>
                        <?}else {?>
                          <span>
                            <img src="img/icon_star.png" alt="즐겨찾기별아이콘">
                          </span>
                        <?}?>
                    </div>
                </div>
                <h5 class="bookmark_li_tel">
                    <?=$val['member_hp']?>
                </h5>
                <h5 class="bookmark_li_adress">
                  [<?=$val['zip_code']?>]
                  <?=$val['address1']?>
                </h5>
            </li>
          <?}?>

       </ul>
       <button type="button" name="button" onclick='$(".popup").show();$(".black_overlay").show();' class="pink_btn last_btn" id="add_delivery_address_btn" style="border-radius: 0; box-shadow: initial;">
          배송지 수기 추가 (선택)
       </button>
   </div>
   <div id="tab-2" class="tab-content">
       <div class="inner">
           <div class="">
               <p class="item mgb5">수령인&수령지</p>
               <div class="A">
                   <input type="text" name="" placeholder="신규 추가 수령인" id="member_name">
               </div>
           </div>
           <div class="mgt15">
               <p class="item mgb5">연락처</p>
               <div class="A">
                   <input type="text" name="" placeholder="010-1234-5678" id="member_hp">
               </div>
           </div>
           <div class="mgt15">
               <p class="item mgb5">배송지</p>
               <div class="flex mgb5">
                   <div class="A pw-60">
                       <input type="text" name="" placeholder="우편번호 입력" disabled id="zip_code">
                   </div>
                   <button type="button" name="button" id="zip_code_search_btn" onclick="address_sc()" class="pw-40 mgl3">우편번호 검색</button>
               </div>
               <div class="A ">
                   <input type="text" placeholder="주소" id="address1" readonly>
               </div>
           </div>
           <div class="mgt15">
             <p class=" mgb5">상세주소</p>
             <div class="A ">
                 <input type="text" name="" value="" id="address1_1" placeholder="상세주소">
             </div>
           </div>
           <div class="mgt15">
               <p class="mgb5">메모</p>
               <div class="A pxh-80">
                   <textarea name="name" rows="8" cols="70" id="bo_memo"></textarea>
               </div>
           </div>
           <!-- 즐겨찾기 목록에 추가 + 배송지 추가 -->
           <button type="button" name="button" onclick="add_bookmark()" class="soft_pink_btn login_btn flex mgt10 mgb5" id="add_bookmark_btn">
               <span>즐겨찾기</span>
               <span>
                   <img src="img/icon_star.png" alt="즐겨찾기별아이콘">
               </span>
           </button>
           <!-- 일회성 배송지 추가 -->
           <button type="button" name="button" class="pink_btn login_btn" id="add_one_time_btn" onclick="add_order()">
               배송지 수기 추가
           </button>
           <!-- <p class="note">
             배송지 수기 추가는 당일 10시까지 등록해주세요. <br> 당일 10시가 넘어가면 다음날 배송건으로 잡히게 됩니다.
           <p> -->
       </div>
   </div>
</div>
<script>
    // 탭동작
    $(document).ready(function(){
        $('ul.tabs li').click(function(){
            var tab_id = $(this).attr('data-tab');
            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');
            $(this).addClass('current');
            $("#"+tab_id).addClass('current');
        });

        $('#tab_move_btn').click(function(){
            $('.add_delivery_address_tab').show();
        });
        $('#tab_close_btn').click(function(){
            $('.add_delivery_address_tab').hide();
        });
    });
</script>

<!-- 최단경로 검색 버튼 클릭시 의사 재확인 팝업 -->
<div class="popup">
    <div class="popup_pink_line mgt30"></div>
    <p class="popup_text mgt20 popup_text_note">
        해당건들을 정말 수기추가하나요?
        <!-- <span class="note">
          배송지 수기 추가는
          당일 10시까지 등록해주세요. 당일 10시가 넘어가면 다음날 배송건으로 잡히게 됩니다.
        </span> -->
    </p>
    <div class="flex popup_bottom_btnset">
        <button type="button" name="button" class="close">아니요</button>
        <button type="button" name="button" class="path_search" onclick="add_order_bookmark_all()">예</button>
    </div>
</div>
<div class="black_overlay"></div>

<!-- 탭 접근시 비밀번호 입력 팝업 -->
<div class="password_popup" style="display: none;">
    <div class="password_inner">
        <div class="popup_pink_line mgt30"></div>
        <p class="popup_text mgt20 mgb30 ">
            해당 탭 접근을 위해
            <br>비밀번호를 입력해주세요.
        </p>
        <div class="flex" style="justify-content: space-around;">
            <div class="A" style="width: calc(100% - 70px) !important;">
              <input type="text" name="mb_name" class="tab_password" placeholder="password">
            </div>
            <button type="button" name="button" class="pink_btn_s pxw-60 pxh-44" id="completion">확인</button>
        </div>
    </div>
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
                geocoder.addressSearch(data.address, function(results, status){
                    // 정상적으로 검색이 완료됐으면
                    if (status === daum.maps.services.Status.OK) {
                        var result = results[0]; //첫번째 결과의 값을 활용
                        $("#lat").val(result.y);
                        $("#lng").val(result.x);
                    }
                });
                element_layer.style.display = 'none';
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
