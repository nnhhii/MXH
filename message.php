<!DOCTYPE html>
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
    width: 40%;
    height: 28px;
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
}
.col_left > .mess {
    position: absolute; 
    left: 20px; 
    top:30px; 
    font-size: 20px; 
    font-weight: bold; 
    font-family:'Segoe UI', Tahoma,Verdana, sans-serif;
}
.col_left > img {
    width: 30px; 
    height: 30px; 
    position: absolute; 
    right: 30px; 
    top:30px;
    cursor: pointer;
}
.col_left > .mess1{
    width: 100%;
    height: 80px;
    position: absolute;
    top:80px
}
.col_left > .mess1:hover{
    background-color: rgb(237, 235, 235);
    transition: 0.2s;
    cursor: pointer;
}
.ava{
    background-image: url('img/anh1.jpg');
    background-position: center;
    background-size: cover;
    border-radius: 50%;
    width: 60px;
    height: 60px;
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
}
.mini_content{
    float: left;
    font-size: 12px; 
    margin: 5px 0 0 10px;
    font-family:'Segoe UI', Tahoma,Verdana, sans-serif;
    color: gray;
}
.col_right{
    position: absolute;
    right:0;
    left:455px;
    height: 100%;
}
.col_right > .ten{
    height: 80px;
    border-bottom: lightgray solid 1px;
}
.col_right > .ten > div > .nghe_goi{
    padding: 17.5px;
    float: right;
    margin: 10px;
    cursor: pointer;
    background-size: cover;
}
#call{
    background-image: url('https://img.icons8.com/?size=256&id=Iw5aeMT37fzK&format=png');
}
#call:hover{
    background-image: url('https://img.icons8.com/?size=256&id=fnQivuIylSo3&format=png');
}
#call_video{
    background-image: url('https://img.icons8.com/?size=256&id=OomoDjxpvJzW&format=png');
}
#call_video:hover{
    background-image: url('https://img.icons8.com/?size=256&id=jHA3O0dbvOj1&format=png');
}
#more_info{ 
    background-image: url('https://img.icons8.com/?size=256&id=24865&format=png');
}
#more_info:hover{ 
    background-image: url('https://img.icons8.com/?size=256&id=102729&format=png');
}
.col_right > .content{
    height: 570px;
    overflow-y:scroll ;
    
}
.col_right > .chat_box{
    position: relative;
    padding: 10px;
    width:98%;
}
.col_right > .chat_box > form > textarea{
    height: 50px;
    line-height: 2.5;
    border: lightgray solid 1px;
    border-radius: 30px;
    padding-left: 55px;
    padding-right: 130px;
    max-height: 100px;
    overflow: auto;
    overflow-wrap: break-word;
    font-size: 17px;
    font-family:'Segoe UI', Tahoma, Verdana, sans-serif; 
    position: absolute;
    right: 60px;
    left: 20px;
    resize: none;
}
.col_right > .chat_box > form > .icon, .icon{
    width: 30px;
    height: 30px;
    position: absolute;
    top:12px;
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
}
#button_icon{
    right: 10px;
}
#button_icon:hover{
    scale: 1.1;
    transition: 0.3s;
}
</style>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="col_menu">
        <a href="menu.html"><img src="https://img.icons8.com/?size=256&id=Gc9qmZNN9yFN&format=png" style="margin-top: 100px;"></a>
        <a><img class="logo1" src="https://img.icons8.com/?size=256&id=61161&format=png"></a>
        <a><img class="logo1" src="https://img.icons8.com/?size=256&id=43571&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=88004&format=png"></a>
        <!-- <img src="https://img.icons8.com/?size=256&id=9733&format=png"> -->
        <a><img src="https://img.icons8.com/?size=256&id=ZI2N2LpZcXuZ&format=png"></a>
        <!-- <img src="https://img.icons8.com/?size=256&id=alybng0KUhxp&format=png"> -->
        <a><img src="https://img.icons8.com/?size=256&id=7695&format=png"></a>
        <!-- <img src="https://img.icons8.com/?size=256&id=84430&format=png"> -->
        
        <!-- <a><img src="https://img.icons8.com/?size=256&id=TfBuMnTzwL0v&format=png"></a> -->
        <a><img src="https://img.icons8.com/?size=256&id=dJOh7yntdHD9&format=png"></a>
        <a><img src="https://img.icons8.com/?size=256&id=eMfeVHKyTnkc&format=png"></a>
        <!-- <img src="https://img.icons8.com/?size=256&id=62atSgaif9UE&format=png"> -->
        <a><img src="https://img.icons8.com/?size=256&id=14092&format=png"></a> 
        <!-- <img src="https://img.icons8.com/?size=256&id=db3aaXZdalCP&format=png"> -->
    </div>
    <div class="col_left">
        <img src="https://img.icons8.com/?size=256&id=Wyndx3rk1dCv&format=png">
        <div class="mess">Messages</div>
        <div class="mess1">
            <div class="ava"></div>
            <div class="username">Thùy Trang</div><br><br>
            <div class="mini_content">Active 8h ago</div>
        </div>
    </div>
    <div class="col_right">
        <div class="ten">
            <div class="ava"></div>
            <div class="username"><b>Thùy Trang</b></div><br><br>
            <div class="mini_content">Active 8h ago</div>
            <div style="position: absolute; right:20px; top:17px">
                <div class="nghe_goi" id="more_info"></div>
                <div class="nghe_goi" id="call_video"></div>
                <div class="nghe_goi" id="call"></div>
            </div>
        </div>
        <div class="content">
            <?php 
            $ketnoi= new mysqli('localhost','root','','MXH');
            $sql_m = "SELECT * FROM message";
            $result = $ketnoi->query($sql_m);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $content = $row['content'];
                    $isImage = filter_var($content, FILTER_VALIDATE_URL) && pathinfo(parse_url($content, PHP_URL_PATH), PATHINFO_EXTENSION) != 'php';
                    echo '<div style="width:100%;float:left">';

                    if ($isImage) {
                        echo '<img src="' . $content . '" style="width:40px;height:40px;float:right; margin:2px 2%;">';
                    } else {
                        echo '<div style="max-width:60%;overflow-wrap:break-word;padding:10px;border-radius:18px;background: lightgray;float:right;margin:2px 2%;font-size:17px">' . $content . '</div>';
                    }
        
                    echo '</div>';
                }
            } else {
                echo '<div class="no" style="display: flex;flex-direction: column;justify-content: center;height:100%;font-size:17px;text-align:center;color:gray">
                    Chưa có tin nhắn nào. <br> Hãy bắt đầu cuộc trò chuyện!</div>';
            }?>
        </div>
        <div class="chat_box">
            <form id="messageForm" action="" method="post" enctype="multipart/form-data">
                <input type= "hidden" name="message_to" value="<?php echo $msg_to_id?>">
                <input type="hidden" name="message_by" value="<?php echo $user_id?>">
                <textarea type="text" name="content" placeholder="Message..."></textarea>
                
    
                <img class="icon" id="smile_icon" src="https://img.icons8.com/?size=256&id=59802&format=png">
                <img class="icon" id="microphone_icon" src="https://img.icons8.com/?size=256&id=ZNyAxEX9vDxS&format=png">
                <input type="file" name="file" id="fileInput" style="display: none;">
                <label for="fileInput">
                    <img class="icon" id="attachment_icon" src="https://img.icons8.com/?size=256&id=11322&format=png">
                </label>
                <img class="icon" name="content" id="button_icon" src="https://img.icons8.com/?size=256&id=86&format=png">
            </form>

        </div>
        
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#button_icon").attr("src", "https://img.icons8.com/?size=256&id=86&format=png");

    $('textarea[name="content"]').focus(function() {
        // khi focus và có text thì đổi src thành icon gửi
        if ($(this).val() !== "") {
            $("#button_icon").attr("src", "https://img.icons8.com/?size=256&id=RHtRRB1E4DKI&format=png");
        }
    });
    $('textarea[name="content"]').blur(function() {
        // khi bấm ra và input rỗng thì src icon trái tim
        if ($(this).val() === "") {
            $("#button_icon").attr("src", "https://img.icons8.com/?size=256&id=86&format=png");
        }
    });
    $('textarea[name="content"]').keyup(function() {
        // tự động hiển thị icon gửi khi focus và có text
        if ($(this).val() !== "") {
            $("#button_icon").attr("src", "https://img.icons8.com/?size=256&id=RHtRRB1E4DKI&format=png");
        } else {
        // tự động hiển thị icon trái tim khi ko focus và ko có text
            $("#button_icon").attr("src", "https://img.icons8.com/?size=256&id=86&format=png");
        }
    });





    $('textarea[name="content"]').keydown(function(e) {
        if (e.keyCode == 13 && !e.shiftKey && $(this).val().trim() !== "") {
            e.preventDefault();
            $("#messageForm").submit();
        }
    });
    $("#button_icon").click(function() {
        if ($("#button_icon").attr("src") == "https://img.icons8.com/?size=256&id=RHtRRB1E4DKI&format=png") {
            // Nếu là icon gửi, thì gửi form 
            $("#messageForm").submit();
        } else {
            //thêm icon heart zo div content
            $(".content").append('<div style="width:100%;float:left"><img src="https://img.icons8.com/?size=256&id=tSeDcCGva4Wj&format=png" style="width:40px;height:40px;float:right; margin:2px 2%;"></div>'); 

            // Set the value of the 'content' textarea to the heart icon URL
            $('textarea[name="content"]').val("https://img.icons8.com/?size=256&id=tSeDcCGva4Wj&format=png");

            sendImgIcon();
            //clear the textarea
            $('textarea[name="content"]').val('');
        }
    });
    function sendImgIcon() {
        // Use AJAX to send the form data to the server
        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: $("#messageForm").serialize(),
            success: function(response){
                // Handle the response if needed
                console.log(response);
                $("#button_icon").attr("src", "https://img.icons8.com/?size=256&id=86&format=png");
                $(".content .no").remove();
                $(".content").scrollTop($(".content")[0].scrollHeight);
            }
        });
    }






    $("#fileInput").change(function() {
        sendFile(); // Function to handle file submission
    });
    function sendFile() {
        var formData = new FormData($("#messageForm")[0]);
        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response);
                $(".content .no").remove();
                var data = JSON.parse(response);

                // Append a link to the uploaded file in the div content
                $(".content").append('<div style="width:100%;float:left"><a href="' + data.url + '" target="_blank">' + data.filename + '</a></div>');

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
                message_to : $('input[name="message_to"]').val(),
                content : $('textarea[name="content"]').val(),
                ajax : 1
            }, // data sent with the post request
            success: function(response){
                $(".content").append(response);
                // clear the textarea
                $('textarea[name="content"]').val('');
                // chuyển lại icon trái tim mặc định
                $("#button_icon").attr("src", "https://img.icons8.com/?size=256&id=86&format=png");
                $(".content .no").remove();
                $(".content").scrollTop($(".content")[0].scrollHeight);
            }
        });
    });
});
$(".content").scrollTop($(".content")[0].scrollHeight);
</script>