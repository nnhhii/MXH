<div class="col_menu_duoi" style="position:fixed">
    <a href="index.php"><div class="icon_menu" id="home" style="margin-left:7%"></div></a>
    <a href="index.php?pid=6"><div class="icon_menu" id="explore"></div></a>
    <a href="index.php?pid=7"><div class="icon_menu" id="reels"></div></a>
    <a href=""><div class="icon_menu" id="add"></div></a>
    <a href="index.php?pid=0"><div class="icon_menu" id="mess"></div></a>
    <div class="icon_menu" id="profile" style="background-image: url('img/<?php echo $row_id["avartar"]?>')" onclick="showSelect1()">
        <div id="mySelect1" style="width:200px;background:red;height:200px">    meoooo
            <a href="index.php?pid=1" style="border-radius: 10px 10px 0 0">Trang cá nhân</a>
            <a href="dangnhap/ctrl_logout.php"style="border-radius: 0 0 10px 10px">Đăng xuất</a>
        </div>
    </div>
</div>
<script>
function showSelect1() {
    document.getElementById("mySelect1").style.display = "block";
}
document.addEventListener('click', function(event) {
    var isClickInside = document.getElementById("profile").contains(event.target);
    if (!isClickInside) {
        document.getElementById("mySelect1").style.display = "none";
    }
});
</script>