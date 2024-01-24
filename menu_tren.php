<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
<?php if(isset($_SESSION['user']))
{
    $user_id = $_SESSION['user'];
    $ketnoi= new mysqli('localhost','root','','MXH');
    $sql= "select * from user where user_id = '$user_id'";
    $result = $ketnoi -> query($sql);
    $row = $result -> fetch_assoc();
?>
<div class="menu_tren">
    <a href="index.php">
        <div class="logo"></div>
        <div class="ten_logo">Tên Logo</div>
    </a>
    <div class="ba_gach"></div>
    <div class="layout_tim_kiem">
        <input class="tim_kiem">
        <i class="fa-solid fa-magnifying-glass kinh_lup"></i>
    </div>
    <a href="index.php?pid=0"><div class="mess"><i class="fa-brands fa-facebook-messenger"></i></div></a>
    <div class= "thong_bao"><i class="fa-solid fa-bell"></i></div>
    <div class="trang_ca_nhan" style="background-image: url('img/<?php echo $row["avartar"]?>')" onclick="showSelect()">
        <div id="mySelect" style="display: none;">    
            <a href="index.php?pid=1" style="border-radius: 10px 10px 0 0">Trang cá nhân</a>
            <a href="dangnhap/ctrl_logout.php"style="border-radius: 0 0 10px 10px">Đăng xuất</a>
        </div>
    </div>
</div>
<?php 
}
?>
<script>
    function showSelect() {
    document.getElementById("mySelect").style.display = "block";
}
document.addEventListener('click', function(event) {
    var isClickInside = document.querySelector('.trang_ca_nhan').contains(event.target);
    if (!isClickInside) {
        document.getElementById("mySelect").style.display = "none";
    }
});
</script>
