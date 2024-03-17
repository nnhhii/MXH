<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="col_menu">
        <a href="index.php"><img src="https://img.icons8.com/?size=256&id=Gc9qmZNN9yFN&format=png" style="margin-top: 100px;"></a>
        <a href="index.php?pid=4"><img src="https://img.icons8.com/?size=256&id=61161&format=png"></a>
        <a href="index.php?pid=5"><img src="https://img.icons8.com/?size=256&id=43571&format=png"></a>
        <a href="index.php?pid=6"><img src="https://img.icons8.com/?size=256&id=88004&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=dJOh7yntdHD9&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=14092&format=png"></a>
    </div>
    <div class="hienthi">
    <div class="col_left">
        <div class="mess">Messages</div>
        <div class="layout_tim_kiem">
            <form id="timkiem_form"  enctype="multipart/form-data"method="post">
                <input class="tim_kiem" name="timkiem">
                <img src="https://img.icons8.com/search">
            </form>
        </div>
        <?php 
        
        function getStatus($is_active, $last_activity) {
            if ($is_active == 1) {
                return 'Đang hoạt động';
            } else {
                $time_offline = time() - strtotime($last_activity);
                if ($time_offline < 3600) {
                    return 'Hoạt động ' . floor($time_offline / 60) . ' phút trước';
                } elseif ($time_offline < 86400) {
                    return 'Hoạt động ' . floor($time_offline / 3600) . ' giờ trước';
                } elseif ($time_offline < 2592000) {
                    return 'Hoạt động ' . floor($time_offline / 86400) . ' ngày trước';
                }else{
                    return 'Ngưng hoạt động' ;
                }
                
            }
        }
        $ketnoi= new mysqli('localhost','root','','MXH');
        if (isset($_GET['m_id'])){
            $m_id = $_GET['m_id'];
        }else{
            $friend_default = "SELECT * FROM user 
            left JOIN message on (message_by=$user_id AND message_to=user_id) OR (message_by=user_id AND message_to=$user_id) ORDER BY timestamp DESC";
            $result_default = $ketnoi->query($friend_default);
            $row_default = $result_default -> fetch_assoc();
            $m_id = $row_default['user_id'];
        }
        $friend_details = "select * from user where user_id = $m_id";
        $result_dt = $ketnoi->query($friend_details);
        $row_dt = $result_dt ->fetch_assoc();

        $status_dt = getStatus($row_dt['is_active'], $row_dt['last_activity']);
            // tung nhan tin
            ?><div class="message_list"></div>
    </div>
    </div>
    <div class="col_right">
        <div class="ten">
            <a href="index.php?pid=2&&m_id=<?php echo $row_dt["user_id"]?>" style="color:black">
            <div class="ava"style="background-image: url('img/<?php echo $row_dt["avartar"]?>');padding:27px"></div>
            <div class="username"><?php echo $row_dt["username"]?></div>
            </a>
            <br><br>
            <div class="mini_content"><span style="color:#lightgray;"><?php echo $status_dt; ?></span></div>
            <div style="position: absolute; right:20px; top:17px">
                <div class="nghe_goi" id="more_info" onclick="myFunction()"></div>
            </div>
        </div>
        <div class="content">
            <?php 
            $sql_m = "select * from message where message_by=$user_id and message_to=$m_id or message_by=$m_id and message_to=$user_id";
            $result = $ketnoi->query($sql_m);
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    $content = $row['content'];
                    $message_time = $row['timestamp'];
                    $cssClass = ($content == 'red_heart.png') ? 'red_heart' : 'other-image';
                    echo '<div style="width:100%;float:left;position:relative">';
                    if ($row['message_by'] == $user_id) {
                        if (strpos($content, '.png') !== false || strpos($content, '.jpg') !== false || strpos($content, '.jpeg') !== false) {
                            // Nếu là ảnh hoặc red_heart
                            echo '<img src="img/' . $content . '" class="' . $cssClass . '"/>
                                    <div class="message_time">'.$message_time.'</div>';
                        }else if (filter_var($content, FILTER_VALIDATE_URL)) {
                            $urlParts = parse_url($content);      // Phân tích URL
                            parse_str($urlParts['query'], $queryParts);     // Phân tích chuỗi truy vấn
                            $p_id = $queryParts['post_id'];           // Lấy giá trị của post_id
                            $sql_url="select * from posts inner join user where posts.post_by=user.user_id and post_id=$p_id";
                            $result_url = $ketnoi->query($sql_url);
                            $row=$result_url->fetch_assoc();
                            // Tách thành một mảng
                            $images = explode(",", $row['image']);
                            $num_images = count($images);
                            // Lấy giá trị đầu tiên trong mảng
                            $first_image = reset($images);
                            
                            echo '<a href="'.$content.'">
                                    <div class="layout_url">
                                        <img src="img/'.$first_image.'" style="width:310px;border-radius:20px 20px 0 0">
                                        <div class="avt_url" style="background-image:url(img/'.$row["avartar"].')"></div>
                                        <div class="user_url">'.$row["username"].'</div>
                                        <div class="content_url">'.$row["content"].'</div>
                                    </div>
                                </a>
                                    <div class="message_time">'.$message_time.'</div>';
                                    
                        }else {
                            //Nếu là text
                            echo '<span class="text">' . $content . '</span>
                                    <div class="message_time">'.$message_time.'</div>';
                        }
                    }else{
                        echo'<div class="avt_url" style="background-image:url(img/'.$row_dt["avartar"].');position:absolute;bottom:-7px"></div>';
                        if (strpos($content, '.png') !== false || strpos($content, '.jpg') !== false || strpos($content, '.jpeg') !== false) {
                            echo '<img src="img/' . $content . '" class="' . $cssClass . '" style="float:left;border-radius: 20px 20px 20px 2px;">
                                    <div class="message_time" style="float:left">'.$message_time.'</div>';
                        }else if (filter_var($content, FILTER_VALIDATE_URL)) {
                            $urlParts = parse_url($content);      
                            parse_str($urlParts['query'], $queryParts);     
                            $p_id = $queryParts['post_id'];           
                            $sql_url="select * from posts inner join user where posts.post_by=user.user_id and post_id=$p_id";
                            $result_url = $ketnoi->query($sql_url);
                            $row=$result_url->fetch_assoc();
                            // Tách thành một mảng
                            $images = explode(",", $row['image']);
                            $num_images = count($images);
                            // Lấy giá trị đầu tiên trong mảng
                            $first_image = reset($images);
                            
                            echo '<a href="'.$content.'">
                                    <div class="layout_url" style="float:left;border-radius:20px 20px 20px 2px;">
                                        <img src="img/'.$first_image.'" style="width:310px;border-radius:20px 20px 0 0">
                                        <div class="avt_url" style="background-image:url(img/'.$row["avartar"].')"></div>
                                        <div class="user_url">'.$row["username"].'</div>
                                        <div class="content_url">'.$row["content"].'</div>
                                    </div>
                                </a>
                                    <div class="message_time" style="float:left">'.$message_time.'</div>';
                        }else {
                            echo '<span class="text" style="float:left;border-radius:18px 18px 18px 2px;">' . $content . '</span>
                                    <div class="message_time" style="float:left">'.$message_time.'</div>';
                        }
                    }
                    echo '</div>';
                }
            } else {
                echo '<div class="no" style="display: flex;flex-direction: column;justify-content: center;height:100%;font-size:17px;text-align:center;color:gray">
                    Chưa có tin nhắn nào. <br> Hãy bắt đầu cuộc trò chuyện!</div>';
            }?>
        </div>
        <div class="chat_box">
            <form id="messageForm" method="post" enctype="multipart/form-data">
                <input type= "hidden" name="message_to" value="<?php echo $m_id?>">
                <input type="hidden" name="message_by" value="<?php echo $user_id?>">
                <textarea type="text" name="content" placeholder="Message..."></textarea>
                <img class="icon" id="smile_icon" onclick="showIcon()" src="https://img.icons8.com/?size=512&id=y6j3NCqRGOcj&format=png">
                    <div id="myIcon">
                        <button type="button" class="icon_cuoi">&#128512;</button>
                        <button type="button" class="icon_cuoi">&#128513;</button>
                        <button type="button" class="icon_cuoi">&#128514;</button>
                        <button type="button" class="icon_cuoi">&#129392;</button>
                        <button type="button" class="icon_cuoi">&#129325;</button>
                        <button type="button" class="icon_cuoi">&#128517;</button>
                        <button type="button" class="icon_cuoi">&#128518;</button>
                        <button type="button" class="icon_cuoi">&#128519;</button>
                        <button type="button" class="icon_cuoi">&#128520;</button>
                        <button type="button" class="icon_cuoi">&#128521;</button>
                        <button type="button" class="icon_cuoi">&#128522;</button>
                        <button type="button" class="icon_cuoi">&#128523;</button>
                        <button type="button" class="icon_cuoi">&#128524;</button>
                        <button type="button" class="icon_cuoi">&#128525;</button>
                        <button type="button" class="icon_cuoi">&#128526;</button>
                        <button type="button" class="icon_cuoi">&#128527;</button>
                        <button type="button" class="icon_cuoi">&#128528;</button>
                        <button type="button" class="icon_cuoi">&#128529;</button>
                        <button type="button" class="icon_cuoi">&#128530;</button>
                        <button type="button" class="icon_cuoi">&#128531;</button>
                        <button type="button" class="icon_cuoi">&#128532;</button>
                        <button type="button" class="icon_cuoi">&#128533;</button>
                        <button type="button" class="icon_cuoi">&#129297;</button>
                        <button type="button" class="icon_cuoi">&#129322;</button>
                        <button type="button" class="icon_cuoi">&#129398;</button>
                    </div>
                <input type="file" name="file" id="fileInput" accept="image/*" style="display: none;">
                <label for="fileInput">
                    <img class="icon" id="attachment_icon" src="https://img.icons8.com/?size=512&id=114320&format=png">
                </label>
                <img class="icon" id="button_heart" src="img/heart.png">
            </form>
        </div>
    </div>
    
    <div id=info>
        <div class="layout_info"><div class="info_1">Chi tiết</div></div>
        <div style="height:580px;border-bottom: 1px solid lightgray;">
            <a href="index.php?pid=2&&m_id=<?php echo $row_dt["user_id"]?>">
                <div class="mess1">
                    <div class="ava" style="background-image: url('img/<?php echo $row_dt["avartar"]?>')"></div>
                    <div class="username"><?php echo $row_dt["email"]?></div><br><br>
                    <div class="mini_content"><?php echo $row_dt["username"]?></div>
                </div>
            </a>
        </div>
             
            <a class="info_2" style="text-decoration:none;float:left"data-toggle="modal" href='#modal-id'>Xóa cuộc trò chuyện</a>
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <div class="modal-content" style="border-radius:20px;margin:32vh auto;width:50vh">
                        <div class="modal-header">
                            <h5 class="modal-title" style="padding:5px 0 5px 30px">Xóa cuộc trò chuyện vĩnh viễn?</h5>
                        </div>
                        <div class="modal-body" style="padding:0">
                        <form action="nhantin/delete_chat.php" method="post" enctype="multipart/form-data">
                            <input type= "hidden" name="message_to1" value=<?php echo $m_id?>>
                            <input type="hidden" name="message_by1" value=<?php echo $user_id?>>
                            <button type="submit" class="info_2" style="text-align:center;border:none;background:none;border-bottom:1px solid #EEE;padding:15px 20px">Xóa</button>
                        </form>
                            <div class="info_2" data-dismiss="modal" style="text-align:center;color:black;padding:20px">Hủy</div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</body>

