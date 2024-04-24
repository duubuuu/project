<?

include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');



?>
<title>노외주차조사</title>
<style>
    .flex .left {
        width: 58%;
        margin: 0;
    }
    .flex .left p {
        width: 6.5rem;
    }
    .flex .right {
        width: 39%;
        margin: 0;
    }
    .flex .right p {
        width: 3rem;
    }
    .width51per {
        width: 51%;
        margin: 0;
    }
    .width47per {
        width: 47%;
        margin: 0;
    }
    div.box .liner {
    border: 1px solid #e5e5e5a3;
    padding: 0;
    width: 93%;
    margin: 1rem auto;
    }
    div.small_input {
        /* width: 3.5rem; */
        max-width: 3.5rem;
        margin: 0;
    }

    div.select div.width51per, div.select div.width47per {
    height: 7rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    }
    div.select div.width51per>div, div.select div.width47per>div {
        margin: 0;
    }

    div.purpose div.width51per, div.purpose div.width47per {
    height: 7rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    }

    div.way div.width51per {
    height: 6rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    }
    div.way div.width47per {
    height: 5rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    }
    div.way div.width51per>div, div.way div.width47per>div {
        margin: 0;
    }
    div.basic_info p {
        margin-bottom: 0.2rem;
    }
</style>


<div class="survey_div">
    <div class="inner">
        <div class="box basic_info">
            <div class="flex" style="justify-content: space-between;">
                <div class="" style="width: 25%; margin: 0;">
                    <p>조사구역</p>
                    <div class="inputA">
                        <input type="text" name="" value="01">
                    </div>
                </div>
                <div class="" style="width: 72%; margin: 0;">
                    <p>주차장명</p>
                    <div class="inputA">
                        <input type="text" name="" placeholder="입력">
                    </div>
                </div>
            </div>
            <div class="">
                <p>주소</p>
                <div class="inputA">
                    <input type="text" name="" value="서울시 동작구 상도로 406">
                </div>
            </div>
        </div>
        <div class="box">
            <div class="flex">
                <p style="min-width: 5.7rem;">조사주차면</p>
                <div class="inputA">
                    <input type="text" name="" value="" placeholder="입력">
                </div>
                <p style="text-align: right; min-width: 3.5rem;">
                    /<span>0</span>면
                </p>
            </div>
            <div class="flex" style="justify-content: space-between;">
                <div class="flex">
                    <p style="min-width: 5.7rem;">주간주차수요</p>
                    <div class="inputA small_input">
                        <input type="text" name="" value="" placeholder="입력">
                    </div>
                </div>
                <div class="flex">
                    <p style="min-width: 5.7rem;">야간주차수요</p>
                    <div class="inputA small_input">
                        <input type="text" name="" value="" placeholder="입력">
                    </div>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="flex" style="justify-content: space-between;">
                <div class="left">
                    <div class="flex" style="margin-bottom: 0.5rem;">
                        <p>소유주체</p>
                        <div class="inputA">
                            <select name="소유주체" class="mb_local">
                              <option value="">선택</option>
                              <option value="">시</option>
                              <option value="">구</option>
                              <option value="">민간사업자</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex">
                        <p>운영주체</p>
                        <div class="inputA">
                            <select name="운영주체" class="mb_local">
                              <option value="">선택</option>
                              <option value="">지자체직영</option>
                              <option value="">공단위탁</option>
                              <option value="">민간위탁</option>
                              <option value="">민간직영</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="flex" style="margin-bottom: 0.5rem;">
                        <p>부제</p>
                        <div class="inputA">
                            <select name="부제" class="mb_local">
                              <option value="">선택</option>
                              <option value="">미시행</option>
                              <option value="">2부제</option>
                              <option value="">5부제</option>
                              <option value="">10부제</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex">
                        <p>급지</p>
                        <div class="inputA">
                            <select name="급지" class="mb_local">
                              <option value="">선택</option>
                              <option value="">1급지</option>
                              <option value="">2급지</option>
                              <option value="">3급지</option>
                              <option value="">4급지</option>
                              <option value="">5급지</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box select">
            <div class="flex" style="justify-content: space-between;">
                <div class="width51per">
                    <div class="B">
                        <input type="checkbox" id="a1" name="주차장 일반인 개방">
                        <label for="a1">
                            <span></span>
                            주차장 일반인 개방
                        </label>
                    </div>
                    <div class="B">
                        <input type="checkbox" id="a2" name="시간제(일반)">
                        <label for="a2">
                            <span></span>
                            시간제(일반)
                        </label>
                    </div>
                    <div class="B">
                        <input type="checkbox" id="a3" name="시간제+거주자 우선">
                        <label for="a3">
                            <span></span>
                            시간제+거주자 우선
                        </label>
                    </div>
                    <div class="B">
                        <input type="checkbox" id="a4" name="관광버스+시간제">
                        <label for="a4">
                            <span></span>
                            관광버스+시간제
                        </label>
                    </div>
                </div>
                <div class="width47per">
                    <div class="B">
                        <input type="checkbox" id="a5" name="유료주차요금">
                        <label for="a5">
                            <span></span>
                            유료주차요금
                        </label>
                    </div>
                    <div class="B">
                        <input type="checkbox" id="a6" name="거주자 우선">
                        <label for="a6">
                            <span></span>
                            거주자 우선
                        </label>
                    </div>
                    <div class="B">
                        <input type="checkbox" id="a7" name="관광버스 전용">
                        <label for="a7">
                            <span></span>
                            관광버스 전용
                        </label>
                    </div>
                    <div class="B">
                        <input type="checkbox" id="a8" name="이륜차">
                        <label for="a8">
                            <span></span>
                            이륜차
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="box way">
            <div class="flex" style="justify-content: space-between; padding: 0 0.8rem 0 1rem;">
                <div class="flex">
                    <input type="checkbox" id="b1" name="평면식">
                    <label for="b1">
                        <span></span>
                        평면식
                    </label>
                    <div class="inputA small_input">
                        <input type="text" placeholder="입력">
                    </div>
                </div>
                <div class="flex">
                    <span style="width: 20px; display: inline-flex; margin-right: 0.1rem;">
                        <img src="./img/icon_help.png" alt="도움말 아이콘">
                    </span>
                    <span style="font-size: 0.65rem;">
                        평면식 : 노상주차장 <br>
                        입체식 : 지하 또는 주차전용 건축물
                    </span>
                </div>
            </div>
            <div class="liner"></div>
            <div class="flex" style="justify-content: space-between;">
                <div class="width51per">
                    <div>
                        <span style="width: 14px; display: inline-flex; margin-right: 0.3rem; vertical-align: middle;">
                            <img src="./img/icon_circle.png" alt="동그라미아이콘">
                        </span>
                        <span>입체식</span>
                    </div>
                    <div class="flex">
                        <input type="checkbox" id="b2" name="자주식">
                        <label for="b2">
                            <span></span>
                            자주식
                        </label>
                        <div class="inputA small_input">
                            <input type="text" name="" value="" placeholder="입력">
                        </div>
                    </div>
                    <div class="flex">
                        <input type="checkbox" id="b3" name="기계식">
                        <label for="b3">
                            <span></span>
                            기계식
                        </label>
                        <div class="inputA small_input">
                            <input type="text" name="" value="" placeholder="입력">
                        </div>
                    </div>
                </div>
                <div class="width47per">
                    <div class="">
                        <input type="checkbox" id="b4" name="사용검사 이행여부">
                        <label for="b4">
                            <span></span>
                            사용검사이행여부
                        </label>
                    </div>
                    <div class="">
                        <input type="checkbox" id="b5" name="관리인 배치">
                        <label for="b5">
                            <span></span>
                            관리인 배치
                        </label>
                    </div>
                    <div class="">
                        <input type="checkbox" id="b6" name="안전사고 통보">
                        <label for="b6">
                            <span></span>
                            안전사고 통보
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- 용도 -->
        <div class="box purpose">
            <div class="flex" style="justify-content: space-between;">
                <div class="width51per">
                    <div class="flex">
                        <input type="checkbox" id="c1" name="장애인">
                        <label for="c1">
                            <span></span>
                            장애인
                        </label>
                        <div class="inputA small_input">
                            <input type="text" name="" value="" placeholder="입력">
                        </div>
                    </div>
                    <div class="flex">
                        <input type="checkbox" id="c2" name="여행">
                        <label for="c2">
                            <span></span>
                            여행
                        </label>
                        <div class="inputA small_input">
                            <input type="text" name="" value="" placeholder="입력">
                        </div>
                    </div>
                    <div class="flex">
                        <input type="checkbox" id="c3" name="나눔">
                        <label for="c3">
                            <span></span>
                            나눔
                        </label>
                        <div class="inputA small_input">
                            <input type="text" name="" value="" placeholder="입력">
                        </div>
                    </div>
                </div>
                <div class="width47per">
                    <div class="flex">
                        <input type="checkbox" id="c4" name="경차">
                        <label for="c4">
                            <span></span>
                            경차
                        </label>
                        <div class="inputA small_input">
                            <input type="text" name="" value="" placeholder="입력">
                        </div>
                    </div>
                    <div class="flex">
                        <input type="checkbox" id="c5" name="전기">
                        <label for="c5">
                            <span></span>
                            전기
                        </label>
                        <div class="inputA small_input">
                            <input type="text" name="" value="" placeholder="입력">
                        </div>
                    </div>
                    <div class="flex">
                        <input type="checkbox" id="c6" name="기타">
                        <label for="c6">
                            <span></span>
                            기타
                        </label>
                        <div class="inputA small_input">
                            <input type="text" name="" value="" placeholder="입력">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" name="button" class="blue_btn" style="display: flex; align-items: center; justify-content: center; border-radius: 0.5rem;">
            <div class="flex">
                <span>사진 첨부하기</span>
                <span class="icon" style="margin-left: 0.3rem;">
                    <img src="./img/icon_clip.png" alt="클립 아이콘">
                </span>
            </div>
        </button>
    </div>

</div>









<script src="" ></script>
<?include "./tail.php"?>
