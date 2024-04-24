var today = new Date();

var year = today.getFullYear(); // 년도
var month = ("0" + (today.getMonth() + 1)).slice(-2);
var date = ("0" + today.getDate()).slice(-2);
var day = ("0" + today.getDay()).slice(-2);  // 요일
var hours = ("0" + today.getHours()).slice(-2); // 시
var minutes = ("0" + today.getMinutes()).slice(-2);  // 분
var seconds = ("0" + today.getSeconds()).slice(-2);  // 초
var milliseconds = ("0" + today.getMilliseconds()).slice(-2); // 밀리초

var rs = year+"."+month+"."+date;
var fdate = rs;
var stu_list;
var pr_stu_list;
$.fn.dataTableExt.sErrMode = 'none';



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

  var fdate = e.target.dataset.fdate;

  console.log("지나감 : "+fdate);


  stu_list_func(fdate);

});



stu_list_func(fdate);


/******************* 자바스크립트 달력  *****************************/


  /*  학생 시험내역 데이터 테이블  */



function stu_list_func(fdate){

  stu_list = $("#stu_list").DataTable({


    // 표시 건수기능 숨기기
    language: {
      emptyTable: '데이터가 없습니다.',
      infoEmpty: '',
      info:'현재 _PAGE_페이지 입니다',
      zeroRecords : "참여내역이 없습니다.",
      //info: ' _TOTAL_ 개의 데이터가 있습니다.',
      search: '_INPUT_',
      searchPlaceholder: '내용 입력...',
      lengthMenu: '_MENU_ 개 보기',
      paginate: {
        next: '>',
        previous: '<'
      },

    },


    // 검색 기능 숨기기
    destroy: true,
    searching: false,
    // 표시 건수기능 숨기기
    lengthChange: false,
    // 한 페이지에 표시되는 Row 수
    pageLength: 10,
    processing:false,
    serverSide:false,
    responsive: true,
    ordering : false,

    ajax : {
      "url":"./proc/project/pr_schedule_info.php",
      "type":"POST",
      "data": {"fdate":fdate}
    },


    columns : [

      {data: "type", 'render': function ( data, type, row ) {

        if(data == "exam"){
          data = "시험";
        }
        else{
          data = "강의";
        }

        return data;
      }},
      {data: "pr_name"},
      {data: "start_hour", 'render': function ( data, type, row ) {

        var html_temp = "";

        if(data == "" || data === undefined || data == null){
          html_temp += "00:00";
        }
        else{
          html_temp += row.start_hour+":"+row.start_minute;
        }

        var html = "";

        html +=   html_temp;


        return html;
      }},
      {data: "end_hour", 'render': function ( data, type, row ) {

        var html_temp = "";

        if(data == "" || data === undefined || data == null){
          html_temp += "00:00";
        }
        else{
          html_temp += row.end_hour+":"+row.end_minute;
        }

        var html = "";

        html +=   html_temp;


        return html;
      }},
      {data: "latest_login", 'render': function ( data, type, row ) {

        var html = "";

        html += "<div class='pr_stu_ent' data-pr_real_code='"+row.pr_real_code+"'>";
        html += "보기";
        html += "</div>";

        return html;


      }}
    ],




      initComplete: function(settings, json) {



      }


    });
}






function pr_stu_list_func(pr_real_code){

  pr_stu_list = $("#pr_stu_list").DataTable({


    // 표시 건수기능 숨기기
    language: {
      emptyTable: '데이터가 없습니다.',
      infoEmpty: '',
      info:'',
      zeroRecords : "참여 학생이 없습니다.",
      //info: ' _TOTAL_ 개의 데이터가 있습니다.',
      search: '_INPUT_',
      searchPlaceholder: '내용 입력...',
      lengthMenu: '_MENU_ 개 보기',
      paginate: {
        next: '>',
        previous: '<'
      },

    },


    // 검색 기능 숨기기
    destroy: true,
    searching: false,
    // 표시 건수기능 숨기기
    lengthChange: false,
    // 한 페이지에 표시되는 Row 수
    pageLength: 10,
    processing:false,
    serverSide:false,
    responsive: true,
    ordering : false,

    ajax : {
      "url":"./proc/project/pr_ent_stu_list.php",
      "type":"POST",
      "data": {"pr_real_code":pr_real_code}
    },


    columns : [

      {data: "school_grade"},
      {data: "grade", 'render': function ( data, type, row ) {



        return data+"학년";


      }},
      {data: "mb_name"},
      {data: "type", 'render': function ( data, type, row ) {

        var html = "";
        html += "<a href='/adm/kanta/student_manager.php'>";
        html += "<div class='stu_manager_move'>";
        html += "회원관리 이동";
        html += "</div>";
        html += "</a>";

        return html;


      }}


    ],




      initComplete: function(settings, json) {



      }


    });
}




/* 보기 눌렀을때 프로젝트 학생 참여자 띄워줌 */

//$(".pr_stu_view").draggable();

$(document).on('click', ".pr_stu_ent", function(){
   var pr_real_code = $(this).data("pr_real_code");

   $(".pr_stu_view").css("display" , "block");

   pr_stu_list_func(pr_real_code);
});





$(".pr_stu_button").on('click', function(){
    $(".pr_stu_view").css("display","none");
});