<?php 


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var mess1Elements = document.querySelectorAll('.mess1');
    mess1Elements.forEach(function (element) {
        element.addEventListener('click', function () {
            element.classList.toggle('active');
        });
    });
});
function myFunction() {
    var colRight = document.querySelector(".col_right");
    var info = document.getElementById("info");

    if (colRight.style.right === "20%") {
        colRight.style.right = "0";
        info.style.display = "none";
    } else {
        colRight.style.right = "20%";
        info.style.display = "block";
    }
}
function showIcon() {
    document.getElementById("myIcon").style.display = "block";
}

document.addEventListener('click', function(event) {
    var isClickInside = document.getElementById("smile_icon").contains(event.target);
    if (!isClickInside) {
        document.getElementById("myIcon").style.display = "none"; 
    }
});

$(document).ready(function(){
    $("#button_heart").attr("src", "img/heart.png");

    $('textarea[name="content"]').keyup(function() {
        // tự động hiển thị icon gửi khi focus và có text
        if ($(this).val() !== "") {
            $("#button_heart").attr("src", "img/send.png");
        } else {
            $("#button_heart").attr("src", "img/heart.png");
        }
    });



    $('textarea[name="content"]').keydown(function(e) {
        if (e.keyCode == 13 && !e.shiftKey && $(this).val().trim() !== "") {
            e.preventDefault();
            $("#messageForm").submit();
        }
    });
    $("#button_heart").click(function() {
        if ($("#button_heart").attr("src") == "img/send.png") {
            // Nếu là icon gửi, thì gửi form 
            $("#messageForm").submit();
        } else {
            // Set the value of the 'content' textarea to the heart icon URL
            $('textarea[name="content"]').val("red_heart.png");
            sendHeartIcon();
            
            //clear the textarea
            $('textarea[name="content"]').val('');
            
        }
    });

    function sendHeartIcon() {
        // Use AJAX to send the form data to the server
        $.ajax({
            url: 'nhantin/send_message.php',
            type: 'POST',
            data: $("#messageForm").serialize(),
            success: function(response){
                $(".content").append('<div style="width:100%;float:left"><img src="img/red_heart.png" style="width:50px;height:50px;float:right; margin:2px 2%;"></div>'); 
                
                $(".content .no").remove();
                $(".content").scrollTop($(".content")[0].scrollHeight);
            }
        });
    }


    $(".icon_cuoi").click(function() {
        var icon = $(this).text(); 
        var current = $('textarea[name="content"]').val(); 
        $('textarea[name="content"]').val(current + icon); 
    });

    





    $("#fileInput").change(function () {
        sendFile(); 
    });
    function sendFile() {
        var formData = new FormData($("#messageForm")[0]);
        $.ajax({
            url: 'nhantin/send_message.php',
            type: 'POST',
            data: formData,
            processData: false,// Không xử lý dữ liệu trước khi gửi
            contentType: false,// Không set header 'Content-Type' (sẽ được tự động set khi sử dụng FormData)
            success: function (response) {
                $(".content").append(response);
                $(".content .no").remove();
                $(".content").scrollTop($(".content")[0].scrollHeight);
            }
        });
    }






    $("#messageForm").on("submit", function(event){
        event.preventDefault();
        $.ajax({
            url: 'nhantin/send_message.php', 
            type: 'POST', 
            data: {
                message_by :  $('input[name="message_by"]').val(),
                message_to : $('input[name="message_to"]').val(),
                content : $('textarea[name="content"]').val(),
                ajax : 1
            }, // data sent with the post request
            success: function(response){
                $(".content").append(response);
                // clear the textarea
                $('textarea[name="content"]').val('');
                $(".content .no").remove();
                $(".content").scrollTop($(".content")[0].scrollHeight);
                loadAllFriends();
            }
        });
    });$(".content").scrollTop($(".content")[0].scrollHeight);


    loadAllFriends();


          $('.tim_kiem').on('input', function () {
          var timkiem = $(this).val();

          if (timkiem === '') {
              loadAllFriends();
              return;
          }
          $.ajax({
              url: 'nhantin/timban.php',
              method: 'POST',
              data: {
                timkiem: timkiem
              },
              success: function (response) {
                $('.message_list').html(response); 
              }
          });
      });

      // Hàm tải tất cả bạn bè
      function loadAllFriends() {
          $.ajax({
              url: 'nhantin/load_messages.php',
              method: 'GET',
              data: {
              },
              success: function (response) {
                  $('.message_list').html(response); 
              }
          });
      }
        


});

</script>


