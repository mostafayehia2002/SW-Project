<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {

    header("location:../index.php");
    exit();
}
if (isset($_POST['add'])) {
    $id = $_POST['Department_ID'];
    $name1 = $_POST['Department_Arabic_Name'];
    $name2 = str_replace(" ", "_", $_POST['Department_English_Name']);
    $manger = $_POST['Department_manger'];
    $image = isset($_FILES['Department_Image']) ? $_FILES['Department_Image']['name'] : '';


    try {
        if (empty($image)) {
            $sql = $con->query("INSERT INTO `departments` (`Department_Code`,`Department_Arabic_Name`,`Department_English_Name`,`Department_manger`,`Department_Image`) VALUES ('$id','$name1','$name2','$manger','')");
        } else {
            $sql = $con->query("INSERT INTO `departments` (`Department_Code`,`Department_Arabic_Name`,`Department_English_Name`,`Department_manger`,`Department_Image`) VALUES ('$id','$name1','$name2','$manger','$image')");
            //images
            $from = $_FILES['Department_Image']['tmp_name'];
            $to = "images/" . $_FILES['Department_Image']['name'];
            move_uploaded_file($from, $to);
        }

        if ($sql) {
           // $table1 = $name2 . '_dependence_subject';
            $table2 = $name2 . '_subject';

            $table3 = $name2 . '_doctor_subjects';

            // $dep = $con->query("
            // CREATE TABLE `$table1` (
            //     `Dependence_Subject_ID` int(11) NOT NULL AUTO_INCREMENT,
            //     `Dependence_Subject_Name` varchar(100) NOT NULL,
            //     `Dependence_Subject_Code` varchar(100) NOT NULL,
            //     `Dependence_Subject_Hours` int(11) NOT NULL,
            //     `Dependence_Subject_Level` int(11) NOT NULL,
            //     `Dependence_Subject_Semister` int(11) NOT NULL,
            //     PRIMARY KEY (`Dependence_Subject_ID`)
            // )
            // ");

            $con->query("
                CREATE TABLE `$table2` (
                    `ID` int(11) NOT NULL  AUTO_INCREMENT,
                    `Subject_Code` varchar(100) NOT NULL,
                    `Subject_Name` varchar(100) NOT NULL,
                    `Subject_Hours` tinyint(4) NOT NULL DEFAULT 3,
                    `De_Subject_Code` varchar(100) NOT NULL,
                    `De_Subject_Name` varchar(100) NOT NULL,
                    `De_Subject_Hours` tinyint(4) NOT NULL DEFAULT 3
                ) 
                ");
            $con->query("
                CREATE TABLE `$table3` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `Doctor_Id` bigint(30) NOT NULL,
                    `Subject_Name` varchar(100) NOT NULL,
                    PRIMARY KEY (`id`),
                    KEY `Doctor_Id` (`Doctor_Id`),
                    FOREIGN KEY (`Doctor_Id`) REFERENCES `doctor` (`Doctor_ID`) ON DELETE CASCADE ON UPDATE CASCADE
                )
                ");
            echo "<div class='success'>  تم انشاء القسم بنجاح</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='faild'>";
        echo " يرجى ادخال البيانات بشكل صحيح <br>";
        echo "</div>";
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CssComponent/all.min.css">
        <link rel="stylesheet" href="../CssComponent/AddData.css">
        <link rel="stylesheet" href="../CssComponent/Dashboard.css">
        <title>Department</title>
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
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="oneuser">
                        <h3 class="title">اضافة قسم:</h3>
                        <div class="allinput">
                            <div class="input-filed">
                                <label for="Department_Arabic_Name"> اسم القسم باللغه العربيه</label>
                                <input type="text" id="Department_Arabic_Name" name="Department_Arabic_Name" required>
                            </div>
                            <div class="input-filed">
                                <label for="Department_English_Name">اسم القسم باللغه الانجليزيه</label>
                                <input type="text" id="Department_English_Name" name="Department_English_Name" required>
                            </div>
                            <div class="input-filed">
                                <label for="department_id"> كود القسم</label>
                                <input type="text" placeholder="" id="department_id" name="Department_ID" required>
                            </div>
                            <div class="input-filed">
                                <label for="department_image">اضافة صورة </label>
                                <input type="file" id="department_image" name="Department_Image" accept="image/*">
                            </div>
                            <div class="input-filed">
                                <label for="department_manger"> رئيس القسم</label>
                                <input type="text" id="departmanet_manger" name="Department_manger">
                            </div>
                        </div>
                    </div>
                    <div class="save">
                        <input type="submit" value="اضافة" name="add">
                    </div>
                </form>
            </div>
        </section>
        <script src="../JsComponent/Action.js"></script>
        <script src="../JsComponent/admin.js"></script>
    </body>

</html>