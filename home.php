<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include ('menu_tren.php')?>
<div class="menu_trai">
    <div class="layout_logo1" style="margin-top:25px;">
        <img class="logo1" src="https://img.icons8.com/?size=256&id=gE0woMnZGtua&format=png">
        <div class="ten_logo1">Trang chủ</div>
    </div>
    <div class="layout_logo1">
        <img class="logo1" src="https://img.icons8.com/?size=256&id=61161&format=png">
        <!-- <img class="logo1" src="https://img.icons8.com/?size=256&id=60779&format=png"> -->
        <div class="ten_logo1">Bạn bè</div>
    </div>
    <div class="layout_logo1">
        <img class="logo1" src="https://img.icons8.com/?size=256&id=43571&format=png">
        <!-- <img class="logo1" src="https://img.icons8.com/?size=256&id=83134&format=png"> -->
        <div class="ten_logo1">Đã lưu</div>
    </div>
    <div class="layout_logo1">
        <img class="logo1" src="https://img.icons8.com/?size=256&id=88004&format=png">
        <div class="ten_logo1">Khám phá</div>
    </div>
    <div class="layout_logo1">
        <img class="logo1" src="https://img.icons8.com/?size=256&id=ZI2N2LpZcXuZ&format=png">
        <div class="ten_logo1">Reels</div>
    </div>
    <div class="layout_logo1">
        <img class="logo1" src="https://img.icons8.com/?size=256&id=14092&format=png">
        <div class="ten_logo1">Tạo bài đăng</div>
    </div>  
</div>


<div class="gop_2_menu">
  <div class="menu_giua">
    <div class="layout_menu_giua">
        <div class="next_left"></div>
        <div class="story1"></div>
        <div class="story2"></div>
        <div class="story3"></div>
        <div class="next_right"></div>
        <form action="home.php" enctype="multipart/form-data" method="post" class="form">
  <div class="vien" style="margin-left:-2%">
    <div class="avatar"></div>
    <button type="button" class="thanhdangbaiviet" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Đăng bài viết </button>
    <hr>
    <div class="menunho">
      <button class="button-menu"> 
        <i class="fa-regular fa-image" style="color: #2ecc71;" ></i> Hình ảnh
      </button>  
      <button class="button-menu" style="float:right; padding: 10px 90px"> 
        <i class="fa-solid fa-video" style="color: #ff0000" ></i>   Video
      </button>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel" style="margin-left:170px">Bài đăng mới</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <div style="padding:10px;height:60px">
                <div style="background-image:url('img/65a8d102a1c4b-Screenshot 2024-01-18 112403.png'); background-size:cover;width:35px; height:35px; border-radius: 50%;float:left"></div>
                <label style="float:left; margin:1% 2%">Tên</label>
              </div>
              <textarea type="text" style="border:none; height:5em;" class="form-control" name="content" id="content" placeholder="Đây là nội dung..." rows="10" cols="80">
              </textarea>
            </div>
            <div style="position:relative;border-radius:10px; border:#EEEEEE 2px solid; padding: 15px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
              <label for="message-text">Thêm ảnh</label>
              <td>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <input type="file" id="fileInput"name="image" class="hinhanh" style="display:none" multiple>
                <label for="fileInput"><i class="fa-regular fa-image" style="color: #2ecc71; cursor:pointer; position:absolute; right:25px;top:20px; scale:1.5" ></i></label>
              </td>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <td>
            <input type="submit" name="btn_submit" value="Đăng" 
            style="background-color: #0099FF; 
            color: white; padding: 10px 40px; 
            border:none;
            width:400px; 
            border-radius: 10px; 
            margin: 0 auto">
          </td>
        </div>
      </div>
    </div>
  </div>
</form>
<?php require 'dangbaiviet/posts_xuly.php';?>
<div id="fb-root"></div>
    </div>
  </div>

    <div class="menu_phai">
        <div class="de_xuat">Đề xuất kết bạn</div>
        <div class="layout_logo1">
            <div class="logo1" id="de_xuat1"></div>
            <div class="ten_logo1">Cẩm Tú</div>
            <button>Kết bạn</button>
        </div>
        <div class="layout_logo1">
            <div class="logo1" id="de_xuat2"></div>
            <div class="ten_logo1">Trà My</div>
            <button>Kết bạn</button>
        </div>
    </div>
</div>
</body>

<script>
  window.onload = function() {
    document.querySelector('textarea').value = '';
};
</script>