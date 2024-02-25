<style>
.mess1{
  width: 100%;
  height: 80px;
  float: left;
  color: black;
  transition: 0.2s;
}
.mess1:hover{
  background-color: rgb(247, 247, 247);
}
.col_left > a >.mess1.active {
  background-color: rgb(229, 228, 228)
}
.ava{
  background-size: cover;
  border-radius: 50%;
  padding:30px;
  margin: 10px 0 0 10px;
  float: left;
  cursor: pointer;
}
.username{
  float: left;
  font-size: 14px; 
  margin: 18px 0 0 10px;
  font-family:'Segoe UI', Tahoma,Verdana, sans-serif;
  cursor: pointer;
  font-weight: 500;
}
.mini_content{
  float: left;
  font-size: 12px; 
  margin: -5px 0 0 10px;
  font-family:'Segoe UI', Tahoma,Verdana, sans-serif;
  color: gray;
}
</style>
<!-- left -->
<div class="anh_post">
  <div
    style="background-image:url('img/<?php echo $row['image'] ?>');width:75vh;height:93.8vh;border-radius:7px 0 0 7px ; background-position: center; background-size:cover;">
  </div>
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
<div class="view_cmt" data-postid="<?php echo $row["post_id"]; ?>" style="height: 60vh;overflow-y: scroll;">
  <?php
  $post_id = $row["post_id"];
  $sql_cmt = "select * from comment inner join user on comment.comment_by=user.user_id where post_id='$post_id'";
  $result_cmt = $ketnoi->query($sql_cmt);
  if ($result_cmt->num_rows > 0) {
    while ($row_cmt = $result_cmt->fetch_assoc()) { ?>
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
      <?php
    }
  } else { ?>
    <div class="chuacobinhluan"style="margin: 35% auto">
      <div style="font-size: 20px;font-weight: bold;">Chưa có bình luận nào.</div>
      <div style="font-size: 14px;text-align:center">Hãy bắt đầu bình luận!</div>
    </div>
    <?php
  } ?>
</div>

<!--footer  -->
<div class="footer" style="width:100%; height:6vh;padding:10px; float:left; border-top: lightgray solid 1px;">
  <form id="likeForm" method="post" action="" style="float:left; cursor:pointer; margin-left:5px;">
    <input type="hidden" name="post_id" value="<?php echo $row["post_id"] ?>">
    <input type="hidden" name="like_by" value="<?php echo $user_id ?>">
    <a class="like-button<?php echo $liked_class; ?>" data-postid="<?php echo $row["post_id"]; ?>">
      <span class="like-icon">
        <div class="heart-animation-1"></div>
        <div class="heart-animation-2"></div>
      </span>
    </a>
    <span class="like_count" style="padding-left:7px">
      <?php echo $row['like_count']; ?>
    </span>
  </form>
  <div class="cmt" style="float:left">
    <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
      <img src="img/bubble-chat.png" style="width: 25px; height: 25px;margin:5px">
    </button>
  </div>
  <div class="share" style="float:left">
    <!-- Share icon -->
    <a data-toggle="modal" href='#modal-id-share_<?php echo $row["post_id"]?>'style="color:black"><i class="fa-regular fa-paper-plane"></i></a>
            <div class="modal fade" id="modal-id-share_<?php echo $row["post_id"]?>">
              <div class="modal-dialog">
                <form action="" enctype="multipart/form-data" method="post">
                  <div class="modal-content" style="width:480px;height:420px; border-radius:15px;margin-top:20vh">
                    <div class="modal-header"style="border-bottom: 1px solid #DBDBDB">
                      <h5 class="modal-title" style="position:absolute;left:42%;padding:10px;text-align:center;">Chia sẻ</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:0;overflow:auto">
                      <!-- Search -->
                      <form action="" enctype="multipart/form-data" method="post">
                        <i style="top:12px;position: absolute;left:13px" class="fa-solid fa-magnifying-glass"></i>
                        <input class="timkiem1"name="timkiem1" data-userid="<?php echo $user_id?>"data-postid="<?php echo $row["post_id"]?>"style="width:100%;height: 40px;outline: none;padding-left: 45px;border: none;border-bottom: 1px solid #DBDBDB;">
                      </form>
                      <div class="ketquatimkiem"></div>
                      <?php
                      if(empty($_POST["timkiem1"])) {
                        $ketnoi= new mysqli('localhost','root','','mxh');
                        $friend = "SELECT * FROM user 
                        LEFT JOIN friend ON (friend.user_id1 = $user_id AND friend.user_id2 = user.user_id) OR (friend.user_id1 = user.user_id AND friend.user_id2 = $user_id)
                        WHERE friend.user_id1 IS NOT NULL OR friend.user_id2 IS NOT NULL";
                        $result_fr = $ketnoi->query($friend);  
                        while($row_fr = $result_fr->fetch_assoc()) {
                      ?>
                          <label for="mess<?php echo $row["post_id"]?>_<?php echo $row_fr["user_id"] ?>" class="mess1">
                            <div class="ava" style="background-image: url('img/<?php echo $row_fr["avartar"]?>')"></div>
                            <div class="username"><?php echo $row_fr["username"]?></div><br><br>
                            <div class="mini_content"><?php echo $row_fr["email"]?></div>
                            <input type="hidden" name="share_by" value="<?php echo $user_id?>">
                            <input type="hidden" name="post_id" value="<?php echo $row["post_id"]?>">
                            <input type="checkbox"name="share_to" value="<?php echo $row_fr["user_id"]?>" id="mess<?php echo $row["post_id"]?>_<?php echo $row_fr["user_id"] ?>" style="float:right;margin:-20px 20px">
                          </label>
                      <?php
                        }
                      }
                      ?>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary send_post_btn" data-postid="<?php echo $row["post_id"]?>">Gửi</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
  </div>
  <div class="save not_saved" style="float:right">
    <i class="fa-regular fa-bookmark" style="scale:1.5;margin: 10px"></i>
  </div>
  <!-- add comment -->
  <div style="float:left; width:100%;height:50px;position: relative; padding:7px;">
    <form class="commentForm" method="post" enctype="multipart/form-data">
      <img src="img/smile.PNG"
        style="width: 25px; height: 25px; left:0px;top:13px;position:absolute; z-index: 1;">
      <textarea name="cmt_content_<?php echo $row["post_id"]; ?>"placeholder="Thêm bình luận"
        style="border: none; width:90%; height:7vh; padding:5px 0 0 40px; position:absolute; left:0"></textarea>
      <button type="button" class="comment-btn submit_cmt"
        data-postid="<?php echo $row["post_id"]; ?>" data-cmtby="<?php echo $user_id;?>"
        style="border: none; background: none; color: rgb(0, 162, 255); position:absolute; right:0; top:10px;">Post</button>
    </form>
  </div>
