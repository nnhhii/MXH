<body>
  <div>
    <!-- left -->
    <div style="width: 50%; float: left;">
      <img src="img/<?php echo $row_post['image']; ?>" alt="khong nhan duoc anh"
        style="width: 100%; height: 100%; height: 90vh;">
    </div>
    <!-- right -->
    <div class="layout_phai">
      <div class="layout_user_post">
        <a href="index.php?pid=2&&m_id=<?php echo $row["user_id"] ?>" style="color:black;text-decoration:none">
          <div class="ava_user_post" style="background-image:url('img/<?php echo $row["avartar"]; ?>')">
            <div class="name_user_post">
              <?php echo $row["username"] ?>
            </div>
        </a>
      </div>
    </div>
    <!-- view comment -->
    <div style="height: 60vh;overflow-y: scroll;">

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

          <div class="layout_cmt">
            <div class="ava_user_cmt" style="background-image:url('img/<?php echo $row_cmt["avartar"] ?>')"></div>
            <div class="name_user_cmt">
              <?php echo $row_cmt["username"] ?>
            </div>
            <div class="cmt_content">
              <?php echo $row_cmt["cmt_content"] ?>
            </div><br>
            <div class="cmt_time">
              <?php echo $row_cmt["comment_time"] ?>
            </div>
          </div>

          <br>
        <?php }
      } ?>
    </div>
    <!--footer  -->
    <div class="footer" style="width:100%; height:6vh;padding:10px; float:left; border-top: lightgray solid 1px;">
      <!-- like -->
      <div style=" display:flex;">
        <!-- <form id="likeForm" method="post" action=""
          style="float:left; cursor:pointer; margin-left:5px; margin-top: 0px;">
          <input type="hidden" name="post_id" value="<?php echo $row_post["post_id"] ?>">
          <input type="hidden" name="like_by" value="<?php echo $row["user_id"] ?>">
          <a class="like-button<?php echo $liked_class; ?>" data-postid="<?php echo $row_post["post_id"]; ?>">
            <span class="like-icon">
              <div class="heart-animation-1"></div>
              <div class="heart-animation-2"></div>
            </span>
          </a>
          <span class="like_count" style="padding-left:7px">
            <?php echo $row_post['like_count']; ?>
          </span>
        </form> -->
        <form class="likeForm" method="post" action=""
          style="float:left; cursor:pointer; margin-left:5px; margin-top: 0px;">
          <input type="hidden" name="post_id" value="<?php echo $row_post["post_id"] ?>">
          <input type="hidden" name="like_by" value="<?php echo $row["user_id"] ?>">
          <a class="like-button<?php echo $liked_class; ?>" data-postid="<?php echo $row_post["post_id"]; ?>">
            <span class="like-icon">
              <div class="heart-animation-1"></div>
              <div class="heart-animation-2"></div>
            </span>
          </a>
          <span class="like_count" style="padding-left:7px">
            <?php echo $row_post['like_count']; ?>
          </span>
        </form>

        <div class="cmt" style="float:left">
          <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
            <img src="img/bubble-chat.png" style="width: 25px; height: 25px;margin:5px">
          </button>
        </div>

        <div class="send">
          <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#send_message_modal">
            <img src="img/send.png" style="width: 20px; height: 20px;margin: 8px 10px;">
          </button>
        </div>

        <div class="save not_saved" style="float:right">
          <i class="fa-regular fa-bookmark" style="scale:1.5;margin: 10px"></i>
        </div>
      </div>
      <!-- add comment -->
      <div class="add comment" style="float:left; width:100%;height:50px;position: relative; padding-left:9px;">
        <form class="commentForm" action="dangbaiviet/get_comments.php" method="post" style=" margin-top: 0px;">
          <img src="img/smile.PNG" style="width: 25px; height: 25px; left:0px;top:13px;position:absolute; z-index: 1;">
          <input type="hidden" name="post_id" class="p_id" value="<?php echo $row_post['post_id'] ?>">
          <input type="hidden" name="comment_by" class="cmt_by" value="<?php echo $row['user_id'] ?>">
          <textarea name="cmt_content" placeholder="Add a comment" class="cmt"
            style="border: none;width:90%;height:7vh;padding:5px 0 0 40px; position:absolute; left:0"></textarea>
          <button type="submit" class="comment-btn button_comment"
            style="border: none; background: none; color: rgb(0, 162, 255); position:absolute; right:0; top:10px;">Post</button>
        </form>

        <!-- <script>
          $(".commentForm").submit(function (event) {
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
            $(document).ready(function () {
              $(".commentForm").submit(function (event) {
                event.preventDefault(); // Ngăn chặn sự kiện mặc định của form

                var post_id = $(this).find(".p_id").val();
                var comment_by = $(this).find(".cmt_by").val();
                var cmt_content = $(this).find(".cmt").val();

                $.ajax({
                  type: "POST",
                  url: "dangbaiviet/get_comments.php",
                  data: {
                    post_id: post_id,
                    comment_by: comment_by,
                    cmt_content: cmt_content
                  },
                  success: function (data) {
                    console.log("AJAX success");
                    alert("Đăng bình luận thành công!");
                    // Thực hiện các thao tác khác nếu cần
                  },
                  error: function () {
                    alert("Đã xảy ra lỗi khi đăng bình luận!");
                  }
                });
              });
            });
          });
        </script> -->
      </div>

    </div>
  </div>
</body>

</html>

<script>
  $(document).ready(function () {
    $('.like-button').on('click', function (e) {
      e.preventDefault();
      var post_id = $(this).data('postid');
      var like_by = $(this).closest('form').find('input[name="like_by"]').val();

      // Thay đổi trạng thái của nút like ngay lập tức
      $(this).toggleClass('liked');
      var isLiked = $(this).hasClass('liked');

      var likeButton = $(this); // Lưu trữ nút like hiện tại

      $.ajax({
        url: 'dangbaiviet/update_like_count.php',
        type: 'POST',
        data: {
          'post_id': post_id,
          'like_by': like_by,
          'isLiked': isLiked
        },
        success: function (data) {
          // Cập nhật số lượng like trên trang web
          console.log("AJAX success");
          likeButton.parent().find('.like_count').text(data);
        }
      });
    });
  });

</script>