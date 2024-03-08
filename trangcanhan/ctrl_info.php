<?php
session_start();
$user_id = $_SESSION['user'];
$conn= new mysqli("localhost", "root", "", "mxh");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$date_of_birth = $_POST['date_of_birth'];
$study_at = $_POST['study_at'];
$working_at = $_POST['working_at'];
$relationship = $_POST['relationship'];

$sql = "UPDATE user SET username='$username', email='$email', gender='$gender', date_of_birth='$date_of_birth', study_at='$study_at', working_at='$working_at', relationship='$relationship' WHERE user_id=$user_id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Cập nhật thông tin thành công!'); window.location.href='../index.php';</script>";
} else {
    echo "Lỗi cập nhật thông tin: " . $conn->error;
}

$conn->close();
?>
