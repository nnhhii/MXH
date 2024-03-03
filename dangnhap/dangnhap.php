<style>
body {
  font-family: "Roboto", sans-serif;     
}
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
button:hover,button:active,button:focus {
  background: #538c97
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
  border-radius:2%;
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
<div style="margin: 0 auto;text-align:center">
<div style="color:#b8e0e8;font-family: 'Sofia', sans-serif;font-size:50px;padding:10px 0">Firefly</div>
<img src="../img/logo.png" style="width:80px;height:auto;">
<h1 style="padding:10px;font-family: 'Pacifico', cursive; font-weight:100; color:#99ADC3"> Giúp bạn kết nối và chia sẻ với mọi người trong cuộc sống của bạn </h1>
</div>
<div class="formngoai">
  <form action="ctrl_login.php" method="post">
    <input type="text" placeholder="Email" class="formInput" name="email"/>
    <input type="password" placeholder="Mật khẩu" class="formInput" name="pass"/>
    <button>Đăng nhập</button>
    <p style="margin: 15px 0 0;color: #b3b3b3;font-size: 12px;"><a href="#">Quên mật khẩu?</a></p>
    <hr  width="100%"  />
    <a href="dangky.php" style="color:white"><button type="button"style="margin-top:5%; width:12vw">Tạo tài khoản mới</button></a>
  </form>
</div>
<?php
if (isset($_GET['message'])) {
    echo "<script>alert('" . $_GET['message'] . "');</script>";
}
?>


