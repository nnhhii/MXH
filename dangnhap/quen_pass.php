<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$success_message = '';
$error_message = '';

if(isset($_POST["submit"])){
    $link = new mysqli('localhost','root','','MXH');
    $email = $_POST["mail"];
    $sql_mail = "SELECT * FROM user WHERE email='$email'";
    $result_mail = $link->query($sql_mail);
    if($result_mail->num_rows > 0){
        // Tạo token ngẫu nhiên
        $token = bin2hex(random_bytes(50));
        
        // Lưu token vào cơ sở dữ liệu
        $sql_token = "UPDATE user SET reset_token='$token' WHERE email='$email'";
        $link->query($sql_token);
        
        // Gửi email cho người dùng với token
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();                                      
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;                               
            $mail->Username = 'yennhisociu2004@gmail.com';                 
            $mail->Password = 'vwsbkrkkcpjrxkrf';                           
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;                                   

            $mail->setFrom('yennhisociu2004@gmail.com', 'Firefly');
            $mail->addAddress($email, 'Example User');     

            $mail->isHTML(true);                                  
            $mail->Subject = 'Reset your password';
            $mail->Body    = "Click on this link to reset your password: http://localhost/Social_Media/dangnhap/reset_pass.php?token=$token";
            $mail->AltBody = "Click on this link to reset your password: http://localhost/Social_Media/dangnhap/reset_pass.php?token=$token";

            $mail->send();
            $success_message = 'Hãy check mail để cập nhật lại mật khẩu';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        $error_message = "Không tìm thấy tài khoản với địa chỉ email này.";
        echo "<script>alert('$error_message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Send Email Form</title>
<style>
    button {
        font-family: 'Roboto', sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #6abfd0;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }
    button:hover, button:active, button:focus {
        background: #538c97;
    }
    .formngoai {
        width: 360px;
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto ;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        border-radius: 2%;
    }
    .formInput {
        font-family: 'Roboto', sans-serif;
        outline: 0;
        background: #f2f8ff;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }
    a {
        color: black;
        text-decoration: none;
    }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Pacifico&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
</head>
<body>
<div style="margin: 0 auto;text-align:center">
    <div style="color:#b8e0e8;font-family: 'Sofia', sans-serif;font-size:50px;padding:10px 0">Firefly</div>
    <img src="../img/logo.png" style="width:80px;height:auto;">
    <h1 style="padding:10px;font-family: 'Pacifico', cursive; font-weight:100; color:#99ADC3"> Nhập email để cập nhật lại mật khẩu</h1>
</div>
<div class="formngoai">
    <form action="" method="POST" role="form">
        <input type="text" placeholder="Email" class="formInput" name="mail"/>
        <button type="submit" name="submit"class="btn btn-primary">Submit</button>
    </form>
    <script>
        <?php if (!empty($success_message)): ?>
            alert("<?php echo $success_message; ?>");
            window.location.href = 'dangnhap.php';
        <?php endif; ?>
    </script>
</div>
</body>
</html>
