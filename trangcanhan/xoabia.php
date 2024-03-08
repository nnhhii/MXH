<?php 
session_start();
    $link = new mysqli("localhost", "root", "", "mxh");
    $user_id = $_SESSION['user'];
    $sql = "UPDATE USER SET cover_picture = NULL WHERE user_id = $user_id"; 
    if ($link->query($sql) === TRUE) {
        echo "Xoá thành công!";
        header("location:../index.php?pid=1");
    } else {
        echo "Xóa thất bại! " . $link->error;
    }
    $link->close();
?>
