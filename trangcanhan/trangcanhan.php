<head>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
  .hidden {
    display: none;
  }

  .bia {
    margin: 11vh 10% 0 10%;
    height: 34vw;
    width: 80%
  }

  .bia>.bia1 {
    float: right;
    width: 72%;
    background-size: cover;
    background-position: center;
    border-radius: 0 10px 10px 0;
    height: 32vw;
    position: relative;
  }

  .bia>.khungcanhan {
    box-shadow: -10px 0px 10px 1px #EEE;
    border-right: none;
    float: left;
    height: 32vw;
    width: 28%;
    border-radius: 10px 0 0 10px;
    position: relative;
  }

  .bia>.khungcanhan>.canhan1 {
    height: 15vh;
    position: relative;
    padding: 4vh 0 2vh 0
  }

  .bia>.khungcanhan>.canhan1>.anhdaidien {
    background-size: cover;
    background-position: center;
    width: 17vh;
    height: 17vh;
    border-radius: 50%;
    margin: auto;
    border: 3px solid white;
    position: relative;
  }

  .bia>.khungcanhan>.name {
    font-family: Helvetica, Arial, sans-serif;
    font-size: 1.8vw;
    text-align: center;
    margin-top: 7vh;
  }

  .bia>.khungcanhan>.name>.banbe,
  .banchung {
    font-size: 1vw;
    color: dimgray;
    text-decoration: none
  }

  .banbe,
  .banchung:hover {
    text-decoration: underline;
  }

  .bia>.khungcanhan>.name>.tieusu {
    font-size: 1.2vw
  }

  .bia>.khungcanhan>.congcu {
    margin: 0 auto;
    width: fit-content;
    white-space: nowrap;
    display: flex
  }

  .congcu1 {
    margin: 1vw;
    font-size: 1.1vw;
    padding: 1vw 1.5vw;
    border: none;
    border-radius: 5px;
    background-color: #90C9D5;
  }

  .congcu1:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }

  .ccbia,
  .ccbia1 {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #EEE;
  }

  .ccbia1 {
    right: 15%
  }

  .anhdaidien>img {
    position: absolute;
    right: 5px;
    bottom: 0;
    width: 3.5vh;
    cursor: pointer;
  }

  .bia>.khungcanhan>.congcu>div>form>input[type=text] {
    width: 12vw;
    height: 2vw;
    padding: 12px 20px;
    margin: 0 0 1vw 0;
    border: 1px solid #ccc;
    outline: none
  }

  @media(max-width:980px) {
    .bia>.khungcanhan {
      width: 40%;
      left: 28vw;
      height: 40vh;
      float: left;
      box-shadow: none;
      margin-bottom: 20vh
    }

    .bia>.khungcanhan>.canhan1 {
      padding: 2vw;
      height: 5vw;
    }

    .bia>.khungcanhan>.canhan1>.anhdaidien {
      width: 15vh;
      height: 15vh;
      top: -10vh
    }

    .bia>.khungcanhan>.name {
      font-size: 3.5vh;
      margin-top: 3vh
    }

    .bia>.khungcanhan>.name>.banbe {
      font-size: 2vh;
    }

    .bia>.khungcanhan>.name>.tieusu {
      font-size: 2vh
    }

    .bia {
      width: 100%;
      margin: 9vh 0 0 0;
    }

    .bia>.bia1 {
      width: 100%;
      height: 40vh;
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .congcu1 {
      margin-left: 1.4vw;
      font-size: 2.5vh;
      padding: 1.8vw 4vw;
    }

    .ccbia1,
    .ccbia {
      right: 13.5vh;
      font-size: 2vh;
      padding: 2vh 3vh
    }

    .ccbia {
      right: 0
    }

  }

  @media(max-width:630px) {
    .bia>.khungcanhan {
      width: 70%;
      left: 15vw
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .congcu1 {
      margin-left: 6vw;
      font-size: 2.5vh;
      padding: 2vw 5vw;
    }

    .ccbia1,
    .ccbia {
      right: 13.5vh;
      font-size: 2vh;
      padding: 2vh 3vh
    }

    .ccbia {
      right: 0
    }
  }

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

<div class="bia">
  <div class="bia1" style="background-image: url('img/<?php echo $row_id["cover_picture"] ?>')">
    <button class="ccbia congcu1" onclick="showFilePicker()">Chỉnh sửa</button>
    <form action="trangcanhan/suabia.php" method="post" enctype="multipart/form-data">
      <input type="file" id="filePicker" accept="image/*" name="anhbia" style="display:none;" onchange="filePicked()" />
      <input type="submit" style="display:none" id="saveButton">
    </form>
    <script>
      function showFilePicker() {
        document.getElementById('filePicker').click();
      }
      function filePicked() {
        var input = document.getElementById('filePicker');
        if (input.files && input.files[0]) {
          console.log('Tệp đã chọn:', input.files[0].name);
        }
        document.getElementById('saveButton').click();
      }
    </script>
    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh bìa?')" href="trangcanhan/xoabia.php">
      <button class="ccbia1 congcu1">Xóa</button>
    </a>
  </div>
  <div class="khungcanhan" style="position:relative">
    <div style="cursor:pointer;padding:20px" onclick="window.location.href = 'index.php?pid=14'"><i
        class="fa-regular fa-pen-to-square" style="scale:1.5;right:10px;top:10px;position:absolute"></i></div>
    <div class="canhan1">
      <div class="anhdaidien" style="background-image: url('img/<?php echo $row_id["avartar"] ?>')">
        <img src="https://cdn-icons-png.flaticon.com/512/3624/3624186.png" onclick="avartar()"></i>
      </div>
      <form action="trangcanhan/avartar.php" method="post" enctype="multipart/form-data" id="uploadForm">
        <input type="file" id="avatarPicker" accept="image/*" name="anhdaidien" style="display:none;"
          onchange="avatarPicked()" />
        <input type="submit" style="display:none;" id="avatarSaveButton">
      </form>
      <script>
        function avartar() {
          document.getElementById('avatarPicker').click();
        }
        function avatarPicked() {
          var input = document.getElementById('avatarPicker');
          if (input.files && input.files[0]) {
            console.log('Tệp đã chọn:', input.files[0].name);
            document.getElementById('avatarSaveButton').click();
          }
        }
      </script>
    </div>
    <div class="name">
      <div><strong>
          <?php echo $row_id["username"] ?>
        </strong></div>
      <div class="banbe"><br>
        <!-- bạn bè -->
        <?php
        $sql_ss = "SELECT * FROM user
        INNER JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_id)
        WHERE status = 'bạn bè'";
        $result_ss = $ketnoi->query($sql_ss);
        $friends_ss = array();

        $sql_storyluutru = "SELECT * FROM story WHERE user_id= $user_id";
        $result_luutrustory = $ketnoi->query($sql_storyluutru);
        while ($row_ss = $result_ss->fetch_assoc()) {
          $friends_ss[] = $row_ss['user_id'];
        }
        $count_friends = count($friends_ss)
          ?>
        <a class="banchung" data-toggle="modal" href='#modal-id-banbe'>
          <?php echo $count_friends ?> bạn bè
        </a>
        <div class="modal fade" id="modal-id-banbe">
          <div class="modal-dialog">
            <div class="modal-content" style="width:430px;height:420px; border-radius:15px;margin:20vh auto">
              <div class="modal-header" style="border-bottom: 1px solid #DBDBDB;height:50px">
                <h5 class="modal-title" style="position:absolute;left:38%;text-align:center;color:black">Tất cả bạn bè
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                  style="border:none;padding:30px;background:none;position:absolute;right:0">&times;</button>
              </div>
              <div class="modal-body" style="padding:0;overflow:auto">
                <!-- Search -->
                <form enctype="multipart/form-data" method="post">
                  <i style="top:12px;position: absolute;left:13px" class="fa-solid fa-magnifying-glass"></i>
                  <input class="timkiem3"
                    style="width:100%;height: 40px;outline: none;padding-left: 45px;border: none;border-bottom: 1px solid #DBDBDB;">
                </form>
                <div class="hienthibanbe_tcn"></div>
              </div>
            </div>
          </div>
        </div><br>

      </div>
      <div class="tieusu"><br>
        <?php echo $row_id["bio"] ?>
      </div>
    </div>
    <div class="congcu">
      <button class="congcu1" id="editButton" onclick="FormTIEUSU()">Chỉnh sửa</button>
      <div id="inputForm" class="hidden">
        <form action="trangcanhan/suatieusu.php" method="post">
          <input type="text" value="<?php echo $row_id['bio'] ?>" name="tieusu" placeholder="Nhập tiểu sử của bạn"><br>
          <input type="submit" value="Lưu" style="border:none;padding:2px 10px">
          <button style="border:none;padding:2px 10px" type="button" onclick="cancelEdit()">Hủy</button>
        </form>
      </div>

      <script>
        function FormTIEUSU() {
          var form = document.getElementById("inputForm");
          var button = document.getElementById("editButton");
          form.style.display = "block";
          button.style.display = "none";
        }
        function cancelEdit() {
          var form = document.getElementById("inputForm");
          var button = document.getElementById("editButton");
          form.style.display = "none";
          button.style.display = "block";
        }
      </script>

      <a onclick="return confirm('Bạn có chắc chắn muốn xóa tiểu sử?')" href="trangcanhan/xoatieusu.php">
        <button class="congcu1">Xóa</button>
      </a>
      <button class="congcu1" onclick="toggleLuuTruStory()">...</button>
      <div class="storyLuuTru" id="luuTruStory"
        style="display: none; position: absolute; bottom:15px;right:10px;cursor: pointer;">
        <div class="modal-trigger" style="box-shadow: 1px 2px 10px #EEEEEE; border-radius: 10px; background-color: rgb(252, 252, 252); width: 100px; height: 30px;">Story Luu Tru</div>
      </div>
      <?php
      $modal_ids = array();
      while ($row_luutrustory = $result_luutrustory->fetch_assoc()) {
        $story_id = $row_luutrustory["story_id"];
        $modal_ids[] = $story_id; // Thêm ID của modal vào mảng
      
        $file = $row_luutrustory["file"];
        $current_time = time();
        $post_time = strtotime($row_luutrustory["story_time"]);
        $time_diff = $current_time - $post_time;
        if ($time_diff < 60) {
          $time_description = "vừa xong";
        } elseif ($time_diff < 3600) {
          $time_description = floor($time_diff / 60) . " phút trước";
        } elseif ($time_diff < 86400) {
          $time_description = floor($time_diff / 3600) . " giờ trước";
        } else {
          $time_description = floor($time_diff / 86400) . " ngày trước";
        }
        ?>
        <!-- Modal story -->
        <div class="modal fade" id="modal_story_<?php echo $row_luutrustory["story_id"] ?>" data-toggle="modal"
          data-storyid="<?php echo $row_luutrustory["story_id"] ?>" onclick="stopAudio(this)">
          <div class="modal-dialog">
            <div class="modal-content"
              style="z-index:2;width:450px;height:650px;border-radius:20px;background:none;padding:0">
              <div class="modal-body" style="padding:0;position:relative;background:black;border-radius:20px;">
                <div class="vien_ava_story" style="margin: 20px 7px;">
                  <div class="ava_story" style="background-image: url('img/<?php echo $row_id["avartar"] ?>');">
                  </div>
                </div>
                <div class="ten_story" style="top:20px;left:60px;z-index:1;font-size:14px;font-weight:500">
                  <?php echo $row_id["username"] ?>
                </div>
                <div style="color:white;font-size:12px;position:absolute;top:45px;left:60px">
                  <?php echo $time_description ?>
                </div>
                <div class="chinhsuaa">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="width:30px;height:30px;background-color:transparent;border:none;color:white">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <button class="dropdown-item delete">
                      <a href="story/xoa_story.php?story_id=<?php echo $row_luutrustory["story_id"] ?>">
                        <i class="fa-solid fa-trash" style="color: red;"></i> Xóa</a>
                    </button>
                  </ul>
                </div>
                <?php
                if (strpos($file, '.png') || strpos($file, '.jpg') || strpos($file, '.jpeg')) {
                  echo '<div class="image" style="background-image:url(story/' . $file . ');width:100%;height:650px;border-radius:20px;background-size:cover"></div>';
                } else {
                  echo '<video class="video"  muted autoplay style="width:450px;height:650px;border-radius:20px;">
                                <source src="story/' . $file . '" type="video/mp4">    
                              </video>';
                }
                ?>
                <!-- Thêm thanh tiến trình vào modal -->
                <div class="progress"
                  style="background:gray;--bs-progress-bar-bg:white;height:5px;position:absolute;top:10px;width:90%;left:5%">
                  <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                    aria-valuemax="100"></div>
                </div>

                <audio id="audio_<?php echo $row_luutrustory["story_id"] ?>" loop>
                  <source src="story/<?php echo $row_luutrustory["music"] ?>" type="audio/mpeg">
                </audio>

                <div style="position:absolute;left:50px;bottom:20px;color:white">
                  <?php echo $row_luutrustory["content"] ?>
                </div>


              </div>
              <div class="btns">
                <div class="btn-rightt btnsl" style="right: -35px"><i class='bx'></i></div>
                <div class="btn-leftt btnsl" style="left: -35px"><i class='bx'></i></div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <script>
      var luuTruStoryVisible = false;

      function toggleLuuTruStory() {
        var luuTruDiv = document.getElementById("luuTruStory");
        if (!luuTruStoryVisible) {
          luuTruDiv.style.display = "block";
        } else {
          luuTruDiv.style.display = "none";
        }
        luuTruStoryVisible = !luuTruStoryVisible;
      }
    </script>
    <script>
      var interacted = false;

      $(document).ready(function () {
        var modalIds = <?php echo json_encode($modal_ids); ?>;
        var index = 0; // Khai báo biến index ở mức độ toàn cục

        $('.modal-trigger').click(function () {
          index = $(this).index('.modal-trigger'); // Gán lại giá trị cho biến index khi nhấn vào trigger
          interacted = true;
          openNextModal(index);
        });

        $('.modal').on('hidden.bs.modal', function (e) {
          closeModal(index);
        });

        // Hàm mở modal tiếp theo
        function openNextModal(index) {
          // Reset thanh tiến trình của modal trước
          if (index > 0) {
            var previousModalId = 'modal_story_' + modalIds[index - 1];
            var $previousModal = $('#' + previousModalId);
            var $previousProgressBar = $previousModal.find('.progress-bar');
            $previousProgressBar.css('width', '0%').attr('aria-valuenow', 0);
          }

          var currentModalId = 'modal_story_' + modalIds[index];
          var $currentModal = $('#' + currentModalId);
          $currentModal.modal('show'); // Hiển thị modal hiện tại

          var $image = $currentModal.find('.image');
          var $video = $currentModal.find('.video');
          var $progressBar = $currentModal.find('.progress-bar');
          if ($image.length > 0) {
            var imageDuration = 5; // Thời lượng hiển thị ảnh là 5 giây
            var imageInterval = setInterval(function () {
              var valueNow = parseInt($progressBar.attr('aria-valuenow'));
              valueNow++;
              $progressBar.css('width', valueNow + '%').attr('aria-valuenow', valueNow);
              if (valueNow >= 100) {
                clearInterval(imageInterval);
              }
            }, imageDuration * 1000 / 100); // Cập nhật thanh tiến trình mỗi 1% thời lượng

            setTimeout(function () {
              $currentModal.modal('hide'); // Ẩn modal hiện tại
              if (interacted == true && $('.modal.show').length == 0) {
                openNextModal(index + 1); // Mở modal tiếp theo
                console.log($image.length);
              }
            }, imageDuration * 1000);
          } else if ($video.length > 0) {
            var video = $video[0];
            var videoDuration = video.duration; // Lấy thời lượng video

            // Cập nhật thanh tiến trình mỗi 0.1 giây
            var videoInterval = setInterval(function () {
              var currentTime = video.currentTime;
              var progress = (currentTime / videoDuration) * 100;
              $progressBar.css('width', progress + '%').attr('aria-valuenow', progress);

              if (currentTime >= videoDuration) {
                clearInterval(videoInterval);
              }
            }, 100);


            $video.on('ended', function () {
              $currentModal.modal('hide'); // Ẩn modal hiện tại
              if (interacted == true && $('.modal.show').length == 0) {
                openNextModal(index + 1); // Mở modal tiếp theo
              }
            });
          }
        }

        $('.btn-rightt').click(function () {
          closeModal(index);
          console.log("nut RIGHT " + index);
          index++;
          if (index >= modalIds.length) {
            interacted = false;
          }
          openNextModal(index);
        });

        $('.btn-leftt').click(function () {
          if (index > 0) {
            closeModal(index);
            console.log("nut LEFT " + index);
            index--;
            openNextModal(index);
          }
        });

        // Hàm đóng modal
        function closeModal(index) {
          var currentModalId = 'modal_story_' + modalIds[index];
          $('#' + currentModalId).modal('hide'); // Đóng modal hiện tại
        }

        $('.modal').on('click', function (e) {
          if ($(e.target).hasClass('modal')) {
            console.log("click ngoai modal roi");
            interacted = false;
            var $progressBar = $(this).find('.progress-bar');
            $progressBar.css('width', '0%').attr('aria-valuenow', 0);
          }
        });


      })
    </script>
  </div>
</div>
</div>
<div style="border-bottom:1px solid lightgray; margin:5% 10vw 0 10vw; width:80%;float:center"></div>
<?php
require 'dangbaiviet/posts_connect.php';
$sql_buttonOpenModal = "SELECT * FROM posts 
        INNER JOIN user ON posts.post_by = user.user_id
        WHERE  posts.post_by = $user_id
        ORDER BY post_id DESC";

$result_buttonOpenModal = $ketnoi->query($sql_buttonOpenModal);
include 'dangbaiviet/posts_buttonOpenModal.php' ?>


<script>

  $(document).ready(function () {
    $('.timkiem3').on('input', function () {
      var timkiem = $(this).val();

      if (timkiem === '') {
        loadAllFriends();
        return;
      }
      $.ajax({
        url: 'trangcanhan/timkiem_tcn.php',
        method: 'POST',
        data: {
          timkiem: timkiem
        },
        success: function (response) {
          $('.hienthibanbe_tcn').html(response);
        }
      });
    });
    loadAllFriends();
    // Hàm tải tất cả bạn bè
    function loadAllFriends() {
      $.ajax({
        url: 'trangcanhan/tatcabanbe_tcn.php',
        method: 'POST',
        data: {
        },
        success: function (response) {
          $('.hienthibanbe_tcn').html(response);
        }
      });
    }
  });

</script>
<script>
  $(document).ready(function () {
    $('.modal').on('shown.bs.modal', function () {
      $(this).find('audio')[0].play();
    });

    $('.modal').on('hidden.bs.modal', function () {
      var audio = $(this).find('audio')[0];
      audio.pause();
      audio.currentTime = 0; // Reset audio về thời điểm ban đầu
    });


  });
  function stopAudio(modal) {
    var audioId = modal.getAttribute("data-storyid");
    var audio = document.getElementById("audio_" + audioId);
    audio.stop = true; // stop audio khi modal được đóng
  }
</script>