<?php 
session_start();

$timeout = 1 * 60;

$link=new mysqli("localhost","root","","mxh");

// Kiểm tra xem session đã hết hạn chưa
if (isset($_SESSION['user'])) {
    if ((time() - $_SESSION['last_activity']) > $timeout) {
        $sql_update = "UPDATE user SET is_active=0 WHERE user_id=".$_SESSION['user'];
        $link->query($sql_update);
        session_unset();
        session_destroy();
    }
}

$_SESSION['last_activity'] = time();

$email=$_POST["email"];
$pass=$_POST["pass"];
$sql="select * from user where email='$email' and password='$pass'";
$result=$link ->query($sql);
$row = $result ->fetch_assoc();
if ($result->num_rows==1)
    {
        $_SESSION['user']=$row["user_id"];
        $sql_update = "UPDATE user SET is_active=1 WHERE user_id=".$_SESSION['user'];
        $link->query($sql_update);
        
        header("location:../index.php");
    } else {
        echo "<script>
        alert('SAI MẬT KHẨU HOẶC TÊN ĐĂNG NHẬP');
        setTimeout(function(){
            window.location.href = 'dangnhap.php';
        }, 50);
    </script>";
    }
?>
