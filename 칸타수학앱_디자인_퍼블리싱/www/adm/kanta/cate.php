<?php

include_once('./_common.php');
include_once('../admin.head.php');


$config_sql = "select * from config";
$config_row = sql_fetch($config_sql);

//echo $cf_tree['tree_json'];
?>



<link href="./common_css/side_menu.css?i=<?=$ranum?>" rel="stylesheet"></link>



  <div class="flex">


    <div class="side_menu">

      <div class="flex button_div">
						<button type="button" class="btn btn-success btn-sm" onclick="create(event);"><i class="glyphicon glyphicon-asterisk"></i> Create</button>
						<button type="button" class="btn btn-warning btn-sm" onclick="rename(event);"><i class="glyphicon glyphicon-pencil"></i> Rename</button>
						<button type="button" class="btn btn-danger btn-sm" onclick="menu_delete(event);"><i class="glyphicon glyphicon-remove"></i> Delete</button>
			</div>


      <?
            $tree_json = json_decode($cf_tree['tree_json']);


      ?>



      <?
        for($i=0; $i<count($tree_json); $i++){
           foreach($tree_json[$i] as $key => $value){

              $code = $tree_json[$i] -> $key[0] -> code;

      ?>

            <div class="cate_1" data-num="1" data-code="<?=$code?>" data-val="<?=$code?>">
                <div class="cate_1_name block odd" data-num="1" data-code="<?=$code?>" data-val="<?=$code?>">
                  <span class="val_span"><?=$key?></span>
                  <input type='text' class="none val_input form-css" data-num="1" data-code="<?=$code?>" data-val="<?=$code?>" value="<?=$key?>"/>

                </div>


                <?
                for($a=0; $a<count($tree_json[$i] -> $key[0] -> item); $a++){
                   foreach($tree_json[$i] -> $key[0] -> item[$a] as $key_1 => $value_1){

                      $code_1 = $tree_json[$i] -> $key[0] -> item[$a] -> $key_1  -> code;


                ?>

                <div class="cate_2" data-num="2" data-code="<?=$code_1?>" data-val="<?=$code."::".$code_1?>">

                    <div class="cate_2_name block" data-num="2" data-code="<?=$code_1?>" data-val="<?=$code."::".$code_1?>">
              
                      <span class="por_line"></span>
                      <span class="val_span"><?=$key_1?></span>
                      <input type='text' class="none val_input form-css" data-num="2" data-code="<?=$code_1?>" data-val="<?=$code."::".$code_1?>" value="<?=$key_1?>"/>
                    </div>



                    <?
                    for($b=0; $b<count($tree_json[$i] -> $key[0] -> item[$a] -> $key_1 -> item); $b++){
                       foreach($tree_json[$i] -> $key[0] -> item[$a]  -> $key_1 -> item[$b] as $key_2 => $value_2){

                         $code_2 = $tree_json[$i] -> $key[0] -> item[$a] -> $key_1  -> item[$b] -> $key_2 -> code;


                    ?>

                    <div class="cate_3" data-num="3" data-code="<?=$code_2?>" data-val="<?=$code."::".$code_1."::".$code_2?>">
                        <div class="cate_3_name block" data-num="3" data-code="<?=$code_2?>" data-val="<?=$code."::".$code_1."::".$code_2?>">
                          <span class="val_span"><?=$key_2?></span>
                          <input type='text' class="none val_input form-css" data-num="3" data-code="<?=$code_2?>" data-val="<?=$code."::".$code_1."::".$code_2?>" value="<?=$key_2?>"/>
                        </div>



                    </div>

                    <?

                        }
                      }

                    ?>



                </div>

                <?

                    }
                  }

                ?>



            </div>

      <?
            }
        }
      ?>






    </div>


    <div class="config_setting">



    </div>




  <script>

    var js_arr;

    <?
      if($tree_json != ""){
    ?>
        js_arr = JSON.parse('<?=$cf_tree['tree_json']?>');
    <?
      }
      else{
    ?>
        js_arr = [];
    <?
      }

    ?>

      var js_ob = {};







      /* 더블클릭 감지 */


      $(document).on('dblclick', '.cate_1_name, .cate_2_name ,.cate_3_name', function(){

        var code = $(this).data("code");

        $(".cate_1_name").each(function(){
            if($(this).data("code") == code){

              if(!$(this).hasClass("dbl_on")){
                $(this).addClass("dbl_on");
                $(this).siblings(".cate_2").css("display","none");
              }
              else{
                $(this).removeClass("dbl_on");
                $(this).siblings(".cate_2").css("display","block");
              }

            }
        });

        $(".cate_2_name").each(function(){
            if($(this).data("code") == code){


              if(!$(this).hasClass("dbl_on")){
                $(this).addClass("dbl_on");
                $(this).siblings(".cate_3").css("display","none");
              }
              else{
                $(this).removeClass("dbl_on");
                $(this).siblings(".cate_3").css("display","block");
              }

            }

        });

        $(".cate_3_name").each(function(){
            if(!$(this).hasClass("dbl_on") && $(this).data("code") == code){

            }
            else{

            }
        });

      });




      /* 클릭 감지 */


      $(document).on('click', '.cate_1_name, .cate_2_name ,.cate_3_name', function(){

        var code = $(this).data("code");

        $(".cate_1_name").each(function(){
            if(!$(this).hasClass("tree_on") && $(this).data("code") == code){
                $(this).addClass("tree_on");



            }
            else{
                $(this).removeClass("tree_on");



            }
        });

        $(".cate_2_name").each(function(){
            if(!$(this).hasClass("tree_on") && $(this).data("code") == code){
                $(this).addClass("tree_on");

            }
            else{
                $(this).removeClass("tree_on");


            }
        });

        $(".cate_3_name").each(function(){
            if(!$(this).hasClass("tree_on") && $(this).data("code") == code){
                $(this).addClass("tree_on");
            }
            else{
                $(this).removeClass("tree_on");
            }
        });

      });



      /* 리네임 json  문자열 바꾸는곳  */



      $(document).on('keydown', '.val_input', function(e){
          if(e.keyCode == 13){

              var val = $(this).val().trim();

              if(val.trim() == ""){
                return;
              }

              var code = $(this).data("val");
              code = code.split("::");


              var num = $(this).data("num");


              console.log("num : " + num);


              if(num == 1){

                console.log("리네임 지나옴"+val);



                for(var i=0; i<js_arr.length; i++){
                  for(var key in js_arr[i]){

                    var code_in = js_arr[i][key][0]['code'];

                    if(code_in == code[0]){

                        var js_temp = {};
                            js_temp[val] = js_arr[i][key];

                            delete js_arr.splice(i, 1);

                            js_arr[i] = js_temp;



                        console.log(JSON.stringify(js_arr));
                    }

                  }
                }

              }
              else if(num == 2){


                for(var i=0; i<js_arr.length; i++){
                  for(var key in js_arr[i]){

                    var code_in = js_arr[i][key][0]['code'];

                    if(code_in == code[0]){

                      for(var a=0; a<js_arr[i][key][0]['item'].length; a++){
                        for(var key_1 in js_arr[i][key][0]['item'][a]){

                          var code_in = js_arr[i][key][0]['item'][a][key_1]['code'];

                          if(code_in == code[1]){

                            var js_temp = {};
                                js_temp[val] = js_arr[i][key][0]['item'][a][key_1];

                                js_arr[i][key][0]['item'].splice(a, 1);

                                js_arr[i][key][0]['item'][a] = js_temp;

                            console.log(JSON.stringify(js_arr));

                          }
                        }
                      }

                    }

                  }
                }


              }
              else if(num == 3){


                for(var i=0; i<js_arr.length; i++){
                  for(var key in js_arr[i]){

                    var code_in = js_arr[i][key][0]['code'];

                    if(code_in == code[0]){

                      for(var a=0; a<js_arr[i][key][0]['item'].length; a++){
                        for(var key_1 in js_arr[i][key][0]['item'][a]){

                          var code_in = js_arr[i][key][0]['item'][a][key_1]['code'];

                          if(code_in == code[1]){


                            for(var b=0; b<js_arr[i][key][0]['item'][a][key_1]['item'].length; b++){
                              for(var key_2 in js_arr[i][key][0]['item'][a][key_1]['item'][b]){

                                var code_in = js_arr[i][key][0]['item'][a][key_1]['item'][b][key_2]['code'];

                                if(code_in == code[2]){


                                  var js_temp = {};
                                  js_temp[val] = js_arr[i][key][0]['item'][a][key_1]['item'][b][key_2];

                                  js_arr[i][key][0]['item'][a][key_1]['item'].splice(b, 1);

                                  js_arr[i][key][0]['item'][a][key_1]['item'][b] = js_temp;

                                  console.log(JSON.stringify(js_arr));

                                }

                              }
                            }



                          }
                        }
                      }

                    }

                  }
                }




              }

              ajax_send(JSON.stringify(js_arr), $(this), val);
          }
      });



  </script>

 <script src="./common_func/side_menu/function.js?i=<?=$ranum?>"></script>


  <?

  include_once(G5_PATH.'/tail.sub.php');
  ?>
