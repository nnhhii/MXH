<?php
$sql_story = "SELECT * FROM story 
left JOIN user ON story.user_id = user.user_id
LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = story.user_id) OR (friendrequest.sender_id = story.user_id AND friendrequest.receiver_id = $user_id)
WHERE status='bạn bè' OR story.user_id=$user_id ORDER BY story_id DESC";
$result_story = $ketnoi->query($sql_story);
?>
<link rel="stylesheet" href="css/menu.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<style>
#openModalBtn {
  padding-top:50%;
  width:145px;
  background: none;
  border: none;
  color:#777777;
  font-size:40px;
  cursor: pointer
}
    .form-container {
        max-width: 500px;
        margin: 0 auto;
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 5px;
    }

    .form-container label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .form-container input[type="text"],
    .form-container textarea,
    .form-container input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    .form-container textarea {
        resize: vertical;
        height: 100px;
    }

    .form-container input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 4px;
    }

    .form-container input[type="submit"]:hover {
        background-color: #45a049;
    }

    .form-container .file-inputs-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .form-container .file-inputs-container input[type="file"] {
        flex: 1;
    }
    .story {
        position: relative;
        display: inline-block;
        margin: 20px;
        width: 145px;
        height: 220px;
        overflow: hidden; 
    }

    
    video::-webkit-media-controls-enclosure {
        display: none !important;
    }
    .vien_ava_story {
        position: absolute;
        top: 5px; 
        left: 5px;
        z-index: 1; 
    }

    .ten_story {
        margin-top: 10px
    }

.modal_post_story {
  display: none; 
  position: fixed; 
  z-index: 2;
  top:0;
  left:0;
  width:100%;
  height: 100%;
  overflow: auto; 
  background-color: rgba(0,0,0,0.4);
  border:none
}

