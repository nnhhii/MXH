<?php
session_start();
if(isset($_SESSION['user']))
{
    if (isset($_GET["pid"])){
        $id=$_GET["pid"];
        switch ($id){
            case 0:
                include("message.php");
                break;
            case 1:
                include("trangcanhan/trangcanhan.php");
        }
    }else {include("home.php");}

} else {
    header("location:dangnhap/login.php");
}
?>