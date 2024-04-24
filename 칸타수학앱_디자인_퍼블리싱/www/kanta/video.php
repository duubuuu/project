
<link rel="stylesheet" href="./css/pb_make/pb_make.css?i=<?=$ranum?>">
<style media="screen">
  .player:hover .progress {height: 5px;}
  .progress__filled {background: #f36063;}
    .progress {background: #ffffff;}
</style>



<div class="video_form">


<div class="player_table_div flex">

  <div class="player">

    <!--<video class="player__video viewer" src="./652333414.mp4"></video>-->
    <video class="player__video viewer" src="https://s3.ap-northeast-2.amazonaws.com/kantatest/lec_vid/20210405135816" style="width:100%; min-height:350px;"></video>



    <div class="player__controls">
      <div class="progress">
        <div class="progress__filled"></div>

      </div>
      <button class="player__button toggle" title="Toggle Play">►</button>
      <input type="range" name="volume" class="player__slider" min="0" max="1" step="0.05" value="1">

      <button data-skip="-10" class="player__button">« 10s</button>
      <button data-skip="25" class="player__button">25s »</button>


      <span class="now_duration"></span>
      <span class="all_duration"></span>

    </div>


  </div>






</div>

<!-- <video class="" controls src="https://s3.ap-northeast-2.amazonaws.com/kantatest/lec_vid/20210405135816" style="width:600px; min-height:350px;margin-top:100px;"></video> -->






<script src="https://sdk.amazonaws.com/js/aws-sdk-2.879.0.min.js"></script>
<script>

var albumBucketName = "kantatest";
var bucketRegion = "ap-northeast-2";
var IdentityPoolId = "ap-northeast-2:d12971a9-4bd0-40b7-915b-1dfb8543bd18";

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







let video_code = "";
let video_duration = "";



$(document).on('click', ".video_url, .img_url", function(){

  var clas = $(this).attr("class");

  if(clas == "video_url"){

    var url = $(this).data("url");
    $(".viewer").attr("src", url);
    video_code = $(this).data("video_code");

    console.log(video_code);

    if(question_list != null){
      question_list.destroy();
    }

    q_list(video_code);





  }

  else if(clas == "img_url"){
    var url = $(this).data("url");

    //$(".img_preview").attr("src", url);
  }
});
</script>


<script src="./js/pb_make/pb_aws.js"></script>
<script src="./js/pb_make/pb_make.js?i=<?=$ranum?>"></script>
<script src="./js/pb_make/pb_make_input.js?i=<?=$ranum?>"></script>
<script src="./js/pb_make/pb_event.js?i=<?=$ranum?>"></script>

<?

include_once(G5_PATH.'/tail.sub.php');
?>
