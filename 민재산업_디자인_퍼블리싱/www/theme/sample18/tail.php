<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if($bo_table) {
	include G5_THEME_PATH.'/html/bbs_tail.php';
}
?>

<script>
$(function() {
	$('#mail_popup').bind('click', function(e) {
		e.preventDefault();
		// Triggering bPopup when click event is fired
		$('#mail_bpopup_form').bPopup();
		//alert('준비중비니다.');
	});
});

$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<!-- 아이폰에서 전화번호 링크 색 변경 문제 해결 메타 태그 -->
<meta name="format-detection" content="telephone=no" />

</div>
<!--wrap-->


           <!-- } 하단 시작 -->
   <div id="footer">
    <div class="footer_in">
        <div class="">
            <span class="menu">
            <a href="/html/ceo_message.php">회사소개</a>
            <a href="/bbs/content.php?co_id=privacy"><strong>개인정보처리방침</strong></a>
            <a href="<?=G5_THEME_URL?>/html/location.php">오시는 길</a> </span>

               <address>
               <span class="adr"><strong>Adress</strong> : 대전광역시 동구 동대전로 295, 408호 (가양동, 신도빌딩)</span>
               <span class="adr"><strong>Tel</strong> : <a href="tel:1566-3469" style="color: #a9a9a9;">1566-3469</a>, <strong>Fax</strong> : <a href="tel:042-621-4089" style="color: #a9a9a9;">042) 621-4089</a></span>
               <span class="copyright">COPYRIGHT © 2020 tlog CO., LTD. ALL RIGHTS RESERVED. Creative by <a href="http://tlog.kr" target="_blank"><span style="color:#f37736">MINJAE INDUSTRY</span></a></span>
               </address>
        </div>
        <div class="footer_logo">
            <img src="<?=G5_THEME_URL?>/img/logo_mark03.png" alt="마크로고3">
        </div>
   </div>




    <button type="button" id="top_btn"><i class="material-icons">arrow_upward</i><span class="sound_only">상단으로</span></button>
    <script>
	$(function() {
		$("#top_btn").on("click", function() {
			$("html, body").animate({scrollTop:0}, '500');
			return false;
		});
	});
	</script>


<?php
include_once(G5_THEME_PATH."/tail.sub.php");

?>
