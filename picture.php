<body>
  <!-- p1 -->
  <div>
    <!-- left -->
    <?php
    // Lấy giá trị của tham số từ URL
    if ($i == 1) {
      ?>
      <div style="width: 50%; float: left;">
        <img src="img/Screenshot 2023-11-21 093925.png" alt="khong nhan duoc anh"
          style="width: 100%; height: 100%; height: 90vh;">
      </div>
    <?php } else if ($i == 2) { ?>
        <div style="width: 50%; float: left;">
          <img src="img/Screenshot 2023-12-21 204909.png" alt="khong nhan duoc anh"
            style="width: 100%; height: 100%; height: 90vh;">
        </div>
    <?php } else if ($i == 3) { ?>
          <div style="width: 50%; float: left;">
            <img src="img/Screenshot 2024-01-06 215212.png" alt="khong nhan duoc anh"
              style="width: 100%; height: 100%; height: 90vh;">
          </div>
    <?php } else if ($i == 4) { ?>
            <div style="width: 50%; float: left;">
              <img src="img/Screenshot 2023-12-07 233249.png" alt="khong nhan duoc anh"
                style="width: 100%; height: 100%; height: 90vh;">
            </div>
    <?php } ?>


    <!-- right -->
    <div style="width: 45%;height: 100%; float: right; ">
      <!--HEAD -->
      <div style="height: 10%; width: 100%; padding-top: 10px; border-bottom: rgb(191, 190, 190) solid 1px;">
        <div class="friend-info">
          <figure>
            <!-- <img src="img/<?php echo $user['profile_pic']; ?>" alt=""> -->
          </figure>
          <div class="friend-name">
            <ins>User_name
            </ins>
            <span>
              3:47
            </span>
          </div>
        </div>
      </div>
      <!-- view comment -->
      <div style="height: 60vh; width: 100%;overflow-y: scroll;">
        <div class="coment-area">
          <ul class="we-comet">
            <!-- No Comment Yet -->
            <div class="nocomment" >
              <div style="margin-top: 15%;margin-left: 5%;">
                <div style="font-size: 35px;font-weight: bold;">No comments yet</div>
                <div style="font-size: 20px; margin-left: 10%;">Start the conversation.</div>
              </div>
            </div>
          </ul>
        </div>
      </div>
      <!--footer  -->
      <div class="footer" style="padding-top: 20px; border-top: rgb(191, 190, 190) solid 1px;">
        <!-- like -->
        <div style="height: 5vh; width: 80%; justify-content: space-between; display:flex; align-items: center;">
          <div style="display: flex;">
            <div class="cd__main" style="padding: 0px; width: 30px;height: 30px;">
              <div class='middle-wrapper' style="height: 30px;width: 30px;">
                <div class='like-wrapper'>
                  <a class='like-button' style="border: none;">
                    <span class='like-icon' style="height: 30px;width: 30px;">
                      <div class='heart-animation-1'></div>
                      <div class='heart-animation-2'></div>
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="chat">
              <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
                <img src="img/bubble-chat.png" style="width: 30px; height: 30px;margin-right: 10px;">
              </button>
            </div>
            <div class="send">
              <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#send_message_modal">
                <img src="img/send.png" style="width: 30px; height: 30px;margin-right: 10px;">
              </button>
            </div>
          </div>
          <div class="save not_saved">
            <!-- <img class="hide saved" src="image/save_black.png" style="width: 40px; height: 40px;"> -->
            <img class="not_saved" src="img/save-instagram.png" style="width: 30px; height: 30px;">
          </div>
        </div>
        <!-- Liked -->
        <div style="height: 5vh; font-weight: 600; position: relative;">
          <!-- <a class="bold" href="#">${post_data[i][4]} likes</a> -->
          150 liked
        </div>
        <!-- add comment -->
        <div class="add comment">
          <div class="comment-wrapper">
            <img src="img/smile.PNG" class="icon" alt="" style="height: 30px;width: 30px;">
            <input type="text" class="comment-box" placeholder="Add a comment"
              style="border: none; height: 0%; width: 70%; background: none; padding-top: 0px; padding-bottom: 0px;outline: none;">
            <button class="comment-btn" style="border: none; background: none; color: rgb(0, 162, 255);">Post</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<script src="like.js"></script>