<?php 
    $thu_muc="../img/";
    $ten_files_temp=$_FILES["anhdaidien"]["tmp_name"];
    $ten_files_moi=$thu_muc . uniqid() . '-' . $_FILES["anhdaidien"]["name"];
    move_uploaded_file($ten_files_temp, $ten_files_moi);
    $anhdaidien=basename($ten_files_moi);
    $link=new mysqli("localhost","root","","mxh");
    $sql="UPDATE user SET anhdaidien='$anhdaidien' WHERE ID_USER=1";
    
    if ($link->query($sql) === TRUE) {
        header("location:trangcanhan.php");
    } else {
        echo "Cập nhật thất bại! " . $link->error;
    }
?>
