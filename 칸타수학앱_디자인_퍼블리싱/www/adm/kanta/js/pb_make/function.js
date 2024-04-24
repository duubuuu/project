function sleep(ms) {
  return new Promise((r) => setTimeout(r, ms))
}



function date_rs(){
  var today = new Date();

  var year = today.getFullYear(); // 년도
  var month = ("0" + (today.getMonth() + 1)).slice(-2);
  var date = ("0" + today.getDate()).slice(-2);
  var day = ("0" + today.getDay()).slice(-2);  // 요일
  var hours = ("0" + today.getHours()).slice(-2); // 시
  var minutes = ("0" + today.getMinutes()).slice(-2);  // 분
  var seconds = ("0" + today.getSeconds()).slice(-2);  // 초
  var milliseconds = ("0" + today.getMilliseconds()).slice(-2); // 밀리초

  var rs = year+""+month+""+date+""+hours+""+minutes+""+seconds;

  return rs;
}




function generaterandomstring(num){

  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
  var string_length = num;
  var randomstring = '';
  for (var i=0; i<string_length; i++) {
    var rnum = Math.floor(Math.random() * chars.length);
    randomstring += chars.substring(rnum,rnum+1);
  }
  //document.randform.randomfield.value = randomstring;
  return randomstring;

}
