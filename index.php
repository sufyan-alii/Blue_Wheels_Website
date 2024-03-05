<?php
session_start();
if (isset($_SESSION["isLogin"])){
    header("location:employee_site.php");
    exit();
}else{
    header("location:login.php");
    exit();
}
?>