<script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<link >
<title>Thêm bài viết</title>
<style>
.container {
    width: 500px;
    margin: 0 auto;
}
.bai {
    text-align: center;
    width: 500px;
    border-bottom: 1px solid #ccc;
    margin: 10px 0;
    float: left
}
.user-info {
    display: flex;
    margin: 15px;
}
.avtbai{
    width:40px;
    height:40px;
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
.liked {
    color:red;
}
.content{
    text-align:left;
    color:#555555;
}
.interaction-icons i{
    float:left; 
    margin:10px;
    scale: 1.5;
    cursor: pointer;
    padding:2px
}
.chinhsua {
    position: relative;
    display: inline-block;
    padding-left: 370px;
}
.btn:hover,
.btn:focus {
background-color: #ffffff;
color: #000000; /* Đặt màu chữ là đen khi di chuột vào */
}

.fa-solid {
display: inline-block;
font-weight: 900;
font-size: 16px;
color: #000000; /* Đặt màu chữ là đen */
}

.dropdown-menu {
position: absolute;
top: 100%;
left: 0;
z-index: 1;
display: none;
min-width: 120px;
padding: 5px;
background-color: #ffffff;
box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
border-radius: 5px;
}

.dropdown-menu.open {
display: block;
background-color: #EEEEEE;
}

.dropdown-item {
display: block;
padding: 3px 0;
text-align: left;
}

.dropdown-item a {
display: block;
padding: 5px 10px;
text-decoration: none;
color: #212529;
}

.dropdown-item:hover,
.dropdown-item:focus {
background-color: #f8f9fa;
}
.chinhsuaa{
    padding-left:300px;
}
.luu{
    padding-left:450px;
}
</style>

<div class="container" style="margin-left: -4%;">
<?php
require 'posts_connect.php';
if (isset($_POST['btn_submit'])) {
    $content = $_POST['content'];
    // Upload ảnh 
    $image = $_FILES['image']['name'];
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_name_parts = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($file_name_parts));

    if (!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        echo '<script language="javascript">
                alert("Vui lòng chọn ít nhất một hình ảnh!");
                window.location.href = "home.php";
            </script>';
        exit();
    }
    $target = "img/" . basename($image);
    $sql = "INSERT INTO posts(content,image ) VALUES (  '$content', '$image' )";
    if (mysqli_query($conn, $sql) && move_uploaded_file($_FILES['image']['tmp_name'], $target) && empty($errors) == true) {
        echo '<script language="javascript">alert("Đăng bài viết thành công rồi nè !");
                window.location.href = "home.php";
                exit();
            </script>';
    }
}
$sql = "SELECT * FROM posts WHERE post_id ORDER BY post_id DESC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo '<div class="bai">
            <div class="user-info">
                <div class ="avtbai"></div>
                <div style="font-size:15px; margin:7px">Nam Trinh</div>
                <div class="chinhsuaa">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:white;border:none;">
                   <i class="fa-solid fa-ellipsis-vertical" style=""></i>
                        </button>
                <ul class="dropdown-menu">
                         <button class="dropdown-item edit"><a href="posts_edit.php?id='.$row['post_id'].'">Edit</a></button>
             
                   <button class="dropdown-item delete"><a href="posts_delete.php?id='.$row['post_id'].'"><i class="fa-solid fa-trash"  style="color: red;"></i> </a></button>
                </ul>
            </div>a
            </div>';
    echo '  <div class="content">';
    echo "      <p>" . $row['content'] . "</p>";
    echo '  </div>';
    echo "  <img src='img/" . $row['image'] . "'width=500, height=auto alt='Post Image'>";
    echo '  <div class="interaction-icons">';
    echo '      <div class="like-btn" onclick="toggleLike(' . $row['post_id'] . ')">
                    <div id="heart_' . $row['post_id'] . '" class="heart-icon">
                         <i style="margin-left:0"class="fa-regular fa-heart"></i>
                    </div>
                </div>';
                echo '        <a href="dangbaiviet/add_comment.php" onclick="showCommentForm()"><i id="commentIcon" class="fa-regular fa-comment"></i></a>';
    echo '          <i class="fa-regular fa-paper-plane"></i>';

    echo '          <div class="luu"> <i class="fa-regular fa-bookmark"></i></div>';
    echo '          <br><div class="like_count">';
    echo            "<p>" . $row['like_count'] ."</p>";
    echo '</div>';
     
    echo '</div>';
    echo '</div>';
}
?>    
</div>

<script>
    // Create an object to store like status and count for each post
    var postLikes = {};
    function toggleLike(postId) {
    // Check if the post has an entry in the postLikes object
    if (!(postId in postLikes)) {
    // If not, initialize the entry
        postLikes[postId] = {
            likeStatus: false,
            likeCount: 0
        };
    }

    // Get the like status and count for the current post
    var likeStatus = postLikes[postId].likeStatus;
    var likeCount = postLikes[postId].likeCount;

    // Toggle the like status and update the count
    if (likeStatus) {
        postLikes[postId].likeStatus = false;
        postLikes[postId].likeCount--;

        // Update the database - decrease like_count
        updateLikeCount(postId, -1);
    } else {
        postLikes[postId].likeStatus = true;
        postLikes[postId].likeCount++;

    // Update the database - increase like_count
        updateLikeCount(postId, 1);
    }

    // Update the UI for the current post
    var heartIcon = document.getElementById("heart_" + postId);
    var likeCountElement = document.getElementById("likeCount_" + postId);

    heartIcon.classList.toggle("liked", postLikes[postId].likeStatus);
    likeCountElement.textContent = postLikes[postId].likeCount;

    // Update the database - increase or decrease like_count
        updateLikeCount(postId, postLikes[postId].likeStatus ? 1 : -1);
    }
    function updateLikeCount(postId, increment) {
        // Send an AJAX request or use PHP to update like_count in the database
        $.ajax({
        type: 'POST',
        url: 'dangbaiviet/update_like_count.php',
        data: { postId: postId, increment: increment },
        success: function(response) {
        // Handle the response if needed
        }
        });
    }
</script>


