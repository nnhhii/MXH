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
                    $sql_cmt = "select * from comment inner join user on comment.comment_by=user.user_id where post_id='$post_id'";
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
                    <form id="likeForm" method="post" action="" style="float:left; cursor:pointer; margin-left:5px;">
                      <input type="hidden" name="like_by" value="<?php echo $user_id ?>">
                      <a class="like-button<?php echo $liked_class; ?>" data-postid="<?php echo $row["post_id"]?>" data-postby="<?php echo $row["post_by"]; ?>">
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