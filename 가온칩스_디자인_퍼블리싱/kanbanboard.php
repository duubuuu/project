<?php include_once "./head.php"; ?>

<body class="dark_class">   

    <?php include_once "./header.php"; ?>

    <div class="kanbanboard_container">


        <ul>
            <li>zzz</li>
        </ul>



        <!-- 모바일시, 출현하는 최근/즐겨찾기목록버튼 -->
        <div class="go_btn_set" style="display: none;">
            <button class="recently_list_btn" onclick="myFunction()">
                최근 목록                    
            </button>
            <button class="favorite_list_ul_btn">
                즐겨찾기 목록
            </button>
        </div>
        <script>
            // When the user clicks on <div>, open the popup
            function myFunction() {
              var popup = document.getElementById("recently_list_btn_popup");
              popup.classList.toggle("show");
            }

            function myFunction() {
              var popup = document.getElementById("recently_list_btn_popup");
              popup.classList.toggle("show");
            }
        </script>

        <!-- 모바일버전 최근목록 팝업 -->
        <span class="recently_list_btn_popup part" id="recently_list_btn_popup">
            <div class="recently_list_top_set">            
                <p class="part_title">recently</p>
                <div class="recently_list_close" onclick="closerecently();">
                    <img src="image/close_icon.png" alt="">
                </div>
            </div>
            <ul class="recently_list_ul">
              <li class="recently_list_li">
                <div class="folder_icon">
                  <img src="./image/folder_icon.png" alt="폴더아이콘">
                </div>
                <div class="recently_list_space_title">
                    A Space
                </div>
              </li>
              <li class="recently_list_li">
                <div class="folder_icon">
                  <img src="./image/folder_icon.png" alt="폴더아이콘">
                </div>
                <div class="recently_list_space_title">
                    A Space
                </div>
              </li>
              <li class="recently_list_li">
                <div class="folder_icon">
                  <img src="./image/folder_icon.png" alt="폴더아이콘">
                </div>
                <div class="recently_list_space_title">
                    A Space
                </div>
              </li>
              <li class="recently_list_li">
                <div class="folder_icon">
                  <img src="./image/folder_icon.png" alt="폴더아이콘">
                </div>
                <div class="recently_list_space_title">
                    A Space
                </div>
              </li>

                </ul>
        </span>

        <section class="kanbanboard">
            <div class="space">
                <span class="folder_icon">
                    <img src="./image/folder_icon.png" alt="폴더아이콘">
                </span>
                 <!-- 칸반보드 스페이스 제목 -->
                <div class="kanbanboard_space_title">
                    ㅇㅇ
                </div>
                <button class="fav_btn">                    
                    즐겨찾기추가
                </button>
            </div>

            <div class="space">
                <span class="folder_icon">
                    <img src="./image/folder_icon.png" alt="폴더아이콘">
                </span>
                 <!-- 칸반보드 스페이스 제목 -->
                <div class="kanbanboard_space_title">
                    A Space
                </div>
                <span class="star_icon">
                    <img src="../image/star_icon.png" alt="스타아이콘">
                </span>
                <!-- 즐겨찾기해제상태 : remove class 추가됨 -->
                <button class="fav_btn remove">                    
                    즐겨찾기해제
                </button>
            </div>

        </section>

        <nav class="snb">
            <div class="recently part">
                <p class="part_title">최근 목록</p>
                <ul class="recently_list_ul">
                    <li class="recently_list_li">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 최근 스페이스 제목 -->
                        <div class="recently_list_space_title">
                            A Space
                        </div>
                    </li>          
                    <li class="recently_list_li">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 최근 스페이스 타이틀 -->
                        <div class="recently_list_space_title">
                            A Space
                        </div>
                    </li>               
                    <li class="recently_list_li">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 최근 스페이스 타이틀 -->
                        <div class="recently_list_space_title">
                            A Space
                        </div>
                    </li>          
                    <li class="recently_list_li">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 최근 스페이스 타이틀 -->
                        <div class="recently_list_space_title">
                            A Space
                        </div>
                    </li>          
                    
                </ul>
            </div>
            <div class="favorite part">
                <p class="part_title">즐겨찾기 목록</p>
                <ul class="favorite_list_ul">                    
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>

                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>

                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>
                    <li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li><li class="favorite_list_ul_name">
                        <span class="folder_icon">
                            <img src="./image/folder_icon.png" alt="폴더아이콘">
                        </span>
                        <!-- 즐겨찾기된 스페이스 타이틀 -->
                        <div class="favorite_list_space_title">
                            A Space
                        </div>
                        <div class="star_icon">
                            <img src="./image/star_icon.png" alt="스타아이콘">
                        </div>                        
                    </li>

                </ul>
            </div>
        </nav>


         
        
    </div>
</body>
</html>