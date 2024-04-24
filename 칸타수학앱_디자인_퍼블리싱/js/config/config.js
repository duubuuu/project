


$(".open").on('click',function(){


  $.ajax({
    type:"POST",
    url:"./proc/config/config_cate_open.php",
    data : {},
    processData: false,
    contentType: false,

    success: function(data){


      var data = JSON.parse(data);

      t_ob = data;

      $(".category_name_div_1").remove();
      $(".category_name_div_2").remove();

      for (var key in data) {
        var text_html = "<div class='category_name_div_1' data-val='"+key+"'>";
            text_html +="<div class='category_tag_1'>"+key+"</div>";
            text_html +="<div class='category_remove_1' data-val='"+key+"'>x</div>";
            text_html +="</div>";

        $(".category_form_1").append(text_html);
      }

      for (var key in data) {
        for (var key2 in data[key]) {
          var text_html = "<div class='category_name_div_2' data-val='"+data[key][key2]+"'>";
              text_html +="<div class='category_tag_2'>"+data[key][key2]+"</div>";
              text_html +="<div class='category_remove_2' data-val='"+data[key][key2]+"'>x</div>";
              text_html +="</div>";

              $(".category_form_2").append(text_html);
        }
      }


    },
    error: function(err) {
        alert("에러");
    }
  });
});


$(".save").on('click',function(){


  var formdata = new FormData();

  formdata.append("data", JSON.stringify(t_ob));


  $.ajax({
    type:"POST",
    url:"./proc/config/config_cate_save.php",
    data : formdata,
    processData: false,
    contentType: false,

    success: function(data){

        if(data == "y"){
          swal("임시저장 되었습니다.");

        }
        else{
          swal("실패하였습니다.");
        }

    },
    error: function(err) {
        alert("에러");
    }
  });
});




$(".food_open").on('click',function(){


  $.ajax({
    type:"POST",
    url:"./proc/config/config_food_open.php",
    data : {},
    processData: false,
    contentType: false,

    success: function(data){

        if(data == ""){
          swal("저장정보가 없습니다.");
          return;
        }

        var arr = data.split("::");

        for(var i=0; i<arr.length; i++){
          var text_html = "<div class='category_name_div' data-val='"+arr[i]+"'>";
              text_html +="<div class='category_tag'>"+arr[i]+"</div>";
              text_html +="<div class='category_remove' data-val='"+arr[i]+"'>x</div>";
              text_html +="</div>";

          $(".category_form").append(text_html);
        }


    },
    error: function(err) {
        alert("에러");
    }
  });
});


$(".food_save").on('click',function(){


  var category_tag_val = "";

  $(".category_tag").each(function(){

      category_tag_val = $(this).text()+"::"+category_tag_val;

  });


  var formdata = new FormData();

  formdata.append("data", category_tag_val);


  $.ajax({
    type:"POST",
    url:"./proc/config/config_food_save.php",
    data : formdata,
    processData: false,
    contentType: false,

    success: function(data){

        if(data == "y"){
          swal("임시저장 되었습니다.");

        }
        else{
          swal("실패하였습니다.");
        }

    },
    error: function(err) {
        alert("에러");
    }
  });
});



$(".config").on('submit', function(e){

/* 카테고리 정리 */

  var category_tag_val = "";

  $(".category_tag").each(function(){

      category_tag_val = $(this).text()+"::"+category_tag_val;

  });

  $(".shop_category_tag").val(category_tag_val);



  /*배너이름 넣기  */
  var banner_img_link_temp = "";


    $(".banner_img_link_temp").each(function(){
      banner_img_link_temp = banner_img_link_temp+"::"+$(this).val();
    });


  $(".banner_img_link").val(banner_img_link_temp);


  /* 모바일 배너이름 넣기  */
  var m_banner_img_link_temp = "";


    $(".m_banner_img_link_temp").each(function(){
      m_banner_img_link_temp = m_banner_img_link_temp+"::"+$(this).val();
    });


  $(".m_banner_img_link").val(m_banner_img_link_temp);


  $(".category_1").val(JSON.stringify(t_ob));


});









/* 배너이미지 삭제 */

