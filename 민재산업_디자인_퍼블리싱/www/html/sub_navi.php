<section class="sub_navI_warp">
    <div class="all-wrap">
        <div class="loca-wrap">
            <div class="loca-area"><i class="home"><a href="/"><img src="<?=G5_THEME_URL?>/img/home_btn.png" alt=""></a></i>
                <ul>
                    <li>
                        <?php
					$lm = substr($LMSM,0,2);
					?>
                        <button type="button"><span>
                        <?=$MENUM[$lm]['me_name']?>
                        </span></button>
                        <div class="next-depth">
                            <ul>
                                <?php foreach ($MENUM as $k=>$menu) { ?>
                                <li><a href="<?=$menu['me_link']?>" >
                                    <?=$menu['me_name']?>
                                    </a>
                                    <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php if(count($MENUM[$lm]['ms']) > 0) { ?>
                    <li>
                        <button type="button"><span style="font-weight:bold">
                        <?=$MENUM[$lm]['ms'][$LMSM]['me_name']?>
                        </span></button>
                        <div class="next-depth">
                            <ul>
                                <?php foreach ($MENUM[$lm]['ms'] as $k=>$menu) { ?>
                                <li><a href="<?=$menu['me_link']?>" >
                                    <?=$menu['me_name']?>
                                    </a>
                                    <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            
            <div class="share-area">
            <div class="hide-wrap">
                <div class="hide-area">
                    <ul>
                        <li><a target="_blank" id="facebook" onClick="snsModule.facebook();return false;"  title="페이스북"><img src="<?=G5_THEME_URL?>/img/share_facebook.png" alt=""></a></li>
                        <li><a target="_blank" id="twitter" onClick="snsModule.twitter();return false;" title="트위터"><img src="<?=G5_THEME_URL?>/img/share_twitter.png" alt=""></a></li>
                        <li><a href="javascript:void(0);" onClick="alert(window.location.href);copyToClipboard(window.location.href)"><img src="<?=G5_THEME_URL?>/img/share_link.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <button type="button" class="share-btn">공유하기</button>
            </div>
            
        </div>
    </div>
</section>
<script>
var es_step = "Expo.ease";
$(function() {
	// 로케이션 바 하위뎁스 관련
    var loca_v = false;
    $(".loca-area ul li button").on("click", function(){
        var $this = $(this);
        var $li = $this.parent("li");
        var nd_height = $this.siblings("div").find("ul").height() + 1;
        if ( loca_v == false ){
            $this.addClass("active");
            TweenMax.to( $this.siblings("div"), 0.3, {height: nd_height, ease: es_step});
            loca_v = true;
        } else {
            $this.removeClass("active");
            TweenMax.to( $this.siblings("div"), 0.3, {height: 0, ease: es_step});
            loca_v = false;
        }
		/*
        $li.mouseleave(function(){
            $li.find("button").removeClass("active");
            TweenMax.to( $li.find(".next-depth"), 0.3, {height: 0, ease: es_step});
            loca_v = false;
        });
		*/
		$this.blur();
    })
	
	
	var share = false;
	$(".share-btn").on("click", function(){
		if (share == false){
			$(this).addClass("active");
			shareOpen();
			share = true;
		} else{
			$(this).removeClass("active");
			shareClose();
			share = false;
		}
		$(this).blur();
	})

	function dimmed(dimmedName, num, display) {
		TweenMax.to($(dimmedName), 0.3, {opacity: num, display: display, ease: es_step});
	}
	function shareOpen(){
		TweenMax.to($(".hide-area"), .3, {left:0, ease: es_step});
	}
	function shareClose(){
		TweenMax.to($(".hide-area"), .3, {left:200, ease: es_step});
	}
	
});

</script> 
<script>
$(function(){ 
    var menupos = $(".category-wrap").offset().top; 
    $(window).scroll(function(){ 
       if($(window).scrollTop() >= menupos) { 
          $(".category-wrap").css("position","relative"); 
          $(".category-wrap").css("top","0");
		  
       }
	   else {
	   	$(".category-wrap").css("position","relative");
	   }
    }); 
 }); 
</script>