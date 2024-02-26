<?php
$sql_story = "SELECT * FROM story 
LEFT JOIN user ON story.user_id = user.user_id
LEFT JOIN friend ON (friend.user_id1 = $user_id AND friend.user_id2 = story.user_id) OR (friend.user_id1 = story.user_id AND friend.user_id2 = $user_id)
WHERE friend.user_id1 IS NOT NULL OR friend.user_id2 IS NOT NULL OR story.user_id=$user_id ORDER BY story_id DESC";
$result_story = $ketnoi->query($sql_story);
?>
<link rel="stylesheet" href="css/menu.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<body>
  <div class="gop_2_menu">
    <div class="menu_giua">
      <div class="layout_menu_giua">
        <div class="layout_story">
          <div class="next_left"></div>
          <div class="stories-container">
            <?php while ($row_story = $result_story->fetch_assoc()) { ?>
              <div class="story" style="background-image: url('img/<?php echo $row_story["img"] ?>');">
                <div class="vien_ava_story">
                  <div class="ava_story" style="background-image: url('img/<?php echo $row_story["avartar"] ?>');"></div>
                </div>
                <div class="ten_story">
                  <?php echo $row_story["username"] ?>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="next_right"></div>
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
                      <input type="file" name="images[]" class="hinhanh" style="margin: 20px 30%" multiple
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
                    </div>
                    <textarea style="width:100%;border:none; height:5em;padding:0 20px;resize: none;" name="content"
                      placeholder="Nội dung..."></textarea>
                    <div id="content2" style="width:100%;padding:20px;display:none">
                      <img src="https://cdn-icons-png.flaticon.com/512/1042/1042339.png" width="30px">Thêm ảnh hoặc
                      video<br>
                      <input type="file" name="images[]" class="hinhanh" style="margin: 10px" multiple
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
</body>

<script>
  $(document).ready(function () {
    var currentIndex = 0;
    var itemWidth = $(".story").outerWidth() + 10; // Width of each story item (including margin)

    $(".next_right").on("click", function () {
      moveStories("next");
    });

    $(".next_left").on("click", function () {
      moveStories("prev");
    });

    function moveStories(direction) {
      var container = $(".stories-container");
      var containerWidth = container.width();

      if (direction === "next" && currentIndex < $(".story").length - 3) {
        currentIndex++;
      } else if (direction === "prev" && currentIndex > 0) {
        currentIndex--;
      }

      var translateValue = -currentIndex * itemWidth;
      container.css("transform", "translateX(" + translateValue + "px)");
    }
  });

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

  document.addEventListener('DOMContentLoaded', function () {
    var currentIndex = 0;
    var itemWidth = document.querySelector(".story").offsetWidth + 10; // Width of each story item (including margin)

    document.querySelector(".next_right").addEventListener("click", function () {
      moveStories("next");
    });

    document.querySelector(".next_left").addEventListener("click", function () {
      moveStories("prev");
    });

    function moveStories(direction) {
      var container = document.querySelector(".stories-container");
      var containerWidth = container.offsetWidth;

      if (direction === "next" && currentIndex < document.querySelectorAll(".story").length - 3) {
        currentIndex++;
      } else if (direction === "prev" && currentIndex > 0) {
        currentIndex--;
      }

      var translateValue = -currentIndex * itemWidth;
      container.style.transform = "translateX(" + translateValue + "px)";
    }
  });

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