</div>


<script>
  $(document).ready(function () {


    // LIKE
    $('.like-button').off('click').on('click', function (e) {
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



    // COMMENT
    $('.submit_cmt').on('click', function (event) {
      event.preventDefault(); 
      var post_id = $(this).data('postid');
      var comment_by = $(this).data('cmtby');
      var cmt_content = $('textarea[name="cmt_content_' + post_id + '"]').val()
      $.ajax({
        type: "POST",
        url: "dangbaiviet/get_comments.php",
        data: {
          post_id: post_id,
          comment_by: comment_by,
          cmt_content: cmt_content
        },
        success: function (response) {
          var view_cmt = $('.view_cmt[data-postid="' + post_id + '"]');
          view_cmt.append(response);
          $('textarea[name="cmt_content_' + post_id + '"]').val('');
          view_cmt.find(".chuacobinhluan").remove();
          view_cmt.scrollTop(view_cmt[0].scrollHeight);
        }
      });
    });


    // SHARE
    $('.send_post_btn').on('click', function(e) {
      e.preventDefault(); 
      var post_id = $(this).data('postid');
      // Thu thập dữ liệu từ các checkbox đã chọn
      var selectedValues = [];
      $('input[name="share_to"]:checked').each(function() {
          selectedValues.push($(this).val());
      });
      $.ajax({
          url: 'dangbaiviet/posts_share.php', 
          type: 'post', 
          data: {
              share_by: $('input[name="share_by"]').val(),
              post_id: post_id,
              share_to: selectedValues // Gửi mảng các giá trị đã chọn
          },
          success:function(response){
              alert(response);
          }
      });
  });


  //TÌM KIẾM
  $('.timkiem1').on('input', function(){
        var timkiem = $(this).val();
        var postId = $(this).data('postid');
        var userId = $(this).data('userid');
        $.ajax({
            url: 'timkiem/timkiem.php', 
            method: 'POST',
            data: {
              timkiem: timkiem,
              post_id: postId,
              user_id: userId
            },
            success: function(response){
              $('.ketquatimkiem').html(response);
            }
        });
    });
});

</script>