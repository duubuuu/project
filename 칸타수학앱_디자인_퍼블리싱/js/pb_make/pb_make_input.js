$("#video_input").on('change', function(){

    var album = $(this).data("album");
    addvideo(album);

});

$("#img_input").on('change', function(){

    var album = $(this).data("album");
    addimg(album);

});

/*
var videocontrol;


$("#video_input").on('change', function(){

  var formdata = new FormData();

  formdata.append("video", $("#video_input")[0].files[0]);


  $.ajax({
    type:"POST",
    url:"./proc/pb_make/ajax_video_upload.php",
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

          $(".player__video").attr("src", data.video_path+data.video_name);

          video_list.ajax.reload();

        }
        else if(data.rs == "fail"){
          alert("등록에 실패하였습니다.");
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




$("#img_input").on('change', function(){

  var formdata = new FormData();
  formdata.append("img", $("#img_input")[0].files[0]);


  $.ajax({
    type:"POST",
    url:"./proc/pb_make/ajax_img_upload.php",
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

          //$(".img_zone").html("<img src="+data.img_path+data.img_name+" />" );
          img_list.ajax.reload();

        }
        else if(data.rs == "fail"){
          alert("등록에 실패하였습니다.");
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


*/
