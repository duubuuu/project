$(".notice_repair").on('click', function(){


  oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);

  var title = $(".notice_title").val().trim();
  var word = $("#ir1").val().trim();
  var mb_id = $(".write_user").val().trim();
  var important = $(".important").prop("checked");


  var formdata = new FormData();
  formdata.append("num", num);
  formdata.append("title", title);
  formdata.append("word", word);
  formdata.append("mb_id", mb_id);
  formdata.append("important", important);


  $.ajax({
    type:"POST",
    url:"./proc/notice_manager/notice_repair.php",
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

        swal("수정 되었습니다.");
        return;

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
});
