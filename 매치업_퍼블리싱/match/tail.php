</div>

<div class="tail">
  <div class="tail_inner">
      <div id="footer_btn" style="">
          <div class="footer_btn_right">
              <span style="font-weight: 500; font-size: 0.85rem;">매치업을 만든 사람들</span>
              <span>
                  <img src="./img/keyboard_arrow_down.png" alt="아래화살표" style="width: auto !important;">
              </span>
          </div>
          <ul class="sns" id="tail_sns">
            <li class="tel_li">
              <a href="tel:1644-8420"><img src="img/ic_call-1.png" alt="전화"></a>
              <!-- <a href="tel:1644-8420"><img src="img/ic_call-1.png" alt="전화"></a> -->
            </li>
            <!-- pc 전화하기 아이콘 작동 div -->
            <div class="container" id="tel_li_div" style="display: none;">
                <div class="icon_x">
                    <img src="./img/icon_X.png" alt="엑스아이콘" style="width: 100%;">
                </div>
                <h3>고객센터 전화번호</h3>
                <div class="copy">
                  <form>
                    <input type="text" value="1644-8420" readonly>
                    <button type="button">Copy</button>
                  </form>
                </div>
            </div>
            <li class="email_li">
              <a href="#"><img src="img/ic_mail-1.png" class="link_copy"  data-clipboard-text="1644-8420" alt="메일"></a>
            </li>
            <!-- 이메일아이콘 작동 div -->
            <div class="container" id="email_li_div" style="display: none;">
                <div class="icon_x">
                    <img src="./img/icon_X.png" alt="엑스아이콘" style="width: 100%;">
                </div>
                <h3>이메일 주소 복사</h3>
                <div class="copy">
                  <form>
                    <input type="text" value="akdong_corp@naver.com" readonly>
                    <button type="button">Copy</button>
                  </form>
                </div>
            </div>
            <script>
                (function() {
                  var copyButton = document.querySelector('.copy button');
                  var copyInput = document.querySelector('.copy input');

                  copyButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    var text = copyInput.select();
                    document.execCommand('copy');
                  });

                  copyInput.addEventListener('click', function() {
                    this.select();
                  });
                })();


                /* 클립보드 데이터 복사 */
                var clipboard = new Clipboard('.link_copy');
                clipboard.on('success', function(e) {

                  if(dev_login_check=='android'){
                    console.log("Success");
                    swal("복사되었습니다.");               /*
                    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
                    */


                  }
                  else if(dev_login_check=='ios'){
                    console.log("Success");
                    swal("복사되었습니다.");               /*
                    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
                    */

                  }
                  else{
                    console.log("Success");
                    swal("복사되었습니다.");               /*
                    아래 함수를 통해서 블록지정을 없앨 수 있습니다.
                    */


                  }

                });
                clipboard.on('error', function(e) {
                  alert("다시 시도해주세요.");
                    console.log("Fail");
                });

                $('.tel_li').on("click",function(){
                    $('#tel_li_div').show();
                });
                $('.icon_x').on("click",function(){
                    $('#tel_li_div').hide();
                });
                $('.email_li').on("click",function(){
                    $('#email_li_div').show();
                });
                $('.icon_x').on("click",function(){
                    $('#email_li_div').hide();
                });
            </script>
            <li>
              <a href="https://www.facebook.com/no1.matchup" target='_blank'><img src="img/ic_facebook-1.png" alt="페이스북"></a>
            </li>
            <li>
              <a href="https://www.instagram.com/no1.matchup/" target='_blank'><img src="img/ic_instagram-1.png" alt="인스타그램"></a>
            </li>
            <br>
            <li>
              <a href="https://blog.naver.com/akdong_corp" target='_blank'><img src="img/ic_naverblog-1.png" alt="네이버블로그"></a>
            </li>
            <li>
              <a href="http://pf.kakao.com/_FBDJj" target='_blank'><img src="img/ic_kakaotalk-1.png" alt="카카오톡"></a>
            </li>
            <li>
              <a href="http://pf.kakao.com/_xkJvRxb" target='_blank'><img src="img/ic_kakaoch-1.png" alt="카카오채널"></a>
            </li>
          </ul><!-- sns // -->
      </div>
      <div id="footer_active" style="">
         <div class="footer_active_in">
             <div class="tail_logo">
               <img src="img/logo-footer.png" style="width:100%;" alt="악동컴퍼니CI">
             </div>
             <div class="tail_txt">
                 <div class="">
                   <h4>(주) 악동컴퍼니</h4>
                   <div class="tail_txt_p_div pc_tail">
                       <div class="flex flex1">
                           <p class="right_line_p">
                               대표이사 : 박병훈
                           </p>
                           <p class="right_line_p">
                               사업자번호 : 430-87-01254
                           </p>
                           <p class="right_line_p">
                               통신판매번호 : 2020-대전대덕-0307
                           </p>
                           <p class="alone_p">
                               주소 : 대전 동구 백룡로 75-41 레오파드 빌딩 5층
                           </p>
                       </div>
                       <div class="flex">
                           <p class="right_line_p">
                               대표메일 : akdong_corp@naver.com
                           </p>
                           <p class="right_line_p">
                               대표전화 : 1644 - 8420
                           </p>
                           <p>
                               ⒸAKDONG COMPANY. All rights reserved.
                           </p>
                       </div>
                   </div>
                   <!-- 모바일에서 바뀜 -->
                   <div class="tail_txt_p_div mobile_tail">
                       <div class="">
                           <p class="right_line_p m_last m_none">
                               대표이사 : 박병훈
                           </p>
                           <div class="m_last">
                               <p class="right_line_p">
                                   사업자번호 : 430-2-87-01254
                               </p>
                               <p class="right_line_p m_none">
                                   통신판매번호 : 2019-대전서구-0613
                               </p>
                           </div>
                           <p class="alone_p m_last">
                               주소 : 대전 동구 백룡로 75-41 레오파드 빌딩 5층
                           </p>
                       </div>
                       <div class="m_last">
                           <p class="right_line_p">
                               대표메일 : akdong_corp@naver.com
                           </p>
                           <p class="right_line_p m_none">
                               대표전화 : 1644 - 8420
                           </p>
                       </div>
                       <p>
                           ⒸAKDONG COMPANY. All rights reserved.
                       </p>
                   </div>
                 </div>
             </div>
         </div>
      </div>
      <script type="text/javascript">
          $('#footer_btn').on("click",function(){
              $('#footer_active').toggle();
          });
      </script>
  </div>
</div>
</body>
</html>
