<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if (isset ($_GET["token"]) && isset ($_POST["password"])) {
    $link = new mysqli('localhost', 'root', '', 'MXH');
    if ($link->connect_errno) {
        echo "Failed to connect to MySQL: " . $link->connect_error;
        exit();
    }
    $token = $link->real_escape_string($_GET["token"]);
    $password = $link->real_escape_string(md5($_POST["password"]));
    $sql_user = "SELECT * FROM user WHERE reset_token='$token'";
    $result_user = $link->query($sql_user);
    if ($result_user !== false && $result_user->num_rows > 0) {
        $user = $result_user->fetch_assoc();
        $email = $user['email'];

        $sql_update = "UPDATE user SET password='$password' WHERE email='$email' and reset_token='$token'";
        $result_update = $link->query($sql_update);
        if ($result_update) {
            echo "<script>
                    alert('Đổi mật khẩu thành công');
                    window.location.href = 'dangnhap.php';
                  </script>";
        }
    } else {
        echo "Invalid token.";
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
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

            button:hover,
            button:active,
            button:focus {
                background: #538c97;
            }

            .formngoai {
                width: 360px;
                position: relative;
                z-index: 1;
                background: #FFFFFF;
                max-width: 360px;
                margin: 0 auto;
                padding: 45px;
                text-align: center;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
                border-radius: 2%;
            }

            .form-control {
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
        </style>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anta&family=Pacifico&display=swap" rel="stylesheet">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    </head>

    <body>
        <div style="margin: 0 auto;text-align:center">
            <div style="color:#b8e0e8;font-family: 'Sofia', sans-serif;font-size:50px;padding:10px 0">Firefly</div>
            <img src="../img/logo.png" style="width:80px;height:auto;">
            <h1 style="padding:10px;font-family: 'Pacifico', cursive; font-weight:100; color:#99ADC3">Nhập mật khẩu mới để
                đặt lại</h1>
        </div>
        <div class="formngoai">
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="" placeholder="Mật khẩu mới">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Gửi</button>
            </form>
        </div>
        <script>
            <?php if (isset ($_GET["token"])): ?>
                <?php if (!empty ($_POST["password"])): ?>
                    alert("Đổi mật khẩu thành công");
                    window.location.href = 'dangnhap.php';
                <?php endif; ?>
            <?php endif; ?>
        </script>
    </body>

    </html>
    <?php
}
?>