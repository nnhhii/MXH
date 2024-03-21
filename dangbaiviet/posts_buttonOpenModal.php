<div class="post_TCN" style="margin:2% 15%; width: 90%;float:left">
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

  <!-- Button to Open the Modal -->
  <button type="button" class="btn p-0" data-toggle="modal" data-target="#myModal_<?php echo $row['post_id'] ?>" style="float:left; margin:1vh">
    <div class='gallery-item' style='width:22vw;height:22vw;overflow:hidden'>
    <?php
      // Tách thành một mảng
      $images = explode(",", $row['image']);
      $num_images = count($images);
      // Lấy giá trị đầu tiên trong mảng
      $first_image = reset($images);

      $extension = pathinfo($first_image, PATHINFO_EXTENSION);
      if(in_array($extension, ['mp4', 'avi', 'mov'])) { 
          echo "<video width='100%'>
                  <source src='img/$first_image' type='video/$extension'>
                </video>";
      } else {
          echo "<div style='background-image:url(\"img/$first_image\");background-size:cover;background-position:center;width: 22vw;height: 22vw;'></div>";
      }
      ?>
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
  <?php } ?>
</div>



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
          url: "dangbaiviet/comments.php",
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
            url: 'dangbaiviet/trangthailuu.php',
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
            url: 'dangbaiviet/luubaiviet.php',
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

<!-- LUOT ANH -->
<script>
  function initSliders() {
    const sliders = document.querySelectorAll('.slide-show');
    sliders.forEach((slider, index) => {
      const sliderController = new SliderController(slider, index);
    });
  }

  function SliderController(slider, index) {
    const listElement = slider.querySelector('.list-images');
    const imgs = slider.querySelectorAll('.list-images img, .list-images video');
    const btnLeft = slider.querySelector('.btn-left');
    const btnRight = slider.querySelector('.btn-right');
    const length = (imgs.length);
    let current = 0;

    const updateButtonVisibility = () => {
      if (current === 0) {
        btnLeft.style.display = 'none';
      } else {
        btnLeft.style.display = 'block';
      }

      if (current === length - 1) {
        btnRight.style.display = 'none';
      } else {
        btnRight.style.display = 'block';
      }
    };

    const updateActiveIndex = () => {
      slider.querySelector('.index-item.active').classList.remove('active');
      slider.querySelector('.index-item-' + current).classList.add('active');
    };

    const handleChangeSlide = (direction) => {
      if (direction === 'right') {
        current = (current + 1) % length;
      } else if (direction === 'left') {
        current = (current - 1 + length) % length;
      }

      let width = imgs[0].offsetWidth;
      listElement.style.transform = `translateX(${-width * current}px)`;

      updateButtonVisibility();
      updateActiveIndex();
    };

    btnRight.addEventListener('click', () => {
      handleChangeSlide('right');
    });

    btnLeft.addEventListener('click', () => {
      handleChangeSlide('left');
    });

    // Khởi tạo hiển thị ban đầu
    updateButtonVisibility();
  }

  // Gọi hàm khởi tạo sliders khi trang được load
  document.addEventListener('DOMContentLoaded', initSliders);


</script>

