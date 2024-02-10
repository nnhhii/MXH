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
<style>
.gop_2_menu > .layout_ketqua{
  padding:40px
}
.gop_2_menu > .layout_ketqua > .mini_layout{
  padding:20px 50px
}
.gop_2_menu > .layout_ketqua > .mini_layout > a > .ketqua{
  width:40%;
  float:left;
  height:70px;
  margin:5px;
  padding:10px;
  color: black;
  font-weight: 500;
}
.ketqua:hover{
  background-color: #EEEE;
}
.ketqua > .ava_ketqua{
  background-position: center;
  background-size: cover;
  width:50px;
  height:50px; 
  float:left;
  border-radius:50%;
  margin:2px
}
.ketqua > .ten_ketqua{
  height:40px;
  float:left;
  margin:5px 10px;
}
.ketqua > .ten_ketqua > .email_ketqua{
  font-size: 13px;
  font-weight: 350;
  color: gray;
}
</style>
<?php 
if (isset ($_POST["timkiem"])){
  $ketnoi=new mysqli("localhost","root","","mxh");
  $timkiem=$_POST["timkiem"];
  $sql="SELECT * FROM user WHERE username LIKE '%$timkiem%' ";
  $result=$ketnoi->query($sql);
  
  if (mysqli_num_rows($result) > 0) {
?>
<body>
<div class="gop_2_menu">
  <div class="layout_ketqua">
    <div class="mini_layout">
      <?php while($row=$result->fetch_assoc()){?>
        <a href="index.php?pid=2&&m_id=<?php echo $row["user_id"]?>">
          <div class="ketqua">
            <div class="ava_ketqua" style="background-image:url('img/<?php echo $row["avartar"] ?>');"></div>
            <div class="ten_ketqua"><?php echo $row["username"]?>
              <div class="email_ketqua"><?php echo $row["email"]?></div>
            </div>
          </div>
        </a>
      <?php }?>
    </div>
  </div>
</div>
</body>

<?php }}?>