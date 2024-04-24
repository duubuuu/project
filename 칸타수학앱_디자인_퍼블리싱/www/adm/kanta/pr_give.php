<?php

include_once('./_common.php');
include_once('../admin.head.php');

$sql = "select * from student_info";
$stu_info = sql_query($sql);

?>

<link rel="stylesheet" href="./css/project/pr_give.css?i=<?=$ranum?>">
<link rel="stylesheet" href="./css/project/pr_give_calendar.css?i=<?=$ranum?>">
<link href="./common_css/side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>
<link href="./common_css/pr_side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>

<style>
.pr_side_menu {
  height: auto;
}
.student_category {
  height: 600px !important;
}
  .pr_side_menu_border, .student_category, .pr_give_calendar_div {
    box-shadow: 4px 4px 5px #d0d0d054;
    border: 1px solid #d0d0d094;
    border-radius: 0.3rem !important;
    filter: none !important;
  }
  .pr_give_calendar_div {
    width: 100% !important;
    height: auto !important;
    margin: 0 !important;
  }
  .cal-table tr th {
    border-left: none !important;
    border-right: none !important;
    border-top: none !important;
    border-bottom: none !important;
}
td, th {
  height: 55px !important;
}
.pr_give_title {
  padding: 8px !important;
  border-radius: 0.3rem !important;
  margin: 0 0 8px 0 !important;
}
.pr_give_form {
  background: transparent !important;
}
.pr_give_div {
  width: 100% !important;
  justify-content: space-between;
  height: 77vh !important;
  align-items: flex-start;
}
.adm-box {
      padding: 2rem 2rem !important;
}
.pr_give_calendar, .pr_side_menu, .student_category_form {
    padding: 0 !important;
    margin: 0 !important;
    width: 30% !important;
}
.pr_give_calendar {
    min-width: auto !important;
    display: flex;
    flex-direction: column;
    height: auto;
}
.search_div {
  width: 100% !important;
  margin: 0 0 15px 0 !important;
}
.ctr-box {
    padding: 0 !important;
    margin-bottom: 0 !important;
    font-size: 20px;
    height: 45px;
    display: inline-flex;
    justify-content: space-between;
    width: 95%;
}
.clearfix:after {
  display: none !important;
}
select.start_hour, .end_hour, .end_minute, .start_minute {
    margin-right: 0.3rem;
    width: 51px;
    padding: 0px 3px;
}
</style>

