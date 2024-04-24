<?php

include_once('./_common.php');
include_once('../admin.head.php');


$sql = "select count(*) as cnt from pb_pr_temp";
$pb_pr_temp_cnt = sql_fetch($sql);



?>

<link rel="stylesheet" href="./css/project/pr_create.css?i=<?=$ranum?>">
<link href="./common_css/side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>
<link href="./common_css/pr_side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>


<style media="screen">
  .dataTables_wrapper {
    height: 490px;
  }



  #pb_selected_list tbody{
    position: relative;
    z-index:10;
  }

  #pb_order tbody{
    position: relative;
    z-index:10;
  }

  .btn_icon_setting {
    display: inline-flex;
    justify-content: center;
    width: 25px !important;
    align-items: center;
  }
  .btn_icon_setting img {
    width: 100% !important;
  }
  #pb_selected_list {
    width: 100%;
    box-shadow: 4px 4px 5px #d0d0d054;
    border: 1px solid #d0d0d094;
    border-radius: 0.3rem !important;
}
.pr_side_menu_border {
  box-shadow: 4px 4px 5px #d0d0d054;
  border: 1px solid #d0d0d094;
  border-radius: 0.3rem !important;
  filter: none !important;
}
#pr_list {
  box-shadow: 4px 4px 5px #d0d0d054;
  border: 1px solid #d0d0d094;
  border-radius: 0.3rem !important;
}

.dataTables_wrapper {
  height: 585px;
}
#pb_selected_list, #pr_list {
  min-height: 476px !important;
  max-height: 476px !important;
}
div.dataTables_wrapper div.dataTables_paginate {
      position: fixed;
      right: 0;
      bottom: 0;
}
#pb_selected_list_filter {
  margin-bottom: 0.5rem !important;
}
div.dataTables_wrapper div.dataTables_filter label {
  margin-bottom: 0 !important;
}
div.dataTables_wrapper div.dataTables_filter input {
  font-size: 1rem;
}

.cate_make_tooltip:first-child .cate_tooltiptext {
  width: 160px;
  left: -66px !important;
}
.cate_make_tooltip:last-child .cate_tooltiptext {
    width: 130px;
    left: -46px !important;
}
.search_div {
  width: 255px !important;
}
</style>

