<?php
$menu['menu100'] = array (
    array('100000', '환경설정', '/adm/config_form.php',   'config'),
    array('100100', '기본환경설정', '/adm/config_form.php',   'cf_basic'),
    array('100200', '관리권한설정', '/adm/auth_list.php',     'cf_auth'),
    array('100280', '테마설정', '/adm/theme.php',     'cf_theme', 1),
    array('100290', '메뉴설정', '/adm/menu_list.php',     'cf_menu', 1),
    array('100300', '메일 테스트', '/adm/sendmail_test.php', 'cf_mailtest'),
    array('100310', '팝업레이어관리', '/adm/newwinlist.php', 'scf_poplayer'),
    array('100800', '세션파일 일괄삭제','/adm/session_file_delete.php', 'cf_session', 1),
    array('100900', '캐시파일 일괄삭제','/adm/cache_file_delete.php',   'cf_cache', 1),
    array('100910', '캡챠파일 일괄삭제','/adm/captcha_file_delete.php',   'cf_captcha', 1),
    array('100920', '썸네일파일 일괄삭제','/adm/thumbnail_file_delete.php',   'cf_thumbnail', 1),
    array('100500', 'phpinfo()',        '/adm/phpinfo.php',       'cf_phpinfo')
);

if(version_compare(phpversion(), '5.3.0', '>=') && defined('G5_BROWSCAP_USE') && G5_BROWSCAP_USE) {
    $menu['menu100'][] = array('100510', 'Browscap 업데이트', '/adm/browscap.php', 'cf_browscap');
    $menu['menu100'][] = array('100520', '접속로그 변환', '/adm/browscap_convert.php', 'cf_visit_cnvrt');
}

$menu['menu100'][] = array('100410', 'DB업그레이드', '/adm/dbupgrade.php', 'db_upgrade');
$menu['menu100'][] = array('100400', '부가서비스', '/adm/service.php', 'cf_service');

$menu['menu100'][] = array('100400', '부가', '/adm/service.php', 'cf_service');
?>
