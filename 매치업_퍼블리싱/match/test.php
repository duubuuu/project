<?
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include_once("./_common.php");
include_once("./head.php");
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
include_once(G5_LIB_PATH.'/mailer.lib.php');



$mb_nick="admin";
$mb_email = "sasaa3865@naver.com";
$admin_email = "akdongup@gmail.com";

$subject = "asdfasfdasfdsfadasfdasfd";
$content = "asasdasasasas";


mailer("매치업", $admin_email, $mb_email, $subject, $content, 0);

?>
