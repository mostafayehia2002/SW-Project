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
    $table_subject = $department_name . "_subject";
    $department_doctor_subject = $department_name . "_doctor_subjects";
} else {
    header("location: Department_Info.php");
    exit();
}



//add department subject
if (isset($_POST['add_subject'])) {
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $subject_hour = $_POST['subject_hours'];
    $de_subject_name = $_POST['de_subject_name'];



    $subject_exist = $con->query("SELECT * FROM `$table_subject` WHERE `Subject_Name`='$subject_name' ");
    if ($subject_exist->rowCount() <= 0) {

        $add_subject = $con->query("INSERT INTO `$table_subject` ( `Subject_Code`, `Subject_Name`, `Subject_Hours`,`De_Subject_Name`) VALUES ('$subject_code','$subject_name','$subject_hour', '$de_subject_name');");
        if ($add_subject) {
            echo "<div class='success'>  تم اضافه الماده بنجاح</div>";
        }
    } else {
        echo "<div class='faild'>هذه الماده موجوده مسبقا </div>";
    }
}
//ubdate department subject




//delete department subject

if (isset($_GET['delete_subject'])) {
    $delete_subject = $_GET['delete_subject'];
    $delete = $con->query("DELETE FROM `$table_subject`  WHERE `ID`='$delete_subject'");
    if ($delete) {
        header("location:Department_Setting.php?department_id=$id&status=add_subject");
        exit;
    }
}

//delete department subject

if (isset($_GET['delete_drsubject'])) {
    $delete_drsubject = $_GET['delete_drsubject'];
    $delete = $con->query("DELETE FROM `$department_doctor_subject`  WHERE `id`='$delete_drsubject'");
    if ($delete) {
        header("location:Department_Setting.php?department_id=$id&status=add_doctor_subject");
        exit;
    }
}







//add subject to doctors
if (isset($_POST['add_doctor_subject'])) {

    $doctors_id = $_POST['doctor'];
    $doctor_subject = $_POST['subject'];

    $add_doctor_subject = $con->query("INSERT INTO `$department_doctor_subject` (`Doctor_Id`, `Subject_Name`) VALUES ('$doctors_id','$doctor_subject')");
    if ($add_doctor_subject) {
        echo "<div class='success'>  تم اضافه البيانات بنجاح</div>";
    }
}



