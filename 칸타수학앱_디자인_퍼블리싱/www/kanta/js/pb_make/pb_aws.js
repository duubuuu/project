function listAlbums() {
  s3.listObjects({ Delimiter: "/" }, function(err, data) {
    if (err) {
      return alert("There was an error listing your albums: " + err.message);
    } else {
      var albums = data.CommonPrefixes.map(function(commonPrefix) {
        var prefix = commonPrefix.Prefix;
        var albumName = decodeURIComponent(prefix.replace("/|"));
        return getHtml([
          "<li>",
          "<span onclick=\"deleteAlbum('" + albumName + "')\">X</span>",
          "<span onclick=\"viewAlbum('" + albumName + "')\">",
          albumName,
          "</span>",
          "</li>"
        ]);
      });
      var message = albums.length
      ? getHtml([
        "<p>Click on an album name to view it.</p>",
        "<p>Click on the X to delete the album.</p>"
      ])
      : "<p>You do not have any albums. Please Create album.";
      var htmlTemplate = [
        "<h2>Albums</h2>",
        message,
        "<ul>",
        getHtml(albums),
        "</ul>",
        "<button onclick=\"createAlbum(prompt('Enter Album Name:'))\">",
        "Create New Album",
        "</button>"
      ];
      document.getElementById("app").innerHTML = getHtml(htmlTemplate);
    }
  });
}




function createAlbum(albumName) {
  albumName = albumName.trim();
  if (!albumName) {
    return alert("Album names must contain at least one non-space character.");
  }
  if (albumName.indexOf("/") !== -1) {
    return alert("Album names cannot contain slashes.");
  }
  var albumKey = encodeURIComponent(albumName);
  s3.headObject({ Key: albumKey }, function(err, data) {
    if (!err) {
      return alert("Album already exists.");
    }
    if (err.code !== "NotFound") {
      return alert("There was an error creating your album: " + err.message);
    }
    s3.putObject({ Key: albumKey }, function(err, data) {
      if (err) {
        return alert("There was an error creating your album: " + err.message);
      }
      alert("Successfully created album.");
      viewAlbum(albumName);
    });
  });
}





function vidAlbum(albumName) {
  var albumimgsKey = encodeURIComponent(albumName) + "/";
  s3.listObjects({ Prefix: albumimgsKey }, function(err, data) {
    if (err) {
      return alert("There was an error viewing your album: " + err.message);
    }
    // 'this' references the AWS.Response instance that represents the response
    var href = this.request.httpRequest.endpoint.href;
    var bucketUrl = href + albumBucketName + "/";


  });
}





function addimg(albumName) {

  $(".loading_div").css("display","block");

  var files = document.getElementById("img_input").files;

  if (!files.length) {
    return alert("Please choose a file to upload first.");
  }

  var file = files[0];

  if(!file.name.match(/.*\.jpg|.*\.jpeg|.*\.png|.*\.gif/i)){
    alert("이미지 형식에 맞지않은 파일이 들어가있습니다. png, jpg, jpeg, gif 파일만 올려주십시오.");
    return;
  }

  var fileName = year+""+month+""+date+""+hours+""+minutes+""+seconds;
  var albumimgsKey = encodeURIComponent(albumName) + "/";

  var imgKey = albumimgsKey + fileName;

  // Use S3 ManagedUpload class as it supports multipart uploads
  var upload = new AWS.S3.ManagedUpload({
    params: {
      Bucket: albumBucketName,
      Key: imgKey,
      Body: file
    }
  });

  var promise = upload.promise();

  promise.then(
    function(data) {

      console.log(JSON.stringify(data));



        var imgKey = data.Key;
        var imgUrl = bucketUrl + encodeURIComponent(imgKey);

        var img_name = fileName;
        var img_size = data.Size;
        var img_path = bucketUrl + encodeURIComponent(albumName) + "/";


        var formdata = new FormData();

        formdata.append("img_name", img_name);
        formdata.append("img_path", img_path);
        formdata.append("img_size", img_size);

        $.ajax({
          type:"POST",
          url:"./proc/pb_make/img_save.php",
          data : formdata,
          processData: false,
          contentType: false,
          async : false,

          beforeSend : function(){
            $(".loading_div").css("display","block");
          },

          success: function(data){

            $(".loading_div").css("display","none");

            var data = JSON.parse(data);

            if(data.rs == "success"){

              img_list.ajax.reload();

            }
            else if(data.rs == "fail"){
              alert("등록에 실패하였습니다.");
            }
            else{
              alert("오류가 발생하였습니다.");
            }

          },
          error: function(err) {
            alert("에러");
          }
        });



      },
      function(err) {
        return alert("There was an error uploading your img: ", err.message);
      }
    );


}



/* 비디오 업로드 */

function addvideo(albumName) {

  $(".loading_div").css("display","block");

  var files = document.getElementById("video_input").files;
  if (!files.length) {
    return alert("Please choose a file to upload first.");
  }

  var file = files[0];

  if(!file.name.match(/.*\.avi|.*\.mp4|.*\.wmv|.*\.mov|.*\.ts |.*\.tp |.*\.flv |.*\.3gp |.*\.webp/i)){
    alert("이미지 형식에 맞지않은 파일이 들어가있습니다. avi, mp4, mkv, wmv, mov, ts, tp, flv, 3gp, webp 파일만 올려주십시오.");
    return;
  }

  var fileName = year+""+month+""+date+""+hours+""+minutes+""+seconds;
  var albumvidsKey = encodeURIComponent(albumName) + "/";

  var vidKey = albumvidsKey + fileName;

  // Use S3 ManagedUpload class as it supports multipart uploads
  var upload = new AWS.S3.ManagedUpload({
    params: {
      Bucket: albumBucketName,
      Key: vidKey,
      Body: file
    }
  });

  var promise = upload.promise();

  promise.then(
    function(data) {



        var vidKey = data.Key;
        var vidUrl = bucketUrl + encodeURIComponent(vidKey);

        var vid_name = fileName;
        var vid_size = data.Size;
        var vid_path = bucketUrl + encodeURIComponent(albumName) + "/";

        var formdata = new FormData();

        formdata.append("video_name", vid_name);
        formdata.append("video_path", vid_path);
        formdata.append("video_size", vid_size);

        $.ajax({
          type:"POST",
          url:"./proc/pb_make/vid_save.php",
          data : formdata,
          processData: false,
          contentType: false,
          async : false,

          beforeSend : function(){
            $(".loading_div").css("display","block");
          },

          success: function(data){

            $(".loading_div").css("display","none");

            var data = JSON.parse(data);

            if(data.rs == "success"){

              $(".player__video").attr("src", data.video_path+data.video_name);
              video_list.ajax.reload();

            }
            else if(data.rs == "fail"){
              alert("등록에 실패하였습니다.");
            }
            else{
              alert("오류가 발생하였습니다.");
            }

          },
          error: function(err) {
            alert("에러");
          }
        });



      },
      function(err) {
        return alert("There was an error uploading your video: ", err.message);
      }
    );
}


function deleteimg(albumName, imgKey) {
  s3.deleteObject({ Key: imgKey }, function(err, data) {
    if (err) {
      return console.log("There was an error deleting your img: ", err.message);
    }
    console.log("Successfully deleted img.");

  });
}


function deletevid(albumName, vidKey) {
  s3.deleteObject({ Key: vidKey }, function(err, data) {
    if (err) {
      return console.log("There was an error deleting your vid: ", err.message);
    }
    console.log("Successfully deleted vid.");

  });
}
