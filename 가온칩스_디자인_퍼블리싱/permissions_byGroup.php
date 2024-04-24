<?php include_once "./header.php"; ?>
<div class="container">
<aside class="topManager">
    <ul>
        <li>
            <a href="">
                스페이스 관리
            </a>
        </li>
        <li>
            <a href="">
                그룹 관리
            </a>
        </li>
        <li>
            <a href="">
                사용자 권한 
            </a>
        </li>
    </ul>
</aside>
<section>
    <h1 class="title">사용자 권한</h1>
    <div class="permissions_tab">
        <a class="by_group selectedTab" href="./permissions_byGroup.php">
            그룹별
        </a>
        <a class="by_user" href="./permissions_byUser.php">
                사용자별
        </a>
        <a class="by_anonymous" href="./permissions_byAnonymous.php">
                익명 사용자
        </a>
    </div>
    <div class="byGroup_area">
            <ul class="groupList">
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
                <li>
                    <a href="">
                        그룹 A
                    </a>
                </li>
            </ul>
            <ul class="spaceList">
                <li>
                    <a href="">
                        A 스페이스
                    </a>
                </li>
                <li>
                    <a href="">
                        A 스페이스
                    </a>
                </li>
                <li>
                    <a href="">
                        A 스페이스
                    </a>
                </li>
                <li>
                    <a href="">
                        A 스페이스
                    </a>   
                </li>
                <li>
                    <a href="">
                        A 스페이스
                    </a>
                </li>
            </ul>
            <div class="table_box">                
                <div class="ByGroup_table">
                    <div class="item _1 colorAdd">전체</div>
                    <div class="item _2 colorAdd">URL</div>
                    <div class="item _3 colorAdd">페이지</div>
                    <div class="item _4 colorAdd">댓글</div>
                    <div class="item _5 colorAdd">첨부파일</div>
                    <div class="item _6 colorAdd">카테고리</div>

                    <!-- 전체 보기-->
                    <div class="item _7">보기</div>
                    <!-- URL 생성 -->
                    <div class="item _8">생성</div>
                    <!-- 페이지관련 -->
                    <div class="item _9">생성</div>
                    <div class="item _10">수정</div>
                    <div class="item _11">삭제</div>
                    <!-- 댓글관련 -->
                    <div class="item _12">보기</div>
                    <div class="item _13">생성</div>
                    <div class="item _14">관리</div>
                    <!-- 첨부파일관련 -->
                    <div class="item _15">보기</div>
                    <div class="item _16">관리</div>
                    <!-- 카테고리관련 -->
                    <div class="item _17">생성</div>
                    <div class="item _18">관리</div>

                    <!-- 전체 보기-->
                    <div class="item _19">
                        <input type="checkbox" id="allView" name="allView" />
                    </div>
                    <!-- URL 생성 -->
                    <div class="item _20">
                        <input type="checkbox" id="urlProduce" name="urlProduce" />
                    </div>
                    <!-- 페이지관련 -->
                    <div class="item _21">
                        <input type="checkbox" id="pageProduce" name="urlProduce" />
                    </div>
                    <div class="item _22">
                        <input type="checkbox" id="pageCorrection" name="pageCorrection" />
                    </div>
                    <div class="item _23">
                        <input type="checkbox" id="pageDelete" name="pageDelete" />
                    </div>
                    <!-- 댓글관련 -->
                    <div class="item _24">
                        <input type="checkbox" id="pageView" name="pageView" />
                    </div>
                    <div class="item _25">
                        <input type="checkbox" id="pageProduce" name="urlProduce" />
                    </div>
                    <div class="item _26">
                        <input type="checkbox" id="pageManagement" name="pageManagement" />
                    </div>
                    <!-- 첨부파일관련 -->
                    <div class="item _27">
                        <input type="checkbox" id="attachmentView" name="attachmentView" />
                    </div>
                    <div class="item _28">
                        <input type="checkbox" id="attachmentManagement" name="attachmentManagement" />
                    </div>
                    <!-- 카테고리관련 -->
                    <div class="item _29">
                        <input type="checkbox" id="categoryProduce" name="categoryProduce" />
                    </div>
                    <div class="item _30">
                        <input type="checkbox" id="categoryManagement" name="categoryManagement" />
                    </div>
                </div>
                <div class="flexEnd">
                    <button class="allSelect">전체 선택</button>
                    <button class="Save">저장</button>
                </div>
                <div class="txt_box">
                    <h2 class="title">
                        사용자 권한 설명
                    </h2>
                    <div class="detail">
                        1. 최고관리자는 자신이 작성자가 아닌 모든 생성물에 대해서도 수정/삭제 권한을 갖는다.<br>
                        2. <strong>생성</strong> 이라는 권한은 생성물의 신규 생성 및, 자신이 생성한 생성물에만 수정/삭제 권한을 갖는다.<br>
                        3. 페이지의 <strong>편집</strong>이라는 권한은 페이지의 공동 편집 권한을 말한다.<br>
                        4. 페이지의 <strong>생성</strong> 권한은 자신이 생성한 페이지의 첨부파일 <strong>생성</strong> 권한을 포함한다.<br>
                        5. <strong>관리</strong> 라는 권한은 자신의 생성물이 아닌 생성물도 수정/삭제 권한을 갖는다.<br>
                        6. 첨부파일의 <strong>보기</strong> 권한은 첨부파일 목록의 확인과 다운로드를 포함한다.<br>
                        7. 사용자가 그룹과 일반사용자 중복으로 권한이 설정될 경우 그룹으로 설정한 권한은 무시하고, 일반사용자로 설정한 권한을 갖는다.<br>
                        8. 권한이 있는 사용자가 스페이스나 카테고리를 삭제할 경우 해당부분에 속한 페이지는 모두 휴지통으로 이동된다.<br>
                        9. 페이지 이동/복사는 대당 페이지의 생성자 또는 페이지 <strong>관리</strong> 권한을 가진 사용자에 한함.
                    </div>            
                </div>
            </div>
        </div>

</section>
</div>