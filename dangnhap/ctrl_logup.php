<?php
$username=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$link=new mysqli("localhost","root","","mxh");
$sql_check = "SELECT * FROM user WHERE username = '$username'";

if ($link->query($sql_check)->num_rows > 0) {
    echo "
      <script>
          alert('EMAIL ĐÃ TỒN TẠI!');
          setTimeout(function(){
              window.location.href = 'logup.php';
          }, 50);
      </script>";
} else{
  $sql="INSERT INTO user(username,email,password) 
  VALUES ('$username','$email','$pass')";
  if ($link->query($sql) === TRUE) {
      header("location:login.php");
    } else {
      echo "Thêm dữ liệu thất bại <br>Lỗi: " . $sql . "<br>" . $link->error;
    }
}
?>