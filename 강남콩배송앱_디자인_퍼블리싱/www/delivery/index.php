<?
$nav_title = "주문 상품 집계";
include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');



$sql = "SELECT *,SUM(quantity) AS quantitys FROM ga_order_item
        WHERE mb_id = '{$mb_id}'
        AND it_con = '001'
        AND it_pick_con = '100'
        AND additional_option_value = ''
        GROUP BY variant_code";

// $sql = "SELECT *,SUM(quantity) AS quantitys FROM ga_order_item
//         WHERE mb_id = '{$mb_id}'
//         AND it_con = '001'
//         AND it_pick_con = '100'
//         AND additional_option_value = ''
//         AND ti_date < '{$todate} 10:10:00'
//         GROUP BY variant_code";

$it_list = $dbobj->sql_list($sql);
?>
<title>주문 상품 집계</title>
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
           <div class="icon_logout" onclick="location.href='/delivery/logout.php'">
               로그아웃
           </div>
           <?if($_SESSION['mall_id'] == "gangnamkong"){?>
               <button type="button" name="button" class="pink_btn_s" id="completion" onclick="location.href='/delivery/excel.php'">엑셀다운로드</button>

           <?}?>
        </div>
    </div>
    <div class="total_product_title">
        <div class="inner flex" style="height: 100%;">
            <span class="pw-85" style="text-align: center;">상품명-옵션명</span>
            <span class="pw-15" style="text-align: right;">수량</span>
        </div>
    </div>
</div>
<div class="total_product_ul scroll_div" style="height: calc(100vh - 170px);">
    <?foreach ($it_list as $val){?>
      <div class="flex total_product_li">
          <div class="total_product_left">
              <a href="https://gangnamkong.co.kr/product/detail.html?product_no=129" target="_blank"><!-- 상품 클릭시, 상세페이지연결 -->
                  <span class="product_name">
                    <?=$val['product_name']?>
                  </span>
                  <br>
                  <span class="option_name">
                      <?=$val['option_value']?>
                  </span>
              </a>
          </div>
          <div class="total_product_right">
              <span class="quantity">
                <?=$val['quantitys']?>
              </span>
          </div>
      </div>
    <?}?>
</div>




<?include "./tail.php"?>
