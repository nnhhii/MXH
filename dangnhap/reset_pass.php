<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if(isset($_GET["token"]) && isset($_POST["password"])){
    $link= new mysqli('localhost','root','','MXH');
    $token=$_GET["token"];
    $password=$_POST["password"];
    $sql_user="SELECT * FROM user WHERE reset_token='$token'";
    $result_user=$link->query($sql_user);
    if($result_user->num_rows > 0){
        $user = $result_user->fetch_assoc();
        $email = $user['email'];
        
        $sql_update="UPDATE user SET password='$password' WHERE email='$email' and reset_token='$token'";
        $result_update=$link->query($sql_update);
        if($result_update){
        echo "<script>
            alert('Đổi mật khẩu thành công');
            window.location.href = 'dangnhap.php';
            </script>";}
    } else {
        echo "Invalid token.";
    }
} else {
?>
<form action="" method="POST" role="form">
    <legend>Reset Password</legend>

    <div class="form-group">
        <label for="">New Password</label>
        <input type="password" name="password" class="form-control" id="" placeholder="New Password">
    </div>
    <button type="submit" name="submit"class="btn btn-primary">Submit</button>
</form>
<?php
}
?>
