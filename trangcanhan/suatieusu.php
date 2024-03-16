<?php 
session_start();
$tieusu=$_POST["tieusu"];
$link=new mysqli("localhost","root","","mxh");
$user_id = $_SESSION['user'];
$sql="update USER set bio='$tieusu'WHERE user_id = $user_id";
if ($link->query($sql) === TRUE) {
   header("location:../index.php?pid=1");
} else {
   echo "Cập nhật dữ liệu thất bại <br>Lỗi:" . $sql . "<br>" . $link->error;
}
?>
