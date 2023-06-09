<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
    header("location:../index.php");
    exit();
} else {
    $ID = $_SESSION['admin_id'];
    $sql = $con->query("SELECT * FROM `admin` WHERE Ad_ID='$ID'");
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
        <link rel="stylesheet" href="../CssComponent/Table.css">
        <link rel="stylesheet" href="../CssComponent/Dashboard.css">
        <title>Admin Information</title>
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
                <div class="personal_info">
                    <h3>بيانات شخصية</h3>
                    <ul>
                        <li>
                            <b>الرقم القومى</b>
                            <p id="Ad_ID"> <?php echo   $data['Ad_ID']  ?> </p>
                        </li>
                        <li>
                            <b>الاسم عربى</b>
                            <p id="Full_Name"> <?php echo $data['Full_Name']  ?> </p>
                        </li>
                        <li>
                            <b>النوع</b>
                            <p id="Gender"> <?php echo $data['Gender']  ?> </p>
                        </li>
                        <li>
                            <b>الوظيفة</b>
                            <p id="Jop"> <?php echo  $data['Job'] ?> </p>
                        </li>
                        <li>
                            <b>العنوان</b>
                            <p id="Address"><?php echo $data['Address']  ?></p>
                        </li>
                        <li>
                            <b>البريد الاكتروني</b>
                            <p id="Email_Address"> <?php echo  $data['Job']  ?> </p>
                        </li>
                        <li>
                            <b>رقم الهاتف</b>
                            <p id="Phone_Number"><?php echo  $data['Phone_Number']  ?></p>
                        </li>
                    </ul>
                </div>
                <span class="line"></span>
                <div class="Faculty_info">
                    <h3>بيانات الكلية</h3>
                    <ul>
                        <li>
                            <b>الكلية</b>
                            <p id="Faculty"><?php echo  $data['Faculty']  ?></p>
                        </li>
                        <li>
                            <b>الجامعة</b>
                            <p id="University"><?php echo  $data['University']  ?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <script src="../JsComponent/Action.js"></script>
        <script src="../JsComponent/admin.js"></script>
    </body>

</html>