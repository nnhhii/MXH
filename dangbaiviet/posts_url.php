<?php
require 'posts_connect.php';
$post_id=$_GET['post_id'];

$sql_p = "SELECT * FROM posts 
  inner JOIN user ON posts.post_by = user.user_id where post_id=$post_id";
$result_p = mysqli_query($conn, $sql_p);
$row = mysqli_fetch_array($result_p);

// Kiểm tra xem người dùng đã thích bài viết hay chưa
$sql_check = "SELECT * FROM likes WHERE post_id = " . $post_id . " AND like_by = $user_id";
$result = mysqli_query($conn, $sql_check);
$liked_class = "";
if (mysqli_num_rows($result) > 0) {
    // Người dùng đã thích bài viết => thêm class 'liked' vào nút like
    $liked_class = " liked";
}
?>
                <!-- The Modal -->
                <div id="myModal_<?php echo $row['post_id'] ?>">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content" style="width: 125vh;margin: 10vh 0 0 25vh;height: 80vh;border: 1px solid lightgray;border-radius:7px">
                      <div class="modal-body" style="padding:0">
                        <!-- left -->
                        <!-- left -->
                <div class="slide-show anh_post" style="width:65vh;height:80vh">
                  <div class="list-images">

                    <?php
                    // Tách thành một mảng
                    $images = explode(",", $row['image']);
                    $num_images = count($images);
                    ?>

                    <!-- Sau đó, sử dụng vòng lặp để tạo thẻ <img> cho mỗi ảnh -->
                    <?php foreach ($images as $img): ?>
                      <img src="img/<?php echo $img; ?>" width="100%" alt="">
                    <?php endforeach; ?>

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
                            <a href="index.php?pid=2&&m_id=<?php echo $row["user_id"]?>" style="color:black;text-decoration:none">
                              <div class="ava_user_post"style="background-image:url('img/<?php echo $row["avartar"];?>')">
                              <div class="name_user_post"><?php echo $row["username"]?></div>
                            </a>
                          </div>
                        

                          <!-- view comment -->
                          <div style="height: 50vh;overflow: auto;width:55vh">
                          <?php 
                          $ketnoi=new mysqli("localhost","root","","mxh");
                          $post_id=$row["post_id"];
                          $sql_cmt="select * from comment inner join user on comment.comment_by=user.user_id where post_id='$post_id'";
                          $result_cmt=$ketnoi->query($sql_cmt);
                          if ($result_cmt->num_rows > 0) {
                            while($row_cmt=$result_cmt->fetch_assoc()){?>
                            <div class="layout_cmt">
                              <div class="ava_user_cmt"style="background-image:url('img/<?php echo $row_cmt["avartar"]?>')"></div>
                              <div class="name_user_cmt"><?php echo $row_cmt["username"]?></div>
                              <div class="cmt_content"><?php echo $row_cmt["cmt_content"]?></div><br>
                              <div class="cmt_time"><?php echo $row_cmt["comment_time"]?></div>
                            </div>
                            <?php 
                            }
                          }else{?>
                            <div style="margin: 35% auto">
                              <div style="font-size: 20px;font-weight: bold;text-align:center;">Chưa có bình luận nào.</div>
                              <div style="font-size: 14px;text-align:center">Hãy bắt đầu bình luận!</div>
                            </div> 
                            <?php
                          }?>
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
                              <span class="like_count" style="padding-left:7px"><?php echo $row['like_count'];?></span>
                            </form>
                            <div class="cmt"style="float:left"> 
                              <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
                                <img src="img/bubble-chat.png" style="width: 25px; height: 25px;margin:5px">
                              </button>
                            </div>
                            <div class="share"style="float:left">
                              <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#send_message_modal">
                                <i class="fa-regular fa-paper-plane"></i>
                              </button>
                            </div>
                            <div class="save not_saved" data-postid="<?php echo $row["post_id"]; ?>" data-saveby="<?php echo $user_id;?>"" style="float:right">
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
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <script>
    $(document).ready(function () {
      $('.like-button').on('click', function (e) {
        e.preventDefault();
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        var like_by = $('input[name="like_by"]').val();

        // Thay đổi trạng thái của nút like ngay lập tức
        $(this).toggleClass('liked');
        var isLiked = $(this).hasClass('liked');

        var likeButton = $(this); // Lưu trữ nút like hiện tại

        $.ajax({
          url: 'dangbaiviet/update_like_count.php',
          type: 'POST',
          data: {
            'post_id': post_id,
            'post_by': post_by,
            'like_by': like_by,
            'isLiked': isLiked
          },
          success: function (data) {
            // Cập nhật số lượng like trên trang web
            likeButton.parent().find('.like_count').text(data);
          }
        });
      });



      $('.submit_cmt').on('click', function (event) {
        event.preventDefault();
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        var comment_by = $(this).data('cmtby');
        var cmt_content = $('textarea[name="cmt_content_' + post_id + '"]').val()
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


      $('.send_post_btn').on('click', function (e) {
        e.preventDefault();
        var post_id = $(this).data('postid');
        var post_by = $(this).data('postby');
        // Thu thập dữ liệu từ các checkbox đã chọn
        var selectedValues = [];
        $('input[name="share_to"]:checked').each(function () {
          selectedValues.push($(this).val());
        });
        $.ajax({
          url: 'dangbaiviet/posts_share.php',
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

      $('.timkiem1').on('input', function () {
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
          success: function (response) {
            $('.ketquatimkiem').html(response);
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
      const imgs = slider.querySelectorAll('.list-images img');
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

     // luu bai viet
     $(document).ready(function() {
    // Kiểm tra trạng thái lưu của mỗi bài viết khi tải trang
    $('.save, .luu').each(function() {
        var post_id = $(this).data('postid');
        var user_id = $(this).data('saveby');
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
    $('.save, .luu').click(function() {
        var post_id = $(this).data('postid');
        var user_id = $(this).data('saveby');
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