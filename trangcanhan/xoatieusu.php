<?php 
    $link = new mysqli("localhost", "root", "", "mxh");
    $sql = "UPDATE USER SET TIEUSU = NULL WHERE user_id = 1"; 
    if ($link->query($sql) === TRUE) {
        echo "Xoá thành công!";
        header("location:./trangcanhan.php");
    } else {
        echo "Xóa thất bại! " . $link->error;
    }
    $link->close();
?>
