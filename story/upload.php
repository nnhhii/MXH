<?php
$link = new mysqli('localhost', 'root', '', 'MXH');
date_default_timezone_set('Asia/Ho_Chi_Minh');
if ($_FILES["file"]["size"] > 50000000) {
    echo "Kích thước quá lớn!";
} else {
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $file_type = $_FILES["file"]["type"];

    $target_dir = "uploads/";

    // Kiểm tra kiểu 
    if (strpos($file_type, "video") !== false) {
        $target_dir .= "videos/";
    } elseif (strpos($file_type, "image") !== false) {
        $target_dir .= "images/";
    } else {
        echo "Unsupported file type.";
        exit;
    }

    // Đường dẫn tệp tải lên
    $target_file = $target_dir . basename($file_name);
    move_uploaded_file($file_tmp, $target_file);

    // Xử lý nhạc
    $music_name = $_FILES["music"]["name"];
    $music_tmp = $_FILES["music"]["tmp_name"];
    $music_path = "uploads/music/" . $music_name;
    move_uploaded_file($music_tmp, $music_path);



    $user_id = $_POST["story_by"];
    $content = $_POST["content"];
    $story_time = date("Y-m-d H:i:s");

    // Thêm dữ liệu vào cơ sở dữ liệu
    $sql = "INSERT INTO story (user_id, content, file, music, story_time)
    VALUES ($user_id, '$content', '$target_file', '$music_path', '$story_time')";
    $result = $link->query($sql);

    header("location:../index.php");
}

