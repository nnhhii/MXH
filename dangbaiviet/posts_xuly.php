<html>
    <head>

<script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/like.css">
 
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>


<link >
<title>Thêm bài viết</title>
</head>
<body>
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
/* CSS cho form comment */
/* CSS cho form comment */
#commentForm {
    display: flex;
    align-items: center;
    justify-content: space-between;
    
}


/* CSS cho input hidden */
#commentForm input[type="hidden"] {
    display: none; /* Ẩn input hidden */
}

/* CSS cho textarea */
#commentForm textarea {
    flex: 1; /* Sử dụng flex để textarea chiếm phần còn lại của form comment */
    padding: 10px;
    margin-right: 10px; /* Khoảng cách giữa textarea và button */
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: none;
}

/* CSS cho button */
#commentForm button {
    flex: 0 0 auto; /* Đặt kích thước cố định cho button */
    width: 100px; /* Độ rộng của button */
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}
.containerr {
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: center; /* Căn giữa theo chiều ngang */
    height: 100vh; /* Độ cao của phần tử */
}

.image-container {
    max-width: 100%; /* Độ rộng tối đa của hình ảnh */
    max-height: 100%; /* Độ cao tối đa của hình ảnh */
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
                         <button class="dropdown-item edit"><a href="dangbaiviet/posts_edit.php?id='.$row['post_id'].'">Edit</a></button>
             
                   <button class="dropdown-item delete"><a href="dangbaiviet/posts_delete.php?id='.$row['post_id'].'"><i class="fa-solid fa-trash"  style="color: red;"></i> </a></button>
                </ul>
            </div>
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
       echo '     <div style="float:left;">  ';
       echo ' <div class="chat">
       <button type="button" class="btn p-0" data-toggle="modal" data-target="#myModal_' . $row['post_id'] . '">
         <img src="img/bubble-chat.png" style="width: 25px; height: 25px;margin:5px">
       </button>
     </div>';

echo '<!-- The Modal -->
     <div class="modal fade" id="myModal_' . $row['post_id'] . '"> 
       <div class="modal-dialog modal-xl">
         <div class="modal-content" style="height: 95%;width:1090px;float:left;">
           <!-- Modal body -->
           <div class="modal-body" style="">
           <div style="text-align:center;">';

echo '<div style="width:50%;height:90vh; float: left; padding: 0 15px; position:relative">
    <div class="containerr">
    <div class="image-container">
        <img src="img/' . $row['image'] . '" width="500" height="auto">
    </div>
  </div>
</div>';
echo'
<!-- right -->
<div style="width:50%;height:90vh; float: right; padding: 0 15px; position:relative">
<!--HEAD -->
<div style="height: 60px; border-bottom: rgb(191, 190, 190) solid 1px; padding: 14px 0;">
 <a href="../index.php?pid=1" style="color:black;text-decoration:none">
   <div style=" float:left; background-size: cover; width: 35px; border-radius:50%; height:35px;">
   <!-- <img src="img/<?php echo $user["avartar"]; ?>" alt=""> -->
   <div style="margin:10px 50px">User_name</div>
 </a>
 </div>
</div>
<!-- view comment -->
<div style="height: 60vh;overflow-y: scroll;">
 <div class="coment-area">
   <ul class="we-comet">
     <!-- No Comment Yet -->
     
  </form>
     <div class="nocomment" >
       <div style="margin-top: 15%;margin-left: 5%;">
         <div style="font-size: 35px;font-weight: bold;">No comments yet</div>
         <div style="font-size: 20px; margin-left: 10%;">Start the conversation.</div>
       </div>
     </div>
   </ul>
 </div>
</div>
<!--footer  -->
<div class="footer" style="width:100%;padding:10px 0; float:left; border-top: rgb(191, 190, 190) solid 1px;">
 <!-- like -->
 <div style="height: 5vh; justify-content: space-between; display:flex; align-items: center">
   <div style="display: flex;">
     
       <div class=:middle-wrapper"style="height: 25px;width: 25px;margin:5px">
         <div class="like-wrapper">
           <a class="like-button" style="border: none;">
             <span class="like-icon" style="height: 25px;width: 25px;">
               <div class="heart-animation-1"></div>
               <div class="heart-animation-2"></div>
             </span>
           </a>
         </div>
       </div>
     
     <div class="chat">
       <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#message_modal">
         <img src="img/bubble-chat.png" style="width: 25px; height: 25px;margin:5px">
       </button>
     </div>
     <div class="send">
       <button type="button" class="btn p-0" data-bs-toggle="modal" data-bs-target="#send_message_modal">
         <img src="img/send.png" style="width: 20px; height: 20px;margin: 8px 10px;">
       </button>
     </div>
   </div>
   <div class="save not_saved">
     <!-- <img class="hide saved" src="image/save_black.png" style="width: 40px; height: 40px;"> -->
     <img class="not_saved" src="https://img.icons8.com/?size=256&id=43571&format=png" style="width: 30px; height: 30px;">
   </div>
 </div>
 <!-- Liked -->
 <div style="height: 5vh; font-weight: 600;float:left">
  <p> ' . $row['like_count']. '</p>
 </div>
 <!-- add comment -->
 <div class="add comment" style="float:left; width:100%;height:50px;position: relative; padding:15px">
 

   <form id="commentForm" action="dangbaiviet/get_comments.php" method="post">
   <input type="hidden"  name="post_id"  value="'. $row['post_id'] .'" > 
    <textarea name="comment" placeholder="Bình luận của bạn" required></textarea>      <button type="submit">Gửi</button> <br>

     

 </div>
 
</div>
</div>
</div>

<script src="css/like.js"></script>



           </div>
         </div>
       </div>
     </div>
    </div>';

       echo '';
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
<body>

