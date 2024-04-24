<?


include_once('../../common.php');


$uploadBase = G5_PATH."/go/upload_img/affiliate_review/";

/* 리뷰 템프 이미지 삭제 */
$remove_sql = "select * from shop_aff_review_temp";
$remove_rs = sql_query($remove_sql);


while($remove_row = sql_fetch_array($remove_rs)){
    db_img_remove("review_img_name", $remove_row);

    $delete_sql = "delete from shop_aff_review_temp where num = '{$remove_row['num']}'";
    sql_query($delete_sql);
}




/* 1:1문의 템프 이미지 삭제 */
$uploadBase = G5_PATH."/go/upload_img/one_on_one/";


$remove_sql = "select * from company_qa_temp";
$remove_rs = sql_query($remove_sql);


while($remove_row = sql_fetch_array($remove_rs)){
    db_img_remove("img_name", $remove_row);

    $delete_sql = "delete from company_qa_temp where num = '{$remove_row['num']}'";
    sql_query($delete_sql);
}




/* 상점 문의 템프 이미지 삭제 */
$uploadBase = G5_PATH."/go/upload_img/shop_qa/";


$remove_sql = "select * from shop_qa_temp";
$remove_rs = sql_query($remove_sql);


while($remove_row = sql_fetch_array($remove_rs)){
    db_img_remove("img_name", $remove_row);

    $delete_sql = "delete from shop_qa_temp where num = '{$remove_row['num']}'";
    sql_query($delete_sql);
}



/* 제휴신청 템프 이미지 삭제 */
$uploadBase = G5_PATH."/go/upload_img/apply_affiliate/";


$remove_sql = "select * from shop_entrance_temp";
$remove_rs = sql_query($remove_sql);


while($remove_row = sql_fetch_array($remove_rs)){
    db_img_remove("img_name", $remove_row);

    $delete_sql = "delete from shop_entrance_temp where num = '{$remove_row['num']}'";
    sql_query($delete_sql);
}





?>
