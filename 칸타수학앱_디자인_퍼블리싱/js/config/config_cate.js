$(".clear").on('click',function(){
  $(".category_name_div_1").remove();
  $(".category_name_div_2").remove();

  for (var key in t_ob) {
    var text_html = "<div class='category_name_div_1' data-val='"+key+"'>";
        text_html +="<div class='category_tag_1_@'>"+key+"</div>";
        text_html +="<div class='category_remove_1' data-val='"+key+"'>x</div>";
        text_html +="</div>";

    $(".category_form_1").append(text_html);
  }

  for (var key in t_ob) {
    for (var key2 in t_ob[key]) {
      var text_html = "<div class='category_name_div_2' data-val='"+key+"-"+t_ob[key][key2]+"'>";
          text_html +="<div class='category_tag_2'>"+key+"-"+t_ob[key][key2]+"</div>";
          text_html +="<div class='category_remove_2' data-val='"+key+"-"+t_ob[key][key2]+"'>x</div>";
          text_html +="</div>";

          $(".category_form_2_@").append(text_html);
    }
  }

});












// 교과과정 ( 초중고 ) 추가
$(".category_input_1").on('keydown',function(e){

    if(e.keyCode == "13"){

        if($(this).val().trim() == ""){
          return;
        }

        var same_flag = 0;

        var name = $(this).val().trim();

        var text_html = "<div class='category_name_div_1' data-val='"+$(this).val()+"'>";
            text_html +="<div class='category_tag_1'>"+$(this).val()+"</div>";
            text_html +="<div class='category_remove_1' data-val='"+$(this).val()+"'>x</div>";
            text_html +="</div>";


        $(".category_tag_1").each(function(){
          if($(this).text() == name){
            alert("이미 동일한 지역이 있습니다.");
            same_flag = 1;
            e.preventDefault();
            return;
          }
        });

        if(same_flag == 1){
          e.preventDefault();
          return;
        }

        $(".category_form_1").append(text_html);


          t_ob[name] = {};




        console.log(JSON.stringify(t_ob));

        $(this).val("");
        e.preventDefault();
    }
    else{

    }

});




var ob = {};
var arr = [];

var select_name_1 = "";

$(document).on('click','.category_name_div_1', function(){

    $(".category_name_div_2").remove();

    $(".category_name_div_1").css("background", "#F9F9F9").css("color","#F37373").css("border", "1px solid #F37373");
    $(this).css("background", "#F37373").css("color","#fff");

    var name = $(this).children(".category_tag_1").text().trim();
    $(".select_name_1").text(name);
    ob = t_ob[name];

    for (var key in ob) {

        var text_html = "<div class='category_name_div_2' data-val='"+ob[key]+"'>";
            text_html +="<div class='category_tag_2'>"+ob[key]+"</div>";
            text_html +="<div class='category_remove_2' data-val='"+ob[key]+"'>x</div>";
            text_html +="</div>";

            $(".category_form_2").append(text_html);

    }


});


$(document).on('click',".category_remove_1",function(e){

  e.stopPropagation();


  var val = $(this).data("val");

  delete t_ob[val];

  $(".category_name_div_1").each(function(){

    if($(this).data("val") == val){
        $(this).remove();
    }

  });
console.log(JSON.stringify(t_ob));

});






// 학년 카테고리 추가
$(".category_input_2").on('keydown',function(e){

    if(e.keyCode == "13"){

        if($(this).val().trim() == ""){
          return;
        }


        var select_name_1_temp ="";

        if($(".select_name_1").text() == ""){
          alert("지역을 선택해주세요.");
          e.preventDefault();
          return;
        }
        else{
          select_name_1_temp = $(".select_name_1").text();

          if(select_name_1 != select_name_1_temp){

             ob = t_ob[select_name_1_temp];

             arr = [];
          }

          select_name_1 = $(".select_name_1").text();



        }


        for(var i=0; i<Object.keys(t_ob[select_name_1]).length; i++){
           if(t_ob[select_name_1][i] == $(this).val()){
                alert("이미 동일한 이름이 있습니다.");
                e.preventDefault();
                return;
           }
        }


        ob[Object.keys(ob).length] = $(this).val().trim();



        t_ob[select_name_1] = ob;

        var text_html = "<div class='category_name_div_2' data-val='"+$(this).val()+"'>";
            text_html +="<div class='category_tag_2'>"+$(this).val()+"</div>";
            text_html +="<div class='category_remove_2' data-val='"+$(this).val()+"'>x</div>";
            text_html +="</div>";

        $(".category_form_2").append(text_html);

        console.log(JSON.stringify(t_ob));
        $(this).val("");
        e.preventDefault();
    }
    else{

    }



});


$(document).on('click',".category_remove_2",function(e){

  var flag = 0;

  var val = String($(this).data("val")).split("-");
  val = val[0];

  tag_val = $(this).data("val");


  for(var i=0; i<Object.keys(t_ob[val]).length; i++){

    if(val == t_ob[val][i]){

      flag = 1;
      delete t_ob[val][i];

    }

    if(flag == 1){
      t_ob[val][i] = t_ob[val][i+1];
    }

    if( (Object.keys(t_ob[val]).length-1) == i){
      delete t_ob[val][i];
    }
  }

  $(".category_name_div_2").each(function(){

    if($(this).data("val") == tag_val){
        $(this).remove();
    }

  });

console.log(JSON.stringify(t_ob));

});








// 난이도 카테고리 추가
$(".category_input").on('keydown',function(e){

    if(e.keyCode == "13"){

        $(this).val();

        var text_html = "<div class='category_name_div' data-val='"+$(this).val()+"'>";
            text_html +="<div class='category_tag'>"+$(this).val()+"</div>";
            text_html +="<div class='category_remove' data-val='"+$(this).val()+"'>x</div>";
            text_html +="</div>";

        $(".category_form").append(text_html);

        $(this).val("");
        e.preventDefault();
    }
    else{

    }

});


$(document).on('click',".category_remove",function(e){

  var val = $(this).data("val");


  $(".category_name_div").each(function(){

    if($(this).data("val") == val){
        $(this).remove();
    }

  });

});
