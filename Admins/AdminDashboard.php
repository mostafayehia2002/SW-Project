<?php 
session_start();

if(!isset($_SESSION["admin_id"])){

    header("location:../index.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- font Awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- custom css style -->
    <link rel="stylesheet" href="css/dash.css">
</head>
<body>
    <!-- <h1>Admin page</h1> -->
    <a href="../logout.php">logout</a>
    <!-- Start section sidebar -->
    <div id="menu-btn" class="fas fa-bars menu"></div>
    <div class="side-bar">
        <div class="dashes">
            <div class="close-btn"><i class="fas fa-times"></i></div>
        </div>
        <div class="profile">
            <img src="images/pic-1.jpg" class="image" alt="">
            <h3 class="name">مستخدم</h3>
            <a href="#" class="logout"> تسجيل خروج</a>
            <a href="#" class="login">تسجيل دخول</a>
        </div>
        <nav class="navbar">
            <a href="#"><i class="fa fa-list icons"></i><span>البيانات الشخصية</span></a>
            <a href="#"><i class="fa fa-user icons"></i> <span>اضافة مسخدمين </span></a>
            <a href="#"><i class="fa fa-tasks icons"></i><span>اضافة بياتات شخصية</span></a>
            <a href="#"><i class="fa fa-list-alt icons"></i> <span>الاقسام المتاحة</span></a>
            <a href="#"><i class="fa fa-pie-chart icons"></i> <span>انشاء قسم </span></a>
        </nav>
    </div>
    <script src="js/Admin.js"></script>
</body>
</html>