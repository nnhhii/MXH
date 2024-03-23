<?php
          $result_story = $ketnoi->query($sql_story);
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
              } 
              
              ?>
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