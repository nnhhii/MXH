<?php
require_once 'posts_connect.php';
$post_id = $_GET['post_id'];
$statuss = $_GET['statuss'];
$sql_show = mysqli_query($conn, "SELECT * FROM posts WHERE post_id=$post_id");
$row_show = mysqli_fetch_assoc($sql_show);

// Lưu trữ các ảnh tạm thời trong session
if (!isset($_SESSION['temp_images'])) {
  $_SESSION['temp_images'] = explode(",", $row_show['image']);
}
// Kiểm tra nếu yêu cầu AJAX được gửi để xóa session
if (isset($_POST['action']) && $_POST['action'] == 'delete_session') {
  unset($_SESSION['temp_images']);
  exit;
}
if (isset($_POST['update_posts'])) {
  $content = $_POST['content'];
  $statuss = $_POST['statuss'];

  // Lấy các ảnh tạm thời từ session
  $temp_images = $_SESSION['temp_images'];

  // Xóa ảnh khỏi mảng tạm thời
  if (!empty($_POST['deleted_images'])) {
    $deleted_images = explode(",", $_POST['deleted_images']);
    $temp_images = array_diff($temp_images, $deleted_images);
    
    // Xóa từ máy chủ
    foreach ($deleted_images as $img) {
      $file_path = "img/" . $img;
      if (file_exists($file_path)) {
        unlink($file_path);
      }

      // Xóa ảnh trong db
      $sql_delete_image = "UPDATE posts SET image = REPLACE(image, '$img,', '') WHERE post_id = $post_id";

      if ($conn->query($sql_delete_image) === TRUE) {
        // Cập nhật ảnh tạm thời trong session
        $_SESSION['temp_images'] = $temp_images;
      } 
    }
  }

  $all_files = $_FILES['images'];
  $image_name = $_FILES['images']['name'];
  $image_tmp = $_FILES['images']['tmp_name'];
  $location = "img/";

  // Thêm các ảnh mới vào mảng tạm thời
  foreach ($image_name as $key => $val) {
    if (!empty($val)) {
      $targetPath = $location . $val;
      move_uploaded_file($_FILES['images']['tmp_name'][$key], "$targetPath");
      $temp_images[] = $val;
    }
  }

  // Cập nhật ảnh trong cơ sở dữ liệu
  $all_images = implode(",", $temp_images);
  $sql = "UPDATE posts SET content='$content', image='$all_images',statuss='$statuss' WHERE post_id=$post_id";

  if ($conn->query($sql) === TRUE) {
    // Xóa biến session sau khi cập nhật thành công
    unset($_SESSION['temp_images']);
    echo '
    <script>alert("Chỉnh sửa bài viết thành công !");
      window.location.href = "index.php";
    </script>';
      
  }
}
?>


<style>
.largeImage {
  width: 50vh;
  height: 73vh;
  margin: 0 auto;
  background-size: cover;
  background-position: center;
}
.largeVideo{
  width: 50vh;
  height: 73vh;
  margin: 0 9.5vh;
}
.wrapper{
  position: relative;
  width: 10vh;
  height: 10vh;
  margin: 5px 0 0 5px;
  float: left;
  filter: brightness(70%);
  cursor: pointer;
}
.smallImage, .smallVideo {
  width: 10vh;
  height: 10vh;
  background-size: cover;
  background-position: center;
}
.closeButton{
  position: absolute;
  top:0;
  right:0;
  cursor: pointer
}
</style>
        <form id="formEditPost" enctype="multipart/form-data" method="post" class="form">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" 
                style="position:absolute;right:20px;top:20px;color:white">
              <i class="fa-solid fa-xmark" style="scale:2"></i>
            </button>
            <div class="modal-dialog" style="margin:5% 23%">
              <div class="modal-content" style=" width:115vh; height:80vh; border-radius:10px;border: 1px solid lightgray">
                <div class="modal-header" style="padding:25px">
                  <h1 class="modal-title fs-5" id="exampleModalLabel"
                    style="position:absolute;left:42%;padding:10px;text-align:center;">Chỉnh sửa bài viết</h1>
                  <input type="submit" name="update_posts" value="Lưu"
                    style="background:none;color: #0099FF; padding: 10px 20px;border:none;position:absolute;right:0">
                </div>
                <div class="modal-body" style="padding:0">
                  <!-- ảnh lớn  -->
                    <div id="imagePreview" style="float:left;width:60%;height:73vh;overflow:hidden">
                    </div>
                  <div style="width:40%;height:100%;float:right; border-left:1px solid #EEEEEE">
                    <div style="padding:10px;height:60px">
                      <div style="background-image:url('img/<?php echo $row_id["avartar"] ?>'); background-size:cover;width:35px; height:35px; border-radius: 50%;float:left">
                      </div>
                      <label style="float:left; margin:1% 2%">
                        <?php echo $row_id["username"] ?>
                      </label>
                      <select name="statuss">
                        <option value="public" <?php if($statuss == 'public') echo 'selected'; ?>>&#x1F30E; Công khai</option>
                        <option value="friend" <?php if($statuss == 'friend') echo 'selected'; ?>>&#x1F91D; Bạn bè</option>
                        <option value="only_me" <?php if($statuss == 'only_me') echo 'selected'; ?>>&#x1F512; Chỉ mình tôi</option>
                    </select>
                    </div>
                    <textarea style="width:100%;border:none; height:5em;padding:0 20px;resize: none;" name="content"
                      placeholder="Nội dung..."><?php echo $row_show["content"]?></textarea>
                    <div id="content2" style="width:100%;padding:20px">
                      <img src="https://cdn-icons-png.flaticon.com/512/1042/1042339.png" width="30px">Thêm ảnh hoặc
                      video<br>
                      <input type="file" name="images[]"class="hinhanh" style="margin: 10px" multiple accept="image/*, video/*"
                        onchange="handleFile(this)">
                    </div>
                    <!-- ảnh nhỏ -->
                    <div id="imagePreview2" style="width:100%">
                    <input type="hidden" name="deleted_images" id="deleted_images">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </form>