$(document).on('click', ".banner_close, .m_banner_close, .popup_close", function(){

  var num = $(this).data("num");

  var type_temp = "";

  var type = $(this).attr("class");
  type = type.split(" ");

  if(type[0] == "banner_close"){
    type_temp = "banner";
  }
  else if(type[0] == "m_banner_close"){
    type_temp = "m_banner";
  }
  else if(type[0] == "popup_close"){
    type_temp = "popup";
  }

  else if(type[0] == "editor_close"){
    type_temp = "editor";
  }

  var formdata = new FormData();

  formdata.append("shop_code", $(".shop_code").val());
  formdata.append("img_name", $(this).data("img_name"));
  formdata.append("type", type_temp);

  $.ajax({
    type:"POST",
    url:"./proc/config/config_ajax_delete.php",
    data : formdata,
    processData: false,
    contentType: false,

    beforeSend : function(){
        $(".loading_div").css("display","block");
    },

    success: function(data){

      $(".loading_div").css("display","none");

        if(data == "y"){



          if(type_temp == "banner"){
            $(".selected_photo").each(function(){
                if($(this).data("num") == num){
                    $(this).remove();
                }
            });
          }
          else if(type_temp == "m_banner"){

            $(".m_selected_photo").each(function(){
                if($(this).data("num") == num){
                    $(this).remove();
                }
            });
          }
          else if(type_temp == "popup"){
            $(".popup_selected_photo").each(function(){

                if($(this).data("num") == num){
                    $(this).remove();
                }
            });
          }



        }
        else{

        }

    },
    error: function(err) {
        alert("에러");
    }
  });


});



var sel_files = [];
$("#input-file-1").on("change", handleImgsFilesSelect_1);
$("#input-file-2").on("change", handleImgsFilesSelect_2);
$("#input-file-3").on("change", handleImgsFilesSelect_3);


/* 대표 배너 추가 */

function handleImgsFilesSelect_1(e) {

  var files = $("#input-file-1")[0].files;
  var filesArr = Array.prototype.slice.call(files);

  //$(".selected_photo").remove();



  filesArr.forEach(function (f) {



    sel_files.push(f);

    var reader = new FileReader();
    var cnt = 0;

    reader.onload = function (e) {

      var file_size;
      var file_size_name;

      var file = $("#input-file-1")[0].files;
      var file_length = $("#input-file-1")[0].files.length;


      if(file_length > 10){
        alert("이미지 파일은 10개 까지만 올릴 수 있습니다.");
        $("#input-file-1").val("");
        return;
      }


      if (f.size > 1024 * 500) {
        file_size = Math.round(f.size / (1024 * 1024));
        file_size_name = "MB";
      }
      else if (f.size > 1024) {
        file_size = Math.round(f.size / (1024));
        file_size_name = "KB";
      }
      else if (f.size < 1024) {
        file_size = Math.round(f.size);
        file_size_name = "Byte";
      }

      var file_name = f.name;
      var file_img_src = e.target.result;



      if (f) {


             if($("#input-file-1")[0].files[0].name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)){


               var formdata = new FormData();
               formdata.append("banner", $("#input-file-1")[0].files[0]);
               formdata.append("shop_code", $(".shop_code").val());
               formdata.append("type", "banner");

               $.ajax({
                 type:"POST",
                 url:"./proc/config/config_ajax_upload.php",
                 data : formdata,
                 processData: false,
                 contentType: false,

                 beforeSend : function(){
                     $(".loading_div").css("display","block");
                 },

                 success: function(data){

                   $(".loading_div").css("display","none");

                   data = JSON.parse(data);

                    if(data.result == "cnt_over"){

                       swal("이미지는 10개까지만 업로드 가능합니다.");
                       return;
                    }
                    else if(data.result == "size"){

                       swal( data.size+"MB 사이즈 이하로 올려주세요");
                       return;
                    }
                    else{

                      var length = $(".images .selected_photo").length;

                      var img_html = "<div class='selected_photo' data-num='"+(length+1)+"'>";
                          img_html += "<div class='banner_close close_btn' data-num='"+(length+1)+"' data-img_name='"+data.img_name+"'>×</div>";
                          img_html += "<img src='"+file_img_src+"' alt=''>";
                          img_html += "<input type='text' class='banner_img_link_temp javascript' name='banner_img_link_temp' value='' placeholder='링크'/>";
                          img_html += "</div>";

                      $(".images").append(img_html);
                    }

                 },
                 error: function(err) {
                     alert("에러");
                 }
               });


               $("#input-file-1").val('');



             }
             else{
                alert("이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.");
                return;
             }

             cnt = cnt + 1;

      }

    }
    reader.readAsDataURL(f);

  });


}



/* 모바일 대표 배너 추가 */

