<?
$nav_title = "주문번호별 상품 정보";
include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');

// $sql = "SELECT * FROM ga_order
//         WHERE mb_id = '{$mb_id}'
//         AND od_con = '003'
//         AND od_picking_con = '100'
//         AND od_date < '{$todate} 10:10:00'
//         ORDER BY od_idx DESC";
$sql = "SELECT * FROM ga_order
        WHERE mb_id = '{$mb_id}'
        AND od_con = '003'
        AND od_picking_con = '100'
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
<title>주문번호별 상품 정보</title>
<div class="fix">
    <div class="fix_top inner flex">
        <!-- <div class="inputA date_select" id="date_select">
            <select class="" name="">
                <option value="">21-09-03</option>
            </select>
        </div> -->
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
            <button type="button" name="button" class="line_btn_s" id="tab_move_btn" onclick="location.href='/delivery/add_order.php'">
                배송지 수기 추가
            </button>
        </div>
    </div>
</div>
<div class="scroll_div">
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
              <p class="adress_p <?=$val['shop_no'] == 5?" book_on":""?>" >
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
                  <button type="button" name="button" class="pink_btn_s completed_picking" id="completed_picking" onclick="picking_update('200',<?=$val['od_idx']?>)">
                      피킹완료
                  </button>

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
<button type="button" name="button" class="pink_btn last_btn" id="whole_completed_picking">
    피킹완료(선택)
</button>
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

      $(document).ready(function(){  // 주문건 내 피킹완료 버튼 클릭 시, 해당 주문건 삭제
          // $(".completed_picking").click(function(){
          //     $(this).parent().parent().parent().remove();
          // });
      });
</script>

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

        // $('#tab_move_btn').click(function(){
        //     $('.add_delivery_address_tab').show();
        // });
        // $('#tab_close_btn').click(function(){
        //     $('.add_delivery_address_tab').hide();
        // });
    });
</script>


<!-- 최단경로 검색 버튼 클릭시 의사 재확인 팝업 -->
<div class="popup">
    <div class="popup_pink_line mgt30"></div>
    <p class="popup_text mgt20 mgb30">
        해당건들을 정말<br> 피킹완료로 바꾸겠습니까?
    </p>
    <div class="flex popup_bottom_btnset">
        <button type="button" name="button" class="close">아니요</button>
        <button type="button" name="button" class="path_search" onclick="picking_update_all()">예</button>
    </div>
</div>
<div class="black_overlay"></div>

<!-- 탭 접근시 비밀번호 입력 팝업 -->
<div class="password_popup" style="display: none;">
    <div class="password_inner">
        <div class="popup_pink_line mgt30"></div>
        <p class="popup_text mgt20 mgb30">
            해당 탭 접근을 위해
            <br>비밀번호를 입력해주세요.
        </p>
        <div class="flex" style="justify-content: space-around;">
            <div class="A" style="width: calc(100% - 70px) !important;">
              <input type="text" id="co_pass" class="tab_password" placeholder="password">
            </div>
            <button type="button" name="button" class="pink_btn_s pxw-60 pxh-44" id="completion">확인</button>
        </div>
    </div>
</div>
<div class="white_overlay"></div>

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

    // 탭접근 비밀번호 팝업
    $(document).ready(function(){
        $(".password_popup").show();
        $(".white_overlay").show();
        if(localStorage.co_pass == "ok"){
          $(".password_popup").hide();
          $(".white_overlay").hide();
        }
    });
    $(function(){
        $("#completion").click(function(){
            let co_pass = $('#co_pass').val();
            let data_list = {
              co_pass:co_pass,
              work_mode:'list_before_picked_ck'
            }
            $.ajax({
              url: "/delivery/proc.php",
              type: "post",
              async: false,
              data: data_list,
              success:function(res){
                if(res == "ok"){
                  localStorage.co_pass = "ok";
                  $(".password_popup").hide();
                  $(".white_overlay").hide();
                }else{
                  alert('비밀번호가 올바르지 않습니다.');
                }
              }
            });
        });
    });
</script>




<?include "./tail.php"?>
