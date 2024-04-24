$("#video_input").on('change', function(){


    if(question_list != null){
      $(".progress_selected").remove();
      $(".progress__filled").css("flex-basis", "0%");
      video.currentTime = 0;

      question_list.ajax.reload();
      question_list.rows().remove().draw();
    }


    var album = $(this).data("album");

    const inputFile = document.getElementById("video_input");

    if(!inputFile.files[0].name.match(/.*\.avi|.*\.mp4|.*\.wmv|.*\.mov|.*\.ts |.*\.tp |.*\.flv |.*\.3gp |.*\.webp/i)){
      swal({
          text : "동영상 형식에 맞지않은 파일이 들어가있습니다. avi, mp4, mkv, wmv, mov, ts, tp, flv, 3gp, webp 파일만 올려주십시오.",
          icon : "warning"
      });
      inputFile.val("");
      return;
    }

    if(inputFile.files[0] != null){
      const file = inputFile.files[0];
      const videourl = URL.createObjectURL(file);
      video.setAttribute("src", videourl);

      sleep(200).then(function(){
          video_play_time = video.duration;
      });


      video_code = generaterandomstring(50);


      $(".pb_video_delete").data("video_code", video_code);
      $(".video_input_inside").remove();


      //q_list();

      updateButton();
    }
    //addvideo(album);

});

$("#img_input").on('change', function(){

    var album = $(this).data("album");

    const inputFile = document.getElementById("img_input");
    const file = inputFile.files[0];
    const imgurl = URL.createObjectURL(file);


    if(!inputFile.files[0].name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)){

      swal({
          text : "이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.",
          icon : "warning"
      });
      $(".loading_div").css("display","none");
      return;
    }


    pb_img_uploaded_flag = 1;
    img_real_code = generaterandomstring(50);

    var html = "";
        html += '<img src="'+imgurl+'" class="pb_img_reg" alt=" " />';

    $(".lec_img_zone img").remove();
    $(".lec_img_zone").html(html);

    //addimg(album);

});
