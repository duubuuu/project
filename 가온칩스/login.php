<?php include_once "./head.php"; ?>
<?php include_once "./header.php"; ?>

<body>
     <div class="inner_max500">
        <div class="logo">
            <img src="./img/logo.png" alt="가온칩스로고">
        </div>
        <input type="text" name="id" class="login_id " placeholder="아이디를 입력하세요.">
        <input type="password" name="pw" class="login_pw " placeholder="비밀번호를 입력하세요.">
        <div class="remember_id">
            <input type="checkbox" id="check1">
            <label for="check1"></label>
            <label for="check1">아이디 저장</label>
        </div>
        <button type="button" name="button" class="main_btn login_btn" id="">로그인하기</button>
     </div>
</body>