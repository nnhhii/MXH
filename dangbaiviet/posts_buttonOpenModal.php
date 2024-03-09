<?php
require 'posts_connect.php';
while ($row = mysqli_fetch_assoc($result_buttonOpenModal)) {
  $sql_like_count = "SELECT count(like_by) AS like_count FROM post_function WHERE post_id = " . $row["post_id"] . " " ;
  $result_like_count = mysqli_query($conn, $sql_like_count);
  $row_like_count = mysqli_fetch_assoc($result_like_count);

  $sql_cmt_count = "SELECT count(comment_by) AS comment_count FROM post_function WHERE post_id = " . $row["post_id"] . " " ;
  $result_cmt_count = mysqli_query($conn, $sql_cmt_count);
  $row_cmt_count = mysqli_fetch_assoc($result_cmt_count);
?>

    <div class="container" style="width:100%;margin-top:5%;padding-left:19vh">
      <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#myModal_<?php echo $row['post_id']; ?>"
        style="padding: 0px; border: 0px; width: 45vh;height: 45vh;float:left; margin-right:2vh">

        <?php
        // Tách thành một mảng
        $images = explode(",", $row['image']);
        $num_images = count($images);
        // Lấy giá trị đầu tiên trong mảng
        $first_image = reset($images);
        ?>
        <div class="gallery-item">
          <div style="background-image:url('img/<?php echo $first_image; ?>');background-size:cover; background-position:center;width: 45vh;height: 45vh;"></div>
          <?php if ($num_images > 1) { ?>
            <div class="gallery-item-type">
              <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>
            </div>
          <?php } ?>

          <div class="gallery-item-info">
            <ul>
              <li class="gallery-item-likes">
                <i class="fas fa-heart"aria-hidden="true"></i>
                <?php echo $row_like_count['like_count'] ?>
              </li>
              <li class="gallery-item-comments">
                <i class="fas fa-comment" aria-hidden="true"></i>
                <?php echo $row_cmt_count['comment_count'] ?>
              </li>
            </ul>
          </div>
        </div>
      </button>
      <!-- The Modal -->
      <?php include 'dangbaiviet/posts_modal.php'?>
    </div>
        
<?php } ?>


<script>
  $(document).ready(function () {
          // Kiểm tra trạng thái like của mỗi bài viết khi tải trang
          $('.like-button, .like-button-modal').each(function() {
          var post_id = $(this).data('postid');
          var like_by = $(this).data('byid');

          $.ajax({
              url: 'dangbaiviet/trangthai_like.php',
              type: 'POST',
              data: {
                  post_id: post_id,
                  user_id: like_by
              },
              success: function(response) {
                  if (response === "liked") {
                      var button = $('.like-button[data-postid="' + post_id + '"], .like-button-modal[data-postid="' + post_id + '"]');
                      // Cập nhật trạng thái like
                      button.toggleClass('liked', true);
                  }
              }
          });
      });



      $('.like-button, .like-button-modal').click(function() {
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        var like_by = $(this).data('byid');

        // Thay đổi trạng thái của nút like ngay lập tức
        $(this).toggleClass('liked');
        var isLiked = $(this).hasClass('liked');

        $.ajax({
          url: 'dangbaiviet/update_like_count.php',
          type: 'POST',
          data: {
            'post_id': post_id,
            'post_by': post_by,
            'like_by': like_by,
            'isLiked': isLiked
          },
          success: function (response) {
            var button = $('.like-button[data-postid="' + post_id + '"], .like-button-modal[data-postid="' + post_id + '"]');
            // Cập nhật số lượng like 
            button.parent().find('.like_count').text(response);
            // Cập nhật trạng thái like 
            button.toggleClass('liked', isLiked);
          }
        });
      });

      $('.submit_cmt').on('click', function () {
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        var comment_by = $(this).data('byid');
        var cmt_content = $('textarea[name="cmt_content_' + post_id + '"]').val()

        if (cmt_content.trim() === "") {
            alert("Vui lòng nhập nội dung bình luận.");
            return; 
        }
        $.ajax({
          type: "POST",
          url: "dangbaiviet/get_comments.php",
          data: {
            post_id: post_id,
            post_by: post_by,
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

      $('.share_button, .share_button_modal').on('click', function () {
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        // Thu thập dữ liệu từ các checkbox đã chọn
        var selectedValues = [];
        $('input[name="share_to"]:checked').each(function () {
          selectedValues.push($(this).val());
        });
        $.ajax({
          url: 'dangbaiviet/share/posts_share.php',
          type: 'post',
          data: {
            share_by: $('input[name="share_by"]').val(),
            post_id: post_id,
            post_by: post_by,
            share_to: selectedValues // Gửi mảng các giá trị đã chọn
          },
          success: function (response) {
            alert(response);
          }
        });
      });

      
      $('.theAOpenModal, .theAOpenModal_Modal').on('click', function (e) {
          e.preventDefault();
          var post_id = $(this).data('postid');
          var post_by = $(this).data('postby');

          // Load tất cả bạn bè ban đầu
          loadAllFriends(post_id);
      });


      $('.timkiem1').on('input', function () {
          var timkiem = $(this).val();
          var postId = $(this).data('postid');
          var userId = $(this).data('userid');

          if (timkiem === '') {
              loadAllFriends(postId);
              return;
          }
          $.ajax({
              url: 'dangbaiviet/share/timkiem.php',
              method: 'POST',
              data: {
                  timkiem: timkiem,
                  post_id: postId,
                  user_id: userId
              },
              success: function (response) {
                  $('.hienthibanbe').html(response); 
              }
          });
      });

      // Hàm tải tất cả bạn bè
      function loadAllFriends(postId) {
          $.ajax({
              url: 'dangbaiviet/share/tatcabanbe.php',
              method: 'POST',
              data: {
                  post_id: postId
              },
              success: function (response) {
                  $('.hienthibanbe').html(response); 
              }
          });
      }


    // Kiểm tra trạng thái lưu của mỗi bài viết khi tải trang
      $('.luu, .save').each(function() {
        var post_id = $(this).data('postid');
        var user_id = $(this).data('byid');
        var icon = $(this).find('i');

        $.ajax({
            url: 'menu/trangthailuu.php',
            type: 'POST',
            data: {
                post_id: post_id,
                user_id: user_id
            },
            success: function(response) {
                if (response === "saved") {
                    icon.removeClass('fa-regular fa-bookmark').addClass('fa-solid fa-bookmark');
                } else {
                    icon.removeClass('fa-solid fa-bookmark').addClass('fa-regular fa-bookmark');
                }
            }
        });
    });

    // Cập nhật trạng thái lưu khi người dùng nhấp vào nút lưu
    $('.luu, .save').click(function() {
        var post_id = $(this).data('postid');
        var user_id = $(this).data('byid');
        var icon = $(this).find('i');

        $.ajax({
            url: 'menu/luubaiviet.php',
            type: 'POST',
            data: {
                post_id: post_id,
                user_id: user_id
            },
            success: function(response) {
                // Tìm tất cả các phần tử có cùng data-postid
                var samePostIdElements = $('.save[data-postid="' + post_id + '"], .luu[data-postid="' + post_id + '"]');

                if (response === "success") {
                    samePostIdElements.find('i').removeClass('fa-regular fa-bookmark').addClass('fa-solid fa-bookmark');
                } else if (response === "deleted") {
                    samePostIdElements.find('i').removeClass('fa-solid fa-bookmark').addClass('fa-regular fa-bookmark');
                }
            }
        });
    });


});
  </script>



