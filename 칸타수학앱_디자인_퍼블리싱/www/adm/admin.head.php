<?php
if (!defined('_GNUBOARD_')) exit;

/*
if(!$is_member){
  alert("로그인이 필요합니다..", "/adm/kanta/login.php");
  exit;
}
*/

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();


$editor_url = array('/adm/kanta/shop_list.php', '/adm/kanta/my_affiliate_settings.php', '/adm/kanta/index.php', '/adm/index.php', '/adm', '/adm/kanta',
                    '/adm/kanta/review_manager.php', '/adm/kanta/edit_review_manager.php', '/adm/kanta/reply_manager.php', '/adm/kanta/edit_reply_manager.php',
                    '/adm/kanta/qalist.php', '/adm/kanta/qawrite.php');

if($member['mb_level'] == 8){

  $editor_flag = 0;

  for($ed_i = 0; $ed_i < count($editor_url); $ed_i++){
    if($editor_url[$ed_i] == $_SERVER["PHP_SELF"] ){
        $editor_flag = 1;
    }
  }

  if($editor_flag == 1){

  }
  else{
    alert("에디터 회원은 접근 할 수 없습니다.");
    exit;
  }

}

$files = glob(G5_ADMIN_PATH.'/css/admin_extend_*');
if (is_array($files)) {
    foreach ((array) $files as $k=>$css_file) {

        $fileinfo = pathinfo($css_file);
        $ext = $fileinfo['extension'];

        if( $ext !== 'css' ) continue;

        $css_file = str_replace(G5_ADMIN_PATH, G5_ADMIN_URL, $css_file);
        add_stylesheet('<link rel="stylesheet" href="'.$css_file.'">', $k);
    }
}

include_once(G5_PATH.'/head.sub.php');

$device_bol = device_check();

/* 캐쉬 수정을위한 랜덤변수 */
$randomNum = mt_rand(1, 30000);


$adm_menu_cookie = array(
'container' => '',
'gnb'       => '',
'btn_gnb'   => '',
);

if( ! empty($_COOKIE['g5_admin_btn_gnb']) ){
    $adm_menu_cookie['container'] = 'container-small';
    $adm_menu_cookie['gnb'] = 'gnb_small';
    $adm_menu_cookie['btn_gnb'] = 'btn_gnb_open';
}
?>
<script src="https://sdk.amazonaws.com/js/aws-sdk-2.879.0.min.js"></script>
<script>
var tempX = 0;
var tempY = 0;

function imageview(id, w, h)
{

    menu(id);

    var el_id = document.getElementById(id);

    //submenu = eval(name+".style");
    submenu = el_id.style;
    submenu.left = tempX - ( w + 11 );
    submenu.top  = tempY - ( h / 2 );

    selectBoxVisible();

    if (el_id.style.display != 'none')
        selectBoxHidden(id);
}



var albumBucketName = "<?=$cf_arr['bucket_name']?>";
var bucketRegion = "<?=$cf_arr['bucket_region']?>";
var IdentityPoolId = "<?=$cf_arr['IdentityPoolId']?>";

AWS.config.update({
  region: bucketRegion,
  credentials: new AWS.CognitoIdentityCredentials({
    IdentityPoolId: IdentityPoolId
  })
});

var s3 = new AWS.S3({
  apiVersion: "2006-03-01",
  params: { Bucket: albumBucketName }
});



var img_cnt = '<?=$kanta_cf_arr['img_cnt']?>';
var img_size = '<?=$kanta_cf_arr['img_size']?>';
var dev_login_check = '<?=$device_bol?>';
</script>




<link href="/adm/sb_admin_css/sb_admin.css?version=<?=$randomNum?>" rel="stylesheet" />
<link href="/adm/css/admin.css?version=<?=$randomNum?>" rel="stylesheet" />

<link href="/adm/kanta/common_css/common.css?version=<?=$randomNum?>" rel="stylesheet" />

<link href="/adm/kanta/common_css/jstree/jstree.css?version=<?=$randomNum?>" rel="stylesheet" />

<link href="/adm/kanta/common_css/datatable/datatable.css?version=<?=$randomNum?>" rel="stylesheet" />
<link href="/adm/kanta/common_css/datatable/datatable_responsive.css?version=<?=$randomNum?>" rel="stylesheet" />
<link href="/adm/kanta/common_css/datatable/datatable_fixheader.css?version=<?=$randomNum?>" rel="stylesheet" />

<link href="/adm/kanta/common_css/datatable/datatable_bootstrap.css?version=<?=$randomNum?>" rel="stylesheet" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">


