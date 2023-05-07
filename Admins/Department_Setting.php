<?php
session_start();
include_once("../DataBase/database.php");
if (!isset($_SESSION["admin_id"])) {
  header("location:../index.php");
  exit();
}
if (isset($_GET['department_id'])) {
  $id = $_GET['department_id'];
  $department_table = $con->query("SELECT * FROM `departments` WHERE `ID`=$id");
  $department_table = $department_table->fetch(PDO::FETCH_ASSOC);
  $department_name = $department_table['Department_English_Name'];
  $table_subject = $department_name . "subject";
  $table_depandance_subject = $department_name . "_dependence_subject";
} else {
  header("location: Department_Info.php");
  exit();
}

if (isset($_POST['add_subject'])) {
  $subject_name = $_POST['subject_name'];
  $subject_code = $_POST['subject_code'];
  $subject_hour = $_POST['subject_hours'];
  $subject_semester = $_POST['subject_semester'];
  $subject_level = $_POST['subject_level'];
  $depandance_subject_id = $_POST['Depandance_Subject_ID'];
  $subject_exist = $con->query("SELECT * FROM `$table_subject` WHERE `Subject_Name`='$subject_name' ");
  if ($subject_exist->rowCount() <= 0) {
    $add_subject = $con->query("INSERT INTO `$table_subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`, `Subject_Hours`, `Subject_semister`, `Subject_Levels`, `Dependence_Subject_ID`) VALUES (NULL, '$subject_name', '$subject_code', '$subject_hour', '$subject_semester', '$subject_level', '$depandance_subject_id')");
    if ($add_subject) {
      echo "<div class='success'>  تم اضافه الماده بنجاح</div>";
    }
  } else {
    echo "<div class='faild'>هذه الماده موجوده مسبقا </div>";
  }
}


//Add Depend Subject
if (isset($_POST['add_depend_subject'])) {
  $subject_name = $_POST['subject_name'];
  $subject_code = $_POST['subject_code'];
  $subject_hour = $_POST['subject_hour'];
  $subject_semester = $_POST['subject_semester'];
  $subject_level = $_POST['subject_level'];
  $subject_exist = $con->query("SELECT * FROM `$table_depandance_subject` WHERE `Dependence_Subject_Name`='$subject_name' ");
  if ($subject_exist->rowCount() <= 0) {
    $add_depend_subject = $con->query("INSERT INTO `$table_depandance_subject` (`Dependence_Subject_ID`, `Dependence_Subject_Name`, `Dependence_Subject_Code`, `Dependence_Subject_Hours`, `Dependence_Subject_Level`, `Dependence_Subject_Semister`) VALUES (NULL, '$subject_name', '$subject_code', '$subject_hour', '$subject_level', '$subject_semester')");
    if ($add_depend_subject) {
      echo "<div class='success'>  تم اضافه الماده بنجاح</div>";
    }
  } else {
    echo "<div class='faild'>هذه الماده موجوده مسبقا </div>";
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
        <link rel="stylesheet" href="../CssComponent/Table.css">
        <link rel="stylesheet" href="../CssComponent/Dashboard.css">
        <title> اعدادات القسم</title>

        <style>
            .department-navbar{
              list-style:none;
                height: 60px;
                width:100%;
              /* overflow-X:auto;  */
             background-color: white;     
            }
            .department-navbar li{
            display: inline-block;
            padding:10px;
          

            }
            .department-navbar a{
                color:#229678;
                font-weight: bold;
                text-decoration: none;
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
            <ul  class="department-navbar">                  
                    <li>
                        <a href="Department_Setting.php?department_id=<?= $id ?>&status=add_subject"> اضافه مواد القسم</a>
                    </li>
                    <li>
                        <a href="Department_Setting.php?department_id=<?= $id ?>&status=add_depend_subject">اضافة مواد المتطلب السابق للقسم
                        </a>
                    </li>
                  
                 
                   
                  
                </ul>
            <div class="container">

               

                <?php
      if (isset($_GET['status']) && $_GET['status'] == "add_subject") {
      ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="athers">
                        <h3 class="title">اضافة مواد القسم:</h3>
                        <div class="input-filed">
                            <label for="alluser">اضافة مواد القسم</label>
                            <input type="file" id="alluser">
                        </div>
                    </div>
                    <div class="break"></div>
                    <div class="oneuser">
                        <h3 class="title">اضافة ماده:</h3>
                        <div class="allinput">
                            <div class="input-filed">
                                <label for="Subject_Name"> اسم الماده</label>
                                <input type="text" id="Subject_Name" name="subject_name" required>
                            </div>
                            <div class="input-filed">
                                <label for="Subject_Code"> كود الماده</label>
                                <input type="text" id="Subject_Code" name="subject_code" required />
                            </div>
                            <div class="input-filed">
                                <label for="Subject_Hours">
                                    عدد ساعات الماده
                                </label>
                                <input type="number" id="Subject_Hours" name="subject_hours" required />
                            </div>
                            <div class="input-filed">
                                <label for="subject_semester"> الترم</label>
                                <input type="number" id="subject_semester" name="subject_semester" required>
                            </div>
                            <div class="input-filed">
                                <label for="Subject_Levels">المستوي</label>
                                <input type="number" id="Subject_Levels" name="subject_level" required />
                            </div>
                            <div class="input-filed">
                                <label for="Depandance_Subject_ID">المتطلب السابق:</label>
                                <select name="Depandance_Subject_ID" id="Depandance_Subject_ID">
                                    <?php
                  $all_dependance = $con->query("SELECT * FROM `$table_depandance_subject`");
                  $all_dependance = $all_dependance->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($all_dependance as $depend) {
                  ?>
                                    <option value="<?= $depend['Dependence_Subject_ID'] ?>">
                                        <?= $depend['Dependence_Subject_Name'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="save">
                            <input type="submit" value="اضافه" name="add_subject">
                        </div>
                    </div>
                </form>
        <?php } elseif (isset($_GET['status']) && $_GET['status'] == "add_depend_subject") { ?>
            
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="athers">
                        <div class="input-filed">
                            <label for="alluser">اضافه المتطلبات السابقه </label>
                            <input type="file" id="alluser">
                        </div>
                    </div>
                    <div class="break"></div>
                    <div class="oneuser">
                        <h3 class="title">اضافة متطلب سابق :</h3>
                        <div class="allinput">
                            <div class="input-filed">
                                <label for="Subject_name">اسم الماده </label>
                                <input type="text" id="Subject_name" name="subject_name" required>
                            </div>
                            <div class="input-filed">
                                <label for="subject_code">كود الماده</label>
                                <input type="text" id="subject_code" name="subject_code" required>
                            </div>
                            <div class="input-filed">
                                <label for="subject_hour"> عدد ساعات الماده</label>
                                <input type="number" id="subject_hour" name="subject_hour" required>
                            </div>
                            <div class="input-filed">
                                <label for="subject_semester"> الترم</label>
                                <input type="number" id="subject_semester" name="subject_semester" required>
                            </div>
                            <div class="input-filed">
                                <label for="subject_level">المستوي </label>
                                <input type="number" id="subject_level" name="subject_level" required>
                            </div>
                        </div>
                        <div class="save">
                            <input type="submit" value="اضافه" name="add_depend_subject">
                        </div>
                </form>
            <?php } ?>
            </div>






        </section>
        <script src="../JsComponent/Action.js"></script>
        <script src="../JsComponent/admin.js"></script>
    </body>

</html>