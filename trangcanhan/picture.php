<body>
  <div>
    <!-- left -->
    <div style="width: 50%; float: left;">
      <img src="img/<?php echo $row_post['image']; ?>" alt="khong nhan duoc anh"
        style="width: 100%; height: 100%; height: 90vh;">
    </div>
    <!-- right -->
    <div style="width:50%;height:90vh; float: left; padding: 0 15px; position:relative">
      <!--HEAD -->
      <div style="height: 60px; border-bottom: rgb(191, 190, 190) solid 1px; padding: 14px 0;">
        <a href="index.php?pid=<?php echo $row['user_id']; ?>" style="color:black;text-decoration:none">
          <div
            style="background-image:url('img/<?php echo $row['avartar']; ?>'); float:left; background-size: cover; width: 35px; border-radius:50%; height:35px;">
            <div style="margin:10px 50px; width:80px">
              <?php echo $row['username']; ?>
            </div>
        </a>
      </div>
    </div>
    <!-- view comment -->
    <div style="height: 60vh;overflow-y: scroll;">
      <div class="coment-area">
        <ul class="we-comet">
          <?php
          $sql_select_row = "SELECT * FROM comment inner join user on comment_by = user_id and comment.post_id = {$row_post['post_id']}";
          $data_row = mysqli_query($link, $sql_select_row);
          if ($data_row->num_rows < 1) {
            ?>
            <!-- No Comment Yet -->
            <div class="nocomment">
              <div style="margin-top: 15%;margin-left: 5%;">
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
                <div
                  style="background-image:url('img/<?php echo $row_cmt['avartar']; ?>'); float:left; background-size: cover; width: 35px; border-radius:50%; height:35px;">
                  <?php echo $row_cmt['username']; ?>
                  <!-- <div class="we-comment">
                    <div class="coment-head">
                      <?php echo $row_cmt['username']; ?>
                      </a></h5>
                      <span>1 week ago</span>
                      <a class="we-reply" href="#" title="Reply">
                      </a>
                    </div>
                    <p>
                      <?php echo $row_cmt['cmt_content']; ?>
                    </p> -->
              </li>
              <br>
            <?php }
          } ?>
          <!-- No Comment Yet -->
        </ul>
      </div>
    </div>
    <!--footer  -->
    <div class="footer" style="width:100%;padding:10px 0; float:left; border-top: rgb(191, 190, 190) solid 1px;">
      <!-- like -->
      <div style="height: 5vh; justify-content: space-between; display:flex; align-items: center">
        <div style="display: flex;">

          <div class='middle-wrapper' style="height: 25px;width: 25px;margin:5px">
            <div class='like-wrapper'>
              <a class='like-button' style="border: none;">
                <span class='like-icon' style="height: 25px;width: 25px;">
                  <div class='heart-animation-1'></div>
                  <div class='heart-animation-2'></div>
                </span>
              </a>
            </div>
          </div>

          <div class="chat">
            <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
              <img src="img/bubble-chat.png" style="width: 25px; height: 25px;margin:5px">
            </button>
          </div>
          <div class="send">
            <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#send_message_modal">
              <img src="img/send.png" style="width: 20px; height: 20px;margin: 8px 10px;">
            </button>
          </div>
        </div>
        <div class="save not_saved">
          <!-- <img class="hide saved" src="image/save_black.png" style="width: 40px; height: 40px;"> -->
          <img class="not_saved" src="https://img.icons8.com/?size=256&id=43571&format=png"
            style="width: 30px; height: 30px;">
        </div>
      </div>
      <!-- Liked -->
      <div style="height: 5vh; font-weight: 600;float:left">
        <!-- <a class="bold" href="#">${post_data[i][4]} likes</a> -->
        150 liked
      </div>
      <!-- add comment -->
      <div class="add comment" style="float:left; width:100%;height:50px;position: relative; padding:15px">
        <img src="img/smile.PNG" style="width: 25px; height: 25px; left:0px; position:absolute; z-index: 1;">
        <input type="text" placeholder="Add a comment"
          style="border: none;height: 50px; padding-left:40px; outline:none;position:absolute;left:0;bottom: -17px;">
        <button class="comment-btn"
          style="border: none; background: none; color: rgb(0, 162, 255);position:absolute;right:0;top:10px">Post</button>
      </div>

    </div>
  </div>
  </div>

</body>

</html>
<script src="css/like.js"></script>