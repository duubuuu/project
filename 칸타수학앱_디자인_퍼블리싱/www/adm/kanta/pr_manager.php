<?php

include_once('./_common.php');
include_once('../admin.head.php');


$sql = "select count(*) as cnt from pb_pr_temp";
$pb_pr_temp_cnt = sql_fetch($sql);



?>

<link rel="stylesheet" href="./css/project/pr_create.css?i=<?=$ranum?>">
<link href="./common_css/side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>
<link href="./common_css/pr_side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>

<style>

.cate_btn {
  display: inline-flex;
  justify-content: center;
  width: 25px !important;
  align-items: center;
  padding: 0px 3px;
}
.cate_btn img {
  width: 100% !important;
}

.pr_side_menu_border {
    width: auto;
    height: 551px;
    box-shadow: 4px 4px 5px #d0d0d054;
    border: 1px solid #d0d0d094;
    border-radius: 0.3rem !important;
    filter: none !important;
}
table.dataTable.no-footer {
    box-shadow: 4px 4px 5px #d0d0d054;
    border: 1px solid #d0d0d094;
    border-radius: 0.3rem !important;
}

.pr_btn_set {
  text-align: right;
  /* position: absolute; */
  /* right: 0; */
}
.adm-box__color-btn {
  border-color: transparent;
  border-radius: 5px;
  line-height: 35px !important;
}

#pr_list {
  min-height: 476px !important;
  max-height: 476px !important;
}
div.dataTables_wrapper div.dataTables_paginate {
      position: fixed;
      right: 0;
      bottom: 0;
}

table.dataTable tbody tr {
    height: 42px;
}
#pr_list_wrapper {
    height: 545px;
}

div.dataTables_wrapper div.dataTables_paginate {
      position: fixed;
      right: 0;
      bottom: 0;
}

.cate_make_tooltip .cate_tooltiptext {
    width: 130px;
    left: -46px !important;
}
.search_div {
  width: 220px !important;
}
</style>