?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

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
    <link rel="stylesheet" href="../CssComponent/Table.css">
    <link rel="stylesheet" href="../CssComponent/Department.css">
    <link rel="stylesheet" href="../CssComponent/Dashboard.css">
    <title> اعدادات القسم</title>

    <style>




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
                <a href="Department_Setting.php?department_id=<?= $id ?>&status=add_subject"> اضافه مواد القسم</a>
            </li>

            <li><a href="Department_Setting.php?department_id=<?= $id ?>&status=add_doctor_subject">
                    اعطاء صلاحيه المواد لي الدكتور
                </a></li>
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
                                <input type="number" id="Subject_Hours" name="subject_hours" required value="3" />
                            </div>


                            <div class="input-filed">
                                <label for="De_Subject_Name"> اسم المتطلب السابق</label>
                                <input type="text" id="De_Subject_Name" name="de_subject_name" required>
                            </div>






                        </div>
                        <div class="save">
                            <input type="submit" value="اضافه" name="add_subject">
                        </div>
                    </div>
                </form>
                <!-- show table data -->
                <div class="row">
                    <h3 class="titleTabel">جدول لعرض بيانات مواد القسم </h3>
                    <div class="col-12">
                        <div class="data_table">
                            <table id="example" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="th_text">ID</th>
                                        <th class="th_text">كود الماده</th>
                                        <th class="th_text">الاسم الماده</th>
                                        <th class="th_text">عدد ساعات </th>
                                        <th class="th_text">اسم المتطلب السابق</th>
                                        <th class="th_text">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="table-content">
                                    <?php
                                    $all_doctor_subject = $con->query("SELECT * FROM `$table_subject`");
                                    $doctor_subject_data = $all_doctor_subject->fetchAll(PDO::FETCH_ASSOC);
                                    if (!empty($doctor_subject_data)) {
                                        foreach ($doctor_subject_data as  $dr) {
                                    ?>
                                            <tr>
                                                <td><?php echo $dr['ID'] ?></td>
                                                <td><?php echo $dr['Subject_Code'] ?></td>
                                                <td><?php echo $dr['Subject_Name'] ?></td>
                                                <td><?php echo $dr['Subject_Hours'] ?></td>
                                                <td><?php echo $dr['De_Subject_Name'] ?></td>
                                                <td>
                                                    <button><a class="update" href=" " ?update=<?php echo $dr['ID'] ?> class="delete-btn"><i class="fa-solid fa-edit"></i> تعديل</a>
                                                    </button>
                                                    <button><a class="delete" href="Department_Setting.php? department_id=<?php echo $id ?>&status=add_subject&delete_subject=<?php echo $dr['ID'] ?>" class="delete-btn" onclick="return confirm('Are you soure Delete this subject ?');"><i class="fa-solid fa-trash"></i> حذف</a> </button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo '<p class="empty">no doctor available</p>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>

            <?php } elseif (isset($_GET['status']) && $_GET['status'] == "add_doctor_subject") {  ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="athers">
                        <h3 class="title">رفع المواد كامله</h3>
                        <div class="input-filed">
                            <label for="alluser">رفع المواد كامله من ملف</label>
                            <input type="file" id="alluser" />
                        </div>
                    </div>
                    <div class="break"></div>

                    <div class="oneuser">
                        <h3 class="title">اضافه الموادللدكتور</h3>
                        <div class="allinput">
                            <div class="input-filed">
                                <label for="list1">الماده</label>
                                <?php
                                $subject = $con->query("SELECT * FROM `$table_subject` ");
                                $all_subjects = $subject->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <input list="list1" name="subject" required />
                                <datalist id="list1">
                                    <?php
                                    foreach ($all_subjects as $s1) { ?>
                                        <option value="<?php echo $s1['Subject_Name'] ?>">
                                        
                                            <?php echo $s1['Subject_Code'] ?>
                                        </option>
                                    <?php }  ?>
                            </div>
                            <div class="input-filed">
                                <label for="list2">الدكتور</label>
                                <?php
                                $doctor = $con->query("SELECT* FROM `doctor`");
                                $data_doctor = $doctor->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <input list="list2" name="doctor" required />
                                <datalist id="list2">
                                    <?php
                                    foreach ($data_doctor as $d) { ?>
                                        <option value="<?php echo $d['Doctor_ID'] ?>"><?php echo $d['Full_Name'] ?>
                                        </option>
                                    <?php  } ?>

                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="save">
                        <input type="submit" value="اضافه" name="add_doctor_subject" />
                    </div>
                </form>

                <!-- show table Doctors Subject  -->
                <div class="row">
                    <h3 class="titleTabel">جدول لعرض بيانات دكاترة المواد </h3>
                    <div class="col-12">
                        <div class="data_table">
                            <table id="example" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="th_text">ID</th>
                                        <th class="th_text">اسم الماده</th>
                                        <th class="th_text">اسم الدكتور الماده</th>
                                        <th class="th_text">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="table-content">
                                    <?php
                                    $doctor_subject = $con->query("SELECT id,Subject_Name,Full_Name FROM `$department_doctor_subject` ds INNER JOIN `doctor` dc on ds.Doctor_Id= dc.Doctor_ID");
                                    $doctor_subject = $doctor_subject->fetchAll(PDO::FETCH_ASSOC);

                                    if (!empty($doctor_subject)) {
                                        foreach ($doctor_subject as  $dr_sub) {
                                    ?>
                                            <tr>
                                                <td><?php echo $dr_sub['id'] ?></td>
                                                <td><?php echo $dr_sub['Subject_Name'] ?></td>
                                                <td><?php echo $dr_sub['Full_Name'] ?></td>
                                                <td>
                                                    <button><a class="update" href="" ?update=<?php echo $dr_sub['id'] ?> class="delete-btn"><i class="fa-solid fa-edit"></i> تعديل</a>
                                                    </button>
                                                    <button><a class="delete" href="Department_Setting.php? department_id=<?php echo $id ?>&status=add_subject&delete_drsubject=<?php echo $dr_sub['id'] ?>" class="delete-btn" onclick="return confirm('Are you soure Delete this subject ?');"><i class="fa-solid fa-trash"></i> حذف</a> </button>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo '<p class="empty">no doctor available</p>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>




            <?php } ?>

        </div>






    </section>
    <script src="../JsComponent/bootstrap.bundle.min.js"></script>
    <script src="../JsComponent/jquery-3.6.0.min.js"></script>
    <script src="../JsComponent/datatables.min.js"></script>
    <script src="../JsComponent/pdfmake.min.js"></script>
    <script src="../JsComponent/vfs_fonts.js"></script>
    <script src="../JsComponent/custom.js"></script>
    <script src="../JsComponent/Action.js"></script>
    <script src="../JsComponent/admin.js"></script>
</body>

</html>