<?php

include_once('./_common.php');
include_once('../admin.head.php');


$config_sql = "select * from kanta_config";
$config_row = sql_fetch($config_sql);


?>
  <link href="/adm/kanta/css/config/config.css?i=<?=$ranum?>" rel="stylesheet" ></link>
  <style>
    .cf_form {
    background: none !important;
    padding: 0 !important;
  }
  .la, .preview {
      margin: 10px 20px 35px 0 !important;
  }
  input[type="checkbox"] + label:after {
    border-color: #f36063 !important;
  }
  </style>

<form method="post" action="/adm/kanta/proc/config/config_proc.php" enctype="multipart/form-data">

  <div class="cf_form">
      <div class="big-title">기타 설정</div>
      <div class="adm-box">
        <div class="logo_cf_img">
            <div class="cf_title adm-box__title">
              <span>로고 이미지 설정</span>
              <span style="vertical-align: middle; margin-left: 0.5rem;">
                <input type="checkbox" id="logo_img_ad" name="logo_img_ad" <?if($cf_arr['logo_chk'] == "on"){echo "checked";}?> style="appearance:auto;width:unset;">
                <label style="font-size:0.9em;" for="logo_img_ad"></label>
              </span>
            </div>

            <input type="file" name="logo_img" id="logo_img" style="display:none;" />

            <div>
              <label for="logo_img" class="logo_img_la la">+</label>
              <div class="preview">
                <?if($cf_arr['logo_img_path'] == ""){?>
                  <img src="/img/no_image.png" class="logo_img_preview" />
                <?}else{
                  preg_match('/\/upload_img\/[0-9a-zA-Z_\/]*\//i', $cf_arr['logo_img_path'] ,$img_path);
                ?>
                  <img src="<?=$img_path[0].$cf_arr['logo_img_name']?>" class="logo_img_preview" />
                <?}?>
              </div>
            </div>
        </div>

        <div class="adm_login_bg_img">
            <div class="cf_title adm-box__title">
              <span>관리자 - 로그인페이지 배경화면 설정</span>
              <span style="vertical-align: middle; margin-left: 0.5rem;">
                <input type="checkbox" id="adm_bg_ad" name="adm_bg_ad" <?if($cf_arr['adm_bg_chk'] == "on"){echo "checked";}?> style="appearance:auto;width:unset;">
                <label style="font-size:0.9em;" for="adm_bg_ad">

                </label>
              </span>
            </div>

            <input type="file" name="adm_bg_img" id="adm_bg_img" style="display:none;" />

            <div>
              <label for="adm_bg_img" class="adm_bg_img_la la">+</label>
              <div class="preview">
                <?if($cf_arr['adm_bg_path'] == ""){?>
                  <img src="/img/no_image.png" class="adm_bg_img_preview" />
                <?}else{
                  preg_match('/\/upload_img\/[0-9a-zA-Z_\/]*\//i', $cf_arr['adm_bg_path'] ,$img_path);
                ?>
                  <img src="<?=$img_path[0].$cf_arr['adm_bg_name']?>" class="adm_bg_img_preview" />
                <?}?>
              </div>
            </div>
        </div>

        <div class="user_login_bg_img">
            <div class="cf_title adm-box__title">
              <span>유저 - 로그인 페이지 배경화면 설정</span>
              <span style="vertical-align: middle; margin-left: 0.5rem;">
                <input type="checkbox" id="user_bg_ad" name="user_bg_ad" <?if($cf_arr['user_bg_chk'] == "on"){echo "checked";}?> style="appearance:auto;width:unset;">
                <label style="font-size:0.9em;" for="user_bg_ad">

                </label>
              </span>
            </div>

            <input type="file" name="user_bg_img" id="user_bg_img" style="display:none;" />

            <div>
              <label for="user_bg_img" class="user_bg_img_la la">+</label>
              <div class="preview">
                <?if($cf_arr['user_bg_path'] == ""){?>
                  <img src="/img/no_image.png" class="user_bg_img_preview" />
                <?}else{
                  preg_match('/\/upload_img\/[0-9a-zA-Z_\/]*\//i', $cf_arr['user_bg_path'] ,$img_path);
                ?>
                  <img src="<?=$img_path[0].$cf_arr['user_bg_name']?>" class="user_bg_img_preview" />
                <?}?>
              </div>
            </div>
        </div>
      </div>
      <div class="submit-btn-set" style="text-align: center;">
          <button type="button" name="button" class="out__line-btn">취소</button>
          <button type="submit" name="button" class="out__red-btn">완료</button>
      </div>

  </div>

</form>


<script src="/adm/kanta/js/config/config.js?i=<?=$ranum?>"></script>


  <?

  include_once(G5_PATH.'/tail.sub.php');
  ?>
