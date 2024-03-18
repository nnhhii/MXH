
<head>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="css/luot_anh.css">
  <link rel="stylesheet" href="css/cmt.css">
  <link rel="stylesheet" href="css/like.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

  <style>
    .bai {
      text-align: center;
      width: 470px;
      border-bottom: 1px solid #ccc;
      margin: 10px -10px;
      float: left;
    }

    .user-info {
      display: flex;
      margin: 15px;
      position: relative;
    }

    .avtbai {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-image: url('img/65a8d102a1c4b-Screenshot 2024-01-18 112403.png');
      background-size: cover;
    }

    hr {
      border-top: 1px solid #ccc;
      margin: 10px 0
    }

    .like_count {
      font-size: 14px;
      font-weight: 600;
      float: left;
      text-align: left;
      width: 100%;
    }

    .content {
      padding-left: 10px;
      text-align: left;
      color: #555555;
    }

    .fa-paper-plane {
      float: left;
      margin: 10px;
      scale: 1.3;
      cursor: pointer;
      padding: 2px
    }
    .luu {
      position: absolute;
      scale: 1.5;
      right: 0px
    }
    
    .like-button, .like-button-modal {
    display: flex;
    transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    filter: grayscale(100%);
    padding:4px 0 3px 0;
}
    .like-button.liked,.like-button-modal.liked{
    color: red;
    filter: grayscale(0);
}
  </style>

  
  <?php
    require 'posts_connect.php';
    if (isset($_POST['btn_submit'])) {
      $post_by = $_POST['post_by'];
      $content = $_POST['content'];
      $statuss = $_POST['statuss'];
      $p_time = date("Y-m-d H:i:s");
      // Upload ảnh 
      $all_files = $_FILES['images'];
      $image_name = $_FILES['images']['name'];
      $image_tmp = $_FILES['images']['tmp_name'];
      $location = "img/";
      $image = implode(",", $image_name);

      if (!empty($image_name)) {
        foreach ($image_name as $key => $val) {
          $targetPath = $location . $val;
          move_uploaded_file($_FILES['images']['tmp_name'][$key], "$targetPath");
        }
      }

      $sql = "INSERT INTO posts(post_by,content,image,statuss,post_time ) VALUES ($post_by,  '$content', '$image','$statuss', '$p_time' )";

      if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Đăng bài viết thành công!");
                   window.location.href = "index.php";
                  exit();
               </script>';
      }
    }

