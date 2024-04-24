<?php

include_once('./_common.php');
include_once('../admin.head.php');




?>

<link rel="stylesheet" href="./css/pb_make/pb_make.css?i=<?=$ranum?>">
<link href="./common_css/side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>
<style>
.side_menu_border {
  height: 475px !important;
}
.dataTables_wrapper {
    height: 580px;
}

  #pb_list {
    box-shadow: 4px 4px 5px #d0d0d054;
    border: 1px solid #d0d0d094;
    border-radius: 0.3rem !important;
}

  #pb_list tbody{
    position: relative;
    z-index:10;
  }


  .img_url{
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width:200px;
    text-align: center;
  }

  .adm-box__color-btn {
    border-color: transparent;
    border-radius: 5px;
    line-height: 35px !important;
  }

  .pr_btn_set {
    position: absolute;
    /* right: 0; */
}

.cate_tool {
    width: 100%;
    text-align: revert !important;
    display: flex;
    justify-content: space-between;
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

#pb_list {
  min-height: 476px !important;
  max-height: 476px !important;
}

div.dataTables_wrapper div.dataTables_paginate {
      position: fixed;
      right: 0;
      bottom: 0;
}

div.dataTables_wrapper div.dataTables_filter input {
    height: 36px !important;
    box-shadow: inset 2px 2px 7px rgb(0 0 0 / 10%) !important;
    font-size: 1rem;
    padding: 0 40px 0 10px !important;
}
#pb_list_wrapper {
  margin-top: 4px;
}

.cate_make_tooltip .cate_tooltiptext {
  width: 160px;
  left: -66px !important;
}
</style>


<div class="video_form">

  <div style="margin-top: 1.5rem;">

    <div class="big-title">문제 관리·설정</div>
    <!-- 문제생성 카테고리 -->
    <div class="pb_cate_div flex adm-box" style="justify-content: space-between; align-items: end; height: 62vh;">


      <div class="pb_cate" style="width: 46.5%;max-width:600px;">


        <!-- 카테고리 영역 -->

        <div class="side_menu">

          <div class="cate_tool" style="height: 50px;">
            <div style="display:inline-block; margin-right: 0.5rem;">
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
                <!-- <div class="position:relative;">
                  <button type="button"  class="btn cate_btn btn-sm cate_tool btn_icon_setting" onclick="selected(event);"><img src="/img/selected.png" /></button>
                  <div class="cate_make_tooltip">
                      <span class='cate_tooltiptext'>문제 추가</span>
                      <div class="cate_tri"></div>
                  </div>
                </div> -->
              </div>
            </div>

            <div class="search_div adm-input" style="width: auto !important; height: 36px; margin-right: 0 !important;">
               <input type="text" class="cate_search" placeholder="문제 카테고리 검색" style="height: 35px;"/>
               <img src="/img/search.png" style="position:absolute; right:6px; top:7px;"/>
            </div>
          </div>

          <div class="side_menu_border" style="">



            <!-- 단원별 카테고리 -->

        <div class="flex">

          <div class="chapter_div">

            <div data-cate="chapter_cate" class="cate_tab chapter_cate">단원별</div>

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


                      <span class="val_span" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>" data-reged_num="<?=$row_2['num']?>" data-target_num="<?=$row_1['num']?>"><?=$row_2['name']?></span>
                      <input type='text' class="none val_input form-css" value="<?=$row_2['name']?>" data-target_num="<?=$row_1['num']?>" data-reged_num="<?=$row_2['num']?>" data-cate_code="<?=$row_2['cate_code']?>" data-depth="<?=$row_2['depth']?>"/>
                    </div>



                    <?
                    $chap_sql_3 = "select * from pb_chap_tree_3 where target_num = '{$row_2['num']}'";
                    $chap_rs_3 = sql_query($chap_sql_3);

                    while($row_3 = sql_fetch_array($chap_rs_3)){


                      ?>

                      <div class="cate_3" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>">
                        <div class="cate_3_name block" data-pb_real_code="<?=$row_3['pb_real_code']?>"  data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>">


                          <!--
                          <span class="por_line"></span>
                          <input type="checkbox" class="cate_chk" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>" />
                        -->

                          <span class="val_span" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>"><?=$row_3['name']?></span>
                          <input type='text' class="none val_input form-css" value="<?=$row_3['pb_code']." - ".$row_3['pb_name']?>" data-pb_real_code="<?=$row_3['pb_real_code']?>" data-target_num="<?=$row_2['num']?>" data-reged_num="<?=$row_3['num']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>"/>
                        </div>





                        <?

                        $chap_sql_4 = "select * from pb_chap_tree_4 where target_num = '{$row_3['num']}'";
                        $chap_rs_4 = sql_query($chap_sql_4);
                        while($row_4 = sql_fetch_array($chap_rs_4)){
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

            <!-- 단원별 카테고리 -->

          </div>




            <!-- 유형별 카테고리 -->

          <div class="type_div">
            <div data-cate="type_cate" class="cate_tab type_cate">유형별</div>

            <?

            $type_sql_1 = "select * from pb_type_tree_1";
            $type_rs_1 = sql_query($type_sql_1);

            while($row_1 = sql_fetch_array($type_rs_1)){

              ?>

              <div class="cate_1 type" data-type="type" data-cate_code="<?=$row_1['cate_code']?>" data-depth="<?=$row_1['depth']?>" data-reged_num="<?=$row_1['num']?>">
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


                          <!--
                          <span class="por_line"></span>
                          <input type="checkbox" class="cate_chk" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>" />
                        -->


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

          </div>
        </div>
            </div>

            <!-- 유형별 카테고리 -->



        </div>

      </div>

      <!-- 문제 리스트 -->

      <!-- 업로드된 이미지 -->

      <div class="table_div" style="width:59.5%;margin-top: 26px; margin-top: 0; margin-left: 30px; max-height: 440px;">
        <div class="pb_btn_set">
          <button type="button" name="button" class="adm-box__color-btn pb_delete_btn">선택삭제</button>
          <button type="button" name="button" class="adm-box__color-btn" onclick="selected(event);">선택이동</button>
        </div>


        <table id="pb_list" class="display nowrap" style="width:100%;">
          <thead>
            <th style="width:5%;"><input type='checkbox' class="pb_all_chk" /></th>
            <th style="width:10%;">문제 코드</th>
            <th style="width:10%;">문제명</th>
            <th style="width:15%;">등록시간</th>
            <th style="width:5%;">관리</th>
            <th style="width:10%;">미리보기</th>
          </thead>

        </table>

      </div> <!-- 이미지 업로드 -->


      <!-- 문제 리스트 -->



    </div>





  </div><!-- 보더 폼 -->

</div><!-- 비디오 폼 -->




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

</script>


<script src="./js/pb_make_list/pb_aws.js"></script>
<script src="./js/pb_make_list/pb_make_list.js?i=<?=$ranum?>"></script>
<script src="./js/pb_make_list/pb_make_input.js?i=<?=$ranum?>"></script>
<script src="./js/pb_make_list/pb_event.js?i=<?=$ranum?>"></script>
<script src="./js/pb_make_list/function.js?i=<?=$ranum?>"></script>



<!-- 카테고리 함수  -->
<script src="./js/pb_make_list/category.js?i=<?=$ranum?>"></script>
<script src="./common_func/pb_make_list/function.js?i=<?=$ranum?>"></script>

<?

include_once(G5_PATH.'/tail.sub.php');
?>
