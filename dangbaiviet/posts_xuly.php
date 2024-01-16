
<script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>
            <title>Thêm bài viết</title>
            <link rel="stylesheet" href="style.css" />

            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>


            <style>
        html, body {
            height: 100%;
            margin: 0;
        }
                body {
                    font-family: Arial, sans-serif;
                    background-color: #ffffff; /* Màu nền */
                }

                .container {
                    width: 600px;
                    height:100px;
                    margin: 20px auto; /* Tạo khoảng cách trên và dưới */
                    text-align: center;
            
                }

                .bai {
            text-align: center;
            width: 550px;
            height: auto ; /* You can set a specific height if needed */
        
            margin-bottom: 20px;
        border-radius:20px;
            border-bottom: 1px solid #ccc;
        background-color:

        
        }
        .avtbai{
        width:40px;
        height:40px;
      
        }
        .avtbai img{
    max-width: 100%;
    height: 50px;
    border-radius: 30px; /* Thêm thuộc tính này để bo tròn */
}
      
        .user-info {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
            

                hr {
                    border: none;
                    border-top: 1px solid #ccc; /* Đường kẻ ngang */
                    margin: 10px 0; /* Khoảng cách trên và dưới đường kẻ */
                }
            .interaction-icons {
            display: flex;
            justify-content: space-between; /* Updated to space-between */
            align-items: center;
            margin-top: 10px;
            margin-left: 15px;
        }

        .like-btn {
            cursor: pointer;
            display: flex;
            flex-direction: column; /* Updated to column direction */
            align-items: center;
        }

        .heart-icon {
            font-size: 35px;
            margin-bottom: 5px; /* Adjusted margin for spacing */
            color: black;
            transition: color 0.3s;
        }

        .like-count {
        font-size: 20px;
        margin-left: 5px;
        position: absolute;
        bottom: -110px; /* Đặt vị trí ở dưới */
    }

    

                .liked {
                    color:red;
                    color: #e74c3c; /* Màu đỏ cho trạng thái đã thích */
                }
                .bai img {
            max-width: 100%;
            height:auto;
            max-height: 550px; /* Giới hạn chiều cao tối đa */
            display: block;
            margin: 0 auto;
            width: auto; /* Cài đặt chiều rộng tự động để duy trì tỷ lệ chiều rộng */
            
        }

        .content{
            text-align:left;
            color:#555555;
        }
        .interaction-icons {
        display: flex;
        justify-content: flex-start;
        margin-top: 10px;
    
    }

    .interaction-icons i {
            font-size: 23px; /* Adjust the font size for other icons as needed */
            cursor: pointer;
            margin-left: 20px;
        }
/* CSS cho menu dropdown */
.chinhsua {
    position: relative;
    display: inline-block;
    padding-left: 370px;
    
}

.btn {
    background-color: transparent;
    border: none;
    color: #212529;
    padding: 5px;
    border-radius: 5px;
    
}

.btn:hover,
.btn:focus {
    background-color: #ffffff;
    color: #000000; /* Đặt màu chữ là đen khi di chuột vào */
}

.fa-solid {
    display: inline-block;
    font-weight: 900;
    font-size: 14px;
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
.ggg{
    margin-top:10px;
    margin-left:10px;
    color:#444444;
    font-size:20px;
}

            </style>

            <div class="container">

                <?php
            
                require 'posts_connect.php';
                // Up bài viết
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

                    // kỉểm tra hình có được up lên không á mà 
                    if (!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
                        echo '<script language="javascript">
                                alert("Vui lòng chọn ít nhất một hình ảnh!");
                                window.location.href = "posts_add.php";
                            </script>';
                        exit();
                    }
                    $target = "photo/" . basename($image);
                    $sql = "INSERT INTO posts(content,image ) VALUES (  '$content', '$image' )";
                    if (mysqli_query($conn, $sql) && move_uploaded_file($_FILES['image']['tmp_name'], $target) && empty($errors) == true) {
                        echo '<script language="javascript">alert("Dăng bài viết thành công rồi nè !");
                    
                        window.location.href = "posts_add.php";
                        exit();
                        </script>';
                    
                    } else {
                        echo '<script language="javascript">alert("vui lòng chọn ít nhất một hình ảnh !");
                    
                        window.location.href = "posts_add.php";
                        exit();
                        </script>';
                    }
                }

                $sql = "SELECT * FROM posts WHERE id ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                  

                    echo '<div class="bai">';
                    
                    echo '<div class="user-info">';
            echo '<div class ="avtbai">';
                    echo '<img src="photo/avatar-trang-4 (1).jpg  " alt="Avatar">';
        echo '</div>';
                    echo '<p class="ggg">  Nam Trịnh</p>';
                   
                    echo '</div>';

                    echo '<div class="content">';
                    echo "<p>" . $row['content'] . "</p>";
                    echo '</div>';
                    echo "<img src='photo/" . $row['image'] . "'width=500, height=600 alt='Post Image'>";
            
                    echo '<div class="interaction-icons">';
                    echo '<td><div class="like-btn" onclick="toggleLike(' . $row['id'] . ')">
                    <div id="heart_' . $row['id'] . '" class="heart-icon">&#x2661</div>
                    
                    </div></td>';
                    echo '<td>  <i class="fa-regular fa-comment"></i></td>';
                
                    echo '<td>  <i class="fa-regular fa-paper-plane"></i></td>';
                    echo '<div class="chinhsua">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <button class="dropdown-item edit"><a href="posts_edit.php?id='.$row['id'].'">Edit</a></button>
                      
                        <button class="dropdown-item delete"><a href="posts_delete.php?id='.$row['id'].'"><i class="fa-solid fa-trash"  style="color: red;"></i> </a></button>
                    </ul>
                </div>';
                
                  
                
                    echo '</div>';
    echo '</div>';


                
                }
                ?>    


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
            url: 'update_like_count.php',
            data: { postId: postId, increment: increment },
            success: function(response) {
                // Handle the response if needed
            }
            
        });
    }
        </script>
        </div>
            </div>
        