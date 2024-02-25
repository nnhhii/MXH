<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'MXH');

if (isset($_POST['user_id']) && isset($_SESSION['user'])) {
    $user_id = $_POST['user_id'];
    $stmt = $link->prepare("DELETE FROM friendrequest WHERE sender_id = ? AND receiver_id = ?");
    $stmt->bind_param("ii", $_SESSION['user'], $user_id);

    if ($stmt->execute()) {
        echo "Đã hủy yêu cầu kết bạn!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
} else {
    echo "Không thể hủy yêu cầu kết bạn!";
}
?>
