<style>
.menu_phai ul {
  list-style-type: none;
}
.khung_layout{
  height:370px;
  width:200px;
  float: left;
  margin: 1%;
  border-radius: 10px;
  box-shadow:#EEE 5px 5px 5px;
  background: linear-gradient(to bottom,white, #EEE);
}
.anh{
  height:200px;
  width:200px;
  border-radius: 10px 10px 0 0; 
  background-position: center;
  background-size: cover;
}
.name{
  padding:7px 30px;
  font-weight: 500;
  color:black
}
.add{
  padding:10px;
  margin: 5px 25px;
  border-radius: 10px;
  background-color:#94C5E0;
  text-align: center;
  color: white;
  cursor: pointer;
}
.add:hover{
  background-color: #0095F6;
}
.ban_chung{
    padding:10px 30px;
}

.count_ban_chung{
    margin: -15px 0 0 0;
    color:black
}
</style>
<body>
<div class="gop_2_menu">



<div class="menu_giua" style="width:77%">Lời mời kết bạn
<div style="margin-left:100px">
  <?php 
  $link = new mysqli('localhost', 'root', '', 'MXH');
  $sql_loimoi="SELECT * FROM user 
  inner JOIN friendrequest ON (friendrequest.receiver_id = $user_id AND friendrequest.sender_id = user.user_id) where status='đã gửi'";

  $result_lm=$link -> query($sql_loimoi);
  if($result_lm -> num_rows > 0){
  while($row_lm = $result_lm->fetch_assoc()){
    $user_lm=$row_lm["user_id"];
    $sql="SELECT * FROM user 
  LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_lm AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_lm)
  WHERE status = 'bạn bè'";
  $result=$link -> query($sql);
  $friends_lm=array();
  while($row=$result->fetch_assoc()){
      $friends_lm[] = $row['user_id'];
    } 
  $sql_m="SELECT * FROM user 
                  LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_id)
                  WHERE status = 'bạn bè'";
                  $result_m=$link -> query($sql_m);
                  $friends=array();
                  while ($row_m = $result_m->fetch_assoc()) {
                      $friends[] = $row_m['user_id'];
                  }
                  $mutual_friends = array_intersect($friends, $friends_lm);
                  $num_mutual_friends = count($mutual_friends);
  ?>
  <div class="khung_layout">
    <a href="index.php?pid=2&&m_id=<?php echo $row_lm["user_id"]?>" style="text-decoration:none">
      <div class="anh" style="background-image:url(img/<?php echo $row_lm["avartar"]?>)"></div>
      <div class="name"><?php echo $row_lm["username"]?></div>
    </a>
    <div class="ban_chung"> 
       <div class="count_ban_chung"> <?php echo $num_mutual_friends;?> bạn chung</div>
            </div>
    <div class="add" onclick="acceptFriendRequest(this,<?php echo $row_lm['user_id']?>)">Chấp nhận</div>
    <div class="add delete" onclick="cancelFriendRequest(this,<?php echo $row_lm['user_id']?>)">Hủy</div>
  </div>
  <?php }} else echo "<br> Trống!"?>
</div>
</div>

<div class="menu_phai" style=" width:280px">
  <ul>
    <li><a href="index.php?pid=4">
        <div class="layout_logo1" style="margin-top:25px">
            <img id="loimoiketban" class="logo1" src="https://img.icons8.com/external-justicon-lineal-justicon/64/000000/external-add-friend-notifications-justicon-lineal-justicon.png" >
            <div id="ketban"class="ten_logo1">Lời mời kết bạn</div>
        </div>
    </a></li>
    <li><a href="index.php?pid=11">
        <div class="layout_logo1">
            <img id="tatcabanbe" class="logo1"  src="https://img.icons8.com/external-justicon-lineal-justicon/64/external-friend-notifications-justicon-lineal-justicon.png">
            <div id="bane" class="ten_logo1">Tất cả bạn bè</div>
        </div>
    </a></li>
    <li><a href="index.php?pid=12">
        <div class="layout_logo1">
            <img id="banbedexuat" class="logo1" src="https://img.icons8.com/external-justicon-lineal-justicon/64/external-add-friend-notifications-justicon-lineal-justicon.png"/>
            <div id="dexuat" class="ten_logo1">Bạn bè đề xuất</div>
        </div>
    </a></li>
  </ul>
</div>

  </div>
</div>
</body>

<script>
  function acceptFriendRequest(div, userId) {
    var khungLayout = div.closest('.khung_layout');
    var deleteButton = khungLayout.querySelector('.add.delete');
    $.ajax({
        url: 'menu/banbe/ctrl_chapnhan.php',
        type: 'POST',
        data: { user_id: userId },
        success: function (response) {
            div.textContent = 'Đã chấp nhận';
            deleteButton.style.display = 'none';
        }
    });
}



  function cancelFriendRequest(div,userId) {
    var khungLayout = div.closest('.khung_layout');
    $.ajax({
          url: 'menu/banbe/ctrl_huy.php',
          type: 'POST',
          data: { user_id1: userId },
          success: function (response) {
            khungLayout.style.display = 'none';
          }
        });
}


</script>