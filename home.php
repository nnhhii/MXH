<?php
$sql_story = "SELECT * FROM story 
left JOIN user ON story.user_id = user.user_id
LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = story.user_id) OR (friendrequest.sender_id = story.user_id AND friendrequest.receiver_id = $user_id)
WHERE status='bạn bè' OR story.user_id=$user_id ORDER BY story_id DESC";
$result_story = $ketnoi->query($sql_story);
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

          <?php
          // Khởi tạo mảng để lưu trữ ID của các modal
          $modal_ids = array();
          while ($row_story = $result_story->fetch_assoc()) {

            $current_time = time();
            $post_time = strtotime($row_story["story_time"]);
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

            if ($time_diff < 24 * 60 * 60) { //tính theo giây
              $story_id = $row_story["story_id"];
              $modal_ids[] = $story_id; // Thêm ID của modal vào mảng
              $file = $row_story["file"];
              echo '<a href="#modal_story_' . $story_id . '"  class="story" style="border:none;padding:0;margin:0 2px">';
              if (strpos($file, '.png') || strpos($file, '.jpg') || strpos($file, '.jpeg')) {
                echo '<div class="story modal-trigger" style="background-image:url(story/' . $file . ')"></div>';
              } else {
                echo '<video class="story modal-trigger"  muted style="z-index:0;width: 100%;height: 100%;object-fit: cover;">
                        <source src="story/' . $file . '" type="video/mp4">    
                      </video>';
              } ?>
              <div class="vien_ava_story">
                <div class="ava_story" style="background-image: url('img/<?php echo $row_story["avartar"] ?>');"></div>
              </div>
              <div class="ten_story">
                <?php echo $row_story["username"] ?>
              </div>
              </a>
              <!-- Modal story -->
              <div class="modal fade" id="modal_story_<?php echo $row_story["story_id"] ?>" data-toggle="modal"
                data-storyid="<?php echo $row_story["story_id"] ?>" onclick="stopAudio(this)">
                <div class="modal-dialog">
                  <div class="modal-content"
                    style="z-index:2;width:450px;height:650px;border-radius:20px;background:none;padding:0">
                    <div class="modal-body" style="padding:0;position:relative;background:black;border-radius:20px;">
                      <div class="vien_ava_story" style="margin: 20px 7px;">
                        <div class="ava_story" style="background-image: url('img/<?php echo $row_story["avartar"] ?>');">
                        </div>
                      </div>
                      <div class="ten_story" style="top:20px;left:60px;z-index:1;font-size:14px;font-weight:500">
                        <?php echo $row_story["username"] ?>
                      </div>
                      <div style="color:white;font-size:12px;position:absolute;top:45px;left:60px">
                        <?php echo $time_description ?>
                      </div>
                      <?php if ($user_id == $row_story["user_id"]) { ?>
                        <div class="chinhsuaa">
                          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="width:30px;height:30px;background-color:transparent;border:none;color:white">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                          </button>
                          <ul class="dropdown-menu">
                            <button class="dropdown-item delete">
                              <a href="story/xoa_story.php?story_id=<?php echo $row_story["story_id"] ?>">
                                <i class="fa-solid fa-trash" style="color: red;"></i> Xóa</a>
                            </button>
                          </ul>
                        </div>
                      <?php } ?>
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

                      <audio id="audio_<?php echo $row_story["story_id"] ?>" loop>
                        <source src="story/<?php echo $row_story["music"] ?>" type="audio/mpeg">
                      </audio>

                      <div style="position:absolute;left:50px;bottom:20px;color:white">
                        <?php echo $row_story["content"] ?>
                      </div>


                    </div>
                    <div class="btns">
                      <div class="btn-rightt btnsl" style="right: -35px"><i class='bx'></i></div>
                      <div class="btn-leftt btnsl"style="left: -35px"><i class='bx'></i></div>
                    </div>
                  </div>
                </div>
              </div>

            <?php }
          } ?>
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
                // $(this).remove(); // Loại bỏ modal khỏi DOM sau khi đóng lại
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