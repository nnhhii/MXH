<?php 
if (isset($_SESSION['user']))
{
	$user_id = $_SESSION['user'];
    $ketnoi= new mysqli('localhost','root','','MXH');     
    $friend = "SELECT * FROM user 
    LEFT JOIN friend ON (friend.user_id1 = $user_id AND friend.user_id2 = user.user_id) OR (friend.user_id1 = user.user_id AND friend.user_id2 = $user_id)
    WHERE friend.user_id1 IS NOT NULL OR friend.user_id2 IS NOT NULL";
    $result_fr = $ketnoi->query($friend);  
?>

<style>
body{
    height: 100%;
    margin:0
}
.col_menu{
    width: 70px;
    float: left;
    height: 100%
}
.col_menu > a >img{
    float: left;
    width: 48px;
    height: 48px;
    padding: 10px;
    margin: 10% 17%;
}
.col_menu > a > img:hover{
    cursor: pointer;
    background-color: lightgray;
    border-radius: 10px;
    transform: scale(1.1);
    transition: 0.3s;
}
.col_left{
    width: 375px;
    border-left:rgb(191, 190, 190) solid 1px;
    border-right: rgb(191, 190, 190) solid 1px;
    float: left;
    height: 720px;
    position: relative;
    overflow-y:scroll ;
}
.col_left > .mess {
    margin: 30px 20px;
    float:left;
    font-size: 20px; 
    font-weight: bold; 
    font-family:'Segoe UI', Tahoma,Verdana, sans-serif;
}
.col_left > img {
    width: 30px; 
    height: 30px; 
    margin:30px 25px 15px 0;
    float:right;
    cursor: pointer;
}
.mess1{
    width: 100%;
    height: 80px;
    float: left;
    color: black;
    transition: 0.2s;
}
.mess1:hover{
    background-color: rgb(247, 247, 247);
}
.col_left > a >.mess1.active {
    background-color: rgb(229, 228, 228)
}
.ava{
    background-size: cover;
    border-radius: 50%;
    padding:30px;
    margin: 10px 0 0 10px;
    float: left;
    cursor: pointer;
}
.username{
    float: left;
    font-size: 14px; 
    margin: 18px 0 0 10px;
    font-family:'Segoe UI', Tahoma,Verdana, sans-serif;
    cursor: pointer;
    font-weight: 500;
}
.mini_content{
    float: left;
    font-size: 12px; 
    margin: -5px 0 0 10px;
    font-family:'Segoe UI', Tahoma,Verdana, sans-serif;
    color: gray;
}
.col_right{
    position: absolute;
    right:0;
    left:445px
}
.col_right > .ten{
    height: 80px;
    border-bottom: lightgray solid 1px;
}
.col_right > .ten > div > .nghe_goi{
    padding: 15.25px;
    position: absolute;
    margin-top: 10px;
    cursor: pointer;
    background-size: cover;
}
#call{
    right: 85px;
    background-image: url('https://img.icons8.com/?size=256&id=Iw5aeMT37fzK&format=png');
}
#call:hover{
    background-image: url('https://img.icons8.com/?size=256&id=fnQivuIylSo3&format=png');
}
#call_video{
    right:45px;
    background-image: url('https://img.icons8.com/?size=256&id=OomoDjxpvJzW&format=png');
}
#call_video:hover{
    background-image: url('https://img.icons8.com/?size=256&id=jHA3O0dbvOj1&format=png');
}
#more_info{ 
    right:0;
    background-image: url('https://img.icons8.com/?size=256&id=24865&format=png');
}
#more_info:hover{ 
    background-image: url('https://img.icons8.com/?size=256&id=102729&format=png');
}
.col_right > .content{
    height: 590px;
    overflow-y:scroll ;
}
.col_right > .chat_box{
    position: relative;
    padding: 10px
}
.col_right > .chat_box > form > textarea{
    height: 45px;
    line-height: 2.5;
    border: lightgray solid 1px;
    border-radius: 30px;
    padding-left: 55px;
    padding-right: 130px;
    max-height: 100px;
    overflow: hidden;
    overflow-wrap: break-word;
    font-size: 17px;
    font-family:'Segoe UI', Tahoma, Verdana, sans-serif; 
    position: absolute;
    right: 60px;
    left: 20px;
    resize: none;
    outline:none
}
.col_right > .chat_box > form > .icon{
    width: 50px;
    height: 50px;
    position: absolute;
    top:8px;
    padding: 10px;
    cursor: pointer;
}
#smile_icon{
    left: 27px; 
}
#microphone_icon{
    right:120px;
}
#attachment_icon{
    right: 72px;
    width: 50px;
    height: 50px;
    position: absolute;
    top:8px;
    padding: 10px;
    cursor: pointer;
}
#button_heart{
    right: 10px;
}
#button_heart:hover{
    scale: 1.1;
    transition: 0.3s;
}
.col_right >.chat_box >form > div > label > .nho{
    width:40px;
    height:40px; 
    margin:5px
}
.col_right >.chat_box >form > #myIcon{
    width:270px;
    height:110px; 
    box-shadow:1px 2px 5px lightgray;
    display: none;
    position:absolute;
    bottom:30px;
    left:50px;
    border-radius:10px
}
@media (max-width:900px){
    .col_left{
        width: 100px;
    }
    .col_left > .mess{
        display: none;
    }
    .col_left > img{
        right: 25px;
    }
    .col_left > a >div>.username, .mini_content{
        display: none;
    }
    .col_right{
        left: 172px;
    }
}
@media(max-width:600px){
    .col_menu{
        display: none;
    }
    .col_left{
        height: 670px;
    }
    .col_right{
        top:0;
        left:100px;
    }
    .col_right >.content{
        height:525px;
    }
    .col_right > .ten >.ava{
        margin-top: 15px;
        padding:25px
    }
    .col_left > .mess1 >.ava{
        padding:25px;
        margin: 15px;
    }
    .username{
        margin: 30px 0 0 15px;
        font-size: 17px;
    }
    .col_menu_duoi{
        height: 55px;
        width: 100%;
        border-top: lightgray 1px solid;
        position: absolute;
        bottom: 0;
    }
    .icon_menu{
        float: left;
        margin: 3% 5%;
        padding:14px;
        background-size: cover;
        cursor: pointer;
    }
    .icon_menu:hover{
        transform: scale(1.05);
        transition: 0.1s;
    }
    #home{
        background-image: url('https://img.icons8.com/?size=256&id=Gc9qmZNN9yFN&format=png');
    }
    #explore{
        background-image: url('https://img.icons8.com/?size=256&id=88004&format=png');
    }
    #add{
        background-image: url('https://img.icons8.com/?size=256&id=14092&format=png');
    }
    #mess{
        background-image: url('https://img.icons8.com/?size=256&id=dJOh7yntdHD9&format=png');
    }
    #infor{
        background-image: url('https://img.icons8.com/?size=256&id=eMfeVHKyTnkc&format=png');
    }
    #profile{
        background-image: url('https://th.bing.com/th/id/OIP.R_VSj3S9jJBIz31hmPBQDAAAAA?w=256&h=256&rs=1&pid=ImgDetMain');
    }
}
#info{
    display:none;
    width:20%;
    position:absolute;
    right:0;
    border-left:  1px solid lightgray;
}
.layout_info{
    min-width:200px;
    height:120px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding:20px;
    border-bottom: 1px solid lightgray;
}
.info_1{
    font-size: 25px;
    margin-bottom: 15px;
}
.button_mute{
    border-radius: 50%;
    border: none;
    padding:9px 10px;
    position:absolute;
    right: 20px;
    scale: 1.25;
}
.button_mute:hover{
    background-color:lightgray;
    transition: 0.3s;
}
.info_2{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 16px;
    padding:22px;
    color: #ED4956;
    cursor: pointer;
}
.red_heart{
    width:55px;
    height:60px;
    margin:2px 2%;
    float:right
}
.other-image{
    width:350px;
    margin:2px 2%;
    float:right;
    border-radius: 20px 20px 2px 20px;
}
.text{
    max-width:60%;
    overflow-wrap:break-word;
    padding:10px;
    border-radius:18px 18px 2px 18px;
    background: lightgray;
    float:right;
    margin:2px 2%;
    font-size:16.5px
}
.message_time{
    float:right;
    color:gray; 
    margin-top:15px;
    font-size:12px
}
.url_img{
    width:40px;
    float:right; 
    margin:2px 2%
}
</style>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="col_menu">
        <a href="index.php"><img src="https://img.icons8.com/?size=256&id=Gc9qmZNN9yFN&format=png" style="margin-top: 100px;"></a>
        <a><img class="logo1" src="https://img.icons8.com/?size=256&id=61161&format=png"></a>
        <a><img class="logo1" src="https://img.icons8.com/?size=256&id=43571&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=88004&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=ZI2N2LpZcXuZ&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=7695&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=dJOh7yntdHD9&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=eMfeVHKyTnkc&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=14092&format=png"></a>
    </div>
    <div class="col_left">
        <img src="https://img.icons8.com/?size=256&id=Wyndx3rk1dCv&format=png">
        <div class="mess">Messages</div>
        <?php 
        if ($result_fr !== null && $result_fr->num_rows > 0) {
            if (isset($_GET['m_id'])){
                $m_id = $_GET['m_id'];
            }else{
                $friend_default = "select * from friend inner join user on friend.user_id1 = $user_id and friend.user_id2 = user.user_id or friend.user_id1 =user.user_id and friend.user_id2 = $user_id";
                $result_default = $ketnoi->query($friend_default);
                $row_default = $result_default -> fetch_assoc();
                $m_id = $row_default['user_id'];
            }
            $friend_details = "select * from user where user_id = $m_id";
            $result_dt = $ketnoi->query($friend_details);
            $row_dt = $result_dt ->fetch_assoc();
            while ($row_fr = $result_fr->fetch_assoc()) 
            {
        ?>
            <a href="index.php?pid=0&&m_id=<?php echo $row_fr['user_id']?>">
                <div class="mess1 <?php echo ($row_fr['user_id'] == $m_id) ? 'active' : ''; ?>">
                    <div class="ava" style="background-image: url('img/<?php echo $row_fr["avartar"]?>');"></div>
                    <div class="username"><?php echo $row_fr["username"]?></div><br><br>
                    <div class="mini_content">Active 8h ago</div>
                </div> 
            </a>
        <?php
        }
        ?>
    </div>
    <div class="col_right">
        <div class="ten">
            <div class="ava"style="background-image: url('img/<?php echo $row_dt["avartar"]?>');padding:27px"></div>
            <div class="username"><?php echo $row_dt["username"]?></div><br><br>
            <div class="mini_content">Active 8h ago</div>
            <div style="position: absolute; right:20px; top:17px">
                <div class="nghe_goi" id="more_info" onclick="myFunction()"></div>
                <div class="nghe_goi" id="call_video"></div>
                <div class="nghe_goi" id="call"></div>
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
                    // Kiểm tra 
                    $cssClass = ($content == 'red_heart.png') ? 'red_heart' : 'other-image';
                    echo '<div style="width:100%;float:left">';
                    if ($row['message_by'] == $user_id) {
                        if (strpos($content, '.png') !== false || strpos($content, '.jpg') !== false || strpos($content, '.jpeg') !== false) {
                            // Nếu là ảnh
                            echo '<img src="img/' . $content . '" class="' . $cssClass . '"/>
                                    <div class="message_time">'.$message_time.'</div>';
                        }else if (filter_var($content, FILTER_VALIDATE_URL)) {
                            // If it's a URL
                            echo '<img src="'. $content .'" class="url_img">
                                    <div class="message_time">'.$message_time.'</div>';
                        }else {
                            //Nếu là text
                            echo '<span class="text">' . $content . '</span>
                                    <div class="message_time">'.$message_time.'</div>';
                        }
                    }else{
                        if (strpos($content, '.png') !== false || strpos($content, '.jpg') !== false || strpos($content, '.jpeg') !== false) {
                            echo '<img src="img/' . $content . '" class="' . $cssClass . '" style="float:left;border-radius: 20px 20px 20px 2px;">
                                    <div class="message_time" style="float:left">'.$message_time.'</div>';
                        }else if (filter_var($content, FILTER_VALIDATE_URL)) {
                            // If it's a URL
                            echo '<img src="'. $content .'" class="url_img" style="float:left">
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
            <form id="messageForm" action="send_message.php" method="post" enctype="multipart/form-data">
                <input type= "hidden" name="message_to" value="<?php echo $m_id?>">
                <input type="hidden" name="message_by" value="<?php echo $user_id?>">
                <textarea type="text" name="content" placeholder="Message..."></textarea>
                <img class="icon" id="smile_icon" onclick="showIcon()" src="https://img.icons8.com/?size=512&id=y6j3NCqRGOcj&format=png">
                    <div id="myIcon">
                        <input type="hidden" id="icon_cuoi">
                        <label for="icon_cuoi">
                            <img class="nho" src="https://img.icons8.com/?size=512&id=63230&format=png">
                        </label>
                        <input type="hidden" id="icon_sad">
                        <label for="icon_sad">
                            <img class="nho"src="https://img.icons8.com/?size=512&id=63238&format=png">
                        </label>
                        <input type="hidden" id="icon_khoc">
                        <label for="icon_khoc">
                            <img class="nho" src="https://img.icons8.com/?size=512&id=63232&format=png">
                        </label>
                        <input type="hidden" id="icon_mattraitim">
                        <label for="icon_mattraitim">
                            <img class="nho" src="https://cdn4.iconfinder.com/data/icons/emoji-66/64/30-in_love-256.png">
                        </label>
                        <input type="hidden" id="icon_thienthan">
                        <label for="icon_thienthan">
                            <img class="nho" src="https://th.bing.com/th/id/R.1911e9b534bf190d00bc9d416c122452?rik=aPKFPw1wzxhqZA&riu=http%3a%2f%2fclipart-library.com%2fimages_k%2fangel-emoji-transparent%2fangel-emoji-transparent-21.png&ehk=2gb0N%2fHb9PtemQtGJhwH6ioQTbTIbnFPejBDb%2bdXsck%3d&risl=&pid=ImgRaw&r=0">
                        </label>
                        <input type="hidden" id="icon_sunglasses">
                        <label for="icon_sunglasses">
                            <img class="nho" src="https://img.icons8.com/?size=512&id=63222&format=png">
                        </label>
                        <input type="hidden" id="icon_delicious">
                        <label for="icon_delicious">
                            <img class="nho" src="https://img.icons8.com/?size=512&id=zGC9oDE4cozu&format=png">
                        </label>
                        <input type="hidden" id="icon_angry">
                        <label for="icon_angry">
                            <img class="nho" src="https://img.icons8.com/?size=512&id=63225&format=png">
                        </label>
                        <input type="hidden"id="icon_bth" >
                        <label for="icon_bth">
                            <img class="nho" src="https://img.icons8.com/?size=512&id=63224&format=png">
                        </label>
                        <input type="hidden"id="icon_nerd" >
                        <label for="icon_nerd">
                            <img class="nho"src="https://img.icons8.com/?size=512&id=63228&format=png">
                        </label>
                    </div>
                <input type="file" name="file" id="fileInput" style="display: none;">
                <label for="fileInput">
                    <img class="icon" id="attachment_icon" src="https://img.icons8.com/?size=512&id=114320&format=png">
                </label>
                <img class="icon" id="button_heart" src="img/heart.png">
            </form>
        </div>
    </div>
    <div class="col_menu_duoi">
        <a href="menu.php"><div class="icon_menu" id="home" style="margin-left:7%"></div></a>
        <div class="icon_menu" id="explore"></div>
        <div class="icon_menu" id="add"></div>
        <div class="icon_menu" id="mess"></div>
        <div class="icon_menu" id="infor"></div>
        <div class="icon_menu" id="profile" style="border-radius: 50%;"></div>
    </div>
    <div id=info>
        <div class="layout_info">
            <div class="info_1">Chi tiết</div>
            <div class="mute_mess">Tắt thông báo 
                <button type="button" class="button_mute"><i class="fa-solid fa-bell"></i></button>
            </div>
        </div>
        <div style="height:450px;border-bottom: 1px solid lightgray;">
            <a href="index.php?pid=2&&m_id=<?php echo $row_dt["user_id"]?>">
                <div class="mess1">
                    <div class="ava" style="background-image: url('img/<?php echo $row_dt["avartar"]?>')"></div>
                    <div class="username"><?php echo $row_dt["email"]?></div><br><br>
                    <div class="mini_content"><?php echo $row_dt["username"]?></div>
                </div>
            </a>
        </div>
        <div style="height:150px">
            <div class="info_2">Chặn</div>
            <div class="info_2">Xóa cuộc trò chuyện</div>
        </div>
    </div>
</body>

<?php 
}else {
    echo "<div style='width:150px;height:50px;margin:100px 100px;text-align:center; color:gray'>Không có bạn bè. <br> Hãy kết bạn thôi nào!</div>";
}}else{
    header("location:dangnhap/login.php");
}

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

$('.nho').click(function() {
    var iconURL = $(this).attr('src'); // Get the URL of the clicked icon
    sendIcon(iconURL); // Call the function to send the icon URL to the server
});

function sendIcon(iconURL) {
    $("#messageForm").append('<input type="hidden" name="icon_url" value="' + iconURL + '">');

    $.ajax({
        url: 'send_message.php',
        type: 'POST',
        data: $("#messageForm").serialize(),
        success: function(response) {
            console.log(response);
            $(".content").append(response);
            $(".content .no").remove();
            $(".content").scrollTop($(".content")[0].scrollHeight);
        }
    });
}



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
            url: 'send_message.php',
            type: 'POST',
            data: $("#messageForm").serialize(),
            success: function(response){
                console.log(response);
                $(".content").append('<div style="width:100%;float:left"><img src="img/red_heart.png" style="width:50px;height:50px;float:right; margin:2px 2%;"></div>'); 
                
                $(".content .no").remove();
                $(".content").scrollTop($(".content")[0].scrollHeight);
            }
        });
    }




    





    $("#fileInput").change(function () {
        sendFile(); 
    });
    function sendFile() {
        var formData = new FormData($("#messageForm")[0]);
        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: formData,
            processData: false,// Không xử lý dữ liệu trước khi gửi
            contentType: false,// Không set header 'Content-Type' (sẽ được tự động set khi sử dụng FormData)
            success: function (response) {
                console.log(response);
                $(".content").append(response);
                $(".content .no").remove();
                $(".content").scrollTop($(".content")[0].scrollHeight);
            }
        });
    }






    $("#messageForm").on("submit", function(event){
        event.preventDefault();
        $.ajax({
            url: 'send_message.php', 
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
            }
        });
    });$(".content").scrollTop($(".content")[0].scrollHeight);
});
</script>