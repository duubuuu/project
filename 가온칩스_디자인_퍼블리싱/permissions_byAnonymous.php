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
        <a class="by_group" href="./permissions_byGroup.php">
            그룹별
        </a>
        <a class="by_user" href="./permissions_byUser.php">
                사용자별
        </a>
        <a class="by_anonymous selectedTab" href="./permissions_byAnonymous.php">
                익명 사용자
        </a>
    </div>
    <div class="byAnonymous_area">
            <ul class="spaceList">
                <!-- 스페이스 목록 -->
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
            </div>
        </div>

</section>
</div>