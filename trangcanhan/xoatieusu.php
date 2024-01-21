<?php 
    $link = new mysqli("localhost", "root", "", "mxh");
    $sql = "UPDATE USER SET bio = NULL WHERE user_id = 1"; 
    if ($link->query($sql) === TRUE) {
        echo "Xoá thành công!";
        header("location:../index.php?pid=1");
    } else {
        echo "Xóa thất bại! " . $link->error;
    }
    $link->close();
?>
