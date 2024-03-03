<head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
  .hidden {
    display: none;
  }

  .bia {
    margin: 11vh 5% 0 5%;
    height: 34vw;
    width: 90%;
    border-radius: 5px;
  }

  .bia>.bia1 {
    float: right;
    width: 78%;
    background-size: cover;
    background-position: center;
    border-radius: 0 5px 5px 0;
    height: 34vw;
    position: relative;
  }

  .bia>.khungcanhan {
    background: linear-gradient(to bottom, gray, white);
    float: left;
    height: 34vw;
    width: 22%;
    border-radius: 5px 0 0 5px;
    position: relative;
  }

  .bia>.khungcanhan>.canhan1 {
    height: 15vh;
    position: relative;
    padding: 9vh 0 2vh 0
  }

  .bia>.khungcanhan>.canhan1>.anhdaidien {
    background-size: cover;
    background-position: center;
    width: 15vh;
    height: 15vh;
    border-radius: 50%;
    margin: auto;
    border: 3px solid white;
    position: relative;
  }

  .bia>.khungcanhan>.name {
    font-family: Helvetica, Arial, sans-serif;
    font-size: 1.8vw;
    text-align: center;
    margin-top: 10vh;
  }

  .bia>.khungcanhan>.name>.banbe {
    font-size: 1vw;
    color: dimgray;
  }

  .bia>.khungcanhan>.name>.tieusu {
    font-size: 1.2vw
  }

  .bia>.khungcanhan>.congcu {
    right: 0;
    left: 0;
    padding: 2vw 0.9vw 0 0.9vw;
    position: absolute;
    white-space: nowrap;
    display: flex
  }

  .congcu1 {
    margin: 1vw;
    font-size: 1.1vw;
    padding: 1vw 1.5vw;
    border: none;
    border-radius: 5px;
    background-color: #cecdca;
  }

  .congcu1:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }

  .story_banbe {
    width: 100%;
    height: 15vh;
    margin-top: 1%;
    background-color: #cecdca;
    float: left;
  }

  .story_banbe>.circle {
    height: 12vh;
    width: 12vh;
    background-color: none;
    border-radius: 50%;
    float: left;
    margin-top: 0.8%;
    margin-left: 6%;
    border: 2px solid white;
    box-shadow: 0 0 0 0.7px dimgray;
  }

  .ccbia,
  .ccbia1 {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #EEE;
  }

  .ccbia1 {
    right: 10%
  }

  .anhdaidien>img {
    position: absolute;
    right: 5px;
    bottom: 0;
    width: 3.5vh;
    cursor: pointer;
  }

  .bia>.khungcanhan>.congcu>div>form>input[type=text] {
    width: 12vw;
    height: 2vw;
    padding: 12px 20px;
    margin: 0 0 1vw 0;
    border: 1px solid #ccc;
    outline: none
  }
  .mess1 {
    width: 100%;
    height: 80px;
    float: left;
    color: black;
    transition: 0.2s;
  }

  .mess1:hover {
    background-color: rgb(247, 247, 247);
  }

  .col_left>a>.mess1.active {
    background-color: rgb(229, 228, 228)
  }

  .ava {
    background-size: cover;
    border-radius: 50%;
    padding: 30px;
    margin: 10px 0 0 10px;
    float: left;
    cursor: pointer;
  }

  .username {
    float: left;
    font-size: 14px;
    margin: 18px 0 0 10px;
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
    cursor: pointer;
    font-weight: 500;
  }

  .mini_content {
    float: left;
    font-size: 12px;
    margin: -5px 0 0 10px;
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
    color: gray;
  }
  .like-button_TCN {
    display: flex;
    transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    filter: grayscale(100%);
    padding:4px 0 3px 0;
}
.like-button_TCN.liked {
    color: red;
    filter: grayscale(0);
}
  @media(max-width:980px) {
    .bia>.khungcanhan {
      width: 40%;
      left: 28vw;
      height: 40vh;
      background: transparent;
      float: left;
    }

    .bia>.khungcanhan>.canhan1 {
      padding: 2vw;
      height: 5vw;
    }

    .bia>.khungcanhan>.canhan1>.anhdaidien {
      width: 15vh;
      height: 15vh;
      top: -10vh
    }

    .bia>.khungcanhan>.name {
      font-size: 3.5vh;
      margin-top: 3vh
    }

    .bia>.khungcanhan>.name>.banbe {
      font-size: 2vh;
    }

    .bia>.khungcanhan>.name>.tieusu {
      font-size: 2vh
    }

    .bia {
      width: 100%;
      margin: 9vh 0 0 0;
    }

    .bia>.bia1 {
      width: 100%;
      height: 40vh;
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .congcu1 {
      margin-left: 1.4vw;
      font-size: 2.5vh;
      padding: 1.8vw 4vw;
    }

    .ccbia1,
    .ccbia {
      right: 13.5vh;
      font-size: 2vh;
      padding: 2vh 3vh
    }

    .ccbia {
      right: 0
    }

  }

  @media(max-width:630px) {
    .bia>.khungcanhan {
      width: 70%;
      left: 15vw
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .congcu1 {
      margin-left: 6vw;
      font-size: 2.5vh;
      padding: 2vw 5vw;
    }

    .ccbia1,
    .ccbia {
      right: 13.5vh;
      font-size: 2vh;
      padding: 2vh 3vh
    }

    .ccbia {
      right: 0
    }
  }
</style>

<div class="bia">
  <div class="bia1" style="background-image: url('img/<?php echo $row_id["cover_picture"] ?>')">
    <button class="ccbia congcu1" onclick="showFilePicker()">Chỉnh sửa</button>
    <form action="trangcanhan/suabia.php" method="post" enctype="multipart/form-data">
      <input type="file" id="filePicker" name="anhbia" style="display:none;" onchange="filePicked()" />
      <input type="submit" style="display:none" id="saveButton">
    </form>
    <script>
      function showFilePicker() {
        document.getElementById('filePicker').click();
      }
      function filePicked() {
        var input = document.getElementById('filePicker');
        if (input.files && input.files[0]) {
          console.log('Tệp đã chọn:', input.files[0].name);
        }
        document.getElementById('saveButton').click();
      }
    </script>
    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh bìa?')" href="xoabia.php">
      <button class="ccbia1 congcu1">Xóa</button>
    </a>
  </div>
  <div class="khungcanhan">
    <div class="canhan1">
      <div class="anhdaidien" style="background-image: url('img/<?php echo $row_id["avartar"] ?>')">
        <img src="https://cdn-icons-png.flaticon.com/512/3624/3624186.png" onclick="avartar()"></i>
      </div>
      <form action="trangcanhan/avartar.php" method="post" enctype="multipart/form-data" id="uploadForm">
        <input type="file" id="avatarPicker" name="anhdaidien" style="display:none;" onchange="avatarPicked()" />
        <input type="submit" style="display:none;" id="avatarSaveButton">
      </form>
      <script>
        function avartar() {
          document.getElementById('avatarPicker').click();
        }
        function avatarPicked() {
          var input = document.getElementById('avatarPicker');
          if (input.files && input.files[0]) {
            console.log('Tệp đã chọn:', input.files[0].name);
            document.getElementById('avatarSaveButton').click();
          }
        }
      </script>
    </div>
    <div class="name">
      <div><strong>
          <?php echo $row_id["username"] ?>
        </strong></div>
      <div class="banbe"><br>2939 bạn bè </div>
      <div class="tieusu"><br>
        <?php echo $row_id["bio"] ?>
      </div>
    </div>
    <div class="congcu">
      <button class="congcu1" id="editButton" onclick="FormTIEUSU()">Chỉnh sửa</button>
      <div id="inputForm" class="hidden">
        <form action="trangcanhan/suatieusu.php" method="post">
          <input type="text" value="<?php echo $row_id['bio'] ?>" name="tieusu" placeholder="Nhập tiểu sử của bạn"><br>
          <input type="submit" value="Lưu" style="border:none;padding:2px 10px">
          <button style="border:none;padding:2px 10px" type="button" onclick="cancelEdit()">Hủy</button>
        </form>
      </div>

      <script>
        function FormTIEUSU() {
          var form = document.getElementById("inputForm");
          var button = document.getElementById("editButton");
          form.style.display = "block";
          button.style.display = "none";
        }
        function cancelEdit() {
          var form = document.getElementById("inputForm");
          var button = document.getElementById("editButton");
          form.style.display = "none";
          button.style.display = "block";
        }
      </script>

      <a onclick="return confirm('Bạn có chắc chắn muốn xóa tiểu sử?')" href="trangcanhan/xoatieusu.php">
        <button class="congcu1">Xóa</button>
      </a>
    </div>
  </div>
</div>

<div class="story_banbe">
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
  <div class="circle"></div>
</div>

<div class="post_TCN" style="margin:0 13%">
  <div class="central-meta" style="padding:25px">
    <ul class="photos">
      <?php
      $sql = "SELECT * FROM posts inner join user on posts.post_by=user.user_id where user_id=$user_id ORDER BY post_id DESC";
      $result = $ketnoi->query($sql);

      while ($row = mysqli_fetch_assoc($result)) {
        // Kiểm tra xem người dùng đã thích bài viết hay chưa
        $sql_check = "SELECT * FROM likes WHERE post_id = " . $row["post_id"] . " AND like_by = $user_id";
        $result_post = mysqli_query($ketnoi, $sql_check);
        $liked_class = "";
        if (mysqli_num_rows($result_post) > 0) {
          // Người dùng đã thích bài viết => thêm class 'liked' vào nút like
          $liked_class = " liked";
        }
        ?>
        <!-- P1 -->
        <li>
          <div class="container" style="padding: 3px;">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal"
              data-target="#myModal_TCN_<?php echo $row['post_id']; ?>"
              style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">

              <?php
              // Tách thành một mảng
              $images = explode(",", $row['image']);
              $num_images = count($images);
              // Lấy giá trị đầu tiên trong mảng
              $first_image = reset($images);
              ?>
              <div class="gallery-item">
                <div
                  style="background-image:url('img/<?php echo $first_image; ?>');background-size:cover; background-position:center;width: 45vh;height: 45vh;">
                </div>
                <?php if ($num_images > 1) { ?>
                  <div class="gallery-item-type">
                    <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>
                  </div>
                <?php } ?>

                <div class="gallery-item-info">
                  <ul>
                    <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart"
                        aria-hidden="true"></i>
                      <?php echo $row['like_count'] ?>
                    </li>
                    <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i
                        class="fas fa-comment" aria-hidden="true"></i>
                      <?php echo $row['comment_count'] ?>
                    </li>
                  </ul>
                </div>
              </div>
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal_TCN_<?php echo $row['post_id'] ?>">
              <div class="modal-dialog modal-xl">
                <div class="modal-content" style="width: 145vh;margin:-1vh auto;height: 94vh">
                  <div class="modal-body" style="padding:0">
                  
  
<!-- left -->
<div class="slide-show anh_post">
  <div class="list-images">

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
      <?php for ($i = 0; $i < $num_images - 1; $i++): ?>
        <div class="index-item index-item-<?php echo $i; ?><?php echo ($i === 0) ? ' active' : ''; ?>">
        </div>
      <?php endfor; ?>
    </div>
  <?php endif; ?>
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
    <div class="chuacobinhluan" style="margin: 35% auto">
      <div style="font-size: 20px;font-weight: bold;text-align:center">Chưa có bình luận nào.</div>
      <div style="font-size: 14px;text-align:center">Hãy bắt đầu bình luận!</div>
    </div>
    <?php
  } ?>
</div>

<!--footer  -->
<div class="footer" style="width:100%; height:6vh;padding:10px; float:left; border-top: lightgray solid 1px;">
  <form method="post" action="" style="float:left; cursor:pointer; margin-left:5px;">
    <input type="hidden" name="like_by" value="<?php echo $user_id ?>">
    <a class="like-button_TCN<?php echo $liked_class; ?>" data-postid="<?php echo $row["post_id"]; ?>" data-postby="<?php echo $row["post_by"]; ?>">
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
    <a data-toggle="modal" href='#modal-id-share_<?php echo $row["post_id"] ?>' style="color:black"><i
        class="fa-regular fa-paper-plane"></i></a>
    <div class="modal fade" id="modal-id-share_<?php echo $row["post_id"] ?>">
      <div class="modal-dialog">
        <form action="" enctype="multipart/form-data" method="post">
          <div class="modal-content" style="width:480px;height:420px; border-radius:15px;margin-top:20vh">
            <div class="modal-header" style="border-bottom: 1px solid #DBDBDB">
              <h5 class="modal-title" style="position:absolute;left:42%;padding:10px;text-align:center;">Chia sẻ</h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" style="padding:0;overflow:auto">
              <!-- Search -->
              <form action="" enctype="multipart/form-data" method="post">
                <i style="top:12px;position: absolute;left:13px" class="fa-solid fa-magnifying-glass"></i>
                <input class="timkiem1" name="timkiem1" data-userid="<?php echo $user_id ?>"
                  data-postid="<?php echo $row["post_id"] ?>"
                  style="width:100%;height: 40px;outline: none;padding-left: 45px;border: none;border-bottom: 1px solid #DBDBDB;">
              </form>
              <div class="ketquatimkiem"></div>
              <?php
              if (empty($_POST["timkiem1"])) {
                $ketnoi = new mysqli('localhost', 'root', '', 'mxh');
                $friend = "SELECT * FROM user 
                        LEFT JOIN friend ON (friend.user_id1 = $user_id AND friend.user_id2 = user.user_id) OR (friend.user_id1 = user.user_id AND friend.user_id2 = $user_id)
                        WHERE friend.user_id1 IS NOT NULL OR friend.user_id2 IS NOT NULL";
                $result_fr = $ketnoi->query($friend);
                while ($row_fr = $result_fr->fetch_assoc()) {
                  ?>
                  <label for="mess<?php echo $row["post_id"] ?>_<?php echo $row_fr["user_id"] ?>" class="mess1">
                    <div class="ava" style="background-image: url('img/<?php echo $row_fr["avartar"] ?>')"></div>
                    <div class="username">
                      <?php echo $row_fr["username"] ?>
                    </div><br><br>
                    <div class="mini_content">
                      <?php echo $row_fr["email"] ?>
                    </div>
                    <input type="hidden" name="share_by" value="<?php echo $user_id ?>">
                    <input type="hidden" name="post_id" value="<?php echo $row["post_id"] ?>">
                    <input type="checkbox" name="share_to" value="<?php echo $row_fr["user_id"] ?>"
                      id="mess<?php echo $row["post_id"] ?>_<?php echo $row_fr["user_id"] ?>"
                      style="float:right;margin:-20px 20px">
                  </label>
                  <?php
                }
              }
              ?>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary send_post_btn"
                data-postid="<?php echo $row["post_id"] ?>">Gửi</button>
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
    <form method="post" enctype="multipart/form-data">
      <img src="img/smile.PNG" style="width: 25px; height: 25px; left:0px;top:13px;position:absolute; z-index: 1;">
      <textarea name="cmt_content_<?php echo $row["post_id"]; ?>" placeholder="Thêm bình luận"
        style="border: none; width:90%; height:7vh; padding:5px 0 0 40px; position:absolute; left:0"></textarea>
      <button type="button" class="comment-btn submit_cmt_TCN" data-postid="<?php echo $row["post_id"]; ?>"
        data-cmtby="<?php echo $user_id; ?>" data-postby="<?php echo $row["post_by"]; ?>"
        style="border: none; background: none; color: rgb(0, 162, 255); position:absolute; right:0; top:10px;">Post</button>
    </form>
  </div>
</div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div><!-- photos -->
</div><!-- centerl meta -->

<script>
    $(document).ready(function () {
      $('.like-button_TCN').on('click', function (e) {
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



      $('.submit_cmt_TCN').on('click', function (event) {
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
    const length = (imgs.length)-1;
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