$sql_p = "SELECT * FROM posts 
        INNER JOIN user ON posts.post_by = user.user_id
        LEFT JOIN friendrequest ON ((sender_id = $user_id and receiver_id = user_id) or (sender_id = user_id and receiver_id = $user_id))
        WHERE status='bạn bè' and statuss !='only_me' or post_by = $user_id
        ORDER BY post_id DESC";

    $result_p = mysqli_query($conn, $sql_p);
    while ($row = mysqli_fetch_array($result_p)) {
      $sql_like_count = "SELECT count(like_by) AS like_count FROM post_function WHERE post_id = " . $row["post_id"] . " " ;
      $result_like_count = mysqli_query($conn, $sql_like_count);
      $row_like_count = mysqli_fetch_assoc($result_like_count);
      
      $current_time = time();
      $post_time = strtotime($row["post_time"]);
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

      $status_icon = '';
      if ($row['statuss'] == 'public') {
        $status_icon = ' <i class="fa-solid fa-earth-americas"></i>';
      } elseif ($row['statuss'] == 'friend') {
        $status_icon = ' <i class="fa-solid fa-user-group"></i>';
      } else {
        $status_icon = ' <i class="fa-solid fa-lock"></i>';
      }
?>

      <div class="bai">
        <div class="user-info">
        <div class="avtbai" style="background-image:url('img/<?php echo $row["avartar"]?>');cursor:pointer" onclick="window.location.href='<?php echo $row['user_id'] == $user_id ? "index.php?pid=1&&user_id=".$row['user_id'] : "index.php?pid=2&&m_id=".$row['user_id']; ?>'"></div>
          <div style="font-size:15px;font-weight:500; margin:0 7px;height:fit-content">
            <?php echo $row["username"]?>
          </div>
          <div style="height:fit-content;position:absolute;left:50px;top:20px;font-size:13px;color:gray">
            <?php echo $time_description; echo $status_icon;?>
          </div>

          <div class="chinhsuaa" style="<?php echo $row['user_id'] == $user_id ? 'display:block' : 'display:none'  ?>">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false" style="width:30px;height:30px;background-color:transparent;border:none;color:black">
              <i class="fa-solid fa-ellipsis-vertical"></i>
            </button>
            <ul class="dropdown-menu">
              <button type="button" class="dropdown-item edit"><a href="index.php?pid=15&&post_id=<?php echo $row["post_id"]?>&&statuss=<?php echo $row["statuss"]?>">
                Chỉnh sửa bài viết</a>
              </button>
              <button class="dropdown-item delete">
                <a href="dangbaiviet/posts_delete.php?post_id=<?php echo $row["post_id"]?>">
                <i class="fa-solid fa-trash" style="color: red;"></i> Xóa</a>
              </button>
            </ul>
          </div>
        </div>
        <div class="content">
          <?php echo $row['content'] ?>
        </div>
        <!-- ----------------------- -->
        <div class="slide-show" style="width:470px; margin:10px 0;max-height:600px;border-radius:10px">
          <div class="list-images" style="width:max-content">

          <?php
          // Tách thành một mảng
          $images = explode(",", $row['image']);
          $num_images = count($images);

          // Sử dụng vòng lặp để tạo thẻ <div> cho mỗi ảnh
          foreach ($images as $img): 
            $extension = pathinfo($img, PATHINFO_EXTENSION);
            if(in_array($extension, ['mp4', 'avi', 'mov'])) {
              echo "<video width='470' height='600' controls>
                      <source src='img/$img' type='video/$extension'>
                    </video>";
            } else {
              echo "<div style='background-image:url(\"img/$img\");background-position: center;background-size:cover;width: 470px;height:600px;border-radius:10px'></div>";
            }
          endforeach;
          ?>


          </div>

          <?php if ($num_images > 1): ?>
            <div class="btns">
              <div class="btn-left btnsl"><i class='bx'></i></div>
              <div class="btn-right btnsl"><i class='bx'></i></div>
            </div>
            <div class="index-images">
              <?php for ($i = 0; $i < $num_images; $i++): ?>
                <div class="index-item index-item-<?php echo $i; ?><?php echo ($i === 0) ? ' active' : ''; ?>"></div>
              <?php endfor; ?>
            </div>
          <?php endif; ?>

        </div>

        <!-- Like Icon -->
        <form method="post" style="float:left; cursor:pointer">
          <a class="like-button" data-postid="<?php echo $row["post_id"]; ?>" data-byid="<?php echo $user_id?>" data-postby="<?php echo $row["post_by"]; ?>">
            <span class="like-icon">
              <div class="heart-animation-1"></div>
              <div class="heart-animation-2"></div>
            </span>
          </a>
          <span class="like_count">
            <?php echo $row_like_count['like_count']; ?>
          </span>
        </form>

        <!-- Comment Icon -->
        <div style="float:left;">
          <button type="button" class="btn p-0" data-toggle="modal" data-target="#myModal_<?php echo $row['post_id'] ?>">
            <img src="img/bubble-chat.png" style="width: 25px; height: 25px;margin:5px">
          </button>
        </div>

        <!-- The Modal -->
        <?php include 'dangbaiviet/posts_modal.php'?>
      
        <!-- Share icon -->
        <a data-toggle="modal" href='#modal-id-share_<?php echo $row["post_id"] ?>' style="color:black" class="theAOpenModal"><i class="fa-regular fa-paper-plane"></i></a>
        <div class="modal fade" id="modal-id-share_<?php echo $row["post_id"] ?>">
          <div class="modal-dialog">
            <form action="" enctype="multipart/form-data" method="post">
              <div class="modal-content" style="width:480px;height:420px; border-radius:15px;margin-top:20vh">
                <div class="modal-header" style="border-bottom: 1px solid #DBDBDB;height:50px">
                  <h5 class="modal-title" style="position:absolute;left:42%;text-align:center;">Chia sẻ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="border:none;padding:30px;background:none;position:absolute;right:0">&times;</button>
                </div>
                <div class="modal-body" style="padding:0;overflow:auto">
                  <!-- Search -->
                  <form action="" enctype="multipart/form-data" method="post">
                    <i style="top:12px;position: absolute;left:13px" class="fa-solid fa-magnifying-glass"></i>
                    <input class="timkiem1" name="timkiem1" data-userid="<?php echo $user_id ?>"
                      data-postid="<?php echo $row["post_id"] ?>"
                      style="width:100%;height: 40px;outline: none;padding-left: 45px;border: none;border-bottom: 1px solid #DBDBDB;">
                  </form>
                  <div class="hienthibanbe"></div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary share_button"
                    data-postid="<?php echo $row["post_id"] ?>" data-postby="<?php echo $row["post_by"]?>">Gửi</button>
                </div>
              </div>
            </form>
          </div>
        </div>
                   
        <!-- Save icon -->
        <div class="luu" data-postid="<?php echo $row["post_id"]; ?>" data-byid="<?php echo $user_id?>" style="float:right">
          <i class="fa-regular fa-bookmark"></i></div><br>
      </div>
<?php
}
?>

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
              loadAllFriends();
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
      function loadAllFriends() {
          $.ajax({
              url: 'dangbaiviet/share/tatcabanbe.php',
              method: 'POST',
              data: {
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
      const imgs = slider.querySelectorAll('.list-images div, .list-images img,.list-images video');
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