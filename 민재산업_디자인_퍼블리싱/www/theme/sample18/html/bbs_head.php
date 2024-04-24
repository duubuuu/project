<?php
include './_common.php';
include_once(G5_THEME_PATH . '/head.php');

if ($is_admin && $bo_table) {
  add_javascript('<script src="' . G5_THEME_URL . '/js/jquery.bpopup.min.js"></script>');
?>
  <style>
    #head-edit-form{display:none;border:2px solid tomato;padding:2em;background-color:#fff;border-radius:6px}
    #head-edit-form h3{font-size:20px;margin-bottom:20px}
    #head-edit-form .line{margin:5px 0;padding-bottom:7px}
    #head-edit-form .line label{font-size:14px;color:#930;width:180px;display:inline-block;vertical-align:middle}
    #head-edit-form .line textarea{width:400px;height:100px;line-height:20px;border:1px solid #ccc}
    #head-edit-form .line input[type=text]{border:1px solid #ccc;line-height:20px;height:40px}
    #head-edit-form .line #bo_head_bg_class{width:150px;height:40px}
    #head-edit-form .line #bo_head_title{width:300px}
    #head-edit-form .line #bo_head_sub_title{width:380px}
    #head-edit-form .tc{text-align:center;margin-top:1em}
    #btn-mng-head{position:absolute;z-index:9;bottom:2px;right:2px;background-color:tomato;color:#fff;font-size:14px;border:0;height:24px;line-height:24px;padding:0 0.5em;border-radius:12px}
  </style>
  <form action="<?php echo G5_THEME_URL . '/html/bbs_head_edit_x.php' ?>" id="head-edit-form" name="head-edit-form" style="display:none;">
    <h3>헤더 관리</h3>
    <div class="line">
      <label for="bo_me_code">메뉴 코드</label>
      <input type="text" name="bo_me_code" id="bo_me_code" value="<?php echo get_text($board['bo_me_code']); ?>" size="6">
      <a href="#" class="popup_me_code_select" data-field="bo_me_code">찾기</a> </div>
    <div class="line">
      <label for="bo_head_sub_title">서브 문구</label>
      <input type="text" name="bo_head_sub_title" id="bo_head_sub_title" value="<?php echo get_text($board['bo_head_sub_title']); ?>">
    </div>
    <div class="line">
      <label for="bo_head_bg_class">배경 이미지 class</label>
      <input type="text" name="bo_head_bg_class" id="bo_head_bg_class" value="<?php echo get_text($board['bo_head_bg_class']); ?>">
    </div>
    <div class="tc">
      <input type="submit" value="설정 저장" class="btn_submit">
    </div>
  </form>
  <script>
    var target_me_code = '';

    function set_me_code(me_code) {
      $('#' + target_me_code).val(me_code);
    }
    $(function() {
      $('.popup_me_code_select').click(function(e) {
        e.preventDefault();
        target_me_code = $(this).data('field');
        window.open('<?= G5_THEME_URL ?>/adm/me_code_select.php', '', 'width=700,height=600,left=900,top=250,scrollbars=yes');
      });


      var hef_popup = null;
      $('#btn-mng-head').click(function(e) {
        hef_popup = $('#head-edit-form').bPopup();
      });
      $('#head-edit-form').submit(function(e) {
        e.preventDefault();
        var x_url = $(this).attr('action');
        $.ajax({
            method: "POST",
            type: "POST",
            url: x_url,
            data: {
              'bo_table': '<?= $bo_table ?>',
              'bo_head_bg_class': $('#bo_head_bg_class').val(),
              'bo_head_sub_title': $('#bo_head_sub_title').val(),
              'bo_me_code': $('#bo_me_code').val()
            },
            dataType: "json"
          })
          .done(function(data) {
            if (data['error']) alert(data['error']);
            else {
              window.location.reload();
            }
          });

      });
    });
  </script>
<?php
}
$LMSM = $hb_me_code = $board['bo_me_code'];
$hb_key = substr($hb_me_code, 0, 2);
$hb_title = $MENUM[$hb_key]['me_name'];
$hb_subtitle = $board['bo_head_sub_title'];
$hb_bg_class = $board['bo_head_bg_class'];
?>


<!--{{{ sub_visual visual<?php echo $hb_bg ?>-->
<div class="sub_visual <?php echo $hb_bg_class ?>">
  <?php if ($is_admin && $bo_table) { ?>
    <button type="button" id="btn-mng-head" style="">헤더 관리</button>
  <?php } ?>
  <div class="title_wrap">
    <div class="title">
      <h3><?php echo get_text($hb_title); ?></h3>
      <p class="sub_title"><?php echo get_text($hb_subtitle) ?></p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>
<!--}}} sub_visual visual<?php echo $hb_bg ?>-->




<section class="category-wrap">
  <?php
  include_once(G5_THEME_PATH . '/html/sub_navi.php');
  ?>
</section>
<section class="content_wrap">

  <div class="txtCon txtboard">
      <div class="sub_title">
          <h3><?php echo get_text($board['bo_subject'])?></h3>
        </div>