function handleImgsFilesSelect_3(e) {

  var files = $("#input-file-3")[0].files;
  var filesArr = Array.prototype.slice.call(files);

  //$(".selected_photo").remove();



  filesArr.forEach(function (f) {



    sel_files.push(f);

    var reader = new FileReader();
    var cnt = 0;

    reader.onload = function (e) {

      var file_size;
      var file_size_name;

      var file = $("#input-file-3")[0].files;
      var file_length = $("#input-file-3")[0].files.length;


      if(file_length > img_cnt){
        alert("이미지 파일은 "+img_cnt+"개 까지만 올릴 수 있습니다.");
        $("#input-file-3").val("");
        return;
      }


      if (f.size > 1024 * 500) {
        file_size = Math.round(f.size / (1024 * 1024));
        file_size_name = "MB";
      }
      else if (f.size > 1024) {
        file_size = Math.round(f.size / (1024));
        file_size_name = "KB";
      }
      else if (f.size < 1024) {
        file_size = Math.round(f.size);
        file_size_name = "Byte";
      }

      var file_name = f.name;
      var file_img_src = e.target.result;



      if (f) {


             if($("#input-file-3")[0].files[0].name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)){


               var formdata = new FormData();
               formdata.append("m_banner", $("#input-file-3")[0].files[0]);
               formdata.append("shop_code", $(".shop_code").val());
               formdata.append("type", "m_banner");

               $.ajax({
                 type:"POST",
                 url:"./proc/config/config_ajax_upload.php",
                 data : formdata,
                 processData: false,
                 contentType: false,

                 beforeSend : function(){
                     $(".loading_div").css("display","block");
                 },

                 success: function(data){

                   $(".loading_div").css("display","none");

                   data = JSON.parse(data);

                    if(data.result == "cnt_over"){

                       swal("이미지는 "+data.cnt+"개까지만 업로드 가능합니다.");
                       return;
                    }
                    else if(data.result == "size"){

                       swal( data.size+"MB 사이즈 이하로 올려주세요");
                       return;
                    }
                    else{

                      var length = $(".m_images .m_selected_photo").length;

                      var img_html = "<div class='m_selected_photo javascript' data-num='"+(length+1)+"'>";
                          img_html += "<div class='m_banner_close close_btn' data-num='"+(length+1)+"' data-img_name='"+data.img_name+"'>×</div>";
                          img_html += "<img src='"+file_img_src+"' alt=''>";
                          img_html += "<input type='text' class='m_banner_img_link_temp javascript' name='m_banner_img_link_temp' value='' placeholder='링크'/>";
                          img_html += "</div>";

                      $(".m_images").append(img_html);
                    }

                 },
                 error: function(err) {
                     alert("에러");
                 }
               });


               $("#input-file-3").val('');



             }
             else{
                alert("이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.");
                return;
             }

             cnt = cnt + 1;

      }

    }
    reader.readAsDataURL(f);

  });


}




/* 팝업이미지 추가 */

function handleImgsFilesSelect_2(e) {

  var files = $("#input-file-2")[0].files;
  var filesArr = Array.prototype.slice.call(files);

  //$(".selected_photo").remove();


  filesArr.forEach(function (f) {



    sel_files.push(f);

    var reader = new FileReader();
    var cnt = 0;

    reader.onload = function (e) {

      var file_size;
      var file_size_name;

      var file = $("#input-file-2")[0].files;
      var file_length = $("#input-file-2")[0].files.length;


      if(file_length > 1){
        alert("팝업 이미지 파일은 1개 까지만 올릴 수 있습니다.");
        $("#input-file-2").val("");
        return;
      }


      if (f.size > 1024 * 500) {
        file_size = Math.round(f.size / (1024 * 1024));
        file_size_name = "MB";
      }
      else if (f.size > 1024) {
        file_size = Math.round(f.size / (1024));
        file_size_name = "KB";
      }
      else if (f.size < 1024) {
        file_size = Math.round(f.size);
        file_size_name = "Byte";
      }

      var file_name = f.name;
      var file_img_src = e.target.result;



      if (f) {


             if($("#input-file-2")[0].files[0].name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)){


               var formdata = new FormData();
               formdata.append("popup", $("#input-file-2")[0].files[0]);
               formdata.append("shop_code", $(".shop_code").val());
               formdata.append("type", "popup");

               $.ajax({
                 type:"POST",
                 url:"./proc/config/config_ajax_upload.php",
                 data : formdata,
                 processData: false,
                 contentType: false,

                 beforeSend : function(){
                     $(".loading_div").css("display","block");
                 },

                 success: function(data){

                   $(".loading_div").css("display","none");

                   data = JSON.parse(data);

                    if(data.result == "cnt_over"){

                       swal("팝업 이미지는 1개까지만 업로드 가능합니다.");
                       return;
                    }
                    else if(data.result == "size"){

                       swal( data.size+"MB 사이즈 이하로 올려주세요");
                       return;
                    }
                    else{

                      var length = $(".popup_images .popup_selected_photo").length;

                      var img_html = "<div class='popup_selected_photo javascript' data-num='"+length+"'>";
                          img_html += "<div class='popup_close close_btn' data-num='"+length+"' data-img_name='"+data.img_name+"'>×</div>";
                          img_html += "<img src='"+file_img_src+"' alt=''>";
                          img_html += "</div>";

                      $(".popup_images").append(img_html);
                    }

                 },
                 error: function(err) {
                     alert("에러");
                 }
               });



               $("#input-file-2").val('');

             }
             else{
                alert("이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.");
                return;
             }

             cnt = cnt + 1;

      }

    }
    reader.readAsDataURL(f);

  });


}
