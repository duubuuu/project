







  /* 더블클릭 감지 */


  $(document).on('dblclick', '.cate_1_name, .cate_2_name ,.cate_3_name', function(e){

    if(e.target.className == "cate_chk"){
      return;
    }

    var cate_code = $(this).data("cate_code");

    $(".cate_1_name").each(function(){
        if($(this).data("cate_code") == cate_code){

          if(!$(this).hasClass("dbl_on")){
            $(this).addClass("dbl_on");
            $(this).siblings(".cate_2").css("display","block");
          }
          else{
            $(this).removeClass("dbl_on");
            $(this).siblings(".cate_2").css("display","none");
          }

        }
    });

    $(".cate_2_name").each(function(){
        if($(this).data("cate_code") == cate_code){


          if(!$(this).hasClass("dbl_on")){
            $(this).addClass("dbl_on");
            $(this).siblings(".cate_3").css("display","block");
          }
          else{
            $(this).removeClass("dbl_on");
            $(this).siblings(".cate_3").css("display","none");
          }

        }

    });

    $(".cate_3_name").each(function(){
      if($(this).data("cate_code") == cate_code){


        if(!$(this).hasClass("dbl_on")){
          $(this).addClass("dbl_on");
          $(this).siblings(".cate_4").css("display","block");
        }
        else{
          $(this).removeClass("dbl_on");
          $(this).siblings(".cate_4").css("display","none");
        }

      }
    });

  });




  /* 클릭 감지 */


  $(document).on('click', '.cate_1_name, .cate_2_name ,.cate_3_name, .cate_4_name', function(){

    var cate_code = $(this).data("cate_code");

    var type = $(this).closest(".cate_1").data("type");
    console.log(type);

    $(".cate_1_name").each(function(){
        if(!$(this).hasClass("tree_on") && $(this).data("cate_code") == cate_code){
          $(this).addClass("tree_on");

          cate_type = type;

        }
        else{
          $(this).removeClass("tree_on");
        }
    });

    $(".cate_2_name").each(function(){
        if(!$(this).hasClass("tree_on") && $(this).data("cate_code") == cate_code){
            $(this).addClass("tree_on");

            var val = $(this).children("span.val_span").text();
            var cate_code_2 = $(this).data("cate_code");

            cate_type = type;

            selected_category = val;
            selected_category_code = cate_code_2;

            $(".selected_category").data("cate_code", cate_code_2);
            $(".selected_category").val(val);


        }
        else{
            $(this).removeClass("tree_on");


        }
    });

    $(".cate_3_name").each(function(){

      if(!$(this).hasClass("tree_on") && $(this).data("cate_code") == cate_code){
          $(this).addClass("tree_on");

          var val = $(this).children("span.val_span").text();
          var cate_code_3 = $(this).data("cate_code");

          cate_type = type;

          selected_category = val;
          selected_category_code = cate_code_3;




      }
      else{
          $(this).removeClass("tree_on");


      }
    });



    $(".cate_4_name").each(function(){

      if(!$(this).hasClass("tree_on") && $(this).data("cate_code") == cate_code){
          $(this).addClass("tree_on");

          var val = $(this).children("span.val_span").text();
          var cate_code_4 = $(this).data("cate_code");

          cate_type = type;

          /*

          selected_category = val;
          selected_category_code = cate_code_4;

          $(".selected_category").data("cate_code", cate_code_3);
          $(".selected_category").val(val);

          */

      }
      else{
          $(this).removeClass("tree_on");


      }
    });

  });



  /* 리네임 json  문자열 바꾸는곳  */



  $(document).on('keydown', '.side_menu_border .val_input', function(e){


    cate_type = $(this).closest("div.cate_1").data("type");


      if(e.keyCode == 13){

          var name = $(this).val().trim();
          var cate_code = $(this).data("cate_code");
          var depth = $(this).data("depth");
          var num = $(this).data("reged_num");

          console.log("name_input 들어옴"+name);
          console.log("reged_num 들어옴"+num);

          if(name == ""){
            return;
          }

          ajax_send("update", depth, cate_code, name, $(this), num);

      }



  }).on('click', '.side_menu_border .val_input', function(e){


    cate_type = $(this).closest("div.cate_1").data("type");



  });
