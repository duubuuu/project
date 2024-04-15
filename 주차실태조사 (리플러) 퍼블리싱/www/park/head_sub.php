<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />

    <title>리플러</title>


    <link href="css/style.css?i=<?=$ranum?>" rel="stylesheet">
    <link href="css/style02.css?i=<?=$ranum?>" rel="stylesheet">







<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <script src="/park/js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>





    <script src="common_js/fastclick/fastclick.js"></script>


    <script src="common_js/bxslide/bxslide.js"></script>



    <script src="common_js/shp/shp.min.js"> </script>
    <script src="common_js/shp/leaflet.js"> </script>

    <script src='common_js/proj4/proj4js_combined.js'></script>

    <script src="common_js/excel/excel.js"></script>

    <script src="common_js/swal/swal.js"></script>

    <script src="common_js/function.js?i=<?=$ranum?>"></script>

    <script src="common_js/clipboard/clipboard.js"></script>
    <!--
    <link rel="icon" type="image/png" sizes="16x16"  href="/park/img/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:image"  content="/park/img/og_image.png">
  -->



    <script>

        var dev_login_check = "<?=device_check();?>";


        window.addEventListener('load', function() {
          FastClick.attach(document.body);
        }, false);

        var g5_https_domain = "<?=G5_HTTPS_DOMAIN?>";

        var mb_level;

        <?if($s_member){?>
          mb_level = <?=$s_member['mb_level']?>;
        <?}else if($member){?>
          mb_level = <?=$member['mb_level']?>;
        <?}?>

    </script>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="app_icon.png" />
<link rel="apple-touch-icon-precomposed" href="app_icon.png" />
<link rel="apple-touch-startup-image" href="startup.png"/>
<script>
  // <![CDATA[
  try {
   window.addEventListener('load', function(){
    setTimeout(scrollTo, 0, 0, 1);
   }, false);
  }
  catch(e) {}
  // ]]>
 </script>




  </head>
