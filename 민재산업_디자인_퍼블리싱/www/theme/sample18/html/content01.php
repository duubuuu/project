<?php
include './_common.php';
include_once(G5_THEME_PATH.'/head.php');
$LMSM = '2010';
?>

<div class="sub_visual visual02">
  <div class="title_wrap">
    <div class="title">
      <h3>사업소개</h3>
      <p class="sub_title"><?php echo get_text($config['cf_1'])?>
        <?php if($is_admin) { include_once G5_THEME_PATH.'/html/cf_1_form.php'; } ?>
      </p>
    </div>
  </div>
  <p class="cover"></p>
  <p class="bg"></p>
</div>
<!--sub_visual visual-->


<section class="category-wrap">
  <?php
    include_once(G5_THEME_PATH.'/html/sub_navi.php');
    ?>
</section>


<section class="content_wrap">
  <div class="txtCon">
     
     <div class="sub_title">
      <h3>content01</h3>
      <p class="sub_title">티로그테마를 이용해주셔서 감사합니다.</p>
    </div>
    
    <div class="content_area content01 clearfix">
      
      
     <!--왼쪽 -->
      <div class="box clearfix"> <div class="img img_left"><img src="http://sample24.tloghost.kr/theme/sample24/img/business_thumb01.jpg"></div>
        <div class="txt_wrap">
          <h2 class="half-round-tit"> <span>1</span> <strong>TITLE TEXT</strong> </h2>
          <p class="lead">Aenean auctor nisl vitae auctor faucibus. Pellentesque imperdiet auctor eros, sit amet ornare mauris malesuada in. Duis rutrum nisi tempus finibus luctus. Sed porta vel lacus quis lacinia. Vestibulum nec justo lectus. In hac habitasse platea dictumst. Proin vulputate rhoncus nibh eu vehicula. Donec vitae laoreet quam, ac feugiat nibh. Aenean auctor nisl vitae auctor faucibus. Pellentesque imperdiet auctor eros, sit amet ornare mauris malesuada in. Duis rutrum nisi tempus finibus luctus.</p>
        </div>
      </div>
      <!--왼쪽 -->
      
      
      <!--오른쪽 -->
      <div class="box clearfix"> <div class="img img_right"><img src="http://sample24.tloghost.kr/theme/sample24/img/business_thumb02.jpg"></div>
        <div class="txt_wrap txt_wrap02">
          <h2 class="half-round-tit"> <span>2</span> <strong>TITLE TEXT</strong> </h2>
          <p class="lead">Aenean auctor nisl vitae auctor faucibus. Pellentesque imperdiet auctor eros, sit amet ornare mauris malesuada in. Duis rutrum nisi tempus finibus luctus. Sed porta vel lacus quis lacinia. Vestibulum nec justo lectus. In hac habitasse platea dictumst. Proin vulputate rhoncus nibh eu vehicula. Donec vitae laoreet quam, ac feugiat nibh. Aenean auctor nisl vitae auctor faucibus. Pellentesque imperdiet auctor eros, sit amet ornare mauris malesuada in. Duis rutrum nisi tempus finibus luctus.</p>
        </div>
      </div>
      <!--오른쪽 -->
      
      
      <!--왼쪽 -->
      <div class="box clearfix"> <div class="img img_left"><img src="http://sample24.tloghost.kr/theme/sample24/img/business_thumb03.jpg"></div>
        <div class="txt_wrap">
          <h2 class="half-round-tit"> <span>3</span> <strong>TITLE TEXT</strong> </h2>
          <p class="lead">Aenean auctor nisl vitae auctor faucibus. Pellentesque imperdiet auctor eros, sit amet ornare mauris malesuada in. Duis rutrum nisi tempus finibus luctus. Sed porta vel lacus quis lacinia. Vestibulum nec justo lectus. In hac habitasse platea dictumst. Proin vulputate rhoncus nibh eu vehicula. Donec vitae laoreet quam, ac feugiat nibh. Aenean auctor nisl vitae auctor faucibus. Pellentesque imperdiet auctor eros, sit amet ornare mauris malesuada in. Duis rutrum nisi tempus finibus luctus.</p>
        </div>
      </div>
      <!--왼쪽 -->
       
      
      <!--오른쪽 --> 
      <div class="box clearfix"> <div class="img img_right"><img src="http://sample24.tloghost.kr/theme/sample24/img/business_thumb04.jpg"></div>
        <div class="txt_wrap txt_wrap02">
          <h2 class="half-round-tit"> <span>4</span> <strong>TITLE TEXT</strong> </h2>
          <p class="lead">Aenean auctor nisl vitae auctor faucibus. Pellentesque imperdiet auctor eros, sit amet ornare mauris malesuada in. Duis rutrum nisi tempus finibus luctus. Sed porta vel lacus quis lacinia. Vestibulum nec justo lectus. In hac habitasse platea dictumst. Proin vulputate rhoncus nibh eu vehicula. Donec vitae laoreet quam, ac feugiat nibh. Aenean auctor nisl vitae auctor faucibus. Pellentesque imperdiet auctor eros, sit amet ornare mauris malesuada in. Duis rutrum nisi tempus finibus luctus.</p>
        </div>
      </div>
      <!--오른쪽 -->
   
   
   
    </div>
  </div>
</section>
<!--content_wrap-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
