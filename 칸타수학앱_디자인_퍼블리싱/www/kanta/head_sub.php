<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />

    <title>칸타수학</title>

    <link href="css/common.css" rel="stylesheet" />
    <link href="css/style.css?i=<?=$ranum?>" rel="stylesheet" />
    <link href="css/classes.min.css" rel="stylesheet" />



    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">


    <link href="/kanta/css/datatable/datatable_responsive.css?i=<?=$ranum?>" rel="stylesheet" />
    <link href="/kanta/css/datatable/datatable.css?i=<?=$ranum?>" rel="stylesheet" />


    <link href="/kanta/css/jquery_ui/jquery_ui.css?version=<?=$randomNum?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

    <script src="/kanta/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/4b794d3be7.js" crossorigin="anonymous"></script>
    <script src="./js/masonry/masonry.js"></script>
    <script src="./js/swal/swal.js"></script>


    <script src="/kanta/common_js/function.js?i=<?=$ranum?>"></script>

    <script src="/kanta/js/datatable/datatable.js"></script>

    <script src="/kanta/js/datatable/datatable_responsive.js"></script>
    <script src="/kanta/js/datatable/datatable_fixheader.js"></script>
    <script src="/kanta/js/jquery/jquery_ui.js"></script>

    <script src="./js/clipboard/clipboard.js"></script>

    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.879.0.min.js"></script>
    <script>
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

        var rs = year+"-"+month+"-"+date+" "+hours+":"+minutes+":"+seconds;

        return rs;
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


    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=yes">

  </head>
  <style>
  @media( orientation: portrait ){
    html {
      transform: rotate(-90deg) translate(-50%, -50%);
      transform-origin: top left;
      position: absolute;
      top: 50%;
      left: 35%;
      width: 100vh;
      height: 100vw;
    }
  }
</style>


<div class="loading_div">
    <img src="/kanta/img/loading.gif"/>
</div>
