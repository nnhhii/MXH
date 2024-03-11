<?php
include 'posts_connect.php';

$id=$_GET['post_id'];
$sql2 = "DELETE FROM notification WHERE post_id='$id'";
$sql1 = "DELETE FROM post_function WHERE post_id='$id'";
$sql = "DELETE FROM posts WHERE post_id='$id'";

if ($conn->query($sql2) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql) === TRUE) {
    echo '
    <script>
        alert("Xóa thành công!");
        window.location.href = "../index.php";
    </script>';
} 
