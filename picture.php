<?php
include_once 'connection.php';
$baidang = $row['p_id'];
$sql_nguoidang = "SELECT user_id FROM post WHERE $baidang=p_id";
$result = $conn->query($sql_nguoidang);
if ($result->num_rows > 0) {
  $kq = $result->fetch_assoc();
  $id_nguoidung = $kq['user_id'];  // Giả sử $kq['user_id'] chứa ID người dùng
  $sql_avt = "SELECT * FROM user_register WHERE id = $id_nguoidung";
  $ketqua = $conn->query($sql_avt);
  $user = $ketqua->fetch_assoc();
} else {
  echo "Không tìm thấy kết quả";
}
// Kiểm tra xem biến $row['image'] đã được định nghĩa chưa
if (isset($row['image'])) {
  ?>

  <body>
    <div>
      <!-- right -->
      <div style="width: 50%; float: left; padding-right: 20px;"><img src="image/<?php echo $row['image']; ?>" alt=""
          style="width: 90vh; height: 100%; height: 90vh;">
      </div>
      <!-- left -->
      <div style="width: 50%; float: right; ">
        <!--HEAD -->
        <div style="height: 10vh; width: 100%; padding-top: 10px; border-bottom-width: 1px; border-color: black; ">
          <div class="friend-info">
            <figure>
              <img src="image/<?php echo $user['profile_pic']; ?>" alt="">
            </figure>
            <div class="friend-name">
              <ins><a href="time-line.php?v_id=<?php echo $user['id']; ?>" title="">
                  <?php echo $user['name']; ?>
                </a></ins>
              <span>
                <?php echo $row['time']; ?>
              </span>
            </div>
          </div>
        </div>
        <!-- view comment -->
        <div style="height: 55vh; width: 100%; padding-top: 20px;overflow-y: scroll;">
          <div class="coment-area">
            <ul class="we-comet">
              <?php
              $post_id = $row['p_id'];
              $sql_select_row = "select * from post_comment inner join user_register on post_comment.cmt_by = user_register.id and post_comment.post_id = $post_id";

              $data_row = mysqli_query($conn, $sql_select_row);
              if ($data_row->num_rows < 1) {
                ?>
                <!-- No Comment Yet -->
                <div class="nocomment">
                  <div style="margin-top: 15%;margin-left: 30%;margin-right: 30%;">
                    <div style="font-size: 35px;font-weight: bold;">No comments yet</div>
                    <div style="font-size: 20px; margin-left: 10%;">Start the conversation.</div>
                  </div>
                </div>
                <?php
                "No comments yet.
                Start the conversation.";
              } else {
                while ($row_cmt = mysqli_fetch_assoc($data_row)) { ?>
                  <li>
                    <div class="comet-avatar profile_image_div">
                      <img src="image/<?php echo $row_cmt['profile_pic']; ?>" alt="" class="profile_image_img">
                    </div>
                    <div class="we-comment">
                      <div class="coment-head">
                        <h5><a href="time-line.php?v_id=<?php echo $row_cmt['id']; ?>" title="">
                            <?php echo $row_cmt['name']; ?>
                          </a></h5>
                        <span>1 week ago</span>
                        <a class="we-reply" href="#" title="Reply">
                          <!-- <i class="fa fa-reply"></i> -->
                        </a>
                        <?php if ($row_cmt['cmt_by'] == $user_id || $row_cmt['id'] == $user_id) { ?>
                          <a class="we-reply delete_home_cmt" href="javascript:void(0)" attr_id=<?php echo $row_cmt['cmt_id']; ?>title="Reply">Delete-Comment </a>
                        <?php } ?>
                        <?php if ($row_cmt['cmt_by'] == $user_id) { ?>
                          <a class="we-reply edit_home_cmt" href="javascript:void(0)" attr_id=<?php echo $row_cmt['cmt_id']; ?>
                            title="Reply">Edit</a>
                        <?php } ?>
                      </div>
                      <p>
                        <?php echo $row_cmt['cmt']; ?>
                      </p>
                  </li>
                  <br>
                <?php }
              } ?>
            </ul>
          </div>
        </div>
        <!--footer  -->
        <div class="footer" style="padding-top: 20px;">
          <!-- like -->
          <div style="height: 5vh; width: 80%; justify-content: space-between; display:flex; align-items: center;">
            <div style="display: flex;">
              <div class="cd__main" style="padding: 0px; width: 42px;height: 42px;">
                <div class='middle-wrapper' style="height: 42px;width: 42px;">
                  <div class='like-wrapper'>
                    <a class='like-button' style="border: none;">
                      <span class='like-icon' style="">
                        <div class='heart-animation-1'></div>
                        <div class='heart-animation-2'></div>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="chat">
                <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
                  <img src="image/bubble-chat.png" style="width: 40px; height: 40px;margin-right: 10px;">
                </button>
              </div>
              <div class="send">
                <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#send_message_modal">
                  <img src="image/send.png" style="width: 40px; height: 40px;margin-right: 10px;">
                </button>
              </div>
            </div>
            <div class="save not_saved">
              <!-- <img class="hide saved" src="image/save_black.png" style="width: 40px; height: 40px;"> -->
              <img class="not_saved" src="image/save-instagram.png" style="width: 40px; height: 40px;">
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
              <img src="image/smile.PNG" class="icon" alt="">
              <input type="text" class="comment-box" placeholder="Add a comment"
                style="border: none; height: 0%; width: 80%; background: none; padding-top: 0px; padding-bottom: 0px;">
              <button class="comment-btn" style="border: none; background: none; color: rgb(0, 162, 255);">Post</button>
            </div>
          </div>
        </div>
      </div>
    </div>


  </body>

  </html>
  <script src="like.js"></script>
  <?php
} else {
  // Xử lý nếu $row['image'] không được định nghĩa
  echo "Không tìm thấy hình ảnh.";
}
?>