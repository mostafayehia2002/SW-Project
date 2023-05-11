<?php

session_start();
if (!isset($_SESSION["doctor_id"])) {
  header("location:../index.php");
  exit();
}
include_once("../DataBase/database.php");



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CssComponent/all.min.css">
  <link rel="stylesheet" href="../CssComponent/subject.css">
  <link rel="stylesheet" href="../CssCOmponent/Dashboard.css">
  <title>Document</title>
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

      <?= $_GET['subject_name'] ?>
    </div>


  </section>

  <script src="../JsComponent/Action.js"></script>
</body>

</html>