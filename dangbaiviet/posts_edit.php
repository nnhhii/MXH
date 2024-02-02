<?php
// Kết nối Database
require_once 'posts_connect.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM `posts` WHERE post_id='$id'");
$row = mysqli_fetch_assoc($query);

if (isset($_POST['update_posts'])) {
    $content = $_POST['content'];

    // Kiểm tra xem người dùng đã chọn ảnh mới hay chưa
    if ($_FILES['image']['size'] > 0) { 
        // Nếu có ảnh mới, xử lý tải lên và lưu đường dẫn mới vào cơ sở dữ liệu
        $target = "../img/"; // Đường dẫn thư mục lưu trữ ảnh
        $image = $_FILES['image']['name'];
        $target_file = $target. basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            // Cập nhật cả nội dung và ảnh mới
            $sql = "UPDATE `posts` SET content='$content', image='$image' WHERE post_id='$id'";
        } else {
            echo "Upload ảnh mới thất bại.";
        }
    } else {
        // Nếu không có ảnh mới, chỉ cập nhật nội dung
        $sql = "UPDATE `posts` SET content='$content' WHERE post_id='$id'";
    }
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">alert("Chỉnh sửa bài viết thành công !");
            window.location.href = "../home.php";
            exit();
        </script>';
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa dữ liệu trong Database</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

    <style>
/* style.css */

/* Đặt kích thước và cách can của form */
body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 550px;
            width: 100%;
            margin: 20px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }

        textarea, input[type="file"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        </style>

    <form method="POST" enctype="multipart/form-data" class="form">
        <h2>Chỉnh sửa bài viết</h2>
        <label>Content:<br/>
            <textarea name="content" id="content" rows="10" cols="80"><?php echo $row['content']; ?></textarea>
        </label><br/>
        <label>Hình ảnh: <br/>
            <input type="file" name="image" class="hinhanh"><br/><br/>
        </label>
        <input type="submit" value="Update" name="update_posts">
    </form>
</body>
</html>
