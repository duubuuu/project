<?php

include_once('./_common.php');
include_once('../admin.head.php');


$pb_real_code = generateRandomString(50);

?>

<link rel="stylesheet" href="./css/pb_make/pb_make.css?i=<?=$ranum?>">
<link href="./common_css/side_menu.css?i=<?=$ranum?>" rel="stylesheet">


<style>
  .btn_icon_setting {
    display: inline-flex;
    justify-content: center;
    width: 25px !important;
    align-items: center;
  }
  .btn_icon_setting img {
    width: 100% !important;
  }

  .pagination {
    align-items: center;
    position: fixed;
    right: 0;
    bottom: 0;
}
td, th {
  height: 30px;
}
.question_all_chk {
  vertical-align: middle;
}

div.dataTables_wrapper div.dataTables_paginate {
      position: fixed;
      right: 0;
      bottom: 0;
}
#question_list_wrapper {
      min-height: 520px;
}

.cate_make_tooltip .cate_tooltiptext {
  width: 160px;
  left: -66px !important;
}
</style>


<div class="video_form">
  <div style="margin-top: 1.5rem;">
    <h1 class="big-title">문제 생성</h1>
    <div class="flex" style="margin-bottom: 0.7rem;">
      <div class="flex">
        <div class="width_80px">문제 코드</div>
        <input type='text' class="pb_make_input pb_code adm-input" value value placeholder="1234-5"/>
      </div>
      <div class="flex">
        <div class="width_65px">문제명</div>
        <input type='text' class="pb_make_input pb_name adm-input" value placeholder="문제 1입니다." style="width: 16.5rem;"/>
      </div>
      <div class="flex">
        <div class="width_65px">난이도</div>
        <div>
          <!--
          <input type='text' class="pb_make_input" value value placeholder="난이도"/>
        -->

        <select class="pb_make_input difficulty adm-input" style="width: 70px; padding: 0px 10px 0px 15px !important;">
          <option value="3">상</option>
          <option value="2">중</option>
          <option value="1">하</option>
        </select>
      </div>
      </div>
    </div>



  <div class="player_table_div adm-box" >
    <div class="flex" style="justify-content: space-between; align-items: end; padding: 0 0.5rem;">
      <div>
        <div class="adm-box__title-div">
          <div class="adm-box__title">영상 등록</div>
          <div class="">
            <input type="file" id="video_input" data-album="lec_vid" value="영상 업로드"/>
            <label for="video_input" class="video_input adm-box__btn">영상 업로드</label>
            <button class="lec_video_delete btn adm-box__color-btn">삭제</button>
          </div>
        </div>


        <div class="player">


          <label for="video_input" class="video_input_inside">
            <img src="/img/plus.png" class="lec_video_plus" style="" alt=" ">
          </label>

          <!--<video class="player__video viewer" src="./652333414.mp4"></video>-->
          <video class="player__video viewer" src="" style="width:100%;"></video>


          <div class="player__controls">
            <div class="progress">
              <div class="progress__filled"></div>

            </div>
            <button class="player__button toggle" title="Toggle Play">►</button>
            <input type="range" name="volume" class="player__slider" min="0" max="1" step="0.05" value="1">

            <button data-skip="-10" class="player__button">« 10s</button>
            <button data-skip="25" class="player__button">25s »</button>


            <span class="now_duration"></span>
            <span class="all_duration"></span>

          </div>


        </div>

      </div>


      <!-- 업로드된 이미지 -->

      <div class="table_div">
        <div class="adm-box__title-div" style="justify-content: space-between; height: 40px;">
          <div>*영상 구간별 질문 등록</div>
          <button class="btn question_select_delete adm-box__color-btn">삭제</button>
        </div>

        <table id="question_list" class="display nowrap adm-box__in-box-shadow" style="height: 464px;width:100%;">
          <thead>
            <th style="width: 5%;"><input type='checkbox' class="question_all_chk" /></th>
            <th style="width: 10%;">등록시간</th>
            <th style="width: 10%;">정답</th>
            <th style="width: 10%;">삭제</th>
            <th style="display:none"></th>
          </thead>

          <tbody>

            <tr>


            </tr>


          </tbody>
        </table>

      </div>

    </div> <!-- 영상 질문 칸 -->

  </div>

  <div class="" style="display: flex; justify-content: space-between;">
    <div class="adm-box" style=" width: 48%; min-width: 551px; margin-right: 20px;">
      <div class="adm-box__title-div">
        <div class="adm-box__title">문제 이미지 등록</div>
        <div class="pb_upload_title">
          <input type="file" id="img_input" data-album="lec_img" value="비디오 업로드"/>
          <label for="img_input" class="img_input adm-box__btn">이미지 업로드</label>
          <button class="pb_img_delete btn adm-box__color-btn ">삭제</button>
        </div>
      </div>
      <div class="lec_img_zone" style="height: 380px; margin-bottom: 20px;">
        <label for="img_input" class="img_input_inside">
          <img src="/img/plus.png" class="lec_img_plus" style="" alt=" " />
        </label>
      </div>
      <div class="lec_img_ansnwer">
        <div class="flex">
          <div class="sub_title adm-box__title" style="width: 160px;">정답 등록</div>
          <input type="text" class="form-control pb_answer_input adm-input" value value placeholder="해당 문제의 정답을 입력해주세요. :D" style="width:100%; background: rgba(242, 63, 66, 0.09); margin-right: 0 !important;"/>
          <!-- <button class="btn btn-primary pb_answer_reg">저장</button> -->
          <!-- <div>
            <div class="reged_answer_title">등록된 정답</div>
            <input type="text" readonly class="reged_answer" value=""/>
          </div> -->
        </div>
        <!-- <button class="pb_make_complete btn btn-primary">문제생성</button> -->
      </div>
    </div>

      <!--
      <div class="pb_data">

      <div class="flex">
      <div class="pb_data_col pb_data_title">영상 주소</div>
      <div class="pb_data_col lec_video_path"></div>
    </div>

    <div class="flex" >
    <div class="pb_data_col pb_data_title">영상 이름</div>
    <div class="pb_data_col lec_video_name"></div>
  </div>

  <div class="flex" >
  <div class="pb_data_col pb_data_title">문제 정답</div>
  <div class="pb_data_col pb_answer"></div>
  </div>


  <div class="flex" >
  <div class="pb_data_col pb_data_title">카테고리 탭</div>
  <div class="pb_data_col pb_cate_column">단원별</div>
  </div>

  <div class="flex" >
  <div class="pb_data_col pb_data_title">카테고리 이름</div>
  <div class="pb_data_col pb_cate_name"></div>
  </div>


  </div>
  -->
  <!-- 문제생성 카테고리 -->
  <div class="pb_cate_div adm-box" style="width: 48%;">
    <div class="pb_cate">
      <div class="adm-box__title" style="position: absolute;">저장경로 지정<span style="color: #f23f42;">*</span></div>

      <!-- 카테고리 영역 -->

      <div class="side_menu">

        <div class="cate_tool" style="height: 55px;">
          <div style="display:inline-block; margin-right: 0.5rem;">
            <div class="flex button_div" stlye="margin-right: 10px;">
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

          <div class="search_div">
             <input type="text" class="cate_search adm-input" placeholder="search" style="height: 35px;"/>
             <img src="/img/search.png" style="position:absolute; right:6px; top:7px;"/>
          </div>
        </div>

        <div class="side_menu_border">





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

                      <span class="por_line"></span>
                      <input type="checkbox" class="cate_chk" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>" />

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
    </div>
        </div>

        <!-- 유형별 카테고리 -->


      </div>
    </div>




  </div>
  </div>

  <div class="submit-btn-set" style="text-align: center;">
    <button type="button" name="button" class="out__line-btn">취소</button>
    <button type="button" name="button" class="out__red-btn pb_make_complete">생성</button>
  </div>