<script>
function initImages() {
  var imagePreview = document.getElementById("imagePreview");
  var imagePreview2 = document.getElementById("imagePreview2");
  var images = <?php echo json_encode(explode(",", $row_show['image'])); ?>;

  for (var i = 0; i < images.length; i++) {
    var imageUrl = 'img/' + images[i];
    var file = images[i];
    createImage(imageUrl, file, imagePreview, imagePreview2, true);
  }
}

window.onload = initImages;
function handleFile(input) {
  checkFileSize(input);
  previewImages(input);
}

function previewImages(input) {
  var files = input.files;
  var imagePreview = document.getElementById("imagePreview");
  var imagePreview2 = document.getElementById("imagePreview2");

  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    
    var imageUrl = URL.createObjectURL(file);
    createImage(imageUrl, file, imagePreview, imagePreview2);
  }
}

function createImage(imageUrl, file, imagePreview, imagePreview2, fromDatabase) {
  var fileType;
  if (file instanceof File) {
    fileType = file.type.split('/')[1].toLowerCase();
  } else {
    fileType = file.split('.').pop().toLowerCase();
  }
  
  var isImage = ['jpg', 'jpeg', 'png', 'gif'].includes(fileType);
  var isVideo = ['mp4', 'webm', 'ogg'].includes(fileType);

    if (isImage) {
      // Tạo
      var largeImage = document.createElement("div");
      largeImage.classList.add("largeImage");
      largeImage.style.backgroundImage = "url('" + imageUrl + "')";
      imagePreview.appendChild(largeImage);

      var wrapper = document.createElement("div");
      wrapper.classList.add("wrapper");

      var smallImage = document.createElement("div");
      smallImage.classList.add("smallImage");
      smallImage.style.backgroundImage = "url('" + imageUrl + "')";
      
      wrapper.appendChild(smallImage);
      imagePreview2.appendChild(wrapper);

    } else if (isVideo) {
      // Tạo và hiển thị video
      var largeImage = document.createElement("video");
      largeImage.classList.add("largeVideo");
      largeImage.src = imageUrl;
      imagePreview.appendChild(largeImage);

      var wrapper = document.createElement("div");
      wrapper.classList.add("wrapper");

      var smallImage = document.createElement("video");
      smallImage.classList.add("smallVideo");
      smallImage.src = imageUrl;

      wrapper.appendChild(smallImage);
      imagePreview2.appendChild(wrapper);
    }
    var closeButton = document.createElement("div");
    closeButton.classList.add("closeButton");
    closeButton.innerHTML = "✖";
    closeButton.addEventListener("click", function () {
      if (imagePreview.contains(largeImage)) {
        imagePreview.removeChild(largeImage);
        imagePreview2.removeChild(wrapper);
        
        // Lấy tên ảnh 
        var fileName = imageUrl.split('/').pop();


        // Thêm tên ảnh vào input deleted_images nếu ảnh từ cơ sở dữ liệu
        if (fromDatabase) {
          var deletedImagesInput = document.getElementById('deleted_images');
          if (deletedImagesInput.value !== '') {
            deletedImagesInput.value += ',';
          }
          deletedImagesInput.value += fileName;
          console.log(imageUrl)
        } else if (file) {
          // Xóa file từ input nếu ảnh không phải từ cơ sở dữ liệu
          var inputElement = document.querySelector("input[name='images[]']");
          var files = Array.from(inputElement.files);
          var newFiles = files.filter(function(f) {
              return f.name !== file.name;
          });

          var dataTransfer = new DataTransfer();
          newFiles.forEach(function(file) {
              dataTransfer.items.add(file);
          });

          inputElement.files = dataTransfer.files;
        }
      }
    });

    wrapper.appendChild(closeButton);
        
        smallImage.dataset.type = file.type;
        largeImage.dataset.type = file.type;

        wrapper.addEventListener("click", function () {
          var allWrappers = imagePreview2.querySelectorAll(".wrapper");
          allWrappers.forEach(function (wrapper) {
            wrapper.style.filter = "brightness(70%)";
            var allLargeVideos = imagePreview.querySelectorAll("video");
            allLargeVideos.forEach(function (largeVideo) {
              largeVideo.pause();
            });
          });
          

          var clickedSmallImage = this.querySelector('.smallVideo') || this.querySelector('.smallImage');
          if (clickedSmallImage.dataset.type.match('video.*')) {
            largeImage.autoplay = true;
            largeImage.play();
          }

          largeImage.scrollIntoView({ behavior: "auto", block: "center" });
          this.style.filter = "brightness(110%)";
        });
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
window.addEventListener('beforeunload', function (e) {
    // Gửi yêu cầu AJAX đến cùng một file PHP để xóa session
    var xhr = new XMLHttpRequest();
    xhr.open('POST', window.location.href, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('action=delete_session');
});
</script>

