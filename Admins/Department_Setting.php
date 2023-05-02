<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
} 
?>
<!DOCTYPE html>
<html   lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CssComponent/all.min.css">
  <link rel="stylesheet" href="../CssComponent/Dashboard.css">
    <title> اعدادات القسم</title>

</head>

<body>
    <!-- Start nav-bar -->
    <?php include_once("../Components/NavBar.php"); ?>
    <!-- end nav bar -->

    <section class="section">
        <!-- Dashboard -->
        <?php include_once("../Components/Dashboard.php") ?>
        <!-- end Dashboard -->
        <div class="container">









        </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
  <script src="Js/main.js"></script>
</body>

</html>