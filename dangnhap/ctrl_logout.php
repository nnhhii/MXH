<!-- <?php 
session_start();
if(isset($_SESSION['user_admin'])){
    unset($_SESSION['user_admin']);
    header("location:../ADMIN.php");
} else echo 'That bai'
?> -->
<?php 
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
    echo "<script>
        alert('ĐĂNG XUẤT THÀNH CÔNG!');
        setTimeout(function(){
            window.location.href = 'dangnhap.php';
        }, 50);
    </script>";
    
} else echo 'That bai'
?>  