<link href="/adm/kanta/common_css/jquery_ui/jquery_ui.css?version=<?=$randomNum?>" rel="stylesheet" />


<script src="/adm/kanta/common_js/swal/swal.js"></script>


<script src="https://kit.fontawesome.com/4b794d3be7.js" crossorigin="anonymous"></script>
<!-- 데이터 테이블 -->
<script src="/adm/kanta/common_js/datatable/datatable_jquery.js"></script>
<script src="/adm/kanta/common_js/datatable/datatable_button.js"></script>
<!--<script src="./js/datatable/datatable_editor.js"></script>
<script src="./js/datatable/datatable_select.js"></script>-->
<script src="/adm/kanta/common_js/datatable/datatable_bootstrap.js"></script>
<script src="/adm/kanta/common_js/datatable/datatable_responsive.js"></script>
<script src="/adm/kanta/common_js/datatable/datatable_fixheader.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script src="/plugin/editor/smarteditor2/js/HuskyEZCreator.js"></script>

<script src="/adm/kanta/common_js/jquery/jquery_ui.js"></script>

<script src="/adm/kanta/common_js/jstree/jstree.js"></script>

<script src="/adm/kanta/common_js/button/buttons_html5_min.js"></script>
<script src="/adm/kanta/common_js/button/buttons_print_min.js"></script>
<script src="/adm/kanta/common_js/button/datatable_button_min.js"></script>
<script src="/adm/kanta/common_js/button/jszip_min.js"></script>
<script src="/adm/kanta/common_js/button/pdfmake_min.js"></script>
<script src="/adm/kanta/common_js/button/vfs_fonts.js"></script>



<div class="loading_div">
    <img src="/kanta/img/loading.gif"/>
