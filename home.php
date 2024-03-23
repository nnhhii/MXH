<?php
$sql_story = "SELECT * FROM story 
left JOIN user ON story.user_id = user.user_id
LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = story.user_id) OR (friendrequest.sender_id = story.user_id AND friendrequest.receiver_id = $user_id)
WHERE status='bạn bè' OR story.user_id=$user_id ORDER BY story_id DESC";
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<link rel="stylesheet" href="css/menu.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<style>
  #openModalBtn {
    padding: 60% 0;
    width: 145px;
    background: none;
    border: none;
    color: white;
    font-size: 40px;
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
  .ten_story {
    margin-top: 10px
  }

  .modal_post_story {
    display: none;
    position: fixed;
    z-index: 2;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    border: none
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

  .close:hover {
    color: #000;
  }

  .layout_story::-webkit-scrollbar {
    display: none;
    /* Safari và Chrome */
  }
  .custom-select {
    border: none;
    background: #EEE;
    border-radius: 10px;
    font-weight: 500;
    font-size: 13px;
    padding: 5px;
    cursor: pointer;
  }
</style>
<div class="gop_2_menu">
  <div class="menu_giua">
    <div class="layout_menu_giua">
      <div class="layout_story" style="overflow:auto">
        <div class="stories-container">
          <div class="story" style="background-image:url(img/<?php echo $row_id["avartar"] ?>)">

            <button id="openModalBtn"><i class="fa-solid fa-circle-plus"></i></button>
            <div id="myModal" class="modal_post_story">
              <div class="modal-contentt">
                <span id="closeModalBtn" class="close">&times;</span>
                <div class="form-container">
                  <form action="story/upload.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="story_by" value=<?php echo $user_id ?>>
                    <label for="content">Content:</label><br>
                    <textarea id="content" name="content" rows="4" cols="50"></textarea><br><br>

                    <label for="video">Chọn ảnh hoặc video:</label>
                    <input type="file" id="video,img" name="file" accept="video/*,image/*" required
                      onchange="checkFileSize(this)"><br><br>

                    <label for="music">Chọn nhạc nền:</label>
                    <input type="file" id="music" name="music" accept="audio/*"><br><br>

                    <input type="submit" value="Submit" name="submit">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php include 'dangbaiviet/hienthistory.php'?>
          
        </div>
      </div>
      
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
        <?php require_once 'menu/dangbaiviet.php' ?>
        <?php include 'dangbaiviet/posts_xuly.php' ?>
    </div>
  </div>
</div>


<script>
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("openModalBtn");
  var close = document.getElementById("closeModalBtn");
  btn.onclick = function () {
    modal.style.display = "block";
  }
  close.onclick = function () {
    modal.style.display = "none";
  }
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>