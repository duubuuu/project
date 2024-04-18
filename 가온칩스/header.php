<?php include_once "./head.php"; ?>
<header>
    <div class="header_top">
        <a href="">
            로그아웃
        </a>
    </div>
    <div class="header_bottom">
        <div class="logo">
            <img src="./img/white_logo.png" alt="가온칩스_화이트로고">
        </div>
        <div class="search_set">
            <select name="" class="item">
                <option value="title">제목</option>
                <option value="detail">내용</option>
                <option value="title_and_detail">재목 + 내용</option>
                <option value="writer">작성자</option>
            </select>
            <input type="search">
            <div class="serch_icon">
                <img src="./img/search_icon_white.png" alt="돋보기_아이콘_화이트">
            </div>
        </div>
        <div class="user_set">
            <!-- 마이페이지로 이동 -->
            <div class="user_box">                
                <div class="user_icon">
                </div>
                <div class="user_name">영업1팀 홍길동</div>
            </div>
            <div class="alarm_box">
                <!-- 알림페이지로 이동 -->
                <div class="alarm_icon">
                </div>
                <!-- 알림 레이어팝업 연결 -->
                <div class="alarm_count">
                    + 4
                </div>
            </div>
            <div class="setting"></div>
            <div class="recyclebin"></div>
            <!-- 다크모드전환 -->
            <div class="view_mode">    
                <div class="light_mode_icon">
                    <img src="./img/light_icon.png" alt="">
                </div>                        
                <div class="select_view_mode">
                    <div class="select_view_mode_box"></div>
                </div>    
                <div class="dark_mode_icon">
                    <img src="./img/dark_icon.png" alt="">
                </div>    
            </div>
        </div>

    </div>
</header>