</div>











</div><!-- 보더 폼 -->

</div><!-- 비디오 폼 -->



<script>




let video_code = "";
let video_duration = "";



$(document).on('click', ".video_url, .img_url", function(){

  var clas = $(this).attr("class");

  if(clas == "video_url"){

    var url = $(this).data("url");
    $(".viewer").attr("src", url);
    video_code = $(this).data("video_code");
    video_name = $(this).data("video_name");

    $(".lec_video_delete").data("video_code", video_code);

    console.log(video_code);

    if(question_list != null){
      question_list.destroy();
    }
    let_lec_video_name = video_name;

    q_list(video_code);



    $(".video_input_inside").remove();



  }

  else if(clas == "img_url"){
    var url = $(this).data("url");
    var pb_answer = $(this).data("pb_answer");

    img_real_code = $(this).data("img_real_code");
    $(".reged_answer").val(pb_answer);

    var html = "";
    html += '<img src="+url+" class="lec_img_reg" alt=" " />';

    $(".lec_img_zone img").remove();
    $(".lec_img_zone").html(html);
  }
});



// 카테고리 별 수정 삭제 추가
var cate_type = "chapter";
var selected_category = "";
var selected_category_code = "";
var let_pb_answer = "";

var let_lec_video_path = "";
var let_lec_video_name = "";
var let_pb_cate_name = "";

var img_uploaded_flag = 0;
let img_real_code = "";


var let_img_name = "";
var let_img_path = "";

var video_play_time = "";
var selected_time = [];
var answer = [];

var q_list_arr = [];
var q_list_ob = {};


var pb_make_complete_flag = 0;


var pb_real_code = "<?=$pb_real_code?>";


q_list_arr['selected_time'] = "";
q_list_arr['reg_time'] = "";
q_list_arr['num'] = "";

</script>



<script src="./js/pb_make/pb_make.js?i=<?=$ranum?>"></script>
<script src="./js/pb_make/pb_aws.js"></script>
<script src="./js/pb_make/pb_make_input.js?i=<?=$ranum?>"></script>
<script src="./js/pb_make/pb_event.js?i=<?=$ranum?>"></script>
<script src="./js/pb_make/function.js?i=<?=$ranum?>"></script>



<!-- 카테고리 함수  -->
<script src="./js/pb_make/category.js?i=<?=$ranum?>"></script>
<script src="./common_func/side_menu/function.js?i=<?=$ranum?>"></script>



<script>
    $(function(){
        q_list();
    });


</script>


<?

include_once(G5_PATH.'/tail.sub.php');
?>
