<?php
include_once("../DataBase/database.php");
?>

<!-- <div class="Dashboard"> -->

<!-- side-bar -->
<div class="side-bar">

    <!-- <img src="../Images/logo.jpg" alt="" height="55px" width="80px"> -->
    <!-- <h1><i class="fa-solid fa-building-columns"></i></h1> -->
    <div class="Side-bar-logo">
        <i class="fa-solid fa-building-columns"></i>
    </div>

    <!--start admin  -->
    <?php if (isset($_SESSION['admin_id'])) { ?>
        <ul class="link">
            <li><a href="Admin_Info.php"><i class="fa-sharp fa-solid fa-circle-info"></i>البيانات الشخصية</a> </li>


        </ul>
        <ul class="link">
            <li class="menu">
                <i class="fa-solid fa-users"></i>اضافه اعضاء<span class="fa-solid fa-caret-down"></span>
            </li>
            <ul class="dropdown-menu1">
                <li><a href="AddAdmin.php"><i class="fa-sharp fa-solid fa-people-roof"></i>اضافه مسئول جديد</a></li>
                <li><a href="AddDoctor.php"><i class="fa-solid fa-user-doctor"></i>اضافه اعضاء هيئه تدريس</a></li>
                <li> <a href="AddStudent.php"><i class="fa-solid fa-graduation-cap"></i>اضافه طلاب</a></li>

            </ul>



        </ul>
        <ul class="link">
            <li class="menu">
                <i class="fa-solid fa-folder-open"></i>الاقسام <span class="fa-solid fa-caret-down"></span>
            </li>
            <ul class="dropdown-menu1">
                <li><a href="Department_Info.php"> <i class="fa-solid fa-folder-open"></i>الاقسام المتاحه</a></li>

                <li><a href="AddDepartment.php"> <i class="fa-solid fa-circle-plus"></i> انشاء قسم</a></li>
            </ul>



        </ul>






    <?php } elseif (isset($_SESSION['doctor_id'])) { ?>
        <!-- start doctor -->
        <?php
        $doctor_id = $_SESSION["doctor_id"];
        $doctor = $con->query("SELECT * FROM `doctor` WHERE `Doctor_ID`=$doctor_id");
        $doctor_data = $doctor->fetch(PDO::FETCH_ASSOC);
     
        ?>

        <ul class="link">
            <li><a href="Doctor_Info.php"><i class="fa-sharp fa-solid fa-circle-info"></i>البيانات الشخصيه</a></li>
        </ul>

        <ul class="link">
            <li><a href="subject.php?doctor_id=<?= $doctor_data['Doctor_ID'] ?>"><i class="fa-solid fa-book-open"></i>المواد المتاحه</a></li>
        </ul>


        <!-- start student -->
    <?php } elseif (isset($_SESSION['student_id'])) { ?>
        <ul class="link">
            <li><a href="Student_Info.php"><i class="fa-sharp fa-solid fa-circle-info"></i>البيانات الشخصيه</a></li>

         <li><a href="registration.php"><i class="fa-sharp fa-solid fa-circle-info"></i>تسجيل المواد </a></li>
        </ul>

    <?php  } ?>

</div>

<!-- </div> -->
<!-- end Dasgboard -->