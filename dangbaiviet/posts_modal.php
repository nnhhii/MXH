<style>
.like-button-modal {
    display: flex;
    transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    filter: grayscale(100%);
    padding:4px 0 3px 0;
}
.like-button-modal.liked{
    filter: grayscale(0);
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
</style>
<?php 
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
                      <img src="img/<?php echo $img; ?>" width="100%">
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
                  <div class="view_cmt" data-postid="<?php echo $row["post_id"]; ?>">
                    <div class="layout_cmt">
                      <div class="ava_user_cmt" style="background-image:url('img/<?php echo $row["avartar"] ?>')"></div>
                      <div class="gop_cmt">
                        <div class="name_user_cmt"><?php echo $row["username"] ?></div>
                        <div class="cmt_content"><?php echo $row["content"] ?></div><br>
                        <div class="cmt_time"><?php echo $time_description ?></div>
                      </div>
                    </div>
                    <?php
                    $ketnoi = new mysqli("localhost", "root", "", "mxh");
                    $post_id = $row["post_id"];
                    $sql_cmt = "select * from post_function inner join user on post_function.comment_by=user.user_id where post_id='$post_id'";
                    $result_cmt = $ketnoi->query($sql_cmt);
                    if ($result_cmt->num_rows > 0) {
                      while ($row_cmt = $result_cmt->fetch_assoc()) { ?>
                        <div class="layout_cmt">
                          <div class="ava_user_cmt" style="background-image:url('img/<?php echo $row_cmt["avartar"] ?>')"></div>
                          <div class="gop_cmt">
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
                      <a class="like-button-modal" data-postid="<?php echo $row["post_id"]?>" data-byid="<?php echo $user_id?>" data-postby="<?php echo $row["post_by"]; ?>">
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
                    <div style="float:left; width:100%;height:50px;position: relative; padding:7px;">
                      <form method="post" enctype="multipart/form-data">
                        <textarea name="cmt_content_<?php echo $row["post_id"]?>" placeholder="Thêm bình luận"
                          style="width:85%; height:11vh;resize: none; padding:5px 0 0 10px; position:absolute; left:4vh;top:0;border-radius:20px;border:1px solid lightgray"></textarea>
                        <button type="button" class="comment-btn submit_cmt" data-postid="<?php echo $row["post_id"]; ?>" data-postby="<?php echo $row["post_by"]; ?>"
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


