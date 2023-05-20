<?php

session_start();
if (!isset($_SESSION["doctor_id"])) {
  header("location:../index.php");
  exit();
}
include_once("../DataBase/database.php");


//table data

$subject_name=$_GET['subject_name'];

$subject_marks=$con->query("SELECT t1.Full_Name,
t2.Student_ID,
t2.Subject_Name,
t2.Subject_Marks,
t2.Subject_Midterm,
t2.Subject_Quiz,
t2.Subject_Attendance,
t2.Total_Marks
FROM
`student` t1
 INNER JOIN
 `subject_marks` t2 
 on t1.St_ID=t2.Student_ID
 WHERE t2.Subject_Name='$subject_name'
");
$subject_marks=$subject_marks->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- table -->
  <link rel="stylesheet" href="../CssComponent/bootstrap.min.css">
    <link rel="stylesheet" href="../CssComponent/datatables.min.css">
  <!--  -->
  <link rel="stylesheet" href="../CssComponent/all.min.css">
  <link rel="stylesheet" href="../CssComponent/subject.css">
  <link rel="stylesheet" href="../CssComponent/AddData.css">
  <link rel="stylesheet" href="../CssComponent/Table.css">
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
    <ul class="department-navbar">
            <li>
                <!-- <a href="subject_Setting.php?"> الصفحه الرئيسيه</a> -->

            </li>     
        </ul>


    <div class="container">

    <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>الرقم الاكاديمي</th>
                                <th>اسم الطالب</th>
                                <th>اسم المقرر</th>
                                <th>درجة المقرر</th>
                                <th>درجة نصف الترم</th>
                                <th>درجة الكويز</th>
                                <th>درجة الغياب</th>
                                <th> المجموع الكلي</th>
                                <th> التحكم</th>
                            </tr>
                        </thead>
                        
                        <tbody class="table-content">
                          <?php foreach($subject_marks as $data) {?>
                            <tr>
                             <td><?php  echo $data['Student_ID'] ?></td>
                             <td><?php  echo $data['Full_Name'] ?></td>
                             <td><?php  echo $data['Subject_Name'] ?></td>
                             <td><?php  echo $data['Subject_Marks'] ?></td>
                             <td><?php  echo $data['Subject_Midterm'] ?></td>
                             <td><?php  echo $data['Subject_Quiz'] ?></td>
                             <td><?php  echo $data['Subject_Attendance'] ?></td>
                             <td><?php  echo $data['Total_Marks'] ?></td>
                               
                                <td>
                                  
                                    <button><a href="#" class="update">تعديل</a></button>
                                 
                                </td>
                            </tr>
                          
                         <?php } ?>
                       
                        </tbody>
                    </table>
                </div>
            </div>
      </div>
 




      <!-- end table -->
    </div>
  </section>


  <script src="../JsComponent/bootstrap.bundle.min.js"></script>
    <script src="../JsComponent/jquery-3.6.0.min.js"></script>
    <script src="../JsComponent/datatables.min.js"></script>
    <script src="../JsComponent/pdfmake.min.js"></script>
    <script src="../JsComponent/vfs_fonts.js"></script>
    <script src="../JsComponent/custom.js"></script>
  <script src="../JsComponent/Action.js"></script>
</body>

</html>