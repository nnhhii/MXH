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
    background-size: cover;
    background-position: center;
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
    color:#343a40
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


$link = new mysqli('localhost', 'root', '', 'mxh');
$sql = "SELECT user.username, user.avartar, posts.post_id, posts.content, posts.image 
FROM posts 
JOIN post_function ON posts.post_id = post_function.post_id 
JOIN user ON posts.post_by = user.user_id 
WHERE save_by = $user_id";

$result = $link->query($sql);

echo "
<body>
<div class='gop_2_menu'>

";

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        
        // Tách thành một mảng
        $images = explode(",", $row['image']);
        $num_images = count($images);
        // Lấy giá trị đầu tiên trong mảng
        $first_image = reset($images);
        $extension = pathinfo($first_image, PATHINFO_EXTENSION);
        ?>
        <a href="index.php?pid=10&&post_id=<?php echo $row["post_id"]?>">
            <div id="post_<?php echo $row["post_id"]?>" class='post'>
            
            <?php 
            if(in_array($extension, ['mp4', 'avi', 'mov'])) { 
                echo "<video class='post-image' width='100%'>
                        <source src='img/$first_image' type='video/$extension'>
                    </video>";
            } else {
                echo "<div class='post-image' style='background-image:url(img/$first_image);'></div>";
            }
            ?>

            
            <div class='post-content'>
                <p class='post-text'><?php echo $row["content"]?></p>
                <p class='post-user'>
                    <span class='user-avatar' style='background-image:url(img/<?php echo $row["avartar"]?>);'></span>
                    <?php echo $row["username"]?>
                </p>
                <button class='congcu unsave_post' data-post-id=<?php echo $row["post_id"]?>>Bỏ lưu bài viết</button>
            </div>
        </div>
        </a>
<?php
    }
} else {
    echo "Chưa có bài viết nào được lưu";
}

echo "

</div>
</div>
</body>
";
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
                    alert("Có lỗi xảy ra. Vui lòng thử lại");
                }
            }
        });
    });
});

</script>
