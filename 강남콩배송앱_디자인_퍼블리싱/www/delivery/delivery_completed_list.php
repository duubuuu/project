<?
$nav_title = "배송완료 주문 목록";
include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');
if($date_select == ""){
    $date_select = date('Y-m-d');
}


$sql = "SELECT * FROM ga_order
        WHERE mb_id = '{$mb_id}'
        AND od_con = '004'
        AND od_com_date LIKE '{$date_select}%'
        ORDER BY od_com_date DESC
        LIMIT 500";
$od_list = $dbobj->sql_list($sql);




?>

<title>배송완료 주문 목록</title>
<div class="fix">
  <div class="date_select">
    <input type="date" id="date_select" onchange="date_select(this)" value="<?=$date_select?>">
  </div>
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
</div>
<div class="scroll_div" style="height: calc(100vh - 170px);">
    <div class="inner">
        <?foreach ($od_list as $val){?>
          <div class="completed_li">
              <div class="flex">
                  <div>
                      <p class="order_num">[주문번호 <span><?=$val['order_id']?></span>]
                      </p>
                      <p class="Payment_date font14">
                          배송완료
                          <span class="Payment_date_span"><?=$val['od_com_date']?></span>
                      </p>
                  </div>
                  <span class="more_btn" onclick="ga_order_item('<?=$val['order_id']?>')">
                      <img src="img/icon_more.png" alt="더보기아이콘">
                  </span>
              </div>
              <div class="flex">
                  <span class="recipient">
                      <?=$val['product_name']?>
                  </span>
                  <span class="tel_set">
                      <a href="tel:<?=$val['member_hp']?>" class="tel_num blue_color"><?=$val['member_hp']?></a>
                  </span>
              </div>
              <div class="adress">
                  <?=$val['address1']?>
              </div>
          </div>
        <?}?>
        <!-- 최단경로 검색 버튼 클릭시 의사 재확인 팝업 -->
        <div class="more_popup">
            <h5 class="more_popup_title">주문 상품 목록</h5>
            <span class="order_num">주문번호
                <span>123456789</span>
            </span>
            <!-- 상품목록 -->
            <div class="product_list" id="product_list">
                <div class="flex">
                    <div class="left">
                        <a href="https://gangnamkong.co.kr/product/detail.html?product_no=129&cate_no=994&display_group=1" target="_blank"><!-- 상품 클릭시, 상세페이지연결 -->
                            <span class="product_name">디벨라 숏파스타 6종 </span>
                            <br>
                            <span class="option_name">
                                - 05. dkclsl el vpvp 500gx1ea(+1,500원)
                            </span>
                        </a>
                    </div>
                    <div class="right">
                        <span class="quantity">10</span>
                    </div>
                </div>
                <div class="flex">
                    <div class="left">
                        <a href="https://gangnamkong.co.kr/product/detail.html?product_no=129&cate_no=994&display_group=1" target="_blank"><!-- 상품 클릭시, 상세페이지연결 -->
                            <span class="product_name">디벨라 숏파스타 6종 </span>
                            <br>
                            <span class="option_name">
                                - 05. dkclsl el vpvp 500gx1ea(+1,500원)
                            </span>
                        </a>
                    </div>
                    <div class="right">
                        <span class="quantity">10</span>
                    </div>
                </div>
                <div class="flex">
                    <div class="left">
                        <a href="https://gangnamkong.co.kr/product/detail.html?product_no=129&cate_no=994&display_group=1" target="_blank"><!-- 상품 클릭시, 상세페이지연결 -->
                            <span class="product_name">피지워터 500mlx24ea</span>
                            <br>
                            <span class="option_name">
                            </span>
                        </a>
                    </div>
                    <div class="right">
                        <span class="quantity">20</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="black_overlay"></div>
        <script>
            $(function(){
            
                $(".black_overlay").click(function(){
                    $(".more_popup").hide();
                    $(".black_overlay").hide();
                });
            });
        </script>

    </div>
</div>




<?include "./tail.php"?>
