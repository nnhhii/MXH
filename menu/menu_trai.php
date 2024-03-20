<style>
    .bold-text {
        font-weight: 500;
    }
</style>
<div class="menu_trai">
    <a href="index.php" onclick="changeImage(
        'https://img.icons8.com/?size=512&id=gE0woMnZGtua&format=png', 'trangChu', 'tenTrangChu');
        resetImage('trangBanBe', originalBanBe, 'tenBanBe');
        resetImage('trangDaLuu', originalDaLuu, 'tenDaLuu');
        resetImage('trangKhamPha', originalKhamPha, 'tenKhamPha');">
        <div class="layout_logo1" style="margin-top:25px">
            <img id="trangChu" class="logo1" src="https://img.icons8.com/?size=512&id=Gc9qmZNN9yFN&format=png">
            <div id="tenTrangChu"class="ten_logo1">Trang chủ</div>
        </div>
    </a>
    <a href="index.php?pid=4" onclick="changeImage(
        'https://img.icons8.com/?size=256&id=60779&format=png', 'trangBanBe', 'tenBanBe'); 
        resetImage('trangChu', originalTrangChu, 'tenTrangChu');
        resetImage('trangDaLuu', originalDaLuu, 'tenDaLuu');
        resetImage('trangKhamPha', originalKhamPha, 'tenKhamPha');">
        <div class="layout_logo1">
            <img id="trangBanBe" class="logo1" src="https://img.icons8.com/?size=256&id=61161&format=png">
            <div id="tenBanBe" class="ten_logo1">Bạn bè</div>
        </div>
    </a>
    <a href="index.php?pid=5" onclick="changeImage(
        'https://img.icons8.com/?size=256&id=83134&format=png', 'trangDaLuu', 'tenDaLuu'); 
        resetImage('trangBanBe', originalBanBe, 'tenBanBe');
        resetImage('trangChu', originalTrangChu, 'tenTrangChu');
        resetImage('trangKhamPha', originalKhamPha, 'tenKhamPha');">
        <div class="layout_logo1">
            <img id="trangDaLuu" class="logo1" src="https://img.icons8.com/?size=256&id=43571&format=png">
            <div id="tenDaLuu" class="ten_logo1">Đã lưu</div>
        </div>
    </a>
    <a href="index.php?pid=6 " onclick="changeImage(
        'https://img.icons8.com/?size=256&id=9733&format=png', 'trangKhamPha', 'tenKhamPha'); 
        resetImage('trangBanBe', originalBanBe, 'tenBanBe');
        resetImage('trangChu', originalTrangChu, 'tenTrangChu');
        resetImage('trangDaLuu', originalDaLuu, 'tenDaLuu');">
        <div class="layout_logo1">
            <img id="trangKhamPha"class="logo1" src="https://img.icons8.com/?size=256&id=88004&format=png">
            <div id="tenKhamPha"class="ten_logo1">Khám phá</div>
        </div>
    </a>
    <a data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" style="cursor: pointer;">
        <div class="layout_logo1">
            <img id="trangTaoBaiDang"class="logo1" src="https://img.icons8.com/?size=256&id=14092&format=png">
            <div id="tenTaoBaiDang"class="ten_logo1">Tạo bài đăng</div>
        </div>
    </a>
    
</div>
<?php require_once 'menu/dangbaiviet.php' ?>








<script>
var originalTrangChu = 'https://img.icons8.com/?size=512&id=Gc9qmZNN9yFN&format=png';
var originalBanBe = 'https://img.icons8.com/?size=256&id=61161&format=png';
var originalDaLuu = 'https://img.icons8.com/?size=256&id=43571&format=png';
var originalKhamPha = 'https://img.icons8.com/?size=256&id=88004&format=png';

function changeImage(newImageUrl, elementId, textElementId) {
    // Lưu URL hình ảnh mới vào local storage
    localStorage.setItem(elementId, newImageUrl);
    // Cập nhật hình ảnh hiện tại
    document.getElementById(elementId).src = newImageUrl;
    // Thêm lớp 'bold-text' vào tên
    document.getElementById(textElementId).classList.add('bold-text');
    // Lưu trạng thái in đậm của tên vào local storage
    localStorage.setItem(textElementId, 'bold');
}

function resetImage(elementId, originalImageUrl, textElementId) {
    // Khôi phục URL hình ảnh ban đầu
    localStorage.setItem(elementId, originalImageUrl);
    document.getElementById(elementId).src = originalImageUrl;
    // Loại bỏ lớp 'bold-text' khỏi tên
    document.getElementById(textElementId).classList.remove('bold-text');
    // Xóa trạng thái in đậm của tên khỏi local storage
    localStorage.removeItem(textElementId);
}

window.onload = function() {
    // Khi trang tải, kiểm tra xem có URL hình ảnh được lưu trong local storage không
    var savedImageUrl = localStorage.getItem('trangChu');
    if (savedImageUrl) {
        // Nếu có, cập nhật hình ảnh
        document.getElementById('trangChu').src = savedImageUrl;
    }
    var savedImageUrl = localStorage.getItem('trangBanBe');
    if (savedImageUrl) {
        document.getElementById('trangBanBe').src = savedImageUrl;
    }
    var savedImageUrl = localStorage.getItem('trangDaLuu');
    if (savedImageUrl) {
        document.getElementById('trangDaLuu').src = savedImageUrl;
    }
    var savedImageUrl = localStorage.getItem('trangKhamPha');
    if (savedImageUrl) {
        document.getElementById('trangKhamPha').src = savedImageUrl;
    }





    // Kiểm tra xem tên có được lưu trong local storage không
    var savedTextState = localStorage.getItem('tenTrangChu');
    if (savedTextState === 'bold') {
        // Nếu có, thêm lớp 'bold-text' vào tên
        document.getElementById('tenTrangChu').classList.add('bold-text');
    }
    var savedTextState = localStorage.getItem('tenBanBe');
    if (savedTextState === 'bold') {
        document.getElementById('tenBanBe').classList.add('bold-text');
    }
    var savedTextState = localStorage.getItem('tenDaLuu');
    if (savedTextState === 'bold') {
        document.getElementById('tenDaLuu').classList.add('bold-text');
    }
    var savedTextState = localStorage.getItem('tenKhamPha');
    if (savedTextState === 'bold') {
        document.getElementById('tenKhamPha').classList.add('bold-text');
    }
}

</script>