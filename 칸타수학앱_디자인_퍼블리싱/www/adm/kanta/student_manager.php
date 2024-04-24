<?php

include_once('./_common.php');
include_once('../admin.head.php');

$sql = "select * from student_info";
$stu_info = sql_query($sql);


?>

<link href="./css/student/student.css?i=<?=$ranum?>" rel="stylesheet"></link>
<link href="./css/student_manager/student_manager.css?i=<?=$ranum?>" rel="stylesheet"></link>
<link href="./css/student_manager/side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>

<style>
  select {
    box-shadow: none !important;
  }
  .student_category, .student_info_box, .lec_table_div, .test_table_div {
    box-shadow: 4px 4px 5px #d0d0d054;
    border: 1px solid #d0d0d094;
    border-radius: 0.3rem !important;
  }
  .lec_table_div, .student_lec_div, .test_table_div, .student_test_div {
    width: 100% !important;
  }
  input {
    box-shadow: none !important;
  }

  .lec_delete, .exam_delete {
    height: 36px !important;
    line-height: 36px !important;
    font-size: 17px !important;
    padding: 0px 15px !important;
    min-width: 35px !important;
    box-sizing: border-box;
    background: #f36063 !important;
    color: #ffffff;
  }

  table.dataTable thead th, table.dataTable thead td {
    padding: 0 !important;
  }
  .student_info_box, .test_table_div {
    margin: 12px 0 30px 0 !important;
  }
  .lec_table_div {
    margin: 12px 0 76px 0 !important;
}
  .lec_delete, .exam_delete {
    bottom: 0;
  }
  .lec_delete_div {
    top: -57px;
  }

  .exam_delete_div {
      top: -57px;
  }
  .cate_1_name {
    padding: 10px 20px !important;
  }
  .cate_2_name {
    padding: 10px 0 !important;
    border-bottom: 1px solid #d0d0d038;
  }
  .cate_3_name {
    padding: 10px 0 !important;
  }
  .student_flex {
    display: flex; align-items: center;
  }
  .col-sm-6 {
    max-width: 35rem !important;
    padding: 1.5rem 2rem !important;
    top: 10vh !important;
  }
  .add_name {
      width: 20% !important;
      line-height: 41px !important;
  }

  .school_info_zone {
    overflow: scroll;
    height: 252px !important;
  }
  .school_search_input:focus {
    border-radius: 0.3rem;
  }

  #lec_list_wrapper {
      min-height: 175px !important;
      max-height: 175px !important;
  }
  #exam_list_wrapper {
      min-height: 175px !important;
      max-height: 175px !important;
  }
  div.dataTables_wrapper div.dataTables_paginate {
      position: fixed;
      right: 0;
      bottom: -54px;
  }
</style>



<div class="school_search_popup">
  <div class="school_search_popup_close">

    <span class='school_popup_close'>×</span>

  </div>



  <div style="position: relative;">
    <input type='text' class="school_search_input form-control" id="input_school_grade" placeholder="학교 검색" style="padding: 0 40px 0 10px !important; width: 100%"/>
    <svg width="25" height="25" viewBox="0 0 24 24" fill="none" style="position: absolute; right: 2%; transform: translateY(-50%); top: 50%;">
    <path d="M15.5 14H14.71L14.43 13.73C15.41 12.59 16 11.11 16 9.5C16 5.91 13.09 3 9.5 3C5.91 3 3 5.91 3 9.5C3 13.09 5.91 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z" fill="#323232"/>
    </svg>

  </div>

  <div class="school_info_zone">

  </div>
</div>


