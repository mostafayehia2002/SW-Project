<?php
session_start();
if (!isset($_SESSION["doctor_id"])) {

    header("location:../index.php");
    exit();
}

include_once("../DataBase/database.php");
if ($con) {
    $ID = $_SESSION['doctor_id'];
    $sql = $con->query("SELECT * FROM `doctor` WHERE Doctor_ID='$ID'");
    $data = $sql->fetch(PDO::FETCH_ASSOC);
}


?>







<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CssCOmponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/Info.css">
    <link rel="stylesheet" href="../CssCOmponent/Dashboard.css">
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
            <div class="personal_info">
                <h3>بيانات شخصية</h3>
                <ul>
                    <li>
                        <b>الرقم القومى</b>
                        <p id="Dr_ID"> <?php echo $data['Doctor_ID'] ?> </p>
                    </li>
                    <li>
                        <b>الاسم عربى</b>
                        <p id="Full_Name"><?php echo $data['Full_Name'] ?> </p>
                    </li>
                    <li>
                        <b>بلد الجنسية</b>
                        <p id="Nationality"><?php echo $data['Nationality'] ?></p>
                    </li>
                    <li>
                        <b>النوع</b>
                        <p id="Gender"><?php echo $data['Gender'] ?> </p>
                    </li>
                    <li>
                        <b>الديانة</b>
                        <p id="Religion"> <?php echo $data['Religion'] ?></p>
                    </li>
                    <li>
                        <b>العنوان</b>
                        <p id="Address"><?php echo $data['Address'] ?></p>
                    </li>
                    <li>
                        <b>تاريخ الميلاد</b>
                        <p id="Date_of_Birth"><?php echo $data['Address'] ?></p>
                    </li>
                    <li>
                        <b>رقم الهاتف</b>
                        <p id="Phone_Number"><?php echo $data['Phone_Number'] ?> </p>
                    </li>
                </ul>
            </div>
            <span class="line"></span>
            <div class="Faculty_info">
                <h3>بيانات الكلية</h3>
                <ul>
                    <li>
                        <b>الدرجة العلمية</b>
                        <p id="Degree"> <?php echo $data['Degree'] ?></p>
                    </li>
                    <li>
                        <b>الكلية</b>
                        <p id="Faculty"> <?php echo $data['Faculty'] ?></p>
                    </li>
                    <li>
                        <b>الجامعة</b>
                        <p id="University"><?php echo $data['University'] ?></p>
                    </li>
                    <li>
                        <b>القسم</b>
                        <p id="Department"><?php echo $data['Department'] ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
</body>

</html>