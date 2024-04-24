<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="/delivery/icons/icon-512x512.png?ver=1">
    <link rel="apple-touch-startup-image" href="/delivery/icons/screenshot1.png?ver=1">


    <script type="module">
       import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
       const el = document.createElement('pwa-update');
       document.body.appendChild(el);
    </script>
    <link rel="manifest" href="./manifest.json" />
    <title>강남콩배송앱</title>

    <link href="css/reset.css?i=<?=$ranum?>" rel="stylesheet">
    <link href="css/common.css?i=<?=$ranum?>" rel="stylesheet"><!-- 공통css -->
    <link href="css/style.css?i=<?=$ranum?>" rel="stylesheet">
    <link href="css/default.css?i=<?=$ranum?>" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
  </head>
  <title>로그인</title>
  <div class="main_inner">
      <div class="img">
          <img src="img/login_logo.png" alt="로고">
      </div>
      <!-- 메인 인풋 세트 -->
      <form class="" action="/delivery/proc.php" method="post">
        <div class="input_set" id="main_set">
          <input type="hidden" name="work_mode" value="member_login"/>
          <div class="A">
            <input type="text" name="mb_id" class="mb_name" placeholder="아이디">
          </div>
          <div class="A">
            <input type="password" name="mb_pass" class="mb_hp" placeholder="비밀번호">
          </div>
          <button type="submit" name="button" class="pink_btn login_btn" id="login_btn">로그인</button>
        </div>
      </form>
  </div>
