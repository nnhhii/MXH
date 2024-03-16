<?php 
session_start();
$user_id = $_SESSION['user'];
    $link = new mysqli("localhost", "root", "", "mxh");
    $sql = "UPDATE USER SET bio = NULL WHERE user_id = $user_id "; 
    if ($link->query($sql) === TRUE) {
        echo "Xoá thành công!";
        header("location:../index.php?pid=1");
    } else {
        echo "Xóa thất bại! " . $link->error;
    }
    $link->close();
?>