.modal-contentt {
  background-color: #fefefe;
  margin: 5% auto; 
  width: 500px; 
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}
.close:hover{
  color: #000;
}
.layout_story::-webkit-scrollbar {
  display: none; /* Safari và Chrome */
}
</style>
  <div class="gop_2_menu">
    <div class="menu_giua">
      <div class="layout_menu_giua">
        <div class="layout_story" style="overflow:auto">
          <div class="stories-container">
            <div class="story">
            
              <button id="openModalBtn"><i class="fa-solid fa-circle-plus" style="object-fit: cover"></i></button>
              <div id="myModal" class="modal_post_story">
                <div class="modal-contentt">
                  <span id="closeModalBtn" class="close">&times;</span>
                  <div class="form-container">
                    <form action="story/upload.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="story_by" value=<?php echo $user_id?>>
                      <label for="content">Content:</label><br>
                      <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>
                      
                      <label for="video">Select Video:</label>
                      <input type="file" id="video,img" name="file" accept="video/mp4,video/x-m4v,video/*,image/png,image/jpg,image/*" required><br><br>
                      
                      <label for="music">Select Music:</label>
                      <input type="file" id="music" name="music" accept="audio/mp3,audio/*,audio/m4a"><br><br>
                      
                      <input type="submit" value="Submit" name="submit">
                    </form>
                  </div>
                </div>
              </div>                    
            </div>

            <?php 
            while ($row_story = $result_story->fetch_assoc()) { 
              $file = $row_story["file"];
              echo'<a href="#modal_story_'.$row_story["story_id"].'" data-toggle="modal"class="story" style="border:none;padding:0;margin:0 2px">';
                if (strpos($file, '.png')|| strpos($file, '.jpg')|| strpos($file, '.jpeg')) {
                  echo '<div class="story" style="background-image:url(story/'.$file.')"></div>';
                } else{ 
                  echo '<video class="story"  muted style="z-index:0;width: 100%;height: 100%;object-fit: cover;">
                        <source src="story/'.$file.'" type="video/mp4">    
                      </video>';
                }?>
                <div class="vien_ava_story">
                  <div class="ava_story" style="background-image: url('img/<?php echo $row_story["avartar"] ?>');"></div>
                </div>
                <div class="ten_story">
                  <?php echo $row_story["username"] ?>
                </div>
              </a> 
                <!-- Modal story -->
                <div class="modal fade" id="modal_story_<?php echo $row_story["story_id"]?>" data-toggle="modal" data-storyid="<?php echo $row_story["story_id"] ?>" onclick="muteAudio(this)">
                  <div class="modal-dialog">
                    <div class="modal-content" style="z-index:2;width:450px;height:650px;border-radius:20px;background:none;padding:0">
                      <div class="modal-body" style="padding:0;position:relative;background:black;border-radius:20px;">
                        <div class="vien_ava_story"><div class="ava_story" style="background-image: url('img/<?php echo $row_story["avartar"] ?>');"></div></div>
                        <div class="ten_story" style="top:10px;left:60px;z-index:1"><?php echo $row_story["username"] ?></div>
                        <?php 
                        if (strpos($file, '.png')|| strpos($file, '.jpg')|| strpos($file, '.jpeg')) {
                          echo '<div class="image" style="background-image:url(story/'.$file.');width:100%;height:650px;border-radius:20px;background-size:cover"></div>';
                        } else{ 
                          echo '<video class="video"  muted loop autoplay style="width:450px;height:650px;border-radius:20px;">
                                <source src="story/'.$file.'" type="video/mp4">    
                              </video>';
                        }
                        ?>
                        
                        <audio id="audio_<?php echo $row_story["story_id"]?>" loop>
                          <source src="story/<?php echo $row_story["music"]?>" type="audio/mpeg">
                        </audio>

                        <div style="position:absolute;left:50px;bottom:20px;color:white"><?php echo $row_story["content"] ?></div>
                        <button style="position:absolute;right:50px;bottom:20px;border:none;background:none;scale:2;color:white"><i class="fa fa-heart" aria-hidden="true"></i></button>

                        </div>
                    </div>
                  </div>
                </div>

            <?php } ?>
          </div>
          
        </div>
        <form action="" enctype="multipart/form-data" method="post" class="form">
          <div class="vien">
            <div class="avatar" style="background-image:url('img/<?php echo $row_id["avartar"] ?>')"></div>
            <button type="button" class="thanhdangbaiviet" data-bs-toggle="modal" data-bs-target="#exampleModal"
              data-bs-whatever="@mdo">Đăng bài viết </button>
            <hr>
            <div class="menunho">
              <button>
                <i class="fa-regular fa-image" style="color: #2ecc71;"></i> Hình ảnh
              </button>
              <button id="button-menu1">
                <i class="fa-solid fa-video" style="color: #ff0000"></i> Video
              </button>
            </div>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
              style="position:absolute;right:20px;top:20px;color:white"><i class="fa-solid fa-xmark"
                style="scale:2"></i></button>
            <div class="modal-dialog" style="margin:5% 23%">
              <div class="modal-content" style=" width:115vh; height:80vh; border-radius:10px">
                <div class="modal-header" style="padding:25px">
                  <h1 class="modal-title fs-5" id="exampleModalLabel"
                    style="position:absolute;left:42%;padding:10px;text-align:center;">Bài đăng mới</h1>
                  <input type="submit" name="btn_submit" value="Đăng"
                    style="background:none;color: #0099FF; padding: 10px 20px;border:none;position:absolute;right:0">
                </div>
                <div class="modal-body" style="padding:0">
                  <!-- ảnh lớn  -->
                  <div id="imagePreview" style="float:left;width:60%;height:71.5vh;overflow:hidden">
                    <div id="content1" style="margin:30% 0;width:100%;text-align:center;padding:20px">
                      <input type="hidden" name="post_by" value=<?php echo $user_id ?>>
                      <img src="https://cdn-icons-png.flaticon.com/512/13768/13768311.png" width="90px"><br> Chọn ảnh
                      hoặc video
                      <br>
                      <input type="file" name="images[]" class="hinhanh" style="margin: 20px 30%" multiple accept="image/*" required
                        onchange="handleFile(this)">
                    </div>
                  </div>
                  <div style="width:40%;height:100%;float:right; border-left:1px solid #EEEEEE">
                    <div style="padding:10px;height:60px">
                      <div
                        style="background-image:url('img/<?php echo $row_id["avartar"] ?>'); background-size:cover;width:35px; height:35px; border-radius: 50%;float:left">
                      </div>
                      <label style="float:left; margin:1% 2%">
                        <?php echo $row_id["username"] ?>
                      </label>
                      <select name="statuss">
                        <option value="public">Công khai</option>
                        <option value="friend">Bạn bè</option>
                        <option value="only_me">Chỉ mình tôi</option>
                      </select>
                    </div>
                    <textarea style="width:100%;border:none; height:5em;padding:0 20px;resize: none;" name="content"
                      placeholder="Nội dung..."></textarea>
                    <div id="content2" style="width:100%;padding:20px;display:none">
                      <img src="https://cdn-icons-png.flaticon.com/512/1042/1042339.png" width="30px">Thêm ảnh hoặc
                      video<br>
                      <input type="file" name="images[]" class="hinhanh" style="margin: 10px" multiple accept="image/*"
                        onchange="handleFile(this)">
                    </div>
                    <!-- ảnh nhỏ -->
                    <div id="imagePreview2" style="width:100%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <?php require 'dangbaiviet/posts_xuly.php'; ?>
      </div>
    </div>
  </div>


