<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user']; 

    $conn = new mysqli('localhost', 'root', '', 'mxh');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM saved_posts WHERE post_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $post_id, $user_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Có lỗi xảy ra. Vui lòng thử lại.";
    }

    $stmt->close();
    $conn->close();
}
?>
