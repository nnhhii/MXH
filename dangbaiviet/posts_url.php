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
                        <div class="anh_post" style="width:65vh">
                          <div style="background-image:url('img/<?php echo $row['image']?>');width:65vh;height:80vh;border-radius:7px 0 0 7px ; background-position: center; background-size:cover;"></div>
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
                            <div class="save not_saved" style="float:right">
                            <i class="fa-regular fa-bookmark"style="scale:1.5;margin: 10px"></i>
                            </div>
                            <!-- add comment -->
                            <div class="add comment" style="float:left; width:100%;height:50px;position: relative; padding:7px;">
                              <form id="commentForm" action="dangbaiviet/get_comments.php" method="post">
                                <img src="img/smile.PNG" style="width: 25px; height: 25px; left:0px;top:13px;position:absolute; z-index: 1;">
                                <input type="hidden"  name="post_id"  value="<?php echo $row['post_id'] ?>">
                                <input type="hidden"  name="comment_by"  value="<?php echo $user_id ?>">
                                <textarea name="cmt_content" placeholder="Add a comment" style="border: none;width:90%;height:7vh;padding:5px 0 0 40px; position:absolute; left:0"></textarea>
                                <button type ="submit" class="comment-btn" style="border: none; background: none; color: rgb(0, 162, 255); position:absolute; right:0; top:10px;">Post</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
 