<form action="" method="POST" role="form">
    <legend>Form title</legend>

    <div class="form-group">
        <label for="">nhập email</label>
        <input type="text" name="mail" class="form-control" id="" placeholder="Input field">
    </div>
    <button type="submit" name="submit"class="btn btn-primary">Submit</button>
</form>
<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if(isset($_POST["submit"])){
    $link= new mysqli('localhost','root','','MXH');
    $email=$_POST["mail"];
    $sql_mail="SELECT * FROM user WHERE email='$email'";
    $result_mail=$link->query($sql_mail);
    if($result_mail->num_rows > 0){
        // Tạo token ngẫu nhiên
        $token = bin2hex(random_bytes(50));
        
        // Lưu token vào cơ sở dữ liệu
        $sql_token="UPDATE user SET reset_token='$token' WHERE email='$email'";
        $link->query($sql_token);
        
        // Gửi email cho người dùng với token
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 2;                                 
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
            $mail->Body    = "Click on this link to reset your password: http://localhost:8080/Social_Media/dangnhap/reset_pass.php?token=$token";
            $mail->AltBody = "Click on this link to reset your password: http://localhost:8080/Social_Media/dangnhap/reset_pass.php?token=$token";

            $mail->send();
            echo 'Đã gửi mail!';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    } else {
        echo "No account found with that email address.";
    }
}
?>
