<title>Firefly</title>
<link rel="icon" href="../img/logo1.png" type = "image/x-icon" >
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
  padding: 45px 45px 20px 45px;
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
  <form action="ctrl_logup.php" method="post">
    <div style="display: flex; justify-content: space-between;">
      <input type="text" placeholder="Họ" class="formInput" name="ho"/>
      <input type="text" placeholder="Tên" class="formInput" name="ten"/>
    </div>
    <input type="email" placeholder="Email" class="formInput" name="email"/>
    <input type="password" placeholder="Mật khẩu" class="formInput" name="pass"/>
    <div style="display: flex; justify-content: space-between;">
      <select name="ngaysinh" class="formInput">
        <option value="">Ngày</option>
        <script>
          for(var i = 1; i <= 31; i++){
            document.write('<option value="' + i + '">' + i + '</option>');
          }
        </script>
      </select>
      <select name="thangsinh" class="formInput">
        <option value="">Tháng</option>
        <script>
          for(var i = 1; i <= 12; i++){
            document.write('<option value="' + i + '">' + i + '</option>');
          }
        </script>
      </select>
      <select name="namsinh" class="formInput">
        <option value="">Năm</option>
        <script>
          var year = new Date().getFullYear();
          for(var i = 1900; i <= year; i++){
            document.write('<option value="' + i + '">' + i + '</option>');
          }
        </script>
      </select>
    </div>
    <select name="gioitinh" class="formInput">
      <option value="nam">Nam</option>
      <option value="nu">Nữ</option>
      <option value="khac">Khác</option>
    </select>
    <button>Đăng ký</button>
    <p style="margin: 15px 0 0;color: #b3b3b3;font-size: 12px;"><a href="dangnhap.php">Bạn đã có tài khoản ư?</a></p>
  </form>
</div>