<script>
$(document).ready(function() {
  $('.modal').on('shown.bs.modal', function () {
      $(this).find('audio')[0].play();
  });

  $('.modal').on('hidden.bs.modal', function () {
    var audio = $(this).find('audio')[0];
    audio.pause();
    audio.currentTime = 0; // Reset audio về thời điểm ban đầu
  });

  
});
function muteAudio(modal) {
  var audioId = modal.getAttribute("data-storyid");
  var audio = document.getElementById("audio_" + audioId);
  audio.stop = true; // Mute audio khi modal được đóng
}


  function handleFile(input) {
    checkFileSize(input);
    previewImages(input);
    var content1 = document.getElementById("content1");
    var content2 = document.getElementById("content2");
    // Ẩn vs hiện
    content1.style.display = "none";
    content2.style.display = "block";
  }

  function previewImages(input) {
    var files = input.files;
    var imagePreview = document.getElementById("imagePreview");
    var imagePreview2 = document.getElementById("imagePreview2");

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      if (!file.type.match('image.*')) {
        continue;
      }
      var imageUrl = URL.createObjectURL(file);
      (function (imageUrl) {
        // Tạo largeImage và smallImage
        var largeImage = document.createElement("div");
        largeImage.style.width = "50vh";
        largeImage.style.height = "73vh";
        largeImage.style.margin = "0 auto";
        largeImage.style.backgroundImage = "url('" + imageUrl + "')";
        largeImage.style.backgroundSize = "cover";
        imagePreview.appendChild(largeImage);

        var smallImage = document.createElement("div");
        smallImage.style.width = "10vh";
        smallImage.style.height = "10vh";
        smallImage.style.margin = "5px 0 0 5px";
        smallImage.style.filter = "brightness(70%)";
        smallImage.style.float = "left";
        smallImage.style.cursor = "pointer";
        smallImage.style.backgroundImage = "url('" + imageUrl + "')";
        smallImage.style.backgroundSize = "cover";
        smallImage.style.backgroundPosition = "center";
        smallImage.style.position = "relative";
        imagePreview2.appendChild(smallImage);

        var closeButton = document.createElement("div");
        closeButton.innerHTML = "&#10006;";
        closeButton.style.color = "white";
        closeButton.style.position = "absolute";
        closeButton.style.top = "0";
        closeButton.style.right = "0";
        closeButton.style.cursor = "pointer";
        closeButton.style.fontSize = "15px";
        closeButton.addEventListener("click", function () {
          if (imagePreview.contains(largeImage)) {
            imagePreview.removeChild(largeImage);
            imagePreview2.removeChild(smallImage);
          }
        });
        smallImage.appendChild(closeButton);

        smallImage.addEventListener("click", function () {
          largeImage.style.backgroundImage = "url('" + imageUrl + "')";
          largeImage.scrollIntoView({ behavior: "auto", block: "center" });

          var allSmallImages = imagePreview2.querySelectorAll("div");
          allSmallImages.forEach(function (smallImg) {
            smallImg.style.filter = "brightness(70%)";
          });
          this.style.filter = "brightness(110%)";
        });
      })(imageUrl);
    }
  }


  function checkFileSize(input) {
    var files = input.files;

    for (var i = 0; i < files.length; i++) {
      var fileSize = files[i].size;
      var minSize = 50 * 1024;

      if (fileSize < minSize) {
        alert('Kích thước của ảnh phải lớn hơn 50kB.');
        input[typefile].value = '';
        return false;
      }
    }
    return true;
  }


</script>

<script>
var modal = document.getElementById("myModal");
var btn = document.getElementById("openModalBtn");
var close = document.getElementById("closeModalBtn");
btn.onclick = function() {
    modal.style.display = "block";
}
close.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
