<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/like.css">
  <link rel="stylesheet" href="css/main.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="like.js"></script>
  <title>fake</title>
  <?php include('menu_tren.php') ?>
</head>
<?php
$link = new mysqli("localhost", "root", "", "mxh");
$sql = "SELECT username, bio, cover_picture,avartar FROM USER WHERE user_id = 1";
$result = $link->query($sql);
$row = $result->fetch_assoc();
?>
<style>
  body {
    margin: 0;
    overflow-y: scroll;
    box-sizing: border-box;
  }

  .hidden {
    display: none;
  }

  .bia {
    margin: 5.5% 5% 0 5%;
    height: 65%;
    width: 90%;
    border-radius: 5px;
    position: relative;
  }

  .bia1 {
    float: right;
    width: 78%;
  }

  .khungcanhan {
    background-color: white;
    float: left;
    height: 100%;
    width: 22%;
    border-radius: 5px;
    position: absolute;
    background: linear-gradient(to bottom, gray, white);

  }

  .canhan1 {
    height: 40%;
    position: relative;
    border-radius: 5px 5px 0 0;
  }

  .name {
    height: 45%;
    text-align: center;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 2vw;
  }

  .banbe {
    height: 25%;
    top: 0%;
    font-size: 1vw;
    color: dimgray;
    margin-top: -5%;
  }

  .anhdaidien {
    height: 60%;
    width: 40%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    border: 3px solid white;
  }

  .tieusu {
    height: 50%;
    font-size: 1.3vw
  }

  .congcu {
    display: flex;
    justify-content: space-around;
  }

  .congcu1 {
    font-size: 1.5vw;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #cecdca;
    color: #343a40;
    cursor: pointer;
  }

  .congcu1:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }

  .story {
    height: 8.8vw;
    margin-top: 1%;
    background-color: #cecdca;
  }

  .circle {
    height: 7vw;
    width: 7vw;
    background-color: none;
    border-radius: 50%;
    display: inline-block;
    margin-top: 0.8%;
    margin-left: 6%;
    border: 2px solid white;
    box-shadow: 0 0 0 0.7px dimgray;
  }

  .suatieusu {
    width: 50vw;
    height: 30vw;
    margin-top: 10vw;
    margin-left: 30vw;
    padding: 20px;
    background-color: gray;
    text-align: center;
  }



  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  input[type=text]
  {
    width: 90%;
    height: 90%;
    padding: 12px 20px;
    margin: -35px 0 15px 0;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border: none;
    outline:none
  }
  input[type=submit], button{
    border:none;
    padding:5px 10px
  }
  .bia2 {
    position: relative;
  }

  .ccbia {
    position: absolute;
    bottom: 3%;
    right: 1%;
    padding: 10px;
    height: 10%;
    width: 10%;
    background-color: darkgray;
    font-size: 1.2vw;
    border-radius: 5px;
    cursor: pointer;
    border: none;
  }

  .ccbia1 {
    position: absolute;
    bottom: 3%;
    right: 10%;
    padding: 10px;
    height: 10%;
    width: 5%;
    background-color: darkgray;
    font-size: 1.2vw;
    border-radius: 5px;
    border: none;
    cursor: pointer;
  }

  .ccbia:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }

  .ccbia1:hover {
    background-color: #343a40;
    color: #f8f9fa;
  }

  form {
    margin-top: -5%;
    height: 3.5vw;
    margin-left: 5%;
  }

  .icon {
    font-size: 1.5vw;
    transform: translate(310%, -70%);
    color: white;
    cursor: pointer;
  }

  @media (max-width: 660px) {

    .bia {
      height: 38%;
      width: 100%;
      margin: 0;
      position: relative;
    }

    .bia1 {
      width: 100%;
      margin-top: 8%;
      border-radius: 0;
    }

    .anhdaidien {
      position: static;
      height: 100%;
      width: 100%;
      position: absolute;
      background-color: none;
    }

    .khungcanhan {
      position: sticky;
      top: 540px;
      left: 32%;
      background: none;
      transform: translate(25%, -80%);
    }

    .canhan1 {
      border-radius: 50%;
    }

    .congcu {
      display: flex;
      justify-content: space-around;
    }

    .congcu1 {
      font-size: 3vw;
      padding: 1vw 17vw;
      border-radius: 5px;
      background-color: #cecdca;
      cursor: pointer;
      height: 8vw;
      margin-left: 5vw;
      margin-top: 8vw;
      white-space: nowrap;
    }

    .congcu1:hover {
      background-color: #343a40;
      color: #f8f9fa;
    }

    .name {
      height: 45%;
      text-align: center;
      font-family: Helvetica, Arial, sans-serif;
      font-size: 5.2vw;
      margin-top: 10%;
    }

    .tieusu {
      height: 50%;
      font-size: 3.5vw;
      width: 200%;
      margin-left: -50%;
    }

    .banbe {
      height: 25%;
      top: 0%;
      font-size: 3vw;
      color: dimgray;
      margin-top: -10%;
    }

    .story {
      height: 15vw;
      margin-top: 60%;
      background-color: #cecdca;
    }

    .circle {
      height: 12vw;
      width: 12vw;
      background-color: none;
      border-radius: 50%;
      display: inline-block;
      margin-top: 1.9%;
      margin-left: 0.4vw;
      border: 1.5px solid white;
      box-shadow: 0 0 0 0.7px dimgray;

    }

    .icon {
      font-size: 4.5vw;
      transform: translate(250%, -160%);
      color: white;
      cursor: pointer;

    }

    form {
      width: 45vw;
      margin-top: 13%;
      height: 9vw;
      margin-left: 10%;
    }

    .ccbia {
      position: absolute;
      bottom: -15%;
      height: 10%;
      width: 12%;
      background-color: darkgray;
      font-size: 1.7vw;
      cursor: pointer;
      border: none;
    }

    .ccbia1 {
      position: absolute;
      bottom: -15%;
      right: 12%;
      height: 10%;
      width: 7%;
      background-color: darkgray;
      font-size: 1.7px;
      text-align: center;
      border: none;
      cursor: pointer;
    }
  }

