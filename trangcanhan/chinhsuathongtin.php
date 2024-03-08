<?php

$user_id = $_SESSION['user'];
$conn = new mysqli("localhost", "root", "", "mxh");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE user_id = $user_id";
$result = $conn->query($sql);

$user = [];

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Không tìm thấy người dùng";
}

$conn->close();
?>

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
  height:600px;
  z-index: 1;
  background: #FFFFFF;
  max-width: 600px; 
  position: absolute;
  top: 55%;
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
  <h3 style="margin:-20px 0 20px 0">Cập nhật thông tin cá nhân</h3>
  <form action="trangcanhan/ctrl_info.php" method="post">
    <input type="text" placeholder="Tên" class="formInput" name="username" value="<?php echo $user['username']; ?>" required/>
    <input type="email" placeholder="Email" class="formInput" name="email" value="<?php echo $user['email']; ?>" required/>
    <select name="gender" class="formInput" required>
      <option value="">Chọn giới tính...</option>
      <option value="Nam" <?php echo ($user['gender'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
      <option value="Nữ" <?php echo ($user['gender'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
      <option value="Khác" <?php echo ($user['gender'] == 'Khác') ? 'selected' : ''; ?>>Khác</option>
    </select>
    <input type="date" placeholder="Ngày sinh" class="formInput" name="date_of_birth" value="<?php echo $user['date_of_birth']; ?>" required/>
    <input type="text" placeholder="Học tại" class="formInput" name="study_at" value="<?php echo $user['study_at']; ?>" required/>
    <input type="text" placeholder="Làm việc tại" class="formInput" name="working_at" value="<?php echo $user['working_at']; ?>" required/>
    <select name="relationship" class="formInput" required>
      <option value="">Chọn tình trạng quan hệ...</option>
      <option value="Độc thân" <?php echo ($user['relationship'] == 'Độc thân') ? 'selected' : ''; ?>>Độc thân</option>
      <option value="Hẹn hò" <?php echo ($user['relationship'] == 'Hẹn hò') ? 'selected' : ''; ?>>Hẹn hò</option>
      <option value="Kết hôn" <?php echo ($user['relationship'] == 'Kết hôn') ? 'selected' : ''; ?>>Kết hôn</option>
    </select>
    <button>Cập nhật thông tin</button>
  </form>
</div>