<div class="main_form">
  <div class="big-title">회원 관리</div>
  <div class="student_manager_form flex adm-box">
      <div class="student_category_form">

          <div class="flex" style="margin-bottom: 1rem; align-items: center;">
              <div class="student_list_div">
                 <div class="student_list" style="font-size: 1.2rem !important; font-weight: 500;">회원 리스트</div>
              </div>
              <div class="student_add_div">
                 <div class="student_add adm-box__color-btn" style="background: #f36063;">+ 회원 추가</div>
              </div>
          </div>

          <div class="student_category adm-box__in-box-shadow">
            <div class="search_div adm-input">
               <input type="text" class="cate_search" placeholder="search" style="background: transparent;"/>
               <img src="/img/search.png" style="position:absolute; right:10px; top:7px;"/>
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

                        <div class="cate_3" data-num="<?=$row_1['mb_no']?>">
                          <div class="cate_3_name block" data-num="<?=$row_1['mb_no']?>" >
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


      <div class="info_form">


          <div class="student_info_div">
              <div class="adm-box__title">회원 정보</div>

              <div class="student_info_box">
                  <div class="flex th_div">
                      <div>이름</div>
                      <div>아이디</div>
                      <div>학교</div>
                      <div>그룹</div>
                      <div>관리</div>
                  </div>

                  <div class="flex td_div">
                      <div class="if_mb_name"></div>
                      <div class="if_mb_id"></div>
                      <div class="if_school_grade"></div>
                      <div class="if_mb_group"></div>
                      <div class="if_mb_setting">
                          <div class="student_info_repair adm-box__color-btn" style="background: #f36063;">회원 정보 수정</div>
                      </div>
                  </div>
              </div>

          </div>


          <!-- 회원 수강 내역 -->

          <div class="student_lec_div">
              <!-- <div class="adm-box__title">수강 내역</div> -->
              <div class="adm-box__title">수업 내역</div>

              <div class="lec_table_div" style="">


                <table id="lec_list" class="display nowrap" style="width:100%;">
                  <thead>
                    <th><input type='checkbox' class="lec_all_chk" /></th>
                    <th>프로젝트 명</th>
                    <th>프로젝트 부여일자</th>
                    <th>수강상태</th>
                    <th>수행율</th>
                  </thead>

                </table>

              </div>

          </div>


          <!-- 회원 시험 내역 -->

          <div class="student_test_div">
              <div class="adm-box__title">시험 내역</div>

              <div class="test_table_div" style="">


                <table id="exam_list" class="display nowrap" style="width:100%;">
                  <thead>
                    <th><input type='checkbox' class="exam_all_chk" /></th>
                    <th>프로젝트 명</th>
                    <th>시작일시</th>
                    <th>진행율</th>
                    <th>제출일시</th>
                    <th>점수</th>
                    <th>관리</th>
                  </thead>

                </table>

              </div>

          </div>



      </div>


  </div>






  <!-- 회원 추가 폼 fixed-->

  <div class="col-sm-6 col-md-offset-3 draggable student_add_form" style="">

    <div class="title">회원 등록</div>

    <form role="form">
      <div class="form-group">

        <input type='hidden' class='r_mb_no' />

        <div class="flex" style="">
          <div class="add_name">이름</div>
          <input value="" type="text" class="form-control mb_name" id="inputName" placeholder="이름">
        </div>

        <div class="flex" style="margin-top:10px;">
          <div class="add_name">아이디</div>
          <input value="" type="text" class="form-control mb_id" id="inputName" placeholder="아이디를 입력해 주세요">
        </div>

        <div class="flex" style="margin-top:10px;">
          <div class="add_name">비밀번호</div>
          <input value="" type="password" class="form-control mb_password" id="inputPassword" placeholder="비밀번호를 입력해주세요">
        </div>

        <!-- 학교 분류 학년 div -->
        <div class="flex" style="margin-top: 15px; justify-content: space-between;">
          <div class="student_flex" style="width: 32%;">
            <label for="input_school_grade" style="width: 4rem; margin-bottom: 0 !important;">학교</label>
            <input value="" type="text" class="form-control school_grade" readonly placeholder="학교">
          </div>


          <div class="student_flex" style="margin: 0px 0px 0px 7px; width: 32%;">
            <label for="input_grade_type" style="width: 4rem; margin-bottom: 0 !important;">분류</label>

            <select class="form-control school_grade_type">
              <option value="초등회원">초등회원</option>
              <option value="중회원">중회원</option>
              <option value="고등회원">고등회원</option>
              <option value="대회원">대회원</option>
            </select>
          </div>

          <div class="student_flex" style="margin: 0px 0px 0px 7px; width: 32%;">
            <label for="input_grade" style="width: 4rem; margin-bottom: 0 !important;">학년</label>
            <input value="" type="text" class="form-control grade" id="input_grade" placeholder="학년">
          </div>
        </div>

        <!-- 나이 생일 div -->
        <div class="flex" style="margin-top: 20px; justify-content: space-between;">

          <div class="student_flex" style="width: 32%;">
            <label for="input_age" style="width: 4rem; margin-bottom: 0 !important;">나이</label>
            <input value="" type="text" class="form-control age" id="input_age" placeholder="나이">
          </div>

          <div class="student_flex" style="width: 66%;">
            <label for="input_age" style="width: 3.2rem; margin-bottom: 0 !important;">생일</label>

            <div class="flex" style="justify-content: space-between; width: 100%;">
              <select id="year" style="width:41%;" title="년도" class="birth_year select w80 form-control"></select>
              <select id="month" style="width: 28%; padding: 0.375rem 0.5rem;" title="월" class="birth_month select w80 form-control"></select>
              <select id="day" style="width: 28%; padding: 0.375rem 0.5rem;" title="일" class="birth_day select w80 form-control"></select>
            </div>
          </div>

        </div>


      </div>

      <div class="form-group student_flex">
        <label for="InputEmail" style="width: 20%;">이메일</label>
        <input value="" type="email" class="form-control mb_email" id="InputEmail" placeholder="이메일 주소를 입력해주세요">
      </div>


      <div class="form-group student_flex">
        <label for="inputMobile" style="width: 20%;">
          <span>휴대폰</span>
          <span style="margin-left: 0.2rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path d="M20.01 15.38C18.78 15.38 17.59 15.18 16.48 14.82C16.13 14.7 15.74 14.79 15.47 15.06L13.9 17.03C11.07 15.68 8.42 13.13 7.01 10.2L8.96 8.54C9.23 8.26 9.31 7.87 9.2 7.52C8.83 6.41 8.64 5.22 8.64 3.99C8.64 3.45 8.19 3 7.65 3H4.19C3.65 3 3 3.24 3 3.99C3 13.28 10.73 21 20.01 21C20.72 21 21 20.37 21 19.82V16.37C21 15.83 20.55 15.38 20.01 15.38Z" fill="#323232"/>
            </svg>
          </span>
        </label>
        <input value="" type="tel" onkeyup="hp_regex('mb_hp');" class="form-control phone mb_hp" id="inputMobile" placeholder="휴대폰 번호를 입력해 주세요">
      </div>

      <div class="form-group student_flex">
        <label for="pt_inputMobile" style="width: 20%;">
          <span>보호자</span>
          <span style="margin-left: 0.2rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path d="M20.01 15.38C18.78 15.38 17.59 15.18 16.48 14.82C16.13 14.7 15.74 14.79 15.47 15.06L13.9 17.03C11.07 15.68 8.42 13.13 7.01 10.2L8.96 8.54C9.23 8.26 9.31 7.87 9.2 7.52C8.83 6.41 8.64 5.22 8.64 3.99C8.64 3.45 8.19 3 7.65 3H4.19C3.65 3 3 3.24 3 3.99C3 13.28 10.73 21 20.01 21C20.72 21 21 20.37 21 19.82V16.37C21 15.83 20.55 15.38 20.01 15.38Z" fill="#323232"/>
            </svg>
          </span>
        </label>
        <input value="" type="tel" onkeyup="hp_regex('mb_pt_hp');" class="form-control phone mb_pt_hp" id="pt_inputMobile" placeholder="보호자 연락처를 입력해 주세요">
      </div>


      <div class="form-group student_flex" style="align-items: baseline !important;">
        <label for="inputtelNO" style="width: 20%;">주소</label>
        <div style="width: 100%;">
          <div style="margin-bottom:10px;display:flex">
            <input value="" type="text" style="width:70%;" class="form-control addr_1" id="inputtelNO" placeholder="" readonly>
            <input type="button" style="width:28%;font-weight:600;margin-left:7px;" value="주소찾기" class="address_btn form-control" >
          </div>
          <input value="" type="text" class="form-control addr_2" id="inputtelNO" placeholder="주소를 입력해 주세요">
        </div>
      </div>



      <div class="submit_div">
        <button type="button" id="join-submit" class="btn student_cancel adm-box__btn" style="border-radius: 0.4rem; color: #f36063; border: 1px solid #f36063;">취소</button>
        <button type="button" id="join-submit" class="btn student_reg adm-box__color-btn" style="border-radius: 0.4rem;">등록</button>

      </div>
    </form>
  </div>




  <!-- 회원 정보 수정 폼 -->

  <div class="col-sm-6 col-md-offset-3 draggable student_repair_form" style="">

    <div class="title">회원정보 수정</div>

    <form role="form">
      <div class="form-group">



        <div class="flex" style="">
          <div class="add_name">이름</div>
          <input value="" type="text" class="form-control r_mb_name" id="inputName" placeholder="이름">
        </div>

        <div class="flex" style="margin-top:10px;">
          <div class="add_name">아이디</div>
          <input value="" type="text" class="form-control r_mb_id" id="inputName" readonly placeholder="아이디를 입력해 주세요">
        </div>

        <div class="flex" style="margin-top:10px;">
          <div class="add_name">비밀번호</div>
          <input value="" type="password" class="form-control r_mb_password" id="inputPassword" placeholder="비밀번호를 입력해주세요">
        </div>


        <div class="flex" style="margin-top:15px; justify-content: space-between;">

          <div class="student_flex" style="width: 69%;">
            <label for="input_school_grade" style="width: 6.9rem; margin-bottom: 0 !important;">학교</label>
            <input value="" type="text" class="form-control r_school_grade" readonly placeholder="학교">
          </div>

          <div class="student_flex" style="width: 27%;">
            <label for="input_grade" style="width: 9rem; margin-bottom: 0 !important;">학년</label>
            <input value="" type="text" class="form-control r_grade" id="input_grade" placeholder="학년">
          </div>

        </div>


        <div class="flex" style="margin-top:20px; justify-content: space-between;">

          <div class="student_flex" style="width: 38%;">
            <label for="input_age" style="width: 10rem; margin-bottom: 0 !important;">나이</label>
            <input value="" type="text" class="form-control r_age" id="input_age" placeholder="나이">
          </div>

          <div class="student_flex" style="width: 60%;">
            <label for="input_age" style="width: 3.2rem; margin-bottom: 0 !important;">생일</label>

            <div class="flex" style="justify-content: space-between; width: 100%;">
              <select id="r_year" style="width:41%;" title="년도" class="r_birth_year select w80 form-control"></select>
              <select id="r_month" style="width: 28%; padding: 0.375rem 0.5rem;" title="월" class="r_birth_month select w80 form-control" style="margin-left:5px;"></select>
              <select id="r_day"  style="width: 28%; padding: 0.375rem 0.5rem;" title="일" class="r_birth_day select w80 form-control" style="margin-left:5px;"></select>
            </div>
          </div>

        </div>


      </div>

      <div class="form-group student_flex">
        <label for="InputEmail" style="width: 20%;">이메일</label>
        <input value="" type="email" class="form-control r_mb_email" id="InputEmail" placeholder="이메일 주소를 입력해주세요">
      </div>


      <div class="form-group student_flex">
        <label for="inputMobile" style="width: 20%;">
          <span>휴대폰</span>
          <span style="margin-left: 0.2rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path d="M20.01 15.38C18.78 15.38 17.59 15.18 16.48 14.82C16.13 14.7 15.74 14.79 15.47 15.06L13.9 17.03C11.07 15.68 8.42 13.13 7.01 10.2L8.96 8.54C9.23 8.26 9.31 7.87 9.2 7.52C8.83 6.41 8.64 5.22 8.64 3.99C8.64 3.45 8.19 3 7.65 3H4.19C3.65 3 3 3.24 3 3.99C3 13.28 10.73 21 20.01 21C20.72 21 21 20.37 21 19.82V16.37C21 15.83 20.55 15.38 20.01 15.38Z" fill="#323232"/>
            </svg>
          </span>
        </label>
        <input value="" type="tel" onkeyup="hp_regex('r_mb_hp');" class="form-control r_phone r_mb_hp" id="inputMobile" placeholder="휴대폰번호를 입력해 주세요">
      </div>

      <div class="form-group student_flex">
        <label for="pt_inputMobile" style="width: 20%;">
          <span>보호자</span>
          <span style="margin-left: 0.2rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path d="M20.01 15.38C18.78 15.38 17.59 15.18 16.48 14.82C16.13 14.7 15.74 14.79 15.47 15.06L13.9 17.03C11.07 15.68 8.42 13.13 7.01 10.2L8.96 8.54C9.23 8.26 9.31 7.87 9.2 7.52C8.83 6.41 8.64 5.22 8.64 3.99C8.64 3.45 8.19 3 7.65 3H4.19C3.65 3 3 3.24 3 3.99C3 13.28 10.73 21 20.01 21C20.72 21 21 20.37 21 19.82V16.37C21 15.83 20.55 15.38 20.01 15.38Z" fill="#323232"/>
            </svg>
          </span>
        </label>
        <input value="" type="tel" onkeyup="hp_regex('r_mb_pt_hp');" class="form-control r_phone r_mb_pt_hp" id="pt_inputMobile" placeholder="보호자 번호를 입력해 주세요">
      </div>


      <div class="form-group student_flex" style="align-items: baseline !important;">
        <label for="inputtelNO" style="width: 20%;">주소</label>
        <div style="width: 100%;">
          <div style="margin-bottom:10px;display:flex">
            <input value="화명동" type="text" style="width:70%;" class="form-control r_addr_1" id="inputtelNO" placeholder="" readonly>
            <input type="button" style="width:28%;font-weight:600;margin-left:7px;" value="주소찾기" class="address_btn form-control" >
          </div>
          <input value="" type="text" class="form-control r_addr_2" id="inputtelNO" placeholder="주소를 입력해 주세요">
        </div>
      </div>



      <div class="submit_div">
        <button type="button" id="join-submit" class="btn  r_student_cancel adm-box__btn" style="border-radius: 0.4rem; color: #f36063; border: 1px solid #f36063;">취소</button>
        <button type="button" id="join-submit" class="btn  r_student_reg adm-box__color-btn" style="border-radius: 0.4rem;">등록</button>
      </div>
    </form>
  </div>




  <div class='exam_detail_view'>


    <div class="exam_detail_box">
        <div class="flex th_div">
            <div>프로젝트명</div>
            <div>시작일시</div>
            <div>제출일시</div>
            <div>점수</div>
            <div>오답수행</div>
        </div>

        <div class="flex td_div">
            <div class="exam_pr_name"></div>
            <div class="exam_start_time"></div>
            <div class="exam_submit_time"></div>
            <div class="exam_score"></div>
            <div class="exam_again_solve"></div>
        </div>
    </div>



    <div class="exam_pb_detail_box">
        <div class="flex th_div_2">
            <div>문제코드</div>
            <div>문제명</div>
            <div>실전 정답여부</div>
            <div>오답노트 정답여부</div>
        </div>

        <div class="td_div_2 pb_info">

        </div>
    </div>

    <div class="stu_info_cert_div">
      <div class="stu_info_cert">
        확인
      </div>
    </div>

  </div>







