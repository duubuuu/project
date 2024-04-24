<?
include_once("./head_sub.php");

if(!$is_member && strpos($_SERVER["PHP_SELF"], "login.php") === false){
  alert("로그인 해주세요", "/kanta/login.php");
  exit;
}

?>


<body>
<div class="content">
