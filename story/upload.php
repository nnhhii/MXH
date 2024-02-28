<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mxh";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["submit"])) {
    $target_dir = "../uploads/";
    $video_name = basename($_FILES["video"]["name"]);
    $target_file = $target_dir . $video_name;
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    if ($_FILES["video"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    if($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov"
    && $videoFileType != "mpeg"  && $videoFileType != "png"  && $videoFileType != "jpg") {
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( $video_name ). " has been uploaded.";
            
            $user_id = $_POST["user_id"];
            $content = $_POST["content"];
            $video_url = basename($target_file);
            $music_url = isset($_FILES["music"]) ? basename($_FILES["music"]["name"]) : "";
            $music_name = basename($_FILES["music"]["name"]);
            $music_target_file = $target_dir . $music_name;
            if (move_uploaded_file($_FILES["music"]["tmp_name"], $music_target_file)) {
                echo "The file ". htmlspecialchars($music_name). " has been uploaded.";
            } 
            
            // Lưu đường dẫn của hình ảnh vào biến và cơ sở dữ liệu
            $img_url = ""; // Biến để lưu đường dẫn của hình ảnh
            if (isset($_FILES["image"]["name"])) {
                // Xử lý tải lên hình ảnh ở đây
                $image_name = basename($_FILES["image"]["name"]);
                $image_target_file = $target_dir . $image_name;
        
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_target_file)) {
                    echo "The file " . htmlspecialchars($image_name) . " has been uploaded.";
        
                    // Lưu tên hình ảnh vào cột "img" trong bảng cơ sở dữ liệu
                    $img_url = $image_name;
                } else {
                    echo "Sorry, there was an error uploading your image.";
                }
            }
        
            
            $story_time = $_POST["story_time"];
            
            // Thêm dữ liệu vào cơ sở dữ liệu
            $sql = "INSERT INTO story (user_id, content, video, music, img, story_time)
            VALUES ('$user_id', '$content', '$video_url', '$music_url', '$img_url', '$story_time')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
