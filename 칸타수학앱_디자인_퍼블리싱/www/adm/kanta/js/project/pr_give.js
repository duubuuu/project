// ================================
// START YOUR APP HERE
// ================================
const init = {
  monList: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
  dayList: ['일', '월', '화', '수', '목', '금', '토'],
  today: new Date(),
  monForChange: new Date().getMonth(),
  activeDate: new Date(),
  getFirstDay: (yy, mm) => new Date(yy, mm, 1),
  getLastDay: (yy, mm) => new Date(yy, mm + 1, 0),
  nextMonth: function () {
    let d = new Date();
    d.setDate(1);
    d.setMonth(++this.monForChange);
    this.activeDate = d;
    return d;
  },
  prevMonth: function () {
    let d = new Date();
    d.setDate(1);
    d.setMonth(--this.monForChange);
    this.activeDate = d;
    return d;
  },
  addZero: (num) => (num < 10) ? '0' + num : num,
  activeDTag: null,
  getIndex: function (node) {
    let index = 0;
    while (node = node.previousElementSibling) {
      index++;
    }
    return index;
  }
};

const $calBody = document.querySelector('.cal-body');
const $btnNext = document.querySelector('.btn-cal.next');
const $btnPrev = document.querySelector('.btn-cal.prev');

/**
 * @param {number} date
 * @param {number} dayIn
*/
function loadDate(date, dayIn) {

  document.querySelector('.cal-date').textContent = date;
  document.querySelector('.cal-day').textContent = init.dayList[dayIn];

}

/**
 * @param {date} fullDate
 */
function loadYYMM (fullDate) {
  let yy = fullDate.getFullYear();
  let mm = fullDate.getMonth();
  let firstDay = init.getFirstDay(yy, mm);
  let lastDay = init.getLastDay(yy, mm);
  let markToday;  // for marking today date

  if (mm === init.today.getMonth() && yy === init.today.getFullYear()) {
    markToday = init.today.getDate();
  }

  document.querySelector('.cal-month').textContent = init.monList[mm];
  document.querySelector('.cal-month').dataset.month = ("0" + (String(init.monList[mm]).replace(/[^0-9]*/gi, ""))).slice(-2);
  document.querySelector('.cal-year').textContent = yy;

  let trtd = '';
  let startCount;
  let countDay = 0;
  for (let i = 0; i < 6; i++) {
    trtd += '<tr>';
    for (let j = 0; j < 7; j++) {
      if (i === 0 && !startCount && j === firstDay.getDay()) {
        startCount = 1;
      }
      if (!startCount) {
        trtd += '<td>'
      } else {
        let fullDate = yy + '.' + init.addZero(mm + 1) + '.' + init.addZero(countDay + 1);
        trtd += '<td class="day';
        trtd += (markToday && markToday === countDay + 1) ? ' today" ' : '"';
        trtd += ` data-date="${countDay + 1}" data-fdate="${fullDate}">`;
      }
      trtd += (startCount) ? ++countDay : '';
      if (countDay === lastDay.getDate()) {
        startCount = 0;
      }
      trtd += '</td>';
    }
    trtd += '</tr>';
  }
  $calBody.innerHTML = trtd;
}

/**
 * @param {string} val
 */
function createNewList (val) {
  let id = new Date().getTime() + '';
  let yy = init.activeDate.getFullYear();
  let mm = init.activeDate.getMonth() + 1;
  let dd = init.activeDate.getDate();
  const $target = $calBody.querySelector(`.day[data-date="${dd}"]`);

  let date = yy + '.' + init.addZero(mm) + '.' + init.addZero(dd);

  let eventData = {};
  eventData['date'] = date;
  eventData['memo'] = val;
  eventData['complete'] = false;
  eventData['id'] = id;
  init.event.push(eventData);
  $todoList.appendChild(createLi(id, val, date));
}

loadYYMM(init.today);
loadDate(init.today.getDate(), init.today.getDay());



$btnNext.addEventListener('click', () => loadYYMM(init.nextMonth()));
$btnPrev.addEventListener('click', () => loadYYMM(init.prevMonth()));

$calBody.addEventListener('click', (e) => {
  if (e.target.classList.contains('day')) {
    if (init.activeDTag) {
      init.activeDTag.classList.remove('day-active');
    }
    let day = Number(e.target.textContent);
    loadDate(day, e.target.cellIndex);
    e.target.classList.add('day-active');
    init.activeDTag = e.target;
    init.activeDate.setDate(day);
    //reloadTodo();
  }
});






/******************* 자바스크립트 달력  *****************************/









/* 카테고리 검색 */

