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
  width: 800px;
  height:450px;
  z-index: 1;
  background: #FFFFFF;
  max-width: 600px; 
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-25%, -50%);
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

<div class="formngoai">
  <form action="dangnhap/ctrl_pass.php" method="post">
    <input type="password" placeholder="Mật khẩu cũ" class="formInput" name="old_pass"/>
    <input type="password" placeholder="Mật khẩu mới" class="formInput" name="new_pass"/>
    <input type="password" placeholder="Xác nhận mật khẩu mới" class="formInput" name="confirm_new_pass"/>
    <button>Cập nhật mật khẩu</button>
  </form>
</div>

