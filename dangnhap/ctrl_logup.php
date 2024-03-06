<?php
$link=new mysqli("localhost","root","","mxh");
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
$ho = $_POST['ho'];
$ten = $_POST['ten'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$ngaysinh = $_POST['ngaysinh'];
$thangsinh = $_POST['thangsinh'];
$namsinh = $_POST['namsinh'];
$gioitinh = $_POST['gioitinh'];

$username = $ho . ' ' . $ten;
$ngaysinh = date('Y-m-d', strtotime($namsinh . '-' . $thangsinh . '-' . $ngaysinh));
$sql_check = "SELECT * FROM user WHERE email = '$email'";
if ($link->query($sql_check)->num_rows > 0) {
    echo "
      <script>
          alert('EMAIL ĐÃ TỒN TẠI!');
          setTimeout(function(){
              window.location.href = 'dangky.php';
          }, 50);
      </script>";
} else{
  $sql="INSERT INTO user(username,email,password,date_of_birth,gender) 
  VALUES ('$username','$email','$pass','$ngaysinh','$gioitinh')";
  if ($link->query($sql) === TRUE) {
    header("location:dangnhap.php?message=Tạo tài khoản thành công!");
} else {
    echo "Thêm dữ liệu thất bại <br>Lỗi: " . $sql . "<br>" . $link->error;
}
}
$link->close();
?>
