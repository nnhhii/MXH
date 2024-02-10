<?php 
if (isset($_SESSION['user']))
{
	$user_id = $_SESSION['user'];
  $ketnoi= new mysqli('localhost','root','','MXH');     
  $sql= "SELECT * FROM user WHERE user_id=$user_id";
  $result= $ketnoi->query($sql);
  $row_id= $result->fetch_assoc();

  $sql_story = "SELECT * FROM story 
  LEFT JOIN user ON story.user_id = user.user_id
  LEFT JOIN friend ON (friend.user_id1 = $user_id AND friend.user_id2 = story.user_id) OR (friend.user_id1 = story.user_id AND friend.user_id2 = $user_id)
  WHERE friend.user_id1 IS NOT NULL OR friend.user_id2 IS NOT NULL OR story.user_id=$user_id ORDER BY story_id DESC";
  $result_story= $ketnoi->query($sql_story);
  
?>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="gop_2_menu">
  <div class="menu_giua">
    <div class="layout_menu_giua">
      <div class="layout_story">
        <div class="next_left"></div>
        <div class="stories-container">
          <?php while($row_story= $result_story->fetch_assoc()){?>
          <div class="story" style="background-image: url('img/<?php echo $row_story["img"]?>');">
            <div class="vien_ava_story">
              <div class="ava_story" style="background-image: url('img/<?php echo $row_story["avartar"]?>');"></div>
            </div>
            <div class="ten_story"><?php echo $row_story["username"]?></div>
          </div>
          <?php }?>
        </div>
        <div class="next_right"></div>
      </div>
      <form action="" enctype="multipart/form-data" method="post" class="form">
        <div class="vien" style="margin-left:-2%">
          <div class="avatar" style="background-image:url('img/<?php echo $row_id["avartar"]?>')"></div>
          <button type="button" class="thanhdangbaiviet" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Đăng bài viết </button>
          <hr>
          <div class="menunho">
            <button class="button-menu"> 
              <i class="fa-regular fa-image" style="color: #2ecc71;" ></i> Hình ảnh
            </button>  
            <button class="button-menu" style="float:right; padding: 10px 90px"> 
              <i class="fa-solid fa-video" style="color: #ff0000" ></i>   Video
            </button>
          </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="margin-left:170px">Bài đăng mới</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <div style="padding:10px;height:60px">
                      <div style="background-image:url('img/<?php echo $row_id["avartar"]?>'); background-size:cover;width:35px; height:35px; border-radius: 50%;float:left"></div>
                      <label style="float:left; margin:1% 2%"><?php echo $row_id["username"]?></label>
                    </div>
                    <textarea type="text" style="border:none;outline:none; height:5em;" class="form-control" name="content" id="content" placeholder="Đây là nội dung..." rows="10" cols="80"></textarea>
                  </div>
                  <div style="position:relative;border-radius:10px; border:#EEEEEE 2px solid; padding: 15px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                    <label for="message-text">Thêm ảnh</label>
                    <td>
                      <input type="hidden" name="post_by" value=<?php echo $user_id ?>>
                      <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                      <input type="file" id="fileInput"name="image" class="hinhanh" style="display:none" multiple>
                      <label for="fileInput"><i class="fa-regular fa-image" style="color: #2ecc71; cursor:pointer; position:absolute; right:25px;top:20px; scale:1.5" ></i></label>
                    </td>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <input type="submit" name="btn_submit" value="Đăng" 
                style="background-color: #0099FF; 
                color: white; padding: 10px 40px; 
                border:none;
                width:400px; 
                border-radius: 10px; 
                margin: 0 auto">
              </div>
            </div>
          </div>
        </div>
      </form>
      <?php require 'dangbaiviet/posts_xuly.php';?>
      <div id="fb-root"></div>
    </div>
  </div>
</div>
</div>
</body>
<?php
}
?>
<script>
$(document).ready(function () {
    var currentIndex = 0;
    var itemWidth = $(".story").outerWidth() + 10; // Width of each story item (including margin)

    $(".next_right").on("click", function () {
        moveStories("next");
    });

    $(".next_left").on("click", function () {
        moveStories("prev");
    });

    function moveStories(direction) {
        var container = $(".stories-container");
        var containerWidth = container.width();

        if (direction === "next" && currentIndex < $(".story").length - 3) {
            currentIndex++;
        } else if (direction === "prev" && currentIndex > 0) {
            currentIndex--;
        }

        var translateValue = -currentIndex * itemWidth;
        container.css("transform", "translateX(" + translateValue + "px)");
    }
});

</script>