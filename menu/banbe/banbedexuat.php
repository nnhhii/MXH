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

<div class="gop_2_menu">
    <div class="menu_giua" style="width:77%">Gợi ý kết bạn
        <div style="margin-left:100px">
        <?php 
        $link= new mysqli('localhost','root','','MXH');     
        $dexuat_banbe="SELECT * FROM user 
        LEFT JOIN friendrequest ON (friendrequest.receiver_id = user.user_id AND friendrequest.sender_id = $user_id) 
        OR (friendrequest.receiver_id = $user_id AND friendrequest.sender_id = user.user_id)
        WHERE (receiver_id IS NULL OR sender_id IS NULL) and user.user_id != $user_id";
        $result_dexuat=$link -> query($dexuat_banbe);
        while($row_dx = $result_dexuat->fetch_assoc()){
            $user_dx=$row_dx["user_id"];
            $sql_ss = "SELECT * FROM user
            LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_dx AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_dx)
            WHERE status = 'bạn bè'";
            $result_ss = $link->query($sql_ss);
            $friends_dx=array();
            while ($row_ss = $result_ss->fetch_assoc()) {
                $friends_dx[] = $row_ss['user_id'];
            }
            $sql="SELECT * FROM user 
            LEFT JOIN friendrequest ON (friendrequest.sender_id = $user_id AND friendrequest.receiver_id = user.user_id) OR (friendrequest.sender_id = user.user_id AND friendrequest.receiver_id = $user_id)
            WHERE status = 'bạn bè'";
            $result=$link -> query($sql);
            $friends=array();
            while ($row = $result->fetch_assoc()) {
                $friends[] = $row['user_id'];
            }
            $mutual_friends = array_intersect($friends, $friends_dx);
            $num_mutual_friends = count($mutual_friends);
            if($num_mutual_friends >0){
        ?>
        <div class="khung_layout">
            <a href="index.php?pid=2&&m_id=<?php echo $row_dx["user_id"]?>" style="text-decoration:none">
            <div class="anh" style="background-image:url(img/<?php echo $row_dx["avartar"]?>)"></div>
            <div class="name"><?php echo $row_dx["username"]?></div>
            </a>
            <div class="ban_chung"> 
                <div class="count_ban_chung"> <?php echo $num_mutual_friends?> bạn chung</div>
            </div>
            <div class="add" onclick="sendFriendRequest(this,<?php echo $row_dx['user_id']?>)">Kết bạn</div>
            <div class="add delete" onclick="deleteFriendRequest(this,<?php echo $row_dx['user_id']?>)">Xóa</div>
        </div>
        <?php 
            }
        }
        ?>
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


<script>
function toggleFriendship(button,userId) {
    if (button.textContent === 'Kết bạn') {
        sendFriendRequest(button, userId);
    } else{
        cancelFriendRequest(button, userId);
    }
}

function sendFriendRequest(button, userId) {
    $.ajax({
        url: 'menu/banbe/ctrl_yeucau.php',
        type: 'POST',
        data: { user_id: userId },
        success: function (response) {
        button.textContent = 'Hủy kết bạn';
        }
    });
}

function cancelFriendRequest1(button, userId) {
    $.ajax({
        url: 'menu/banbe/ctrl_huy.php',
        type: 'POST',
        data: { user_id: userId },
        success: function (response) {
        button.textContent = 'Kết bạn';
        }
    });
    }

function deleteFriendRequest(div,userId) {
    var khungLayout = div.closest('.khung_layout');
    khungLayout.style.display = 'none';
}
</script>