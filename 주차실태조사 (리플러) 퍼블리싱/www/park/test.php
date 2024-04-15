<?

include_once('./_common.php');
include_once('./head.php');



?>


<div class="text"></div>

<script>

var date = new Date("2021-08-31 21:59:23");
var background_class;

var hour = date.getHours();

document.write(hour);

if(hour > 20 ){
  background_class = " style='background:#ff0000;border:1px solid #ff0000;' ";
}

document.write(background_class);
</script>








<script src="" ></script>


<?include "./tail.php"?>