</style>

<body>

  <div class="bia">
    <div class="bia1">
      <div class="bia2">
        <img src="img/<?php echo $row["cover_picture"]; ?>" style="width:100%; height:100%;border-radius:5px">
      </div>

      <button class="ccbia" onclick="showFilePicker()">Chỉnh sửa</button>
      <form action="trangcanhan/suabia.php" method="post" enctype="multipart/form-data">
        <input type="file" id="filePicker" name="anhbia" style="display:none;" onchange="filePicked()" />
        <input type="submit" value="Lưu" style="visibility:hidden;" id="saveButton">
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

      <a onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh bìa?')" href="xoabia.php">
        <button class="ccbia1">Xóa</button>
      </a>

    </div>
    <div class="khungcanhan">
      <div class="canhan1">
        <div class="anhdaidien">
          <img src="img/<?php echo $row["avartar"]; ?>" style="width:100%; height:100%; border-radius: 50%;">

          <form action="trangcanhan/avartar.php" method="post" enctype="multipart/form-data" id="uploadForm">
            <i class="icon fa fa-camera" onclick="avartar()"></i>
            <input type="file" id="avatarPicker" name="anhdaidien" style="display:none;" onchange="avatarPicked()" />
            <input type="submit" value="Lưu" style="visibility:hidden;" id="avatarSaveButton">
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
      </div>
      <div class="name">
        <div><strong>
            <?php echo $row["username"] ?>
          </strong></div>
        <div class="banbe"><br>2939 bạn bè </div>
        <div class="tieusu"><br>
          <?php echo $row["bio"] ?>
        </div>
      </div>
      <div class="congcu">
        <button class="congcu1" id="editButton" onclick="FormTIEUSU()">Chỉnh sửa</button>

        <div id="inputForm" class="hidden">
          <form action="trangcanhan/suatieusu.php" method="post">
            <input type="text" value="<?php echo $row['bio'] ?>" name="tieusu" placeholder="Nhập tiểu sử của bạn">
            <input type="submit" value="Lưu">
            <button style="border:none;" type="button" onclick="cancelEdit()">Hủy</button>
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
  <div class="story"></div>
  <div class="post_TCN" style="margin:0 13%">
    <div class="central-meta" style="padding:25px">
      <ul class="photos">
        <!-- P1 -->
        <li>
          <div class="container" style="padding: 3px;">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_1"
              style="padding: 0px; border: 0px; width: 45vh;height: 45vh;" >
              <div style="background-image:url('img/Screenshot 2024-01-18 112334 copy.png');background-size:cover; background-position:center;width: 45vh;height: 45vh;">
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal_1">
              <div class="modal-dialog modal-xl" style="margin-left:17%">
                <div class="modal-content" style="width: 90%">
                  <!-- Modal body -->
                  <div class="modal-body" style="padding: 0px">
                    <?php
                    $i = 1;
                    include 'trangcanhan/picture.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        
        <!-- p2 -->
        <li>
          <div class="container" style="padding: 3px;">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_2"
              style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">
              <img src="img/Screenshot 2024-01-18 112403.png" alt="" style="width: 45vh;height: 45vh;">
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal_2">
              <div class="modal-dialog modal-xl" style="margin-left: 150px;">
                <div class="modal-content" style="width: 90%; height: 90%;">
                  <!-- Modal body -->
                  <div class="modal-body" style="padding: 0px;">
                    <?php
                    $i = 2;
                    include 'trangcanhan/picture.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <!-- p3 -->
        <li>
          <div class="container" style="padding: 3px;">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_3"
              style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">
              <img src="img/Screenshot 2024-01-18 112439.png" alt="" style="width: 45vh;height: 45vh;">
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal_3">
              <div class="modal-dialog modal-xl" style="margin-left: 150px;">
                <div class="modal-content" style="width: 90%; height: 90%;">
                  <!-- Modal body -->
                  <div class="modal-body" style="padding: 0px;">
                    <?php
                    $i = 3;
                    include 'trangcanhan/picture.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <!-- p4 -->
        <li>
          <div class="container" style="padding: 3px;">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_4"
              style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">
              <img src="img/Screenshot 2024-01-18 112805.png" alt="" style="width: 45vh;height: 45vh;">
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal_4">
              <div class="modal-dialog modal-xl" style="margin-left: 150px;">
                <div class="modal-content" style="width: 90%; height: 80%;">
                  <!-- Modal body -->
                  <div class="modal-body" style="padding: 0px;">
                    <?php
                    $i = 4;
                    include 'trangcanhan/picture.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="container" style="padding: 3px;">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_4"
              style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">
              <img src="img/Screenshot 2024-01-18 142143.png" alt="" style="width: 45vh;height: 45vh;">
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal_4">
              <div class="modal-dialog modal-xl" style="margin-left: 150px;">
                <div class="modal-content" style="width: 90%; height: 80%;">
                  <!-- Modal body -->
                  <div class="modal-body" style="padding: 0px;">
                    <?php
                    $i = 4;
                    include 'trangcanhan/picture.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="container" style="padding: 3px;">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_4"
              style="padding: 0px; border: 0px; width: 45vh;height: 45vh;">
              <img src="img/Screenshot 2024-01-18 142216.png" alt="" style="width: 45vh;height: 45vh;">
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal_4">
              <div class="modal-dialog modal-xl" style="margin-left: 150px;">
                <div class="modal-content" style="width: 90%; height: 80%;">
                  <!-- Modal body -->
                  <div class="modal-body" style="padding: 0px;">
                    <?php
                    $i = 4;
                    include 'trangcanhan/picture.php'; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div><!-- photos -->
  </div><!-- centerl meta -->
  