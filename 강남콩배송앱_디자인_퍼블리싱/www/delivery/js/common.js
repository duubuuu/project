function all_ck(my){
  $(".ck_od_idx").each(function(item){
    this.checked = $(my).is(":checked");
  })
}


function add_bookmark(){
  let member_name = $("#member_name").val();
  let member_hp = $("#member_hp").val();
  let address1 = $("#address1").val()+" "+$("#address1_1").val();
  let zip_code = $("#zip_code").val();
  let bo_memo = $("#bo_memo").val();
  let lng = $("#lng").val();
  let lat = $("#lat").val();
  let mb_id = $("#mb_id").val();

  let data_list = {
    member_name:member_name,
    member_hp:member_hp,
    mb_id:mb_id,
    address1:address1,
    zip_code:zip_code,
    bo_memo:bo_memo,
    lng:lng,
    lat:lat,
    work_mode:'add_bookmark'
  }

  $.ajax({
    url: "/delivery/proc.php",
    type: "post",
    async: false,
    data: data_list,
    success:function(res){
      if(res!='ok'){
        alert(res)
      }else {
        alert("즐겨찾기에 등독되었습니다.")
        location.href='/delivery/add_order.php';
      }
    }
  });
}

function add_order(){
  let member_name = $("#member_name").val();
  let member_hp = $("#member_hp").val();
  let address1 = $("#address1").val()+" "+$("#address1_1").val();
  let zip_code = $("#zip_code").val();
  let bo_memo = $("#bo_memo").val();
  let lng = $("#lng").val();
  let lat = $("#lat").val();
  let mb_id = $("#mb_id").val();

  let data_list = {
    member_name:member_name,
    member_hp:member_hp,
    mb_id:mb_id,
    address1:address1,
    zip_code:zip_code,
    bo_memo:bo_memo,
    lng:lng,
    lat:lat,
    work_mode:'add_order'
  }

  $.ajax({
    url: "/delivery/proc.php",
    type: "post",
    async: false,
    data: data_list,
    success:function(res){
      if(res!='ok'){
        alert(res)
      }else {
        alert("배송지에 추가되었습니다.");
        location.href='/delivery/list_before_picked.php';
      }
    }
  });
}


function picking_update(od_picking_con,od_idx){
  let od_box = $("#od_box"+od_idx).val();
  let data_list = {
    od_picking_con:od_picking_con,
    od_idx:od_idx,
    od_box:od_box,
    work_mode:'picking_update'
  }
  $.ajax({
    url: "/delivery/proc.php",
    type: "post",
    async: false,
    data: data_list,
    success:function(res){
      $("#detail_li"+od_idx).remove();
    }
  });
}
function picking_update_all(){
  let i = 0;
  $('.ck_od_idx').each(function(idx,item){
    let od_idx = $(item).val();
    if($('#ck_'+od_idx).is(":checked")){
      i++;
      picking_update('200',od_idx);
    }
  });
  if(i == 0){
    alert('주문을 선택 후 피킹완료 해주세요');
    $(".popup").hide();
    $(".black_overlay").hide();
    return false;
  }
  alert(i+"건이 변경되었습니다.");
  $(".popup").hide();
  $(".black_overlay").hide();
}

function add_order_bookmark_all(){
  let i = 0;
  $('.bookmark').each(function(idx,item){
    let bo_idx = $(item).val();
    if($('#bookmark_ck'+bo_idx).is(":checked")){
      let data_list = {
        bo_idx:bo_idx,
        work_mode:'add_order_bookmark'
      }
      $.ajax({
        url: "/delivery/proc.php",
        type: "post",
        async: false,
        data: data_list,
        success:function(res){
          console.log(res);
        }
      });
      i++;
    }

  });
  if(i == 0){
    alert('즐겨찾기를 선택 후 배송지추가 해주세요');
    $(".popup").hide();
    $(".black_overlay").hide();
    return false;
  }
  alert(i+"건이 등록되었습니다.");
  location.href = '/delivery/list_before_picked.php';
}
function oreder_com(od_idx){
  $(".black_overlay").css("display", "block");
  $(".popup").css({"display":"flex", "flex-direction":"column", "align-items":"center"});
  $("#od_idx").val(od_idx);
  // $(this).addClass('on');
  // $(this).text("배송완료");

}

function picking_update_cancel(){
  let i = 0;
  $('.ck_od_idx').each(function(idx,item){
    let od_idx = $(item).val();
    if($('#ck_'+od_idx).is(":checked")){
      i++;
      picking_update('100',od_idx);
    }
  });
  if(i == 0){
    alert('주문을 선택 후 피킹취소 해주세요');
    $(".popup").hide();
    $(".black_overlay").hide();
    return false;
  }
  alert(i+"건이 변경되었습니다.");
  $(".popup").hide();
  $(".black_overlay").hide();
}
function date_select(my){
  let date_select_val = $(my).val();
  location.href = '/delivery/delivery_completed_list.php?date_select='+date_select_val;
}
function ga_order_item(order_id) {
  let data_list = {
    order_id:order_id,
    work_mode:'ga_order_item'
  }
  $(".order_num").html("주문번호 "+order_id);
  $(".black_overlay").css("display", "block");
  $(".more_popup").css({"display":"block", "flex-direction":"column", "align-items":"center"});
  let html_txt = "";
  $.ajax({
    url: "/delivery/proc.php",
    type: "post",
    async: false,
    data: data_list,
    success:function(res){
      let res_json = JSON.parse(res);
      console.log(res_json);
      for (var i = 0; i < res_json.length; i++) {
        res_json[i].product_name
        html_txt +='<div class="flex">';
        html_txt +='<div class="left">';
        html_txt +='<a href="https://gangnamkong.co.kr/product/detail.html?product_no='+res_json[i].product_no+'" target="_blank">';
        html_txt +='<span class="product_name">'+res_json[i].product_name+'</span>';
        html_txt +='</a>';
        html_txt +='</div>';
        html_txt +='<div class="right">';
        html_txt +='<span class="quantity">'+res_json[i].quantity+'</span>';
        html_txt +='</div>';
        html_txt +='</div>';
      }
      $("#product_list").html(html_txt);
    }
  });
}
