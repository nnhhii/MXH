<?php
include 'posts_connect.php';
if(isset($_REQUEST['post_id']) and $_REQUEST['post_id']!=""){
$id=$_GET['post_id'];
$sql = "DELETE FROM posts WHERE post_id='$id'";
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();
}
header("Location: ../home.php");
?>