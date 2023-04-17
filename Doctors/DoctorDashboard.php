<?php 
session_start();

if(!isset($_SESSION["doctor_id"])){

    header("location:../index.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font Awesome -->
    <link rel="stylesheet" href="./CSS Style/all.min.css">
    <!-- custom css style -->
    <link rel="stylesheet" href="./CSS Style/Dashboard.css">
</head>
<body>
     <!-- Start section sidebar -->
     <div class="navtop">
            <div class="most">
                <i id="menu-btn" class="fas fa-bars menu">egddffd</i>
            </div>
            <div class="profile">
                <div>
                    <h3>مصطفي </h3>
                    <span>مستخدم</span>
                </div>
                <div class="image">
                    <img src="./images/pic-1.jpg" alt="">
                </div>
            </div>
    </div>

    <div class="side-bar">
        <div class="logo">
            <h3>  سوفت وير</h3>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="#"><i class="fa fa-list icons"></i><span>البيانات الشخصية</span></a></li>
                <li><a href="#"><i class="fa fa-user icons"></i> <span>اضافة مسخدمين </span><i class="fa-solid fa-chevron-down add"></i></a>
                    <ul class="drow-menu">
                        <li><a href="#">طلاب</a></li>
                        <li><a href="#">دكتره</a></li>
                        <li><a href="#">مستخدمين</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-tasks icons"></i><span>اضافة بياتات شخصية</span><i class="fa-solid fa-chevron-down add"></i></a>
                    <ul class="drow-menu ">
                        <li><a href="#">طلاب</a></li>
                        <li><a href="#">دكتره</a></li>
                        <li><a href="#">مستخدمين</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-list-alt icons"></i> <span>الاقسام المتاحة</span></a></li>
                <li><a href="#"><i class="fa fa-pie-chart icons"></i> <span>انشاء قسم </span></a></li>
            </ul>
        </nav>
    </div>
    <script src="./JS/Doctor.js"></script>
</body>
</html>