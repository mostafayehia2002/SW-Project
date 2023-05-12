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

  <style>
    .ptb-50 {
    padding: 50px 0px;
}

.mtb-15 {
    margin: 15px 0;
}


/* ==== Scoll  = Start ===== */
.totop {
    position: fixed;
    bottom: 0px;
    right: 10px;
    height: 45px;
    width: 45px;
    cursor: pointer;
    display: none;
    background: rgba(0, 0, 0, 0.3);
    color: #fff;
    border-radius: 5px 5px 0 0;
    line-height: 47px;
    font-size: 20px;
    text-align: center;
}

.totop:hover {
    line-height: 40px;
    color: #fff;
    background: #194274;
    text-shadow: 0 0 5px #000;
}

/* ==== Scoll  = End ===== */
/* ==== Data table  = Start ===== */

.data_table{
   background: #fff;
    padding: 15px;
    box-shadow: 1px 3px 5px #aaa;
    border-radius: 5px;
}

.data_table .btn{
    padding: 5px 10px;
    margin: 10px 3px 10px 0;
}
/* ==== Data table  = End  ===== */


/* Start Delete And Update And add*/
.table-content td button{
    margin: 1px;
    font-size: 14px;
    font-weight: bold;
    outline: none;
    border: none;
}
.table-content td a{
    color: #fff;
    padding: 4px 8px;
    border-radius: 3px;
}
.table-content td a.add{
    background-color: #080;
}
.table-content td a.delete{
    background-color: #f00;
}
.table-content td a.update{
    background-color: #00f;
}
/* End Delete And Update And add*/
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
    <ul class="department-navbar">
            <li>
                <a href="subject_Setting.php?"> الصفحه الرئيسيه</a>

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
                            <tr>
                                <td>mostafa</td>
                                <td>mostafa</td>
                                <td>mostafa</td>
                                <td>mostafa</td>
                                <td>mostafa</td>
                                <td>mostafa</td>
                                <td>mostafa</td>
                                <td>mostafa</td>
                                <td>
                                    <button><a href="#" class="add">اضافة</a></button>
                                    <button><a href="#" class="delete">حذف</a></button>
                                    <button><a href="#" class="update">تعديل</a></button>
                                </td>
                            </tr>
                          
                      
                       
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