<?php 
session_start();
$email=$_POST["email"];
$pass=$_POST["pass"];
$link=new mysqli("localhost","root","","mxh");
$sql="select * from user where email='$email' and password='$pass'";
$result=$link ->query($sql);
$row = $result ->fetch_assoc();
if ($result->num_rows==1)
    {
        header("location:../index.php");
        $_SESSION['user']=$row["user_id"];
    } else {
        echo "<script>
        alert('SAI MẬT KHẨU HOẶC TÊN ĐĂNG NHẬP');
        setTimeout(function(){
            window.location.href = 'login.php';
        }, 50);
    </script>";
    }
?>