<div class="pr_form">
  <div class="big-title">
    프로젝트 관리·설정
  </div>
  <div class="adm-box" style="display: flex; flex-direction: column; align-items: center; margin-bottom: 1.5rem !important;">


    <!------------------------------------------------------------------ 프로젝트 폼 ------------------------------------------------------------------------->

    <!-- 문제생성 카테고리 -->
    <!--<div class="adm-box__title" style="margin-bottom: 15px; text-align: left; width: 100%;">프로젝트 관리설정</div>-->
    <div class="pb_cate_div flex" style="height: 585px; box-shadow: none; margin: 0; width: 100%; justify-content: space-between;">
      <div class="pb_cate" style="margin: 0; width: 25%;">


        <!-- 카테고리 영역 -->
        <div class="pr_side_menu" style="position: revert; padding: 0 10px 50px 10px;">
          <div class="cate_tool" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
            <div style="display:inline-block; ">
              <div class="flex button_div">
                <div class="position:relative;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool" onclick="pr_create(event);" style="margin: 0;"><img src="/img/create.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>프로젝트<br>카테고리 생성</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>
                <div class="position:relative;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool" onclick="pr_rename(event);" style="margin: 0;"><img src="/img/repair.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>프로젝트<br>카테고리 수정</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>
                <div class="position:relative;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool" onclick="pr_menu_delete(event);" style="margin: 0;"><img src="/img/delete.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>프로젝트<br>카테고리 삭제</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>
                <!-- <div class="position:relative;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool" onclick="pr_selected(event);" style="margin: 0;"><img src="/img/selected.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>프로젝트 추가</span>
                      <div class="cate_tri"></div>
                  </div>
                </div> -->
              </div>
            </div>

            <div class="search_div">
               <input type="text" class="pr_cate_search adm-input" placeholder="프로젝트 카테고리 검색"/>
               <img src="/img/search.png" style="position:absolute; right:6px; top:7px;"/>
            </div>
          </div>

          <div class="pr_side_menu_border" style="width: auto; height: 476px;">




          <!-- 프로젝트별 카테고리 -->



          <?

          $chap_sql_1 = "select * from pr_tree_1";
          $chap_rs_1 = sql_query($chap_sql_1);

          while($row_1 = sql_fetch_array($chap_rs_1)){
            ?>

            <div class="pr_cate_1 project" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>">
              <div class="pr_cate_1_name block" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>">
                <span class="val_span" data-depth="<?=$row_1['depth']?>" data-cate_code="<?=$row_1['cate_code']?>" data-reged_num="<?=$row_1['num']?>"><?=$row_1['name']?></span>
                <input type='text' class="none val_input form-css" value="<?=$row_1['name']?>" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>"/>

              </div>


              <?
              $chap_sql_2 = "select * from pr_tree_2 where target_num = '{$row_1['num']}'";
              $chap_rs_2 = sql_query($chap_sql_2);

              while($row_2 = sql_fetch_array($chap_rs_2)){



                ?>

                <div class="pr_cate_2" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>"  data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>">

                  <div class="pr_cate_2_name block" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>" data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>">

                    <span class="por_line"></span>
                    <span class="val_span" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>" data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>"><?=$row_2['name']?></span>
                    <input type='text' class="none val_input form-css" value="<?=$row_2['name']?>" data-target_num="<?=$row_1['num']?>" data-reged_num="<?=$row_2['num']?>" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>"/>
                  </div>



                  <?
                  $chap_sql_3 = "select * from pr_tree_3 where target_num = '{$row_2['num']}'";
                  $chap_rs_3 = sql_query($chap_sql_3);

                  while($row_3 = sql_fetch_array($chap_rs_3)){


                    ?>

                    <div class="pr_cate_3" data-pr_real_code="<?=$row_3['pr_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>">
                      <div class="pr_cate_3_name block" data-pr_real_code="<?=$row_3['pb_real_code']?>"  data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>">
                        <span class="val_span" data-pr_real_code="<?=$row_3['pr_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>"><?=$row_3['pr_code']." - ".$row_3['pr_name']?></span>
                        <input type='text' class="none val_input form-css" value="<?=$row_3['pb_code']." - ".$row_3['pb_name']?>" data-pr_real_code="<?=$row_3['pb_real_code']?>" data-target_num="<?=$row_2['num']?>" data-reged_num="<?=$row_3['num']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>"/>
                      </div>




                      <?
                      $chap_sql_4 = "select * from pr_tree_4 where target_num = '{$row_3['num']}'";
                      $chap_rs_4 = sql_query($chap_sql_4);

                      while($row_4 = sql_fetch_array($chap_rs_4)){


                        ?>

                        <div class="pr_cate_4" data-pr_real_code="<?=$row_4['pr_real_code']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>">
                          <div class="pr_cate_4_name block" data-pr_real_code="<?=$row_4['pb_real_code']?>"  data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>">
                            <span class="val_span" data-pr_real_code="<?=$row_4['pr_real_code']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>"><?=$row_4['pr_code']." - ".$row_4['pr_name']?></span>
                            <input type='text' class="none val_input form-css" value="<?=$row_4['pb_code']." - ".$row_4['pb_name']?>" data-pr_real_code="<?=$row_4['pb_real_code']?>" data-target_num="<?=$row_3['num']?>" data-reged_num="<?=$row_4['num']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>"/>
                          </div>


                        </div>

                        <?
                      }
                      ?>





                    </div>

                    <?
                  }
                  ?>



                </div>

                <?
              }
              ?>



            </div>

            <?
          }
          ?>

          <!-- 프로젝트 카테고리 -->

        </div>


        <!-- 선택된 카테고리 표시 -->


      </div>





    </div>


    <!-- 프로젝트 리스트 -->

    <div class="table_div" style="width: 73%; margin-right: 0; margin-left: 56px;">
      <div class="pr_btn_set">
        <button type="button" name="button" class="adm-box__color-btn">선택삭제</button>
        <button type="button" name="button" class="adm-box__color-btn">선택이동</button>
      </div>
      <table id="pr_list" class="display nowrap" style="width:100%;">
        <thead>
          <th style="width: 5%;"><input type='checkbox' class="pr_all_chk" /></th>
          <!-- <th></th> -->
          <!-- <th>프로젝트 이름</th>
          <th>등록시간</th>
          <th>관리</th> -->
          <th style="width: 10%;">문제 코드</th>
          <th style="width: 25%;">문제명</th>
          <th style="width: 10%;">난이도</th>
          <!--
          <th style="width: 10%;">단원명</th>
          <th style="width: 10%;">유형명</th>
        -->
          <th style="width: 10%;">관리</th>
          <!--<th style="width: 10%;">미리보기</th>-->
        </thead>

      </table>

    </div>




  </div><!-- 보더 폼 -->
  </div>
  <div class="submit-btn-set" style="text-align: center;">
    <button type="button" name="button" class="out__line-btn">취소</button>
    <button type="button" name="button" class="out__red-btn">완료</button>
  </div>




<script>



  // 카테고리 별 수정 삭제 추가
  var cate_type = "chapter";
  var selected_category = "";
  var selected_category_code = "";
  var let_pb_answer = "";

  var let_pb_video_path = "";
  var let_pb_video_name = "";
  var let_pb_cate_name = "";

  var img_uploaded_flag = 0;
  let img_real_code = "";

  var let_img_name = "";
  var let_img_path = "";

  var selected_cnt = 0;
  var selected_cnt_2 = 0;

</script>


<script src="./js/project/pr_manager.js?i=<?=$ranum?>"></script>

<script src="./js/pb_make/pb_aws.js"></script>
<script src="./js/pb_make/pb_make_input.js?i=<?=$ranum?>"></script>

<script src="./js/pb_make/function.js?i=<?=$ranum?>"></script>


<script src="./js/project/pr_aws.js"></script>
<script src="./js/project/pr_make_input.js?i=<?=$ranum?>"></script>
<script src="./js/project/pr_event.js?i=<?=$ranum?>"></script>
<script src="./js/project/pr_function.js?i=<?=$ranum?>"></script>


<!-- 카테고리 함수  -->
<script src="./js/pb_make/category.js?i=<?=$ranum?>"></script>
<script src="./js/project/pr_category.js?i=<?=$ranum?>"></script>
<script src="./common_func/side_menu/function.js?i=<?=$ranum?>"></script>
<script src="./common_func/pr_side_menu/function.js?i=<?=$ranum?>"></script>
<?

include_once(G5_PATH.'/tail.sub.php');
?>
