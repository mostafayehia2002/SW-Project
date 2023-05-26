<?php
session_start();
if (!isset($_SESSION["student_id"])) {

    header("location:../index.php");
    exit();
}

include_once("../DataBase/database.php");
 $ID = $_SESSION['student_id'];
    

//course registration
 $data1=$con->query("SELECT * FROM `course_registration` WHERE Student_ID='$ID'
 AND Registration=1");     
 $data1=$data1->fetchAll(PDO::FETCH_ASSOC);



 $data2=$con->query("SELECT * FROM `subject_marks` WHERE Student_ID='$ID'");     
 $data2=$data2->fetchAll(PDO::FETCH_ASSOC);





?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CssComponent/all.min.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
    <title>المواد المسجله</title>
    <style>
.container{
  width: 80%;
  margin:20px auto;
  display: flex;
  align-items: center;
  justify-content: center;
}
 table{ 
  border-collapse: collapse;
  border-spacing: 0;
  box-shadow: 0 2px 15px rgba(64,64,64,.2);
  border-radius: 12px 12px 0 0;
  overflow: hidden;
  width:100%;
}
th{
  background-color: #229678;
  color: #fff;
  font-weight: 400;
  text-transform: uppercase;
}
td,
th{
  padding: 15px 20px;
  text-align: right;
  /* border: 1px solid #1B9C85; */
}

tr{
  width: 100%;
  background-color: #fafafa;
}
tr:nth-child(even){
  background-color: #eeeeee;
}

    </style>
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

        <table>
        <thead>
          <tr>
            <th>اسم المادة</th>
            <th>درجة المادة</th>
            <th>تقدير المادة</th>
          </tr>
        </thead>

        <tbody>
            <?php  foreach($data1 as $d1){?>
        <tr>
            <td><?php echo $d1['Subject_Name'] ?> </td>          
            <?php foreach($data2 as $d2){
             if($d1['Subject_Name']==$d2['Subject_Name']) { ?>

            <td><?php echo $d2['Total_Marks'] ?> </td>
            <td>null</td>
            <?php } } ?>
           
        </tr>
        <?php } ?>
  
        </tbody>
               
        <tfoot>
          <tr>
            <td>مجموع الدرجات</td>
            <td colspan="2">0</td>
          </tr>
        </tfoot>
      </table>

      
    


        </div>
    </section>
    <script src="../JsComponent/Action.js"></script>
</body>

</html>





