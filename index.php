<?php
session_start();
if(isset($_SESSION['user']))
{
    $showMenuTren = true;
    $showMenuTrai = true;
    $showMenuPhai = true;
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
                include("menu/menu_trangbanbe.php");
            case 5:
                $showMenuPhai = false;
                include("menu/menu_trangbanbe.php");
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
} else {
    header("location:dangnhap/login.php");
}
?>
