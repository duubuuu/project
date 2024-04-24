<?
  $request_uri = $_SERVER['REQUEST_URI'];
  if($request_uri == '/delivery/'){
    $icon_tail_1 = "_pink";
  }
  if($request_uri == '/delivery/list_before_picked.php'){
    $icon_tail_2 = "_pink";
  }
  if($request_uri == '/delivery/picked_list.php'){
    $icon_tail_3 = "_pink";
  }
  if($request_uri == '/delivery/delivery_path.php'){
    $icon_tail_4 = "_pink";
  }
  if(strpos($request_uri,'/delivery/delivery_completed_list.php') !== false){
    $icon_tail_5 = "_pink";
  }

?>


<div class="tail">
    <div class="inner">
        <div class="img" onclick="location.href='/delivery'">
            <img src="img/icon_tail_1<?=$icon_tail_1?>.png" alt="icon_tail_1">
        </div>
        <div class="img" onclick="location.href='/delivery/list_before_picked.php'">
            <img src="img/icon_tail_2<?=$icon_tail_2?>.png" alt="icon_tail_2">
        </div>
        <div class="img" onclick="location.href='/delivery/picked_list.php'">
            <img src="img/icon_tail_3<?=$icon_tail_3?>.png" alt="icon_tail_3">
        </div>
        <div class="img" onclick="location.href='/delivery/delivery_path.php'">
            <img src="img/icon_tail_4<?=$icon_tail_4?>.png" alt="icon_tail_4">
        </div>
        <div class="img" onclick="location.href='/delivery/delivery_completed_list.php'">
            <img src="img/icon_tail_5<?=$icon_tail_5?>.png" alt="icon_tail_5">
        </div>
    </div>
</div>


<?if($request_uri != "/delivery/list_before_picked.php" && $request_uri != "/delivery/add_order.php"){?>
  <script>
   localStorage.co_pass = "";
  </script>
<?}?>
