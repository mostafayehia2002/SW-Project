<?php

session_start();
if (!isset($_SESSION["doctor_id"])) {
  header("location:../index.php");
  exit();
}
include_once("../DataBase/database.php");


$id=$_GET['id'];
$subject_name=$_GET['subject'];

 $data=$con->query("SELECT * FROM `subject_marks` t1  INNER JOIN `student` t2
 ON t1.Student_ID=$id AND t1.Subject_Name='$subject_name' AND t1.Student_ID=t2.St_ID");
 $data=$data->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){


$final=$_POST['final'];
$midterm=$_POST['midterm'];
$quiz=$_POST['quiz'];
$attendance=$_POST['attendance'];
$total=$final+$midterm+$quiz+$attendance;

$con->query("UPDATE `subject_marks` SET Subject_Marks='$final',Subject_Midterm='$midterm',Subject_Quiz='$quiz',Subject_Attendance='$attendance',Total_Marks='$total'  WHERE Student_ID='$id' AND Subject_Name='$subject_name'");
if($total>=50){
    $con->query("UPDATE `course_registration` SET Subject_Status=1 WHERE Student_ID='$id' AND Subject_Name='$subject_name'");
}

if($con){
header("Location:./subject_setting.php?subject_name=$subject_name");
exit;
}

}



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
  <link rel="stylesheet" href="../CssComponent/AddData.css">
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

    <form action="" method="POST" enctype="multipart/form-data">

                <div class="oneuser">
                    <div class="allinput">
                        <div class="input-filed">
                            <label for="id">الرقم الاكاديمي</label>
                            <input type="text"  name="id" id="id" readonly 
                             value="<?php echo $data['Student_ID']?>">
                        </div>

                        <div class="input-filed">
                            <label for="name">اسم الطالب</label>
                            <input type="text" id="name" name="full_name" readonly
                            value="<?php echo $data['Full_Name'] ?>"
                            >
                        </div>
                        <div class="input-filed">
                            <label for="subject_name">اسم المقرر</label>
                            <input type="text" id="subject_name" name="subject_name" readonly
                            value="<?php echo $data['Subject_Name'] ?>"
                            >
                        </div>

                        <div class="input-filed">
                            <label for="final">درجه المقرر</label>
                            <input type="number" id="final" name="final" min="0" max="60"
                            value="<?php echo $data['Subject_Marks'] ?>"
                            >
                        </div>

                        <div class="input-filed">
                            <label for="midterm"> درجه نصف الترم</label>
                            <input type="number"  id="midterm" name="midterm" min="0" max="20"
                            value="<?php echo $data['Subject_Midterm'] ?>"
                            >
                        </div>
                        <div class="input-filed">
                            <label for="quiz"> درجه الكويز</label>
                            <input type="number"  id="quiz" name="quiz" min="0" max="10"
                            value="<?php echo $data['Subject_Quiz'] ?>"
                            >
                        </div>
                        <div class="input-filed">
                            <label for="attendance"> الغياب</label>
                            <input type="number" id="attendance" name="attendance" min="0" max="10"
                            value="<?php echo $data['Subject_Attendance']?>"
                            >
                        </div>
                                           
                        </div>
                    </div>

                    <div class="save">
                    <input type="submit" value="حفظ" name="update">
                </div>
                </div>

              

       
      </form>


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