<div class="pr_give_form">
  <div class="big-title">
    프로젝트 부여
  </div>
  <div class="pr_give_div flex adm-box">
    <!--------------------------------- 학생 카테고리 ---------------------------->

    <div class="student_category_form">

      <div class="pr_give_title">
        부여대상 선택
      </div>

      <div class="student_category">
        <div class="search_div adm-input" style="height: 40px !important;">
          <input type="text" class="cate_search" placeholder="부여대상 검색" style="background: transparent; height: 40px !important;"/>
          <img src="/img/search.png" style="position: absolute; right: 6px; top: 50%; transform: translateY(-50%);"/>
        </div>

        <?

        $student_list_category = $cf_arr['student_list_category'];

        $cate_arr = explode("::", $student_list_category);

        for($i=0; $i<count($cate_arr); $i++){
          ?>

          <div class="cate_1">
            <div class="cate_1_name block">
              <span class="val_span"><?=$cate_arr[$i]?></span>
              <input type='text' class="none val_input form-css" value="<?=$cate_arr[$i]?>" />

            </div>


            <?

            $sql = "select * from student_info where school_grade_type = '{$cate_arr[$i]}'";
            $rs = sql_query($sql);



            while($row = sql_fetch_array($rs)){

              if(strpos($row['grade'], "학년") !== true ){
                $grade = $row['grade']."학년";
              }

              ?>

              <div class="cate_2">

                <div class="cate_2_name block" >

                  <span class="por_line"></span>
                  <span class="val_span"><?=$grade?></span>
                  <input type='text' class="none val_input form-css" value="<?=$grade?>"/>
                </div>



                <?

                $sql = "select * from student_info where grade = '{$row['grade']}' and school_grade_type = '{$cate_arr[$i]}'";
                $rs_1 = sql_query($sql);

                while($row_1 = sql_fetch_array($rs_1)){


                  ?>

                  <div class="cate_3" data-num="<?=$row_1['mb_no']?>" data-mb_id="<?=$row_1['mb_id']?>">
                    <div class="cate_3_name block" data-num="<?=$row_1['mb_no']?>" data-mb_id="<?=$row_1['mb_id']?>" >
                      <input type="checkbox" class="stu_chk" data-num="<?=$row_1['mb_no']?>"/>
                      <span class="val_span" data-num="<?=$row_1['mb_no']?>"><?=$row_1['mb_name']?></span>
                      <input type='text' data-num="<?=$row_1['mb_no']?>" class="none val_input form-css" value="<?=$row_1['mb_name']?>"/>
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

    </div>

    <!--------------------------------- 학생 카테고리 ---------------------------->



      <!-- 카테고리 영역 -->
      <div class="pr_side_menu" style="width: 95%; position: revert; padding: 0 10px 0px 10px;">

        <div class="pr_give_title">
          프로젝트 선택
        </div>


        <div class="pr_side_menu_border" style="height:600px;width: auto;">

          <div class="search_div" style="height: 40px !important;">
            <input type="text" class="pr_cate_search adm-input" placeholder="프로젝트 검색" style="height: 40px !important; margin-right: 0 !important; padding: 0 40px 0 20px !important;"/>
            <img src="/img/search.png" style="position: absolute; right: 6px; top: 50%; transform: translateY(-50%);"/>
          </div>


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
                        <input type="checkbox" class="pr_chk" data-pr_real_code="<?=$row_3['pr_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>"/>
                        <span class="val_span" data-pr_real_code="<?=$row_3['pr_real_code']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>" data-reged_num="<?=$row_3['num']?>" data-target_num="<?=$row_2['num']?>"><?=$row_3['pr_code']." - ".$row_3['pr_name']?></span>
                        <input type='text' class="none val_input form-css" value="<?=$row_3['pb_code']." - ".$row_3['pb_name']?>" data-pr_real_code="<?=$row_3['pb_real_code']?>" data-target_num="<?=$row_2['num']?>" data-reged_num="<?=$row_3['num']?>" data-cate_code="<?=$row_3['cate_code']?>" data-depth="<?=$row_3['depth']?>"/>
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

          <!-- 프로젝트 카테고리 -->

        </div>




      </div>








    <!--------------------------- 프로젝트 일정부여 ----------------------->

    <div class="pr_give_calendar">
      <div class="pr_give_title">
        일정 선택
      </div>

      <div class="pr_give_calendar_div">
        <div class="container">
          <div class="my-calendar clearfix">
            <div class="clicked-date" style="display:none;">
              <div class="cal-day"></div>
              <div class="cal-date"></div>
            </div>

            <div class="calendar-box">
              <div class="ctr-box clearfix">
                <button type="button" title="prev" class="btn-cal prev">
                </button>
                <div class="">
                  <span class="cal-month"></span>
                  <span class="cal-year"></span>
                </div>
                <button type="button" title="next" class="btn-cal next">
                </button>
              </div>
              <table class="cal-table" style="border-collapse:collapse">
                <thead>
                  <tr style="background: #f23f42;color:#fff;">
                    <th>일</th>
                    <th>월</th>
                    <th>화</th>
                    <th>수</th>
                    <th>목</th>
                    <th>금</th>
                    <th>토</th>
                  </tr>
                </thead>
                <tbody class="cal-body"></tbody>
              </table>
            </div>
          </div>
          <!-- // .my-calendar -->
        </div>
      </div>


      <div class="pr_give_tool">
        <div class="flex" style="width:100%;margin-top:20px; justify-content: space-between;">

          <div class="flex" style="width:48%;justify-content: space-between;">
            <div style="font-weight: 600;">시작</div>
            <div>
              <select class="start_hour">

              </select>
              <span>시</span>
            </div>

            <div>
              <select class="start_minute">

              </select>
              <span>분</span>
            </div>
            <!-- <div>


            </div> -->
          </div>


          <div class="flex" style="width:48%;justify-content: space-between;">
            <div style="font-weight: 600;">종료</div>
            <div>
              <select class="end_hour">

              </select>
              <span>시</span>
            </div>

            <div>
              <select class="end_minute">

              </select>
              <span>분</span>
            </div>
            <!-- <div>


            </div> -->
          </div>


        </div>



        <div class="flex" style="margin-top:30px;">

          <div style="width:50%;text-align:center; display: flex; justify-content: flex-start;">
            <div class="pr_lec_give">
              수업부여
            </div>
          </div>

          <div style="width:50%;text-align:center; display: flex; justify-content: flex-end;">
            <div class="pr_exam_give">
              시험부여
            </div>
          </div>

        </div>


        <!--------------------------- 프로젝트 일정부여 ----------------------->




      </div><!-- pr_give_div-->



    </div>












    <script>

    var hr = "";

    for (var i = 0; i < 24; i++) {

      if(i < 10){
        hr = "0"+i;
      }
      else{
        hr = i;
      }

      var html = "<option value='"+hr+"'>"+hr+"</option>";

      $(".start_hour").append(html);
      $(".end_hour").append(html);
    }

    var minute = "";

    for (var i = 0; i < 60; i++) {

      if(i < 10){
        minute = "0"+i;
      }
      else{
        minute = i;
      }

      var html = "<option value='"+minute+"'>"+minute+"</option>";

      $(".start_minute").append(html);
      $(".end_minute").append(html);
    }

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

    <script src="./js/project/pr_give.js?i=<?=$ranum?>"></script>


    <script src="./js/student_manager/student_manager.js?i=<?=$ranum?>"></script>
    <!-- 카테고리 함수  -->
    <script src="./js/project/pr_stu_category.js?i=<?=$ranum?>"></script>




    <script src="./js/project/pr_aws.js"></script>
    <script src="./js/project/pr_make_input.js?i=<?=$ranum?>"></script>
    <script src="./js/project/pr_event.js?i=<?=$ranum?>"></script>
    <script src="./js/project/pr_function.js?i=<?=$ranum?>"></script>


    <!-- 카테고리 함수  -->

    <script src="./js/project/pr_category.js?i=<?=$ranum?>"></script>
    <script src="./common_func/side_menu/function.js?i=<?=$ranum?>"></script>
    <script src="./common_func/pr_side_menu/function.js?i=<?=$ranum?>"></script>



    <?
    include_once(G5_PATH.'/tail.sub.php');
    ?>