<div class="pr_form">
  <div class="big-title">
    프로젝트 생성
  </div>
  <div class="adm-box" style="display: flex; flex-direction: column; align-items: center; margin-bottom: 1.5rem !important;">
      <div class="adm-box__title" style="text-align: left; width: 100%; margin-bottom: 15px;">문제 카테고리</div>
    <!-- 문제생성 카테고리 -->
    <div class="pb_cate_div flex" style="height: 600px; box-shadow: none; width: 100%; justify-content: space-between;">
      <div class="pb_cate" style="margin: 0; width: 25%; height: auto;">


        <!-- 카테고리 영역 -->

        <div class="side_menu">

            <div class="cate_tool" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
            <div style="display:inline-block;">
              <div class="flex button_div">
                <div class="position:relative;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool btn_icon_setting" onclick="create(event);"><img src="/img/create.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>문제 카테고리 생성</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>
                <div class="position:relative;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool btn_icon_setting" onclick="rename(event);"><img src="/img/repair.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>문제 카테고리 수정</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>
                <div class="position:relative;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool btn_icon_setting" onclick="menu_delete(event);"><img src="/img/delete.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>문제 카테고리 삭제</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>

              </div>
            </div>

            <div class="search_div">
               <input type="text" class="cate_search  adm-input" placeholder="문제 카테고리 검색"/>
               <img src="/img/search.png" style="position:absolute; right:6px; top:7px;"/>
            </div>
          </div>

          <div class="side_menu_border" style="height: 476px;">




            <div class="cate_select flex">
              <div data-cate="chapter_cate" class="cate_tab chapter_cate">단원별</div>
              <div data-cate="type_cate" class="cate_tab type_cate">유형별</div>
            </div>



          <!-- 단원별 카테고리 -->



          <?

          $chap_sql_1 = "select * from pb_chap_tree_1";
          $chap_rs_1 = sql_query($chap_sql_1);

          while($row_1 = sql_fetch_array($chap_rs_1)){
            ?>

            <div class="cate_1 chapter" data-type="chapter" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>">
              <div class="cate_1_name block" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>">
                <span class="val_span" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>"><?=$row_1['name']?></span>
                <input type='text' class="none val_input form-css" value="<?=$row_1['name']?>" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>"/>

              </div>


              <?
              $chap_sql_2 = "select * from pb_chap_tree_2 where target_num = '{$row_1['num']}'";
              $chap_rs_2 = sql_query($chap_sql_2);

              while($row_2 = sql_fetch_array($chap_rs_2)){



                ?>

                <div class="cate_2"  data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>"  data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>">

                  <div class="cate_2_name block" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>" data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>">

                    <span class="por_line"></span>
                    <span class="val_span" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>" data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>"><?=$row_2['name']?></span>
                    <input type='text' class="none val_input form-css" value="<?=$row_2['name']?>" data-target_num="<?=$row_1['num']?>" data-reged_num="<?=$row_2['num']?>" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>"/>
                  </div>



                  <?
                  $type_sql_3 = "select * from pb_chap_tree_3 where target_num = '{$row_2['num']}'";
                  $type_rs_3 = sql_query($type_sql_3);
                  while($row_3 = sql_fetch_array($type_rs_3)){
                    ?>

                    <div class="cate_3" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>">
                      <div class="cate_3_name block" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>">

                        <span class="por_line"></span>
                        <input type="checkbox" class="cate_chk" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>" />

                        <span class="val_span" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>"><?=$row_3['name']?></span>
                        <input type='text' class="none val_input form-css" value="<?=$row_3['pb_code']." - ".$row_3['pb_name']?>" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-target_num="<?=$row_2['num']?>" data-reged_num="<?=$row_3['num']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>"/>
                      </div>






                      <?
                      $type_sql_4 = "select * from pb_chap_tree_4 where target_num = '{$row_3['num']}'";
                      $type_rs_4 = sql_query($type_sql_4);
                      while($row_4 = sql_fetch_array($type_rs_4)){
                        ?>

                        <div class="cate_4" data-pb_real_code="<?=$row_4['pb_real_code']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>">
                          <div class="cate_4_name block" data-pb_real_code="<?=$row_4['pb_real_code']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>">
                            <span class="val_span" data-pb_real_code="<?=$row_4['pb_real_code']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>"><?=$row_4['pb_code']." - ".$row_4['pb_name']?></span>
                            <input type='text' class="none val_input form-css" value="<?=$row_4['pb_code']." - ".$row_4['pb_name']?>" data-pb_real_code="<?=$row_4['pb_real_code']?>" data-target_num="<?=$row_3['num']?>" data-reged_num="<?=$row_4['num']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_3['depth']?>"/>
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

          <!-- 단원별 카테고리 -->






          <!-- 유형별 카테고리 -->



          <?

          $type_sql_1 = "select * from pb_type_tree_1";
          $type_rs_1 = sql_query($type_sql_1);

          while($row_1 = sql_fetch_array($type_rs_1)){

            ?>

            <div class="cate_1 type none" data-type="type" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>">
              <div class="cate_1_name block"  data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>">
                <span class="val_span" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>"><?=$row_1['name']?></span>
                <input type='text' class="none val_input form-css" value="<?=$row_1['name']?>" data-reged_num="<?=$row_1['num']?>" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>"/>

              </div>


              <?
              $type_sql_2 = "select * from pb_type_tree_2 where target_num = '{$row_1['num']}'";
              $type_rs_2 = sql_query($type_sql_2);

              while($row_2 = sql_fetch_array($type_rs_2)){
                ?>

                <div class="cate_2" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>"  data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>">

                  <div class="cate_2_name block" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>" data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>">

                    <span class="por_line"></span>
                    <span class="val_span" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>" data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>"><?=$row_2['name']?></span>
                    <input type='text' class="none val_input form-css" value="<?=$row_2['name']?>" data-target_num="<?=$row_1['num']?>" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>" data-reged_num="<?=$row_2['num']?>"/>
                  </div>



                  <?
                  $type_sql_3 = "select * from pb_type_tree_3 where target_num = '{$row_2['num']}'";
                  $type_rs_3 = sql_query($type_sql_3);
                  while($row_3 = sql_fetch_array($type_rs_3)){
                    ?>

                    <div class="cate_3" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>">
                      <div class="cate_3_name block" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>">

                        <span class="por_line"></span>
                        <input type="checkbox" class="cate_chk" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>" />

                        <span class="val_span" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>"><?=$row_3['name']?></span>
                        <input type='text' class="none val_input form-css" value="<?=$row_3['pb_code']." - ".$row_3['pb_name']?>" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-target_num="<?=$row_2['num']?>" data-reged_num="<?=$row_3['num']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>"/>
                      </div>






                      <?
                      $type_sql_4 = "select * from pb_type_tree_4 where target_num = '{$row_3['num']}'";
                      $type_rs_4 = sql_query($type_sql_4);
                      while($row_4 = sql_fetch_array($type_rs_4)){
                        ?>

                        <div class="cate_4" data-pb_real_code="<?=$row_4['pb_real_code']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>">
                          <div class="cate_4_name block" data-pb_real_code="<?=$row_4['pb_real_code']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>">
                            <span class="val_span" data-pb_real_code="<?=$row_4['pb_real_code']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>" data-reged_num="<?=$row_4['num']?>" data-target_num="<?=$row_3['num']?>"><?=$row_4['pb_code']." - ".$row_4['pb_name']?></span>
                            <input type='text' class="none val_input form-css" value="<?=$row_4['pb_code']." - ".$row_4['pb_name']?>" data-pb_real_code="<?=$row_4['pb_real_code']?>" data-target_num="<?=$row_3['num']?>" data-reged_num="<?=$row_4['num']?>" data-cate_code="<?=$row_4['cate_code']?>" data-depth="<?=$row_4['depth']?>"/>
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

          </div>

          <!-- 유형별 카테고리 -->



        </div>

      </div>

      <!-- 문제 리스트 -->

      <!-- 업로드된 이미지 -->

      <div class="table_div" style="width: 73%; max-height: 535px; margin-left: 38px;">


        <table id="pb_selected_list" class="display nowrap" style="width:100%;">
          <thead>
            <th><input type='checkbox' class="pb_all_chk"/></th>
            <th style="width: 10%;">문제 코드</th>
            <th style="width: 25%;">문제명</th>
            <th style="width: 10%;">난이도</th>
            <th style="width: 10%;">단원명</th>
            <th style="width: 10%;">등록일</th>
            <th style="width: 10%;">관리</th>
            <th style="width: 10%;">미리보기</th>
          </thead>

        </table>

      </div> <!-- 이미지 업로드 -->


      <!-- 문제 리스트 -->



    </div><!-- 보더 폼 -->

    <!------------------------------------------------------------------ 프로젝트 폼 ------------------------------------------------------------------------->
    <button type="button" name="button" class="pr_create_btn" style="border: none; background: transparent; width: 8rem; position: relative; filter: drop-shadow(2px 4px 15px rgb(0 0 0 / 20%));">
      <span style="position: absolute; transform: translate(-50%, -50%); top: 62%; left: 50%; color: #ffffff; font-size: 1.3rem; font-weight: 600;">
        추가
      </span>
      <img src="../../../img/down_icon.png" alt="아래로화살표아이콘" style="width: 100%;">
    </button>
    <!-- 문제생성 카테고리 -->
    <div class="adm-box__title" style="margin-bottom: 15px; text-align: left; width: 100%;">프로젝트 카테고리</div>
    <div class="pb_cate_div flex" style="height: 600px; box-shadow: none; margin: 0; width: 100%; justify-content: space-between;">
      <div class="pb_cate" style="margin: 0; width: 25%;">


        <!-- 카테고리 영역 -->
        <div class="pr_side_menu" style="position: revert; padding: 0 10px 50px 10px;">
          <div class="cate_tool" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px;">
            <div style="display:inline-block; ">
              <div class="flex button_div">
                <div style="position:relative;padding:0px 3px;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool btn_icon_setting" onclick="pr_create(event);" style="margin: 0;"><img src="/img/create.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>프로젝트<br>카테고리 생성</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>
                <div style="position:relative;padding:0px 3px;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool btn_icon_setting" onclick="pr_rename(event);" style="margin: 0;"><img src="/img/repair.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>프로젝트<br>카테고리 수정</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>
                <div style="position:relative;padding:0px 3px;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool btn_icon_setting" onclick="pr_menu_delete(event);" style="margin: 0;"><img src="/img/delete.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>프로젝트<br>카테고리 삭제</span>
                      <div class="cate_tri"></div>
                  </div>
                </div>
                <!-- <div style="position:relative;padding:0px 3px;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool btn_icon_setting" onclick="pr_selected(event);" style="margin: 0;"><img src="/img/selected.png" /></button>
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
                      $chap_sql_4 = "select * from pr_tree_3 where target_num = '{$row_3['num']}'";
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

      </div>





    </div>


    <!-- 프로젝트 리스트 -->

    <div class="table_div" style="width: 73%; margin-right: 0; margin-left: 46px;">
      <table id="pr_list" class="display nowrap" style="width:100%;">
        <thead>
          <th style="width: 5%;"><input type='checkbox'  class="pr_all_chk" /></th>
          <!-- <th></th> -->
          <!-- <th>프로젝트 이름</th>
          <th>등록시간</th>
          <th>관리</th> -->
          <th style="width: 10%;">프로젝트 코드</th>
          <th style="width: 25%;">프로젝트명</th>
          <th>문제개수</th>

          <th style="width: 20%;">등록시간</th>
          <!--
          <th style="width: 10%;">단원명</th>
          <th style="width: 10%;">유형명</th>
        -->
          <th style="width: 20%;">관리</th>
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







  <!-- 문제 순서 바꾸는 창 -->

  <div class='pb_order_view'>


    <div class="table_div" style="width: 100%;">




      <table id="pb_order" class="display nowrap" style="width:100%;box-shadow:0px 0px 0px;">
        <thead>
          <th style="width: 5%;"></th>
          <th style="width: 5%;">순번</th>
          <th style="width: 20%;">문제 코드</th>
          <th style="width: 25%;">문제명</th>
          <th style="width: 25%;">등록일</th>
          <th style="width: 10%;">미리보기</th>
        </thead>

      </table>

    </div> <!-- 이미지 업로드 -->


    <div class="order_confirm">
      ×
    </div>


    <div class="arrow_pannel">



      <div class="arrow_up">
            ▲
      </div>

      <div class="arrow_down">
            ▼
      </div>




    </div>

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

  var pb_real_code_order_arr = [];

</script>


<script src="./js/project/pr_create.js?i=<?=$ranum?>"></script>

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
