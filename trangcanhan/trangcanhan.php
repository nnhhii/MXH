<head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<style>
  .hidden {
    display: none;
  }

  .bia {
    margin: 11vh 10% 0 10%;
    height: 34vw;
    width: 80%
  }

  .bia>.bia1 {
    float: right;
    width: 72%;
    background-size: cover;
    background-position: center;
    border-radius: 0 10px 10px 0;
    height: 32vw;
    position: relative;
  }

  .bia>.khungcanhan {
    box-shadow: -10px 0px 10px 1px #EEE;
    border-right:none;
    float: left;
    height: 32vw;
    width: 28%;
    border-radius: 10px 0 0 10px;
    position: relative;
  }

  .bia>.khungcanhan>.canhan1 {
    height: 15vh;
    position: relative;
    padding: 4vh 0 2vh 0
  }

  .bia>.khungcanhan>.canhan1>.anhdaidien {
    background-size: cover;
    background-position: center;
    width: 17vh;
    height: 17vh;
    border-radius: 50%;
    margin: auto;
    border: 3px solid white;
    position: relative;
  }

  .bia>.khungcanhan>.name {
    font-family: Helvetica, Arial, sans-serif;
    font-size: 1.8vw;
    text-align: center;
    margin-top: 7vh;
  }

  .bia>.khungcanhan>.name>.banbe, .banchung {
    font-size: 1vw;
    color: dimgray;
    text-decoration: none
  }

