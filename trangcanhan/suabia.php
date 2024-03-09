<?php 
session_start();
$link = new mysqli("localhost", "root", "", "mxh");
$user_id = $_SESSION['user'];
    $thu_muc="../img/";
    $ten_files_temp=$_FILES["anhbia"]["tmp_name"];
    $ten_files_moi=$thu_muc . uniqid() . '-' . $_FILES["anhbia"]["name"];
    move_uploaded_file($ten_files_temp, $ten_files_moi);
    $anhbia=basename($ten_files_moi);
    
    $sql="UPDATE user SET cover_picture='$anhbia' WHERE user_id=$user_id";
    
    if ($link->query($sql) === TRUE) {
        header("location:../index.php?pid=1");
    } else {
        echo "Cập nhật thất bại! " . $link->error;
    }
?>
