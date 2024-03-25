<?php
session_start();

$timeout = 10 * 60; // Đặt thời gian chờ là 10 phút

$link = new mysqli("localhost", "root", "", "mxh");

// Kiểm tra xem session đã hết hạn chưa
if (isset ($_SESSION['user'])) {
    if ((time() - $_SESSION['last_activity']) > $timeout) {
        $current_time = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
        $sql_update = "UPDATE user SET is_active=0, last_activity='$current_time' WHERE user_id=" . $_SESSION['user'];
        $link->query($sql_update);
        session_unset();
        session_destroy();
    }
}

$email = $_POST["email"];
$pass = $_POST["pass"];
$sql = "select * from user where email='$email'";
$result = $link->query($sql);
$row = $result->fetch_assoc();
if ($result->num_rows == 1) {
    if (md5($pass) == $row['password']) {
        $_SESSION['user'] = $row["user_id"];
        $sql_update = "UPDATE user SET is_active=1 WHERE user_id=" . $_SESSION['user'];
        $link->query($sql_update);

        $_SESSION['last_activity'] = time();

        header("location:../index.php");
    } else {
        echo "<script>
        alert('SAI MẬT KHẨU HOẶC TÊN ĐĂNG NHẬP');
        setTimeout(function(){
            window.location.href = 'dangnhap.php';
        }, 50);
    </script>";
    }
} else {
    echo "<script>
        alert('SAI MẬT KHẨU HOẶC TÊN ĐĂNG NHẬP');
        setTimeout(function(){
            window.location.href = 'dangnhap.php';
        }, 50);
    </script>";
}
?>