<?php 
session_start();
$old_pass = $_POST["old_pass"];
$new_pass = $_POST["new_pass"];
$confirm_new_pass = $_POST["confirm_new_pass"];

$link = new mysqli("localhost", "root", "", "mxh");
$user_id = $_SESSION['user'];

$sql = "SELECT * FROM user WHERE user_id='$user_id' AND password='$old_pass'";
$result = $link->query($sql);

if ($result->num_rows == 1) {
    if ($new_pass == $confirm_new_pass) {
        $sql = "UPDATE user SET password='$new_pass' WHERE user_id='$user_id'";
        if ($link->query($sql) === TRUE) {
            echo "<script>
            alert('Mật khẩu đã được cập nhật thành công');
            setTimeout(function(){
                window.location.href = 'dangnhap.php';
            }, 50);
            </script>";
        } else {
            echo "<script>
            alert('Có lỗi xảy ra khi cập nhật mật khẩu');
            setTimeout(function(){
                window.location.href = 'index.php?pid=13';
            }, 50);
            </script>";
        }
    } else {
        echo "<script>
        alert('Mật khẩu mới và xác nhận mật khẩu mới không khớp');
        setTimeout(function(){
            window.location.href = '../index.php?pid=13';
        }, 50);
        </script>";
    }
} else {
    echo "<script>
    alert('Mật khẩu cũ không chính xác');
    setTimeout(function(){
        window.location.href = '../index.php?pid=13';
    }, 50);
    </script>";
}
?>
