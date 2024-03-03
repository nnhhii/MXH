<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    $conn = new mysqli('localhost', 'root', '', 'mxh');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $check_sql = "SELECT * FROM saved_posts WHERE user_id = ? AND post_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param('ii', $user_id, $post_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "saved";
    } else {
        echo "not_saved";
    }

    $check_stmt->close();
    $conn->close();
}
?>