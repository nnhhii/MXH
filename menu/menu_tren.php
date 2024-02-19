<div class="menu_tren">
    <a href="index.php">
        <div class="logo"></div>
        <div class="ten_logo">Tên Logo</div>
    </a>
    <div class="ba_gach"></div>
    <div class="layout_tim_kiem">
        <form id="timkiem_form" action="index.php?pid=3" enctype="multipart/form-data"method="post">
            <input class="tim_kiem" name="timkiem">
            <i class="fa-solid fa-magnifying-glass kinh_lup"></i>
        </form>
    </div>
    <a href="index.php?pid=0"><div class="mess"><i class="fa-brands fa-facebook-messenger"></i></div></a>
    <div class= "thong_bao"><i class="fa-solid fa-bell"></i></div>
    <div class="trang_ca_nhan" style="background-image: url('img/<?php echo $row_id["avartar"]?>')" onclick="showSelect()">
        <div id="mySelect" style="display: none;">    
            <a href="index.php?pid=1" style="border-radius: 10px 10px 0 0">Trang cá nhân</a>
            <a href="dangnhap/ctrl_logout.php"style="border-radius: 0 0 10px 10px">Đăng xuất</a>
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
document.addEventListener('click', function(event) {
    var isClickInside = document.querySelector('.trang_ca_nhan').contains(event.target);
    if (!isClickInside) {
        document.getElementById("mySelect").style.display = "none";
    }
});
</script>
