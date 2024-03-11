<?php 
session_start();
$link=new mysqli("localhost","root","","mxh");

if(isset($_SESSION['user_admin'])){
    unset($_SESSION['user_admin']);
    header("location:../ADMIN.php");
} else if(isset($_SESSION['user'])){
    $sql_update = "UPDATE user SET is_active=0 WHERE user_id=".$_SESSION['user'];
    $link->query($sql_update);

    unset($_SESSION['user']);
    echo "<script>
        alert('ĐĂNG XUẤT THÀNH CÔNG!');
        setTimeout(function(){
            window.location.href = 'dangnhap.php';
        }, 50);
    </script>";
} else {
    echo 'That bai';
}
?>
