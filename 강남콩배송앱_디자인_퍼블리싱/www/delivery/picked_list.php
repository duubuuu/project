<?
$nav_title = "피킹완료 주문목록";
include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');

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


$sql_it = "SELECT * FROM ga_order_item
        WHERE mb_id = '{$mb_id}'
        AND it_con = '001'";
$it_list = $dbobj->sql_list($sql_it);

foreach ($it_list as $val){
  $it_obj[$val['order_id']][] = $val;
}

?>

<title>피킹완료 주문목록</title>
<div class="fix">
    <div class="fix_top inner flex">
      <div class="flex">
         <p class="latest_update">
             최신 업데이트 :
             <span class="date"><?=$todate?></span>
             <span class="time"><?=$toTime?></span>
         </p>
         <div class="icon_refresh">
             <img src="img/icon_refresh.png" onclick="location.reload()" alt="새로고침아이콘">
         </div>
      </div>
    </div>
    <div class="fix_bottom pxh-50">
        <div class="inner flex">
            <div class="">
                <input type="checkbox" id="all_choice" class="all_choice" onclick="all_ck(this)">
                <label for="all_choice">
                    <span></span>
                    전체선택 <?=count($od_list)?>건
                </label>
            </div>
            <div class="flex">
                <button type="button" name="button" class="line_btn_s" id="cancle_btn" onclick="picking_update_cancel()">
                    피킹취소(선택)
                </button>
            </div>
        </div>
    </div>
</div>
<div class="scroll_div including_last_btn">
    <div class="inner">
      <?foreach ($od_list as $val){?>
      <div class="detail_li" id='detail_li<?=$val['od_idx']?>'>
          <div class="mgt3">
              <input type="checkbox" id="ck_<?=$val['od_idx']?>" class='ck_od_idx' value="<?=$val['od_idx']?>">
              <label for="ck_<?=$val['od_idx']?>">
                  <span></span>
              </label>
          </div>
          <div class="adress">
            <p class="adress_p <?=$val['shop_no'] == 5?" book_on":""?>">
              [<?=$val['zip_code']?>]
              <?=$val['address1']?>
            </p>
            <div class="flex quantity_set" style="">
                <span>수량</span>
                <!-- 수량 수기입력 -->
                <div class="inputA pxw-50 mgl5 mgr2">
                    <input type="text" value="<?=$val['od_box']?>" id='od_box<?=$val['od_idx']?>' name="총박스수량" class="quantity">
                </div>
                <span class="unit mgr10">(box)</span>


            </div>
          </div>
          <!-- 수량 입력하고 피킹완료 버튼 누르면 해당 주문건 목록이 사라지고 다음탭으로 넘어감 -->

          <!-- div.adress 클릭시 펼쳐지는 div -->
          <div class="detail_li_bottom">
              <div class="flex mgt10 order_info">
                  <p class="order_num">[주문번호
                      <span class="order_num_span"><?=$val['order_id']?></span>
                      ]
                  </p>
                  <p class="Payment_date font14">
                      결제일시
                      <span class="Payment_date_span"><?=$val['order_date']?></span>

                  </p>
              </div>
              <div class="flex" style="justify-content: space-between;">
                  <span class="recipient font14">
                      <?=$val['member_name']?>
                  </span>
                  <span class="tel_set font14">
                      tel.
                      <a href="#" class="tel_num blue_color"><?=$val['member_hp']?></a>
                  </span>
              </div>
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
              <?if($val['address2'] != ""){?>
                <div class="product_color_box">
                  <strong>메모</strong>
                  <p class="message"><?=$val['address2']?></p>
                </div>
              <?}?>

          </div>
      </div>
      <?}?>
    </div>
</div>
<script>
      $(document).ready(function(){
        $(".detail_li_bottom").hide();
        $(".adress").click(function(){
          $(this).next(".detail_li_bottom").slideToggle(300);
        });
      });
      $(document).ready(function(){
        $(".detail_li_bottom").hide();
        $(".new_adress").click(function(){
          $(this).next(".detail_li_bottom").slideToggle(300);
        });
      });
</script>
<button type="button" name="button" class="pink_btn last_btn" id="final_route_search">
    피킹완료 주문건 최단경로 검색
</button>

<!-- 최단경로 검색 버튼 클릭시 의사 재확인 팝업 -->
<div class="popup">
    <div class="popup_pink_line mgt30"></div>
    <p class="popup_text mgt20 mgb30">
        선택하신 주문목록을<br>
        최단경로를 검색합니다.
    </p>
    <div class="flex popup_bottom_btnset">
        <button type="button" name="button" class="close">취소</button>
        <button type="button" name="button" onclick="location.href='/delivery/delivery_path.php'" class="path_search">경로검색</button>
    </div>
</div>
<div class="black_overlay"></div>
<script>
    $(function(){
        $("#final_route_search").click(function(){
            $(".black_overlay").css("display", "block");
            $(".popup").css({"display":"flex", "flex-direction":"column", "align-items":"center"});
        });
        $(".close").click(function(){
            $(".popup").hide();
            $(".black_overlay").hide();
        });
    });
</script>






<?include "./tail.php"?>
