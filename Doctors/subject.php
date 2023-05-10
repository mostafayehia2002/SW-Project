<?php
session_start();
if (!isset($_SESSION["doctor_id"])) {
    header("location:../index.php");
    exit();
}
include_once("../DataBase/database.php");
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CssComponent/all.min.css">
  <link rel="stylesheet" href="../CssComponent/subject.css">
  <link rel="stylesheet" href="../CssCOmponent/Dashboard.css">
  <title>Subject</title>
</head>

<body>

     <!-- Dashboard -->
     <?php include_once("../Components/Dashboard.php") ?>
        <!-- end Dashboard -->
  <section class="section">
      <!-- Start nav-bar -->
      <?php include_once("../Components/NavBar.php"); ?>
       <!-- end nav bar -->

    <div class="container">
      <div class="boxs">


        <div class="box">
          <h2> اسم المقرر:</h2>
          <h2> كود المقرر:</h2>
          <h2> تاريخ بداية الفصل:</h2>
          <div class="info">
            <a href="#"> الاعدادت </a>
            <i class="fas fa-long-arrow-alt-left"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="../JsComponent/Action.js"></script>
</body>

</html>