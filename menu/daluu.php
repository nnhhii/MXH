<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
.congcu {
  margin: 1vw;
  font-size: 1vw;
  padding: 0.6vw;
  border: none;
  background-color: #cecdca;
  border-radius:0.8vw;
  margin-top:0.5vw
}
.congcu:hover{
  background-color: #343a40;
  color: #f8f9fa;
}
.post {
    height: 14vw;
    background-color: white;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    margin: 2vw 2.5vw 2vw 2vw;
    border-radius: 0.8vw;
}

.post-image {
    width: 20%;
    height: 80%;
    background-size: 100% 100%;
    float: left;
    margin: 1.5vw;
    border-radius: 0.8vw;
}

.post-content {
    width: 75%;
    height: 80%;
    float: right;
    padding: 1vw;
    font-weight: 600;
    font-size: 1.7vw;
}

.post-text {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.post-user {
    font-size: 1vw;
    font-weight: 400;
}

.user-avatar {
    display: inline-block;
    width: 35px;
    height: 35px;
    background-size: cover;
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 5px;
}

</style>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$current_user_id = $_SESSION['user'] ?? null;

if (!$current_user_id) {
    die("User is not logged in.");
}

$conn = new mysqli('localhost', 'root', '', 'mxh');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user.username, user.avartar, posts.post_id, posts.content, posts.image 
FROM posts 
JOIN saved_posts ON posts.post_id = saved_posts.post_id 
JOIN user ON posts.post_by = user.user_id 
WHERE saved_posts.user_id = $current_user_id";



$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

echo "
<body>
<div class='gop_2_menu'>
<div>
";

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $image = rtrim($row['image'], ',');
        echo "
        <div id='post_" . $row['post_id'] . "' class='post'>
        <div class='post-image' style='background-image:url(img/". $image .   ");'></div>
        <div class='post-content'>
            <p class='post-text'>
                " . $row['content'] . "
            </p>
            <p class='post-user'>
                <span class='user-avatar' style='background-image:url(img/" . $row['avartar'] . ");'></span>
                " . $row['username'] . "
            </p>
    
           
            <button class='congcu unsave_post' data-post-id='" . $row['post_id'] . "'>Bỏ lưu bài viết</button>
        </div>
        </div>
    
        ";
    }
} else {
    echo "Chưa có bài viết nào được lưu";
}

echo "
</div>
</div>
</div>
</body>
";

$conn->close();
?>

<script>
$(document).ready(function() {
    $('.unsave_post').click(function() {
        var post_id = $(this).data('post-id');

        $.ajax({
            url: 'menu/boluu.php',
            type: 'POST',
            data: {
                post_id: post_id 
            },
            success: function(response) {
                if (response === "success") {
                    location.reload();
                } else {
                    alert("Có lỗi xảy ra. Vui lòng thử lạ");
                }
            }
        });
    });
});

</script>
