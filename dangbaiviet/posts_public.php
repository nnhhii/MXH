<?php  
require 'dangbaiviet/posts_connect.php';
$sql_p = "SELECT * FROM posts 
INNER JOIN user ON posts.post_by = user.user_id
WHERE statuss='public' or posts.post_by=$user_id ORDER BY post_id DESC ";
        $result_p = mysqli_query($conn, $sql_p);
        while ($row = mysqli_fetch_array($result_p)) {
          $sql_like_count = "SELECT count(like_by) AS like_count FROM post_function WHERE post_id = " . $row["post_id"] . " " ;
          $result_like_count = mysqli_query($conn, $sql_like_count);
          $row_like_count = mysqli_fetch_assoc($result_like_count);
          // Kiểm tra xem người dùng đã thích bài viết hay chưa
          $sql_check = "SELECT * FROM post_function WHERE post_id = " . $row["post_id"] . " AND like_by = $user_id";
          $result = mysqli_query($conn, $sql_check);
          $liked_class = "";
          if (mysqli_num_rows($result) > 0) {
            // Người dùng đã thích bài viết => thêm class 'liked' vào nút like
            $liked_class = " liked";
          }
          
          ?>
          <div class="bai">
            <div class="user-info">
            <div class="avtbai" style="background-image:url('img/<?php echo $row["avartar"]; ?>');cursor:pointer" onclick="window.location.href='<?php echo $row['user_id'] == $user_id ? "index.php?pid=1&&user_id=".$row['user_id'] : "index.php?pid=2&&m_id=".$row['user_id']; ?>'"></div>
              <div style="font-size:15px; margin:7px">
                <?php echo $row["username"] ?>
              </div>
              <div class="chinhsuaa">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                  aria-expanded="false" style="width:30px;height:30px;background-color:transparent;border:none;">
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                  <button class="dropdown-item edit"><a
                      href="dangbaiviet/posts_edit.php?id='.$row['post_id'].'">Edit</a></button>
                  <button class="dropdown-item delete"><a href="dangbaiviet/posts_delete.php?id='.$row['post_id'].'"><i
                        class="fa-solid fa-trash" style="color: red;"></i> </a></button>
                  <button class="dropdown-item edit"><a href="index.php?pid=10&&post_id=<?php echo $row['post_id'] ?>">Go to
                      post</a></buttozn>
                </ul>
              </div>
            </div>
            <div class="content">
              <?php echo $row['content'] ?>
            </div>
            <!-- ----------------------- -->
            <div class="slide-show" style="width:470px; margin:10px 0;max-height:600px;border-radius:10px">
              <div class="list-images">

                <?php
                // Tách thành một mảng
                $images = explode(",", $row['image']);
                $num_images = count($images);
                ?>

                <!-- Sử dụng vòng lặp để tạo thẻ <img> cho mỗi ảnh -->
                <?php foreach ($images as $img): ?>
                  <img src="img/<?php echo $img; ?>" width="100%"height="600px"  border-radius="10px">
                <?php endforeach; ?>

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
            <form method="post" action="" style="float:left; cursor:pointer">
              <input type="hidden" name="like_by" value="<?php echo $user_id ?>">
              <a class="like-button<?php echo $liked_class?>" data-postid="<?php echo $row["post_id"]; ?>" data-postby="<?php echo $row["post_by"]; ?>">
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
            <div class="modal fade" id="myModal_<?php echo $row['post_id'] ?>">
              <div class="modal-dialog modal-xl">
                <div class="modal-content" style="width: 145vh;margin:-1vh auto;height: 94vh">
                  <div class="modal-body" style="padding:0">
                    <!-- left -->
                    <div class="slide-show anh_post">
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
                    <div class="layout_phai">
                      <div class="layout_user_post">
                        <a href="index.php?pid=2&&m_id=<?php echo $row["user_id"] ?>"
                          style="color:black;text-decoration:none">
                          <div class="ava_user_post" style="background-image:url('img/<?php echo $row["avartar"]; ?>')">
                            <div class="name_user_post">
                              <?php echo $row["username"] ?>
                            </div>
                        </a>
                      </div>


                      <!-- view comment -->
                      <div class="view_cmt" data-postid="<?php echo $row["post_id"]; ?>"
                        style="height: 60vh;overflow-y: scroll; width:65vh">
                        <?php
                        $ketnoi = new mysqli("localhost", "root", "", "mxh");
                        $post_id = $row["post_id"];
                        $sql_cmt = "select * from post_function inner join user on post_function.comment_by=user.user_id where post_id='$post_id'";
                        $result_cmt = $ketnoi->query($sql_cmt);
                        if ($result_cmt->num_rows > 0) {
                          while ($row_cmt = $result_cmt->fetch_assoc()) { ?>
                            <div class="layout_cmt">
                              <div class="ava_user_cmt" style="background-image:url('img/<?php echo $row_cmt["avartar"] ?>')">
                              </div>
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
                            <div style="font-size: 20px;font-weight: bold;">Chưa có bình luận nào.</div>
                            <div style="font-size: 14px;text-align:center">Hãy bắt đầu bình luận!</div>
                          </div>
                          <?php
                        } ?>
                      </div>

                      <!--footer  -->
                      <div class="footer"
                        style="width:100%; height:6vh;padding:10px; float:left; border-top: lightgray solid 1px;">
                        <form method="post" action="" style="float:left; cursor:pointer; margin-left:5px;">
                          <input type="hidden" name="like_by" value="<?php echo $user_id ?>">
                          <a class="like-button<?php echo $liked_class; ?>" data-postid="<?php echo $row["post_id"]?>" data-postby="<?php echo $row["post_by"]; ?>">
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
                        <div class="share" style="float:left">
                          <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#send_message_modal">
                            <i class="fa-regular fa-paper-plane"></i>
                          </button>
                        </div>
                        <div class="save not_saved" data-postid="<?php echo $row["post_id"]; ?>" data-saveby="<?php echo $user_id;?>" style="float:right">
                          <i class="fa-regular fa-bookmark" style="scale:1.5;margin: 10px"></i>
                        </div>
                        <!-- add comment -->
                        <div style="float:left; width:100%;height:50px;position: relative; padding:7px;">
                          <form method="post" enctype="multipart/form-data">
                            <img src="img/smile.PNG"
                              style="width: 25px; height: 25px; left:0px;top:13px;position:absolute; z-index: 1;">
                            <textarea name="cmt_content_<?php echo $row["post_id"]; ?>" placeholder="Thêm bình luận"
                              style="border: none; width:90%; height:7vh; padding:5px 0 0 40px; position:absolute; left:0"></textarea>
                            <button type="button" class="comment-btn submit_cmt" data-postid="<?php echo $row["post_id"]; ?>" data-postby="<?php echo $row["post_by"]; ?>"
                              data-cmtby="<?php echo $user_id; ?>"
                              style="border: none; background: none; color: rgb(0, 162, 255); position:absolute; right:0; top:10px;">Post</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- Share icon -->
            <a data-toggle="modal" href='#modal-id-share_<?php echo $row["post_id"] ?>' style="color:black"><i class="fa-regular fa-paper-plane"></i></a>
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
                      <div class="ketquatimkiem"></div>
                      <?php
                      if (empty($_POST["timkiem1"])) {
                        $ketnoi = new mysqli('localhost', 'root', '', 'mxh');
                        $friend = "SELECT * FROM user 
                              LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_id)
                              WHERE status='bạn bè'";
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
                        data-postid="<?php echo $row["post_id"] ?>" data-postby="<?php echo $row["post_by"]?>">Gửi</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
                      
            <!-- Save icon -->
            <div class="luu" data-postid="<?php echo $row["post_id"]; ?>" data-saveby="<?php echo $user_id;?>" style="float:right">
              <i class="fa-regular fa-bookmark"></i></div><br>
          </div>
        <?php
        }
        

     ?>