$(".pr_cate_search").on('keydown', function(e){

   if(e.keyCode == 13){

      var val = $(this).val().trim();

      $(".pr_cate_2_name").each(function(){
        //console.log("반복문 들어옴 " + $(this).children("span.val_span").text() + "-----" + val);
        if($(this).children("span.val_span").text().match(val)){
          //console.log("네임값 들어옴 " + $(this).children("span.val_span").text());

          var parent = $(this).parent(".pr_cate_2");

          $(this).parent(".pr_cate_2").css("display","block");
          parent.siblings(".pr_cate_2").css("display","block");
        }
      });


      $(".pr_cate_3_name").each(function(){
        console.log("반복문 들어옴 " + $(this).children("span.val_span").text() + "-----" + val);
        if($(this).children("span.val_span").text().match(val)){
          console.log("네임값 들어옴 " + $(this).children("span.val_span").text());

          var parent_1 = $(this).closest(".pr_cate_2");

          parent_1.css("display","block");

          var parent = $(this).parent(".pr_cate_3");

          $(this).parent(".pr_cate_3").css("display","block");
          parent.siblings(".pr_cate_3").css("display","block");
        }
      });

    }
});












/********************* 프로젝트 부여 ***********************************/


function chk_certain(type){

  var pr_cnt = 0;

  $(".pr_chk").each(function(){
    if($(this).prop("checked")){
     pr_cnt++;
    }
  });


  var stu_cnt = 0;

  $(".stu_chk").each(function(){
    if($(this).prop("checked")){
      stu_cnt++;
    }
  });


  var day_cnt = 0;

  $(".cal-table tbody tr td").each(function(){
      if($(this).hasClass("day-active")){
        day_cnt++;
        console.log("날짜선댁툄"+day_cnt);
      }
  });



  if(stu_cnt == 0){
    swal("부여할 학생을 선택해주세요.");
    return;
  }


  if(pr_cnt == 0){
    swal("부여할 프로젝트를 선택해주세요.");
    return;
  }



  if(day_cnt == 0){
    swal("날짜를 선택해주세요.");
    return;
  }

  pr_give(type);
}



function pr_give(type){



  var cal_year = $(".cal-year").text();
  var cal_month = $(".cal-month").data("month");
  var cal_day = "";

  var start_hour = ("0" + $(".start_hour").val()).slice(-2);
  var start_minute = ("0" + $(".start_minute").val()).slice(-2);

  var end_hour = ("0" + $(".end_hour").val()).slice(-2);
  var end_minute = ("0" + $(".end_minute").val()).slice(-2);

  var pr_no = "";
  var stu_no = "";

  var pr_real_code = "";

  $(".pr_chk").each(function(){
    if($(this).prop("checked")){
      pr_no = $(this).data("reged_num");
      pr_real_code = $(this).data("pr_real_code");
    }
  });


  var mb_id = "";

  $(".cate_3_name").each(function(){
    if($(this).prop("checked")){
      mb_id = $(this).data("mb_id");
    }
  });



  $(".stu_chk").each(function(){
    if($(this).prop("checked")){
      stu_no = stu_no + "::" + $(this).data("num");
    }
  });

  stu_no = stu_no.replace("::", "");


  $(".cal-table tbody tr td").each(function(){
      if($(this).hasClass("day-active")){
        cal_day = $(this).data("date");
      }
  });

  cal_day = ("0" + cal_day).slice(-2);



  var formdata = new FormData();
  formdata.append("pr_no", pr_no);
  formdata.append("stu_no", stu_no);
  formdata.append("year", cal_year);
  formdata.append("month", cal_month);
  formdata.append("day", cal_day);
  formdata.append("start_hour", start_hour);
  formdata.append("start_minute", start_minute);
  formdata.append("end_hour", end_hour);
  formdata.append("end_minute", end_minute);

  formdata.append("mb_id", mb_id);

  formdata.append("type", type);

  formdata.append("pr_real_code", pr_real_code);

  $.ajax({
    type:"POST",
    url:"./proc/project/pr_give.php",
    data : formdata,
    processData: false,
    contentType: false,
    async : false,

    beforeSend : function(){
      $(".loading_div").css("display","block");
    },

    success: function(data){

      $(".loading_div").css("display","none");

      var data = JSON.parse(data);

      if(data.rs == "success"){
        swal("프로젝트가 부여되었습니다.");
      }
      if(data.rs == "exist"){
        swal("이미 존재하는 프로젝트입니다.");
      }
      else if(data.rs == "fail"){
        alert("수정 실패하였습니다.");
      }
      else{
        alert("오류가 발생하였습니다.");
      }

    },
    error: function(err) {
      alert("에러");
    }
  });
}


/* 수업 부여 */
$(".pr_lec_give").on('click', function(){
  chk_certain("lec");



});

/* 시험 부여 */
$(".pr_exam_give").on('click', function(){
  chk_certain("exam");



});



$(".pr_chk").on('click', function(){

    $(".pr_chk").prop("checked", false);

    $(this).prop("checked", true);

});