.banbe,.banchung:hover{
  text-decoration:underline;
}

  .bia>.khungcanhan>.name>.tieusu {
    font-size: 1.2vw
  }

  .bia>.khungcanhan>.congcu {
    margin:0 auto;
    width:fit-content;
    white-space: nowrap;
    display: flex
  }

  .congcu1 {
    margin: 1vw;
    font-size: 1.1vw;
    padding: 1vw 1.5vw;
    border: none;
    border-radius: 5px;
    background-color: #90C9D5;
  }

  .congcu1:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }

  .ccbia,
  .ccbia1 {
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: #EEE;
  }

  .ccbia1 {
    right: 15%
  }

  .anhdaidien>img {
    position: absolute;
    right: 5px;
    bottom: 0;
    width: 3.5vh;
    cursor: pointer;
  }

  .bia>.khungcanhan>.congcu>div>form>input[type=text] {
    width: 12vw;
    height: 2vw;
    padding: 12px 20px;
    margin: 0 0 1vw 0;
    border: 1px solid #ccc;
    outline: none
  }
  @media(max-width:980px) {
    .bia>.khungcanhan {
      width: 40%;
      left: 28vw;
      height: 40vh;
      float: left;
      box-shadow: none;
      margin-bottom:20vh
    }

    .bia>.khungcanhan>.canhan1 {
      padding: 2vw;
      height: 5vw;
    }

    .bia>.khungcanhan>.canhan1>.anhdaidien {
      width: 15vh;
      height: 15vh;
      top: -10vh
    }

    .bia>.khungcanhan>.name {
      font-size: 3.5vh;
      margin-top: 3vh
    }

    .bia>.khungcanhan>.name>.banbe {
      font-size: 2vh;
    }

    .bia>.khungcanhan>.name>.tieusu {
      font-size: 2vh
    }

    .bia {
      width: 100%;
      margin: 9vh 0 0 0;
    }

    .bia>.bia1 {
      width: 100%;
      height: 40vh;
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .congcu1 {
      margin-left: 1.4vw;
      font-size: 2.5vh;
      padding: 1.8vw 4vw;
    }

    .ccbia1,
    .ccbia {
      right: 13.5vh;
      font-size: 2vh;
      padding: 2vh 3vh
    }

    .ccbia {
      right: 0
    }

  }

  @media(max-width:630px) {
    .bia>.khungcanhan {
      width: 70%;
      left: 15vw
    }

    .bia>.khungcanhan>.congcu {
      padding: 2vw;
      white-space: nowrap;
    }

    .congcu1 {
      margin-left: 6vw;
      font-size: 2.5vh;
      padding: 2vw 5vw;
    }

    .ccbia1,
    .ccbia {
      right: 13.5vh;
      font-size: 2vh;
      padding: 2vh 3vh
    }

    .ccbia {
      right: 0
    }
  }
</style>

<div class="bia">
  <div class="bia1" style="background-image: url('img/<?php echo $row_id["cover_picture"] ?>')">
    <button class="ccbia congcu1" onclick="showFilePicker()">Chỉnh sửa</button>
    <form action="trangcanhan/suabia.php" method="post" enctype="multipart/form-data">
      <input type="file" id="filePicker" accept="image/*" name="anhbia" style="display:none;" onchange="filePicked()" />
      <input type="submit" style="display:none" id="saveButton">
    </form>
    <script>
      function showFilePicker() {
        document.getElementById('filePicker').click();
      }
      function filePicked() {
        var input = document.getElementById('filePicker');
        if (input.files && input.files[0]) {
          console.log('Tệp đã chọn:', input.files[0].name);
        }
        document.getElementById('saveButton').click();
      }
    </script>
    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh bìa?')" href="trangcanhan/xoabia.php">
      <button class="ccbia1 congcu1">Xóa</button>
    </a>
  </div>
  <div class="khungcanhan" style="position:relative"><div style="cursor:pointer;padding:20px"onclick="window.location.href = 'index.php?pid=14'"><i class="fa-regular fa-pen-to-square" style="scale:1.5;right:10px;top:10px;position:absolute"></i></div>
    <div class="canhan1">
      <div class="anhdaidien" style="background-image: url('img/<?php echo $row_id["avartar"] ?>')">
        <img src="https://cdn-icons-png.flaticon.com/512/3624/3624186.png" onclick="avartar()"></i>
      </div>
      <form action="trangcanhan/avartar.php" method="post" enctype="multipart/form-data" id="uploadForm">
        <input type="file" id="avatarPicker" accept="image/*" name="anhdaidien" style="display:none;" onchange="avatarPicked()" />
        <input type="submit" style="display:none;" id="avatarSaveButton">
      </form>
      <script>
        function avartar() {
          document.getElementById('avatarPicker').click();
        }
        function avatarPicked() {
          var input = document.getElementById('avatarPicker');
          if (input.files && input.files[0]) {
            console.log('Tệp đã chọn:', input.files[0].name);
            document.getElementById('avatarSaveButton').click();
          }
        }
      </script>
    </div>
    <div class="name">
      <div><strong><?php echo $row_id["username"] ?></strong></div>
      <div class="banbe"><br>
        <!-- bạn bè -->
        <?php 
        $sql_ss = "SELECT * FROM user
        INNER JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_id)
        WHERE status = 'bạn bè'";
        $result_ss = $ketnoi->query($sql_ss);
        $friends_ss=array();
        while ($row_ss = $result_ss->fetch_assoc()) {
          $friends_ss[] = $row_ss['user_id'];
        }
        $count_friends = count($friends_ss)
        ?>
        <a class="banchung"data-toggle="modal" href='#modal-id-banbe'><?php echo $count_friends?> bạn bè</a>
        <div class="modal fade" id="modal-id-banbe">
          <div class="modal-dialog">
            <div class="modal-content" style="width:430px;height:420px; border-radius:15px;margin:20vh auto">
              <div class="modal-header" style="border-bottom: 1px solid #DBDBDB;height:50px">
                <h5 class="modal-title" style="position:absolute;left:38%;text-align:center;color:black">Tất cả bạn bè</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="border:none;padding:30px;background:none;position:absolute;right:0">&times;</button>
              </div>
              <div class="modal-body" style="padding:0;overflow:auto">
                <!-- Search -->
                <form enctype="multipart/form-data" method="post">
                  <i style="top:12px;position: absolute;left:13px" class="fa-solid fa-magnifying-glass"></i>
                  <input class="timkiem3" style="width:100%;height: 40px;outline: none;padding-left: 45px;border: none;border-bottom: 1px solid #DBDBDB;">
                </form>
                <div class="hienthibanbe_tcn"></div>
              </div>
            </div>
          </div>
        </div><br>
        
      </div>
      <div class="tieusu"><br>
        <?php echo $row_id["bio"] ?>
      </div>
    </div>
    <div class="congcu">
      <button class="congcu1" id="editButton" onclick="FormTIEUSU()">Chỉnh sửa</button>
      <div id="inputForm" class="hidden">
        <form action="trangcanhan/suatieusu.php" method="post">
          <input type="text" value="<?php echo $row_id['bio'] ?>" name="tieusu" placeholder="Nhập tiểu sử của bạn"><br>
          <input type="submit" value="Lưu" style="border:none;padding:2px 10px">
          <button style="border:none;padding:2px 10px" type="button" onclick="cancelEdit()">Hủy</button>
        </form>
      </div>

      <script>
        function FormTIEUSU() {
          var form = document.getElementById("inputForm");
          var button = document.getElementById("editButton");
          form.style.display = "block";
          button.style.display = "none";
        }
        function cancelEdit() {
          var form = document.getElementById("inputForm");
          var button = document.getElementById("editButton");
          form.style.display = "none";
          button.style.display = "block";
        }
      </script>

      <a onclick="return confirm('Bạn có chắc chắn muốn xóa tiểu sử?')" href="trangcanhan/xoatieusu.php">
        <button class="congcu1">Xóa</button>
      </a>
    </div>
  </div>
</div>
<div style="border-bottom:1px solid lightgray; margin:5% 10vw 0 10vw; width:80%;float:center"></div>
<?php 
  require 'dangbaiviet/posts_connect.php';
$sql_buttonOpenModal = "SELECT * FROM posts 
        INNER JOIN user ON posts.post_by = user.user_id
        WHERE  posts.post_by = $user_id
        ORDER BY post_id DESC";

  $result_buttonOpenModal = $ketnoi->query($sql_buttonOpenModal);
include 'dangbaiviet/posts_buttonOpenModal.php'?>


<script>

$(document).ready(function() {
$('.timkiem3').on('input', function () {
    var timkiem = $(this).val();

    if (timkiem === '') {
        loadAllFriends();
        return;
    }
    $.ajax({
        url: 'trangcanhan/timkiem_tcn.php',
        method: 'POST',
        data: {
            timkiem: timkiem
        },
        success: function (response) {
            $('.hienthibanbe_tcn').html(response); 
        }
    });
});
loadAllFriends();
// Hàm tải tất cả bạn bè
function loadAllFriends() {
    $.ajax({
        url: 'trangcanhan/tatcabanbe_tcn.php',
        method: 'POST',
        data: {
        },
        success: function (response) {
            $('.hienthibanbe_tcn').html(response); 
        }
    });
}
});

</script>