<?

include_once('./_common.php');
include_once('./head.php');
include_once('./top_nav.php');



?>
<title>노외주차조사_사진촬영</title>
<style>
    .flex .left_title {
        width: 25%;
        text-align: center;
        height: 4.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin: 0;
    }
    .flex .left_title div {
        height: 2rem;
        display: flex;
        align-items: center;
    }
    .flex .right_input {
        width: 75%;
        margin: 0;
        height: 4.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    button.white_btn.big_font {
        margin: 1rem 0 0.5rem;
    }

</style>


<div class="photo_div">
    <div class="inner">
        <!-- 촬영된이미지 -->
        <div class="photo">

        </div>

        <div class="flex">
            <div class="left_title">
                <div class="">
                    촬영시간
                </div>
                <div class="">
                    GPS
                </div>
            </div>
            <div class="right_input">
                <div class="inputB">
                    <input type="text" name="" value="AM 11:25:20" disabled>
                </div>
                <div class="inputB">
                    <input type="textarea" name="" value="N 37.594873 E126.93692" disabled>
                </div>
            </div>
        </div>

        <button type="button" name="button" class="white_btn big_font">
            <a href="#">
                <div class="flex">
                    <span>사진 촬영·재촬영</span>
                </div>
            </a>
        </button>
        <div class="flex" style="justify-content: space-between;">
            <button type="button" name="button" class="gray_btn big_font" style="width: 49%; margin: 0;">
                <a href="#">
                    <div class="flex">
                        <span class="icon" style="margin-right: 0.3rem; margin-bottom: 3px;">
                            <img src="./img/icon_redX.png" alt="엑스아이콘">
                        </span>
                        <span>
                            이전단계
                        </span>
                    </div>
                </a>
            </button>
            <button type="button" name="button" class="blue_btn big_font" id="send_btn" style="width: 49%; margin: 0;">
                <div class="flex">
                    <span class="icon" style="margin-right: 0.3rem; margin-bottom: 3px;">
                        <img src="./img/icon_green_check.png" alt="체크아이콘">
                    </span>
                    <span>
                        전송
                    </span>
                </div>
            </button>
        </div>
    </div>


    <!-- 전송완료 팝업 -->
    <div class="popup_background" style="display: none;">
        <div class="popup" id="send_popup" style="display: none;">
            <div class="icon">
                <img src="./img/icon_green_check.png" alt="체크아이콘">
            </div>
            <h3>
                전송이 완료되었습니다.
            </h3>
        </div>
    </div>
    <!-- 끝 -->
</div>

<script>
    $('#send_btn').on("click",function(){
      $('#send_popup').show();
      $('.popup_background').show();
    });
    $('.popup_background').on("click",function(){
      $('#send_popup').hide();
      $('.popup_background').hide();
    });
</script>

<?include "./tail.php"?>