</div>



        <div id="layoutSidenav">

            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <div style="padding: 2rem 0;text-align: center;">
                      <a href="/adm/kanta/student_add.php">
                        <img src="/img/logo.png" style="width: 80%;"/>
                      </a>
                    </div>


                    <div class="sb-sidenav-menu">
                        <div class="nav">





                          <?

                          function print_menu1($key, $no='')
                          {
                              global $menu;

                              $str = print_menu2($key, $no);

                              return $str;
                          }

                          function print_menu2($key, $no='')
                          {
                              global $menu, $auth_menu, $is_admin, $auth, $g5, $sub_menu, $member;


                              for($i=1; $i<count($menu[$key]); $i++)
                              {

                                if($member['mb_level'] == 10){
                                  if ($is_admin != 'super' && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], 'r'))){
                                      continue;
                                  }

                                  if (($menu[$key][$i][4] == 1 && $gnb_grp_style == false) || ($menu[$key][$i][4] != 1 && $gnb_grp_style == true)){
                                    $gnb_grp_div = 'gnb_grp_div';
                                  }
                                  else{
                                    $gnb_grp_div = '';
                                  }

                                  if ($menu[$key][$i][4] == 1){
                                    $gnb_grp_style = 'gnb_grp_style';
                                  }
                                  else{
                                    $gnb_grp_style = '';
                                  }

                                  $current_class = '';

                                  if ($menu[$key][$i][0] == $sub_menu){
                                      $current_class = ' on';
                                  }



                                  $str .= "<a class='nav-link sd' data-menu='".$menu[$key][$i][0]."' href='".$menu[$key][$i][2]."'><div class='sb-nav-link-icon' style='margin-left: -18px;'><img src='/img/list_icon_g.png' style=''/></div>".$menu[$key][$i][1]."</a>";


                                  $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
                                }
                                else if($member['mb_level'] == 8){

                                  if($menu[$key][$i][1] == "제휴점 목록" || $menu[$key][$i][1] == "에디터 리뷰관리" || $menu[$key][$i][1] == "리뷰관리" || $menu[$key][$i][1] == "에디터 리플관리" || $menu[$key][$i][1] == "리플관리"  || $menu[$key][$i][1] == "1:1문의"){
                                  /*
                                    if ($is_admin != 'super' && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], 'r'))){
                                        continue;
                                    }
                                    */
                                    if (($menu[$key][$i][4] == 1 && $gnb_grp_style == false) || ($menu[$key][$i][4] != 1 && $gnb_grp_style == true)){
                                      $gnb_grp_div = 'gnb_grp_div';
                                    }
                                    else{
                                      $gnb_grp_div = '';
                                    }

                                    if ($menu[$key][$i][4] == 1){
                                      $gnb_grp_style = 'gnb_grp_style';
                                    }
                                    else{
                                      $gnb_grp_style = '';
                                    }

                                    $current_class = '';

                                    if ($menu[$key][$i][0] == $sub_menu){
                                        $current_class = ' on';
                                    }



                                    $str .= "<a class='nav-link sd' data-menu='".$menu[$key][$i][0]."' href='".$menu[$key][$i][2]."'><div class='sb-nav-link-icon' style='margin-left: -18px;'><img src='/img/list_icon_g.png' style=''/></div>".$menu[$key][$i][1]."</a>";


                                    $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];


                                }
                              }


                              }



                              return $str;
                          }


                          ?>





                          <?
                          //사이드바 메뉴 출력하는곳


                            $jj = 1;
                            foreach($amenu as $key=>$value) {



                              if($member['mb_level'] == 8){
                                if($menu['menu'.$key][0][1] == "제휴점 관리" || $menu['menu'.$key][0][1] == "문의관리" || $menu['menu'.$key][0][1] == "리뷰 관리"){

                                  $img_src = menu_img_src($menu['menu'.$key][0][1]);
                                  $state = menu_background($_SERVER['REQUEST_URI']);
                          ?>

                          <!--<div class="sb-sidenav-menu-heading">Interface</div>-->
                            <a class="nav-link collapsed <?=$state?> slidedown<?= (intval($jj)-1)?>"  href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                              <div class="sb-nav-link-icon" style="margin-left:-10px;"><img src="<?=$img_src?>" /></div>
                                <?
                                      echo $menu['menu'.$key][0][1];
                                ?>
                            <!--
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            -->


                            </a>

                            <div class="collapse slidedown<?= (intval($jj)-1)?>" id="collapseLayouts"  aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                      <?php echo print_menu1('menu'.$key, 1); ?>
                                </nav>
                            </div>

                          <?

                                }
                              }
                              else if($member['mb_level'] == 10){

                                $img_src = menu_img_src($menu['menu'.$key][0][1]);
                                $state = menu_background($_SERVER['REQUEST_URI'], $menu['menu'.$key][0][1]);


                                //echo $_SERVER['REQUEST_URI'];

                          ?>

                            <a class="nav-link collapsed <?=$state?> slidedown<?= (intval($jj)-1)?>"  href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                              <div class="sb-nav-link-icon" style="margin-left:-10px;"><img src="<?=$img_src?>" /></div>
                                <?
                                  echo $menu['menu'.$key][0][1];
                                ?>
                            <!--
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            -->

                            </a>

                            <div class="collapse slidedown<?= (intval($jj)-1)?>" id="collapseLayouts"  aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                      <?php echo print_menu1('menu'.$key, 1); ?>
                                </nav>
                            </div>


                          <?
                              }
                          ?>


                          <?
                                 $jj++;
                          }//foreach 문 끝
                          ?>





                          <!--  2단 사이드바 메뉴
                          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                              Pages
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                          </a>
                          <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                      Authentication
                                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                  </a>
                                  <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                      <nav class="sb-sidenav-menu-nested nav">
                                          <a class="nav-link" href="login.html">Login</a>
                                          <a class="nav-link" href="register.html">Register</a>
                                          <a class="nav-link" href="password.html">Forgot Password</a>
                                      </nav>
                                  </div>
                                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                      Error
                                      <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                  </a>
                                  <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                      <nav class="sb-sidenav-menu-nested nav">
                                          <a class="nav-link" href="401.html">401 Page</a>
                                          <a class="nav-link" href="404.html">404 Page</a>
                                          <a class="nav-link" href="500.html">500 Page</a>
                                      </nav>
                                  </div>
                              </nav>
                          </div>

                          -->

                    </div>


                    <div style="padding: 0.5rem 1rem;">
                      <ul class="navbar-nav ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000;text-align: right;"><i class="fas fa-user fa-fw"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                              <!--
                                <div class="dropdown-divider"></div>
                              -->
                                <a class="dropdown-item" href="<?php echo G5_BBS_URL ?>/logout.php">Logout</a>

                            </div>
                        </li>
                      </ul>
                    </div>

                </nav>
            </div>








<!--
<div id="to_content"><a href="#container">본문 바로가기</a></div>

<header id="hd">
    <h1><?php echo $config['cf_title'] ?></h1>
    <div id="hd_top">
        <button type="button" id="btn_gnb" class="btn_gnb_close <?php echo $adm_menu_cookie['btn_gnb'];?>">메뉴</button>
       <div id="logo"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>"><img src="<?php echo G5_ADMIN_URL ?>/img/logo.png" alt="<?php echo get_text($config['cf_title']); ?> 관리자"></a></div>


    </div>


</header>

-->



              <div id="layoutSidenav_content_child" class="layout_content">
