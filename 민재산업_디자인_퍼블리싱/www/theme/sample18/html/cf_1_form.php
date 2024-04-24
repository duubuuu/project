<style>
#cf_1_form {display:none;border:2px solid tomato;padding:2em;background-color:#fff;border-radius:6px; width:640px}
#cf_1_form h3 { font-size:20px; margin-bottom:20px}
#cf_1_form .line {margin:5px 0; padding-bottom:7px}
#cf_1_form .line label {font-size:14px; color:#930; width:150px; display:inline-block; vertical-align:middle;}
#cf_1_form .line input[type=text] {border:1px solid #ccc;line-height:20px;height:40px; width:100%}
#btn-cf_1 { bottom:2px;right:2px;background-color:tomato; color:#fff; font-size:14px; border:0; height:24px; line-height:24px; padding:0 0.5em; border-radius:12px;}
.btn_submit { margin:0 auto; display:block; padding:10px 20px}
</style>
<button type="button" id="btn-cf_1"><i class="fa fa-gear"></i></button>

<form action="<?php echo G5_THEME_URL.'/html/cf_1_edit_x.php' ?>" id="cf_1_form" name="cf_1_form" style="display:none;">
    <h3>서브문구</h3>
    <div class="line"><input type="text" name="cf_1" id="cf_1" value="<?php echo get_text($config['cf_1']);?>"></div>
    <div class="tc"><input type="submit" value="설정 저장" class="btn_submit"></div>
</form>
<script>
$(function() {
    var cf_popup = null;
    $('#btn-cf_1').click(function(e) {
        cf_popup = $('#cf_1_form').bPopup();
    });
    $('#cf_1_form').submit(function(e) {
        e.preventDefault();
        var x_url = $(this).attr('action');
        $.ajax({
            method: "POST",
            type: "POST",
            url: x_url,
            data: {
                'cf_1':$('#cf_1').val()
            },
            dataType: "json"
        })
            .done(function(data) {
                if(data['error']) alert(data['error']);
                else {
                    window.location.reload();
                }
            });
    
    });
});
</script>