</div>






  <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

  <script src="./js/student_manager/student_manager.js?i=<?=$ranum?>"></script>
  <script src="./js/student_manager/student_lec_exam_table.js?i=<?=$ranum?>"></script>
  <!-- 카테고리 함수  -->
  <script src="./js/student_manager/category.js?i=<?=$ranum?>"></script>
  <script src="./common_func/side_menu/function.js?i=<?=$ranum?>"></script>


  <script>

  $(document).ready(function(){
    setDateBox();

  });


  function setDateBox(){
    var dt = new Date();
    var year = "";
    var com_year = dt.getFullYear();
    // 발행 뿌려주기
    $("#year").append("<option value=''>년도</option>");
    // 올해 기준으로 -1년부터 +5년을 보여준다.
    for(var y = (com_year-30); y <= (com_year); y++){
      $("#year").append("<option value='"+ y +"'>"+ y + " 년" +"</option>");
    }
    // 월 뿌려주기(1월부터 12월)
    var month;
    $("#month").append("<option value=''>월</option>");
    for(var i = 1; i <= 12; i++){
      $("#month").append("<option value='"+ i +"'>"+ i + " 월" +"</option>");
    }

    var day;
    $("#day").append("<option value=''>일</option>");
    for(var i = 1; i <= 31; i++){
      $("#day").append("<option value='"+ i +"'>"+ i + " 일" +"</option>");
    }


    $("#r_year").append("<option value=''>년도</option>");
    // 올해 기준으로 -1년부터 +5년을 보여준다.
    for(var y = (com_year-30); y <= (com_year); y++){
      $("#r_year").append("<option value='"+ y +"'>"+ y + " 년" +"</option>");
    }
    // 월 뿌려주기(1월부터 12월)
    var month;
    $("#r_month").append("<option value=''>월</option>");
    for(var i = 1; i <= 12; i++){
      $("#r_month").append("<option value='"+ i +"'>"+ i + " 월" +"</option>");
    }

    var day;
    $("#r_day").append("<option value=''>일</option>");
    for(var i = 1; i <= 31; i++){
      $("#r_day").append("<option value='"+ i +"'>"+ i + " 일" +"</option>");
    }
  }



  let let_stu_no = "";
</script>





<?

include_once(G5_PATH.'/tail.sub.php');
?>
