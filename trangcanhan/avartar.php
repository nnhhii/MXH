<?php 
    $thu_muc="../img/";
    $ten_files_temp=$_FILES["anhdaidien"]["tmp_name"];
    $ten_files_moi=$thu_muc . uniqid() . '-' . $_FILES["anhdaidien"]["name"];
    move_uploaded_file($ten_files_temp, $ten_files_moi);
    $anhdaidien=basename($ten_files_moi);
    $link=new mysqli("localhost","root","","mxh");
    $sql="UPDATE user SET avartar='$anhdaidien' WHERE user_id=1";
    
    if ($link->query($sql) === TRUE) {
        header("location:../index.php?pid=1");
    } else {
        echo "Cập nhật thất bại! " . $link->error;
    }
?>
