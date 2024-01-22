<?php 
session_start();
$TEN_DN=$_POST["TEN_DN"];
$PASS=$_POST["PASS"];
$link=new mysqli("localhost","root","","khachsan");
$sql="select * from ADMIN where TEN_DN='$TEN_DN' and PASS='$PASS'";
if ($link->query($sql)->num_rows==1)
    {
        header("location:../index_menu_admin.php");
        $_SESSION['user']=$TEN_DN;
    } else {
        echo "Sai mật khẩu hoặc tên đăng nhập. " . $link->error;
    }
?>
