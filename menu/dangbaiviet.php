<style>
  .largeImage {
    width: 50vh;
    height: 73vh;
    margin: 0 auto;
    background-size: cover;
    background-position: center;
  }

  .largeVideo {
    width: 50vh;
    height: 73vh;
    margin: 0 9.5vh;
  }

  .wrapper {
    position: relative;
    width: 10vh;
    height: 10vh;
    margin: 5px 0 0 5px;
    float: left;
    filter: brightness(70%);
    cursor: pointer;
  }

  .smallImage,
  .smallVideo {
    width: 10vh;
    height: 10vh;
    background-size: cover;
    background-position: center;
  }
  .closeButton {
    position: absolute;
    top: 0;
    right: 0;
    cursor: pointer;
    font-size: 15px;
  }
</style>
      <form action="" enctype="multipart/form-data" method="post" class="form">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="file" name="images[]" class="hinhanh" style="margin: 20px 30%" multiple
                      accept="image/*, video/*" required onchange="handleFile(this)">
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
                    <select name="statuss" class="custom-select">
                      <option value="public">&#x1F30E; Công khai</option>
                      <option value="friend">&#x1F91D; Bạn bè</option>
                      <option value="only_me">&#x1F512; Chỉ mình tôi</option>
                    </select>
                  </div>
                  <textarea style="width:100%;border:none; height:5em;padding:0 20px;resize: none;" name="content"
                    placeholder="Nội dung..."></textarea>
                  <!-- ảnh nhỏ -->
                  <div id="imagePreview2" style="width:100%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
<?php 
require 'dangbaiviet/posts_connect.php';
if (isset($_POST['btn_submit'])) {
  $post_by = $_POST['post_by'];
  $content = $_POST['content'];
  $statuss = $_POST['statuss'];
  $p_time = date("Y-m-d H:i:s");
  // Upload ảnh 
  $all_files = $_FILES['images'];
  $image_name = $_FILES['images']['name'];
  $image_tmp = $_FILES['images']['tmp_name'];
  $location = "img/";
  $image = implode(",", $image_name);

  if (!empty($image_name)) {
    foreach ($image_name as $key => $val) {
      $targetPath = $location . $val;
      move_uploaded_file($_FILES['images']['tmp_name'][$key], "$targetPath");
    }
  }

  $sql = "INSERT INTO posts(post_by,content,image,statuss,post_time ) VALUES ($post_by,  '$content', '$image','$statuss', '$p_time' )";

  if (mysqli_query($conn, $sql)) {
    echo '
    <script>
      alert("Đăng bài viết thành công!");
      window.location.href = "index.php";
    </script>';
  }
} 
?>
<script>
  function handleFile(input) {
    checkFileSize(input);
    previewImages(input);

    var content1 = document.getElementById("content1");
    content1.style.display = "none";
  }
  function previewImages(input) {
    var files = input.files;
    var imagePreview = document.getElementById("imagePreview");
    var imagePreview2 = document.getElementById("imagePreview2");

    for (var i = 0; i < files.length; i++) {
      var file = files[i];

      var imageUrl = URL.createObjectURL(file);
      (function (imageUrl, file) {
        if (file.type.match('image.*')) {
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

        } else if (file.type.match('video.*')) {
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
        closeButton.innerHTML = "&#10006;";
        closeButton.addEventListener("click", function () {
          if (imagePreview.contains(largeImage)) {
            imagePreview.removeChild(largeImage);
            imagePreview2.removeChild(wrapper);

            // Tìm và xóa tên của file trong input
            var fileName = file.name;
            var inputElement = document.querySelector("input[name='images[]']"); // Tên của input
            var files = Array.from(inputElement.files);
            var newFiles = files.filter(function (f) {
              return f.name !== fileName;
            });

            // Tạo một DataTransfer object mới
            var dataTransfer = new DataTransfer();
            newFiles.forEach(function (file) {
              dataTransfer.items.add(file);
            });

            // Cập nhật lại files property của input
            inputElement.files = dataTransfer.files;

            // Nếu không còn tệp nào, hiển thị content1
            if (inputElement.files.length === 0) {
              var content1 = document.getElementById("content1");
              content1.style.display = "block";
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
      })(imageUrl, file);
    }
  }


  function checkFileSize(input) {
    var files = input.files;

    if (input.files.length > 10) {
      alert('Bạn chỉ có thể chọn tối đa 10 tệp');
      input[typefile].value = '';
      return false;
    }
    for (var i = 0; i < files.length; i++) {
      var fileSize = files[i].size;
      var minSize = 50 * 1024;
      var maxSize = 100000 * 1024;

      if (fileSize < minSize) {
        alert('Kích thước của ảnh phải lớn hơn 50kB.');
        input[typefile].value = '';
        return false;
      }

      // Kiểm tra nếu file là video và kích thước lớn hơn maxSize
      if (files[i].type.match('video.*') && fileSize > maxSize) {
        alert('Kích thước của video quá lớn!');
        input[typefile].value = '';
        return false;
      }
    }
    return true;
  }

        </script>