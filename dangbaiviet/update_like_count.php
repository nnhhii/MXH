<?php
require 'posts_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['postId']) && isset($_POST['increment'])) {
    $postId = $_POST['postId'];
    $increment = $_POST['increment'];

    // Update like_count in the database
    $sql = "UPDATE posts SET like_count = like_count + $increment WHERE id = $postId";
    mysqli_query($conn, $sql);

    // You can add additional error handling or response if needed
}
?>
