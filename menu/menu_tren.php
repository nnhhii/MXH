<div class="menu_tren">
    <a href="index.php">
        <div class="logo"></div>
        <div class="ten_logo font-effect-shadow-multiple">Firefly</div>
    </a>
    <div class="ba_gach"></div>
    <div class="layout_tim_kiem">
        <form id="timkiem_form" action="index.php?pid=3" enctype="multipart/form-data"method="post">
            <input class="tim_kiem" name="timkiem">
            <i class="fa-solid fa-magnifying-glass kinh_lup"></i>
        </form>
    </div>
    <a href="index.php?pid=0"><div class="mess"><i class="fa-brands fa-facebook-messenger"></i></div></a>
    <div class= "thong_bao" onclick="showThongBao()">
        <div id="myThongBao" style="display: none"><h5 style="margin-left:20px">Thông báo</h5>
            <?php
            $thongBao = "SELECT * FROM user 
            inner JOIN notification ON notification.noti_by = user.user_id and notification.noti_by != $user_id and notification.noti_to = $user_id 
            left JOIN posts ON posts.post_by = $user_id and notification.post_id = posts.post_id
            ORDER BY notification_id DESC";
            $result_tb = $ketnoi->query($thongBao);  
            if ($result_tb !== null && $result_tb->num_rows > 0) {
                while ($row_tb = $result_tb->fetch_assoc()) 
                    {
                        // Tách thành một mảng
                        $images = explode(",", $row_tb['image']);
                        $num_images = count($images);
                        // Lấy giá trị đầu tiên trong mảng
                        $first_image = reset($images);

                        $current_time = time();
                        $noti_time = strtotime($row_tb["noti_time"]);
                        $time_diff = $current_time - $noti_time;
                        if ($time_diff < 60) {
                            $time_description = "vừa xong";
                        } elseif ($time_diff < 3600) {
                            $time_description = floor($time_diff / 60) . " phút trước";
                        } elseif ($time_diff < 86400) {
                            $time_description = floor($time_diff / 3600) . " giờ trước";
                        } else {
                            $time_description = floor($time_diff / 86400) . " ngày trước";
                        }
            if($row_tb["post_id"] !== null){
            ?>
            <a href="index.php?pid=10&&post_id=<?php echo $row_tb['post_id']?>" style="position:relative">
                <div class="ava_thong_bao"style="background-image: url('img/<?php echo $row_tb["avartar"]?>')"></div>
                <div style="font-weight:500;float:left"><?php echo $row_tb["username"]?></div> 
                <div style="float:left;margin:2px 7px;font-size:13px;color:gray"><?php echo $time_description?></div><br>
                <div style="font-size:15px"><?php echo $row_tb["noti_content"]?></div>
                <div style="background-image: url('img/<?php echo $first_image?>');background-size:cover;background-position:center;width:40px;height:50px;float:left;position:absolute;top:10px;right:10px"></div>
            </a>
            <?php } else{?>
            <a href="index.php?pid=4" style="position:relative">
                <div class="ava_thong_bao"style="background-image: url('img/<?php echo $row_tb["avartar"]?>')"></div>
                <div style="font-weight:500;float:left"><?php echo $row_tb["username"]?></div>
                <div style="float:left;margin:2px 7px;font-size:13px;color:gray"><?php echo $time_description?></div><br>
                <div style="font-size:15px"><?php echo $row_tb["noti_content"]?></div>
            </a>
            <?php }}
        }else echo "ko có thông báo"?>
        </div>
    </div>
    <div class="trang_ca_nhan" style="background-image: url('img/<?php echo $row_id["avartar"]?>')" onclick="showSelect()">
        <div id="mySelect" class="ben_phai_trong" style="display: none;">  
            <a style="border-radius: 10px 10px 0 0;border-bottom:1px solid #EEE">
                <div><?php echo $row_id["username"]?></div>
                <div style="font-size:12px;color:gray"><?php echo $row_id["email"]?></div>
            </a>  
            <a href="index.php?pid=1&&user_id=<?php echo $user_id?>"><i class="fa-solid fa-user"></i> Trang cá nhân</a>
            <a href="index.php?pid=13"><i class="fa-solid fa-user-pen"></i> Đổi mật khẩu</a>
            <a href="dangnhap/ctrl_logout.php"style="border-radius: 0 0 10px 10px"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
            
        </div>
    </div>
</div>

<script>
$('input[name="timkiem"]').keydown(function(e) {
    if (e.keyCode == 13 && !e.shiftKey && $(this).val().trim() !== "") {
        e.preventDefault();
        $("#timkiem_form").submit();
    }
});


function showSelect() {
    document.getElementById("mySelect").style.display = "block";
}
function showThongBao() {
    document.getElementById("myThongBao").style.display = "block";
}
document.addEventListener('click', function(event) {
    var insideThongBao = document.querySelector('.thong_bao').contains(event.target);
    var insideTCN = document.querySelector('.trang_ca_nhan').contains(event.target);
    if (!insideThongBao) {
        document.getElementById("myThongBao").style.display = "none";
    }
    if (!insideTCN) {
        document.getElementById("mySelect").style.display = "none";
    }
});
</script>
