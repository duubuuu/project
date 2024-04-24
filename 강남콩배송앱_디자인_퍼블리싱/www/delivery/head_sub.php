<?
include_once('../db_config.php');
include_once('../common.php');

$todate = date('Y-m-d');
$toTime = date('h:i:s');

$timestamp_ago = strtotime("{$todate} -4 days");
$todate_ago = date("Y-m-d", $timestamp_ago);

$ranum = "ver4";
$mb_id = $_SESSION['mb_id'];
$mb_name = $_SESSION['mb_name'];
if($mb_id == ""){
  url_goto("/delivery/login.php");
  //alert("로그인이 필요한 서비스입니다.","/delivery/login.php");
}

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <script type="module">
       import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
       const el = document.createElement('pwa-update');
       document.body.appendChild(el);
    </script>
    <link rel="apple-touch-icon" href="/delivery/icons/icon-512x512.png?ver=1">
    <link rel="apple-touch-startup-image" href="/delivery/icons/screenshot1.png?ver=1">

    <title>강남콩배송앱</title>
    <link rel="manifest" href="./manifest.json" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:100,300,400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="css/reset.css?i=<?=$ranum?>" rel="stylesheet">
    <link href="css/common.css?i=<?=$ranum?>" rel="stylesheet"><!-- 공통css -->
    <link href="css/style.css?i=<?=$ranum?>" rel="stylesheet">
    <link href="css/default.css?i=<?=$ranum?>" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/common.js?ver=<?=$ranum?>"/></script>

  </head>
