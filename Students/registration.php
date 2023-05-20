<?php
session_start();
if (!isset($_SESSION["student_id"])) {

    header("location:../index.php");
    exit();
}

include_once("../DataBase/database.php");
if ($con) {
    $ID = $_SESSION['student_id'];
    $sql = $con->query("SELECT * FROM `student` WHERE St_ID='$ID'");
    $data = $sql->fetch(PDO::FETCH_ASSOC);
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/Info.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
    <title>Information</title>
</head>

<body>
    <!-- Dashboard -->
    <?php include_once("../Components/Dashboard.php") ?>
    <!-- end Dashboard -->
    <section class="section">
        <!-- Start nav-bar -->
        <?php include_once("../Components/NavBar.php"); ?>
        <!-- end nav bar -->
        <div class="container ">



        </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
</body>

</html>