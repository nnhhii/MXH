<?php
session_start();
if(isset($_SESSION['user']))
{
    $user_id = $_SESSION['user'];
    $ketnoi= new mysqli('localhost','root','','MXH');     
    $sql= "SELECT * FROM user WHERE user_id=$user_id";
    $result= $ketnoi->query($sql);
    $row_id= $result->fetch_assoc();

    $showMenuTren = true;
    $showMenuTrai = true;
    $showMenuPhai = true;
    $showMenuDuoi = true;
    if (isset($_GET["pid"])){
        $id=$_GET["pid"];
        switch ($id){
            case 0:
                $showMenuTren = false;
                $showMenuTrai = false;
                $showMenuPhai = false;
                include("message.php");
                break;
            case 1:
                $showMenuTrai = false;
                $showMenuPhai = false;
                include("trangcanhan/trangcanhan.php");
                break;
            case 2:
                $showMenuTrai = false;
                $showMenuPhai = false;
                include("trangcanhan/trangbanbe.php");
                break;
            case 3:
                $showMenuPhai = false;
                include("timkiem/ketqua.php");
                break;
            case 4:
                $showMenuPhai = false;
                include("menu/banbe.php");
                break;
            case 5:
                $showMenuPhai = false;
                include("menu/daluu.php");
                break;
            case 6:
                $showMenuPhai = false;
                include("menu/khampha.php");
                break;
            case 7:
                $showMenuPhai = false;
                include("menu/reels.php");
                break;
            case 8:
                $showMenuPhai = false;
                include("menu/timkiem.php");
                break;
            case 9:
                $showMenuPhai = false;
                include("menu/taobaidang.php");
                break;
            case 10:
                $showMenuPhai = false;
                include("dangbaiviet/posts_url.php");
                break;

        }
    }else {include("home.php");}

    if($showMenuTren) {
        include ('menu/menu_tren.php');
    }
    if($showMenuTrai) {
        include ('menu/menu_trai.php');
    }
    if($showMenuPhai) {
        include ('menu/menu_phai.php');
    }
    if($showMenuDuoi) {
        include ('menu/menu_duoi.php');
    }
} else {
    header("location:dangnhap/dangnhap.php");
}
?>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/like.css">
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="stylesheet" href="css/cmt.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <script src="https://kit.fontawesome.com/fec980010a.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>