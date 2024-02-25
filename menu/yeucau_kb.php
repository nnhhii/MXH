<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'MXH');

if (isset($_POST['user_id']) && isset($_SESSION['user'])) {
    $user_id = $_POST['user_id'];
    $stmt = $link->prepare("INSERT INTO friendrequest (sender_id, receiver_id, status) VALUES (?, ?, 'đã gửi')");
    $stmt->bind_param("ii", $_SESSION['user'], $user_id);

    if ($stmt->execute()) {
        echo "Yêu cầu kết bạn đã được gửi!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
} else {
    echo "Không thể gửi yêu cầu kết bạn!";
}
?>
