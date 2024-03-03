<style>
.menu_phai ul {
  list-style-type: none;
}
.gop_2_menu > .layout_ketqua{
  padding:40px
}
.gop_2_menu > .layout_ketqua > .mini_layout{
  padding:20px 50px
}
.gop_2_menu > .layout_ketqua > .mini_layout > a > .ketqua{
  width:400px;
  float:left;
  height:125px;
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
  width:100px;
  height:100px; 
  float:left;
  border-radius:10px;
  margin:2px
}
.ketqua > .ten_ketqua{
  height:40px;
  float:left;
  margin:20px 10px;
}
.ketqua > .ten_ketqua > .email_ketqua{
  font-size: 14px;
  font-weight: 350;
  color: gray;
}
</style>
<?php 
$link = new mysqli('localhost', 'root', '', 'MXH');
$sql="SELECT * FROM user 
LEFT JOIN friend ON (friend.user_id1 = $user_id AND friend.user_id2 = user.user_id) OR (friend.user_id1 = user.user_id AND friend.user_id2 = $user_id)
WHERE friend.user_id1 IS NOT NULL OR friend.user_id2 IS NOT NULL";
$result=$link -> query($sql);
if($result -> num_rows > 0){
?>

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
      <?php }}else echo"ko có bạn bè";?>
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
