<?php
$link = new mysqli('localhost', 'root', '', 'MXH');
$m_id = $_GET['m_id'];
$sql_bb="SELECT * FROM user 
LEFT JOIN friendrequest ON (friendrequest.receiver_id =$m_id AND friendrequest.sender_id = $user_id) OR (friendrequest.sender_id = $m_id and friendrequest.receiver_id = $user_id)
WHERE user_id= $m_id";

$result_bb=$link -> query($sql_bb);
$row_bb = $result_bb->fetch_assoc();

?>

<style>
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
    border-radius: 0 5px 5px 0;
    height: 34vw
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
  }

  .bia>.khungcanhan>.congcu>.congcu1 {
    margin: 0.5vw;
    font-size: 1vw;
    padding: 1vw 1.8vw;
    border: none;
    border-radius: 5px;
    background-color: #cecdca;
  }

  .bia>.khungcanhan>.congcu1:hover {
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

  @media(max-width:980px) {
    .bia>.khungcanhan {
      width: 40%;
      top: -10vh;
      left: 28vw;
      height: 50vh;
      background: transparent;
      float: left;
    }

    .bia>.khungcanhan>.canhan1 {
      padding: 2vw;
    }

    .bia>.khungcanhan>.canhan1>.anhdaidien {
      width: 15vh;
      height: 15vh;
    }

    .bia>.khungcanhan>.name {
      font-size: 3.5vh;
      margin-top: 3vh;
    }

    .bia>.khungcanhan>.name>.banbe {
      font-size: 2vh;
    }

    .bia>.khungcanhan>.name>.tieusu {
      font-size: 2vh
    }

    .bia {
      width: 100%;
      margin: 6.5vh 0 0 0;
    }

    .bia>.bia1 {
      width: 100%;
      height: 40vh;
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .bia>.khungcanhan>.congcu>.congcu1 {
      margin-left: 1.4vw;
      font-size: 2.5vh;
      padding: 1.8vw 4vw;
    }

    .story_banbe {
      margin-top: -10vh;
    }
  }

  @media(max-width:630px) {
    .bia>.khungcanhan {
      width: 70%;
      top: -9vh;
      left: 15vw
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .bia>.khungcanhan>.congcu>.congcu1 {
      margin-left: 5vw;
      font-size: 2.5vh;
      padding: 2.5vw 6vw;
    }
  }
</style>
<div class="bia">
  <div class="bia1" style="background-image: url('img/<?php echo $row_bb["cover_picture"] ?>')"></div>
  <div class="khungcanhan">
    <div class="canhan1">
      <div class="anhdaidien" style="background-image: url('img/<?php echo $row_bb["avartar"] ?>')"></div>
    </div>
    <div class="name">
      <div><strong>
          <?php echo $row_bb["username"] ?>
        </strong></div>
      <div class="banbe"><br>2939 bạn bè </div>
      <div class="tieusu"><br>
        <?php echo $row_bb["bio"] ?>
      </div>
    </div>
    <div class="congcu">
      <button class="congcu1" id="messageButton" onclick="window.location.href='index.php?pid=0&&m_id=<?php echo $row_bb['user_id'] ?>'">Nhắn tin</button>

      <button class="congcu1" id="friendButton" data-user-id="<?php echo $row_bb['user_id']; ?>"
        onclick="toggleFriendship(this)">
        <?php
        if ($row_bb['status'] === 'đã gửi') {
          echo 'Hủy kết bạn';
        } else {
          echo 'Kết bạn';
        }
        ?>
      </button>

    </div>
    <script>
      function toggleFriendship(button) {
        var userId = button.getAttribute('data-user-id');
        if (button.textContent === 'Kết bạn') {
          sendFriendRequest(button, userId);
        } else {
          cancelFriendRequest(button, userId);
        }
      }

      function sendFriendRequest(button, userId) {
        $.ajax({
          url: 'menu/banbe/ctrl_yeucau.php',
          type: 'POST',
          data: { user_id: userId },
          success: function (response) {
            console.log("Yêu cầu kết bạn đã được gửi, phản hồi từ máy chủ: " + response);
            if (response.trim() === "Yêu cầu kết bạn đã được gửi!") {
              button.textContent = 'Hủy kết bạn';
            }
          }
        });
      }

      function cancelFriendRequest(button, userId) {
        $.ajax({
          url: 'menu/banbe/ctrl_huy.php',
          type: 'POST',
          data: { user_id: userId },
          success: function (response) {
            console.log("Yêu cầu kết bạn đã được hủy, phản hồi từ máy chủ: " + response);
            if (response.trim() === "Đã hủy yêu cầu kết bạn!") {
              button.textContent = 'Kết bạn';
            }
          }
        });
      }
    </script>

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
      $sql_post = "SELECT * FROM posts inner join user on posts.post_by=user.user_id where user_id=$m_id ORDER BY post_id DESC";
      $result_post = $link->query($sql_post);

      while ($row = mysqli_fetch_assoc($result_post)) {
        // Kiểm tra xem người dùng đã thích bài viết hay chưa
        $sql_check = "SELECT * FROM likes WHERE post_id = " . $row["post_id"] . " AND like_by = $m_id";
        $result_check = mysqli_query($link, $sql_check);
        $liked_class = "";
        if (mysqli_num_rows($result_check) > 0) {
          // Người dùng đã thích bài viết => thêm class 'liked' vào nút like
          $liked_class = " liked";
        }
        ?>
        <!-- P1 -->
        <li>
          <div class="container" style="padding: 3px;">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal"
              data-target="#myModal_<?php echo $row['post_id']; ?>"
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
            <div class="modal fade" id="myModal_<?php echo $row['post_id'] ?>">
              <div class="modal-dialog modal-xl">
                <div class="modal-content" style="width: 145vh;margin:-1vh auto;height: 94vh">
                  <div class="modal-body" style="padding:0">
                    <?php
                    include 'trangcanhan/picture.php'; ?>
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