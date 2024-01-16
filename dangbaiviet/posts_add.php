<html>
    <head>
    <script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>
<title>Thêm bài viết</title>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
  </head>
        <body>
<style>
.vien {
  border-radius: 10px;
  width: 700px;
  height: 100px;
  background-color: #EEEEEE;
  text-align: center;
  margin: 0 auto;
  box-shadow: 4px 4px 4px #888888;

}
.avatar{
  width:40px;
  height:40px;
  border-radius:20px;
background-color:black;
transform: translate(30%, 10%);
}
.thanhdangbaiviet {
  text-align: center;
  height: 35px;
  width: 600px;
  border-radius: 20px;
  display: block;
  margin: 0 auto;
  background-color: #FFFFFF;
  transform: translate(1%, -95%);
  color: #808080;
  border: 1px solid #FFFFFF;
  
}
.menunho {
  display: flex;
  align-items: center;
  justify-content: center; /* Căn giữa theo chiều ngang */
  width: 100%; /* Đảm bảo rằng menu nằm giữa màn hình */
  transform: translate(0, -140%);
  
}


.vien hr {
    border: 0;
    clear: both;
    display: block;
    width: 80%;
    background-color: #333; /* Change the color as desired */
    height: 1px;
    margin: 15px auto; /* Adjust the margin as needed */
  }

  /* Style for menu buttons */
 
  .button-menu {
  background-color: #fff; /* Chỉnh màu nền thành trắng */
  color: #808080; /* Chỉnh màu chữ thành xám */
  border: 1px solid #808080; /* Thêm viền xám nếu cần thiết */
  padding: 4px 100px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease, color 0.3s ease; /* Thêm chuyển động cho màu nền và màu chữ */
  letter-spacing: 1px;
  border: 1px solid #FFFFFF;
  
}

.button-menu:hover {
  background-color: #f2f2f2; /* Chỉnh màu nền khi hover */
  color: #333; /* Chỉnh màu chữ khi hover */
}
hr{
  width:700px;
  height:1px;

  transform: translate(0%, -4200%);
}
    
    </style>
    &nbsp;
    <form action="posts_add.php" enctype="multipart/form-data" method="post" class="form">
<div class="vien">
   <div class="avatar">
    <!-- Đặt ảnh đại diện của người dùng vào đây -->
    <!-- Ví dụ: -->
    <!-- <img src="path/to/avatar.jpg" alt="Avatar"> -->
  </div>
<button type="button" class="thanhdangbaiviet" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Đăng bài viết </button>
<hr>
<div class="menunho">
<button type="button" class="button-menu" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"> <i class="fa-regular fa-image" style="color: #2ecc71;" ></i> Hình ảnh
</button>  
      <button class="button-menu"> <i class="fa-solid fa-video" style="color: #ff0000;" ></i>   Video</button>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Content:</label>
            <input type="text" class="form-control" name="content" id="content" placeholder="Đây là nội dung..." class="noidung" rows="10" cols="80">
            
          </div>
          <div class="mb-3">
            
            <label for="message-text" class="col-form-label">Image: </label>
            
            <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000">
<input type="file" name="image" class="hinhanh" multiple><br/><br/></td>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      
      <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Save Data" 
      style="background-color: #0099FF; 
      color: white; padding: 10px 40px; 
      text-align: center; 
      text-decoration: none; 
      display: inline-block; 
      font-size: 12px; 
      width:400px; 
      border-radius: 10px; 
      margin: 0 auto;"></td>
      </div>
    </div>
  </div>
</div>
&nbsp;

<?php require 'posts_xuly.php';?>

<div id="fb-root"></div>
<body>

</html>
