<?php
require 'posts_connect.php';
$post_id=$_GET['post_id'];

$sql_p = "SELECT * FROM posts inner JOIN user ON posts.post_by = user.user_id where post_id=$post_id";
$result_p = mysqli_query($conn, $sql_p);
$row = mysqli_fetch_array($result_p);


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
<style>
  .like-button-modal-url {
    display: flex;
    transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    filter: grayscale(100%);
    padding:4px 0 3px 0;
}
.like-button-modal-url.liked{
    filter: grayscale(0);
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- The Modal -->
        <div  id="myModal_<?php echo $row['post_id'] ?>">
          <div class="modal-dialog modal-xl">
            <div class="modal-content" style="width: 125vh;margin: 10vh 0 0 25vh;height: 80vh;border: 1px solid lightgray;border-radius:7px">
              <div class="modal-body" style="padding:0">
                <!-- left -->
                <div class="slide-show anh_post" style="width:65vh;height:80vh">
                  <div class="list-images">

                  <?php
                  // Tách thành một mảng
                  $images = explode(",", $row['image']);
                  $num_images = count($images);

                  // Sử dụng vòng lặp để tạo thẻ div, video
                  foreach ($images as $img):
                    $extension = pathinfo($img, PATHINFO_EXTENSION);
                    if(in_array($extension, ['mp4', 'avi', 'mov'])) {
                      echo "<video width='100%' controls>
                              <source src='img/$img' type='video/$extension'>
                            </video>";
                    } else {
                      echo "<img src='img/$img' width='100%'>";
                    }
                  endforeach
                  ?>

                  </div>

                  <?php if ($num_images > 1): ?>
                    <div class="btns">
                      <div class="btn-left btnsl"><i class='bx'></i></div>
                      <div class="btn-right btnsl"><i class='bx'></i></div>
                    </div>
                    <div class="index-images">
                      <?php for ($i = 0; $i < $num_images; $i++): ?>
                        <div class="index-item index-item-<?php echo $i; ?><?php echo ($i === 0) ? ' active' : ''; ?>">
                        </div>
                      <?php endfor; ?>
                    </div>
                  <?php endif; ?>
                </div>
                <!-- right -->
                <div class="layout_phai" style="width:59.5vh">
                  <div class="layout_user_post">
                    <a href="<?php echo $row['user_id'] == $user_id ? "index.php?pid=1&&user_id=".$row['user_id'] : "index.php?pid=2&&m_id=".$row['user_id']?>"style="color:black;text-decoration:none">
                      <div class="ava_user_post" style="background-image:url('img/<?php echo $row["avartar"]?>')"></div>
                      <div class="name_user_post" style="float:left"><?php echo $row["username"]?></div><br>
                    </a>
                    <div class="time_user_post"><?php echo $time_description?></div>
                    <div style="float:left;color:gray;font-size:13px;margin-top:5px"><?php echo $status_icon?></div>
                    <div class="chinhsuaa" style="<?php echo $row['user_id'] == $user_id ? 'display:block' : 'display:none'?>;right:5px;top:15px">
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


                  <!-- view comment -->
                  <div class="view_cmt" data-postid="<?php echo $row["post_id"]; ?>" style="height: 50vh;overflow: auto">
                    <?php if($row["content"]!=null){?>
                    <div class="layout_cmt">
                      <div class="ava_user_cmt" style="background-image:url('img/<?php echo $row["avartar"] ?>')"></div>
                      <div class="gop_cmt" style="width:auto">
                        <div class="name_user_cmt"><?php echo $row["username"] ?></div>
                        <div class="cmt_content"><?php echo $row["content"] ?></div><br>
                        <div class="cmt_time"><?php echo $time_description ?></div>
                      </div>
                    </div>
                    <?php }?>
                    <?php
                    $ketnoi = new mysqli("localhost", "root", "", "mxh");
                    $post_id = $row["post_id"];
                    $sql_cmt = "select * from post_function inner join user on post_function.comment_by=user.user_id where post_id='$post_id'";
                    $result_cmt = $ketnoi->query($sql_cmt);
                    if ($result_cmt->num_rows > 0) {
                      while ($row_cmt = $result_cmt->fetch_assoc()) { ?>
                        <div class="layout_cmt">
                          <div class="ava_user_cmt" style="background-image:url('img/<?php echo $row_cmt["avartar"] ?>')"></div>
                          <div class="gop_cmt" style="width:auto">
                            <div class="name_user_cmt"><?php echo $row_cmt["username"] ?></div>
                            <div class="cmt_content"><?php echo $row_cmt["cmt_content"] ?></div><br>
                            <div class="cmt_time"><?php echo $row_cmt["comment_time"] ?></div>
                          </div>
                        </div>
                      <?php
                      }
                    } else { ?>
                      <div class="chuacobinhluan" style="margin: 35% auto">
                        <div style="font-size: 20px;font-weight: bold;text-align:center">Chưa có bình luận nào.</div>
                        <div style="font-size: 14px;text-align:center">Hãy bắt đầu bình luận!</div>
                      </div>
                      <?php
                    } ?>
                  </div>

                  <!--footer  -->
                  <div class="footer"style="width:100%; height:6vh;padding:10px; float:left; border-top: lightgray solid 1px;">
                  <!-- Like icon -->
                    <form method="post" action="" style="float:left; cursor:pointer; margin-left:5px;">
                      <a class="like-button-modal-url" data-postid="<?php echo $row["post_id"]?>" data-byid="<?php echo $user_id?>" data-postby="<?php echo $row["post_by"]; ?>">
                        <span class="like-icon">
                          <div class="heart-animation-1"></div>
                          <div class="heart-animation-2"></div>
                        </span>
                      </a>
                      <span class="like_count" style="padding-left:7px">
                        <?php echo $row_like_count['like_count']; ?>
                      </span>
                    </form>
                    <div class="cmt" style="float:left">
                      <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
                        <img src="img/bubble-chat.png" style="width: 25px; height: 25px;margin:5px">
                      </button>
                    </div>
                    
                    
                    <!-- Share icon -->
                    <a data-toggle="modal" href='#modal-id-share-modal_<?php echo $row["post_id"] ?>' style="color:black" class="theAOpenModal_Modal"><i class="fa-regular fa-paper-plane"></i></a>
                    <div class="modal fade" id="modal-id-share-modal_<?php echo $row["post_id"] ?>">
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


                    <div class="save not_saved" data-postid="<?php echo $row["post_id"]; ?>" data-byid="<?php echo $user_id;?>" style="float:right">
                      <i class="fa-regular fa-bookmark" style="scale:1.5;margin: 10px"></i>
                    </div>
                    <!-- add comment -->
                    <div style="float:left; width:100%;height:50px;position: relative; padding:7px;top:-25px">
                      <form method="post" enctype="multipart/form-data">
                        <textarea name="cmt_content_<?php echo $row["post_id"]?>" placeholder="Thêm bình luận"
                          style="width:80%; height:11vh;resize: none; padding:5px 0 0 10px; position:absolute; left:4vh;top:0;border-radius:20px;border:1px solid lightgray"></textarea>
                        <button type="button" class="comment-btn submit_cmt_url" data-postid="<?php echo $row["post_id"]; ?>" data-postby="<?php echo $row["post_by"]; ?>"
                          data-byid="<?php echo $user_id; ?>"
                          style="border: none; background: none; color: rgb(0, 162, 255); position:absolute; right:0; top:10px;">Post</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                
        <script>
  $(document).ready(function () {
          // Kiểm tra trạng thái like của mỗi bài viết khi tải trang
          $('.like-button-modal-url').each(function() {
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
                      var button = $('.like-button-modal-url[data-postid="' + post_id + '"]');
                      // Cập nhật trạng thái like
                      button.toggleClass('liked', true);
                  }
              }
          });
      });



      $('.like-button-modal-url').click(function() {
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
            var button = $('.like-button-modal-url[data-postid="' + post_id + '"]');
            // Cập nhật số lượng like 
            button.parent().find('.like_count').text(response);
            // Cập nhật trạng thái like 
            button.toggleClass('liked', isLiked);
          }
        });
      });

      $('.submit_cmt_url').on('click', function () {
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
