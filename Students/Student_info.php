
<?php
session_start();
if (!isset($_SESSION["student_id"])) {

    header("location:../index.php");
    exit();
}

include_once("../DataBase/database.php");
if($con){    
$ID=$_SESSION['student_id'];
$sql=$con->query("SELECT * FROM `student` WHERE St_ID='$ID'");
$data=$sql->fetch(PDO::FETCH_ASSOC);
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

<!-- Start nav-bar -->    
<?php include_once("../Components/NavBar.php"); ?>
 <!-- end nav bar -->


 <section  class="section">

 <!-- Dashboard -->
 <?php   include_once("../Components/Dashboard.php") ?>
 <!-- end Dashboard -->



    <div class="container ">
        <div class="personal_info">
            <h3>بيانات شخصية</h3>
            <ul>
                <li>
                    <b>الرقم الاكاديمي </b>
                    <p id="St_ID"><?php echo $data['St_ID'] ?></p>
                </li>
                <li>
                    <b>الاسم عربى</b>
                    <p id="Full_Name"><?php echo $data['Full_Name'] ?></p>
                </li>
                
                <li>
                    <b>بلد الجنسية</b>
                    <p id="Nationality"><?php echo $data['Nationality'] ?></p>
                </li>
                <li>
                    <b>النوع</b>
                    <p id="Gender"><?php echo $data['Religion'] ?></p>
                </li>
                <li>
                    <b>الديانة</b>
                    <p id="Religion"><?php echo $data['Religion'] ?></p>
                </li>
                <li>
                    <b>العنوان</b>
                    <p id="Address"><?php echo $data['Address'] ?></p>
                </li>
                <li>
                    <b>تاريخ الميلاد</b>
                    <p id="Date_of_Birth"><?php echo $data['Date_Birth'] ?></p>
                    <b>رقم الهاتف</b>
                    <p id="Phone_Number"><?php echo $data['Phone_Number'] ?></p>
                </li>
                <li>
                    <b>الرقم القومى / جواز السفر </b>
                    <p id="National_ID"><?php echo $data['National_ID'] ?></p>
                    <b>البريد الاكاديمي</b>
                    <p id="Academic_Email"><?php echo $data['Academic_Email'] ?></p>
                </li>
            </ul>
        </div>
        <span class="line"></span>
        <div class="prev_qualification_info">
            <h3>بيانات المؤهل السابق</h3>
            <ul>
                <li>
                    <b>المدرسة</b>
                    <p id="School"><?php echo $data['School'] ?></p>
                </li>
                <li>
                    <b>المؤهل</b>
                    <p id="Qualification"><?php echo $data['Qualification'] ?></p>
                </li>
                <li>
                    <b>مجموع الدرجات</b>
                    <p id="Total_Degree"><?php echo $data['Total_Degree'] ?></p>
                </li>
                <li>
                    <b>النسبة</b>
                    <p id="Average"><?php echo $data['Average'] ?></p>
                </li>
                <li>
                    <b>تاريخ التنسيق</b>
                    <p id="Date_of_Coordination"><?php echo $data['Date_Coordination'] ?></p>
                </li>
                <li>
                    <b>رقم التنسيق</b>
                    <p id="Number_of_Coordination"><?php echo $data['Number_Coordination'] ?></p>
            </ul>
        </div>
        <span class="line"></span>
        <div class="Faculty_info">
            <h3>بيانات الكلية</h3>
            <ul>
                <li>
                    <b>الكلية</b>
                    <p id="Faculty"><?php echo $data['Faculty'] ?></p>
                </li>
                <li>
                    <b>الجامعة</b>
                    <p id="University"><?php echo $data['University'] ?></p>
                </li>
                <li>
                    <b>القسم</b>
                    <p id="Department"><?php echo $data['Department'] ?></p>
                </li>
                <li>
                    <b>تاريخ الانضمام</b>
                    <p id="Joining_Date"><?php echo $data['Joining_Date'] ?></p>
                </li>
            </ul>
        </div>
    </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
</body>

</html>