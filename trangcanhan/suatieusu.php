<?php 
$tieusu=$_POST["tieusu"];
$link=new mysqli("localhost","root","","mxh");
$sql="update USER set bio='$tieusu'WHERE user_id = 1";
if ($link->query($sql) === TRUE) {
   header("location:../index.php?pid=1");
} else {
   echo "Cập nhật dữ liệu thất bại <br>Lỗi:" . $sql . "<br>" . $link->error;
}
?>
